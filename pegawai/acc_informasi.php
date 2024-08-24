<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<div class="page-inner">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="fw-bold text-uppercase">ACC PERMOHONAN INFORMASI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST">
                        <div class="table-responsive">
                            <table id="add5" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 15%;">Tanggal Request</th>
                                        <th style="width: 10%;">NIK</th>
                                        <th style="width: 15%;">Nama Lengkap</th>
                                        <th style="width: 15%;">Keperluan</th>
                                        <th style="width: 15%;">Link Lampiran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql = "SELECT * FROM data_request_informasi NATURAL JOIN data_user WHERE status = 0";
                                    $query = mysqli_query($konek, $sql);
                                    while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                        $tgl = $data['tanggal_request'];
                                        $format = date('d F Y', strtotime($tgl));
                                        $nik = $data['nik'];
                                        $nama = $data['nama'];
                                        $keperluan = $data['keperluan'];
                                        $id_request_informasi = $data['id_request_informasi'];

                                        ?>
                                        <tr>
                                            <td><?php echo $format; ?></td>
                                            <td><?php echo $nik; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $keperluan; ?></td>
                                            <td>
                                                <a href="?halaman=view_informasi&id_request_informasi=<?=$id_request_informasi;?>" class="btn btn-link btn-primary btn-sm">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" style="display:inline;">
                                                    <input type="hidden" name="id_request_informasi" value="<?php echo $id_request_informasi; ?>">
                                                    <button type="submit" name="acc" class="btn btn-primary btn-sm">ACC</button>
                                                </form>
                                                <form method="POST" style="display:inline;">
                                                    <input type="hidden" name="id_request_informasi" value="<?php echo $id_request_informasi; ?>">
                                                    <button type="submit" name="tolak" class="btn btn-danger btn-sm">Tolak</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['acc']) || isset($_POST['tolak'])) {
    $id_request_informasi = $_POST['id_request_informasi'];
    $status_update = isset($_POST['acc']) ? '1' : '2';

    // Mengambil link yang sudah ada dari database
    $link_query = "SELECT link FROM data_request_informasi WHERE id_request_informasi = '$id_request_informasi'";
    $link_result = mysqli_query($konek, $link_query);
    $link_data = mysqli_fetch_assoc($link_result);
    $link = $link_data['link'] ?? '';

    // Update status dan link di database
    $ubah = "UPDATE data_request_informasi SET status = '$status_update', link = '$link' WHERE id_request_informasi = '$id_request_informasi'";
    $query = mysqli_query($konek, $ubah);

    if ($query) {
        $message = ($status_update == '1') ? 'ACC Staf Berhasil!' : 'Permintaan telah ditolak!';
        echo "<script language='javascript'>swal('Selamat...', '$message', 'success');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_informasi">';
    } else {
        $message = ($status_update == '1') ? 'ACC Staf Gagal!' : 'Penolakan permintaan gagal!';
        echo "<script language='javascript'>swal('Gagal...', '$message', 'error');</script>";
        echo '<meta http-equiv="refresh" content="3; url=?halaman=sudah_acc_informasi">';
    }
}
?>
