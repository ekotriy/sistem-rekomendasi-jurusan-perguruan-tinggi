<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: ../login.php");
    exit;
}
if($_SESSION['status'] == 1){
    header("location: ../login.php");
}
include('../parsial/header.php');
include('../parsial/topbar.php');
include('../parsial/sidebarsiswa.php');

?>
<div class="content-body">
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card">
                    <div class="card-body mx-2">
                        <h2>Selamat datang <?php echo $_SESSION['nama']; ?></h2>
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