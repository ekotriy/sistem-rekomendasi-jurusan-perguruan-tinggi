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

// Teknik
$sqlbataspkt = mysqli_query($conn, "SELECT * from b_raport where kode ='r1'");
$pkteknik = mysqli_fetch_array($sqlbataspkt);

// Matematika dan Sains
$sqlbataspkm = mysqli_query($conn, "SELECT * from b_raport where kode ='r2'");
$pkmtk = mysqli_fetch_array($sqlbataspkm);

// Ekonomi/Manajemen
$sqlbataspke = mysqli_query($conn, "SELECT * from b_raport where kode ='r3'");
$pkeko = mysqli_fetch_array($sqlbataspke);

// Psikologi
$sqlbataspkp = mysqli_query($conn, "SELECT * from b_raport where kode ='r4'");
$pkpsik = mysqli_fetch_array($sqlbataspkp);

// Sospol/Hukum/Komunikasi (FISIP)
$sqlbataspkh = mysqli_query($conn, "SELECT * from b_raport where kode ='r5'");
$pksos = mysqli_fetch_array($sqlbataspkh);

// Sastra/Seni/Budaya
$sqlbataspks = mysqli_query($conn, "SELECT * from b_raport where kode ='r6'");
$pksas = mysqli_fetch_array($sqlbataspks);

// Administrasi/Sekretaris
$sqlbataspka = mysqli_query($conn, "SELECT * from b_raport where kode ='r7'");
$pkadm = mysqli_fetch_array($sqlbataspka);

if (isset($_POST["submit"])) {
    // Teknik
    $bahasat = $_POST["bahasat"];
    $logikat = $_POST["logikat"];
    $sainst = $_POST["sainst"];
    $praktekt = $_POST["praktekt"];
    $sosialt = $_POST["sosialt"];
    // Matematika dan Sains
    $bahasam = $_POST["bahasam"];
    $logikam = $_POST["logika"];
    $sainsm = $_POST["sainsm"];
    $praktekm = $_POST["praktekm"];
    $sosialm = $_POST["sosialm"];
    // Ekonomi/Manajemen
    $bahasae = $_POST["bahasae"];
    $logikae = $_POST["logikae"];
    $sainse = $_POST["sainse"];
    $prakteke = $_POST["prakteke"];
    $sosiale = $_POST["sosiale"];
    // Psikologi
    $bahasap = $_POST["bahasap"];
    $logikap = $_POST["logikap"];
    $sainsp = $_POST["sainsp"];
    $praktekp = $_POST["praktekp"];
    $sosialp = $_POST["sosialp"];
    // Sospol/Hukum/Komunikasi (FISIP)
    $bahasah = $_POST["bahasah"];
    $logikah = $_POST["logikah"];
    $sainsh = $_POST["sainsh"];
    $praktekh = $_POST["praktekh"];
    $sosialh = $_POST["sosialh"];
    // Sastra/Seni/Budaya
    $bahasas = $_POST["bahasas"];
    $logikas = $_POST["logikas"];
    $sainss = $_POST["sainss"];
    $prakteks = $_POST["prakteks"];
    $sosials = $_POST["sosials"];
    // Administrasi/Sekretaris
    $bahasaa = $_POST["bahasaa"];
    $logikaa = $_POST["logikaa"];
    $sainsa = $_POST["sainsa"];
    $prakteka = $_POST["prakteka"];
    $sosiala = $_POST["sosiala"];

    $sqlt = "UPDATE b_raport SET bahasa='$bahasat',logika='$logikat',sains='$sainst',praktek='$praktekt',sosial='$sosialt' where kode ='r1'";
    $sqlm = "UPDATE b_raport SET bahasa='$bahasam',logika='$logikam',sains='$sainsm',praktek='$praktekm',sosial='$sosialm' where kode ='r2'";
    $sqle = "UPDATE b_raport SET bahasa='$bahasae',logika='$logikae',sains='$sainse',praktek='$prakteke',sosial='$sosiale' where kode ='r3'";
    $sqlp = "UPDATE b_raport SET bahasa='$bahasap',logika='$logikap',sains='$sainsp',praktek='$praktekp',sosial='$sosialp' where kode ='r4'";
    $sqlh = "UPDATE b_raport SET bahasa='$bahasah',logika='$logikah',sains='$sainsh',praktek='$praktekh',sosial='$sosialh' where kode ='r5'";
    $sqls = "UPDATE b_raport SET bahasa='$bahasas',logika='$logikas',sains='$sainss',praktek='$prakteks',sosial='$sosials' where kode ='r6'";
    $sqla = "UPDATE b_raport SET bahasa='$bahasaa',logika='$logikaa',sains='$sainsa',praktek='$prakteka',sosial='$sosiala' where kode ='r7'";

    $resultt = mysqli_query($conn, $sqlt);
    $resultm = mysqli_query($conn, $sqlm);
    $resulte = mysqli_query($conn, $sqle);
    $resultp = mysqli_query($conn, $sqlp);
    $resulth = mysqli_query($conn, $sqlh);
    $results = mysqli_query($conn, $sqls);
    $resulta = mysqli_query($conn, $sqla);
    if ($resulta) {
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
            document.location.href = 'raport.php';
        </script>
        ";
    }
}

