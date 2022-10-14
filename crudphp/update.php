<?php

  require 'koneksi.php';

  $id2 = $_GET["id"];

    $d = query("SELECT * FROM data_diri1 WHERE id_utama = $id2 ")[0];
    $k = query("SELECT id,bidang, program, kompetensi FROM keahlian WHERE keahlian.id_utama = $id2 ");
    $p = query("SELECT id_pelajar, riwayat_pendidikan, nama_pendidikan FROM pendidikan WHERE pendidikan.id_utama = $id2 ");
    // $row = mysqli_fetch_assoc($result);
    // if ($row) 
    // {
    //   jika data ditemukan, maka data ditampung kedalam variabel
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
           echo "<script>
                alert ('Edit Data Sukses!');
                document.location='index.php';
                </script>";
        }
      else
        {
          echo "<script>
                alert ('Edit Data Gagal!!');
                document.location='index.php';
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
        
    
    <!-- /.content-header -->

<!-- Awal Card Form -->
<div class="card">
  <div class="card-header bg-secondary text-white text-center">
   FORM UPDATE DATA DIRI
  </div>
  <form method="post" action="" enctype="multipart/form-data">
   <input type="hidden" name="id_utama" value="<?=$d['id_utama']; ?>">
    <input type="hidden" name="gambarLama" value="<?=$d['gambar']; ?>">   
     
  <div class="card-body">
         <div class="card-body">
      <div class="row g-5">
         <div class="col">
        <label>Nama</label>
        <input type="text" name="nama" value="<?=$d["nama"]; ?>" class="form-control" placeholder="input Nama Anda" required>
      </div>
      <div class="col">
       <label>Jenis Kelamin <?= $d["jeniskelamain"]; ?></label>
        <select class=" form-control" name="jeniskelamain">
          <option value="">Pilih Jenis</option>
          <option value="Perempuan" <?php if($d["jeniskelamain"] == "perempuan") { echo "selected";} ?>>Perempuan</option>
          <option value="Laki-laki" <?php if($d["jeniskelamain"] == "laki-laki") { echo "selected";} ?>>Laki-laki</option>
        </select>
      </div>  
      <div class="col">
        <label>Tanggal Lahir</label>
        <input type="date" name="tanggal_lahir" value="<?=$d["tanggal_lahir"]; ?>" class="form-control" placeholder="input Nis Anda" required>
      </div>
        
        
       <div class="col">
        <label>Alamat</label>
        <input type="text" name="alamat" value="<?=$d["alamat"]; ?>" class="form-control" placeholder="Input Alamat Anda" required>
      </div>
      </div>
      <div class="row g-5">
      <div class="col">
        <label>Agama</label>
        <input type="text" name="agama" value="<?=$d["agama"]; ?>" class="form-control" placeholder="Input Agama Anda" required>
      </div>
      <div class="col">
        <label>E-mail</label>
        <input type="text" name="email" value="<?=$d["email"]; ?>" class="form-control" placeholder="Input Sekolah Anda" required>
      </div>
      <div class="col">
        <label>No Telp</label>
        <input type="text" name="no_telp" value="<?=$d["no_telp"]; ?>" class="form-control" placeholder="Input Sekolah Anda" required>
      </div>
       </div>
       <div class="row g-5">
        <div class="col">
          <label>Gambar</label><br>
        <img src="img/<?=$d["gambar"]; ?>" width="100px">
        <div class="card" style="width: 300px;">
       <div class="card-body">
      <input class="form-control" type="file" name="gambar">
        </div>
      </div>
      </div>
      </div>
    </div>
       </div>
      </div>

  <div class="card">
  <div class="card-header bg-secondary text-white text-center">
   FORM UPDATE KEAHLIAN
  </div>
  <div class="card-body">               
   <div class="card-body">
   <div class="row g-2">
      <div class="col">
        <label>Bidang</label>
        <?php for ($i = 0; $i < 3; $i++) { ?>
        <input type="hidden" name="id[]" value="<?=$k[$i]['id']; ?>" >
        <p><input class="form-control" type="form-control" name="bidang[]" value="<?=isset($k[$i]['bidang']) ? $k[$i]['bidang'] : '' ;?>"></p><?php } ?>
      </div>
    
      <div class="col">
        <label>Program</label>
        <?php for ($i = 0; $i < 3; $i++) { ?>
        <p><input class="form-control" type="form-control" name="program[]" value="<?=isset($k[$i]['program']) ? $k[$i]['program'] : '' ;?>"></p><?php } ?>
      </div>
    <div class="col">
      <label>Kompetensi</label>
      <?php for ($i = 0; $i < 3; $i++) { ?>
      <p><input class="form-control" type="form-control" name="kompetensi[]" value="<?=isset($k[$i]['kompetensi']) ? $k[$i]['kompetensi'] : '' ;?>"></p><?php } ?>
    </div>
  </div>
 
  </div>
  </div>
</div>
</div>
  
 <div class="card">  
  <div class="card-header bg-secondary text-white text-center">
   FORM UPDATE PENDIDIKAN
  </div>
  <div class="card-body">
      <div class="container">
      <div class="row g-3">
     <div class="col">
      <label>Riwayat Pendidikan</label>
      <?php for ($i = 0; $i < 5; $i++) { ?>
        <input type="hidden" name="id_pelajar[]" value="<?=$p[$i]['id_pelajar']; ?>" >
        <p><input class="form-control" type="form-control" name="riwayat_pendidikan[]" value="<?=isset($p[$i]['riwayat_pendidikan']) ? $p[$i]['riwayat_pendidikan'] : '' ;?>"></p>
        <?php } ?>
    </div>
     <div class="col">
      <label>Tahun Lulus</label>
      <?php for ($i = 0; $i < 5; $i++) { ?>
        <p><input class="form-control" type="form-control" name="nama_pendidikan[]" value="<?=isset($p[$i]['nama_pendidikan']) ? $p[$i]['nama_pendidikan'] : '' ;?>"></p>
        <?php } ?>
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