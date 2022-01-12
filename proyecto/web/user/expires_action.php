<?php

session_start();
require_once "/../../scripts/scripuser.php";
$url = Helpers::url("/"); 
 

$_SESSION = $uid;


/**
 * comprobar si existeix cookie
*/

function comprobarCookies()
{
    $activas = false;

    if( isset($_COOKIE['$token']) )
    $activas = true;

    return $activas;
}

if(comprobarCookies() == true ){
    Helpers::flash("la cooki existeix");
    
    
}else{
    Helpers::flash("la cookie no existeix");
}


/**
 * Consultarem si existeix el token de sessió (“S”) a la taula user_tokens de la BD.
*/

Helpers::log()->debug("Consultar token");
$type = Token::ACTIVATION;
$sql = "SELECT *  FROM user_tokens WHERE type='$type' AND token='$token'";
Helpers::log()->debug("SQL: {$sql}");
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
if($row){
    Helpers::log()->debug("Existing Token = $type");   
}else{
    Helpers::log()->debug("No Existing Token = $type");
    session_unset($_SESSION['$uid']);
    session_destroy();
    setcookie($token,'',time()-3600,'/');
    Helpers::log()->debug("s'ha elminat la cookie");
}

Helpers::redirect($url);

?>