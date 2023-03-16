<?php

include('./components/navbar.php');

if (empty($_SESSION['id'])) {
    header('Location: /');
}

?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <form>
      <div class="form-group">
          <label for="data1">Input 1</label>
          <input type="text" class="form-control" id="data1" aria-describedby="data1" placeholder="Enter data 1">
      </div>
      <div class="form-group">
          <label for="data2">Input 2</label>
          <input type="text" class="form-control" id="data2" aria-describedby="data2" placeholder="Enter data 2">
      </div>
      <div class="form-group">
          <label for="data3">Input 3</label>
          <input type="text" class="form-control" id="data3" aria-describedby="data3" placeholder="Enter data 3">
      </div>
      <div class="form-group">
          <label for="data4">Input 4</label>
          <input type="text" class="form-control" id="data4" aria-describedby="data4" placeholder="Enter data 4">
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<?php include('./components/footer.php'); ?>