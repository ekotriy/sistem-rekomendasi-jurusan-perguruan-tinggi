<?php

$host='localhost';//server database
$user='root';//user database
$pass='';//password
$db_nama='db_database'; //nama database

$conn=mysqli_connect($host,$user,$pass,$db_nama);
if(!$conn){
    die('Gagal terhubung :'.mysqli_connect_error());
}

?>