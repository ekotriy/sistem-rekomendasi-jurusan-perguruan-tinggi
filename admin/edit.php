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
$id =$_GET['id'];
$tampil = mysqli_query($conn, "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan WHERE user.id_user = $id");
$data = mysqli_fetch_array($tampil);
$sqluser = mysqli_query($conn,"SELECT * FROM user WHERE id_user='$id'");
$user = mysqli_fetch_array($sqluser);

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $nisn = $_POST["nisn"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $jurusan =$_POST['jurusan'];
    $sekolah = $_POST["sekolah"];

    $sql = "UPDATE user SET username='$username',nama='$nama',nisn='$nisn',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',id_jurusan='$jurusan',sekolah='$sekolah' WHERE id_user='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('data berhasil diubah !');
            document.location.href = 'manajemen.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ubah !');
            document.location.href = 'profil.php';
        </script>
        ";
    }
}

if(isset($_POST["reset"])){
    if($user['status'] == 1){
        $password = md5('admin');
        $reset = mysqli_query($conn, "UPDATE user SET password='$password' WHERE id_user='$id'");
        header("location: manajemen.php");
    }else if($user['status'] == 2){
        $password = md5($user['nisn']);
        $reset = mysqli_query($conn, "UPDATE user SET password='$password' WHERE id_user='$id'");
        header("location: manajemen.php");
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
                        <h4 class="card-title">Edit Pengguna</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="#" method="post">
                                <input type="hidden" name="id" value="<?= $data['id_user'] ?>">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Username</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-username" name="username" value="<?= $data['username'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-email">Nama</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-email" name="nama" value="<?= $data['nama'] ?>" required oninvalid="this.setCustomValidity('Masukan Nama')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-nisn">NISN </label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-nisn" name="nisn" value="<?= $data['nisn'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-jenis-kelamin">Jenis Kelamin</label>
                                    <div class="col-lg-6">
                                        <select id="" class="form-control" name="jenis_kelamin">
                                            <option selected="selected"><?= $data['jenis_kelamin'] ?></option>
                                            <option>Laki-laki</option>
                                            <option>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-tanggal-lahir">Tanggal Lahir</label>
                                    <div class="col-lg-6">
                                        <input type="date" class="form-control" id="val-tanggal-lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-jurusan">Jurusan</label>
                                    <div class="col-lg-6">
                                        <select id="" class="form-control" name="jurusan">
                                            <option selected="selected" value="<?=$data['id_jurusan']?>"><?= $data['jurusan'] ?></option>
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
                                        <input type="text" class="form-control" id="val-sekolah" name="sekolah" value="<?= $data['sekolah'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-warning">Perbarui Profil</button>
                                        <button type="submit" name="reset" class="btn btn-danger">Reset Password</button>
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