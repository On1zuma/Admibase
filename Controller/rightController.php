<?php

class RightController
{
    public function __construct()
    {
    }

    public function isLoggedIn()
    {
        if (empty($_SESSION['id'])) {
            header('Location: login.php');
            exit; // stop the script
        }
    }

    public function isNotLoggedIn()
    {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            header('Location: list-table.php');
            exit; // stop the script
        }
    }
}
