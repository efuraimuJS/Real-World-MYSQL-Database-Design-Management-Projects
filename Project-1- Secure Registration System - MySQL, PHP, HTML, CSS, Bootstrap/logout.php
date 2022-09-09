<?php
session_start();

unset($_SESSION['sess_id']);
unset($_SESSION['sess_email']);


//kill the session cookies & not data
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

//finally destroy sess

session_destroy();
header('LOcation: index.php');
exit();
