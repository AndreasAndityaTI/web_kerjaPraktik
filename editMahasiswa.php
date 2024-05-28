<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Mahasiswa
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
        // $array_penerbit=mysqli_query($mysqli,"SELECT * from penerbit");
        // $array_pengarang=mysqli_query($mysqli,"SELECT * from pengarang");
        // $array_katalog=mysqli_query($mysqli,"SELECT * from katalog");

        $nidn=$_GET['mhs_nim'];
        $mahasiswa=mysqli_query($mysqli,"SELECT * from mahasiswa where mhs_nim='$nidn' ");

        while($mahasiswa_data=mysqli_fetch_array($mahasiswa))
        {
            $nidn=$mahasiswa_data['mhs_nim'];
            $mhs_nama=$mahasiswa_data['mhs_nama'];
            $nilai = $mahasiswa_data['mhs_nilai'];
            $email = $mahasiswa_data['mhs_email'];
            $prodi = $mahasiswa_data['mhs_prodi'];
            $tanggal_lahir = $mahasiswa_data['mhs_tanggal_lahir'];
            $sks = $mahasiswa_data['mhs_sks'];
            $ipk = $mahasiswa_data['mhs_ipk'];
            $semester = $mahasiswa_data['mhs_semester'];

        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editMahasiswa.php?mhs_nim=<?php echo $nidn;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT MAHASISWA</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NIM</td> 
                                <td><input type="text" readonly='' class="form-control" name="mhs_nim" value="<?php echo $nidn;?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Mahasiswa</td>
                                <td><input type="text" class="form-control" name="mhs_nama" value="<?php echo $mhs_nama;?>"></td>
                            </tr>

                            <tr>
                            <td>Email</td>
                            <td><input type="text" class="form-control" name="mhs_email" value="<?php echo $email;?>"></td>
                            </tr>
                            <tr>
                            <td>Prodi</td>
                            <td><input type="text" class="form-control" name="mhs_prodi" value="<?php echo $prodi;?>"></td>
                            </tr>
                            <tr>
                            <td>Tanggal Lahir</td>
                            <td><input type="text" class="form-control" name="mhs_tanggal_lahir" value="<?php echo $tanggal_lahir;?>"></td>
                            </tr>
                            <tr>
                                <td>SKS</td>
                                <td><input type="text" class="form-control" name="mhs_sks" value="<?php echo $sks;?>"></td>
                            </tr>
                            <tr>
                                <td>IPK</td>
                                <td><input type="text" class="form-control" name="mhs_ipk" value="<?php echo $ipk;?>"></td>
                            </tr>
                            <tr>
                                <td>Semester</td>
                                <td><input type="text" class="form-control" name="mhs_semester" value="<?php echo $semester;?>"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="Submit" value="Edit"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
if(isset($_POST['Submit'])){
    $nidn=$_POST['mhs_nim'];
    $mhs_nama=$_POST['mhs_nama'];
    $email = $_POST['mhs_email'];
    $prodi = $_POST['mhs_prodi'];
    $tanggal_lahir = $_POST['mhs_tanggal_lahir'];
    $sks = $_POST['mhs_sks'];
    $ipk = $_POST['mhs_ipk'];
    $semester = $_POST['mhs_semester'];
    
    $result=mysqli_query($mysqli,"UPDATE mahasiswa SET mhs_nim='$nidn',mhs_nama ='$mhs_nama',  
    mhs_email='$email', mhs_prodi='$prodi', mhs_tanggal_lahir='$tanggal_lahir', 
    mhs_sks='$sks', mhs_ipk='$ipk', mhs_semester='$semester' 
    where mhs_nim='$nidn';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    header("Location:mahasiswa.php");
}
?>