<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah Perusahaan
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

        $array_perusahaan=mysqli_query($mysqli,"SELECT * from `perusahaan`");



        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="addPerusahaan.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH PERUSAHAAN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NPWP</td>
                                <td><input type="text" class="form-control" name="perusahaan_npwp"></td>
                            </tr>
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td><input type="text" class="form-control" name="perusahaan_nama"></td>
                            </tr>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td><input type="text" class="form-control" name="perusahaan_alamat"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit'])){
        $npwp_perusahaan=$_POST['perusahaan_npwp'];
        $nama_perusahaan=$_POST['perusahaan_nama'];
    $alamat_perusahaan = $_POST['perusahaan_alamat'];



        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO  `perusahaan`(`perusahaan_npwp`,`perusahaan_nama`,`perusahaan_alamat`)
        VALUES('$npwp_perusahaan','$nama_perusahaan','$alamat_perusahaan');");

        header("Location:perusahaan.php");
    }
?>