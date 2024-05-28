<?php
include_once("connect.php");
$mhs=$_GET['perusahaan_npwp'];
$delete=mysqli_query($mysqli,"DELETE from perusahaan where perusahaan_npwp='$mhs'");
header("Location:perusahaan.php");
?>