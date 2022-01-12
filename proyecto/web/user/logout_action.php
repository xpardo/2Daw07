<?php

session_start();
require_once "/../../scripts/scripuser.php";
$url = Helpers::url("/user/login.php"); 
use My\Database;

$_SESSION = $uid;
$coo = "session_token";

/**
 * comprobar si existeix cookie
*/

function comprobarCookies()
{
    $activas = false;
    if( isset($_COOKIE[$coo]) ){
        $activas = true;
    }
    return $activas;
}

if(comprobarCookies() == true ){
    Helpers::flash("la cookie existeix");  

    /**
     * Borrar token de sessió
    */
    $type = Token::SESSION;
    $token = $_COOKIE[$coo];
    
    $sql = "DELETE from user_tokens WHERE type='$type' AND token='$token'";
    Helpers::log()->debug("SQL: {$sql}");
    $stmt = $db->prepare($sql);            
    $ok = $stmt->execute();
    if ($ok) {
        Helpers::log()->debug("user session eliminated token {$coo}");
    } else {
        Helpers::log()->debug("user session error");
    }
    $db->close();
        
    /**
     * destruir cookies 
    */
    // OJO! session_unset();
    // OJO! session_destroy();
    unset($_SESSION["uid"]);
    setcookie($coo,'',time()-3600,'/');
    Helpers::flash("S'ha borrat la cookie");

}else{
    Helpers::flash("la cookie no existeix");
}


Helpers::redirect($url);