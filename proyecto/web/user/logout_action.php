<?php
// Initialize the session
session_start();
$url = Helpers::url("/"); // Go to homepage
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
Helpers::log()->debug($e->getMessage());
Helpers::flash("S'han destruit les cookies.");
// Redirect to login page
Helpers::redirect($url);
exit;
?>