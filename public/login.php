<?php
session_start();

include('./components/navbar.php');


if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    header("list-table.php");
}
print_r($_SESSION['id']);

require_once '../Controller/connectionController.php';
if (isset($_POST['send']) && empty($_SESSION['id'])) {
    $objet = new FormController();
    $objet->handleFormSubmission($_POST["login"], $_POST["password"]);
}

// $bdd = new PDO('mysql:host=localhost;dbname=gamedb;charset=utf8;', 'root', '');
// if (isset($_POST['send']) && $_POST['send'] == 2) {
//     if (!empty($_POST['login']) and !empty($_POST['password'])) {
//         $login = htmlspecialchars($_POST['login']);
//         $password = htmlspecialchars($_POST['password']);
//         // $password = sha1($_POST['password']);

//         $getUsers = $bdd->prepare('SELECT * FROM joueur WHERE pseudonyme = ? AND password = ?');
//         $getUsers->execute(array($login, $password));

//         if ($getUsers->rowCount() > 0) {
//             $_SESSION['id'] = $getUsers->fetch()['id'];
//             $_SESSION['pseudonyme'] = $login;
//             $_SESSION['password'] = $password;
//             header('Location: list-table.php');
//         } else {
//             echo "Please enter good username and password...";
//         }
//     } else {
//         echo "Please enter good username and password...";
//     }
// }
?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <form style="margin-bottom: 2rem;" method="post" action=""> <?php //../Controller/connectionController.php ?>
        <div class="form-group">
            <label for="username">Login</label>
            <input type="text" class="form-control" id="username" aria-describedby="loginHelp" placeholder="Enter login" name="login">
            <small id="loginHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" placeholder="Password" name="password">
        </div>
        <button type="submit" class="btn btn-primary" name="send">Submit</button>
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

<?php include('./components/footer.php'); ?>

