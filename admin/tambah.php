<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
if($_SESSION['status'] == 2){
    header("location: ../login.php");
}
include "../koneksi.php";

$sqljurusan = mysqli_query($conn, "SELECT * FROM `jurusan`");
$jurusan = mysqli_fetch_array($sqljurusan);


if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $nisn = $_POST["nisn"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jurusan =$_POST['jurusan'];
    $sekolah = $_POST["sekolah"];
    $password = md5($_POST["nisn"]) ;
    $status = $_POST["status"];

    if($status == 1){
        $result = mysqli_query($conn,"SELECT * FROM user where username = '$username'");
        $cek =mysqli_num_rows($result);
        if($cek > 0){
            echo "
            <script>
                alert('Username Sudah Ada !');
                document.location.href = 'tambah.php';
            </script>
            ";
            die("proses berhenti");
        }else{
            $pasadmin = md5('admin');
        $sql = "INSERT INTO user (username,password,nama,nisn,jenis_kelamin,tanggal_lahir,id_jurusan,sekolah,status) VALUES ('$username','$pasadmin','$nama','$nisn','$jenis_kelamin','$tanggal_lahir','$jurusan','$sekolah',$status)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "
            <script>
                alert('data berhasil tambah !');
                document.location.href = 'manajemen.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal di tambah !');
                document.location.href = 'manajemen.php';
            </script>
            ";
        }
        }
    }else{
        $result = mysqli_query($conn,"SELECT * FROM user where username = '$nisn'");
        $cek =mysqli_num_rows($result);
        if($cek > 0){
            echo "
            <script>
                alert('NISN Sudah Ada !');
                document.location.href = 'tambah.php';
            </script>
            ";
            die("proses berhenti");
        }else{
            $sql = "INSERT INTO user (username,password,nama,nisn,jenis_kelamin,tanggal_lahir,id_jurusan,sekolah,status) VALUES ('$nisn','$password','$nama','$nisn','$jenis_kelamin','$tanggal_lahir','$jurusan','$sekolah',$status)";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "
            <script>
                alert('data berhasil tambah !');
                document.location.href = 'manajemen.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('data gagal di tambah !');
                document.location.href = 'manajemen.php';
            </script>
            ";
        }
        }
    }
}


include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebar.php');
?>
<div class="content-body">

    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Pengguna</h4>
                        <div class="form-validation">
                            <form class="form-valide" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Username</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="username" placeholder="Masukan Username" required oninvalid="this.setCustomValidity('Masukan Username')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Nama</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="nama" placeholder="Masukan Nama" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-nisn">NISN </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-nisn" name="nisn" placeholder="Masukan NISN" required oninvalid="this.setCustomValidity('Masukan NISN')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-jenis-kelamin">Jenis Kelamin</label>
                                    <div class="col-lg-6">
                                        <select id="" class="form-control" name="jenis_kelamin">
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-tanggal-lahir">Tanggal Lahir</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-tanggal-lahir" name="tanggal_lahir" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-jurusan">Jurusan</label>
                                    <div class="col-lg-6">
                                        <select id="" class="form-control" name="jurusan">
                                            
                                            <option value="<?= $jurusan['id_jurusan'];?>"><?= $jurusan['jurusan'] ?></option>
                                            <?php while ($j = mysqli_fetch_array($sqljurusan)) : ?>
                                            <option value="<?= $j['id_jurusan'];?>"><?= $j['jurusan'];?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-sekolah">Sekolah</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-sekolah" name="sekolah"  placeholder="Nama Sekolah" required oninvalid="this.setCustomValidity('Masukkan Nama Sekolah')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-jenis-kelamin">Status</label>
                                    <div class="col-lg-6">
                                        <select id="" class="form-control" name="status">
                                            <option value="2">Siswa</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
        Content body end
    ***********************************-->
<?php
include('../parsial/footer.php');
?>