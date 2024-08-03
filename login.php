<?php

session_start();
if(isset($_SESSION['username'])){
    if($_SESSION['status'] == 1){
        header("location:admin/dashboard.php");
    }else if($_SESSION['status'] == 2){
        header("location:siswa/dashboard.php");
    }
}
include 'koneksi.php';
if(isset($_POST["submit"])){
    $username =$_POST["username"];
    $password = $_POST["password"];
    

    $result = mysqli_query($conn,"SELECT * FROM user where username = '$username' and password=MD5('$password')");

    //menghitung jumlah data yang ditemukan
    $cek =mysqli_num_rows($result);
    //cek username & password sudah ditemukan
    if($cek > 0){
        $data = mysqli_fetch_array($result);
        //cek login sebagai admin
        if($data['status']=="1" ){
            //session login dan username
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['nisn'] = $data['nisn'];
            $_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
            $_SESSION['tanggal_lahir'] = $data['tanggal_lahir'];
            $_SESSION['jurusan'] = $data['id_jurusan'];
            $_SESSION['sekolah'] =$data['sekolah'];
            $_SESSION['status'] = $data['status'];

            //alihkan ke halaman dashbord admin
            header("location:admin/dashboard.php");
        }else if($data['status']=="2"){
            //session login dan username
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $data['nama'];
            $_SESSION['nisn'] = $data['nisn'];
            $_SESSION['jenis_kelamin'] = $data['jenis_kelamin'];
            $_SESSION['tanggal_lahir'] = $data['tanggal_lahir'];
            $_SESSION['jurusan'] = $data['id_jurusan'];
            $_SESSION['sekolah'] =$data['sekolah'];
            $_SESSION['status'] = $data['status'];

            //alihkan ke halaman dashbord siswa
            header("location:siswa/dashboard.php");
            // header("location:admin/dashboard.php");
        }else{
            //alihkan ke halaman logi kembali
            $error=true;
        }
    }else{
        $error=true;
    }
}

?>


<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Rekomendasi Perguruan Tinggi</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/favicon.png">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link href="css/style.css" rel="stylesheet">
    
</head>

<body class="h-100">
    
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <div class="text-center"><h4>login</h4></div>
        
                                <form class="mt-5 mb-5 login-input" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                                    </div>
                                    <button class="btn login-form__btn submit w-100" name="submit">Sign In</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>
</body>
</html>





