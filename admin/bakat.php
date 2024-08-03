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
$sqlbatasbt = mysqli_query($conn, "SELECT * from b_bakat where kode ='r1'");
$bteknik = mysqli_fetch_array($sqlbatasbt);

// Matematika dan Sains
$sqlbatasbm = mysqli_query($conn, "SELECT * from b_bakat where kode ='r2'");
$bmtk = mysqli_fetch_array($sqlbatasbm);

// Ekonomi/Manajemen
$sqlbatasbe = mysqli_query($conn, "SELECT * from b_bakat where kode ='r3'");
$beko = mysqli_fetch_array($sqlbatasbe);

// Psikologi
$sqlbatasbp = mysqli_query($conn, "SELECT * from b_bakat where kode ='r4'");
$bpsik = mysqli_fetch_array($sqlbatasbp);

// Sospol/Hukum/Komunikasi (FISIP)
$sqlbatasbh = mysqli_query($conn, "SELECT * from b_bakat where kode ='r5'");
$bsos = mysqli_fetch_array($sqlbatasbh);

// Sastra/Seni/Budaya
$sqlbatasbs = mysqli_query($conn, "SELECT * from b_bakat where kode ='r6'");
$bsas = mysqli_fetch_array($sqlbatasbs);

// Administrasi/Sekretaris
$sqlbatasba = mysqli_query($conn, "SELECT * from b_bakat where kode ='r7'");
$badm = mysqli_fetch_array($sqlbatasba);

