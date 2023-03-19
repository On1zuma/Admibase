<?php

include('./components/navbar.php');
$status = new RightController();
$status->isLoggedIn();
$data = new DataController();
$tableUrl = $data->checkIfUserCanAccessTable();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ids = $_POST['ids'];

    $data->deleteRows($tableUrl, $ids);

    header('Location: list-data.php?table='.$tableUrl);
}
