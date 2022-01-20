<?php
$host     = 'sql207.epizy.com';
$user     = 'epiz_30828605'; // diisi dengan user database kalian biasanya
                    // defaultnya bernama root jika kita belum 
                    // merubahnya
$password = 'wWpzRq9AiNz';  //diisi dengan password database kalian biasanya
                 // defaultnya kosong
$db       = 'epiz_30828605_fp'; //diisi dengan nama database kalian
  
$con = mysqli_connect($host, $user, $password, $db) or die(mysqli_error());
?>
 