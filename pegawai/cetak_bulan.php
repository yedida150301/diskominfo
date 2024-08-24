<?php
include '../konek.php';

if(isset($_GET['bulan'])){
    $bln=$_GET['bulan'];
    $sql = "SELECT
                data_user.nik,
                data_user.nama,
                data_request_informasi.acc,
                data_request_informasi.keperluan,
                data_request_informasi.status
            FROM
                data_user
            INNER JOIN data_request_informasi ON data_request_informasi.nik = data_user.nik
            WHERE month(data_request_informasi.acc) = '$bln'
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
            WHERE month(data_request_verifikasi.acc) = '$bln'";

    // Check the month name
    $bulanNames = [
        "1" => "JANUARI", "2" => "FEBRUARI", "3" => "MARET",
        "4" => "APRIL", "5" => "MEI", "6" => "JUNI",
        "7" => "JULI", "8" => "AGUSTUS", "9" => "SEPTEMBER",
        "10" => "OKTOBER", "11" => "NOVEMBER", "12" => "DESEMBER"
    ];

    $blnName = $bulanNames[$bln] ?? 'Tidak Valid';

    $query=mysqli_query($konek,$sql);

    if (!$query) {
        echo "Error: " . mysqli_error($konek);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Bulan</title>
    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/atlantis.min.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css">
</head>
<body>
    <table border="0" align="center">
        <tr> 
            <td colspan="45">
                <center>
                    <font size="4"><b>LAPORAN BULANAN</b></font><br>
                    <font size="4"><b>PUSAT INFORMASI TERINTEGRASI DISKOMINFO</b></font><br>
                    <font size="4"><b>KOTA SEMARANG</b></font><br>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="45"><hr color="black"></td>
        </tr>
    </table>
    <br>
    <center>
    <table class="table table-bordered">
        <tr>
            <th scope="col" style="width: 10%">No.</th>
            <th scope="col" style="width: 10%">Tanggal ACC</th>
            <th scope="col" style="width: 10%">ID</th>
            <th scope="col" style="width: 15%">Nama</th>
            <th scope="col" style="width: 15%">Keperluan</th>
            <th scope="col" style="width: 15%">Status</th>
        </tr>
        <?php
            $no=0;
            while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                $no++;
                $tanggal = isset($data['acc']) ? $data['acc'] : 'Tidak Ada Data';
                $format1 = date('d F Y',strtotime($tanggal));
                $nik = isset($data['nik']) ? $data['nik'] : 'Tidak Ada Data';
                $nama = isset($data['nama']) ? $data['nama'] : 'Tidak Ada Data';
                $keperluan = isset($data['keperluan']) ? $data['keperluan'] : 'Tidak Ada Data';
                $status = isset($data['status']) ? $data['status'] : 'Tidak Ada Data';
        ?>
        <tbody>
            <tr>
                <th><?php echo $no;?></th>
                <th><?php echo $format1;?></th>
                <td><?php echo $nik;?></td>
                <td><?php echo $nama;?></td>
                <td><?php echo $keperluan;?></td>
                <td><?php echo $status;?></td>
            </tr>
        </tbody>
        <?php
            }
        ?>
    </table>
    </center>
    <br><br>
    <table border='0' align="right">
        <tr>
            <td style="text-align: center"><b>SEMARANG, <?php echo date('d F Y');?></b></td>
        </tr>
        <tr>
            <td style="text-align: center"><b>Staff Pusat Informasi Terintegrasi</b></td>
        </tr>
    </table>
    <br><br><br><br><br>
    <table border='0' align="right">
        <tr>
            <td style="text-align: center"><b>BAMBANG PRAMUSINTO</b></td>
        </tr>
    </table>
    <script>
        window.print();
    </script>
</body>
</html>
<?php
}
?>
