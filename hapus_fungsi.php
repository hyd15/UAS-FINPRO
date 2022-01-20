<?php 

function hapus($hapus){
$conn = mysqli_connect("localhost","root","","fp");
$query = "DELETE FROM artikel WHERE id_artikel=$hapus";
mysqli_query($conn,$query);

return mysqli_affected_rows($conn);

}

 ?>