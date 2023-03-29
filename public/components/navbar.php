<?php
require_once '../Controller/rightController.php';
require_once '../Controller/dataController.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
</head>
<body>

<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">AdmiBase</a>
  <ul class="navbar-nav mr-auto" style="display:flex; flex-direction:row; gap:1rem;">
    <?php if (!isset($_SESSION['id'])): // check if user is not login so we show that link?>
    <li class="nav-item active">
        <a class="nav-link" href="index.php"> Home</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="login.php"> Login</a>
    </li>
    <?php endif; ?>

    <?php if (isset($_SESSION['id']) && !empty($_SESSION['id'])): // check if user is logged in so we only show that links?>
        <?php
            if($_SESSION['id']['table'] == "*") { ?>         
        <li class="nav-item active">
         <a class="nav-link" href="/phpmyadmin"> PhpMyAdmin</a>
        </li>
    <?php } ?>
    <li class="nav-item active">
        <a class="nav-link" href="list-table.php">Table list</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="logout.php"> Logout</a>
    </li>
    <?php endif; ?>
  </ul>
<?php if (isset($_SESSION['id'])) { // check if user is logged in so we only show that links?>
    <div>
        <span style="cursor:default; color:white;" class="nav-link" href="index.php"><i class="fa-solid fa-user"></i> <?php echo $_SESSION['username'] ?></span>
    </div>
<?php } ?>
</nav>