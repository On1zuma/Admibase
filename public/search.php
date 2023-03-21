<?php

include('./components/navbar.php');
$status = new RightController();
$status->isLoggedIn();
$data = new DataController();
$tableUrl = $data->checkIfUserCanAccessTable();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $search = $_POST['search'];

    header('Location: list-data.php?table='.$tableUrl.'&search='.$search);
}
