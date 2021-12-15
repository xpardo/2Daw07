<?php

require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use My\Helpers;
use My\Database;
use My\Token;

$url = Helpers::url("/"); // Go to homepage

$validator = new Validator();

$validation = $validator->make($_POST, [
    'username' => 'required',
    'password' => 'required'
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

    $username = $_POST["username"];
    $password = hash("sha256", $_POST["password"]);

    try {

        Helpers::log()->debug("Check username and password");
        $db = new Database();
        $sql = "SELECT * FROM users u  WHERE u.username='$username' AND password='$password'";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        
        if ($user = $stmt->fetch()) {

            Helpers::log()->debug("Username and password OK");

            $datetime = date('Y-m-d H:i:s');
            $uid = $user["id"];
            
            // Update user
            Helpers::log()->debug("Update user last access");
            $sql = "UPDATE users SET last_access='$datetime' WHERE id=$uid";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            Helpers::log()->debug("User updated");


            // Create user session token
            $token = Token::generate();
            $type = Token::SESSION;
            $sql = "INSERT INTO user_tokens VALUES ($uid, '$token', '$type', '$datetime')";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);            
            $stmt->execute();
            Helpers::log()->debug("user session token {$token}");

            $db->close();

            // ...

            // Create user session cookie
            session_start();
            $token = "session_token";
            $remember = "remember";
            setcookie($token,$remember,time() + 365*24*60*60,'/');
            $_SESSION[$uid]="uid";
            if(isset($_COOKIE[$token])) {
                Helpers::flash("S'anomena galeta '" . $token . "' no està establert!") ;
            } else {
                Helpers::flash("Cookie '" . $token . "'està establert!<br>");
                Helpers::flash ("El valor és: " . $_COOKIE[$token]);
            }

            
            // ...
            
        } else {
            Helpers::log()->debug("Invalid username and password");
            Helpers::flash("Error de credencials. Prova de nou");
        }
    } catch (PDOException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut enviar les dades. Prova-ho més tard.");
    } catch (Exception $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("Hi hagut un error inesperat. Prova-ho més tard.");
    }
}

Helpers::redirect($url);
