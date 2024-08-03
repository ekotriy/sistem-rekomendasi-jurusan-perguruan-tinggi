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

$tampil = mysqli_query($conn, "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan WHERE user.username = '{$_SESSION['username']}'");
$data = mysqli_fetch_assoc($tampil);

$id_user = $_SESSION['id_user'];
if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $nama = $_POST["nama"];
    $nisn = $_POST["nisn"];
    $jenis_kelamin = $_POST["jenis_kelamin"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $sekolah = $_POST["sekolah"];

    $sql = "UPDATE user SET username='$username',nama='$nama',nisn='$nisn',jenis_kelamin='$jenis_kelamin',tanggal_lahir='$tanggal_lahir',sekolah='$sekolah' WHERE id_user='$id_user'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('data berhasil diubah !');
            document.location.href = 'profil.php';
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

include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebarsiswa.php');
?>
<div class="content-body">

    <!-- row -->

    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img class="" src="../images/user/user.png" width="80" height="80" alt="">

                        </div>
                        <h4>Tentang Saya</h4>
                        <p class="text-muted">Hi, Saya <?php echo $_SESSION['nama'] ?> dari <?php echo $_SESSION['sekolah'] ?>.</p>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">NISN</strong> <span><?= $data['nisn'] ?></span></li>
                            <li><strong class="text-dark mr-4">Jurusan</strong> <span><?= $data['jurusan'] ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
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
                                        <!-- <input type="text" class="form-control" id="val-jenis-kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin'] ?>"> -->
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
                                        <input type="text" class="form-control" id="val-jurusan" name="jurusan" value="<?= $data['jurusan'] ?>">
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

<?php
include('../parsial/footer.php');
?>