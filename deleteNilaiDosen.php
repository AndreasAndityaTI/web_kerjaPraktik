
<?php
include("connect.php");

$nilai_dosen = $_GET['nilai_dosen_id'];




// $_GET['dosen_nidn'];
$delete=mysqli_query($mysqli,"DELETE from `nilai dosen` where (nilai_dosen_id='$nilai_dosen' );");
header("Location:nilaiDosen.php");
?>