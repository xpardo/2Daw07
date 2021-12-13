<?php


require_once __DIR__ . "/../../vendor/autoload.php";

use Rakit\Validation\Validator;
use My\Helpers;
use My\Database;
use My\Token;

// localhost/projecte/web/user/register_action2.php?token=58a77031dd8ce00961c325eecb1ef6e1ee595651
$url = Helpers::url("/"); // Go to homepage

$validator = new Validator();

$validation = $validator->make($_GET, [
    'token' => 'required',
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

    $token = $_GET["token"];
    $type = Token::ACTIVATION;

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
        Helpers::log()->debug("User id found using A token: $uid");
        
        if (!empty($uid)) {

            $datetime = date('Y-m-d H:i:s');

            // Update user
            Helpers::log()->debug("Activating user");
            $sql = "UPDATE users 
                    SET status=1, last_access='$datetime' 
                    WHERE id=$uid";
            Helpers::log()->debug("SQL: {$sql}");
            $stmt = $db->prepare($sql);
            $stmt->execute();
            Helpers::log()->debug("User activated");
            Helpers::flash("Enhorabona. Has activat el teu compte d'usuari/a!");

            $db->close();

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