<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Kerja Praktik
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

        $id_kp=$_GET['kp_id'];
        $kp=mysqli_query($mysqli,"SELECT * from kp where kp_id='$id_kp' ");
        $tabel_mahasiswa = mysqli_query($mysqli,"SELECT * from mahasiswa  ");
        while($kp_data=mysqli_fetch_array($kp))
        {
            $id_kp=$kp_data['kp_id'];
            $mhs_nim=$kp_data['mhs_nim'];
            $tgl_mulai_kp=$kp_data['tgl_mulai_kp'];
            $judul_kp=$kp_data['judul_kp'];
            $tanggal_selesai_kp=$kp_data['tanggal_selesai_kp'];
            $nilai_akhir=$kp_data['nilai_akhir'];



        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editKp.php?kp_id=<?php echo $id_kp;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT KERJA PRAKTIK</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID KP</td>
                                <td><input type="text" readonly='' class="form-control" name="kp_id" value="<?php echo $id_kp;?>"></td>
                            </tr>
                            <tr>
                                <!-- mhs_nim -->
                                <td>NIM</td>
                                <td>
                                       <select class="form-control" name="mhs_nim"  >
                                <?php
                                echo "<option>$mhs_nim</option>";
                                        while($mhs_nim_data=mysqli_fetch_array($tabel_mahasiswa)){
                                            echo"
                                            
                                            <option value=".$mhs_nim_data['mhs_nim']." >".$mhs_nim_data['mhs_nim']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select>
                                    </td>
                            </tr>
                            <tr>
                                <td>Tanggal Mulai KP</td>
                                <td><input type="text" class="form-control" name="tgl_mulai_kp" value="<?php echo $tgl_mulai_kp;?>"></td>
                            </tr>
                            <tr>
                                <td>Judul KP</td>
                                <td><input type="text" class="form-control" name="judul_kp" value="<?php echo $judul_kp;?>"></td>
                            </tr>
                            <tr>
                                <td>Tanggal Selesai KP</td>
                                <td><input type="text" class="form-control" name="tanggal_selesai_kp" value="<?php echo $tanggal_selesai_kp;?>"></td>
                            </tr>
                            <tr>
                                <td>Nilai Akhir</td>
                                <td><input type="text" class="form-control" name="nilai_akhir" readonly='' value="<?php echo $nilai_akhir;?> "></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary"  name="Submit" value="Edit"></td>
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
    $id_kp=$_POST['kp_id'];
    $mhs_nim=$_POST['mhs_nim'];
    $tgl_mulai_kp=$_POST['tgl_mulai_kp'];
    $judul_kp=$_POST['judul_kp'];
    $tgl_selesai_kp=$_POST['tanggal_selesai_kp'];
    $nilai_akhir=$_POST['nilai_akhir'];



    
    $result=mysqli_query($mysqli,"UPDATE kp SET kp_id='$id_kp', mhs_nim='$mhs_nim', tgl_mulai_kp='$tgl_mulai_kp',
    judul_kp='$judul_kp', tanggal_selesai_kp='$tgl_selesai_kp', nilai_akhir='$nilai_akhir'
    where kp_id='$id_kp';");
echo "<script type='text/javascript'>window.top.location='kp.php';</script>"; exit;
}
?>