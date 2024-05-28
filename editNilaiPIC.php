<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Nilai PIC
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

        $nilai_pic_id=$_GET['nilai_pic_id'];
        $pic_id_data=mysqli_query($mysqli,"SELECT * from `nilai pic` where nilai_pic_id='$nilai_pic_id' ");
        $kp=mysqli_query($mysqli,"SELECT * from kp ");
        $pic=mysqli_query($mysqli,"SELECT * from pic ");


        while($nilai_pic_data=mysqli_fetch_array($pic_id_data))
        {
            $pic_id=$nilai_pic_data['pic_id'];
            $kp_id=$nilai_pic_data['kp_id'];
            $nilai_pic=$nilai_pic_data['nilai_pic'];

           


         

        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editNilaiPIC.php?nilai_pic_id=<?php echo $nilai_pic_id;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT NILAI PIC</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>ID PIC</td>
                                <td> <select class="form-control" name="pic_id"  >
                                <?php
                                echo "<option>$pic_id</option>";
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
                                echo "<option>$kp_id</option>";
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
                                <td><input type="text" class="form-control" name="nilai_pic" value="<?php echo $nilai_pic;?>"></td>
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

    $pic_id=$_POST['pic_id'];
    $kp_id=$_POST['kp_id'];
    $nilai_pic=$_POST['nilai_pic'];

    $result=mysqli_query($mysqli,"UPDATE `nilai pic` SET pic_id='$pic_id',kp_id ='$kp_id',nilai_pic='$nilai_pic'  
    where nilai_pic_id='$nilai_pic_id';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    echo "<script type='text/javascript'>window.top.location='nilaiPIC.php';</script>"; exit;
}
?>