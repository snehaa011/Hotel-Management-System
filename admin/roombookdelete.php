<?php

include '../config.php';

$id = $_GET['id'];

$deletesql = "DELETE FROM booking WHERE id = $id";

$result = mysqli_query($conn, $deletesql);

header("Location:booking.php");

?>