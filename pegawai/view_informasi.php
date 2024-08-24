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
$id_request_informasi = '';
$status = '';
$link = ''; // Initialize the $link variable

// Ambil ID request dari query string (misalnya, dari URL)
$id_request_informasi = $_GET['id_request_informasi'] ?? ''; // Gunakan ID request dari query string

if ($id_request_informasi) {
    // Query untuk mengambil data link berdasarkan ID request
    $sql = "SELECT link FROM data_request_informasi WHERE id_request_informasi = '$id_request_informasi'";
    $query = mysqli_query($konek, $sql);
    if ($query) {
        $data = mysqli_fetch_assoc($query);
        $link = $data['link'] ?? ''; // Ambil link dari hasil query
    }
}

if (isset($_POST['cantumkan'])) {
    // Ambil link dari form
    $link = $_POST['link'] ?? ''; // Ambil link jika ada

    // Update link di database
    $query_update = "UPDATE data_request_informasi SET link = '$link' WHERE id_request_informasi = '$id_request_informasi'";
    $result = mysqli_query($konek, $query_update);

    if ($result) {
        echo "<script>swal('Success!', 'Link berhasil dicantumkan!', 'success').then(() => { window.location.href = '?halaman=sudah_acc_informasi'; });</script>";
    } else {
        echo "<script>swal('Error!', 'Gagal mencantumkan link!', 'error');</script>";
    }
}

?>

<div class="page-inner">
    <div class="row">
        <div class="col-md-12">   
            <form method="POST">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">LINK DITUJUKAN KE PEMOHON</div>
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
                        <!-- Tombol untuk menyimpan link -->
                        <button type="submit" name="cantumkan" class="btn btn-primary">Cantumkan Link</button>
                        <!-- Tombol kembali -->
                        <a href="?halaman=sudah_acc_informasi" class="btn btn-default">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
