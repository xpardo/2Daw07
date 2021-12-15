<?php

session_start();
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
    Helpers::flash("la cooki esta activa");
    
    
}else{
    Helpers::flash("la cookie esta desactivada");
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
 * destruir cookies i sessió
*/
if(!empty($_GET['borrarcookie'])) {
    session_unset($_SESSION['$uid']);
    session_destroy();
    setcookie($token,'',time()-3600,'/');
    Helpers::flash("S'ha borrat la cookie");
}


/**
 * comprovar si estan habilitades
*/


if(count($_COOKIE) > 0) {
    Helpers::flash("les cookies estan habilitades") ;

  } else {
    Helpers::flash("Les cookies estan desactivades") ;

  }


Helpers::redirect($url);

?>