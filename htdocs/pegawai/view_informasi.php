<?php include '../konek.php';?>
<link href="css/sweetalert.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/sweetalert.min.js"></script> 
<?php
	if(isset($_GET['id_request_informasi'])){
		$id=$_GET['id_request_informasi'];
		$sql = "SELECT * FROM data_request_informasi natural join data_user WHERE id_request_informasi='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $id=$data['id_request_informasi'];
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
        $keperluan = $data['keperluan'];
        $request = $data['request'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
        if($acc==0){
            $acc="BELUM TTD";
        }elseif($acc==1){
           $acc;
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
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
								    <div class="card-tools">
                                        <form action="" method="POST">
                                            <div class="form-group">
                                                <input type="date" name="tgl_acc" class="form-control" required="">
                                                <div class="form-group">
                                                    <input type="submit" name="ttd" value="ACC" class="btn btn-primary btn-sm">
                                                </div>
                                            </div>
                                        </form>
                                        <?php
                                        if(isset($_POST['ttd'])){
                                            $ket="Surat sedang dalam proses cetak";
                                            $tgl = $_POST['tgl_acc'];
                                            $update = mysqli_query($konek,"UPDATE data_request_informasi SET acc='$tgl', status=2, keterangan='$ket' WHERE id_request_informasi=$id");
                                            if($update){
                                                echo "<script language='javascript'>swal('Selamat...', 'ACC Kadis Berhasil', 'success');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=belum_acc_informasi">';
                                            }else{
                                                echo "<script language='javascript'>swal('Gagal...', 'ACC Kadis Gagal', 'error');</script>" ;
                                                echo '<meta http-equiv="refresh" content="3; url=?halaman=view_informasi">';
                                            }

                                        }
                                        ?>
									</div>
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
        <td><img src="img/kopdinsos.jpg" width="100" height="87" alt=""></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
            <td>
                <center>
                    <font size="4">PEMERINTAH KOTA TANJUNGPINANG</font><br>
                    <font size="5"><b>DINAS SOSIAL</b></font><br>
                    <font size="2"><i>Jln. D.I. Panjaitan KM. X Komp. Embung Fatimah Telp. (0771) 442185 Fax. (0771) 442185</i></font><br>
                    <font size="2"><i>E-mail : dinsoskotatanjungpinang@gmail.com – Kode Pos 29125</i></font><br>
                </center>
            </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
        <tr>
            <td colspan="400" border align="90" ><hr color="black"></td>
        </tr>
    </table>
    <br>
    <table border="0" align="center">
        <tr>
            <td>
                <center>
                    <font size="4"><b>SURAT REKOMENDASI</b></font><br>
                    <hr style="margin:0px" color="black">
                    <span>Nomor : 045.2 /...../ 29.07.05</span>
                </center>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" align="center">
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Kepala Dinas Sosial Kota Tanjungpinang <br> ,Menerangkan bahwa :
            </td>
        </tr>
    </table>
    <br>
    <table border="0" align="center">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td><?php echo $nama;?></td>
        </tr>
        <tr>
            <td>TTL</td>
            <td>:</td>
            <td><?php echo $tempat.", ".$format2;?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td><?php echo $jekel;?></td>
        </tr>
        <tr>
            <td>Agama</td>
            <td>:</td>
            <td><?php echo $agama;?></td>
        </tr>
        <tr>
            <td>No. NIK</td>
            <td>:</td>
            <td><?php echo $nik;?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><?php echo $alamat;?></td>
        </tr>
        <tr>
            <td>Status Warga</td>
            <td>:</td>
            <td><?php echo $status_warga;?></td>
        </tr>
        <tr>
            <td>Keperluan</td>
            <td>:</td>
            <td><?php echo $keperluan;?></td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <?php
                if($request=="LAINNYA"){
                    $request="SURAT REKOMENDASI";
                }
            ?>
            <td><?php echo $request;?></td>
        </tr>
    </table>
    <br>
    <table border="0" align="center">
        <tr>
            <td>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demikian surat ini diberikan kepada yang bersangkutan agar dapat dipergunakan<br>&nbsp;&nbsp;&nbsp;&nbsp;untuk sebagaimana mestinya.
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table border="0" align="center">
        <tr>
            <th></th>
            <th width="100px"></th>
            <th>Tanjungpinang, <?php echo $acc;?></th>
        </tr>
        <tr>
            <td> </td>
            <td></td>
            <td>KEPALA DINAS SOSIAL TANJUNGPINANG</td>
        </tr>
        <tr>
            <td rowspan="15"></td>
            <td></td>
            <td rowspan="15"></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
        </tr><tr>
            <td></td>
        </tr><tr>
            <td></td>
        </tr><tr>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td><b><u>(Achmad Nur Fattah, S.sos,M.Si)</u></b></td>
        </tr>
    </table>
                                
                                </table>

								</div>
							</div>
						</div>
					</div>
			</div>