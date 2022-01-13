<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use My\Helpers;
use My\Database;
use My\Mail;
use My\Token;

$url = Helpers::url("/user/forgot2.php?token={$_POST['token']}");

$validator = new Validator();

$validation = $validator->make($_POST + $_FILES, [
    'token'             => 'required',
    'password'          => 'required',
    'confirm_password'  => 'required|same:password',
]);

$validation->validate();

if ($validation->fails()) {
    // See https://github.com/rakit/validation#working-with-error-message
    $errors = $validation->errors();
    $messages = $errors->all();
    foreach ($messages as $message) {
        Helpers::flash($message);
    }

} else {

    $token = $_POST["token"];
    $type = Token::RECOVER;
    $password = hash("sha256", $_POST["password"]);

    try {

        Helpers::log()->debug("Search user using token");
        $db = new Database();
        $sql = "SELECT user_id FROM user_tokens 
                WHERE token='$token' AND type='$type'";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();
        $uid = $row["user_id"]; // $row[0];
        Helpers::log()->debug("User id found using R token: $uid");
        
        if (!empty($uid)) {

            $datetime = date('Y-m-d H:i:s');

            // Update user
            Helpers::log()->debug("Changing user password");
            $sql = "UPDATE users 
                    SET password='$password', last_access='$datetime' 
                    WHERE id=$uid";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            Helpers::log()->debug("User password changed");
            Helpers::flash("Contrasenya canviada correctament.");

            $db->close();

            // Go home
            $url = Helpers::url("/");

        } else {
            Helpers::log()->debug("Invalid token");
            Helpers::flash("Token invàlid.");
        }
    } catch (PDOException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut desar les dades. Prova-ho més tard.");
    } catch (Exception $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("Hi hagut un error inesperat. Prova-ho més tard.");
    }
}

Helpers::redirect($url);