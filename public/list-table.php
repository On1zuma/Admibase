<?php

include('./components/navbar.php');

if (empty($_SESSION['id'])) {
    header('Location: /login.php');
}

print_r($_SESSION['id']);

$tables = ["Horse", "House", "Cars", "Race","other"];

?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <ul class="list-group">
  <?php  foreach ($tables as $table) {
      echo "<li class='list-group-item'><a href='/list-data.php?table=".$table."'>".$table."</a></li>";
  }
?>
  </ul>
</div>

<?php include('./components/footer.php'); ?>
