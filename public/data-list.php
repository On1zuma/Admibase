<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - Data list</title>
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

<div class="filter" style="margin-bottom: 1rem; display:flex; align-items:center; flex-direction:row; justify-content:space-between;">
  <span class="label label-default" style="font-weight: 900;">Our base TITLE</span>
  <div style="display:flex; align-items:center; flex-direction:row; justify-content:space-between; gap:1rem">
    <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
    <button type="button" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</button>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <td><a href=""> </a></td>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><input type="checkbox" value="" ></th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><a href="">Edit</a></td>
    </tr>
    <tr>
    <th scope="row"><input type="checkbox" value="" ></th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td><a href="">Edit</a></td>
    </tr>
    <tr>
    <th scope="row"><input type="checkbox" value="" ></th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td><a href="">Edit</a></td>
    </tr>
  </tbody>
</table>
</div>


<style>.list-group {line-height:30px}
.pull-right{
  position: absolute;
  right: 1rem;
}

@media (max-width: 1068px) {
    .pull-right{
    position: static;
    margin-left: 5rem;
  }
    }
</style>
</body>
</html>

