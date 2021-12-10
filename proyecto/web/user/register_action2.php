
        

        <?php

    /*     //bd
        $cnf = include(__DIR__ . "/../config/database.php");


        //Assegureu-vos que els nostres paràmetres de cadena de consulta existeixen.
        if(isset($_GET['token']) && isset($_GET['user'])){
            $token = $_GET['token'];
            $userId = $_GET['user'];
            $query = mysqli_query($cnf,
            "SELECT * FROM user_token WHERE user_id = :user_id AND token = :token"
            );
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $userId);
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);



            if (mysqli_num_rows($query) > 0) {
                $row= mysqli_fetch_array($query);
                if($row['email_verified_at'] == NULL){
                    mysqli_query($cnf, "SELECT * FROM user_token WHERE user_id = :user_id AND token = :token");//consultar la tabla token per veure si existeix
                    $msg = "Felicitats! El vostre correu electrònic s'ha verificat.";
                    header("location:./index.php");
                }else{
                    $msg = "Ja has verificat el teu compte amb nosaltres";
                    header("location:./register.php");
                }
            } 

            
        } else{
        $msg = "Perill! Alguna cosa va malament.";
        } */

        ?>
        <!-- <div class="container">
        
            <div class=" text-center">
            Activació del compte d'usuari 
            </div>
        
            <p><?php echo $msg; "<a href='https:index.php/'>home</a>"?></p>
            
        </div>
    </body> -->





    <?php
//profe
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