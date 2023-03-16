<?php

include('./components/navbar.php');

if (empty($_SESSION['id'])) {
    header('Location: /');
}

?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <div class="filter" style="margin-bottom: 1rem; display:flex; align-items:center; flex-direction:row; justify-content:space-between;">
    <span class="label label-default" style="font-weight: 900;">Our base TITLE</span>
    <div style="display:flex; align-items:center; flex-direction:row; justify-content:space-between; gap:1rem">
      <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
      <a href="/form.php" type="button" class="btn btn-primary text-white"><span class="glyphicon glyphicon-remove"></span> Create</a>
      <a type="button" class="btn btn-danger text-white"><span class="glyphicon glyphicon-remove"></span> Delete</a>
    </div>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col"><a href="">First</a></th>
        <th scope="col"><a href="">Handle</a></th>
        <th scope="col"><a href="">Last (to filter by)</a></th>
        <th><a href=""></a></th>
      </tr>

    </thead>
    <tbody>
      <tr>
        <th scope="row"><input type="checkbox" value="" ></th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
        <td><a href="/form.php">Edit</a></td>
      </tr>
      <tr>
      <th scope="row"><input type="checkbox" value="" ></th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
        <td><a href="/form.php">Edit</a></td>
      </tr>
      <tr>
      <th scope="row"><input type="checkbox" value="" ></th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
        <td><a href="/form.php">Edit</a></td>
      </tr>
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

