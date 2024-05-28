<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah Mahasiswa
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
                    <form action="addMahasiswa.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH MAHASISWA</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NIM</td>
                                <td><input type="text" class="form-control" name="mhs_nim"></td>
                            </tr>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td><input type="text" class="form-control" name="mhs_nama"></td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td><input type="text" class="form-control" name="mhs_email"></td>
                            </tr>
                            <tr>
                                <td>Prodi</td>
                                <td><input type="text" class="form-control" name="mhs_prodi"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td><input type="text" class="form-control" name="mhs_tanggal_lahir" placeholder="YYYY-MM-DD"></td>
                            </tr>
                            <tr>
                                <td>SKS</td>
                                <td><input type="text" class="form-control" name="mhs_sks"></td>
                            </tr>
                            <tr>
                                <td>IPK</td>
                                <td><input type="text" class="form-control" name="mhs_ipk"></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td><input type="text" class="form-control" name="mhs_semester"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit_mhs" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_mhs'])){
        $mhs_nim=$_POST['mhs_nim'];
        $mhs_nama=$_POST['mhs_nama'];
        $mhs_email=$_POST['mhs_email'];
        $mhs_prodi=$_POST['mhs_prodi'];
        $mhs_tanggal_lahir=$_POST['mhs_tanggal_lahir'];
        $mhs_sks=$_POST['mhs_sks'];
        $mhs_ipk=$_POST['mhs_ipk'];
        $mhs_semester=$_POST['mhs_semester'];
        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO `mahasiswa`(`mhs_nim`,`mhs_nama`,
        `mhs_email`,`mhs_prodi`,`mhs_tanggal_lahir`,`mhs_sks`,`mhs_ipk`,`mhs_semester`)
        VALUES('$mhs_nim','$mhs_nama','$mhs_email','$mhs_prodi','$mhs_tanggal_lahir','$mhs_sks','$mhs_ipk','$mhs_semester');
        ");

        header("Location:mahasiswa.php");
    }
?>