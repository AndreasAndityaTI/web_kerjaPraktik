<?php
include_once("connect.php");
$mhs=$_GET['dosen_nidn'];
$delete=mysqli_query($mysqli,"DELETE from dosen where dosen_nidn='$mhs'");
header("Location:dosen.php");
?>