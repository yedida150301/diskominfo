<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>  
<?php

$tampil_nik = "SELECT * FROM data_user WHERE nik='$_SESSION[nik]'";
$query = mysqli_query($konek, $tampil_nik);
$data = mysqli_fetch_array($query, MYSQLI_BOTH);

$nik = $data['nik'];
$nama = $data['nama'];

$tanggal_request = '';
$id_request_informasi = '';
$status = '';

// Menghitung jumlah permintaan informasi yang sudah diajukan
$sql_count = "SELECT COUNT(*) AS count FROM data_request_informasi WHERE nik='$nik'";
$query_count = mysqli_query($konek, $sql_count);
$data_count = mysqli_fetch_array($query_count, MYSQLI_ASSOC);
$count_informasi = $data_count['count'];

if (isset($_POST['kirim'])) {
    // Memeriksa apakah jumlah permintaan sudah mencapai maksimal
    if ($count_informasi < 5) {
        // Mengambil nilai dari form
        $keperluan = $_POST['keperluan'];
        
        // Mendefinisikan tanggal request dan id request informasi
        $tanggal_request = date('Y-m-d'); // Misalnya, tanggal permintaan adalah tanggal hari ini
        $id_request_informasi = uniqid(); // Buat ID unik untuk permintaan informasi
        $status = 'Pending'; // Status default
        
        // Menyiapkan query untuk memasukkan data request informasi ke database
        $query_insert = "INSERT INTO data_request_informasi (id_request_informasi, tanggal_request, nik, nama, keperluan, status) VALUES ('$id_request_informasi', '$tanggal_request', '$nik', '$nama', '$keperluan', '$status')";
        
        // Menjalankan query untuk memasukkan data
        $result = mysqli_query($konek, $query_insert);
        
        // Memeriksa apakah data berhasil dimasukkan
        if ($result) {
            echo "<script>swal('Success!', 'Request informasi berhasil dikirim!', 'success');</script>";
        } else {
            echo "<script>swal('Error!', 'Gagal mengirim request informasi!', 'error');</script>";
        }
    } 
}
?>
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">   
            <form method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">EDIT PERMOHONAN INFORMASI</div>
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
