<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah PIC
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


        $array_perusahaan=mysqli_query($mysqli,"SELECT * from perusahaan ");




        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="addPIC.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH PIC</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID PIC</td>
                                <td><input type="text" class="form-control" name="pic_id" readonly="" placeholder="Terisi Otomatis"></td>
                            </tr>
                            <tr>
                                <td>NPWP Perusahaan</td>
                                <td> <select class="form-control" name="perusahaan_npwp"  >
                                <?php
                                        while($perusahaan_data=mysqli_fetch_array($array_perusahaan)){
                                            echo"
                                            
                                            <option value=".$perusahaan_data['perusahaan_npwp']." >".$perusahaan_data['perusahaan_npwp']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select></td>
                            </tr>
                            <tr>
                                <td>NIP PIC</td>
                                <td><input type="text" class="form-control" name="pic_nip"></td>
                            </tr>
                            <tr>
                                <td>Nama PIC</td>
                                <td><input type="text" class="form-control" name="pic_nama"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit_" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_'])){
        $pic_id=$_POST['pic_id'];
    $perusahaan_npwp = $_POST['perusahaan_npwp'];
        $pic_nip=$_POST['pic_nip'];
    $pic_nama = $_POST['pic_nama'];


        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO  `pic`(`pic_id`,`perusahaan_npwp`,`pic_nip`,`pic_nama`)
        VALUES('$pic_id','$perusahaan_npwp','$pic_nip','$pic_nama');");

        header("Location:pic.php");
    }
?>