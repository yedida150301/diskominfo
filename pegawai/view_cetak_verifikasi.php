<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
$status = null;
$jenis_verifikasi = null;
if (isset($_GET['id_request_verifikasi'])) {
    $id = $_GET['id_request_verifikasi'];
    $sql = "SELECT * FROM data_request_verifikasi natural join data_user WHERE id_request_verifikasi='$id'";
    $query = mysqli_query($konek, $sql);
    if ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
        $id = $data['id_request_verifikasi'];
        $nik = $data['nik'];
        $nama = $data['nama'];
        $keperluan = $data['keperluan'];
        $status = $data['status'];
        $acc = $data['acc'];
        $jenis_verifikasi = $data['jenis_verifikasi'];
    }
}
?>
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold"></h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6 mx-auto">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Keterangan</label>
                                <select name="jenis_verifikasi" class="form-control" required>
                                    <option value="">Pilih</option>
                                    <option value="valid">VALID</option>
                                    <option value="hoax">HOAX</option>
                                </select><br>
                                <button type="submit" name="verifikasi" class="btn btn-primary btn-sm">Verifikasi</button>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['verifikasi'])) {
                            $jenis_verifikasi = $_POST['jenis_verifikasi'];
                            $update = mysqli_query($konek, "UPDATE data_request_verifikasi SET jenis_verifikasi='$jenis_verifikasi' WHERE id_request_verifikasi=$id");
                            if ($update) {
                                echo "<script language='javascript'>swal('Selamat...', 'Verifikasi Berhasil', 'success');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_verifikasi">';
                            } else {
                                echo "<script language='javascript'>swal('Gagal...', 'Verifikasi Gagal', 'error');</script>";
                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_verifikasi">';
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