if (isset($_POST["submit"])) {
    // Teknik
    $klerikalt = $_POST["klerikalt"];
    $spasialt = $_POST["spasialt"];
    $mekanikt = $_POST["mekanikt"];
    $bahasat = $_POST["bahasat"];
    $verbalt = $_POST["verbalt"];
    $kuantitatift = $_POST["kuantitatift"];
    $penalarant = $_POST["penalarant"];
    // Matematika dan Sains
    $klerikalm = $_POST["klerikalm"];
    $spasialm = $_POST["spasialm"];
    $mekanikm = $_POST["mekanikm"];
    $bahasam = $_POST["bahasam"];
    $verbalm = $_POST["verbalm"];
    $kuantitatifm = $_POST["kuantitatifm"];
    $penalaranm = $_POST["penalaranm"];
    // Ekonomi/Manajemen
    $klerikale = $_POST["klerikale"];
    $spasiale = $_POST["spasiale"];
    $mekanike = $_POST["mekanike"];
    $bahasae = $_POST["bahasae"];
    $verbale = $_POST["verbale"];
    $kuantitatife = $_POST["kuantitatife"];
    $penalarane = $_POST["penalarane"];
    // Psikologi
    $klerikalp = $_POST["klerikalp"];
    $spasialp = $_POST["spasialp"];
    $mekanikp = $_POST["mekanikp"];
    $bahasap = $_POST["bahasap"];
    $verbalp = $_POST["verbalp"];
    $kuantitatifp = $_POST["kuantitatifp"];
    $penalaranp = $_POST["penalaranp"];
    // Sospol/Hukum/Komunikasi (FISIP)
    $klerikalh = $_POST["klerikalh"];
    $spasialh = $_POST["spasialh"];
    $mekanikh = $_POST["mekanikh"];
    $bahasah = $_POST["bahasah"];
    $verbalh = $_POST["verbalh"];
    $kuantitatifh = $_POST["kuantitatifh"];
    $penalaranh = $_POST["penalaranh"];
    // Sastra/Seni/Budaya
    $klerikals = $_POST["klerikals"];
    $spasials = $_POST["spasials"];
    $mekaniks = $_POST["mekaniks"];
    $bahasas = $_POST["bahasas"];
    $verbals = $_POST["verbals"];
    $kuantitatifs = $_POST["kuantitatifs"];
    $penalarans = $_POST["penalarans"];
    // Administrasi/Sekretaris
    $klerikala = $_POST["klerikala"];
    $spasiala = $_POST["spasiala"];
    $mekanika = $_POST["mekanika"];
    $bahasaa = $_POST["bahasaa"];
    $verbala = $_POST["verbala"];
    $kuantitatifa = $_POST["kuantitatifa"];
    $penalarana = $_POST["penalarana"];

    $sqlt = "UPDATE b_bakat SET klerikal='$klerikalt',spasial='$spasialt',mekanik='$mekanikt',bahasa='$bahasat',verbal='$verbalt',kuantitatif='$kuantitatift',penalaran='$penalarant' where kode ='r1'";
    $sqlm = "UPDATE b_bakat SET klerikal='$klerikalm',spasial='$spasialm',mekanik='$mekanikm',bahasa='$bahasam',verbal='$verbalm',kuantitatif='$kuantitatifm',penalaran='$penalaranm' where kode ='r2'";
    $sqle = "UPDATE b_bakat SET klerikal='$klerikale',spasial='$spasiale',mekanik='$mekanike',bahasa='$bahasae',verbal='$verbale',kuantitatif='$kuantitatife',penalaran='$penalarane' where kode ='r3'";
    $sqlp = "UPDATE b_bakat SET klerikal='$klerikalp',spasial='$spasialp',mekanik='$mekanikp',bahasa='$bahasap',verbal='$verbalp',kuantitatif='$kuantitatifp',penalaran='$penalaranp' where kode ='r4'";
    $sqlh = "UPDATE b_bakat SET klerikal='$klerikalh',spasial='$spasialh',mekanik='$mekanikh',bahasa='$bahasah',verbal='$verbalh',kuantitatif='$kuantitatifh',penalaran='$penalaranh' where kode ='r5'";
    $sqls = "UPDATE b_bakat SET klerikal='$klerikals',spasial='$spasials',mekanik='$mekaniks',bahasa='$bahasas',verbal='$verbals',kuantitatif='$kuantitatifs',penalaran='$penalarans' where kode ='r6'";
    $sqla = "UPDATE b_bakat SET klerikal='$klerikala',spasial='$spasiala',mekanik='$mekanika',bahasa='$bahasaa',verbal='$verbala',kuantitatif='$kuantitatifa',penalaran='$penalarana' where kode ='r7'";

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
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikalt" value="<?= $bteknik['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasialt" value="<?= $bteknik['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanikt" value="<?= $bteknik['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasat" value="<?= $bteknik['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbalt" value="<?= $bteknik['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatift" value="<?= $bteknik['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalarant" value="<?= $bteknik['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Matematika dan Sains -->
                                <div class="">
                                    <h5>Jurusan Matematika dan Sains</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikalm" value="<?= $bmtk['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasialm" value="<?= $bmtk['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanikm" value="<?= $bmtk['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasam" value="<?= $bmtk['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbalm" value="<?= $bmtk['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatifm" value="<?= $bmtk['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalaranm" value="<?= $bmtk['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Ekonomi/Manajemen -->
                                <div class="">
                                    <h5>Jurusan Ekonomi/Manajemen</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikale" value="<?= $beko['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasiale" value="<?= $beko['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanike" value="<?= $beko['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasae" value="<?= $beko['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbale" value="<?= $beko['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatife" value="<?= $beko['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalarane" value="<?= $beko['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Psikologi -->
                                <div class="">
                                    <h5>Jurusan Psikologi</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikalp" value="<?= $bpsik['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasialp" value="<?= $bpsik['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanikp" value="<?= $bpsik['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasap" value="<?= $bpsik['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbalp" value="<?= $bpsik['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatifp" value="<?= $bpsik['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalaranp" value="<?= $bpsik['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Sospol/Hukum/Komunikasi (FISIP) -->
                                <div class="">
                                    <h5>Jurusan Sospol/Hukum/Komunikasi (FISIP)</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikalh" value="<?= $bsos['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasialh" value="<?= $bsos['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanikh" value="<?= $bsos['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasah" value="<?= $bsos['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbalh" value="<?= $bsos['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatifh" value="<?= $bsos['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalaranh" value="<?= $bsos['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Sastra/Seni/Budaya -->
                                <div class="">
                                    <h5>Jurusan Sastra/Seni/Budaya</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikals" value="<?= $bsas['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasials" value="<?= $bsas['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekaniks" value="<?= $bsas['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasas" value="<?= $bsas['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbals" value="<?= $bsas['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatifs" value="<?= $bsas['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalarans" value="<?= $bsas['penalaran'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- Jurusan Administrasi/Sekretaris -->
                                <div class="">
                                    <h5>Jurusan Administrasi/Sekretaris</h5>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-klerikal">Klerikal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-klerikal" placeholder="Nilai Klerikal" name="klerikala" value="<?= $badm['klerikal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-spasial">Spasial</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-spasial" placeholder="Nilai Spasial" name="spasiala" value="<?= $badm['spasial'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-mekanik">Mekanik</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-mekanik" placeholder="Nilai Mekanik" name="mekanika" value="<?= $badm['mekanik'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-bahasa">Bahasa</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-bahasa" placeholder="Nilai Bahasa" name="bahasaa" value="<?= $badm['bahasa'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-verbal">Verbal</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-verbal" placeholder="Nilai Verbal" name="verbala" value="<?= $badm['verbal'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-kuantitatif">Kuantitatif</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-kuantitatif" placeholder="Nilai Kuantitatif" name="kuantitatifa" value="<?= $badm['kuantitatif'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-4 col-form-label" for="val-penalaran">Penalaran</label>
                                        <div class="col-lg-6">
                                            <input type="text" class="form-control" id="val-penalaran" placeholder="Nilai Penalaran" name="penalarana" value="<?= $badm['penalaran'] ?>">
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