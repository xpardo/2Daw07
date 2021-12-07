<?php

require('vendor/autoload.php');

session_start();

use Rakit\Validation\Validator;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

//validador
 
$validator = new Validator;

$validator = $validator ->make($_POST + $_FILES,[
    'username' => 'required|min:6 character',
    'email' => 'required|email',
    'password1' => 'required|min 8|regex: /^[\d]+1$/',
    'password2' => 'required|same:password1',
    'avatar' => [
            'required|between:1MB',
                $validator ('uploaded_file')->fileTypes('png|jpg|gif')->message('la imatge a de ser /png/jpg/gif image')
            ]
]);
    
$validation->validate();

if ($validation->fails()) {
    // handling errors
    $errors = $validation->errors();
    echo "<pre>";
    print_r($errors->firstOfAll());
    echo "Alguna cosa a surtit malament</pre>";
    exit;
} else {
    // validation passes
    echo "Success!";
}


$errors="";

if(empty($_POST["username"] )){
    $error.="el username es obligatori <br>";
}


// Data received?
if (!empty($_POST)) {
    // Valid data?
    if (!empty($_POST["username"])) {
        $token = bin2hex(random_bytes(20));
        $url = My\Helpers::url("register.php?={$id}");
        My\Helpers::redirect($url);
    } else {
        $error.="el username es obligatori <br>";
    }

    if (!empty($_POST["email"])){
        $url = My\Helpers::url("register.php?={$id}");
        My\Helpers::redirect($url);
    }else{
        $error.="el email es obligatori <br>";
    }
    if (!empty($_POST["password1"]!=$_POST["password2"])){
        $error.="els passwors no  coincideixen<br>";
    }else if(!preg_match('/^[\d]+1$/',$_POST["password1"])){
        $error.="password no te format <br>";
    }

    
 }

//upload
if (!empty($_POST)) {
    // Valid data?
    if (!empty($_POST["username"])) {
       $data = [
            "username"  => $_POST["username"],
            "avatar" => null
        ];
        $token = bin2hex(random_bytes(20));
      

        // Step 1. Upload file (optional)
        if (isset($_FILES["avatar"])) {
            try {
                // Upload file
                $data["avatar"] = My\Helpers::upload($_FILES["avatar"]);
            } catch (Exception $e) {
                // Uploads dir error...
                $data["avatar"] = My\Helpers::upload($_FILES["avatar"]);
            }
        }
    }
}
 

$url = My\Helpers::url("/web/user/register_action2.php?t=$token&user=$user_id");
My\Helpers::redirect($url);





    

    //funcio busca si exiteix el usuari
    function checkIfUsernameExists($username){
        $cnf = include(__DIR__ . "/../config/database.php");
     
        $res=false;
    
        $sql="select * from users where username='$username'" ;  
        $res = mysqli_query($cnf,$sql) or die('Consulta fallida: ' . mysqli_error($cnf));
        $registre = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
        return $registre;
    
    }


    //funcio que mira si el email existeix 


    function checkIfEmailExists($email){
        $cnf = include(__DIR__ . "/../config/database.php");
        $res=false;
    
        $sql = "select * from users where email='$email'  ";
        $res = mysqli_query($cnf,$sql) or die('Consulta fallida: ' . mysqli_error($cnf));
        $registre = mysqli_fetch_array($res, MYSQLI_ASSOC);
    
        return $registre;

    }


    //funcio que Insireix el usuari a la base de dades

    function addUser($id,$username,$email,$password){

        $cnf = include(__DIR__ . "/../config/database.php");
        $res=TRUE;
        try {
            $sql="insert into users (id,username,email,password,avatar_id) value(0,'$username','$email','sha256 ($password)',0)" ;  
            $res = mysqli_query($cnf,$sql) or $res=FALSE;

            $cnf->exec($sql);
            $id = $cnf->lastInsertId();
         

        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        
        } 

        return $res;

        $cnf=null;        
    }

    function addAvatar($id,$avatar){
        $cnf = include(__DIR__ . "/../config/database.php");
        $res=TRUE;
        try {
            $sql="insert into files (id,filepath) value('0','$avatar')";
            $res = mysqli_query($cnf,$sql) or $res=FALSE;

            $cnf->exec($sql);
            $id = $cnf->lastInsertId();
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        
        } 

        return $res;

        $cnf=null;
    }
    
    //insertat tocken
    function Token($user_id,$token){
        $cnf = include(__DIR__ . "/../config/database.php");
        try {
            $sql="insert into user_token (user_id,tocken,type) value(0,'$token','A')" ; 
            $cnf->exec($sql);
            $user_id = $cnf->lastInsertId(); 
        }catch(PDOException $e){
            echo $sql . "<br>" . $e->getMessage();
        }
    }

if($_POST["password1"]!=$_POST["password2"]){
    if (checkIfUsernameExists($_POST["username"])){
        if(checkIfEmailExists($_POST["email"])){

            if(addUser($_POST["username"],$_POST["email"],$_POST["password"]) and addAvatar($_POST["avatar"])){
                if(Token($_GET['token'])){

                    $mail = new PHPMailer(true);
        
                    try {
                        //Server settings
                        $mail->isSMTP(); 
                        $mail->SMTPDebug = 0;                                                              
                        $mail->SMTPAuth   = true;     
                        $mail->SMTPSecure = 'tls';         
                        $mail->Port       = 587;   
                        $mail->Host       = 'smpt.gmail.com';                                  
                        $mail->Username   = '2daw.equip08@fp.insjoaquimmir.cat';                    
                        $mail->Password   = '9LeQr>7j';                              
                                                          

                        //Recipients
                        $mail->setFrom('2daw.equip08@fp.insjoaquimmir.cat', 'Mailer');
                        $mail->addAddress("email:".$_POST['email'].$_POST['username']."\n");    
                        
                        // Content
                        $mail->isHTML(true);                           
                        $mail->Subject = 'confirm';
                        $mail->Body    = 
                       
                        '<form action="' . $url . '">' . $url . '" method="GET"> 
                            <p>Venvinguts a la nosta app</p>
                            <a href="' . $url . '">' . $url . '</a>
                        </form>';

                        $mail->send();
                        log("S'ha enviat el missatge") ;
                    } catch (Exception $e) {
                        log("No s'ha pogut enviar el missatge. Error de correu: {$mail->ErrorInfo}");
                    }
                }   
            }
        }else{
            echo ("el email ja existeix <br>");  
        }
    }else{
        echo ("el username ja existeix <br>");
    }

}else{
    echo ("Els passwords no coincideixen <br>");
}





?>