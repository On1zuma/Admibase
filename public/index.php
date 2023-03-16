<?php

include('navbar.php');

if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
    header('Location: list-table.php');
}
?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  INDEX
</div>

<?php include('./components/footer.php'); ?>

