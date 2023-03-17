<?php

session_start();
if ($_SESSION['id']) {
    $_SESSION = array();
    session_destroy();
    header('Location: /login.php');
} else {
    header('Location: /');
}
