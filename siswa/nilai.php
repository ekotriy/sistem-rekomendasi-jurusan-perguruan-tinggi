<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
if($_SESSION['status'] == 1){
    header("location: ../login.php");
}
include "../koneksi.php";

$bakat = "SELECT * FROM user WHERE id_user = '{$_SESSION['id_user']}'";
$resultb = mysqli_query($conn, $bakat);
$data = mysqli_fetch_array($resultb);

if ($data['id_jurusan']=="1") {
    header("location:perkantoran/semester1.php");
}else if($data['id_jurusan']=="2"){
    header("location:akuntansi/semester1.php");
}else if($data['id_jurusan']=="3"){
    header("location:pemasaran/semester1.php");
}else if($data['id_jurusan']=="4"){
    header("location:busana/semester1.php");
}else if($data['id_jurusan']=="5"){
    header("location:tari/semester1.php");
}else if($data['id_jurusan']=="6"){
    header("location:kecantikan/semester1.php");
}
?>