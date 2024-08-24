<?php
session_start();
if (!isset($_SESSION['password']) || !isset($_SESSION['hak_akses'])) {
    header('location:login.php');
    exit();
} else {
    $hak_akses = $_SESSION['hak_akses'];
}
?>
<?php include 'header.php'; ?>
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-primary">
                <li class="nav-item active">
                    <a href="dashboard.php">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>
                <?php
                if ($hak_akses == "Staf") {
                ?>
                <li class="nav-item">
                    <a href="?halaman=tampil_user">
                        <i class="fas fa-user-alt"></i>
                        <p>Data User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?halaman=verifikasi_selesai">
                        <i class="far fa-calendar-check"></i>
                        <p>Validasi Selesai</p>
                    </a>
                </li>
                <li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Laporan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="?halaman=laporan_perbulan">
											<span class="sub-item">Perbulan</span>
										</a>
									</li>
									<li>
										<a href="?halaman=laporan_pertahun">
											<span class="sub-item">Pertahun</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                <?php
                }
                ?>
                <li class="mx-4 mt-2">
                    <a href="logout.php" class="btn btn-danger btn-block"><span class="btn-label mr-2"> <i class="icon-logout"></i> </span>Logout</a> 
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->

<div class="main-panel">
    <div class="content">
        <?php
        if (isset($_GET['halaman'])) {
            $hal = $_GET['halaman'];
            switch ($hal) {
                case 'beranda':
                    include 'beranda.php';
                    break;
                case 'ubah_pemohon':
                    include 'ubah_pemohon.php';
                    break;
                case 'tampil_pemohon':
                    include 'tampil_pemohon.php';
                    break;
                case 'request_informasi':
                    include 'request_informasi.php';
                    break;
                case 'request_verifikasi':
                    include 'request_verifikasi.php';
                    break;
                case 'tampil_status':
                    include 'status_request.php';
                    break;
                case 'sudah_acc_informasi':
                    include 'acc_informasi.php';
                    break;
                case 'sudah_acc_verifikasi':
                    include 'acc_verifikasi.php';
                    break;
                case 'detail_informasi':
                    include 'detail_informasi.php';
                    break;
                case 'detail_verifikasi':
                    include 'detail_verifikasi.php';
                    break;
                case 'cetak_informasi':
                    include 'cetak_informasi.php';
                    break;
                case 'cetak_verifikasi':
                    include 'cetak_verifikasi.php';
                    break;
                case 'tampil_user':
                    include 'tampil_user.php';
                    break;
                case 'tambah_user':
                    include 'tambah_user.php';
                    break;
                case 'ubah_user':
                    include 'ubah_user.php';
                    break;
                case 'view_informasi':
                    include 'view_informasi.php';
                    break;
                case 'view_verifikasi':
                    include 'view_verifikasi.php';
                    break;
                case 'view_cetak_informasi':
                    include 'view_cetak_informasi.php';
                    break;
                case 'view_cetak_verifikasi':
                    include 'view_cetak_verifikasi.php';
                    break;
                case 'verifikasi_selesai':
                    include 'verifikasi_selesai.php';
                    break;
                case 'laporan_perbulan';
                    include 'laporan_perbulan.php';
			        break;
			    case 'laporan_pertahun';
                    include 'laporan_pertahun.php';
			    break;
                case 'status_request':
                    include 'status_request.php';
                    break;
                default:
                    echo "<center>HALAMAN KOSONG</center>";
                    break;
            }
        } else {
            include 'beranda2.php';
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
