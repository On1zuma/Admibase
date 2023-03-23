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
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die('CSRF token validation failed.');
    } else {
        unset($formData['csrf_token']);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $data->updateRow($tableUrl, $id, $formData);
        } else {
            $data->insertRow($tableUrl, $formData);
        }
    }
}

?>
<!-- href="list-data.php?table=<?php echo $_GET['table'] ?>" -->
<div class="mx-auto" style="width: 70vw; margin-top: 2rem;">
    <div class="filter" style="margin-bottom: 1rem; display:flex; align-items:center; flex-direction:row; justify-content:space-between;">
        <span class="label label-default" style="display:block; font-weight: 900; text-transform: uppercase; margin-bottom:.6rem;"><i class="fa-solid fa-pen-to-square"></i> <?php if (isset($_GET['id'])) {
            echo "Update Existing Data Form";
        } else {
            echo "New Data Creation Form";
        }?></span>
        <a href="list-data.php?table=<?php echo $_GET['table'] ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>
    <form method="POST">
        <?php foreach ($rows[0] as $label => $value) { ?>
        <div class="form-group">
            <?php if ($label != 'id') { ?>
            <label for="<?php echo $label; ?>"><?php echo $label; ?></label>
            <?php } ?>
            <?php if ($label == 'id') { ?>
            <input  type="hidden" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="1">
            <?php } elseif (stripos($label, 'id') !== false) { ?>
            <input  type="number" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } elseif (stripos($label, 'date') !== false) { ?>
            <input type="date" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } elseif (stripos($label, 'time') !== false) { ?>
            <input type="time" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } else { ?>
            <input type="text" class="form-control" id="<?php echo $label; ?>" aria-describedby="<?php echo $label; ?>" name="<?php echo $label; ?>" value="<?php echo $value; ?>">
            <?php } ?>
        </div>
        <?php } ?>
        <input type="hidden" class="form-control" id="<?php echo $_SESSION['csrf_token']; ?>" aria-describedby="<?php echo $_SESSION['csrf_token'] ?>" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>




<?php include('./components/footer.php'); ?>
