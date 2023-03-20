<?php
include('./components/navbar.php');

$status = new RightController();
$status->isLoggedIn();

$data = new DataController();
$tables = $data->listOurTables();

?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <ul class="list-group">
  <?php foreach ($tables as $table) {
      $tableWithSpaces = str_replace("_", " ", $table);
      echo "<li class='list-group-item'><a href='list-data.php?table=".$table."'>".$tableWithSpaces."</a></li>";
  } ?>
  </ul>
</div>

<?php include('./components/footer.php'); ?>
