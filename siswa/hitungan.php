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

$resulbakat = mysqli_query($conn, "SELECT * FROM bakat WHERE id_user = '{$_SESSION['id_user']}'");
$cekbakat = mysqli_num_rows($resulbakat);
if($cekbakat === 0){
    echo "
        <script>
            alert('Nilai Bakat Kosong');
            document.location.href = 'jurusan.php';
        </script>
        ";
        die("proses berhenti");
}

$resulpengetahuan = mysqli_query($conn, "SELECT * FROM pengetahuan WHERE id_user = '{$_SESSION['id_user']}'");
$cekpengetahuan = mysqli_num_rows($resulpengetahuan);
if($cekpengetahuan === 0){
    echo "
        <script>
            alert('Nilai Pengetahuan Kosong');
            document.location.href = 'jurusan.php';
        </script>
        ";
        die("proses berhenti");
}

$resulketerampilan = mysqli_query($conn, "SELECT * FROM keterampilan WHERE id_user = '{$_SESSION['id_user']}'");
$cekketerampilan = mysqli_num_rows($resulketerampilan);
if($cekketerampilan === 0){
    echo "
        <script>
            alert('Nilai Keterampilan Kosong');
            document.location.href = 'jurusan.php';
        </script>
        ";
        die("proses berhenti");
}

$sql = "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan WHERE user.username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

$id_user = $_SESSION['id_user'];

$sqlpengetahuan = mysqli_query($conn, "SELECT * FROM pengetahuan WHERE id_user = $id_user");
$pengetahuan = mysqli_fetch_array($sqlpengetahuan);

$sqlketerampilan = mysqli_query($conn, "SELECT * FROM keterampilan WHERE id_user = $id_user");
$keterampilan = mysqli_fetch_array($sqlketerampilan);

// Teknik
$sqlbataspkt= mysqli_query($conn,"SELECT * from b_raport where kode ='r1'");
$pkteknik=mysqli_fetch_array($sqlbataspkt);

// Matematika dan Sains
$sqlbataspkm= mysqli_query($conn,"SELECT * from b_raport where kode ='r2'");
$pkmtk=mysqli_fetch_array($sqlbataspkm);

// Ekonomi/Manajemen
$sqlbataspke= mysqli_query($conn,"SELECT * from b_raport where kode ='r3'");
$pkeko=mysqli_fetch_array($sqlbataspke);

// Psikologi
$sqlbataspkp= mysqli_query($conn,"SELECT * from b_raport where kode ='r4'");
$pkpsik=mysqli_fetch_array($sqlbataspkp);

// Sospol/Hukum/Komunikasi (FISIP)
$sqlbataspkh= mysqli_query($conn,"SELECT * from b_raport where kode ='r5'");
$pksos=mysqli_fetch_array($sqlbataspkh);

// Sastra/Seni/Budaya
$sqlbataspks= mysqli_query($conn,"SELECT * from b_raport where kode ='r6'");
$pksas=mysqli_fetch_array($sqlbataspks);

// Administrasi/Sekretaris
$sqlbataspka= mysqli_query($conn,"SELECT * from b_raport where kode ='r7'");
$pkadm=mysqli_fetch_array($sqlbataspka);

// ---------------------------------------------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------------------------------------------
$sqlbakat = mysqli_query($conn, "SELECT * FROM bakat WHERE id_user = $id_user");
$bakat = mysqli_fetch_array($sqlbakat);

// Teknik
$sqlbatasbt= mysqli_query($conn,"SELECT * from b_bakat where kode ='r1'");
$bteknik=mysqli_fetch_array($sqlbatasbt);

// Matematika dan Sains
$sqlbatasbm= mysqli_query($conn,"SELECT * from b_bakat where kode ='r2'");
$bmtk=mysqli_fetch_array($sqlbatasbm);

// Ekonomi/Manajemen
$sqlbatasbe= mysqli_query($conn,"SELECT * from b_bakat where kode ='r3'");
$beko=mysqli_fetch_array($sqlbatasbe);

// Psikologi
$sqlbatasbp= mysqli_query($conn,"SELECT * from b_bakat where kode ='r4'");
$bpsik=mysqli_fetch_array($sqlbatasbp);

// Sospol/Hukum/Komunikasi (FISIP)
$sqlbatasbh= mysqli_query($conn,"SELECT * from b_bakat where kode ='r5'");
$bsos=mysqli_fetch_array($sqlbatasbh);

// Sastra/Seni/Budaya
$sqlbatasbs= mysqli_query($conn,"SELECT * from b_bakat where kode ='r6'");
$bsas=mysqli_fetch_array($sqlbatasbs);

// Administrasi/Sekretaris
$sqlbatasba= mysqli_query($conn,"SELECT * from b_bakat where kode ='r7'");
$badm=mysqli_fetch_array($sqlbatasba);

/// Nilai Pengetahuan
// Teknik
$pbt = round(($pengetahuan['bahasa'] - $pkteknik['bahasa']) / 10);
$plt = round(($pengetahuan['logika'] - $pkteknik['logika']) / 10);
$pst = round(($pengetahuan['sains'] - $pkteknik['sains']) / 10);
$ppt = round(($pengetahuan['praktek'] - $pkteknik['praktek']) / 10);
$pot = round(($pengetahuan['sosial'] - $pkteknik['sosial']) / 10);

// Matematika dan Sains
$pbm = round(($pengetahuan['bahasa'] - $pkmtk['bahasa']) / 10);
$plm = round(($pengetahuan['logika'] - $pkmtk['logika']) / 10);
$psm = round(($pengetahuan['sains'] - $pkmtk['sains']) / 10);
$ppm = round(($pengetahuan['praktek'] - $pkmtk['praktek']) / 10);
$pom = round(($pengetahuan['sosial'] - $pkmtk['sosial']) / 10);

// Ekonomi/Manajemen
$pbe = round(($pengetahuan['bahasa'] - $pkeko['bahasa']) / 10);
$ple = round(($pengetahuan['logika'] - $pkeko['logika']) / 10);
$pse = round(($pengetahuan['sains'] - $pkeko['sains']) / 10);
$ppe = round(($pengetahuan['praktek'] - $pkeko['praktek']) / 10);
$poe = round(($pengetahuan['sosial'] - $pkeko['sosial']) / 10);

// Psikologi
$pbp = round(($pengetahuan['bahasa'] - $pkpsik['bahasa']) / 10);
$plp = round(($pengetahuan['logika'] - $pkpsik['logika']) / 10);
$psp = round(($pengetahuan['sains'] - $pkpsik['sains']) / 10);
$ppp = round(($pengetahuan['praktek'] - $pkpsik['praktek']) / 10);
$pop = round(($pengetahuan['sosial'] - $pkpsik['sosial']) / 10);

// Sospol/Hukum/Komunikasi (FISIP)
$pbh = round(($pengetahuan['bahasa'] - $pksos['bahasa']) / 10);
$plh = round(($pengetahuan['logika'] - $pksos['logika']) / 10);
$psh = round(($pengetahuan['sains'] - $pksos['sains']) / 10);
$pph = round(($pengetahuan['praktek'] - $pksos['praktek']) / 10);
$poh = round(($pengetahuan['sosial'] - $pksos['sosial']) / 10);

// Sastra/Seni/Budaya
$pbs = round(($pengetahuan['bahasa'] - $pksas['bahasa']) / 10);
$pls = round(($pengetahuan['logika'] - $pksas['logika']) / 10);
$pss = round(($pengetahuan['sains'] - $pksas['sains']) / 10);
$pps = round(($pengetahuan['praktek'] - $pksas['praktek']) / 10);
$pos = round(($pengetahuan['sosial'] - $pksas['sosial']) / 10);

// Administrasi/Sekretaris
$pba = round(($pengetahuan['bahasa'] - $pkadm['bahasa']) / 10);
$pla = round(($pengetahuan['logika'] - $pkadm['logika']) / 10);
$psa = round(($pengetahuan['sains'] - $pkadm['sains']) / 10);
$ppa = round(($pengetahuan['praktek'] - $pkadm['praktek']) / 10);
$poa = round(($pengetahuan['sosial'] - $pkadm['sosial']) / 10);
// Akhir Nilai Pengetahuan
// -------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------
// Nilai Keterampilan
// Teknik
$kbt = round(($keterampilan['bahasa'] - $pkteknik['bahasa']) / 10);
$klt = round(($keterampilan['logika'] - $pkteknik['logika']) / 10);
$kst = round(($keterampilan['sains'] - $pkteknik['sains']) / 10);
$kpt = round(($keterampilan['praktek'] - $pkteknik['praktek']) / 10);
$kot = round(($keterampilan['sosial'] - $pkteknik['sosial']) / 10);

// Matematika dan Sains
$kbm = round(($keterampilan['bahasa'] - $pkmtk['bahasa']) / 10);
$klm = round(($keterampilan['logika'] - $pkmtk['logika']) / 10);
$ksm = round(($keterampilan['sains'] - $pkmtk['sains']) / 10);
$kpm = round(($keterampilan['praktek'] - $pkmtk['praktek']) / 10);
$kom = round(($keterampilan['sosial'] - $pkmtk['sosial']) / 10);

// Ekonomi/Manajemen
$kbe = round(($keterampilan['bahasa'] - $pkeko['bahasa']) / 10);
$kle = round(($keterampilan['logika'] - $pkeko['logika']) / 10);
$kse = round(($keterampilan['sains'] - $pkeko['sains']) / 10);
$kpe = round(($keterampilan['praktek'] - $pkeko['praktek']) / 10);
$koe = round(($keterampilan['sosial'] - $pkeko['sosial']) / 10);

// Psikologi
$kbp = round(($keterampilan['bahasa'] - $pkpsik['bahasa']) / 10);
$klp = round(($keterampilan['logika'] - $pkpsik['logika']) / 10);
$ksp = round(($keterampilan['sains'] - $pkpsik['sains']) / 10);
$kpp = round(($keterampilan['praktek'] - $pkpsik['praktek']) / 10);
$kop = round(($keterampilan['sosial'] - $pkpsik['sosial']) / 10);

// Sospol/Hukum/Komunikasi (FISIP)
$kbh = round(($keterampilan['bahasa'] - $pksos['bahasa']) / 10);
$klh = round(($keterampilan['logika'] - $pksos['logika']) / 10);
$ksh = round(($keterampilan['sains'] - $pksos['sains']) / 10);
$kph = round(($keterampilan['praktek'] - $pksos['praktek']) / 10);
$koh = round(($keterampilan['sosial'] - $pksos['sosial']) / 10);

// Sastra/Seni/Budaya
$kbs = round(($keterampilan['bahasa'] - $pksas['bahasa']) / 10);
$kls = round(($keterampilan['logika'] - $pksas['logika']) / 10);
$kss = round(($keterampilan['sains'] - $pksas['sains']) / 10);
$kps = round(($keterampilan['praktek'] - $pksas['praktek']) / 10);
$kos = round(($keterampilan['sosial'] - $pksas['sosial']) / 10);

// Administrasi/Sekretaris
$kba = round(($keterampilan['bahasa'] - $pkadm['bahasa']) / 10);
$kla = round(($keterampilan['logika'] - $pkadm['logika']) / 10);
$ksa = round(($keterampilan['sains'] - $pkadm['sains']) / 10);
$kpa = round(($keterampilan['praktek'] - $pkadm['praktek']) / 10);
$koa = round(($keterampilan['sosial'] - $pkadm['sosial']) / 10);
// Akhir Nilai Keterampilan
// -------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------------
// Nilai Bakat
// Teknik
$bkt = round(($bakat['klerikal'] - $bteknik['klerikal']) / 10);
$bst = round(($bakat['spasial'] - $bteknik['spasial']) / 10);
$bmt = round(($bakat['mekanik'] - $bteknik['mekanik']) / 10);
$bbt = round(($bakat['bahasa'] - $bteknik['bahasa']) / 10);
$bvt = round(($bakat['verbal'] - $bteknik['verbal']) / 10);
$but = round(($bakat['kuantitatif'] - $bteknik['kuantitatif']) / 10);
$bpt = round(($bakat['penalaran'] - $bteknik['penalaran']) / 10);

// Matematika dan Sains
$bkm = round(($bakat['klerikal'] - $bmtk['klerikal']) / 10);
$bsm = round(($bakat['spasial'] - $bmtk['spasial']) / 10);
$bmm = round(($bakat['mekanik'] - $bmtk['mekanik']) / 10);
$bbm = round(($bakat['bahasa'] - $bmtk['bahasa']) / 10);
$bvm = round(($bakat['verbal'] - $bmtk['verbal']) / 10);
$bum = round(($bakat['kuantitatif'] - $bmtk['kuantitatif']) / 10);
$bpm = round(($bakat['penalaran'] - $bmtk['penalaran']) / 10);

// Ekonomi/Manajemen
$bke = round(($bakat['klerikal'] - $beko['klerikal']) / 10);
$bse = round(($bakat['spasial'] - $beko['spasial']) / 10);
$bme = round(($bakat['mekanik'] - $beko['mekanik']) / 10);
$bbe = round(($bakat['bahasa'] - $beko['bahasa']) / 10);
$bve = round(($bakat['verbal'] - $beko['verbal']) / 10);
$bue = round(($bakat['kuantitatif'] - $beko['kuantitatif']) / 10);
$bpe = round(($bakat['penalaran'] - $beko['penalaran']) / 10);

// Psikologi
$bkp = round(($bakat['klerikal'] - $bpsik['klerikal']) / 10);
$bsp = round(($bakat['spasial'] - $bpsik['spasial']) / 10);
$bmp = round(($bakat['mekanik'] - $bpsik['mekanik']) / 10);
$bbp = round(($bakat['bahasa'] - $bpsik['bahasa']) / 10);
$bvp = round(($bakat['verbal'] - $bpsik['verbal']) / 10);
$bup = round(($bakat['kuantitatif'] - $bpsik['kuantitatif']) / 10);
$bpp = round(($bakat['penalaran'] - $bpsik['penalaran']) / 10);

// Sospol/Hukum/Komunikasi (FISIP)
$bkh = round(($bakat['klerikal'] - $bsos['klerikal']) / 10);
$bsh = round(($bakat['spasial'] - $bsos['spasial']) / 10);
$bmh = round(($bakat['mekanik'] - $bsos['mekanik']) / 10);
$bbh = round(($bakat['bahasa'] - $bsos['bahasa']) / 10);
$bvh = round(($bakat['verbal'] - $bsos['verbal']) / 10);
$buh = round(($bakat['kuantitatif'] - $bsos['kuantitatif']) / 10);
$bph = round(($bakat['penalaran'] - $bsos['penalaran']) / 10);

// Sastra/Seni/Budaya
$bks = round(($bakat['klerikal'] - $bsas['klerikal']) / 10);
$bss = round(($bakat['spasial'] - $bsas['spasial']) / 10);
$bms = round(($bakat['mekanik'] - $bsas['mekanik']) / 10);
$bbs = round(($bakat['bahasa'] - $bsas['bahasa']) / 10);
$bvs = round(($bakat['verbal'] - $bsas['verbal']) / 10);
$bus = round(($bakat['kuantitatif'] - $bsas['kuantitatif']) / 10);
$bps = round(($bakat['penalaran'] - $bsas['penalaran']) / 10);

// Administrasi/Sekretaris
$bka = round(($bakat['klerikal'] - $badm['klerikal']) / 10);
$bsa = round(($bakat['spasial'] - $badm['spasial']) / 10);
$bma = round(($bakat['mekanik'] - $badm['mekanik']) / 10);
$bba = round(($bakat['bahasa'] - $badm['bahasa']) / 10);
$bva = round(($bakat['verbal'] - $badm['verbal']) / 10);
$bua = round(($bakat['kuantitatif'] - $badm['kuantitatif']) / 10);
$bpa = round(($bakat['penalaran'] - $badm['penalaran']) / 10);
// Akhir Nilai Bakat

