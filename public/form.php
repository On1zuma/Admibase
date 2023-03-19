<?php
include('./components/navbar.php');

$status = new RightController();
$status->isLoggedIn();

$data = new DataController();
$tableUrl = $data->checkIfUserCanAccessTable();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $rows = $data->listOfRowNameWithId($tableUrl, $id);
} else {
    $columns = $data->listOfTableName($tableUrl);
    $rows = [array_fill_keys($columns, '')];
}
?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
  <form>
    <?php foreach ($rows[0] as $label => $value) { ?>
    <div class="form-group">
        <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
        <input type="text" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" value="<?php echo $value; ?>">
    </div>
    <?php } ?>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>


<?php include('./components/footer.php'); ?>
