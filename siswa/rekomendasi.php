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

$resultcek = mysqli_query($conn, "SELECT * FROM nilai_akhir WHERE id_user = '{$_SESSION['id_user']}'");
$cek = mysqli_num_rows($resultcek);
if ($cek == 0) {
    header("location: hitungan.php");
}
include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebarsiswa.php');
$sql = "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan WHERE user.username = '{$_SESSION['username']}'";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// $sqlhasil= "SELECT * FROM `nilai_akhir` WHERE id_user = '{$_SESSION['id_user']}' ORDER BY n_akhir DESC";
$sqlhasil = "SELECT * FROM `nilai_akhir` JOIN user ON user.id_user = nilai_akhir.id_user JOIN fakultas ON fakultas.id_fakultas = nilai_akhir.id_fakultas WHERE nilai_akhir.id_user = '{$_SESSION['id_user']}' ORDER BY n_akhir DESC";
$hasilakhir = mysqli_query($conn, $sqlhasil);
$hasil = mysqli_fetch_array($hasilakhir);
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
                                    <?php $i=0; ?>
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