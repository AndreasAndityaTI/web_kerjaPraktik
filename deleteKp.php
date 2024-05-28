<?php
include_once("connect.php");
$mhs=$_GET['kp_id'];
$delete=mysqli_query($mysqli,"DELETE from kp where kp_id='$mhs' ");
header("Location:kp.php");
?>