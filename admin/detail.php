<?php
error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
if ($_SESSION['status'] == 2) {
    header("location: ../login.php");
}
include "../koneksi.php";
$id = $_GET['id'];
$sqlpengetahuan = mysqli_query($conn, "SELECT * FROM pengetahuan WHERE id_user = $id");
$datap = mysqli_fetch_array($sqlpengetahuan);

$sqlketerampilan = mysqli_query($conn, "SELECT * FROM keterampilan WHERE id_user = $id");
$datak = mysqli_fetch_array($sqlketerampilan);

$sqlbakat = mysqli_query($conn, "SELECT * FROM bakat WHERE id_user = $id");
$datab = mysqli_fetch_array($sqlbakat);


$sql = "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan WHERE user.id_user = $id";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// $sqlhasil= "SELECT * FROM `nilai_akhir` WHERE id_user = '{$_SESSION['id_user']}' ORDER BY n_akhir DESC";
$sqlhasil = "SELECT * FROM `nilai_akhir` JOIN user ON user.id_user = nilai_akhir.id_user JOIN fakultas ON fakultas.id_fakultas = nilai_akhir.id_fakultas WHERE nilai_akhir.id_user = '$id' ORDER BY n_akhir DESC";
$hasilakhir = mysqli_query($conn, $sqlhasil);
$hasil = mysqli_fetch_array($hasilakhir);


include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebar.php');
?>

<div class="content-body">

    <!-- row -->

    <div class="container-fluid">
        <div class="row mt-4">
        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Detail Rekomendasi Siswa</h4>
                    </div>
                </div>
            </div>



            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img class="" src="../images/user/user.png" width="80" height="80" alt="">

                        </div>
                        <h4>Tentang Saya</h4>
                        <p class="text-muted">Hi, Saya <?= $data['nama'] ?> dari <?= $data['sekolah'] ?>.</p>
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
                        <h4 class="card-title">Nilai Pengetahuan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Bahasa</th>
                                        <th>Logika</th>
                                        <th>Sains</th>
                                        <th>Praktek</th>
                                        <th>Sosial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= is_null($datap['bahasa']) ? "" : $datap['bahasa']; ?></td>
                                        <td><?= is_null($datap['logika']) ? "" : $datap['logika'] ?></td>
                                        <td><?= is_null($datap['sains']) ? "" : $datap['sains'] ?></td>
                                        <td><?= is_null($datap['praktek']) ? "" : $datap['praktek'] ?></td>
                                        <td><?= is_null($datap['sosial']) ? "" : $datap['sosial'] ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nilai Keterampilan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Bahasa</th>
                                        <th>Logika</th>
                                        <th>Sains</th>
                                        <th>Praktek</th>
                                        <th>Sosial</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= is_null($datak['bahasa']) ? "" : $datak['bahasa']; ?></td>
                                        <td><?= is_null($datak['logika']) ? "" : $datak['logika'] ?></td>
                                        <td><?= is_null($datak['sains']) ? "" : $datak['sains'] ?></td>
                                        <td><?= is_null($datak['praktek']) ? "" : $datak['praktek'] ?></td>
                                        <td><?= is_null($datak['sosial']) ? "" : $datak['sosial'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Nilai Bakat</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>Klerikal</th>
                                        <th>Spasial</th>
                                        <th>Mekanik</th>
                                        <th>Bahasa</th>
                                        <th>Verbal</th>
                                        <th>Kuantitatif</th>
                                        <th>Penalaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= is_null($datab['klerikal']) ? "" : $datab['klerikal']; ?></td>
                                        <td><?= is_null($datab['spasial']) ? "" : $datab['spasial']; ?></td>
                                        <td><?= is_null($datab['mekanik']) ? "" : $datab['mekanik']; ?></td>
                                        <td><?= is_null($datab['bahasa']) ? "" : $datab['bahasa']; ?></td>
                                        <td><?= is_null($datab['verbal']) ? "" : $datab['verbal']; ?></td>
                                        <td><?= is_null($datab['kuantitatif']) ? "" : $datab['kuantitatif']; ?></td>
                                        <td><?= is_null($datab['penalaran']) ? "" : $datab['penalaran']; ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Hasil Rekomendasi</h4>
                        <div class="table-responsive">
                            <table class="table header-border">
                                <thead>
                                    <tr>
                                        <th>Jurusan</th>
                                        <th>Pengetahuan</th>
                                        <th>Keterampilan</th>
                                        <th>Bakat</th>
                                        <th>Rekomendasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $hasil['fakultas']; ?></td>
                                        <td><?= $hasil['n_pengetahuan']; ?></td>
                                        <td><?= $hasil['n_keterampilan']; ?></td>
                                        <td><?= $hasil['n_bakat']; ?></td>
                                        <td><?= $hasil['n_akhir']; ?></td>
                                    </tr>
                                    <?php $i = 0; ?>
                                    <?php while ($hasil = mysqli_fetch_array($hasilakhir)) : ?>
                                        <tr>
                                            <td><?= $hasil['fakultas']; ?></td>
                                            <td><?= $hasil['n_pengetahuan']; ?></td>
                                            <td><?= $hasil['n_keterampilan']; ?></td>
                                            <td><?= $hasil['n_bakat']; ?></td>
                                            <td><?= $hasil['n_akhir']; ?></td>
                                        </tr>
                                        <?php $i++ ?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
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