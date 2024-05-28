<!doctype html>
<html>
    <head>
    <!-- <script>
        x=10;
            </script> -->
        <!-- <style>
            
            .table{
                
                padding-right: 10%;
                padding-left : 10%;
            }
        </style> -->
        <title>
            Nilai PIC
        </title> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" 
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head> 
    <body>
        <?php
        include_once("connect.php");
        $nilai_pic= mysqli_query($mysqli,"SELECT * FROM `nilai pic`");
        ?>
       
       <div>

<div class="row" style="margin: 50px; justify-content:center;">
<div class="col-md-3 text-center">
       <br>
        <a href="report.php"><b>Laporan Mahasiswa</b></a>
<br><br>
</div>
    <div >
       <br>
        <a href="kp.php"><b>Kerja Praktik</b></a>
<br><br>
</div>
<div class="col-md-3 text-center">
       <br>
        <a href="dosen.php"><b>Dosen</b></a>
<br><br>
</div>
<div >
       <br>
        <a href="mahasiswa.php"><b>Mahasiswa</b></a>
<br><br>
</div>
<div class="col-md-3 text-center">
       <br>
        <a href="nilaiDosen.php"><b>Nilai Dosen</b></a>
<br><br>
</div>
<div >
       <br>
        <a href="nilaiPIC.php"><b>Nilai PIC</b></a>
<br><br>
</div>
<div class="col-md-3 text-center">
       <br>
        <a href="perusahaan.php"><b>Perusahaan</b></a>
<br><br>
</div>
<div >
       <br>
        <a href="PIC.php"><b>PIC</b></a>
<br><br>
</div>
</div>
</div>
        
        
           
            <div class="row"> 
                
            <!-- <div class="table"> -->
                <div class="col-md-12">
                <a href="addNilaiPIC.php" class="btn btn-primary">Tambah Entitas</a><br><br>
        <table class="table table-bordered" >
            
            <thead>
            <tr>
        
                <td class="text-center">ID PIC</td>
                <td class="text-center">ID KP</td>
                <td class="text-center">Nilai PIC</td>
                <td class="text-center">Action</td>




            </tr>
            </thead>
            <tbody>
                <?php
                while($nilai_pic_data = mysqli_fetch_array($nilai_pic)){
                    echo"
                    <tr>
            
            
                    <td>".$nilai_pic_data['pic_id']."</td>
                    <td>".$nilai_pic_data['kp_id']."</td>
                    <td>".$nilai_pic_data['nilai_pic']."</td>

 

                    <td class='text-center'>
                        <a href='editNilaiPIC.php?nilai_pic_id=".$nilai_pic_data['nilai_pic_id']."' class='btn btn-warning'>Edit</a>
                        <a href='deleteNilaiPIC.php?nilai_pic_id=".$nilai_pic_data['nilai_pic_id']."' class='btn btn-danger'>Delete</a>
                    </td>
                   
                </tr>
                    ";
                }
                ?>
        
            </tbody>
        </table>
</div>
</div>
<!-- </div> -->
    </body>
</html>