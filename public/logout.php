<?php

session_start();
if ($_SESSION['id']) {
    $_SESSION = array();
    session_destroy();
    header('Location: /');
} else {
    header('Location: /');
}
