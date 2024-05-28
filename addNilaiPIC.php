<!DOCTYPE html> 
<html>
    <head>
        <title>
            Tambah Nilai PIC
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
 
        $nilaiDosen=mysqli_query($mysqli,"SELECT * from `nilai pic`");
        $kp=mysqli_query($mysqli,"SELECT * from kp ");
        $pic=mysqli_query($mysqli,"SELECT * from pic ");
        while($nilai_pic_data=mysqli_fetch_array($nilaiDosen))
        {
            $pic_id=$nilai_pic_data['pic_id'];
            $kp_id=$nilai_pic_data['kp_id'];
            $nilai_pic=$nilai_pic_data['nilai_pic'];

           


         

        }



        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="addNilaiPIC.php" method="post" name="form1">
                        <center style="padding:2.5%">TAMBAH NILAI PIC</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID PIC</td>
                                <td> <select class="form-control" name="pic_id"  >
                                <?php
                                        while($pic_data=mysqli_fetch_array($pic)){
                                            echo"
                                            
                                            <option value=".$pic_data['pic_id']." >".$pic_data['pic_id']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select></td>
                            </tr>
                            <tr>
                                <td>ID KP</td>
                                <td> <select class="form-control" name="kp_id"  >
                                <?php
                                        while($kp_data=mysqli_fetch_array($kp)){
                                            echo"
                                            
                                            <option value=".$kp_data['kp_id']." >".$kp_data['kp_id']."</option>
                                            ";
                                        }
                                        ?>
                                

                                    </select></td>
                            </tr>
                            <tr>
                                <td>Nilai PIC</td>
                                <td><input type="text" class="form-control" name="nilai_pic"></td>
                            </tr>
                            

                            <tr>
                                <td></td>
                                <td><input type="submit" class="form-control btn btn-primary" name="submit_nilai_pic" value="Tambah"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['submit_nilai_pic'])){
        $kp_id=$_POST['kp_id'];
        $pic_id=$_POST['pic_id'];
        $nilai_pic = $_POST['nilai_pic'];

        // $dosen_nidn=$_POST['dosen_nidn'];
        // $dosen_nama=$_POST['dosen_nama'];
        // insert into `dosen`(`dosen_nidn`,`dosen_nama`) VALues('$dosen_nidn','$dosen_nama')


        
        $insert=mysqli_query($mysqli,"INSERT INTO  `nilai pic`(`pic_id`,`kp_id`,`nilai_pic`)
        VALUES('$pic_id','$kp_id','$nilai_pic');");

        header("Location:nilaiPIC.php");
    }
?>