<?php
include '../konek.php';
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan tahun saat ini untuk default dropdown
$currentYear = date('Y');

// Mengatur variabel tahun berdasarkan input POST atau tahun saat ini
$tahun = isset($_POST['tahun']) && !empty($_POST['tahun']) ? $_POST['tahun'] : $currentYear;

if (!isset($_POST['tampilkan'])) {
    $sql = "SELECT
        data_user.nik,
        data_user.nama,
        data_request_informasi.acc,
        data_request_informasi.keperluan,
        data_request_informasi.status
    FROM
        data_user
    INNER JOIN data_request_informasi ON data_request_informasi.nik = data_user.nik
    WHERE YEAR(data_request_informasi.acc) = '$tahun'
    UNION
    SELECT
        data_user.nik,
        data_user.nama,
        data_request_verifikasi.acc,
        data_request_verifikasi.keperluan,
        data_request_verifikasi.status
    FROM
        data_user
    INNER JOIN data_request_verifikasi ON data_request_verifikasi.nik = data_user.nik
    WHERE YEAR(data_request_verifikasi.acc) = '$tahun'";
} else {
    $sql = "SELECT
        data_user.nik,
        data_user.nama,
        data_request_informasi.acc,
        data_request_informasi.keperluan,
        data_request_informasi.status
    FROM
        data_user
    INNER JOIN data_request_informasi ON data_request_informasi.nik = data_user.nik
    WHERE YEAR(data_request_informasi.acc) = '$tahun'
    UNION
    SELECT
        data_user.nik,
        data_user.nama,
        data_request_verifikasi.acc,
        data_request_verifikasi.keperluan,
        data_request_verifikasi.status
    FROM
        data_user
    INNER JOIN data_request_verifikasi ON data_request_verifikasi.nik = data_user.nik
    WHERE YEAR(data_request_verifikasi.acc) = '$tahun'";
}

$query = mysqli_query($konek, $sql);

if (!$query) {
    die('Query Error: ' . mysqli_error($konek));
}
?>

<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">LAPORAN PERTAHUN PEMOHON</h2>
            </div>
        </div>
    </div>
</div>
<div class="page-inner mt--5">
    <div class="row mt--2">
        <div class="col-md-6">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-tools">
                        <form action="" method="POST">
                            <div class="form-group">
                                <select name="tahun" class="form-control">
                                    <option value="">Pilih</option>
                                    <?php
                                    // Menampilkan tahun-tahun dalam dropdown
                                    $startYear = 2012;
                                    $endYear = $currentYear;
                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        $selected = ($year == $tahun) ? 'selected' : '';
                                        echo "<option value=\"$year\" $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                                <div class="form-group mt-2">
                                    <input type="submit" name="tampilkan" value="Tampilkan" class="btn btn-primary btn-sm">
                                    <a href="?halaman=laporan_pertahun" class="btn btn-primary btn-sm">Reload</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools">
                        <a href="cetak_tahun.php?tahun=<?php echo $tahun; ?>" target="_blank" class="btn btn-info btn-border btn-round btn-sm">
                            <span class="btn-label">
                                <i class="fa fa-print"></i>
                            </span>
                            Print
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal ACC</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Keperluan</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            while ($data = mysqli_fetch_array($query, MYSQLI_BOTH)) {
                                $no++;
                                $nik = $data['nik'];
                                $nama = $data['nama'];
                                $tanggal = $data['acc'];
                                $tgl = date('d F Y', strtotime($tanggal));
                                $keperluan = $data['keperluan'];
                                $status = $data['status'];

                                if ($status == "1") {
                                    $status = "<b style='color:green'>TELAH ACC Staf</b>";
                                } elseif ($status == "0") {
                                    $status = "<b style='color:orange'>BELUM ACC Staf</b>";
                                } elseif ($status == "2") {
                                    $status = "<b style='color:red'>DITOLAK Staf</b>";
                                } elseif ($status == "3") {
                                    $status = "<b style='color:blue'>SURAT SUDAH DICETAK</b>";
                                }
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $tgl; ?></td>
                                    <td><?php echo $nik; ?></td>
                                    <td><?php echo $nama; ?></td>
                                    <td><?php echo $keperluan; ?></td>
                                    <td><?php echo $status; ?></td>
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
