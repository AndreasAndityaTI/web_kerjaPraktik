<?php
include_once("connect.php");
$mhs=$_GET['mhs_nim'];
$delete=mysqli_query($mysqli,"DELETE from mahasiswa where mhs_nim='$mhs'");
header("Location:mahasiswa.php");
?>