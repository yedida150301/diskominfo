<?php
 session_start();
 if (isset($_SESSION['password'])=="" || ($_SESSION['hak_akses'])=="")  {
 header('location:login.php');
 }
 else{
 $hak_akses = $_SESSION['hak_akses'];
 $nama = $_SESSION['nama'];
 $nik = $_SESSION['nik'];
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
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">fitur</h4>
						</li>
						 <?php
						 	if($hak_akses=="Pemohon"){
						 ?>
						<li class="nav-item">
							<a href="?halaman=tampil_pemohon">
								<i class="fas fa-user-alt"></i>
								<p>Profil</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?halaman=tampil_status">
								<i class="far fa-calendar-check"></i>
								<p>Status Request</b></p>
							</a>
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
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch($hal){
              case 'beranda';
                include 'beranda.php';
              break;
              case 'ubah_pemohon';
                include 'ubah_pemohon.php';
			  break;
			  case 'tampil_pemohon';
                include 'tampil_pemohon.php';
			  break;
			  case 'request_informasi';
                include 'request_informasi.php';
			  break;
			  case 'request_sku';
                include 'request_sku.php';
			  break;
			  case 'request_verifikasi';
                include 'request_verifikasi.php';
			  break;
			  case 'request_skd';
                include 'request_skd.php';
			  break;
			  case 'tampil_status';
                include 'status_request.php';
			  break;
			  case 'belum_acc_informasi';
                include 'belum_acc_informasi.php';
			  break;
			  case 'belum_acc_sku';
                include 'belum_acc_sku.php';
			  break;
			  case 'belum_acc_verifikasi';
                include 'belum_acc_verifikasi.php';
			  break;
			  case 'belum_acc_skd';
                include 'belum_acc_skd.php';
			  break;
			  case 'sudah_acc_informasi';
                include 'acc_informasi.php';
			  break;
			  case 'sudah_acc_sku';
                include 'acc_sku.php';
			  break;
			  case 'sudah_acc_verifikasi';
                include 'acc_verifikasi.php';
			  break;
			  case 'sudah_acc_skd';
                include 'acc_skd.php';
			  break;
			  case 'detail_informasi';
                include 'detail_informasi.php';
			  break;
			  case 'detail_sku';
                include 'detail_sku.php';
			  break;
			  case 'detail_verifikasi';
                include 'detail_verifikasi.php';
			  break;
			  case 'detail_skd';
                include 'detail_skd.php';
			  break;
			  case 'cetak_informasi';
                include 'cetak_informasi.php';
			  break;
			  case 'tampil_user';
                include 'tampil_user.php';
			  break;
			  case 'tambah_user';
                include 'tambah_user.php';
			  break;
			  case 'ubah_user';
                include 'ubah_user.php';
			  break;
			  case 'ubah_informasi';
                include 'request_informasi.php';
			  break;
			  case 'ubah_sku';
                include 'ubah_request_sku.php';
			  break;
			  case 'ubah_verifikasi';
                include 'request_verifikasi.php';
			  break;
			  case 'ubah_skd';
                include 'ubah_request_skd.php';
              break;
			  case 'laporan_perbulan';
                include 'laporan_perbulan.php';
			  break;
			  case 'laporan_pertahun';
                include 'laporan_pertahun.php';
              break;
              default:
                echo "<center>HALAMAN KOSONG</center>";
              break;
            }
          }else{
            include 'beranda.php';
          }
        ?>
			</div>
<?php include 'footer.php'; ?>