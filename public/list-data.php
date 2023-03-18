<?php

include('./components/navbar.php');

$status = new RightController();
$status->isLoggedIn();

$data = new DataController();
$tableUrl = $data->checkIfUserCanAccessTable();
$columns = $data->listOfTableName($tableUrl);
$rows = $data->listOfRowName($tableUrl);

$tableUrlWithSpaces = str_replace('_', ' ', $tableUrl);

?>

<div class="mx-auto" style="width: 100vw; margin-top: 2rem;">
  <div class="filter" style="margin-bottom: 1rem; display:flex; align-items:center; flex-direction:row; justify-content:space-around;">
    <span class="label label-default" style="font-weight: 900; text-transform: uppercase;"><?php echo $tableUrlWithSpaces;  ?></span>
    <div style="display:flex; align-items:center; flex-direction:row; justify-content:space-between; gap:1rem">
      <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
      <a href="form.php" type="button" class="btn btn-primary text-white"><span class="glyphicon glyphicon-remove"></span> Create</a>
      <a type="button" class="btn btn-danger text-white"><span class="glyphicon glyphicon-remove"></span> Delete</a>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <?php foreach ($columns as $column) {
            echo '<th scope="col"><a href="">'.$column.'</a></th>';
        } ?>
        <th><a href=""></a></th>
      </tr>

    </thead>
    <tbody>
  <?php
    $rows = $data->listOfRowName($tableUrl);
foreach ($rows as $index => $row) {
    echo "<tr>";
    echo "<th scope='row'><input type='checkbox' value='id:". ($index + 1) ."' ></th>";
    foreach ($columns as $column) {
        echo "<td>" . $row[$column] . "</td>";
    }
    echo "<td><a href='form.php'>Edit</a></td>";
    echo "</tr>";
}
?>
</tbody>

  </table>

  <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item"><a class="page-link" href="#">Next</a></li>
  </ul>
</nav>
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

<?php include('./components/footer.php'); ?>

