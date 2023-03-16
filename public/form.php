<?php

session_start();
if (empty($_SESSION['id'])) {
    header('Location: /');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<nav class="navbar navbar-dark bg-primary">
  <a class="navbar-brand" href="/">AdmiBase</a>

  <ul class="navbar-nav mr-auto" style="display:flex; flex-direction:row; gap:1rem;">
    <li class="nav-item active">
        <a class="nav-link" href="/list-table.php">Table list</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="#"> PhpMyAdmin</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="/logout.php"> Logout</a>
    </li>
  </ul>
</nav>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <form>
      <div class="form-group">
          <label for="data1">Input 1</label>
          <input type="text" class="form-control" id="data1" aria-describedby="data1" placeholder="Enter data 1">
      </div>
      <div class="form-group">
          <label for="data2">Input 2</label>
          <input type="text" class="form-control" id="data2" aria-describedby="data2" placeholder="Enter data 2">
      </div>
      <div class="form-group">
          <label for="data3">Input 3</label>
          <input type="text" class="form-control" id="data3" aria-describedby="data3" placeholder="Enter data 3">
      </div>
      <div class="form-group">
          <label for="data4">Input 4</label>
          <input type="text" class="form-control" id="data4" aria-describedby="data4" placeholder="Enter data 4">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

