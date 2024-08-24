<?php
include '../konek.php'; // Sertakan file koneksi ke database di sini
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
<?php

// Ambil data user dari sesi
$tampil_nik = "SELECT * FROM data_user WHERE nik='$_SESSION[nik]'";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);

$nik = $data['nik'];
$nama = $data['nama'];

$tanggal_request = '';
$id_request_verifikasi = '';
$status = '';

if (isset($_POST['kirim'])) {
    // Memeriksa apakah semua input sudah diisi
    if (isset($_POST['nik']) && isset($_POST['keperluan'])) {
        // Mengambil nilai dari form
        $nik = $_POST['nik'];
        $keperluan = $_POST['keperluan'];
        $link = $_POST['link'] ?? ''; // Ambil link jika ada

        // Mendefinisikan tanggal request dan id request verifikasi
        $tanggal_request = date('Y-m-d'); // Misalnya, tanggal permintaan adalah tanggal hari ini
        $id_request_verifikasi = uniqid(); // Buat ID unik untuk permintaan verifikasi
        $status = 'Pending'; // Status default
        
        // Menyiapkan query untuk memasukkan data request verifikasi ke database
        $query_insert = "INSERT INTO data_request_verifikasi (id_request_verifikasi, tanggal_request, nik, nama, keperluan, status, link) VALUES ('$id_request_verifikasi', '$tanggal_request', '$nik', '$nama', '$keperluan', '$status', '$link')";
        
        // Menjalankan query untuk memasukkan data
        $result = mysqli_query($konek, $query_insert);
        
        // Memeriksa apakah data berhasil dimasukkan
        if ($result) {
            echo "<script>swal('Success!', 'Request verifikasi berhasil dikirim!', 'success');</script>";
        } else {
            echo "<script>swal('Error!', 'Gagal mengirim request verifikasi!', 'error');</script>";
        }
    } 
}
?>


<div class="page-inner">
    <div class="row">
        <div class="col-md-12">   
            <form method="POST">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">EDIT PERMOHONAN VERIFIKASI</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="keterangan" class="form-control" value="<?= $nik.' - '.$nama;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="nik" class="form-control" value="<?= $nik;?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" name="keperluan" class="form-control" placeholder="Keperluan Anda.." autofocus required>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" name="link" class="form-control" placeholder="URL Link (optional)">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <button type="submit" name="kirim" class="btn btn-success">Kirim</button>
                        <a href="?halaman=tampil_status" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


