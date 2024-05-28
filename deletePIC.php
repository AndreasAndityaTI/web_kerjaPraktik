<?php
include_once("connect.php");
$mhs=$_GET['pic_id'];
$delete=mysqli_query($mysqli,"DELETE from `pic` where pic_id='$mhs'");
header("Location:pic.php");
?>