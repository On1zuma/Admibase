<?php
include('./components/navbar.php');

$status = new RightController();
$status->isLoggedIn();

$data = new DataController();
$tables = $data->listOurTables();
?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <span class="label label-default" style=" display:block;font-weight: 900; text-transform: uppercase; margin-bottom:1.2rem;">Your Complete List of Tables</span>
  <ul class="list-group">
  <?php foreach ($tables as $table) {
      $tableWithSpaces = str_replace("_", " ", $table);
      echo "<li class='list-group-item'><a href='list-data.php?table=".$table."'>".$tableWithSpaces."</a></li>";
  } ?>
  </ul>
</div>
<?php include('./components/footer.php'); ?>
