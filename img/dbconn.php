<?php

$sname = "sql207.epizy.com";
$uname = "epiz_30828605";
$password = "wWpzRq9AiNz";
$db_name = "epiz_30828605_fp";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}