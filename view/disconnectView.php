<?php $title = 'Disconnect';
ob_start();
session_start(); 

// Suppression des variables de session
$_SESSION = array();
session_destroy();

// Suppression des cookies
setcookie('login', '');
setcookie('hashed_pass', '');

header('Location: index.php?action=signInPage');

$content = ob_get_clean(); 
require('template.php'); ?>