<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 

<?php
include '../konek.php'; // Sertakan file koneksi ke database di sini

// Ambil ID request dari query string (misalnya, dari URL)
$id_request_verifikasi = $_GET['id_request_verifikasi'] ?? ''; // Gunakan ID request dari query string

$link = ''; // Inisialisasi variabel link

if ($id_request_verifikasi) {
    // Query untuk mengambil data link berdasarkan ID request
    $sql = "SELECT link FROM data_request_verifikasi WHERE id_request_verifikasi = '$id_request_verifikasi'";
    $query = mysqli_query($konek, $sql);
    if ($query) {
        $data = mysqli_fetch_assoc($query);
        $link = $data['link'] ?? ''; // Ambil link dari hasil query
    }
}
?> 

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">   
            <form method="POST">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">LINK PEMOHON</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Link</label>
                                    <!-- Tampilkan link yang diambil dari database di input field -->
                                    <input type="text" name="link" class="form-control" placeholder="Link URL" value="<?php echo htmlspecialchars($link); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <a href="?halaman=sudah_acc_verifikasi" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
