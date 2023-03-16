<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIBD - Login</title>
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
  </ul>
</nav>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <form style="margin-bottom: 2rem;" action="../Controller/connectionController.php" method="post">
    <div class="form-group">
        <label for="username">Login</label>
        <input type="text" class="form-control" id="username" aria-describedby="loginHelp" placeholder="Enter login">
        <small id="loginHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
    </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div class="passwords">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admin account</h5>
                <p class="card-text">An admin, short for administrator, is a user with the highest level of access and control over a system or platform.</p>
                <p class="card-text">Login : xxxxx</p>
                <p class="card-text">Password : xxxxx</p>            
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Manager account</h5>
                <p class="card-text">A manager is a person who is responsible for overseeing a team, department, or project within an organization.</p>
                <p class="card-text">Login : xxxxx</p>
                <p class="card-text">Password : xxxxx</p>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">User account</h5>
                <p class="card-text">Basic users typically have limited rights or permissions within a system, compared to higher-level users such as administrators or managers.</p>
                <p class="card-text">Login : xxxxx</p>
                <p class="card-text">Password : xxxxx</p>
            </div>
        </div>
    </div>
</div>

<style>
    .button-go{
        position: absolute;
        bottom: 1rem;
    }

    .card{
        height: 17rem;
    }

    .passwords {
        display: flex;
         align-items:center;
          flex-direction:row;
           gap:1rem;
    }

    @media (max-width: 1068px) {
        .passwords {
            flex-direction: column;
        }

        .card {
            height: auto;
        }

        .button-go{
            position: static;
        }
    }
</style>

</body>
</html>

