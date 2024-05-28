<!DOCTYPE html> 
<html>
    <head>
        <title>
            Edit Dosen
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

        $nidn=$_GET['dosen_nidn'];
        $dosen=mysqli_query($mysqli,"SELECT * from dosen where dosen_nidn='$nidn' ");

        while($dosen_data=mysqli_fetch_array($dosen))
        {
            $nidn=$dosen_data['dosen_nidn'];
            $dosen_nama=$dosen_data['dosen_nama'];
         

        }

        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="editDosen.php?dosen_nidn=<?php echo $nidn;?>" method="post" name="form1">
                        <center style="padding:2.5%">EDIT DOSEN</center>
                        <table width="100%" class="table-bordered" cellpaddings="10" border="0">
                            <tr>
                                <td>NIDN</td>
                                <td><input type="text" readonly='' class="form-control" name="dosen_nidn" value="<?php echo $nidn;?>"></td>
                            </tr>
                            <tr>
                                <td>Nama Dosen</td>
                                <td><input type="text" class="form-control" name="dosen_nama" value="<?php echo $dosen_nama;?>"></td>
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
    $nidn=$_POST['dosen_nidn'];
    $dosen_nama=$_POST['dosen_nama'];

    
    $result=mysqli_query($mysqli,"UPDATE dosen SET dosen_nidn='$nidn',dosen_nama ='$dosen_nama'  
    where dosen_nidn='$nidn';");
    // echo("Data berhasil diubah ! <br>");
    // echo("note : klik ulang menu submit untuk undo");
    header("Location:dosen.php");
}
?>