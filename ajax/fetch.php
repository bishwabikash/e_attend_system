<?php
include_once "../includes/connection.php";
global $db;
if (isset($_GET)) {


    //$subject = $_POST['get_option'];
    $res = mysqli_query($db, "SELECT DISTINCT sem_name FROM semester");
    echo "<option value='#'>Select Semester</option>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<option value='" . $row['sem_name'] . "'>" . $row['sem_name'] . "</option>";
    }

    exit;
} else if (isset($_POST)) {
    $subject = $_POST['get_option'];
    $res = mysqli_query($db, "SELECT paper FROM semester WHERE sem_name ='" . $subject . "'");
    echo "<option value='#'>Select Paper</option>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<option value='" . $row['paper'] . "'>" . $row['paper'] . "</option>";
    }

    exit;
}