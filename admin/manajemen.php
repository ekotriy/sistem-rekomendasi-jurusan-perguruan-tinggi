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
$users = mysqli_query($conn, "SELECT * FROM user");
$jumlahuser = mysqli_num_rows($users);

$tampil = mysqli_query($conn, "SELECT * FROM `jurusan` INNER JOIN user on user.id_jurusan = jurusan.id_jurusan");
$data = mysqli_fetch_assoc($tampil);

include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebar.php');
?>

<!--**********************************
            Content body start
***********************************-->
<div class="content-body">

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Jumlah Pengguna </h3><br>
                        <div class="d-inline-block">
                            <h2 class="text-white"><?= $jumlahuser; ?></h2>
                            <p class="text-white mb-0"><?= date('d - M - Y'); ?></p>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Batas Pengetahuan & Keterampilan</h3>
                        <div class="d-inline-block">
                        <span class="label gradient-4 btn-rounded"><a href="raport.php" class="text-white" >pengaturan</a></span>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-book"></i></span>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Batas Bakat</h3><br>
                        <div class="d-inline-block">
                        <span class="label gradient-1 btn-rounded"><a href="bakat.php" class="text-white" >pengaturan</a></span>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-file"></i></span>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Data Pengguna</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Nama</th>
                                        <th>NISN</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Jurusan</th>
                                        <th>Sekolah</th>
                                        <th><a href="tambah.php" class="btn btn-primary">Tambah</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= 1; ?></td>
                                        <td><?= $data['username']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['nisn']; ?></td>
                                        <td><?= $data['jenis_kelamin']; ?></td>
                                        <td><?= $data['jurusan']; ?></td>
                                        <td><?= $data['sekolah']; ?></td>
                                        <td>
                                            <a href="edit.php?id=<?= $data['id_user'] ?>" class="btn gradient-3 btn-rounded mb-2">Edit</a>
                                            <a href="detail.php?id=<?= $data['id_user'] ?>" class="btn gradient-1 btn-rounded mb-2">Detail</a>
                                        </td>
                                    </tr <?php $i = 2; ?> <?php while ($data = mysqli_fetch_array($tampil)) : ?> <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $data['username']; ?></td>
                                    <td><?= $data['nama']; ?></td>
                                    <td><?= $data['nisn']; ?></td>
                                    <td><?= $data['jenis_kelamin']; ?></td>
                                    <td><?= $data['jurusan']; ?></td>
                                    <td><?= $data['sekolah']; ?></td>
                                    <td>
                                        <a href="edit.php?id=<?= $data['id_user'] ?>" class="btn gradient-3 btn-rounded mb-2">Edit</a>
                                        <a href="detail.php?id=<?= $data['id_user'] ?>" class="btn gradient-1 btn-rounded mb-2">Detail</a>
                                    </td>
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
<!--**********************************
            Content body end
***********************************-->

<?php
include('../parsial/footer.php');
?>