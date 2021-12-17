<?php

session_start();
$url = Helpers::url("/user/login.php"); 
 

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
 * Borrar token de sessió
*/
$type = Token::SESSION;
$sql = "DELETE from user_tokens where id='$uid', token='$token', type='$type', created='$datetime' ";
Helpers::log()->debug("SQL: {$sql}");
$stmt = $db->prepare($sql);            
$stmt->execute();
Helpers::log()->debug("user session eliminated  token {$token}");
$db->close();


/**
 * Consultarem si existeix el token de sessió (“S”) a la taula user_tokens de la BD.
*/
Helpers::log()->debug("Consultar token");
$type = Token::ACTIVATION;
$sql = "SELECT *  FROM user_tokens where $type";
Helpers::log()->debug("SQL: {$sql}");
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
Helpers::log()->debug("Existing Token = $type");   
 

 
/**
 * destruir cookies i sessió
*/
if(!empty($_GET['borrarcookie'])) {
    session_unset($_SESSION['$uid']);
    session_destroy();
    setcookie($token,'',time()-3600,'/');
    Helpers::flash("S'ha borrat la cookie");
}

Helpers::redirect($url);

?>