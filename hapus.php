<?php
include_once("assets/php/config.php");
$nis = $_GET['nis'];
$result = mysqli_query($mysqli, "DELETE FROM data_siswa WHERE nis=$nis");
if (!$result) {
    die('Invalid query: ' . mysqli_error($mysqli));
}
header("Location:index.php");
?>