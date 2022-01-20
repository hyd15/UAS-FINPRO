<?php 
function buat($buat){
	session_start();
  if( !isset($_SESSION['username']) ){
    $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
    header('Location: login.php');
  }
$conn = mysqli_connect("localhost","root","","fp");
	$judul = htmlspecialchars($buat["judul"]);
	$genre = htmlspecialchars($buat["genre"]);
	$sinopsis = htmlspecialchars($buat["sinopsis"]);
	$isi = htmlspecialchars($buat["isi"]);
	$username = htmlspecialchars($_SESSION['username']);

	$gambar=gambar();
	if (!$gambar) {
		return false;
	}

	$query = "INSERT INTO artikel Values 
				('','$judul','$genre','$sinopsis','$isi','$gambar','$username')";

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
