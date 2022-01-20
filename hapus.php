<?php 
require 'db_conn.php';
require 'hapus_fungsi.php';

$id_artikel = $_GET["key"];

if(hapus($id_artikel)>0){
echo "<script>alert('Cerita anda telah dihapus');
	document.location.href='viewUpload.php';</script>";
}


 ?>

 