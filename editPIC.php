<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit PIC
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

        $id_kp=$_GET['pic_id'];
        $kp=mysqli_query($mysqli,"SELECT * from pic where pic_id='$id_kp' ");
        $array_perusahaan=mysqli_query($mysqli,"SELECT * from perusahaan ");
        while($kp_data=mysqli_fetch_array($kp))
        {
            $id_kp=$kp_data['pic_id'];
            $npwp = $kp_data['perusahaan_npwp'];
            $nip=$kp_data['pic_nip'];
            $nama = $kp_data['pic_nama'];



        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editPIC.php?pic_id=<?php echo $id_kp;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT PIC</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID PIC</td>
                                <td><input type="text" readonly='' class="form-control" name="pic_id" value="<?php echo $id_kp;?>"></td>
                            </tr>
                            <tr>
                                <td>NPWP Perusahaan</td>
                                <!-- <td><input type="text" class="form-control" name="perusahaan_npwp" value=" echo $npwp;"></td> -->
                                <td> <select class="form-control" name="perusahaan_npwp"  >
                                <?php
                                echo "<option>$npwp</option>";
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
                                <td><input type="text" class="form-control" name="pic_nip" value="<?php echo $nip;?>"></td>
                            </tr>
                            <tr>
                                <td>Nama PIC</td>
                                <td><input type="text" class="form-control" name="pic_nama" value="<?php echo $nama;?>"></td>
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

    $id_kp=$_POST['pic_id'];
    $npwp = $_POST['perusahaan_npwp'];
    $nip=$_POST['pic_nip'];
    $nama = $_POST['pic_nama'];



    
    $result=mysqli_query($mysqli,"UPDATE pic SET pic_id='$id_kp', perusahaan_npwp='$npwp', pic_nip='$nip',
    pic_nama='$nama'
    where pic_id='$id_kp';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    header("Location:pic.php");
}
?>