<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
    if(isset($_GET['id_request_informasi'])){
        $id=$_GET['id_request_informasi'];
        $sql = "SELECT * FROM data_request_informasi natural join data_user WHERE id_request_informasi='$id'";
        $query = mysqli_query($konek, $sql);
        $data = mysqli_fetch_array($query, MYSQLI_BOTH);
        $id = $data['id_request_informasi'];
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format1 = date('Y', strtotime($tgl2));
        $format2 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
        $agama = $data['agama'];
        $jekel = $data['jekel'];
        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $status_warga = $data['status_warga'];
        $request = $data['request'];
        $keterangan = $data['keterangan'];
        $status = $data['status'];
        $acc = $data['acc'];
        $keperluan = $data['keperluan'];
        $format4 = date('d F Y', strtotime($acc));
        if($format4 == 0){
            $format4 = "kosong";
        }elseif($format4 == 1){
           $format4;
        }

        if($status == 3){
            $keterangan = "Sudah ACC Lurah, surat sedang dalam proses cetak oleh staf";
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
                    <div class="card-tools text-center">
                        <form method="POST">
                            <a href="?halaman=tampil_status" class="btn btn-default btn-sm">Kembali</a>
                        </form>
                    </div>
                    <?php
                    if(isset($_POST['ttd'])){
                        $cetak = $_POST['dicetak'];
                        $update = mysqli_query($konek, "UPDATE data_request_informasi SET keterangan='$cetak', status=3 WHERE id_request_informasi=$id");
                        if($update){
                            echo "<script language='javascript'>swal('Selamat...', 'Kirim Berhasil', 'success');</script>";
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=surat_dicetak">';
                        }else{
                            echo "<script language='javascript'>swal('Gagal...', 'Kirim Gagal', 'error');</script>";
                            echo '<meta http-equiv="refresh" content="3; url=?halaman=view_informasi">';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table border="1" align="center">
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
                                    Kami telah memverifikasi informasi ini dan memastikan kebenarannya. Silakan merujuk pada data dan sumber yang telah kami lampirkan:
                                </td>
                            </tr>
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <brb    >
                        <br>
                        <br>
                        <br>
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
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
