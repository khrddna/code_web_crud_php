<?php

    require 'koneksi.php';

if (isset($_POST['bsimpan'])) 
{

  if (tambah($_POST) > 0 ) //jika simpan sukses
   {
    echo "<script>
          alert('Simpan Data Sukses!');
          document.location=('index.php');
          </script>";
  }
  else
  {
      echo "<script>
            alert('Simpan GAGAL!');
            document.location=('index.php');
            </script>";
            
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
            </ul>
          </li>
          
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
        
    <!-- /.content-header -->

<!-- Awal Card Form -->
<div class="card">
  <div class="card-header bg-secondary text-white text-center">
   FORM TAMBAH DATA DIRI
  </div>
  <form method="post" action="" enctype="multipart/form-data">
  <div class="card-body">
         <div class="card-body">
      <div class="row g-5">
         <div class="col">
        <label>Nama</label>
        <input type="text" name="nama" value="" class="form-control" placeholder="input Nama Anda" required>
      </div>
      <div class="col">
        <label>Jenis Kelamin</label>
        <select class=" form-control" name="jeniskelamain">
          <option value=""></option>
          <option value="Perempuan">Perempuan</option>
          <option value="Laki-laki">Laki-laki</option>
        </select>
      </div>  
      <div class="col">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="" class="form-control" placeholder="input Nis Anda" required>
      </div>
       <div class="col">
        <label>Alamat</label>
        <input type="text" name="alamat" value="" class="form-control" placeholder="Input Alamat Anda" required>
      </div>
       </div>
       <div class="row g-6">
      <div class="col">
        <label>Agama</label>
        <input type="text" name="agama" value="" class="form-control" placeholder="Input Agama Anda" required>
      </div>
      <div class="col">
        <label>E-mail</label>
        <input type="text" name="email" value="" class="form-control" placeholder="Input Sekolah Anda" required>
      </div>
      <div class="col">
        <label>No Telp</label>
        <input type="text" name="no_telp" value="" class="form-control" placeholder="Input Sekolah Anda" required>
      </div>
       <div class="mb-3">
      <label>Gambar</label>
      <input class="form-control" type="file" name="gambar" id="formFile">
    </div>
    </div>
       </div>
      </div>
  </div>

  <div class="card">
  <div class="card-header bg-secondary text-white text-center">
   FORM TAMBAH KEAHLIAN
  </div>
  <div class="card-body">
   <div class="card-body">
   <div class="row g-4">
      <div class="col">
        <label>Bidang</label>
        <input type="text" name="bidang1" value="" class="form-control" placeholder="input Bidang Pertama Anda" >
      </div>
      <div class="col">
        <label>Program</label>
        <input type="text" name="program1" value="" class="form-control" placeholder="input Program Pertama Anda" >
      </div>
    <div class="col">
      <label>Kompetensi</label>
      <input type="text" name="kompetensi1" value="" class="form-control" placeholder="input Kompetensi Pertama Anda" >
    </div>
  </div>
  <div class="row g-4">
      <div class="col">
        <label></label>
        <input type="text" name="bidang2" value="" class="form-control" placeholder="input Bidang Kedua Anda">
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="program2" value="" class="form-control" placeholder="input Program Kedua Anda">
      </div>
    <div class="col">
      <label></label>
      <input type="text" name="kompetensi2" value="" class="form-control" placeholder="input Kompetensi Kedua Anda">
    </div>
  </div>
  <div class="row g-4">
      <div class="col">
        <label></label>
        <input type="text" name="bidang3" value="" class="form-control" placeholder="input Bidang Ketiga Anda">
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="program3" value="" class="form-control" placeholder="input Program Ketiga Anda">
      </div>
    <div class="col">
      <label></label>
      <input type="text" name="kompetensi3" value="" class="form-control" placeholder="input Kompetensi Ketiga Anda">
    </div>
  </div>
  </div>
</div>
</div>

 <div class="card">  
  <div class="card-header bg-secondary text-white text-center">
   FORM TAMBAH PENDIDIKAN
  </div>
  <div class="card-body">
      <div class="container">
      <div class="row g-3">
      <div class="col">
        <label>Riwayat Pendidikan</label>
        <input type="text" name="riwayat_pendidikan1" value="" class="form-control" placeholder="input Riwayat Pendidikan Anda" >
      </div>
      <div class="col">
        <label>Nama Pendidikan</label>
        <input type="text" name="nama_pendidikan1" value="" class="form-control" placeholder="input Nama Pendidikan Anda" >
      </div>
      </div>
      <div class="row g-3">
      <div class="col">
        <label></label>
        <input type="text" name="riwayat_pendidikan2" value="" class="form-control" placeholder="input Riwayat Pendidikan Anda" >
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="nama_pendidikan2" value="" class="form-control" placeholder="input Nama Pendidikan Anda" >
      </div>
      </div>
      <div class="row g-3">
      <div class="col">
        <label></label>
        <input type="text" name="riwayat_pendidikan3" value="" class="form-control" placeholder="input Riwayat Pendidikan Anda" >
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="nama_pendidikan3" value="" class="form-control" placeholder="input Nama Pendidikan Anda" >
      </div>
      </div>
      <div class="row g-3">
      <div class="col">
        <label></label>
        <input type="text" name="riwayat_pendidikan4" value="" class="form-control" placeholder="input Riwayat Pendidikan Anda" >
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="nama_pendidikan4" value="" class="form-control" placeholder="input Nama Pendidikan Anda" >
      </div>
      </div>
      <div class="row g-3">
      <div class="col">
        <label></label>
        <input type="text" name="riwayat_pendidikan5" value="" class="form-control" placeholder="input Riwayat Pendidikan Anda" >
      </div>
      <div class="col">
        <label></label>
        <input type="text" name="nama_pendidikan5" value="" class="form-control" placeholder="input Nama Pendidikan Anda" >
      </div>
      </div>
    </div>
  </div>

      <div class="container">
      <button type="submit" class="btn btn-success"  name="bsimpan">Simpan</button>
       <a href="index.php?" class="btn btn-danger">Back</a>
      </div>

    </form>
  </div>
</div>
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