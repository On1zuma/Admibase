<?php

 $tables = ["Horse", "House", "Cars", "Race","other"];

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - list table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="/">AdmiBase</a>

  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
        <a class="nav-link" href="/list-table.php">Table list</a>
    </li>
  </ul>
</nav>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <ul class="list-group">
  <?php  foreach ($tables as $table) {
      echo "<li class='list-group-item'><a href='/data-list.php?table=".$table."'>".$table."</a></li>";
  }
 ?>
  </ul>
</div>

</body>
</html>

