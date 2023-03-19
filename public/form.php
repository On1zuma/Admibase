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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formData = $_POST;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $data->updateRow($tableUrl, $id, $formData);
    } else {
        $data->insertRow($tableUrl, $formData);
    }
}

?>

<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <form method="POST">
        <?php foreach ($rows[0] as $label => $value) { ?>
        <div class="form-group">
            <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
            <?php if (strpos($label, 'id') !== false) { ?>
            <input type="number" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } elseif (strpos($label, 'date') !== false) { ?>
            <input type="date" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } elseif (strpos($label, 'time') !== false) { ?>
            <input type="time" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } else { ?>
            <input type="text" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } ?>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<?php include('./components/footer.php'); ?>
