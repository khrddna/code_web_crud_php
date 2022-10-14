<?php

  require 'koneksi.php';

  $id2 = $_GET["id"];

    $d = query("SELECT * FROM data_diri1 WHERE id_utama = $id2 ")[0];
    $k = query("SELECT id,bidang, program, kompetensi FROM keahlian WHERE keahlian.id_utama = $id2 ");
    $p = query("SELECT id_pelajar, riwayat_pendidikan, nama_pendidikan FROM pendidikan WHERE pendidikan.id_utama = $id2 ");
    // $row = mysqli_fetch_assoc($result);
    // if ($row) 
    // {
    //   //jika data ditemukan, maka data ditampung kedalam variabel
    //   $vnama          = $row['nama'];
    //   $vjeniskelamain = $row['jeniskelamain'];
    //   $vtanggal_lahir = $row['tanggal_lahir'];
    //   $valamat        = $row['alamat'];
    //   $vagama         = $row['agama'];
    //   $vemail         = $row['email'];
    //   $vno_telp       = $row['no_telp'];
    //   $vbidang        = $row['bidang'];
    //   $vprogram       = $row['program'];
    //   $vkompetensi    = $row['kompetensi'];
    //   $vname_school   = $row['name_school'];
    //   $vkelas         = $row['kelas'];

    // }

//jika tombol simpan diklik
    if (isset($_POST['bsimpan'])) 
    {
        //Pengujian Apakah data akan diedit atau disimpan baru 
      if ( ubah($_POST) > 0) 
        {
           // echo "<script>
           //      alert ('Edit Data Sukses!');
           //      document.location='index.php';
           //      </script>";
        }
      else
        {
         // echo "<script>
         //        alert ('Edit data gagal!');
         //        document.location='index.php';
         //        </script>";
        }  
    }

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WEB CRUD2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
   

    <!-- Right navbar links -->
   
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
   

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user4-128x128.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Khrddna21</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <a href="index.php" class="nav-link active">
              <i class=""></i>
              <p>
               Data Diri
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            
              <li class="nav-item mt-2">
                <a href="keahlian.php" class="nav-link active">
                 
                  <p>Keahlian</p>
                </a>
              </li>
               <li class="nav-item mt-2">
                <a href="pendik.php" class="nav-link active">
                 
                  <p>Pendidikan</p>
                </a>
              </li>
            <ul class="nav nav-treeview">
            </ul>
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
    <!--  <div class="container mt-5"> -->
       <div class="jumbotron jumbotron-fluid navbar-white bg-white">
  <div class="container text-center">
    <img src="img/<?=$d["gambar"]; ?>" width="100" class="rounded-circle">
    <h1 class="display-3">PROFIL</h1>
    <p class="lead"><?=$d["nama"]; ?></p>
  </div>
</div>
       <table class="table table-bordered table-striped mt-3">
         
         <tr>
          <td>Nama</td>
          <td>: <?=$d["nama"]; ?></td>
         </tr>
       
         <tr>
          <td>Jenis Kelamin</td>
          <td>: <?= $d["jeniskelamain"]; ?></td>
         </tr>
         <tr>
          <td>Tanggal Lahir</td>
          <td>: <?=$d["tanggal_lahir"]; ?></td>
         </tr>
      

         <tr>
          <td>Alamat</td>
          <td>: <?=$d["alamat"]; ?></td>
         </tr>
         
         <tr>
          <td>Agama</td>
          <td>: <?=$d["agama"]; ?></td>
         </tr>
         <tr>
          <td>E-mail</td>
          <td>: <?=$d["email"]; ?></td>
         </tr>
         <tr>
          <td>No Telp</td>
          <td>: <?=$d["no_telp"]; ?></td>
         </tr>
        
       
     <table class="table table-bordered table-striped mt-3">

         <thead>
          <th>Bidang</th>
          <th>Program</th>
          <th>Kompetensi</th>
         </thead>
          <tr>
          <td><?php for ($i = 0; $i < sizeof($k); $i++) { ?>
        <!--   <p>Bidang ke <?= $i; ?></p> -->
          <p>- <?=$k[$i]['bidang']; ?></p>
          <?php } ?></td>
          <td> <?php for ($i = 0; $i < sizeof($k); $i++) { ?>
          <p>- <?=$k[$i]['program']; ?></p>
          <?php } ?></td>
          <td><?php for ($i = 0; $i < sizeof($k); $i++) { ?>
          <p>- <?=$k[$i]['kompetensi']; ?></p>
          <?php } ?></td>
         </tr>
          <tr>
          
          
         </tr>
        </table> 
        </table>
<table class="table table-bordered table-striped mt-3">
          <thead>
            <th>Riwayat Pendidikan</th>
            <th>Nama Pendidikan</th>    
         </thead>
          <tr >
          <td><?php for ($i = 0; $i < sizeof($p); $i++) { ?>
          <p>- <?=$p[$i]['riwayat_pendidikan']; ?></p>
          <?php } ?></td>
          <td><?php for ($i = 0; $i < sizeof($p); $i++) { ?>
          <p>- <?=$p[$i]['nama_pendidikan']; ?></p>
          <?php } ?></td>
         </tr>
</table>

     </div>   
    
    <!-- /.content-header -->

<!-- Awal Card Form -->
  
<!-- Akhir Card Form -->
      </div><!-- /.container-fluid -->
    </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong> &copy; <a href="https://adminlte.io"></a></strong> 
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="asssets/dist/js/adminlte.min.js"></script>
</body>
</html>