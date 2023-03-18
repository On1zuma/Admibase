<?php
include('./components/navbar.php');

$status = new RightController();
$status->isNotLoggedIn();

?>


<div class="mx-auto" style="width: 70vw; margin-top: 9rem;">
    <div class="text-center" >
      <main role="main" class="inner cover">
            <h1 class="cover-heading">Welcome to AdmiBase</h1>
            <p class="lead">Admibase is a database management app that enables users, managers, and admins to add, update and manage data. It offers a user-friendly interface and customized access based on user status.</p>
            <p class="lead">
              <a href="login.php" class="btn btn-lg btn-secondary">Login</a>
            </p>
      </main>
    </div>
</div>

<!-- <?php include('./components/footer.php'); ?> -->

