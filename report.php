<!doctype html>
<html>
    <head>    <!-- <script>
        x=10;
            </script> -->
        <!-- <style>
            
            .table{
                
                padding-right: 10%;
                padding-left : 10%;
            }
        </style> -->
        <title>
            Laporan Mahasiswa
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
        $kerjaPraktik= mysqli_query($mysqli,"SELECT * from `kp` NATURAL join `mahasiswa`; ");
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
        <table class="table table-bordered" >
            
            <thead>
            <tr>
        
                <td class="text-center">NIM</td>
                <td class="text-center">ID KP</td>

                <td class="text-center">Tanggal Mulai KP</td>
                <td class="text-center">Judul KP</td>
                <td class="text-center">Tanggal Selesai KP</td>
                <td class="text-center">Nilai Akhir</td>
                <td class="text-center">Nama Mahasiswa</td>
                <td class="text-center">Email Mahasiswa</td>
                <td class="text-center">Prodi Mahasiswa</td>
                <td class="text-center">Tanggal Lahir Mahasiswa</td>
                <td class="text-center">SKS Mahasiswa</td>
                <td class="text-center">IPK Mahasiswa</td>
                <td class="text-center">Semester Mahasiswa</td>








            </tr>
            </thead>
            <tbody>
                <?php
                while($kp = mysqli_fetch_array($kerjaPraktik)){
                    echo"
                    <tr>
            
                    <td>".$kp['mhs_nim']."</td>
                    <td>".$kp['kp_id']."</td>
                    <td>".$kp['tgl_mulai_kp']."</td>
                    <td>".$kp['judul_kp']."</td>
                    <td>".$kp['tanggal_selesai_kp']."</td>
                    <td>".$kp['nilai_akhir']."</td>
                    <td>".$kp['mhs_nama']."</td>
                    <td>".$kp['mhs_email']."</td>
                    <td>".$kp['mhs_prodi']."</td>
                    <td>".$kp['mhs_tanggal_lahir']."</td>
                    <td>".$kp['mhs_sks']."</td>
                    <td>".$kp['mhs_ipk']."</td>
                    <td>".$kp['mhs_semester']."</td>



                   
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