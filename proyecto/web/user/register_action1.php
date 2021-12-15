<?php
//profe
require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use PHPMailer\PHPMailer\Exception as PHPMailerException;
use My\Helpers;
use My\Database;
use My\Mail;
use My\Token;

$url = Helpers::url("/user/register.php");

$validator = new Validator();

$validation = $validator->make($_POST + $_FILES, [
    'username'              => 'required',
    'email'                 => 'required|email',
    'password'              => 'required|min:6|regex:/\d/',
    'confirm_password'      => 'required|same:password',
    'avatar'                => 'uploaded_file|max:2M|mimes:jpeg,png',
    'terms'                 => 'required'
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
    $email    = $_POST["email"];

    try {
        
        $db = new Database();
        $sql = "SELECT COUNT(*) as count FROM users  WHERE username='$username' OR email='$email'";
        Helpers::log()->debug("SQL: {$sql}");
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetch();        
        $count = $row["count"]; // $row[0];
        Helpers::log()->debug("Existing users = $count");
        
        if ($count == 0) {

            $datetime = date('Y-m-d H:i:s');

            // Upload avatar and create file (optional)
            $fid = "NULL";
            if (!empty($_FILES["avatar"]["name"])) {
                Helpers::log()->debug("Uploading file", $_FILES["avatar"]);
                $filepath = $_FILES["avatar"]["tmp_name"];
                $filepath = Helpers::upload($_FILES["avatar"], $username);
                $filesize = $_FILES["avatar"]["size"];
                $sql = "INSERT INTO files(filepath,filesize,uploaded)  VALUES ('$filepath',$filesize,'$datetime')";
                Helpers::log()->debug("SQL: {$sql}");
                $stmt = $db->prepare($sql);
                $stmt->execute();
                $fid = $db->lastInsertId();
                Helpers::log()->debug("New file with id {$fid}");
            }

            // Create user
            Helpers::log()->debug("Creating user");
            $sql = "INSERT INTO users(username,password,email,status,role_id,avatar_id,created,last_access) VALUES ('$username','$password','$email',0,2,$fid,'$datetime','$datetime')";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $uid = $db->lastInsertId();
            Helpers::log()->debug("New user with id {$uid}");
            
            // Create user activation token
            Helpers::log()->debug("Creating user activation token");
            $token = Token::generate();
            $type = Token::ACTIVATION;
            $sql = "INSERT INTO user_tokens  VALUES ($uid, '$token', '$type', '$datetime')";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);            
            $stmt->execute();
            Helpers::log()->debug("New user activation token {$token}");

            $db->close();
            
            // Send activation mail
            Helpers::log()->debug("Sending user activation mail");
            $tokenUrl = Helpers::url("/user/register_action2.php") . "?token={$token}";
            Helpers::log()->debug("Token URL: {$tokenUrl}");
            $link = "<a href='{$tokenUrl}'>aquí</a>";
            $mail = new Mail("Activar compte J-Suite",  "Fes click {$link} per activar el compte.");            
            $send = $mail->send([$email]);
            if ($send) {
                Helpers::log()->debug("Send mail OK");
                $url = Helpers::url("/"); // Go to home
                Helpers::flash("Procés de registre completat correctament.");
            } else {
                Helpers::log()->debug("Send mail ERR");
                throw new PHPMailerException("Send method returns false.");
            }
        } else {
            Helpers::log()->debug("Username or mail already exists");
            Helpers::flash("El nom d'usuari o el correu ja existeixen");
        }
    } catch (PDOException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut desar les dades. Prova-ho més tard.");
    } catch (PHPMailerException $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("No s'han pogut enviar el correu d'activació. Contacta amb l'administrador/a.");
    } catch (Exception $e) {
        Helpers::log()->debug($e->getMessage());
        Helpers::flash("Hi hagut un error inesperat. Prova-ho més tard.");
    }
}

Helpers::redirect($url);


/*
    setcookie($token,'',time()-3600,'/');

 */