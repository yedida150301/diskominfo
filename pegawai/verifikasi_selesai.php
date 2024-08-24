<?php
include '../konek.php';
?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 

<div class="page-inner">
    <div class="row">
        <!-- Tabel Permohonan Terverifikasi untuk Request Informasi -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">PERMOHONAN INFORMASI SUDAH TERVALIDASI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add5_info" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Tanggal Request</th>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Keperluan</th>
                                    <th style="width: 15%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_info = "SELECT
                                                data_request_informasi.tanggal_request,
                                                data_user.nik,
                                                data_user.nama,
                                                data_request_informasi.keperluan,
                                                data_request_informasi.status
                                            FROM
                                                data_user
                                            INNER JOIN data_request_informasi ON data_request_informasi.nik = data_user.nik
                                            WHERE data_request_informasi.status IN (1, 2, 3)";

                                $query_info = mysqli_query($konek, $sql_info);
                                while ($data_info = mysqli_fetch_array($query_info, MYSQLI_BOTH)) {
                                    $tgl_info = $data_info['tanggal_request'];
                                    $format_info = date('d F Y', strtotime($tgl_info));
                                    $nik_info = $data_info['nik'];
                                    $nama_info = $data_info['nama'];
                                    $keperluan_info = $data_info['keperluan'];
                                    $status_info = $data_info['status'];

                                    if ($status_info == "1") {
                                        $status_text_info = "<b style='color:green'>TELAH ACC Staf</b>";
                                    } elseif ($status_info == "0") {
                                        $status_text_info = "<b style='color:orange'>BELUM ACC staf</b>";
                                    } elseif ($status_info == "2") {
                                        $status_text_info = "<b style='color:red'>DITOLAK Staf<b>";
                                    } elseif ($status_info == "3") {
                                        $status_text_info = "<b style='color:blue'>SURAT SUDAH DICETAK</b>";
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $format_info; ?></td>
                                        <td><?php echo $nik_info; ?></td>
                                        <td><?php echo $nama_info; ?></td>
                                        <td><?php echo $keperluan_info; ?></td>
                                        <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status_text_info; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Permohonan Terverifikasi untuk Request Verifikasi -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">PERMOHONAN VERIFIKASI SUDAH TERVALIDASI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add5_verif" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="width: 15%">Tanggal Request</th>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Keperluan</th>
                                    <th style="width: 15%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_verif = "SELECT
                                                data_request_verifikasi.tanggal_request,
                                                data_user.nik,
                                                data_user.nama,
                                                data_request_verifikasi.keperluan,
                                                data_request_verifikasi.status
                                            FROM
                                                data_user
                                            INNER JOIN data_request_verifikasi ON data_request_verifikasi.nik = data_user.nik
                                            WHERE data_request_verifikasi.status IN (1, 2, 3)";

                                $query_verif = mysqli_query($konek, $sql_verif);
                                while ($data_verif = mysqli_fetch_array($query_verif, MYSQLI_BOTH)) {
                                    $tgl_verif = $data_verif['tanggal_request'];
                                    $format_verif = date('d F Y', strtotime($tgl_verif));
                                    $nik_verif = $data_verif['nik'];
                                    $nama_verif = $data_verif['nama'];
                                    $keperluan_verif = $data_verif['keperluan'];
                                    $status_verif = $data_verif['status'];

                                    if ($status_verif == "1") {
                                        $status_text_verif = "<b style='color:green'>TELAH ACC Staf</b>";
                                    } elseif ($status_verif == "0") {
                                        $status_text_verif = "<b style='color:orange'>BELUM ACC Staf</b>";
                                    } elseif ($status_verif == "2") {
                                        $status_text_verif = "<b style='color:red'>DITOLAK Staf</b>";
                                    } elseif ($status_verif == "3") {
                                        $status_text_verif = "<b style='color:blue'>SURAT SUDAH DICETAK</b>";
                                    }
                                ?>
                                    <tr>
                                        <td><?php echo $format_verif; ?></td>
                                        <td><?php echo $nik_verif; ?></td>
                                        <td><?php echo $nama_verif; ?></td>
                                        <td><?php echo $keperluan_verif; ?></td>
                                        <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status_text_verif; ?></td>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
