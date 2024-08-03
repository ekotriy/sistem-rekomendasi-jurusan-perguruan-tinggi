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

$resultcek = mysqli_query($conn, "SELECT * FROM pengetahuan WHERE id_user = '{$_SESSION['id_user']}' ");

$cek = mysqli_num_rows($resultcek);

if($cek > 0){
    // $data - mysqli_fetch_array($resultcek);
    echo "
        <script>
            alert('Data sudah ada, tidak dapat ditambah !');
            document.location.href = 'jurusan.php';
        </script>
        ";
    // header("location:dashboard.php");
}

$id_user = $_SESSION['id_user'];

if (isset($_POST["submit"])) {
    $bahasa = $_POST["bahasa"];
    $logika = $_POST["logika"];
    $sains = $_POST["sains"];
    $praktek = $_POST["praktek"];
    $sosial = $_POST["sosial"];
    // $id = $_POST['id'];

    $sql = "INSERT INTO pengetahuan (id_user,bahasa,logika,sains,praktek,sosial) VALUES ('$id_user','$bahasa','$logika','$sains','$praktek','$sosial')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "
        <script>
            alert('data berhasil ditambah !');
            document.location.href = 'jurusan.php';
        </script>
        ";
    } else {
        echo "
        <script>
            alert('data gagal ditambah !');
            document.location.href = 'jurusan.php';
        </script>
        ";
    }
}

include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebarsiswa.php');
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">

    <!-- row -->

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nilai Pengetahuan</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="" method="post">
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasa" required oninvalid="this.setCustomValidity('Masukan Nilai Bahasa')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logika" required oninvalid="this.setCustomValidity('Masukan Nilai Logika')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sains" required oninvalid="this.setCustomValidity('Masukan Nilai Sains')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="praktek" required oninvalid="this.setCustomValidity('Masukan Nilai Praktek')" oninput="setCustomValidity('')">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosial" required oninvalid="this.setCustomValidity('Masukan Nilai Sosial')" oninput="setCustomValidity('')">
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