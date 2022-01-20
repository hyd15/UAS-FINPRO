<?php 
function edit($edit){
	session_start();
  if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
  }
$conn = mysqli_connect("localhost","root","","fp");
	$id_artikel = $edit["id_artikel"];
	$judul = htmlspecialchars($edit["judul"]);
	$genre = htmlspecialchars($edit["genre"]);
	$sinopsis = htmlspecialchars($edit["sinopsis"]);
	$isi = htmlspecialchars($edit["isi"]);
	$username = htmlspecialchars($_SESSION['username']);

	$gambar=gambar();
	if (!$gambar) {
		return false;
	}

	$query = "UPDATE artikel SET 
				judul = '$judul', genre='$genre',sinopsis= '$sinopsis',isi='$isi',gambar='$gambar' , username = '$username' WHERE id_artikel =$id_artikel";

	//insert data
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function gambar(){
	$nama_gambar=$_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$temporari=$_FILES['gambar']['tmp_name'];

	if($error===4){
		echo "<script>
			alert('pilih gambar');
		</script>";
		return false;
	}

	$cekGambar=['jpg','jpeg','png'];
	$cekEkstensi = explode('.', $nama_gambar);
	$cekEkstensi = strtolower(end($cekEkstensi));
	if (!in_array($cekEkstensi, $cekGambar)) {
			echo "<script>
			alert('pilih gambar bukan file lain');
		</script>";
		return false;
	}


	$nama_baru = uniqid();
	$nama_baru .= '.';
	$nama_baru .= $cekEkstensi;
	move_uploaded_file($temporari,'img/'.$nama_baru);
	return $nama_baru;



}

 ?>