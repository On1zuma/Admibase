<?php
include('./components/navbar.php');

if (empty($_SESSION['id'])) {
    header('Location: login.php');
}

$table_name = $_SESSION['id']['table'];
$bdd = new PDO('mysql:host=localhost;dbname=gamedb;charset=utf8;', 'root', '');

if ($table_name != "*") {
    $tables = explode(", ", $table_name);
} else {
    $getTables = $bdd->query('SHOW TABLES');
    $tables = array();

    while ($row = $getTables->fetch(PDO::FETCH_NUM)) {
        $tableName = $row[0];
        $tables[] = $tableName;
    }
}
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
