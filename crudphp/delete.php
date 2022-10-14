<?php 

    require 'koneksi.php';

   $id = $_GET["id"];


     if (hapus($id) > 0 )

 
        {
           echo "<script>
                alert('Hapus data sukses!!');
                document.location='index.php';
                </script>";
        }
         else
        {
            echo "<script>
                alert('Hapus data gagal!!');
                document.location='index.php';
                </script>";
        }
    

 ?>