<?php
/**
 * Created by PhpStorm.
 * User - Sashini 
 * Date : 9/10/2018
 */
session_start();
session_unset();
session_destroy();
unset($_COOKIE['session_cookie']);
setcookie('PHPSESSID', '', time() - 3600, '/');
setcookie('session_cookie', '', time() - 3600, '/');

header("Location:index.php");
exit;


?>


