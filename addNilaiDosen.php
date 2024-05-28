<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah Nilai Dosen
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
 
        $nilaiDosen=mysqli_query($mysqli,"SELECT * from `nilai dosen`");
        $kp_quer = mysqli_query($mysqli, "SELECT * from kp");
        $dosen_quer = mysqli_query($mysqli, "SELECT * from dosen");
        // while($kp_data=mysqli_fetch_array($kp_quer))
        // {
        //     $id_kp=$kp_data['kp_id'];
        //     $mhs_nim=$kp_data['mhs_nim'];
        //     $tgl_mulai_kp=$kp_data['tgl_mulai_kp'];
        //     $judul_kp=$kp_data['judul_kp'];
        //     $tanggal_selesai_kp=$kp_data['tanggal_selesai_kp'];
        //     $nilai_akhir=$kp_data['nilai_akhir'];



        // }




        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="addNilaiDosen.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH NILAI DOSEN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID KP</td>
                                <td>
                                <select class="form-control" name="kp_id"  >
                                <?php
                                        while($kp_data2=mysqli_fetch_array($kp_quer)){
                                            echo"
                                            
                                            <option value=".$kp_data2['kp_id']." >".$kp_data2['kp_id']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Dosen NIDN</td>
                                <td>
                                <select class="form-control" name="dosen_nidn"  >
                                <?php
                                        while($dosen_data2=mysqli_fetch_array($dosen_quer)){
                                            echo"
                                            
                                            <option value=".$dosen_data2['dosen_nidn']." >".$dosen_data2['dosen_nidn']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status Dosen</td>
                                <td>
                                <select class="form-control" name="dosen_status"  >

                                    <?php
                                    echo"      
                                    <option>Pembimbing</option>
                                    <option>Penguji</option>

                                    ";

                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nilai Dosen</td>
                                <td><input type="text" class="form-control" name="nilai_dosen"></td>
                            </tr>

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit_nilai_dosen" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_nilai_dosen'])){
        $kp_id=$_POST['kp_id'];
        $dosen_nidn=$_POST['dosen_nidn'];
        $status_dosen=$_POST['dosen_status'];
        $nilai_dosen=$_POST['nilai_dosen'];

        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO  `nilai dosen`(`kp_id`,`dosen_nidn`,`status_dosen`,`nilai_dosen`)
        VALUES('$kp_id','$dosen_nidn','$status_dosen','$nilai_dosen');");

echo "<script type='text/javascript'>window.top.location='nilaiDosen.php';</script>"; exit;
}
?>