include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebar.php');
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
                        <h4 class="card-title">Batas Nilai Pengetahuan dan Keterampilan</h4>
                        <div class="form-validation">
                            <form class="form-valide" action="" method="post">
                                <!-- Jurusan Teknik -->
                                <div class="">
                                    <h5>Jurusan Teknik</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasat" value="<?= $pkteknik['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikat" value="<?= $pkteknik['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainst" value="<?= $pkteknik['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="praktekt" value="<?= $pkteknik['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosialt" value="<?= $pkteknik['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Matematika dan Sains -->
                                <div class="">
                                    <h5>Jurusan Matematika dan Sains</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasam" value="<?= $pkmtk['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikam" value="<?= $pkmtk['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainsm" value="<?= $pkmtk['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="praktekm" value="<?= $pkmtk['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosialm" value="<?= $pkmtk['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Ekonomi/Manajemen -->
                                <div class="">
                                    <h5>Jurusan Ekonomi/Manajemen</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasae" value="<?= $pkeko['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikae" value="<?= $pkeko['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainse" value="<?= $pkeko['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="prakteke" value="<?= $pkeko['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosiale" value="<?= $pkeko['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Psikologi -->
                                <div class="">
                                    <h5>Jurusan Psikologi</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasap" value="<?= $pkpsik['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikap" value="<?= $pkpsik['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainsp" value="<?= $pkpsik['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="praktekp" value="<?= $pkpsik['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosialp" value="<?= $pkpsik['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Sospol/Hukum/Komunikasi (FISIP) -->
                                <div class="">
                                    <h5>Jurusan Sospol/Hukum/Komunikasi (FISIP)</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasah" value="<?= $pksos['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikah" value="<?= $pksos['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainsh" value="<?= $pksos['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="praktekh" value="<?= $pksos['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosialh" value="<?= $pksos['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Sastra/Seni/Budaya -->
                                <div class="">
                                    <h5>Jurusan Sastra/Seni/Budaya</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasas" value="<?= $pksas['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikas" value="<?= $pksas['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainss" value="<?= $pksas['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="prakteks" value="<?= $pksas['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosials" value="<?= $pksas['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Administrasi/Sekretaris -->
                                <div class="">
                                    <h5>Jurusan Administrasi/Sekretaris</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasaa" value="<?= $pkadm['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-logika">Logika</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-logika" placeholder="Nilai Logika" name="logikaa" value="<?= $pkadm['logika'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sains">Sains</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sains" placeholder="Nilai Sains" name="sainsa" value="<?= $pkadm['sains'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-praktek">Praktek</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-praktek" placeholder="Nilai Praktek" name="prakteka" value="<?= $pkadm['praktek'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-sosial">Sosial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-sosial" placeholder="Nilai Sosial" name="sosiala" value="<?= $pkadm['sosial'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" name="submit" class="btn btn-warning">Ubah</button>
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