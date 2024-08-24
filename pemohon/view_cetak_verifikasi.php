<?php include '../konek.php'; ?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script>

<?php
$status = null; // Set default value to null
$jenis_verifikasi = null;
if (isset($_GET['id_request_verifikasi'])) {
    $id = $_GET['id_request_verifikasi'];
    $sql = "SELECT * FROM data_request_verifikasi NATURAL JOIN data_user WHERE id_request_verifikasi='$id'";
    $query = mysqli_query($konek, $sql);
    if ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
        $id = $data['id_request_verifikasi'];
        $tanggal_request = $data['tanggal_request'];
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
                    <div class="card-tools text-center mb-3">
                        <a href="?halaman=tampil_status" class="btn btn-default btn-sm">Kembali</a>
                    </div>
                    <?php if ($status === '0'): ?>
                        <div class="alert alert-warning text-center" role="alert">
                            Informasi Belum Di Verifikasi
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($status === '1'): // Surat hanya muncul jika status adalah ACC ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="0" align="center">
                        <tr>
                            <td colspan="31" align="center">
                                <font size="4">PEMERINTAH KOTA SEMARANG</font><br>
                                <font size="5"><b>DINAS KOMUNIKASI DAN INFORMASI KOTA SEMARANG</b></font><br>
                                <font size="2"><i>Jl. Pemuda No.148, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah 50132. Telp. (024)3549448</i></font><br>
                                <font size="2"><i>E-mail : diskominfo@kotasemarang.go.id</i></font><br>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="31"><hr color="black"></td>
                        </tr>
                    </table>
                    <br>
                    <table border="0" align="center">
                        <tr>
                            <td align="center">
                                <font size="4"><b>PUSAT INFORMASI DAN INTEGRASI - DISKOMINFO</b></font><br>
                                <hr style="margin:0px" color="black">
                                <span>Nomor : 045.2 /...../ 29.07.05</span>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <table border="0" align="center">
                        <tr>
                            <td align="center">
                                Kami telah memverifikasi informasi ini dan memastikan kebenarannya. bahwa informasi yang diberikan adalah:
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <br>
                    <?php if ($jenis_verifikasi == 'hoax'): ?>
                        <img src="../assets/img/hoax.png" width="200" height="200" alt="" style="display: block; margin: 0 auto;">
                    <?php elseif ($jenis_verifikasi == 'valid'): ?>
                        <img src="../assets/img/valid.png" width="280" height="280" alt="" style="display: block; margin: 0 auto;">
                    <?php endif; ?>
                    <br>
                    <br>
                    <br>
                    <table border="0" align="center">
                        <tr>
                            <td align="center">
                                Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan untuk sebagaimana mestinya.
                            </td>
                        </tr>
                    </table>
                    <br>
                    <br>
                    <table border="0" align="center">
                        <tr>
                            <td></td>
                            <td align="center">STAFF PUSAT INFORMASI TERINTEGRASI</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td align="center">KOTA SEMARANG</td>
                        </tr>
                        <tr>
                            <td rowspan="15"></td>
                            <td align="center"><b><u>(Thomas Fernandez S.Kom)</u></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>

<?php
if (isset($_POST['acc'])) {
    $id_request_verifikasi = $_POST['id_request_verifikasi'];
    $ubah = "UPDATE data_request_verifikasi SET status = '1' WHERE id_request_verifikasi = '$id_request_verifikasi'";
    $query = mysqli_query($konek, $ubah);

    if ($query) {
        echo "<script language='javascript'>swal('Selamat...', 'ACC Staf Berhasil!', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_verifikasi">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'ACC Staf Gagal!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_verifikasi">';
    }
}

if (isset($_POST['tolak'])) {
    $id_request_verifikasi = $_POST['id_request_verifikasi'];
    $ubah = "UPDATE data_request_verifikasi SET status = '2' WHERE id_request_verifikasi = '$id_request_verifikasi'";
    $query = mysqli_query($konek, $ubah);

    if ($query) {
        echo "<script language='javascript'>swal('Selamat...', 'Permintaan telah ditolak!', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_verifikasi">';
    } else {
        echo "<script language='javascript'>swal('Gagal...', 'Penolakan permintaan gagal!', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_verifikasi">';
    }
}
?>
