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
                        <h4 class="fw-bold text-uppercase">TAMPIL ACC REQUEST VERIFIKASI BERITA</h4>
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
										<th style="width: 15%;">Validasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    $sql = "SELECT * FROM data_request_verifikasi NATURAL JOIN data_user WHERE status=0";
                                    $query = mysqli_query($konek,$sql);
                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                        $tgl = $data['tanggal_request'];
                                        $format = date('d F Y', strtotime($tgl));
                                        $nik = $data['nik'];
                                        $nama = $data['nama'];
                                        $status = $data['status'];
                                        $keperluan = $data['keperluan'];
                                        $id_request_verifikasi = $data['id_request_verifikasi'];

                                        if($status=="1"){
                                            $status = "<b style='color:green'>ACC</b>";
                                        } elseif ($status == "2") {
                                            $status = "<b style='color:red'>DITOLAK Staf<b>";
                                        }
                                    ?>
                                    <tr>
                                        <td><?php echo $format;?></td>
                                        <td><?php echo $nik;?></td>
                                        <td><?php echo $nama;?></td>
                                        <td><?php echo $keperluan;?></td>
                                        <td>
                                            <a href="?halaman=view_verifikasi&id_request_verifikasi=<?=$id_request_verifikasi;?>" class="btn btn-link btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
										<td>
                                            <a href="?halaman=view_cetak_verifikasi&id_request_verifikasi=<?=$id_request_verifikasi;?>" class="btn btn-link btn-primary btn-sm">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="id_request_verifikasi" value="<?php echo $id_request_verifikasi; ?>">
                                                <button type="submit" name="acc" class="btn btn-primary btn-sm">ACC</button>
                                            </form>
                                            <form method="POST" style="display:inline;">
                                                <input type="hidden" name="id_request_verifikasi" value="<?php echo $id_request_verifikasi; ?>">
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
