<?php include '../konek.php';?>
<?php
	if(isset($_GET['id_request_sktm'])){
		$id=$_GET['id_request_sktm'];
		$sql = "SELECT * FROM data_request_sktm natural join data_user WHERE id_request_sktm='$id'";
		$query = mysqli_query($konek,$sql);
        $data = mysqli_fetch_array($query,MYSQLI_BOTH);
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat_lahir'];
        $tgl = $data['tanggal_lahir'];
        $tgl2 = $data['tanggal_request'];
        $format2 = date('Y', strtotime($tgl2));
        $format1 = date('d-m-Y', strtotime($tgl));
        $format3 = date('d F Y', strtotime($tgl2));
		$agama = $data['agama'];
		$jekel = $data['jekel'];
		$nama = $data['nama'];
		$alamat = $data['alamat'];
		$status_warga = $data['status_warga'];
        $request = $data['request'];
        $keperluan = $data['keperluan'];
        $acc = $data['acc'];
        $format4 = date('d F Y', strtotime($acc));
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body>

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
                                            <td colspan="45"><hr color="black"></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                <center>
                                                    <font size="4"><b>SURAT KETERANGAN TIDAK MAMPU</b></font><br>
                                                    <hr style="margin:0px" color="black">
                                                    <span>Nomor : 045.2 / ..... / 29.07.05</span>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                    <br>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yang bertanda tangan di bawah ini Lurah Wergu Wetan Kabupaten Kota <br> Kudus, Menerangkan bahwa :
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
                                            <td><?php echo $tempat.", ".$format1;?></td>
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
                                            <td>Status Warga</td>
                                            <td>:</td>
                                            <td><?php echo $status_warga;?></td>
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
                                            <td>Keperluan</td>
                                            <td>:</td>
                                            <td><?php echo $keperluan;?></td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <?php 
                                                
                                                if($request=="TIDAK MAMPU"){
                                                    $request="Surat Keterangan Tidak Mampu";
                                                }
                                            
                                            ?>
                                            <td><?php echo $request;?></td>
                                        </tr>
                                    </table>
                                    <br>
                                    <table border="0" align="center">
                                        <tr>
                                            <td>
                                          
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahwa nama tersebut di atas adalah benar penduduk kota Tanjungpinang<br>&nbsp;&nbsp;&nbsp;&nbsp;.
                                            </td>
                                            
                                        </tr>
                    
                                    </table>
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
                                            <th>Tanjungpinang, <?php echo $format4;?></th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>KEPALA DINAS SOSIAL </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td>KOTA TANJUNGPINANG</td>
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



    
</body>
</html>
        <script>
            window.print();
        </script>