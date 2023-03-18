<?php
require_once '../Controller/rightController.php';
require_once '../Controller/dataController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    print_r($_SESSION['id']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">AdmiBase</a>

  <ul class="navbar-nav mr-auto" style="display:flex; flex-direction:row; gap:1rem;">

    <li class="nav-item active">
        <a class="nav-link" href="#"> PhpMyAdmin</a>
    </li>
    <?php if (!isset($_SESSION['id'])): // check if user is not login so we show that link?>
    <li class="nav-item active">
        <a class="nav-link" href="index.php"> Home</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="login.php"> Login</a>
    </li>
    <?php endif; ?>

    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])): // check if user is logged in so we only show that links?>
    <li class="nav-item active">
        <a class="nav-link" href="list-table.php">Table list</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="logout.php"> Logout</a>
    </li>
    <?php endif; ?>

  </ul>
</nav>