<?php
 // session_start();
 //  if ( !isset($_SESSION["login"])) {
 //    header("Location: login.php");
 //    exit;
 //  }

    require 'koneksi.php';

$latihan = query("SELECT * FROM data_diri1 order by id_utama desc");
 
if (isset($_POST["cari"])) 
{
 $latihan = cari($_POST["keyword"]);

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
        <div class="row mb-2">
          <div class="col-sm-6">
          <h1 class="m-0">DAFTAR DATA</h1>
             <nav class="navbar navbar-light bg-light">
        <form action="" method="post" class="form-inline">
         <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Search" aria-label="Search" autocomplete="off">
         <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="cari"><i class="fas fa-search"></i></button>
      </form>
   </nav>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="tambah.php?" class="btn btn-light"><img src="img/add-list-icon--icon-search-engine-26.png" width="50px"></a>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
                  <div class="row">
        <div class="col-12">
            <div class="card">
             
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                     <th>No</th>
                     <th>Gambar</th>
                     <th>Nama</th>
                     <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>Agama</th>
                    <th>E-mail</th>
                    <th>No Telp</th>
                    
                    <th class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                   <?php $i = 1;
    foreach ($latihan as $data) : ?>

      <tr>
        <td><?= $i++; ?></td> 
        <td><img src="img/<?=$data['gambar']?>" width="50"></td>
        <td><?=$data['nama']?></td>
        <td><?=$data['jeniskelamain']?></td>
        <td><?=$data['tanggal_lahir']?></td>
        <td><?=$data['alamat']?></td>
        <td><?=$data['agama']?></td>
        <td><?=$data['email']?></td>
        <td><?=$data['no_telp']?></td>
        <td>
          <a href="detail.php?hal=edit&id=<?=$data['id_utama']?>" class="btn btn-light"><img src="img/images.png" width="30px"></a>
          <a href="update.php?hal=edit&id=<?=$data['id_utama']?>" class="btn btn-light"><img src="img/creat-icon-12.jpg" width="30px"></a>
          <a href="delete.php?hal=hapus&id=<?=$data['id_utama']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-light"><img src="img/2019149.png" width="30px"></a>
                </td>
                  </tr>
            <?php endforeach; ?>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


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
