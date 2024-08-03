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

$tampil = mysqli_query($conn, "SELECT * FROM bakat WHERE id_user = '{$_SESSION['id_user']}' ");
$data = mysqli_fetch_array($tampil);
$cek = mysqli_num_rows($tampil);
if ($cek == 0){
    echo "
    <script>
        alert('Data belum ada, tidak dapat dirubah !');
        document.location.href = 'jurusan.php';
    </script>
    ";
}
$id_user = $_SESSION['id_user'];
if (isset($_POST["submit"])) {
    $klerikal = $_POST["klerikal"];
    $spasial = $_POST["spasial"];
    $mekanik = $_POST["mekanik"];
    $bahasa = $_POST["bahasa"];
    $verbal = $_POST["verbal"];
    $kuantitatif = $_POST["kuantitatif"];
    $penalaran = $_POST["penalaran"];

    $sql = "UPDATE bakat SET klerikal='$klerikal',spasial='$spasial',mekanik='$mekanik',bahasa='$bahasa',verbal='$verbal',kuantitatif='$kuantitatif',penalaran='$penalaran' WHERE id_user='$id_user'";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('data berhasil diubah !');
            document.location.href = 'jurusan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ubah !');
            document.location.href = 'jurusan.php';
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
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nilai Bakat</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikal" value="<?=$data['klerikal']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Klerikal')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasial" value="<?=$data['spasial']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Spasial')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanik"value="<?=$data['mekanik']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Mekanik')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasa" value="<?=$data['bahasa']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Bahasa')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbal" value="<?=$data['verbal']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Verbal')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatif" value="<?=$data['kuantitatif']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Kuantitatif')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalaran" value="<?=$data['penalaran']?>" required oninvalid="this.setCustomValidity('Masukan Nilai Penalaran')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
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