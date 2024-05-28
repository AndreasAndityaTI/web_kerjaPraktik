<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Perusahaan
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

        $pic_id=$_GET['perusahaan_npwp'];
        $pic_id_data=mysqli_query($mysqli,"SELECT * from `perusahaan` where perusahaan_npwp='$pic_id' ");

        while($nilai_pic_data=mysqli_fetch_array($pic_id_data))
        {
            $pic_id=$nilai_pic_data['perusahaan_npwp'];
            $perusahaan_nama=$nilai_pic_data['perusahaan_nama'];
            $perushaan_alamat=$nilai_pic_data['perusahaan_alamat'];

           


         

        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editPerusahaan.php?perusahaan_npwp=<?php echo $pic_id;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT PERUSAHAAN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NPWP</td>
                                <td><input type="text" readonly='' class="form-control" name="npwp" value="<?php echo $pic_id;?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Perusahaan</td>
                                <td><input type="text" class="form-control" name="perusahaan_nama" value="<?php echo $perusahaan_nama;?>"></td>
                            </tr>
                            <tr>
                                <td>Alamat Perusahaan</td>
                                <td><input type="text" class="form-control" name="perusahaan_alamat" value="<?php echo $perushaan_alamat;?>"></td>
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

    $npwp=$_POST['npwp'];
    $alamat=$_POST['perusahaan_alamat'];
    $nama_perusahaan=$_POST['perusahaan_nama'];

    $result=mysqli_query($mysqli,"UPDATE perusahaan SET perusahaan_npwp='$npwp', perusahaan_nama='$nama_perusahaan'  , perusahaan_alamat ='$alamat'
    where perusahaan_npwp='$npwp';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    header("Location:perusahaan.php");
}
?>