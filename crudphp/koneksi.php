<?php
// Koneksi ke DB & Pilih Database
	$conn = mysqli_connect('localhost', 'root', '', 'latihan');
	

// Query isi tabel data_diri1

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
while ($row = mysqli_fetch_assoc($result)) {
  $rows[] = $row;
}
	return $rows;
}
	function tambah($data) {
			global $conn;

		// error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
			$gambar        = upload();
				if ( !$gambar) {
					return false;
				}
			$nama 			= htmlspecialchars($data["nama"]);
			$jeniskelamain  = htmlspecialchars($data["jeniskelamain"]);
			$tanggal_lahir  = htmlspecialchars($data["tanggal_lahir"]);
			$alamat         = htmlspecialchars($data["alamat"]);
			$agama          = htmlspecialchars($data["agama"]);
			$email          = htmlspecialchars($data["email"]);
			$no_telp        = htmlspecialchars($data["no_telp"]);
			

			$simpan		= "INSERT INTO data_diri1
						   VALUES (null, '$nama', '$jeniskelamain', '$tanggal_lahir', '$alamat', '$agama', '$email', '$no_telp', '$gambar')";
		   $idUtama 	= mysqli_insert_id($conn,);

	if ($conn->query($simpan) == true) {
			$last_id = $conn->insert_id;
			for ($i = 1; $i <= 3; $i++){
			
				$bidang 	= htmlspecialchars($data['bidang' . $i]);
				$program 	= htmlspecialchars($data['program' . $i]);
				$kompetensi = htmlspecialchars($data['kompetensi' . $i]);
			if($bidang != '' || $program != '' || $kompetensi != '' ){

			$tambah = "INSERT INTO keahlian 
					VALUES (null, '$last_id', '$bidang', '$program', '$kompetensi')";
					mysqli_query($conn, $tambah) or die (mysqli_error($conn));
				}	 
			}
			for ($i = 1; $i <= 5; $i++){
			$riwayat_pendidikan 	= htmlspecialchars($data['riwayat_pendidikan' . $i]);
			$nama_pendidikan 			= htmlspecialchars($data['nama_pendidikan' . $i]);

			if($riwayat_pendidikan != '' || $nama_pendidikan != '' ){

			$query = "INSERT INTO pendidikan VALUES (null, '$last_id', '$riwayat_pendidikan', '$nama_pendidikan')";
					mysqli_query($conn, $query) or die (mysqli_error($conn));
		
				}
			}
		}
		 $result = mysqli_affected_rows($conn);
				mysqli_close($conn);

				return $result;
		}

	function upload(){

		$namaFile = $_FILES['gambar']['name'];
		$ukuranFile = $_FILES['gambar']['size'];
		$error = $_FILES['gambar']['error'];
		$tmpName = $_FILES['gambar']['tmp_name'];

		if ($error === 4) {
			echo"<script>
				alert('pilih gambar terlebih dhulu');
				</script>";
			return false;
		}

		$ekstensiGambarValid = ['jpg','jpeg', 'png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end($ekstensiGambar));
		if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
			echo"<script>
				alert('yang anda upload bukan gambar!!!');
				</script>";
			return false;
		}
	if ($ukuranFile > 1000000) {
		echo"<script>
				alert('ukuran gambar terlalu besar');
				</script>";
			return false;
	}
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	move_uploaded_file($tmpName, 'img/'. $namaFileBaru);
	return $namaFileBaru;

	}
		
		function hapus($id) {
			global $conn;
			mysqli_query($conn, "DELETE FROM keahlian WHERE id_utama =$id") or die(mysqli_error($conn));

			mysqli_query($conn, "DELETE FROM pendidikan WHERE id_utama = $id") or die(mysqli_error($conn));

			mysqli_query($conn, "DELETE FROM data_diri1 WHERE id_utama = $id") or die(mysqli_error($conn));
			$result = mysqli_affected_rows($conn);
				mysqli_close($conn);
			return $result;
	}
	function ubah($data) {
		global $conn;
		// error_reporting(E_ALL ^ E_WARNING || E_NOTICE);
	$id  			= $data["id_utama"];
	$nama          	= htmlspecialchars($data["nama"]);
	$jeniskelamain 	= htmlspecialchars($data["jeniskelamain"]);
	$tanggal_lahir 	= htmlspecialchars($data["tanggal_lahir"]);
	$alamat        	= htmlspecialchars($data["alamat"]);
	$agama         	= htmlspecialchars($data["agama"]);
	$email         	= htmlspecialchars($data["email"]);
	$no_telp       	= htmlspecialchars($data["no_telp"]);
	$gambarLama     = htmlspecialchars($data["gambarLama"]);

	if ($_FILES['gambar']['error'] === 4) {
		$gambar = $gambarLama;
	}else{
		$gambar = upload();
	}

	$bidang       		= $data["bidang"];
	$program       		= $data["program"];
	$kompetensi    		= $data["kompetensi"];
	$id_pendidikan 		= $data["id_pelajar"];
	$riwayat_pendidikan	= $data["riwayat_pendidikan"];
	$nama_pendidikan	= $data["nama_pendidikan"];
	$id_keahlian  		= $data["id"];
	$simpan = "UPDATE data_diri1 SET 	nama          ='$nama',
										jeniskelamain ='$jeniskelamain',
										tanggal_lahir ='$tanggal_lahir',
										alamat        ='$alamat',
										agama         ='$agama',
										email         ='$email',
										no_telp       ='$no_telp',
										gambar 		  ='$gambar' WHERE id_utama = $id "; 
										mysqli_query($conn, $simpan) or die (mysqli_error($conn));
										$result = mysqli_affected_rows($conn);
								if($result > 0){
								return $result;}
										
	$last_id = $id;
if ($conn->query($simpan) == true) {
	for ($i = 0; $i < 3; $i++){
		if ($bidang[$i] == null|| $program[$i] == null || $kompetensi[$i] == null ) {
			$hapus =mysqli_query($conn, "DELETE FROM keahlian WHERE keahlian.id = $id_keahlian[$i]");
			$result = mysqli_affected_rows($conn);
								if($result > 0){
								return $result;}
			// var_dump($hapus);
			// die();
		}
		elseif($id_keahlian[$i] > 0){
		$query1 =mysqli_query($conn, "UPDATE keahlian 
									SET bidang		='$bidang[$i]', 
										program 	='$program[$i]', 
										kompetensi	='$kompetensi[$i]' WHERE keahlian.id = $id_keahlian[$i]"); 
		$result = mysqli_affected_rows($conn);
								if($result > 0)
								{return $result;}
								// var_dump($query1);
								// die();	
		}
		else{
			if(trim($bidang[$i]) != '' || trim($program[$i]) != '' || trim($kompetensi[$i]) != '' ){
				$tambah = mysqli_query($conn, "INSERT INTO keahlian 
					VALUES (null, '$last_id', '$bidang[$i]', '$program[$i]', '$kompetensi[$i]')");
					$result = mysqli_affected_rows($conn);
								if($result > 0)
								{return $result;}
					// var_dump($tambah);
					//  die();
			}	 
		}
	} 
	for ($i = 0; $i < 5; $i++){
		if ($riwayat_pendidikan[$i] == null || $nama_pendidikan[$i] == null ) {
			$hapus =mysqli_query($conn, "DELETE FROM pendidikan WHERE pendidikan.id_pelajar = $id_pendidikan[$i]");
				$result = mysqli_affected_rows($conn);
								if($result > 0)
								{return $result;}
								
			// var_dump($result);
			// die();
		}
		elseif ($id_pendidikan[$i] > 0) {
			$query2 = mysqli_query($conn,"UPDATE pendidikan SET riwayat_pendidikan ='$riwayat_pendidikan[$i]', 
											nama_pendidikan			='$nama_pendidikan[$i]' 
											WHERE pendidikan.id_pelajar = $id_pendidikan[$i]");
				$result = mysqli_affected_rows($conn);
								if($result > 0)
								{return $result;}
		}else{
			if(trim($riwayat_pendidikan[$i]) != '' || trim($nama_pendidikan[$i]) != '' ){
			$query =mysqli_query($conn, "INSERT INTO pendidikan 
					VALUES (null, '$last_id', '$riwayat_pendidikan[$i]', '$nama_pendidikan[$i]')");
					
				$result = mysqli_affected_rows($conn);
								if($result > 0)
								{return $result;}
				}
			}
		}
	}

	$conn->close();
	}

	function cari($keyword){
		$query = "SELECT * FROM data_diri1 WHERE 
					nama LIKE '%$keyword%' OR
					jeniskelamain LIKE '%$keyword%' OR
					tanggal_lahir LIKE '%$keyword%' OR
					alamat LIKE '%$keyword%' OR
					agama LIKE '%$keyword%' OR
					email LIKE '%$keyword%' OR					 
					no_telp  LIKE '%$keyword%' ";
		return query($query);
	}

	function registrasi($data){
		global $conn;

		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($conn, $data["password"]);
		$password2 = mysqli_real_escape_string($conn, $data["password2"]);

		$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('username sudah terdaftar!!')
				</script>";
			return false;
		}
		if ($password !== $password2 ) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!!');
				</script>";
			return false;
		}
		$password = password_hash($password, PASSWORD_DEFAULT);
		mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
		return mysqli_affected_rows($conn);


	}


  ?>