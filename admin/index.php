<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
    // exit;
}else if($_SESSION['status'] == 1){
    header("location:dashboard.php");
}else if($_SESSION['status']== 2){
    header("location:dashboard.php");
}

?>