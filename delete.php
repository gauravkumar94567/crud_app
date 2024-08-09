<?php
include('dbcon.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM `employee` WHERE `id` = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Data not deleted: " . mysqli_error($connection));
    } else {
       
        header("Location: index.php");
        exit();
    }
}
?>