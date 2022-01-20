<?php 

$conn = mysqli_connect("sql207.epizy.com","epiz_30828605","wWpzRq9AiNz","epiz_30828605_fp");


function query($query){
	global $conn;
	$result=mysqli_query($conn,$query);
	$rows=[];
	while($row=mysqli_fetch_assoc($result)){
		$rows[]=$row;
	}
	return $rows;
}



 ?>