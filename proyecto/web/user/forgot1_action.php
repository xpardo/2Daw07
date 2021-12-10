<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use My\Helpers;
use My\Database;
use My\Mail;
use My\Token;

$url = Helpers::url("/user/forgot1.php");

$validator = new Validator();

$validation = $validator->make($_POST + $_FILES, [
    'email' => 'required|email'
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

    $email = $_POST["email"];

    try {
        
        $db = new Database();
        $sql = "SELECT id FROM users 
                WHERE email='$email'";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $uid = $stmt->fetchColumn();
        
        if (!empty($uid)) {

            Helpers::log()->debug("User id found: $uid");
            $datetime = date('Y-m-d H:i:s');
            
            // Create password recovery token
            Helpers::log()->debug("Creating password recovery token");
            $token = Token::generate();
            $type = Token::RECOVER;
            $sql = "INSERT INTO user_tokens 
                    VALUES ($uid, '$token', '$type', '$datetime')";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);            
            $stmt->execute();
            Helpers::log()->debug("New password recovery token {$token}");

            $db->close();
            
            // Send activation mail
            Helpers::log()->debug("Sending password recovery mail");
            $tokenUrl = Helpers::url("/user/forgot2.php?token={$token}");
            Helpers::log()->debug("Token URL: {$tokenUrl}");
            $link = "<a href='{$tokenUrl}'>aquí</a>";
            $mail = new Mail("Recuperar compte J-Suite",  "Fes click {$link} per canviar la contrasenya.");
            $send = $mail->send([$email]);
            if ($send) {
                Helpers::log()->debug("Send mail OK");
                Helpers::flash("Revisa el teu correu.");
            } else {
                Helpers::log()->debug("Send mail ERR");
                throw new PHPMailerException("Send method returns false.");
            }
        } else {
            Helpers::log()->debug("User not exists (mail not found)");
        }
    } catch (PDOException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut desar les dades. Prova-ho més tard.");
    } catch (PHPMailerException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut enviar el correu. Contacta amb l'administrador/a.");
    } catch (Exception $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("Hi hagut un error inesperat. Prova-ho més tard.");
    }
}

Helpers::redirect($url);