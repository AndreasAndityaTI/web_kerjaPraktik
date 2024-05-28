<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah Dosen
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" 
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" 
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        include_once("connect.php");
        $array_kp=mysqli_query($mysqli,"SELECT * from kp");
        $array_dosen=mysqli_query($mysqli,"SELECT * from dosen");
        $array_mahasiswa=mysqli_query($mysqli,"SELECT * from mahasiswa");
        $array_nilaiDosen=mysqli_query($mysqli,"SELECT * from `nilai dosen`");
        $array_nilaiPIC=mysqli_query($mysqli,"SELECT * from `nilai pic`");
        $array_perusahaan=mysqli_query($mysqli,"SELECT * from `perusahaan`");
        $array_PIC=mysqli_query($mysqli,"SELECT * from `pic`");



        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="addDosen.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH DOSEN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NIDN</td>
                                <td><input type="text" class="form-control" name="dosen_nidn"></td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td><input type="text" class="form-control" name="dosen_nama"></td>
                            </tr>
                     

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit_dosen" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_dosen'])){
        $dosen_nidn=$_POST['dosen_nidn'];
        $dosen_nama=$_POST['dosen_nama'];

        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO  `dosen`(`dosen_nidn`,`dosen_nama`)
        VALUES('$dosen_nidn','$dosen_nama');");

        header("Location:dosen.php");
    }
?>