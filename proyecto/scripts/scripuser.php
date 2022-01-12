<?php

require_once __DIR__ . "/../vendor/autoload.php";
$url = Helpers::url("/");
use My\User;
use My\database;

/**
 * control d’accés a les pàgines
 * 
 * */ 
$cooki=user::isAuthenticated();

Helpers::log()->debug("Check username and password");
$db = new Database();
$sql = "SELECT * FROM users u  WHERE u.username='$username' AND password='$password'";
Helpers::log()->debug("SQL: {$sql}");
$stmt = $db->prepare($sql);
$stmt->execute();


if (mysql_num_rows($stmt)!=0){
    /**
     * usuari i contrasenya válids
     * definir una sesion y guardar dades
     * */
 
    session_start();
    session_register("autentificado");
    $autentificado = "SI";
    Helpers::redirect($url);
}else {
    /** 
     * si no existeix retorno al index
     */
    header("Location: index.php?errorusuari=si");
}
mysql_free_result($stmt);

$db->close();



?>