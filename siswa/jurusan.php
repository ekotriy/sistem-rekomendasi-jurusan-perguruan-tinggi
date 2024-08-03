<?php
error_reporting(0);
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
if($_SESSION['status'] == 1){
    header("location: ../login.php");
}
include "../koneksi.php";

$pengetahuan = "SELECT * FROM pengetahuan WHERE id_user = '{$_SESSION['id_user']}'";
$resultp = mysqli_query($conn, $pengetahuan);
$datap = mysqli_fetch_array($resultp);

$keterampilan = "SELECT * FROM keterampilan WHERE id_user = '{$_SESSION['id_user']}'";
$resultk = mysqli_query($conn, $keterampilan);
$datak = mysqli_fetch_array($resultk);

$bakat = "SELECT * FROM bakat WHERE id_user = '{$_SESSION['id_user']}'";
$resultb = mysqli_query($conn, $bakat);
$datab = mysqli_fetch_array($resultb);

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
        <div class="row mt-4">
            <div class="col-12">
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
                                        <th><a href="pengetahuan.php" class="btn btn-primary">Tambah</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= is_null($datap['bahasa']) ? "" : $datap['bahasa']; ?></td>
                                        <td><?= is_null($datap['logika']) ? "" : $datap['logika'] ?></td>
                                        <td><?= is_null($datap['sains']) ? "" : $datap['sains'] ?></td>
                                        <td><?= is_null($datap['praktek']) ? "" : $datap['praktek'] ?></td>
                                        <td><?= is_null($datap['sosial']) ? "" : $datap['sosial'] ?></td>
                                        <td><a href="edit_pengetahuan.php" class="btn btn-warning">Edit</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
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
                                        <th><a href="keterampilan.php" class="btn btn-primary">Tambah</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= is_null($datak['bahasa']) ? "" : $datak['bahasa']; ?></td>
                                        <td><?= is_null($datak['logika']) ? "" : $datak['logika'] ?></td>
                                        <td><?= is_null($datak['sains']) ? "" : $datak['sains'] ?></td>
                                        <td><?= is_null($datak['praktek']) ? "" : $datak['praktek'] ?></td>
                                        <td><?= is_null($datak['sosial']) ? "" : $datak['sosial'] ?></td>
                                        <td><a href="edit_keterampilan.php" class="btn btn-warning">Edit</a></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
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
                                        <th><a href="bakat.php" class="btn btn-primary">Tambah</a></th>
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
                                        <td><a href="edit_bakat.php" class="btn btn-warning">Edit</a></td>
                                    </tr>

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
<!--**********************************
            Content body end
        ***********************************-->

<?php
include('../parsial/footer.php');
?>