// niali pengetahuan
    // jurusan teknik
    // nilai konversi GAP Nilai pengetahuan bahasa jurusan teknik
    if ($pbt == -5) {
        $gpbt = 1;
    }
    if ($pbt == -4) {
        $gpbt = 2;
    }
    if ($pbt == -3) {
        $gpbt = 3;
    }
    if ($pbt == -2) {
        $gpbt = 4;
    }
    if ($pbt == -1) {
        $gpbt = 5;
    }
    if ($pbt == 0) {
        $gpbt = 6;
    }
    if ($pbt == 1) {
        $gpbt = 5.5;
    }
    if ($pbt == 2) {
        $gpbt = 4.5;
    }
    if ($pbt == 3) {
        $gpbt = 3.5;
    }
    if ($pbt == 4) {
        $gpbt = 2.5;
    }
    if ($pbt == 5) {
        $gpbt = 1.5;
    }
    // echo $gpbt;

    // nilai konversi GAP Nilai pengetahuan logika jurusan teknik
    if ($plt == -5) {
        $gplt = 1;
    }
    if ($plt == -4) {
        $gplt = 2;
    }
    if ($plt == -3) {
        $gplt = 3;
    }
    if ($plt == -2) {
        $gplt = 4;
    }
    if ($plt == -1) {
        $gplt = 5;
    }
    if ($plt == 0) {
        $gplt = 6;
    }
    if ($plt == 1) {
        $gplt = 5.5;
    }
    if ($plt == 2) {
        $gplt = 4.5;
    }
    if ($plt == 3) {
        $gplt = 3.5;
    }
    if ($plt == 4) {
        $gplt = 2.5;
    }
    if ($plt == 5) {
        $gplt = 1.5;
    }
    // echo ' | ' . $gplt;

    // nilai konversi GAP Nilai pengetahuan sains jurusan teknik
    if ($pst == -5) {
        $gpst = 1;
    }
    if ($pst == -4) {
        $gpst = 2;
    }
    if ($pst == -3) {
        $gpst = 3;
    }
    if ($pst == -2) {
        $gpst = 4;
    }
    if ($pst == -1) {
        $gpst = 5;
    }
    if ($pst == 0) {
        $gpst = 6;
    }
    if ($pst == 1) {
        $gpst = 5.5;
    }
    if ($pst == 2) {
        $gpst = 4.5;
    }
    if ($pst == 3) {
        $gpst = 3.5;
    }
    if ($pst == 4) {
        $gpst = 2.5;
    }
    if ($pst == 5) {
        $gpst = 1.5;
    }
    // echo ' | ' . $gpst;

    // nilai konversi GAP Nilai pengetahuan praktek jurusan teknik
    if ($ppt == -5) {
        $gppt = 1;
    }
    if ($ppt == -4) {
        $gppt = 2;
    }
    if ($ppt == -3) {
        $gppt = 3;
    }
    if ($ppt == -2) {
        $gppt = 4;
    }
    if ($ppt == -1) {
        $gppt = 5;
    }
    if ($ppt == 0) {
        $gppt = 6;
    }
    if ($ppt == 1) {
        $gppt = 5.5;
    }
    if ($ppt == 2) {
        $gppt = 4.5;
    }
    if ($ppt == 3) {
        $gppt = 3.5;
    }
    if ($ppt == 4) {
        $gppt = 2.5;
    }
    if ($ppt == 5) {
        $gppt = 1.5;
    }
    // echo ' | ' . $gppt;

    // nilai konversi GAP Nilai pengetahuan sosial jurusan teknik
    if ($pot == -5) {
        $gpot = 1;
    }
    if ($pot == -4) {
        $gpot = 2;
    }
    if ($pot == -3) {
        $gpot = 3;
    }
    if ($pot == -2) {
        $gpot = 4;
    }
    if ($pot == -1) {
        $gpot = 5;
    }
    if ($pot == 0) {
        $gpot = 6;
    }
    if ($pot == 1) {
        $gpot = 5.5;
    }
    if ($pot == 2) {
        $gpot = 4.5;
    }
    if ($pot == 3) {
        $gpot = 3.5;
    }
    if ($pot == 4) {
        $gpot = 2.5;
    }
    if ($pot == 5) {
        $gpot = 1.5;
    }
    // echo ' | ' . $gpot;
    // nilai gap NCF
    $ncfp1 = ($gplt + $gpst + $gppt) / 3;
    // echo ' | ' . $ncfp1;
    $nsfp1 = ($gpbt + $gpot) / 2;
    // echo ' | ' . $nsfp1;
    $nfkp1 = (2 / 3 * $ncfp1) + (1 / 3 * $nsfp1);
    // echo ' | ' . $nfkp1 . '<br>';
    // akhir jutusan teknik

    // jurusan matematika dan sains
    // nilai konversi GAP Nilai pengetahuan bahasa
    if ($pbm == -5) {
        $gpbm = 1;
    }
    if ($pbm == -4) {
        $gpbm = 2;
    }
    if ($pbm == -3) {
        $gpbm = 3;
    }
    if ($pbm == -2) {
        $gpbm = 4;
    }
    if ($pbm == -1) {
        $gpbm = 5;
    }
    if ($pbm == 0) {
        $gpbm = 6;
    }
    if ($pbm == 1) {
        $gpbm = 5.5;
    }
    if ($pbm == 2) {
        $gpbm = 4.5;
    }
    if ($pbm == 3) {
        $gpbm = 3.5;
    }
    if ($pbm == 4) {
        $gpbm = 2.5;
    }
    if ($pbm == 5) {
        $gpbm = 1.5;
    }
    // echo $gpbm;

    // nilai konversi GAP Nilai pengetahuan logika 
    if ($plm == -5) {
        $gplm = 1;
    }
    if ($plm == -4) {
        $gplm = 2;
    }
    if ($plm == -3) {
        $gplm = 3;
    }
    if ($plm == -2) {
        $gplm = 4;
    }
    if ($plm == -1) {
        $gplm = 5;
    }
    if ($plm == 0) {
        $gplm = 6;
    }
    if ($plm == 1) {
        $gplm = 5.5;
    }
    if ($plm == 2) {
        $gplm = 4.5;
    }
    if ($plm == 3) {
        $gplm = 3.5;
    }
    if ($plm == 4) {
        $gplm = 2.5;
    }
    if ($plm == 5) {
        $gplm = 1.5;
    }
    // echo ' | ' . $gplm;

    // nilai konversi GAP Nilai pengetahuan sains 
    if ($psm == -5) {
        $gpsm = 1;
    }
    if ($psm == -4) {
        $gpsm = 2;
    }
    if ($psm == -3) {
        $gpsm = 3;
    }
    if ($psm == -2) {
        $gpsm = 4;
    }
    if ($psm == -1) {
        $gpsm = 5;
    }
    if ($psm == 0) {
        $gpsm = 6;
    }
    if ($psm == 1) {
        $gpsm = 5.5;
    }
    if ($psm == 2) {
        $gpsm = 4.5;
    }
    if ($psm == 3) {
        $gpsm = 3.5;
    }
    if ($psm == 4) {
        $gpsm = 2.5;
    }
    if ($psm == 5) {
        $gpsm = 1.5;
    }
    // echo ' | ' . $gpsm;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($ppm == -5) {
        $gppm = 1;
    }
    if ($ppm == -4) {
        $gppm = 2;
    }
    if ($ppm == -3) {
        $gppm = 3;
    }
    if ($ppm == -2) {
        $gppm = 4;
    }
    if ($ppm == -1) {
        $gppm = 5;
    }
    if ($ppm == 0) {
        $gppm = 6;
    }
    if ($ppm == 1) {
        $gppm = 5.5;
    }
    if ($ppm == 2) {
        $gppm = 4.5;
    }
    if ($ppm == 3) {
        $gppm = 3.5;
    }
    if ($ppm == 4) {
        $gppm = 2.5;
    }
    if ($ppm == 5) {
        $gppm = 1.5;
    }
    // echo ' | ' . $gppm;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($pom == -5) {
        $gpom = 1;
    }
    if ($pom == -4) {
        $gpom = 2;
    }
    if ($pom == -3) {
        $gpom = 3;
    }
    if ($pom == -2) {
        $gpom = 4;
    }
    if ($pom == -1) {
        $gpom = 5;
    }
    if ($pom == 0) {
        $gpom = 6;
    }
    if ($pom == 1) {
        $gpom = 5.5;
    }
    if ($pom == 2) {
        $gpom = 4.5;
    }
    if ($pom == 3) {
        $gpom = 3.5;
    }
    if ($pom == 4) {
        $gpom = 2.5;
    }
    if ($pom == 5) {
        $gpom = 1.5;
    }
    // echo ' | ' . $gpom;
    // nilai gap NCF
    $ncfpt2 = ($gplm + $gpsm) / 2;
    // echo ' | ' . $ncfpt2;
    $nsfpt2 = ($gpbm + $gppm + $gpom) / 3;
    // echo ' | ' . $nsfpt2;
    $nfkp2 = (2 / 3 * $ncfpt2) + (1 / 3 * $nsfpt2);
    // echo ' | ' . $nfkp2 . '<br>';
    // akhir jutusan matematika dan sains

    // jurusan Ekonomi/manajemen
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($pbe == -5) {
        $gpbe = 1;
    }
    if ($pbe == -4) {
        $gpbe = 2;
    }
    if ($pbe == -3) {
        $gpbe = 3;
    }
    if ($pbe == -2) {
        $gpbe = 4;
    }
    if ($pbe == -1) {
        $gpbe = 5;
    }
    if ($pbe == 0) {
        $gpbe = 6;
    }
    if ($pbe == 1) {
        $gpbe = 5.5;
    }
    if ($pbe == 2) {
        $gpbe = 4.5;
    }
    if ($pbe == 3) {
        $gpbe = 3.5;
    }
    if ($pbe == 4) {
        $gpbe = 2.5;
    }
    if ($pbe == 5) {
        $gpbe = 1.5;
    }
    // echo $gpbe;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($ple == -5) {
        $gple = 1;
    }
    if ($ple == -4) {
        $gple = 2;
    }
    if ($ple == -3) {
        $gple = 3;
    }
    if ($ple == -2) {
        $gple = 4;
    }
    if ($ple == -1) {
        $gple = 5;
    }
    if ($ple == 0) {
        $gple = 6;
    }
    if ($ple == 1) {
        $gple = 5.5;
    }
    if ($ple == 2) {
        $gple = 4.5;
    }
    if ($ple == 3) {
        $gple = 3.5;
    }
    if ($ple == 4) {
        $gple = 2.5;
    }
    if ($ple == 5) {
        $gple = 1.5;
    }
    // echo ' | ' . $gple;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($pse == -5) {
        $gpse = 1;
    }
    if ($pse == -4) {
        $gpse = 2;
    }
    if ($pse == -3) {
        $gpse = 3;
    }
    if ($pse == -2) {
        $gpse = 4;
    }
    if ($pse == -1) {
        $gpse = 5;
    }
    if ($pse == 0) {
        $gpse = 6;
    }
    if ($pse == 1) {
        $gpse = 5.5;
    }
    if ($pse == 2) {
        $gpse = 4.5;
    }
    if ($pse == 3) {
        $gpse = 3.5;
    }
    if ($pse == 4) {
        $gpse = 2.5;
    }
    if ($pse == 5) {
        $gpse = 1.5;
    }
    // echo ' | ' . $gpse;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($ppe == -5) {
        $gppe = 1;
    }
    if ($ppe == -4) {
        $gppe = 2;
    }
    if ($ppe == -3) {
        $gppe = 3;
    }
    if ($ppe == -2) {
        $gppe = 4;
    }
    if ($ppe == -1) {
        $gppe = 5;
    }
    if ($ppe == 0) {
        $gppe = 6;
    }
    if ($ppe == 1) {
        $gppe = 5.5;
    }
    if ($ppe == 2) {
        $gppe = 4.5;
    }
    if ($ppe == 3) {
        $gppe = 3.5;
    }
    if ($ppe == 4) {
        $gppe = 2.5;
    }
    if ($ppe == 5) {
        $gppe = 1.5;
    }
    // echo ' | ' . $gppe;

    // nilai konversi GAP Nilai pengetahuan sosial jurusan teknik
    if ($poe == -5) {
        $gpoe = 1;
    }
    if ($poe == -4) {
        $gpoe = 2;
    }
    if ($poe == -3) {
        $gpoe = 3;
    }
    if ($poe == -2) {
        $gpoe = 4;
    }
    if ($poe == -1) {
        $gpoe = 5;
    }
    if ($poe == 0) {
        $gpoe = 6;
    }
    if ($poe == 1) {
        $gpoe = 5.5;
    }
    if ($poe == 2) {
        $gpoe = 4.5;
    }
    if ($poe == 3) {
        $gpoe = 3.5;
    }
    if ($poe == 4) {
        $gpoe = 2.5;
    }
    if ($poe == 5) {
        $gpoe = 1.5;
    }
    // echo ' | ' . $gpoe;
    // nilai gap NCF
    $ncfp3 = ($gple + $gpoe) / 2;
    // echo ' | ' . $ncfp3;
    $nsfp3 = ($gpbe + $gpse + $gppe) / 3;
    // echo ' | ' . $nsfp3;
    $nfkp3 = (2 / 3 * $ncfp3) + (1 / 3 * $nsfp3);
    // echo ' | ' . $nfkp3 . '<br>';
    // akhir jutusan ekonomi/manajemen

    // jurusan Psikologi
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($pbp == -5) {
        $gpbp = 1;
    }
    if ($pbp == -4) {
        $gpbp = 2;
    }
    if ($pbp == -3) {
        $gpbp = 3;
    }
    if ($pbp == -2) {
        $gpbp = 4;
    }
    if ($pbp == -1) {
        $gpbp = 5;
    }
    if ($pbp == 0) {
        $gpbp = 6;
    }
    if ($pbp == 1) {
        $gpbp = 5.5;
    }
    if ($pbp == 2) {
        $gpbp = 4.5;
    }
    if ($pbp == 3) {
        $gpbp = 3.5;
    }
    if ($pbp == 4) {
        $gpbp = 2.5;
    }
    if ($pbp == 5) {
        $gpbp = 1.5;
    }
    // echo $gpbp;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($plp == -5) {
        $gplp = 1;
    }
    if ($plp == -4) {
        $gplp = 2;
    }
    if ($plp == -3) {
        $gplp = 3;
    }
    if ($plp == -2) {
        $gplp = 4;
    }
    if ($plp == -1) {
        $gplp = 5;
    }
    if ($plp == 0) {
        $gplp = 6;
    }
    if ($plp == 1) {
        $gplp = 5.5;
    }
    if ($plp == 2) {
        $gplp = 4.5;
    }
    if ($plp == 3) {
        $gplp = 3.5;
    }
    if ($plp == 4) {
        $gplp = 2.5;
    }
    if ($plp == 5) {
        $gplp = 1.5;
    }
    // echo ' | ' . $gplp;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($psp == -5) {
        $gpsp = 1;
    }
    if ($psp == -4) {
        $gpsp = 2;
    }
    if ($psp == -3) {
        $gpsp = 3;
    }
    if ($psp == -2) {
        $gpsp = 4;
    }
    if ($psp == -1) {
        $gpsp = 5;
    }
    if ($psp == 0) {
        $gpsp = 6;
    }
    if ($psp == 1) {
        $gpsp = 5.5;
    }
    if ($psp == 2) {
        $gpsp = 4.5;
    }
    if ($psp == 3) {
        $gpsp = 3.5;
    }
    if ($psp == 4) {
        $gpsp = 2.5;
    }
    if ($psp == 5) {
        $gpsp = 1.5;
    }
    // echo ' | ' . $gpsp;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($ppp == -5) {
        $gppp = 1;
    }
    if ($ppp == -4) {
        $gppp = 2;
    }
    if ($ppp == -3) {
        $gppp = 3;
    }
    if ($ppp == -2) {
        $gppp = 4;
    }
    if ($ppp == -1) {
        $gppp = 5;
    }
    if ($ppp == 0) {
        $gppp = 6;
    }
    if ($ppp == 1) {
        $gppp = 5.5;
    }
    if ($ppp == 2) {
        $gppp = 4.5;
    }
    if ($ppp == 3) {
        $gppp = 3.5;
    }
    if ($ppp == 4) {
        $gppp = 2.5;
    }
    if ($ppp == 5) {
        $gppp = 1.5;
    }
    // echo ' | ' . $gppp;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($pop == -5) {
        $gpop = 1;
    }
    if ($pop == -4) {
        $gpop = 2;
    }
    if ($pop == -3) {
        $gpop = 3;
    }
    if ($pop == -2) {
        $gpop = 4;
    }
    if ($pop == -1) {
        $gpop = 5;
    }
    if ($pop == 0) {
        $gpop = 6;
    }
    if ($pop == 1) {
        $gpop = 5.5;
    }
    if ($pop == 2) {
        $gpop = 4.5;
    }
    if ($pop == 3) {
        $gpop = 3.5;
    }
    if ($pop == 4) {
        $gpop = 2.5;
    }
    if ($pop == 5) {
        $gpop = 1.5;
    }
    // echo ' | ' . $gpop;
    // nilai gap NCF
    $ncfp4 = ($gpbp + $gplp + $gpop) / 3;
    // echo ' | ' . $ncfp4;
    $nsfp4 = ($gpsp + $gppp) / 2;
    // echo ' | ' . $nsfp4;
    $nfkp4 = (2 / 3 * $ncfp4) + (1 / 3 * $nsfp4);
    // echo ' | ' . $nfkp4 . '<br>';
    // akhir jutusan psikologi

    // jurusan Sospol/Hukum/Komunikasi (FISIP)
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($pbh == -5) {
        $gpbh = 1;
    }
    if ($pbh == -4) {
        $gpbh = 2;
    }
    if ($pbh == -3) {
        $gpbh = 3;
    }
    if ($pbh == -2) {
        $gpbh = 4;
    }
    if ($pbh == -1) {
        $gpbh = 5;
    }
    if ($pbh == 0) {
        $gpbh = 6;
    }
    if ($pbh == 1) {
        $gpbh = 5.5;
    }
    if ($pbh == 2) {
        $gpbh = 4.5;
    }
    if ($pbh == 3) {
        $gpbh = 3.5;
    }
    if ($pbh == 4) {
        $gpbh = 2.5;
    }
    if ($pbh == 5) {
        $gpbh = 1.5;
    }
    // echo $gpbh;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($plh == -5) {
        $gplh = 1;
    }
    if ($plh == -4) {
        $gplh = 2;
    }
    if ($plh == -3) {
        $gplh = 3;
    }
    if ($plh == -2) {
        $gplh = 4;
    }
    if ($plh == -1) {
        $gplh = 5;
    }
    if ($plh == 0) {
        $gplh = 6;
    }
    if ($plh == 1) {
        $gplh = 5.5;
    }
    if ($plh == 2) {
        $gplh = 4.5;
    }
    if ($plh == 3) {
        $gplh = 3.5;
    }
    if ($plh == 4) {
        $gplh = 2.5;
    }
    if ($plh == 5) {
        $gplh = 1.5;
    }
    // echo ' | ' . $gplh;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($psh == -5) {
        $gpsh = 1;
    }
    if ($psh == -4) {
        $gpsh = 2;
    }
    if ($psh == -3) {
        $gpsh = 3;
    }
    if ($psh == -2) {
        $gpsh = 4;
    }
    if ($psh == -1) {
        $gpsh = 5;
    }
    if ($psh == 0) {
        $gpsh = 6;
    }
    if ($psh == 1) {
        $gpsh = 5.5;
    }
    if ($psh == 2) {
        $gpsh = 4.5;
    }
    if ($psh == 3) {
        $gpsh = 3.5;
    }
    if ($psh == 4) {
        $gpsh = 2.5;
    }
    if ($psh == 5) {
        $gpsh = 1.5;
    }
    // echo ' | ' . $gpsh;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($pph == -5) {
        $gpph = 1;
    }
    if ($pph == -4) {
        $gpph = 2;
    }
    if ($pph == -3) {
        $gpph = 3;
    }
    if ($pph == -2) {
        $gpph = 4;
    }
    if ($pph == -1) {
        $gpph = 5;
    }
    if ($pph == 0) {
        $gpph = 6;
    }
    if ($pph == 1) {
        $gpph = 5.5;
    }
    if ($pph == 2) {
        $gpph = 4.5;
    }
    if ($pph == 3) {
        $gpph = 3.5;
    }
    if ($pph == 4) {
        $gpph = 2.5;
    }
    if ($pph == 5) {
        $gpph = 1.5;
    }
    // echo ' | ' . $gpph;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($poh == -5) {
        $gpoh = 1;
    }
    if ($poh == -4) {
        $gpoh = 2;
    }
    if ($poh == -3) {
        $gpoh = 3;
    }
    if ($poh == -2) {
        $gpoh = 4;
    }
    if ($poh == -1) {
        $gpoh = 5;
    }
    if ($poh == 0) {
        $gpoh = 6;
    }
    if ($poh == 1) {
        $gpoh = 5.5;
    }
    if ($poh == 2) {
        $gpoh = 4.5;
    }
    if ($poh == 3) {
        $gpoh = 3.5;
    }
    if ($poh == 4) {
        $gpoh = 2.5;
    }
    if ($poh == 5) {
        $gpoh = 1.5;
    }
    // echo ' | ' . $gpoh;
    // nilai gap NCF
    $ncfp5 = ($gpbh + $gpoh) / 2;
    // echo ' | ' . $ncfp5;
    $nsfp5 = ($gplh + $gpsh + $gpph) / 3;
    // echo ' | ' . $nsfp5;
    $nfkp5 = (2 / 3 * $ncfp5) + (1 / 3 * $nsfp5);
    // echo ' | ' . $nfkp5 . '<br>';
    // akhir jutusan Sospol/Hukum/Komunikasi (FISIP)

    // jurusan Sastra/Seni/Budaya
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($pbs == -5) {
        $gpbs = 1;
    }
    if ($pbs == -4) {
        $gpbs = 2;
    }
    if ($pbs == -3) {
        $gpbs = 3;
    }
    if ($pbs == -2) {
        $gpbs = 4;
    }
    if ($pbs == -1) {
        $gpbs = 5;
    }
    if ($pbs == 0) {
        $gpbs = 6;
    }
    if ($pbs == 1) {
        $gpbs = 5.5;
    }
    if ($pbs == 2) {
        $gpbs = 4.5;
    }
    if ($pbs == 3) {
        $gpbs = 3.5;
    }
    if ($pbs == 4) {
        $gpbs = 2.5;
    }
    if ($pbs == 5) {
        $gpbs = 1.5;
    }
    // echo $gpbs;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($pls == -5) {
        $gpls = 1;
    }
    if ($pls == -4) {
        $gpls = 2;
    }
    if ($pls == -3) {
        $gpls = 3;
    }
    if ($pls == -2) {
        $gpls = 4;
    }
    if ($pls == -1) {
        $gpls = 5;
    }
    if ($pls == 0) {
        $gpls = 6;
    }
    if ($pls == 1) {
        $gpls = 5.5;
    }
    if ($pls == 2) {
        $gpls = 4.5;
    }
    if ($pls == 3) {
        $gpls = 3.5;
    }
    if ($pls == 4) {
        $gpls = 2.5;
    }
    if ($pls == 5) {
        $gpls = 1.5;
    }
    // echo ' | ' . $gpls;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($pss == -5) {
        $gpss = 1;
    }
    if ($pss == -4) {
        $gpss = 2;
    }
    if ($pss == -3) {
        $gpss = 3;
    }
    if ($pss == -2) {
        $gpss = 4;
    }
    if ($pss == -1) {
        $gpss = 5;
    }
    if ($pss == 0) {
        $gpss = 6;
    }
    if ($pss == 1) {
        $gpss = 5.5;
    }
    if ($pss == 2) {
        $gpss = 4.5;
    }
    if ($pss == 3) {
        $gpss = 3.5;
    }
    if ($pss == 4) {
        $gpss = 2.5;
    }
    if ($pss == 5) {
        $gpss = 1.5;
    }
    // echo ' | ' . $gpss;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($pps == -5) {
        $gpps = 1;
    }
    if ($pps == -4) {
        $gpps = 2;
    }
    if ($pps == -3) {
        $gpps = 3;
    }
    if ($pps == -2) {
        $gpps = 4;
    }
    if ($pps == -1) {
        $gpps = 5;
    }
    if ($pps == 0) {
        $gpps = 6;
    }
    if ($pps == 1) {
        $gpps = 5.5;
    }
    if ($pps == 2) {
        $gpps = 4.5;
    }
    if ($pps == 3) {
        $gpps = 3.5;
    }
    if ($pps == 4) {
        $gpps = 2.5;
    }
    if ($pps == 5) {
        $gpps = 1.5;
    }
    // echo ' | ' . $gpps;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($pos == -5) {
        $gpos = 1;
    }
    if ($pos == -4) {
        $gpos = 2;
    }
    if ($pos == -3) {
        $gpos = 3;
    }
    if ($pos == -2) {
        $gpos = 4;
    }
    if ($pos == -1) {
        $gpos = 5;
    }
    if ($pos == 0) {
        $gpos = 6;
    }
    if ($pos == 1) {
        $gpos = 5.5;
    }
    if ($pos == 2) {
        $gpos = 4.5;
    }
    if ($pos == 3) {
        $gpos = 3.5;
    }
    if ($pos == 4) {
        $gpos = 2.5;
    }
    if ($pos == 5) {
        $gpos = 1.5;
    }
    // echo ' | ' . $gpos;
    // nilai gap NCF
    $ncfp6 = ($gpbh + $gpoh) / 2;
    // echo ' | ' . $ncfp6;
    $nsfp6 = ($gplh + $gpsh + $gpph) / 3;
    // echo ' | ' . $nsfp6;
    $nfkp6 = (2 / 3 * $ncfp6) + (1 / 3 * $nsfp6);
    // echo ' | ' . $nfkp6 . '<br>';
    // akhir jutusan Sastra/Seni/Budaya

    // jurusan Administrasi/Sekretaris
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($pba == -5) {
        $gpba = 1;
    }
    if ($pba == -4) {
        $gpba = 2;
    }
    if ($pba == -3) {
        $gpba = 3;
    }
    if ($pba == -2) {
        $gpba = 4;
    }
    if ($pba == -1) {
        $gpba = 5;
    }
    if ($pba == 0) {
        $gpba = 6;
    }
    if ($pba == 1) {
        $gpba = 5.5;
    }
    if ($pba == 2) {
        $gpba = 4.5;
    }
    if ($pba == 3) {
        $gpba = 3.5;
    }
    if ($pba == 4) {
        $gpba = 2.5;
    }
    if ($pba == 5) {
        $gpba = 1.5;
    }
    // echo $gpba;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($pla == -5) {
        $gpla = 1;
    }
    if ($pla == -4) {
        $gpla = 2;
    }
    if ($pla == -3) {
        $gpla = 3;
    }
    if ($pla == -2) {
        $gpla = 4;
    }
    if ($pla == -1) {
        $gpla = 5;
    }
    if ($pla == 0) {
        $gpla = 6;
    }
    if ($pla == 1) {
        $gpla = 5.5;
    }
    if ($pla == 2) {
        $gpla = 4.5;
    }
    if ($pla == 3) {
        $gpla = 3.5;
    }
    if ($pla == 4) {
        $gpla = 2.5;
    }
    if ($pla == 5) {
        $gpla = 1.5;
    }
    // echo ' | ' . $gpla;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($psa == -5) {
        $gpsa = 1;
    }
    if ($psa == -4) {
        $gpsa = 2;
    }
    if ($psa == -3) {
        $gpsa = 3;
    }
    if ($psa == -2) {
        $gpsa = 4;
    }
    if ($psa == -1) {
        $gpsa = 5;
    }
    if ($psa == 0) {
        $gpsa = 6;
    }
    if ($psa == 1) {
        $gpsa = 5.5;
    }
    if ($psa == 2) {
        $gpsa = 4.5;
    }
    if ($psa == 3) {
        $gpsa = 3.5;
    }
    if ($psa == 4) {
        $gpsa = 2.5;
    }
    if ($psa == 5) {
        $gpsa = 1.5;
    }
    // echo ' | ' . $gpsa;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($ppa == -5) {
        $gppa = 1;
    }
    if ($ppa == -4) {
        $gppa = 2;
    }
    if ($ppa == -3) {
        $gppa = 3;
    }
    if ($ppa == -2) {
        $gppa = 4;
    }
    if ($ppa == -1) {
        $gppa = 5;
    }
    if ($ppa == 0) {
        $gppa = 6;
    }
    if ($ppa == 1) {
        $gppa = 5.5;
    }
    if ($ppa == 2) {
        $gppa = 4.5;
    }
    if ($ppa == 3) {
        $gppa = 3.5;
    }
    if ($ppa == 4) {
        $gppa = 2.5;
    }
    if ($ppa == 5) {
        $gppa = 1.5;
    }
    // echo ' | ' . $gppa;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($poa == -5) {
        $gpoa = 1;
    }
    if ($poa == -4) {
        $gpoa = 2;
    }
    if ($poa == -3) {
        $gpoa = 3;
    }
    if ($poa == -2) {
        $gpoa = 4;
    }
    if ($poa == -1) {
        $gpoa = 5;
    }
    if ($poa == 0) {
        $gpoa = 6;
    }
    if ($poa == 1) {
        $gpoa = 5.5;
    }
    if ($poa == 2) {
        $gpoa = 4.5;
    }
    if ($poa == 3) {
        $gpoa = 3.5;
    }
    if ($poa == 4) {
        $gpoa = 2.5;
    }
    if ($poa == 5) {
        $gpoa = 1.5;
    }
    // echo ' | ' . $gpoa;
    // nilai gap NCF
    $ncfp7 = ($gpba + $gpla + $gpoa) / 3;
    // echo ' | ' . $ncfp7;
    $nsfp7 = ($gpsa + $gppa) / 2;
    // echo ' | ' . $nsfp7;
    $nfkp7 = (2 / 3 * $ncfp7) + (1 / 3 * $nsfp7);
    // echo ' | ' . $nfkp7 . '<br><br>';
    // akhir Administrasi/Sekretaris
    // akhir nilai pengetahuan

    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // nilai keterampilan
    // jurusan Teknik
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbt == -5) {
        $gkbt = 1;
    }
    if ($kbt == -4) {
        $gkbt = 2;
    }
    if ($kbt == -3) {
        $gkbt = 3;
    }
    if ($kbt == -2) {
        $gkbt = 4;
    }
    if ($kbt == -1) {
        $gkbt = 5;
    }
    if ($kbt == 0) {
        $gkbt = 6;
    }
    if ($kbt == 1) {
        $gkbt = 5.5;
    }
    if ($kbt == 2) {
        $gkbt = 4.5;
    }
    if ($kbt == 3) {
        $gkbt = 3.5;
    }
    if ($kbt == 4) {
        $gkbt = 2.5;
    }
    if ($kbt == 5) {
        $gkbt = 1.5;
    }
    // echo $gkbt;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($klt == -5) {
        $gklt = 1;
    }
    if ($klt == -4) {
        $gklt = 2;
    }
    if ($klt == -3) {
        $gklt = 3;
    }
    if ($klt == -2) {
        $gklt = 4;
    }
    if ($klt == -1) {
        $gklt = 5;
    }
    if ($klt == 0) {
        $gklt = 6;
    }
    if ($klt == 1) {
        $gklt = 5.5;
    }
    if ($klt == 2) {
        $gklt = 4.5;
    }
    if ($klt == 3) {
        $gklt = 3.5;
    }
    if ($klt == 4) {
        $gklt = 2.5;
    }
    if ($klt == 5) {
        $gklt = 1.5;
    }
    // echo ' | ' . $gklt;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($kst == -5) {
        $gkst = 1;
    }
    if ($kst == -4) {
        $gkst = 2;
    }
    if ($kst == -3) {
        $gkst = 3;
    }
    if ($kst == -2) {
        $gkst = 4;
    }
    if ($kst == -1) {
        $gkst = 5;
    }
    if ($kst == 0) {
        $gkst = 6;
    }
    if ($kst == 1) {
        $gkst = 5.5;
    }
    if ($kst == 2) {
        $gkst = 4.5;
    }
    if ($kst == 3) {
        $gkst = 3.5;
    }
    if ($kst == 4) {
        $gkst = 2.5;
    }
    if ($kst == 5) {
        $gkst = 1.5;
    }
    // echo ' | ' . $gkst;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kpt == -5) {
        $gkpt = 1;
    }
    if ($kpt == -4) {
        $gkpt = 2;
    }
    if ($kpt == -3) {
        $gkpt = 3;
    }
    if ($kpt == -2) {
        $gkpt = 4;
    }
    if ($kpt == -1) {
        $gkpt = 5;
    }
    if ($kpt == 0) {
        $gkpt = 6;
    }
    if ($kpt == 1) {
        $gkpt = 5.5;
    }
    if ($kpt == 2) {
        $gkpt = 4.5;
    }
    if ($kpt == 3) {
        $gkpt = 3.5;
    }
    if ($kpt == 4) {
        $gkpt = 2.5;
    }
    if ($kpt == 5) {
        $gkpt = 1.5;
    }
    // echo ' | ' . $gkpt;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($kot == -5) {
        $gkot = 1;
    }
    if ($kot == -4) {
        $gkot = 2;
    }
    if ($kot == -3) {
        $gkot = 3;
    }
    if ($kot == -2) {
        $gkot = 4;
    }
    if ($kot == -1) {
        $gkot = 5;
    }
    if ($kot == 0) {
        $gkot = 6;
    }
    if ($kot == 1) {
        $gkot = 5.5;
    }
    if ($kot == 2) {
        $gkot = 4.5;
    }
    if ($kot == 3) {
        $gkot = 3.5;
    }
    if ($kot == 4) {
        $gkot = 2.5;
    }
    if ($kot == 5) {
        $gkot = 1.5;
    }
    // echo ' | ' . $gkot;
    // nilai gap NCF
    $ncfk1 = ($gklt + $gkst + $gkpt) / 3;
    // echo ' | ' . $ncfk1;
    $nsfk1 = ($gkbt + $gkot) / 2;
    // echo ' | ' . $nsfk1;
    $nfkk1 = (2 / 3 * $ncfk1) + (1 / 3 * $nsfk1);
    // echo ' | ' . $nfkk1 . '<br>';
    // akhir teknik

    // jurusan Matematika dan Sains
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbm == -5) {
        $gkbm = 1;
    }
    if ($kbm == -4) {
        $gkbm = 2;
    }
    if ($kbm == -3) {
        $gkbm = 3;
    }
    if ($kbm == -2) {
        $gkbm = 4;
    }
    if ($kbm == -1) {
        $gkbm = 5;
    }
    if ($kbm == 0) {
        $gkbm = 6;
    }
    if ($kbm == 1) {
        $gkbm = 5.5;
    }
    if ($kbm == 2) {
        $gkbm = 4.5;
    }
    if ($kbm == 3) {
        $gkbm = 3.5;
    }
    if ($kbm == 4) {
        $gkbm = 2.5;
    }
    if ($kbm == 5) {
        $gkbm = 1.5;
    }
    // echo $gkbm;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($klm == -5) {
        $gklm = 1;
    }
    if ($klm == -4) {
        $gklm = 2;
    }
    if ($klm == -3) {
        $gklm = 3;
    }
    if ($klm == -2) {
        $gklm = 4;
    }
    if ($klm == -1) {
        $gklm = 5;
    }
    if ($klm == 0) {
        $gklm = 6;
    }
    if ($klm == 1) {
        $gklm = 5.5;
    }
    if ($klm == 2) {
        $gklm = 4.5;
    }
    if ($klm == 3) {
        $gklm = 3.5;
    }
    if ($klm == 4) {
        $gklm = 2.5;
    }
    if ($klm == 5) {
        $gklm = 1.5;
    }
    // echo ' | ' . $gklm;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($ksm == -5) {
        $gksm = 1;
    }
    if ($ksm == -4) {
        $gksm = 2;
    }
    if ($ksm == -3) {
        $gksm = 3;
    }
    if ($ksm == -2) {
        $gksm = 4;
    }
    if ($ksm == -1) {
        $gksm = 5;
    }
    if ($ksm == 0) {
        $gksm = 6;
    }
    if ($ksm == 1) {
        $gksm = 5.5;
    }
    if ($ksm == 2) {
        $gksm = 4.5;
    }
    if ($ksm == 3) {
        $gksm = 3.5;
    }
    if ($ksm == 4) {
        $gksm = 2.5;
    }
    if ($ksm == 5) {
        $gksm = 1.5;
    }
    // echo ' | ' . $gksm;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kpm == -5) {
        $gkpm = 1;
    }
    if ($kpm == -4) {
        $gkpm = 2;
    }
    if ($kpm == -3) {
        $gkpm = 3;
    }
    if ($kpm == -2) {
        $gkpm = 4;
    }
    if ($kpm == -1) {
        $gkpm = 5;
    }
    if ($kpm == 0) {
        $gkpm = 6;
    }
    if ($kpm == 1) {
        $gkpm = 5.5;
    }
    if ($kpm == 2) {
        $gkpm = 4.5;
    }
    if ($kpm == 3) {
        $gkpm = 3.5;
    }
    if ($kpm == 4) {
        $gkpm = 2.5;
    }
    if ($kpm == 5) {
        $gkpm = 1.5;
    }
    // echo ' | ' . $gkpm;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($kom == -5) {
        $gkom = 1;
    }
    if ($kom == -4) {
        $gkom = 2;
    }
    if ($kom == -3) {
        $gkom = 3;
    }
    if ($kom == -2) {
        $gkom = 4;
    }
    if ($kom == -1) {
        $gkom = 5;
    }
    if ($kom == 0) {
        $gkom = 6;
    }
    if ($kom == 1) {
        $gkom = 5.5;
    }
    if ($kom == 2) {
        $gkom = 4.5;
    }
    if ($kom == 3) {
        $gkom = 3.5;
    }
    if ($kom == 4) {
        $gkom = 2.5;
    }
    if ($kom == 5) {
        $gkom = 1.5;
    }
    // echo ' | ' . $gkom;
    // nilai gap NCF
    $ncfk2 = ($gklm + $gksm) / 2;
    // echo ' | ' . $ncfk2;
    $nsfk2 = ($gkbm + $gkpm + $gkom) / 3;
    // echo ' | ' . $nsfk2;
    $nfkk2 = (2 / 3 * $ncfk2) + (1 / 3 * $nsfk2);
    // echo ' | ' . $nfkk2 . '<br>';
    // akhir Matematika dan Sains

    // jurusan Ekonomi/Manajemen
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbe == -5) {
        $gkbe = 1;
    }
    if ($kbe == -4) {
        $gkbe = 2;
    }
    if ($kbe == -3) {
        $gkbe = 3;
    }
    if ($kbe == -2) {
        $gkbe = 4;
    }
    if ($kbe == -1) {
        $gkbe = 5;
    }
    if ($kbe == 0) {
        $gkbe = 6;
    }
    if ($kbe == 1) {
        $gkbe = 5.5;
    }
    if ($kbe == 2) {
        $gkbe = 4.5;
    }
    if ($kbe == 3) {
        $gkbe = 3.5;
    }
    if ($kbe == 4) {
        $gkbe = 2.5;
    }
    if ($kbe == 5) {
        $gkbe = 1.5;
    }
    // echo $gkbe;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($kle == -5) {
        $gkle = 1;
    }
    if ($kle == -4) {
        $gkle = 2;
    }
    if ($kle == -3) {
        $gkle = 3;
    }
    if ($kle == -2) {
        $gkle = 4;
    }
    if ($kle == -1) {
        $gkle = 5;
    }
    if ($kle == 0) {
        $gkle = 6;
    }
    if ($kle == 1) {
        $gkle = 5.5;
    }
    if ($kle == 2) {
        $gkle = 4.5;
    }
    if ($kle == 3) {
        $gkle = 3.5;
    }
    if ($kle == 4) {
        $gkle = 2.5;
    }
    if ($kle == 5) {
        $gkle = 1.5;
    }
    // echo ' | ' . $gkle;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($kse == -5) {
        $gkse = 1;
    }
    if ($kse == -4) {
        $gkse = 2;
    }
    if ($kse == -3) {
        $gkse = 3;
    }
    if ($kse == -2) {
        $gkse = 4;
    }
    if ($kse == -1) {
        $gkse = 5;
    }
    if ($kse == 0) {
        $gkse = 6;
    }
    if ($kse == 1) {
        $gkse = 5.5;
    }
    if ($kse == 2) {
        $gkse = 4.5;
    }
    if ($kse == 3) {
        $gkse = 3.5;
    }
    if ($kse == 4) {
        $gkse = 2.5;
    }
    if ($kse == 5) {
        $gkse = 1.5;
    }
    // echo ' | ' . $gkse;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kpe == -5) {
        $gkpe = 1;
    }
    if ($kpe == -4) {
        $gkpe = 2;
    }
    if ($kpe == -3) {
        $gkpe = 3;
    }
    if ($kpe == -2) {
        $gkpe = 4;
    }
    if ($kpe == -1) {
        $gkpe = 5;
    }
    if ($kpe == 0) {
        $gkpe = 6;
    }
    if ($kpe == 1) {
        $gkpe = 5.5;
    }
    if ($kpe == 2) {
        $gkpe = 4.5;
    }
    if ($kpe == 3) {
        $gkpe = 3.5;
    }
    if ($kpe == 4) {
        $gkpe = 2.5;
    }
    if ($kpe == 5) {
        $gkpe = 1.5;
    }
    // echo ' | ' . $gkpe;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($koe == -5) {
        $gkoe = 1;
    }
    if ($koe == -4) {
        $gkoe = 2;
    }
    if ($koe == -3) {
        $gkoe = 3;
    }
    if ($koe == -2) {
        $gkoe = 4;
    }
    if ($koe == -1) {
        $gkoe = 5;
    }
    if ($koe == 0) {
        $gkoe = 6;
    }
    if ($koe == 1) {
        $gkoe = 5.5;
    }
    if ($koe == 2) {
        $gkoe = 4.5;
    }
    if ($koe == 3) {
        $gkoe = 3.5;
    }
    if ($koe == 4) {
        $gkoe = 2.5;
    }
    if ($koe == 5) {
        $gkoe = 1.5;
    }
    // echo ' | ' . $gkoe;
    // nilai gap NCF
    $ncfk3 = ($gkle + $gkoe) / 2;
    // echo ' | ' . $ncfk3;
    $nsfk3 = ($gkbe + $gkse + $gkpe) / 3;
    // echo ' | ' . $nsfk3;
    $nfkk3 = (2 / 3 * $ncfk3) + (1 / 3 * $nsfk3);
    // echo ' | ' . $nfkk3 . '<br>';
    // akhir ekonomi/manajemen

    // jurusan Psikologi
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbp == -5) {
        $gkbp = 1;
    }
    if ($kbp == -4) {
        $gkbp = 2;
    }
    if ($kbp == -3) {
        $gkbp = 3;
    }
    if ($kbp == -2) {
        $gkbp = 4;
    }
    if ($kbp == -1) {
        $gkbp = 5;
    }
    if ($kbp == 0) {
        $gkbp = 6;
    }
    if ($kbp == 1) {
        $gkbp = 5.5;
    }
    if ($kbp == 2) {
        $gkbp = 4.5;
    }
    if ($kbp == 3) {
        $gkbp = 3.5;
    }
    if ($kbp == 4) {
        $gkbp = 2.5;
    }
    if ($kbp == 5) {
        $gkbp = 1.5;
    }
    // echo $gkbp;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($klp == -5) {
        $gklp = 1;
    }
    if ($klp == -4) {
        $gklp = 2;
    }
    if ($klp == -3) {
        $gklp = 3;
    }
    if ($klp == -2) {
        $gklp = 4;
    }
    if ($klp == -1) {
        $gklp = 5;
    }
    if ($klp == 0) {
        $gklp = 6;
    }
    if ($klp == 1) {
        $gklp = 5.5;
    }
    if ($klp == 2) {
        $gklp = 4.5;
    }
    if ($klp == 3) {
        $gklp = 3.5;
    }
    if ($klp == 4) {
        $gklp = 2.5;
    }
    if ($klp == 5) {
        $gklp = 1.5;
    }
    // echo ' | ' . $gklp;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($ksp == -5) {
        $gksp = 1;
    }
    if ($ksp == -4) {
        $gksp = 2;
    }
    if ($ksp == -3) {
        $gksp = 3;
    }
    if ($ksp == -2) {
        $gksp = 4;
    }
    if ($ksp == -1) {
        $gksp = 5;
    }
    if ($ksp == 0) {
        $gksp = 6;
    }
    if ($ksp == 1) {
        $gksp = 5.5;
    }
    if ($ksp == 2) {
        $gksp = 4.5;
    }
    if ($ksp == 3) {
        $gksp = 3.5;
    }
    if ($ksp == 4) {
        $gksp = 2.5;
    }
    if ($ksp == 5) {
        $gksp = 1.5;
    }
    // echo ' | ' . $gksp;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kpp == -5) {
        $gkpp = 1;
    }
    if ($kpp == -4) {
        $gkpp = 2;
    }
    if ($kpp == -3) {
        $gkpp = 3;
    }
    if ($kpp == -2) {
        $gkpp = 4;
    }
    if ($kpp == -1) {
        $gkpp = 5;
    }
    if ($kpp == 0) {
        $gkpp = 6;
    }
    if ($kpp == 1) {
        $gkpp = 5.5;
    }
    if ($kpp == 2) {
        $gkpp = 4.5;
    }
    if ($kpp == 3) {
        $gkpp = 3.5;
    }
    if ($kpp == 4) {
        $gkpp = 2.5;
    }
    if ($kpp == 5) {
        $gkpp = 1.5;
    }
    // echo ' | ' . $gkpp;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($kop == -5) {
        $gkop = 1;
    }
    if ($kop == -4) {
        $gkop = 2;
    }
    if ($kop == -3) {
        $gkop = 3;
    }
    if ($kop == -2) {
        $gkop = 4;
    }
    if ($kop == -1) {
        $gkop = 5;
    }
    if ($kop == 0) {
        $gkop = 6;
    }
    if ($kop == 1) {
        $gkop = 5.5;
    }
    if ($kop == 2) {
        $gkop = 4.5;
    }
    if ($kop == 3) {
        $gkop = 3.5;
    }
    if ($kop == 4) {
        $gkop = 2.5;
    }
    if ($kop == 5) {
        $gkop = 1.5;
    }
    // echo ' | ' . $gkop;
    // nilai gap NCF
    $ncfk4 = ($gkbp + $gklp + $gkop) / 3;
    // echo ' | ' . $ncfk4;
    $nsfk4 = ($gksp + $gkpp) / 2;
    // echo ' | ' . $nsfk4;
    $nfkk4 = (2 / 3 * $ncfk4) + (1 / 3 * $nsfk4);
    // echo ' | ' . $nfkk4 . '<br>';
    // akhir Psikologi

    // jurusan Sospol/Hukum/Komunikasi (FISIP)
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbh == -5) {
        $gkbh = 1;
    }
    if ($kbh == -4) {
        $gkbh = 2;
    }
    if ($kbh == -3) {
        $gkbh = 3;
    }
    if ($kbh == -2) {
        $gkbh = 4;
    }
    if ($kbh == -1) {
        $gkbh = 5;
    }
    if ($kbh == 0) {
        $gkbh = 6;
    }
    if ($kbh == 1) {
        $gkbh = 5.5;
    }
    if ($kbh == 2) {
        $gkbh = 4.5;
    }
    if ($kbh == 3) {
        $gkbh = 3.5;
    }
    if ($kbh == 4) {
        $gkbh = 2.5;
    }
    if ($kbh == 5) {
        $gkbh = 1.5;
    }
    // echo $gkbh;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($klh == -5) {
        $gklh = 1;
    }
    if ($klh == -4) {
        $gklh = 2;
    }
    if ($klh == -3) {
        $gklh = 3;
    }
    if ($klh == -2) {
        $gklh = 4;
    }
    if ($klh == -1) {
        $gklh = 5;
    }
    if ($klh == 0) {
        $gklh = 6;
    }
    if ($klh == 1) {
        $gklh = 5.5;
    }
    if ($klh == 2) {
        $gklh = 4.5;
    }
    if ($klh == 3) {
        $gklh = 3.5;
    }
    if ($klh == 4) {
        $gklh = 2.5;
    }
    if ($klh == 5) {
        $gklh = 1.5;
    }
    // echo ' | ' . $gklh;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($ksh == -5) {
        $gksh = 1;
    }
    if ($ksh == -4) {
        $gksh = 2;
    }
    if ($ksh == -3) {
        $gksh = 3;
    }
    if ($ksh == -2) {
        $gksh = 4;
    }
    if ($ksh == -1) {
        $gksh = 5;
    }
    if ($ksh == 0) {
        $gksh = 6;
    }
    if ($ksh == 1) {
        $gksh = 5.5;
    }
    if ($ksh == 2) {
        $gksh = 4.5;
    }
    if ($ksh == 3) {
        $gksh = 3.5;
    }
    if ($ksh == 4) {
        $gksh = 2.5;
    }
    if ($ksh == 5) {
        $gksh = 1.5;
    }
    // echo ' | ' . $gksh;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kph == -5) {
        $gkph = 1;
    }
    if ($kph == -4) {
        $gkph = 2;
    }
    if ($kph == -3) {
        $gkph = 3;
    }
    if ($kph == -2) {
        $gkph = 4;
    }
    if ($kph == -1) {
        $gkph = 5;
    }
    if ($kph == 0) {
        $gkph = 6;
    }
    if ($kph == 1) {
        $gkph = 5.5;
    }
    if ($kph == 2) {
        $gkph = 4.5;
    }
    if ($kph == 3) {
        $gkph = 3.5;
    }
    if ($kph == 4) {
        $gkph = 2.5;
    }
    if ($kph == 5) {
        $gkph = 1.5;
    }
    // echo ' | ' . $gkph;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($koh == -5) {
        $gkoh = 1;
    }
    if ($koh == -4) {
        $gkoh = 2;
    }
    if ($koh == -3) {
        $gkoh = 3;
    }
    if ($koh == -2) {
        $gkoh = 4;
    }
    if ($koh == -1) {
        $gkoh = 5;
    }
    if ($koh == 0) {
        $gkoh = 6;
    }
    if ($koh == 1) {
        $gkoh = 5.5;
    }
    if ($koh == 2) {
        $gkoh = 4.5;
    }
    if ($koh == 3) {
        $gkoh = 3.5;
    }
    if ($koh == 4) {
        $gkoh = 2.5;
    }
    if ($koh == 5) {
        $gkoh = 1.5;
    }
    // echo ' | ' . $gkoh;
    // nilai gap NCF
    $ncfk5 = ($gkbh + $gkoh) / 2;
    // echo ' | ' . $ncfk5;
    $nsfk5 = ($gklh + $gksh + $gkph) / 3;
    // echo ' | ' . $nsfk5;
    $nfkk5 = (2 / 3 * $ncfk5) + (1 / 3 * $nsfk5);
    // echo ' | ' . $nfkk5 . '<br>';
    // akhir Sospol/Hukum/Komunikasi (FISIP)

    // jurusan Sastra/Seni/Budaya
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kbs == -5) {
        $gkbs = 1;
    }
    if ($kbs == -4) {
        $gkbs = 2;
    }
    if ($kbs == -3) {
        $gkbs = 3;
    }
    if ($kbs == -2) {
        $gkbs = 4;
    }
    if ($kbs == -1) {
        $gkbs = 5;
    }
    if ($kbs == 0) {
        $gkbs = 6;
    }
    if ($kbs == 1) {
        $gkbs = 5.5;
    }
    if ($kbs == 2) {
        $gkbs = 4.5;
    }
    if ($kbs == 3) {
        $gkbs = 3.5;
    }
    if ($kbs == 4) {
        $gkbs = 2.5;
    }
    if ($kbs == 5) {
        $gkbs = 1.5;
    }
    // echo $gkbs;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($kls == -5) {
        $gkls = 1;
    }
    if ($kls == -4) {
        $gkls = 2;
    }
    if ($kls == -3) {
        $gkls = 3;
    }
    if ($kls == -2) {
        $gkls = 4;
    }
    if ($kls == -1) {
        $gkls = 5;
    }
    if ($kls == 0) {
        $gkls = 6;
    }
    if ($kls == 1) {
        $gkls = 5.5;
    }
    if ($kls == 2) {
        $gkls = 4.5;
    }
    if ($kls == 3) {
        $gkls = 3.5;
    }
    if ($kls == 4) {
        $gkls = 2.5;
    }
    if ($kls == 5) {
        $gkls = 1.5;
    }
    // echo ' | ' . $gkls;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($kss == -5) {
        $gkss = 1;
    }
    if ($kss == -4) {
        $gkss = 2;
    }
    if ($kss == -3) {
        $gkss = 3;
    }
    if ($kss == -2) {
        $gkss = 4;
    }
    if ($kss == -1) {
        $gkss = 5;
    }
    if ($kss == 0) {
        $gkss = 6;
    }
    if ($kss == 1) {
        $gkss = 5.5;
    }
    if ($kss == 2) {
        $gkss = 4.5;
    }
    if ($kss == 3) {
        $gkss = 3.5;
    }
    if ($kss == 4) {
        $gkss = 2.5;
    }
    if ($kss == 5) {
        $gkss = 1.5;
    }
    // echo ' | ' . $gkss;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kps == -5) {
        $gkps = 1;
    }
    if ($kps == -4) {
        $gkps = 2;
    }
    if ($kps == -3) {
        $gkps = 3;
    }
    if ($kps == -2) {
        $gkps = 4;
    }
    if ($kps == -1) {
        $gkps = 5;
    }
    if ($kps == 0) {
        $gkps = 6;
    }
    if ($kps == 1) {
        $gkps = 5.5;
    }
    if ($kps == 2) {
        $gkps = 4.5;
    }
    if ($kps == 3) {
        $gkps = 3.5;
    }
    if ($kps == 4) {
        $gkps = 2.5;
    }
    if ($kps == 5) {
        $gkps = 1.5;
    }
    // echo ' | ' . $gkps;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($kos == -5) {
        $gkos = 1;
    }
    if ($kos == -4) {
        $gkos = 2;
    }
    if ($kos == -3) {
        $gkos = 3;
    }
    if ($kos == -2) {
        $gkos = 4;
    }
    if ($kos == -1) {
        $gkos = 5;
    }
    if ($kos == 0) {
        $gkos = 6;
    }
    if ($kos == 1) {
        $gkos = 5.5;
    }
    if ($kos == 2) {
        $gkos = 4.5;
    }
    if ($kos == 3) {
        $gkos = 3.5;
    }
    if ($kos == 4) {
        $gkos = 2.5;
    }
    if ($kos == 5) {
        $gkos = 1.5;
    }
    // echo ' | ' . $gkos;
    // nilai gap NCF
    $ncfk6 = ($gkbh + $gkoh) / 2;
    // echo ' | ' . $ncfk6;
    $nsfk6 = ($gklh + $gksh + $gkph) / 3;
    // echo ' | ' . $nsfk6;
    $nfkk6 = (2 / 3 * $ncfk6) + (1 / 3 * $nsfk6);
    // echo ' | ' . $nfkk6 . '<br>';
    // akhir Sastra/Seni/Budaya

    // jurusan Administrasi/Sekretaris
    // nilai konversi GAP Nilai pengetahuan bahasa 
    if ($kba == -5) {
        $gkba = 1;
    }
    if ($kba == -4) {
        $gkba = 2;
    }
    if ($kba == -3) {
        $gkba = 3;
    }
    if ($kba == -2) {
        $gkba = 4;
    }
    if ($kba == -1) {
        $gkba = 5;
    }
    if ($kba == 0) {
        $gkba = 6;
    }
    if ($kba == 1) {
        $gkba = 5.5;
    }
    if ($kba == 2) {
        $gkba = 4.5;
    }
    if ($kba == 3) {
        $gkba = 3.5;
    }
    if ($kba == 4) {
        $gkba = 2.5;
    }
    if ($kba == 5) {
        $gkba = 1.5;
    }
    // echo $gkba;

    // nilai konversi GAP Nilai pengetahuan logika
    if ($kla == -5) {
        $gkla = 1;
    }
    if ($kla == -4) {
        $gkla = 2;
    }
    if ($kla == -3) {
        $gkla = 3;
    }
    if ($kla == -2) {
        $gkla = 4;
    }
    if ($kla == -1) {
        $gkla = 5;
    }
    if ($kla == 0) {
        $gkla = 6;
    }
    if ($kla == 1) {
        $gkla = 5.5;
    }
    if ($kla == 2) {
        $gkla = 4.5;
    }
    if ($kla == 3) {
        $gkla = 3.5;
    }
    if ($kla == 4) {
        $gkla = 2.5;
    }
    if ($kla == 5) {
        $gkla = 1.5;
    }
    // echo ' | ' . $gkla;

    // nilai konversi GAP Nilai pengetahuan sains
    if ($ksa == -5) {
        $gksa = 1;
    }
    if ($ksa == -4) {
        $gksa = 2;
    }
    if ($ksa == -3) {
        $gksa = 3;
    }
    if ($ksa == -2) {
        $gksa = 4;
    }
    if ($ksa == -1) {
        $gksa = 5;
    }
    if ($ksa == 0) {
        $gksa = 6;
    }
    if ($ksa == 1) {
        $gksa = 5.5;
    }
    if ($ksa == 2) {
        $gksa = 4.5;
    }
    if ($ksa == 3) {
        $gksa = 3.5;
    }
    if ($ksa == 4) {
        $gksa = 2.5;
    }
    if ($ksa == 5) {
        $gksa = 1.5;
    }
    // echo ' | ' . $gksa;

    // nilai konversi GAP Nilai pengetahuan praktek 
    if ($kpa == -5) {
        $gkpa = 1;
    }
    if ($kpa == -4) {
        $gkpa = 2;
    }
    if ($kpa == -3) {
        $gkpa = 3;
    }
    if ($kpa == -2) {
        $gkpa = 4;
    }
    if ($kpa == -1) {
        $gkpa = 5;
    }
    if ($kpa == 0) {
        $gkpa = 6;
    }
    if ($kpa == 1) {
        $gkpa = 5.5;
    }
    if ($kpa == 2) {
        $gkpa = 4.5;
    }
    if ($kpa == 3) {
        $gkpa = 3.5;
    }
    if ($kpa == 4) {
        $gkpa = 2.5;
    }
    if ($kpa == 5) {
        $gkpa = 1.5;
    }
    // echo ' | ' . $gkpa;

    // nilai konversi GAP Nilai pengetahuan sosial
    if ($koa == -5) {
        $gkoa = 1;
    }
    if ($koa == -4) {
        $gkoa = 2;
    }
    if ($koa == -3) {
        $gkoa = 3;
    }
    if ($koa == -2) {
        $gkoa = 4;
    }
    if ($koa == -1) {
        $gkoa = 5;
    }
    if ($koa == 0) {
        $gkoa = 6;
    }
    if ($koa == 1) {
        $gkoa = 5.5;
    }
    if ($koa == 2) {
        $gkoa = 4.5;
    }
    if ($koa == 3) {
        $gkoa = 3.5;
    }
    if ($koa == 4) {
        $gkoa = 2.5;
    }
    if ($koa == 5) {
        $gkoa = 1.5;
    }
    // echo ' | ' . $gkoa;
    // nilai gap NCF
    $ncfk7 = ($gkba + $gkla + $gkoa) / 3;
    // echo ' | ' . $ncfk7;
    $nsfk7 = ($gksa + $gkpa) / 2;
    // echo ' | ' . $nsfk7;
    $nfkk7 = (2 / 3 * $ncfk7) + (1 / 3 * $nsfk7);
    // echo ' | ' . $nfkk7 . '<br> <br>';
    // akhir Administrasi/Sekretaris
    // akhir nilai keterampilan

    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    // --------------------------------------------------------------------------------------------------------------------------------------------------------------------------

    // nilai bakat
    // jurusan Teknik
    // nilai konversi GAP Nilai klerikal 
    if ($bkt == -5) {
        $gbkt = 1;
    }
    if ($bkt == -4) {
        $gbkt = 2;
    }
    if ($bkt == -3) {
        $gbkt = 3;
    }
    if ($bkt == -2) {
        $gbkt = 4;
    }
    if ($bkt == -1) {
        $gbkt = 5;
    }
    if ($bkt == 0) {
        $gbkt = 6;
    }
    if ($bkt == 1) {
        $gbkt = 5.5;
    }
    if ($bkt == 2) {
        $gbkt = 4.5;
    }
    if ($bkt == 3) {
        $gbkt = 3.5;
    }
    if ($bkt == 4) {
        $gbkt = 2.5;
    }
    if ($bkt == 5) {
        $gbkt = 1.5;
    }
    // echo $gbkt;

    // nilai konversi GAP Nilai pengetahuan spasial
    if ($bst == -5) {
        $gbst = 1;
    }
    if ($bst == -4) {
        $gbst = 2;
    }
    if ($bst == -3) {
        $gbst = 3;
    }
    if ($bst == -2) {
        $gbst = 4;
    }
    if ($bst == -1) {
        $gbst = 5;
    }
    if ($bst == 0) {
        $gbst = 6;
    }
    if ($bst == 1) {
        $gbst = 5.5;
    }
    if ($bst == 2) {
        $gbst = 4.5;
    }
    if ($bst == 3) {
        $gbst = 3.5;
    }
    if ($bst == 4) {
        $gbst = 2.5;
    }
    if ($bst == 5) {
        $gbst = 1.5;
    }
    // echo ' | ' . $gbst;

    // nilai konversi GAP Nilai mekanik
    if ($bmt == -5) {
        $gbmt = 1;
    }
    if ($bmt == -4) {
        $gbmt = 2;
    }
    if ($bmt == -3) {
        $gbmt = 3;
    }
    if ($bmt == -2) {
        $gbmt = 4;
    }
    if ($bmt == -1) {
        $gbmt = 5;
    }
    if ($bmt == 0) {
        $gbmt = 6;
    }
    if ($bmt == 1) {
        $gbmt = 5.5;
    }
    if ($bmt == 2) {
        $gbmt = 4.5;
    }
    if ($bmt == 3) {
        $gbmt = 3.5;
    }
    if ($bmt == 4) {
        $gbmt = 2.5;
    }
    if ($bmt == 5) {
        $gbmt = 1.5;
    }
    // echo ' | ' . $gbmt;

    // nilai konversi GAP Nilai bahasa
    if ($bbt == -5) {
        $gbbt = 1;
    }
    if ($bbt == -4) {
        $gbbt = 2;
    }
    if ($bbt == -3) {
        $gbbt = 3;
    }
    if ($bbt == -2) {
        $gbbt = 4;
    }
    if ($bbt == -1) {
        $gbbt = 5;
    }
    if ($bbt == 0) {
        $gbbt = 6;
    }
    if ($bbt == 1) {
        $gbbt = 5.5;
    }
    if ($bbt == 2) {
        $gbbt = 4.5;
    }
    if ($bbt == 3) {
        $gbbt = 3.5;
    }
    if ($bbt == 4) {
        $gbbt = 2.5;
    }
    if ($bbt == 5) {
        $gbbt = 1.5;
    }
    // echo ' | ' . $gbbt;

    // nilai konversi GAP Nilai verbal
    if ($bvt == -5) {
        $gbvt = 1;
    }
    if ($bvt == -4) {
        $gbvt = 2;
    }
    if ($bvt == -3) {
        $gbvt = 3;
    }
    if ($bvt == -2) {
        $gbvt = 4;
    }
    if ($bvt == -1) {
        $gbvt = 5;
    }
    if ($bvt == 0) {
        $gbvt = 6;
    }
    if ($bvt == 1) {
        $gbvt = 5.5;
    }
    if ($bvt == 2) {
        $gbvt = 4.5;
    }
    if ($bvt == 3) {
        $gbvt = 3.5;
    }
    if ($bvt == 4) {
        $gbvt = 2.5;
    }
    if ($bvt == 5) {
        $gbvt = 1.5;
    }
    // echo ' | ' . $gbvt;

    // nilai konversi GAP Nilai kuantitatif
    if ($but == -5) {
        $gbut = 1;
    }
    if ($but == -4) {
        $gbut = 2;
    }
    if ($but == -3) {
        $gbut = 3;
    }
    if ($but == -2) {
        $gbut = 4;
    }
    if ($but == -1) {
        $gbut = 5;
    }
    if ($but == 0) {
        $gbut = 6;
    }
    if ($but == 1) {
        $gbut = 5.5;
    }
    if ($but == 2) {
        $gbut = 4.5;
    }
    if ($but == 3) {
        $gbut = 3.5;
    }
    if ($but == 4) {
        $gbut = 2.5;
    }
    if ($but == 5) {
        $gbut = 1.5;
    }
    // echo ' | ' . $gbut;

    // nilai konversi GAP Nilai penalaran
    if ($bpt == -5) {
        $gbpt = 1;
    }
    if ($bpt == -4) {
        $gbpt = 2;
    }
    if ($bpt == -3) {
        $gbpt = 3;
    }
    if ($bpt == -2) {
        $gbpt = 4;
    }
    if ($bpt == -1) {
        $gbpt = 5;
    }
    if ($bpt == 0) {
        $gbpt = 6;
    }
    if ($bpt == 1) {
        $gbpt = 5.5;
    }
    if ($bpt == 2) {
        $gbpt = 4.5;
    }
    if ($bpt == 3) {
        $gbpt = 3.5;
    }
    if ($bpt == 4) {
        $gbpt = 2.5;
    }
    if ($bpt == 5) {
        $gbpt = 1.5;
    }
    // echo ' | ' . $gbpt;

    // nilai gap NCF
    $ncfb1 = ($gbkt + $gbst + $gbmt + $gbbt + $gbut) / 5;
    // echo ' | ' . $ncfb1;
    $nsfb1 = ($gbvt + $gbpt) / 2;
    // echo ' | ' . $nsfb1;
    $nfkb1 = (2 / 3 * $ncfb1) + (1 / 3 * $nsfb1);
    // echo ' | ' . $nfkb1 . '<br>';
    // akhir teknik

    // jurusan Matematika dan Sains
    // nilai konversi GAP Nilai klerikal 
    if ($bkm == -5) {
        $gbkm = 1;
    }
    if ($bkm == -4) {
        $gbkm = 2;
    }
    if ($bkm == -3) {
        $gbkm = 3;
    }
    if ($bkm == -2) {
        $gbkm = 4;
    }
    if ($bkm == -1) {
        $gbkm = 5;
    }
    if ($bkm == 0) {
        $gbkm = 6;
    }
    if ($bkm == 1) {
        $gbkm = 5.5;
    }
    if ($bkm == 2) {
        $gbkm = 4.5;
    }
    if ($bkm == 3) {
        $gbkm = 3.5;
    }
    if ($bkm == 4) {
        $gbkm = 2.5;
    }
    if ($bkm == 5) {
        $gbkm = 1.5;
    }
    // echo $gbkm;

    // nilai konversi GAP Nilai pengetahuan spasial
    if ($bsm == -5) {
        $gbsm = 1;
    }
    if ($bsm == -4) {
        $gbsm = 2;
    }
    if ($bsm == -3) {
        $gbsm = 3;
    }
    if ($bsm == -2) {
        $gbsm = 4;
    }
    if ($bsm == -1) {
        $gbsm = 5;
    }
    if ($bsm == 0) {
        $gbsm = 6;
    }
    if ($bsm == 1) {
        $gbsm = 5.5;
    }
    if ($bsm == 2) {
        $gbsm = 4.5;
    }
    if ($bsm == 3) {
        $gbsm = 3.5;
    }
    if ($bsm == 4) {
        $gbsm = 2.5;
    }
    if ($bsm == 5) {
        $gbsm = 1.5;
    }
    // echo ' | ' . $gbsm;

    // nilai konversi GAP Nilai mekanik
    if ($bmm == -5) {
        $gbmm = 1;
    }
    if ($bmm == -4) {
        $gbmm = 2;
    }
    if ($bmm == -3) {
        $gbmm = 3;
    }
    if ($bmm == -2) {
        $gbmm = 4;
    }
    if ($bmm == -1) {
        $gbmm = 5;
    }
    if ($bmm == 0) {
        $gbmm = 6;
    }
    if ($bmm == 1) {
        $gbmm = 5.5;
    }
    if ($bmm == 2) {
        $gbmm = 4.5;
    }
    if ($bmm == 3) {
        $gbmm = 3.5;
    }
    if ($bmm == 4) {
        $gbmm = 2.5;
    }
    if ($bmm == 5) {
        $gbmm = 1.5;
    }
    // echo ' | ' . $gbmm;

    // nilai konversi GAP Nilai bahasa
    if ($bbm == -5) {
        $gbbm = 1;
    }
    if ($bbm == -4) {
        $gbbm = 2;
    }
    if ($bbm == -3) {
        $gbbm = 3;
    }
    if ($bbm == -2) {
        $gbbm = 4;
    }
    if ($bbm == -1) {
        $gbbm = 5;
    }
    if ($bbm == 0) {
        $gbbm = 6;
    }
    if ($bbm == 1) {
        $gbbm = 5.5;
    }
    if ($bbm == 2) {
        $gbbm = 4.5;
    }
    if ($bbm == 3) {
        $gbbm = 3.5;
    }
    if ($bbm == 4) {
        $gbbm = 2.5;
    }
    if ($bbm == 5) {
        $gbbm = 1.5;
    }
    // echo ' | ' . $gbbm;

    // nilai konversi GAP Nilai verbal
    if ($bvm == -5) {
        $gbvm = 1;
    }
    if ($bvm == -4) {
        $gbvm = 2;
    }
    if ($bvm == -3) {
        $gbvm = 3;
    }
    if ($bvm == -2) {
        $gbvm = 4;
    }
    if ($bvm == -1) {
        $gbvm = 5;
    }
    if ($bvm == 0) {
        $gbvm = 6;
    }
    if ($bvm == 1) {
        $gbvm = 5.5;
    }
    if ($bvm == 2) {
        $gbvm = 4.5;
    }
    if ($bvm == 3) {
        $gbvm = 3.5;
    }
    if ($bvm == 4) {
        $gbvm = 2.5;
    }
    if ($bvm == 5) {
        $gbvm = 1.5;
    }
    // echo ' | ' . $gbvm;

    // nilai konversi GAP Nilai kuantitatif
    if ($bum == -5) {
        $gbum = 1;
    }
    if ($bum == -4) {
        $gbum = 2;
    }
    if ($bum == -3) {
        $gbum = 3;
    }
    if ($bum == -2) {
        $gbum = 4;
    }
    if ($bum == -1) {
        $gbum = 5;
    }
    if ($bum == 0) {
        $gbum = 6;
    }
    if ($bum == 1) {
        $gbum = 5.5;
    }
    if ($bum == 2) {
        $gbum = 4.5;
    }
    if ($bum == 3) {
        $gbum = 3.5;
    }
    if ($bum == 4) {
        $gbum = 2.5;
    }
    if ($bum == 5) {
        $gbum = 1.5;
    }
    // echo ' | ' . $gbum;

    // nilai konversi GAP Nilai penalaran
    if ($bpm == -5) {
        $gbpm = 1;
    }
    if ($bpm == -4) {
        $gbpm = 2;
    }
    if ($bpm == -3) {
        $gbpm = 3;
    }
    if ($bpm == -2) {
        $gbpm = 4;
    }
    if ($bpm == -1) {
        $gbpm = 5;
    }
    if ($bpm == 0) {
        $gbpm = 6;
    }
    if ($bpm == 1) {
        $gbpm = 5.5;
    }
    if ($bpm == 2) {
        $gbpm = 4.5;
    }
    if ($bpm == 3) {
        $gbpm = 3.5;
    }
    if ($bpm == 4) {
        $gbpm = 2.5;
    }
    if ($bpm == 5) {
        $gbpm = 1.5;
    }
    // echo ' | ' . $gbpm;

    // nilai gap NCF
    $ncfb2 = ($gbsm + $gbbm + $gbvm + $gbum) / 4;
    // echo ' | ' . $ncfb2;
    $nsfb2 = ($gbkm + $gbmm + $gbpm) / 3;
    // echo ' | ' . $nsfb2;
    $nfkb2 = (2 / 3 * $ncfb2) + (1 / 3 * $nsfb2);
    // echo ' | ' . $nfkb2 . '<br>';
    // akhir Matematika dan Sains

    // jurusan Ekonomi/Manajemen
    // nilai konversi GAP Nilai klerikal 
    if ($bke == -5) {
        $gbke = 1;
    }
    if ($bke == -4) {
        $gbke = 2;
    }
    if ($bke == -3) {
        $gbke = 3;
    }
    if ($bke == -2) {
        $gbke = 4;
    }
    if ($bke == -1) {
        $gbke = 5;
    }
    if ($bke == 0) {
        $gbke = 6;
    }
    if ($bke == 1) {
        $gbke = 5.5;
    }
    if ($bke == 2) {
        $gbke = 4.5;
    }
    if ($bke == 3) {
        $gbke = 3.5;
    }
    if ($bke == 4) {
        $gbke = 2.5;
    }
    if ($bke == 5) {
        $gbke = 1.5;
    }
    // echo $gbke;

    // nilai konversi GAP Nilai pengetahuan spasial
    if ($bse == -5) {
        $gbse = 1;
    }
    if ($bse == -4) {
        $gbse = 2;
    }
    if ($bse == -3) {
        $gbse = 3;
    }
    if ($bse == -2) {
        $gbse = 4;
    }
    if ($bse == -1) {
        $gbse = 5;
    }
    if ($bse == 0) {
        $gbse = 6;
    }
    if ($bse == 1) {
        $gbse = 5.5;
    }
    if ($bse == 2) {
        $gbse = 4.5;
    }
    if ($bse == 3) {
        $gbse = 3.5;
    }
    if ($bse == 4) {
        $gbse = 2.5;
    }
    if ($bse == 5) {
        $gbse = 1.5;
    }
    // echo ' | ' . $gbse;

    // nilai konversi GAP Nilai mekanik
    if ($bme == -5) {
        $gbme = 1;
    }
    if ($bme == -4) {
        $gbme = 2;
    }
    if ($bme == -3) {
        $gbme = 3;
    }
    if ($bme == -2) {
        $gbme = 4;
    }
    if ($bme == -1) {
        $gbme = 5;
    }
    if ($bme == 0) {
        $gbme = 6;
    }
    if ($bme == 1) {
        $gbme = 5.5;
    }
    if ($bme == 2) {
        $gbme = 4.5;
    }
    if ($bme == 3) {
        $gbme = 3.5;
    }
    if ($bme == 4) {
        $gbme = 2.5;
    }
    if ($bme == 5) {
        $gbme = 1.5;
    }
    // echo ' | ' . $gbme;

    // nilai konversi GAP Nilai bahasa
    if ($bbe == -5) {
        $gbbe = 1;
    }
    if ($bbe == -4) {
        $gbbe = 2;
    }
    if ($bbe == -3) {
        $gbbe = 3;
    }
    if ($bbe == -2) {
        $gbbe = 4;
    }
    if ($bbe == -1) {
        $gbbe = 5;
    }
    if ($bbe == 0) {
        $gbbe = 6;
    }
    if ($bbe == 1) {
        $gbbe = 5.5;
    }
    if ($bbe == 2) {
        $gbbe = 4.5;
    }
    if ($bbe == 3) {
        $gbbe = 3.5;
    }
    if ($bbe == 4) {
        $gbbe = 2.5;
    }
    if ($bbe == 5) {
        $gbbe = 1.5;
    }
    // echo ' | ' . $gbbe;

    // nilai konversi GAP Nilai verbal
    if ($bve == -5) {
        $gbve = 1;
    }
    if ($bve == -4) {
        $gbve = 2;
    }
    if ($bve == -3) {
        $gbve = 3;
    }
    if ($bve == -2) {
        $gbve = 4;
    }
    if ($bve == -1) {
        $gbve = 5;
    }
    if ($bve == 0) {
        $gbve = 6;
    }
    if ($bve == 1) {
        $gbve = 5.5;
    }
    if ($bve == 2) {
        $gbve = 4.5;
    }
    if ($bve == 3) {
        $gbve = 3.5;
    }
    if ($bve == 4) {
        $gbve = 2.5;
    }
    if ($bve == 5) {
        $gbve = 1.5;
    }
    // echo ' | ' . $gbve;

    // nilai konversi GAP Nilai kuantitatif
    if ($bue == -5) {
        $gbue = 1;
    }
    if ($bue == -4) {
        $gbue = 2;
    }
    if ($bue == -3) {
        $gbue = 3;
    }
    if ($bue == -2) {
        $gbue = 4;
    }
    if ($bue == -1) {
        $gbue = 5;
    }
    if ($bue == 0) {
        $gbue = 6;
    }
    if ($bue == 1) {
        $gbue = 5.5;
    }
    if ($bue == 2) {
        $gbue = 4.5;
    }
    if ($bue == 3) {
        $gbue = 3.5;
    }
    if ($bue == 4) {
        $gbue = 2.5;
    }
    if ($bue == 5) {
        $gbue = 1.5;
    }
    // echo ' | ' . $gbue;

    // nilai konversi GAP Nilai penalaran
    if ($bpe == -5) {
        $gbpe = 1;
    }
    if ($bpe == -4) {
        $gbpe = 2;
    }
    if ($bpe == -3) {
        $gbpe = 3;
    }
    if ($bpe == -2) {
        $gbpe = 4;
    }
    if ($bpe == -1) {
        $gbpe = 5;
    }
    if ($bpe == 0) {
        $gbpe = 6;
    }
    if ($bpe == 1) {
        $gbpe = 5.5;
    }
    if ($bpe == 2) {
        $gbpe = 4.5;
    }
    if ($bpe == 3) {
        $gbpe = 3.5;
    }
    if ($bpe == 4) {
        $gbpe = 2.5;
    }
    if ($bpe == 5) {
        $gbpe = 1.5;
    }
    // echo ' | ' . $gbpe;

    // nilai gap NCF
    $ncfb3 = ($gbke + $gbbe + $gbve + $gbue) / 4;
    // echo ' | ' . $ncfb3;
    $nsfb3 = ($gbse + $gbme + $gbpe) / 3;
    // echo ' | ' . $nsfb3;
    $nfkb3 = (2 / 3 * $ncfb3) + (1 / 3 * $nsfb3);
    // echo ' | ' . $nfkb3 . '<br>';
    // akhir Ekonomi/Manajemen

    // jurusan Psikologi
    // nilai konversi GAP Nilai klerikal 
    if ($bkp == -5) {
        $gbkp = 1;
    }
    if ($bkp == -4) {
        $gbkp = 2;
    }
    if ($bkp == -3) {
        $gbkp = 3;
    }
    if ($bkp == -2) {
        $gbkp = 4;
    }
    if ($bkp == -1) {
        $gbkp = 5;
    }
    if ($bkp == 0) {
        $gbkp = 6;
    }
    if ($bkp == 1) {
        $gbkp = 5.5;
    }
    if ($bkp == 2) {
        $gbkp = 4.5;
    }
    if ($bkp == 3) {
        $gbkp = 3.5;
    }
    if ($bkp == 4) {
        $gbkp = 2.5;
    }
    if ($bkp == 5) {
        $gbkp = 1.5;
    }
    // echo $gbkp;

    // nilai konversi GAP Nilai pengetahuan spasial
    if ($bsp == -5) {
        $gbsp = 1;
    }
    if ($bsp == -4) {
        $gbsp = 2;
    }
    if ($bsp == -3) {
        $gbsp = 3;
    }
    if ($bsp == -2) {
        $gbsp = 4;
    }
    if ($bsp == -1) {
        $gbsp = 5;
    }
    if ($bsp == 0) {
        $gbsp = 6;
    }
    if ($bsp == 1) {
        $gbsp = 5.5;
    }
    if ($bsp == 2) {
        $gbsp = 4.5;
    }
    if ($bsp == 3) {
        $gbsp = 3.5;
    }
    if ($bsp == 4) {
        $gbsp = 2.5;
    }
    if ($bsp == 5) {
        $gbsp = 1.5;
    }
    // echo ' | ' . $gbsp;

    // nilai konversi GAP Nilai mekanik
    if ($bmp == -5) {
        $gbmp = 1;
    }
    if ($bmp == -4) {
        $gbmp = 2;
    }
    if ($bmp == -3) {
        $gbmp = 3;
    }
    if ($bmp == -2) {
        $gbmp = 4;
    }
    if ($bmp == -1) {
        $gbmp = 5;
    }
    if ($bmp == 0) {
        $gbmp = 6;
    }
    if ($bmp == 1) {
        $gbmp = 5.5;
    }
    if ($bmp == 2) {
        $gbmp = 4.5;
    }
    if ($bmp == 3) {
        $gbmp = 3.5;
    }
    if ($bmp == 4) {
        $gbmp = 2.5;
    }
    if ($bmp == 5) {
        $gbmp = 1.5;
    }
    // echo ' | ' . $gbmp;

    // nilai konversi GAP Nilai bahasa
    if ($bbp == -5) {
        $gbbp = 1;
    }
    if ($bbp == -4) {
        $gbbp = 2;
    }
    if ($bbp == -3) {
        $gbbp = 3;
    }
    if ($bbp == -2) {
        $gbbp = 4;
    }
    if ($bbp == -1) {
        $gbbp = 5;
    }
    if ($bbp == 0) {
        $gbbp = 6;
    }
    if ($bbp == 1) {
        $gbbp = 5.5;
    }
    if ($bbp == 2) {
        $gbbp = 4.5;
    }
    if ($bbp == 3) {
        $gbbp = 3.5;
    }
    if ($bbp == 4) {
        $gbbp = 2.5;
    }
    if ($bbp == 5) {
        $gbbp = 1.5;
    }
    // echo ' | ' . $gbbp;

    // nilai konversi GAP Nilai verbal
    if ($bvp == -5) {
        $gbvp = 1;
    }
    if ($bvp == -4) {
        $gbvp = 2;
    }
    if ($bvp == -3) {
        $gbvp = 3;
    }
    if ($bvp == -2) {
        $gbvp = 4;
    }
    if ($bvp == -1) {
        $gbvp = 5;
    }
    if ($bvp == 0) {
        $gbvp = 6;
    }
    if ($bvp == 1) {
        $gbvp = 5.5;
    }
    if ($bvp == 2) {
        $gbvp = 4.5;
    }
    if ($bvp == 3) {
        $gbvp = 3.5;
    }
    if ($bvp == 4) {
        $gbvp = 2.5;
    }
    if ($bvp == 5) {
        $gbvp = 1.5;
    }
    // echo ' | ' . $gbvp;

    // nilai konversi GAP Nilai kuantitatif
    if ($bup == -5) {
        $gbup = 1;
    }
    if ($bup == -4) {
        $gbup = 2;
    }
    if ($bup == -3) {
        $gbup = 3;
    }
    if ($bup == -2) {
        $gbup = 4;
    }
    if ($bup == -1) {
        $gbup = 5;
    }
    if ($bup == 0) {
        $gbup = 6;
    }
    if ($bup == 1) {
        $gbup = 5.5;
    }
    if ($bup == 2) {
        $gbup = 4.5;
    }
    if ($bup == 3) {
        $gbup = 3.5;
    }
    if ($bup == 4) {
        $gbup = 2.5;
    }
    if ($bup == 5) {
        $gbup = 1.5;
    }
    // echo ' | ' . $gbup;

    // nilai konversi GAP Nilai penalaran
    if ($bpp == -5) {
        $gbpp = 1;
    }
    if ($bpp == -4) {
        $gbpp = 2;
    }
    if ($bpp == -3) {
        $gbpp = 3;
    }
    if ($bpp == -2) {
        $gbpp = 4;
    }
    if ($bpp == -1) {
        $gbpp = 5;
    }
    if ($bpp == 0) {
        $gbpp = 6;
    }
    if ($bpp == 1) {
        $gbpp = 5.5;
    }
    if ($bpp == 2) {
        $gbpp = 4.5;
    }
    if ($bpp == 3) {
        $gbpp = 3.5;
    }
    if ($bpp == 4) {
        $gbpp = 2.5;
    }
    if ($bpp == 5) {
        $gbpp = 1.5;
    }
    // echo ' | ' . $gbpp;

    // nilai gap NCF
    $ncfb4 = ($gbkp + $gbbp + $gbvp + $gbup + $gbpp) / 5;
    // echo ' | ' . $ncfb4;
    $nsfb4 = ($gbsp + $gbmp) / 2;
    // echo ' | ' . $nsfb4;
    $nfkb4 = (2 / 3 * $ncfb4) + (1 / 3 * $nsfb4);
    // echo ' | ' . $nfkb4 . '<br>';
    // akhir Psikologi

    // jurusan Sospol/Hukum/Komunikasi (FISIP)
    // nilai konversi GAP Nilai klerikal 
    if ($bkh == -5) {
        $gbkh = 1;
    }
    if ($bkh == -4) {
        $gbkh = 2;
    }
    if ($bkh == -3) {
        $gbkh = 3;
    }
    if ($bkh == -2) {
        $gbkh = 4;
    }
    if ($bkh == -1) {
        $gbkh = 5;
    }
    if ($bkh == 0) {
        $gbkh = 6;
    }
    if ($bkh == 1) {
        $gbkh = 5.5;
    }
    if ($bkh == 2) {
        $gbkh = 4.5;
    }
    if ($bkh == 3) {
        $gbkh = 3.5;
    }
    if ($bkh == 4) {
        $gbkh = 2.5;
    }
    if ($bkh == 5) {
        $gbkh = 1.5;
    }
    // echo $gbkh;

    // nilai konversi GAP Nilai spasial
    if ($bsh == -5) {
        $gbsh = 1;
    }
    if ($bsh == -4) {
        $gbsh = 2;
    }
    if ($bsh == -3) {
        $gbsh = 3;
    }
    if ($bsh == -2) {
        $gbsh = 4;
    }
    if ($bsh == -1) {
        $gbsh = 5;
    }
    if ($bsh == 0) {
        $gbsh = 6;
    }
    if ($bsh == 1) {
        $gbsh = 5.5;
    }
    if ($bsh == 2) {
        $gbsh = 4.5;
    }
    if ($bsh == 3) {
        $gbsh = 3.5;
    }
    if ($bsh == 4) {
        $gbsh = 2.5;
    }
    if ($bsh == 5) {
        $gbsh = 1.5;
    }
    // echo ' | ' . $gbsh;

    // nilai konversi GAP Nilai mekanik
    if ($bmh == -5) {
        $gbmh = 1;
    }
    if ($bmh == -4) {
        $gbmh = 2;
    }
    if ($bmh == -3) {
        $gbmh = 3;
    }
    if ($bmh == -2) {
        $gbmh = 4;
    }
    if ($bmh == -1) {
        $gbmh = 5;
    }
    if ($bmh == 0) {
        $gbmh = 6;
    }
    if ($bmh == 1) {
        $gbmh = 5.5;
    }
    if ($bmh == 2) {
        $gbmh = 4.5;
    }
    if ($bmh == 3) {
        $gbmh = 3.5;
    }
    if ($bmh == 4) {
        $gbmh = 2.5;
    }
    if ($bmh == 5) {
        $gbmh = 1.5;
    }
    // echo ' | ' . $gbmh;

    // nilai konversi GAP Nilai bahasa
    if ($bbh == -5) {
        $gbbh = 1;
    }
    if ($bbh == -4) {
        $gbbh = 2;
    }
    if ($bbh == -3) {
        $gbbh = 3;
    }
    if ($bbh == -2) {
        $gbbh = 4;
    }
    if ($bbh == -1) {
        $gbbh = 5;
    }
    if ($bbh == 0) {
        $gbbh = 6;
    }
    if ($bbh == 1) {
        $gbbh = 5.5;
    }
    if ($bbh == 2) {
        $gbbh = 4.5;
    }
    if ($bbh == 3) {
        $gbbh = 3.5;
    }
    if ($bbh == 4) {
        $gbbh = 2.5;
    }
    if ($bbh == 5) {
        $gbbh = 1.5;
    }
    // echo ' | ' . $gbbh;

    // nilai konversi GAP Nilai verbal
    if ($bvh == -5) {
        $gbvh = 1;
    }
    if ($bvh == -4) {
        $gbvh = 2;
    }
    if ($bvh == -3) {
        $gbvh = 3;
    }
    if ($bvh == -2) {
        $gbvh = 4;
    }
    if ($bvh == -1) {
        $gbvh = 5;
    }
    if ($bvh == 0) {
        $gbvh = 6;
    }
    if ($bvh == 1) {
        $gbvh = 5.5;
    }
    if ($bvh == 2) {
        $gbvh = 4.5;
    }
    if ($bvh == 3) {
        $gbvh = 3.5;
    }
    if ($bvh == 4) {
        $gbvh = 2.5;
    }
    if ($bvh == 5) {
        $gbvh = 1.5;
    }
    // echo ' | ' . $gbvh;

    // nilai konversi GAP Nilai kuantitatif
    if ($buh == -5) {
        $gbuh = 1;
    }
    if ($buh == -4) {
        $gbuh = 2;
    }
    if ($buh == -3) {
        $gbuh = 3;
    }
    if ($buh == -2) {
        $gbuh = 4;
    }
    if ($buh == -1) {
        $gbuh = 5;
    }
    if ($buh == 0) {
        $gbuh = 6;
    }
    if ($buh == 1) {
        $gbuh = 5.5;
    }
    if ($buh == 2) {
        $gbuh = 4.5;
    }
    if ($buh == 3) {
        $gbuh = 3.5;
    }
    if ($buh == 4) {
        $gbuh = 2.5;
    }
    if ($buh == 5) {
        $gbuh = 1.5;
    }
    // echo ' | ' . $gbuh;

    // nilai konversi GAP Nilai penalaran
    if ($bph == -5) {
        $gbph = 1;
    }
    if ($bph == -4) {
        $gbph = 2;
    }
    if ($bph == -3) {
        $gbph = 3;
    }
    if ($bph == -2) {
        $gbph = 4;
    }
    if ($bph == -1) {
        $gbph = 5;
    }
    if ($bph == 0) {
        $gbph = 6;
    }
    if ($bph == 1) {
        $gbph = 5.5;
    }
    if ($bph == 2) {
        $gbph = 4.5;
    }
    if ($bph == 3) {
        $gbph = 3.5;
    }
    if ($bph == 4) {
        $gbph = 2.5;
    }
    if ($bph == 5) {
        $gbph = 1.5;
    }
    // echo ' | ' . $gbph;

    // nilai gap NCF
    $ncfb5 = ($gbkh + $gbbh + $gbvh + $gbph) / 4;
    // echo ' | ' . $ncfb5;
    $nsfb5 = ($gbsh + $gbmh + $gbuh) / 3;
    // echo ' | ' . $nsfb5;
    $nfkb5 = (2 / 3 * $ncfb5) + (1 / 3 * $nsfb5);
    // echo ' | ' . $nfkb5 . '<br>';
    // akhir Sospol/Hukum/Komunikasi (FISIP)

    // jurusan Sastra/Seni/Budaya
    // nilai konversi GAP Nilai klerikal 
    if ($bks == -5) {
        $gbks = 1;
    }
    if ($bks == -4) {
        $gbks = 2;
    }
    if ($bks == -3) {
        $gbks = 3;
    }
    if ($bks == -2) {
        $gbks = 4;
    }
    if ($bks == -1) {
        $gbks = 5;
    }
    if ($bks == 0) {
        $gbks = 6;
    }
    if ($bks == 1) {
        $gbks = 5.5;
    }
    if ($bks == 2) {
        $gbks = 4.5;
    }
    if ($bks == 3) {
        $gbks = 3.5;
    }
    if ($bks == 4) {
        $gbks = 2.5;
    }
    if ($bks == 5) {
        $gbks = 1.5;
    }
    // echo $gbks;

    // nilai konversi GAP Nilai spasial
    if ($bss == -5) {
        $gbss = 1;
    }
    if ($bss == -4) {
        $gbss = 2;
    }
    if ($bss == -3) {
        $gbss = 3;
    }
    if ($bss == -2) {
        $gbss = 4;
    }
    if ($bss == -1) {
        $gbss = 5;
    }
    if ($bss == 0) {
        $gbss = 6;
    }
    if ($bss == 1) {
        $gbss = 5.5;
    }
    if ($bss == 2) {
        $gbss = 4.5;
    }
    if ($bss == 3) {
        $gbss = 3.5;
    }
    if ($bss == 4) {
        $gbss = 2.5;
    }
    if ($bss == 5) {
        $gbss = 1.5;
    }
    // echo ' | ' . $gbss;

    // nilai konversi GAP Nilai mekanik
    if ($bms == -5) {
        $gbms = 1;
    }
    if ($bms == -4) {
        $gbms = 2;
    }
    if ($bms == -3) {
        $gbms = 3;
    }
    if ($bms == -2) {
        $gbms = 4;
    }
    if ($bms == -1) {
        $gbms = 5;
    }
    if ($bms == 0) {
        $gbms = 6;
    }
    if ($bms == 1) {
        $gbms = 5.5;
    }
    if ($bms == 2) {
        $gbms = 4.5;
    }
    if ($bms == 3) {
        $gbms = 3.5;
    }
    if ($bms == 4) {
        $gbms = 2.5;
    }
    if ($bms == 5) {
        $gbms = 1.5;
    }
    // echo ' | ' . $gbms;

    // nilai konversi GAP Nilai bahasa
    if ($bbs == -5) {
        $gbbs = 1;
    }
    if ($bbs == -4) {
        $gbbs = 2;
    }
    if ($bbs == -3) {
        $gbbs = 3;
    }
    if ($bbs == -2) {
        $gbbs = 4;
    }
    if ($bbs == -1) {
        $gbbs = 5;
    }
    if ($bbs == 0) {
        $gbbs = 6;
    }
    if ($bbs == 1) {
        $gbbs = 5.5;
    }
    if ($bbs == 2) {
        $gbbs = 4.5;
    }
    if ($bbs == 3) {
        $gbbs = 3.5;
    }
    if ($bbs == 4) {
        $gbbs = 2.5;
    }
    if ($bbs == 5) {
        $gbbs = 1.5;
    }
    // echo ' | ' . $gbbs;

    // nilai konversi GAP Nilai verbal
    if ($bvs == -5) {
        $gbvs = 1;
    }
    if ($bvs == -4) {
        $gbvs = 2;
    }
    if ($bvs == -3) {
        $gbvs = 3;
    }
    if ($bvs == -2) {
        $gbvs = 4;
    }
    if ($bvs == -1) {
        $gbvs = 5;
    }
    if ($bvs == 0) {
        $gbvs = 6;
    }
    if ($bvs == 1) {
        $gbvs = 5.5;
    }
    if ($bvs == 2) {
        $gbvs = 4.5;
    }
    if ($bvs == 3) {
        $gbvs = 3.5;
    }
    if ($bvs == 4) {
        $gbvs = 2.5;
    }
    if ($bvs == 5) {
        $gbvs = 1.5;
    }
    // echo ' | ' . $gbvs;

    // nilai konversi GAP Nilai kuantitatif
    if ($bus == -5) {
        $gbus = 1;
    }
    if ($bus == -4) {
        $gbus = 2;
    }
    if ($bus == -3) {
        $gbus = 3;
    }
    if ($bus == -2) {
        $gbus = 4;
    }
    if ($bus == -1) {
        $gbus = 5;
    }
    if ($bus == 0) {
        $gbus = 6;
    }
    if ($bus == 1) {
        $gbus = 5.5;
    }
    if ($bus == 2) {
        $gbus = 4.5;
    }
    if ($bus == 3) {
        $gbus = 3.5;
    }
    if ($bus == 4) {
        $gbus = 2.5;
    }
    if ($bus == 5) {
        $gbus = 1.5;
    }
    // echo ' | ' . $gbus;

    // nilai konversi GAP Nilai penalaran
    if ($bps == -5) {
        $gbps = 1;
    }
    if ($bps == -4) {
        $gbps = 2;
    }
    if ($bps == -3) {
        $gbps = 3;
    }
    if ($bps == -2) {
        $gbps = 4;
    }
    if ($bps == -1) {
        $gbps = 5;
    }
    if ($bps == 0) {
        $gbps = 6;
    }
    if ($bps == 1) {
        $gbps = 5.5;
    }
    if ($bps == 2) {
        $gbps = 4.5;
    }
    if ($bps == 3) {
        $gbps = 3.5;
    }
    if ($bps == 4) {
        $gbps = 2.5;
    }
    if ($bps == 5) {
        $gbps = 1.5;
    }
    // echo ' | ' . $gbps;

    // nilai gap NCF
    $ncfb6 = ($gbbs + $gbps) / 2;
    // echo ' | ' . $ncfb6;
    $nsfb6 = ($gbks + $gbss + $gbms + $gbvs + $gbus) / 5;
    // echo ' | ' . $nsfb6;
    $nfkb6 = (2 / 3 * $ncfb6) + (1 / 3 * $nsfb6);
    // echo ' | ' . $nfkb6 . '<br>';
    // akhir Sastra/Seni/Budaya

    // jurusan Administrasi/Sekretaris
    // nilai konversi GAP Nilai klerikal 
    if ($bka == -5) {
        $gbka = 1;
    }
    if ($bka == -4) {
        $gbka = 2;
    }
    if ($bka == -3) {
        $gbka = 3;
    }
    if ($bka == -2) {
        $gbka = 4;
    }
    if ($bka == -1) {
        $gbka = 5;
    }
    if ($bka == 0) {
        $gbka = 6;
    }
    if ($bka == 1) {
        $gbka = 5.5;
    }
    if ($bka == 2) {
        $gbka = 4.5;
    }
    if ($bka == 3) {
        $gbka = 3.5;
    }
    if ($bka == 4) {
        $gbka = 2.5;
    }
    if ($bka == 5) {
        $gbka = 1.5;
    }
    // echo $gbka;

    // nilai konversi GAP Nilai spasial
    if ($bsa == -5) {
        $gbsa = 1;
    }
    if ($bsa == -4) {
        $gbsa = 2;
    }
    if ($bsa == -3) {
        $gbsa = 3;
    }
    if ($bsa == -2) {
        $gbsa = 4;
    }
    if ($bsa == -1) {
        $gbsa = 5;
    }
    if ($bsa == 0) {
        $gbsa = 6;
    }
    if ($bsa == 1) {
        $gbsa = 5.5;
    }
    if ($bsa == 2) {
        $gbsa = 4.5;
    }
    if ($bsa == 3) {
        $gbsa = 3.5;
    }
    if ($bsa == 4) {
        $gbsa = 2.5;
    }
    if ($bsa == 5) {
        $gbsa = 1.5;
    }
    // echo ' | ' . $gbsa;

    // nilai konversi GAP Nilai mekanik
    if ($bma == -5) {
        $gbma = 1;
    }
    if ($bma == -4) {
        $gbma = 2;
    }
    if ($bma == -3) {
        $gbma = 3;
    }
    if ($bma == -2) {
        $gbma = 4;
    }
    if ($bma == -1) {
        $gbma = 5;
    }
    if ($bma == 0) {
        $gbma = 6;
    }
    if ($bma == 1) {
        $gbma = 5.5;
    }
    if ($bma == 2) {
        $gbma = 4.5;
    }
    if ($bma == 3) {
        $gbma = 3.5;
    }
    if ($bma == 4) {
        $gbma = 2.5;
    }
    if ($bma == 5) {
        $gbma = 1.5;
    }
    // echo ' | ' . $gbma;

    // nilai konversi GAP Nilai bahasa
    if ($bba == -5) {
        $gbba = 1;
    }
    if ($bba == -4) {
        $gbba = 2;
    }
    if ($bba == -3) {
        $gbba = 3;
    }
    if ($bba == -2) {
        $gbba = 4;
    }
    if ($bba == -1) {
        $gbba = 5;
    }
    if ($bba == 0) {
        $gbba = 6;
    }
    if ($bba == 1) {
        $gbba = 5.5;
    }
    if ($bba == 2) {
        $gbba = 4.5;
    }
    if ($bba == 3) {
        $gbba = 3.5;
    }
    if ($bba == 4) {
        $gbba = 2.5;
    }
    if ($bba == 5) {
        $gbba = 1.5;
    }
    // echo ' | ' . $gbba;

    // nilai konversi GAP Nilai verbal
    if ($bva == -5) {
        $gbva = 1;
    }
    if ($bva == -4) {
        $gbva = 2;
    }
    if ($bva == -3) {
        $gbva = 3;
    }
    if ($bva == -2) {
        $gbva = 4;
    }
    if ($bva == -1) {
        $gbva = 5;
    }
    if ($bva == 0) {
        $gbva = 6;
    }
    if ($bva == 1) {
        $gbva = 5.5;
    }
    if ($bva == 2) {
        $gbva = 4.5;
    }
    if ($bva == 3) {
        $gbva = 3.5;
    }
    if ($bva == 4) {
        $gbva = 2.5;
    }
    if ($bva == 5) {
        $gbva = 1.5;
    }
    // echo ' | ' . $gbva;

    // nilai konversi GAP Nilai kuantitatif
    if ($bua == -5) {
        $gbua = 1;
    }
    if ($bua == -4) {
        $gbua = 2;
    }
    if ($bua == -3) {
        $gbua = 3;
    }
    if ($bua == -2) {
        $gbua = 4;
    }
    if ($bua == -1) {
        $gbua = 5;
    }
    if ($bua == 0) {
        $gbua = 6;
    }
    if ($bua == 1) {
        $gbua = 5.5;
    }
    if ($bua == 2) {
        $gbua = 4.5;
    }
    if ($bua == 3) {
        $gbua = 3.5;
    }
    if ($bua == 4) {
        $gbua = 2.5;
    }
    if ($bua == 5) {
        $gbua = 1.5;
    }
    // echo ' | ' . $gbua;

    // nilai konversi GAP Nilai penalaran
    if ($bpa == -5) {
        $gbpa = 1;
    }
    if ($bpa == -4) {
        $gbpa = 2;
    }
    if ($bpa == -3) {
        $gbpa = 3;
    }
    if ($bpa == -2) {
        $gbpa = 4;
    }
    if ($bpa == -1) {
        $gbpa = 5;
    }
    if ($bpa == 0) {
        $gbpa = 6;
    }
    if ($bpa == 1) {
        $gbpa = 5.5;
    }
    if ($bpa == 2) {
        $gbpa = 4.5;
    }
    if ($bpa == 3) {
        $gbpa = 3.5;
    }
    if ($bpa == 4) {
        $gbpa = 2.5;
    }
    if ($bpa == 5) {
        $gbpa = 1.5;
    }
    // echo ' | ' . $gbpa;

    // nilai gap NCF
    $ncfb7 = ($gbva + $gbua) / 2;
    // echo ' | ' . $ncfb7;
    $nsfb7 = ($gbka + $gbsa + $gbma + $gbba + $gbpa) / 5;
    // echo ' | ' . $nsfb7;
    $nfkb7 = (2 / 3 * $ncfb7) + (1 / 3 * $nsfb7);
    // echo ' | ' . $nfkb7 . '<br><br>';
    // akhir Administrasi/Sekretaris
    // akhir nilai bakat


    // Perhitungan nilai total (NT)
    // echo 'Teknik | ' . $nfkp1 . ' | ' . $nfkk1 . ' | ' . $nfkb1 . ' = ' . $nfkp1 + $nfkk1 + $nfkb1 . '<br>';
    // teknik
    if($_SESSION['jurusan'] == 1){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 0.5;
    }
    if($_SESSION['jurusan'] == 2){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 1;
    }
    if($_SESSION['jurusan'] == 3){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 0.25;
    }
    if($_SESSION['jurusan'] == 4){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 0.5;
    }
    if($_SESSION['jurusan'] == 5){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 0.25;
    }
    if($_SESSION['jurusan'] == 6){
        $na1 = $nfkp1 + $nfkk1 + $nfkb1 + 0.25;
    }
    // $na1 = $nfkp1 + $nfkk1 + $nfkb1;
    // echo 'Matematika dan Sains | ' . $nfkp2 . ' | ' . $nfkk2 . ' | ' . $nfkb2 . ' = ' . $nfkp2 + $nfkk2 + $nfkb2 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 0.25;
    }
    if($_SESSION['jurusan'] == 2){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 1;
    }
    if($_SESSION['jurusan'] == 3){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 0.25;
    }
    if($_SESSION['jurusan'] == 4){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 0.5;
    }
    if($_SESSION['jurusan'] == 5){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 0;
    }
    if($_SESSION['jurusan'] == 6){
        $na2 = $nfkp2 + $nfkk2 + $nfkb2 + 0;
    }
    // $na2 = $nfkp2 + $nfkk2 + $nfkb2;
    // echo 'Ekonomi/Manajemen | ' . $nfkp3 . ' | ' . $nfkk3 . ' | ' . $nfkb3 . ' = ' . $nfkp3 + $nfkk3 + $nfkb3 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 0.5;
    }
    if($_SESSION['jurusan'] == 2){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 1.5;
    }
    if($_SESSION['jurusan'] == 3){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 1;
    }
    if($_SESSION['jurusan'] == 4){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 0.5;
    }
    if($_SESSION['jurusan'] == 5){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 0.5;
    }
    if($_SESSION['jurusan'] == 6){
        $na3 = $nfkp3 + $nfkk3 + $nfkb3 + 0.5;
    }

    // $na3 = $nfkp3 + $nfkk3 + $nfkb3;
    // echo 'Psikologi | ' . $nfkp4 . ' | ' . $nfkk4 . ' | ' . $nfkb4 . ' = ' . $nfkp4 + $nfkk4 + $nfkb4 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 0.25;
    }
    if($_SESSION['jurusan'] == 2){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 0.25;
    }
    if($_SESSION['jurusan'] == 3){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 0.5;
    }
    if($_SESSION['jurusan'] == 4){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 0.25;
    }
    if($_SESSION['jurusan'] == 5){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 1;
    }
    if($_SESSION['jurusan'] == 6){
        $na4 = $nfkp4 + $nfkk4 + $nfkb4 + 0.5;
    }
    // $na4 = $nfkp4 + $nfkk4 + $nfkb4;
    // echo 'Sospol/Hukum/Komunikasi (FISIP) | ' . $nfkp5 . ' | ' . $nfkk5 . ' | ' . $nfkb5 . ' = ' . $nfkp5 + $nfkk5 + $nfkb5 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 0.5;
    }
    if($_SESSION['jurusan'] == 2){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 1;
    }
    if($_SESSION['jurusan'] == 3){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 1;
    }
    if($_SESSION['jurusan'] == 4){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 0.25;
    }
    if($_SESSION['jurusan'] == 5){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 0.5;
    }
    if($_SESSION['jurusan'] == 6){
        $na5 = $nfkp5 + $nfkk5 + $nfkb5 + 0.25;
    }
    // $na5 = $nfkp5 + $nfkk5 + $nfkb5;
    // echo 'Sastra/Seni/Budaya | ' . $nfkp6 . ' | ' . $nfkk6 . ' | ' . $nfkb6 . ' = ' . $nfkp6 + $nfkk6 + $nfkb6 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 0.5;
    }
    if($_SESSION['jurusan'] == 2){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 0.25;
    }
    if($_SESSION['jurusan'] == 3){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 0.5;
    }
    if($_SESSION['jurusan'] == 4){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 1;
    }
    if($_SESSION['jurusan'] == 5){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 1.5;
    }
    if($_SESSION['jurusan'] == 6){
        $na6 = $nfkp6 + $nfkk6 + $nfkb6 + 1.5;
    }
    // $na6 = $nfkp6 + $nfkk6 + $nfkb6;
    // echo 'Administrasi/Sekretaris | ' . $nfkp7 . ' | ' . $nfkk7 . ' | ' . $nfkb7 . ' = ' . $nfkp7 + $nfkk7 + $nfkb7 . '<br>';
    if($_SESSION['jurusan'] == 1){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 1.5;
    }
    if($_SESSION['jurusan'] == 2){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 0.5;
    }
    if($_SESSION['jurusan'] == 3){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 1;
    }
    if($_SESSION['jurusan'] == 4){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 0.5;
    }
    if($_SESSION['jurusan'] == 5){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 0.25;
    }
    if($_SESSION['jurusan'] == 6){
        $na7 = $nfkp7 + $nfkk7 + $nfkb7 + 0.25;
    }
    // $na7 = $nfkp7 + $nfkk7 + $nfkb7;

    $resultcek = mysqli_query($conn, "SELECT * FROM nilai_akhir WHERE id_user = '{$_SESSION['id_user']}'");
    $cek = mysqli_num_rows($resultcek);
    if ($cek == 0) {
        $sqlteknik = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','1','$nfkp1','$nfkk1','$nfkb1','$na1')";

        $sqlmtk = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','2','$nfkp2','$nfkk2','$nfkb2','$na2')";
    
        $sqleko = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','3','$nfkp3','$nfkk3','$nfkb3','$na3')";
    
        $sqlpsi = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','4','$nfkp4','$nfkk4','$nfkb4','$na4')";
    
        $sqlsospol = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','5','$nfkp5','$nfkk5','$nfkb5','$na5')";
    
        $sqlsastra = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','6','$nfkp6','$nfkk6','$nfkb6','$na6')";
    
        $sqladm = "INSERT INTO nilai_akhir (id_user,id_jurusan,id_fakultas,n_pengetahuan,n_keterampilan,n_bakat,n_akhir) VALUES ('{$_SESSION['id_user']}','{$_SESSION['jurusan']}','7','$nfkp7','$nfkk7','$nfkb7','$na7')";
    
        $tambaht = mysqli_query($conn, $sqlteknik);
        $tambahm = mysqli_query($conn, $sqlmtk);
        $tambahe = mysqli_query($conn, $sqleko);
        $tambahp = mysqli_query($conn, $sqlpsi);
        $tambahsos = mysqli_query($conn, $sqlsospol);
        $tambahsas = mysqli_query($conn, $sqlsastra);
        $tambaha = mysqli_query($conn, $sqladm);
        header("location: rekomendasi.php");
    }
?>