<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Nilai Dosen
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

        $id_ = ($_GET['nilai_dosen_id']);

        $id_kp_data=mysqli_query($mysqli,"SELECT * from `nilai dosen` where nilai_dosen_id='$id_' ");
        $id_kp_data2=mysqli_query($mysqli,"SELECT * from `nilai dosen`  ");
        $dosen_query = mysqli_query($mysqli, "SELECT * from dosen");
        $kp=mysqli_query($mysqli,"SELECT * from kp ");


        while($nilai_pic_data=mysqli_fetch_array($id_kp_data))
        {

            $id_kp=$nilai_pic_data['kp_id'];
            $dosen_nidn=$nilai_pic_data['dosen_nidn'];
            $status_dosen=$nilai_pic_data['status_dosen'];
            $nilai_dosen=$nilai_pic_data['nilai_dosen'];


         

        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editNilaiDosen.php?nilai_dosen_id=<?php echo $id_;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT NILAI DOSEN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID KP</td>



                                <td> <select class="form-control" name="kp_id"  >
                                <?php
                                echo "<option>$id_kp</option>";
                                while($id_kp_data=mysqli_fetch_array($kp)){
                                     echo"
                                            
                                    <option value=".$id_kp_data['kp_id']." >".$id_kp_data['kp_id']."</option>
                                        ";
                                        }
                                        ?>
                                

                                    </select></td>

                            </tr>
                            <tr>
                                <td>NIDN</td>
                                <td>
                                       <select class="form-control" name="dosen_nidn"  >
                                <?php
                                echo "<option>$dosen_nidn</option>";
                                        while($nidn_data=mysqli_fetch_array($dosen_query)){
                                            echo"
                                            
                                            <option value=".$nidn_data['dosen_nidn']." >".$nidn_data['dosen_nidn']."</option>
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
                                    <option>$status_dosen</option>      
                                    <option>Pembimbing</option>
                                    <option>Penguji</option>

                                    ";

                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <td>Nilai Dosen</td>
                                <td><input type="text" class="form-control" name="nilai_dosen" value="<?php echo $nilai_dosen;?>"></td>
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
    $kp_id=$_POST['kp_id'];
    $dosen_nidn=$_POST['dosen_nidn'];
    $status_dosen=$_POST['dosen_status'];
    $nilai_dosen=$_POST['nilai_dosen'];
    
    $result=mysqli_query($mysqli,"UPDATE `nilai dosen` SET kp_id='$kp_id',dosen_nidn ='$dosen_nidn', status_dosen='$status_dosen', nilai_dosen='$nilai_dosen'  
    where nilai_dosen_id='$id_';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    echo "<script type='text/javascript'>window.top.location='nilaiDosen.php';</script>"; exit;
}
?>