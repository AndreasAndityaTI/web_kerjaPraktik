<?php
include_once("connect.php");
$mhs=$_GET['nilai_pic_id'];
$delete=mysqli_query($mysqli,"DELETE from `nilai pic` where nilai_pic_id='$mhs'");
header("Location:nilaiPIC.php");
?>