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
                        <h4 class="card-title">STATUS PERMOHONAN INFORMASI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add5" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 15%">Tanggal Request</th>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Keperluan</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 15%">Cek Informasi</th>
                                    <th style="width: 10%">Edit</th>
                                    <th style="width: 10%">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM data_request_informasi natural join data_user WHERE nik=$_SESSION[nik]";
                                    $query = mysqli_query($konek,$sql);
                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                        $id_request_informasi=$data['id_request_informasi'];
                                        $tgl = $data['tanggal_request'];
                                        $format = date('d F Y', strtotime($tgl));
                                        $nama = $data['nama'];
                                        $keperluan = $data['keperluan'];
                                        $status = $data['status'];

                                        if($status=="1"){
                                            $status = "<b style='color:green'>TELAH ACC STAFF</b>";
                                        } elseif($status=="0"){
                                            $status = "<b style='color:orange'>BELUM ACC STAFF</b>";
                                        } elseif($status=="2"){
                                            $status = "<b style='color:red'>DITOLAK Staf<b>";
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $format;?></td>
                                    <td><?php echo $nik;?></td>
                                    <td><?php echo $nama;?></td>
                                    <td><?php echo $keperluan;?></td>
                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="?halaman=view_cetak_informasi&id_request_informasi=<?=$id_request_informasi;?>">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Lihat Berita">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="?halaman=ubah_informasi&id_request_informasi=<?= $id_request_informasi;?>">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="?halaman=tampil_status&id_request_informasi=<?=$id_request_informasi;?>">
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
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
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">STATUS PERMOHONAN VERIFIKASI</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="add5" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th style="width: 15%">Tanggal Request</th>
                                    <th style="width: 10%">ID</th>
                                    <th style="width: 15%">Nama</th>
                                    <th style="width: 15%">Keperluan</th>
                                    <th style="width: 15%">Status</th>
                                    <th style="width: 15%">Cek Validasi</th>
                                    <th style="width: 10%">Edit</th>
                                    <th style="width: 10%">Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = "SELECT * FROM data_request_verifikasi natural join data_user WHERE nik=$_SESSION[nik]";
                                    $query = mysqli_query($konek,$sql);
                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                        $id_request_verifikasi=$data['id_request_verifikasi'];
                                        $tgl = $data['tanggal_request'];
                                        $format = date('d F Y', strtotime($tgl));
                                        $nama = $data['nama'];
                                        $keperluan = $data['keperluan'];
                                        $status = $data['status'];

                                        if($status=="1"){
                                            $status = "<b style='color:green'>TELAH ACC Staf</b>";
                                        } elseif($status=="0"){
                                            $status = "<b style='color:orange'>BELUM ACC Staf</b>";
                                        } elseif ($status == "2") {
                                            $status = "<b style='color:red'>DITOLAK Staf<b>";
                                        }
                                ?>
                                <tr>
                                    <td><?php echo $format;?></td>
                                    <td><?php echo $nik;?></td>
                                    <td><?php echo $nama;?></td>
                                    <td><?php echo $keperluan;?></td>
                                    <td class="fw-bold text-uppercase text-danger op-8"><?php echo $status;?></td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="?halaman=view_cetak_verifikasi&id_request_verifikasi=<?=$id_request_verifikasi;?>">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Lihat Berita">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="?halaman=ubah_verifikasi&id_request_verifikasi=<?= $id_request_verifikasi;?>">
                                                <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Data">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="?halaman=tampil_status&id_request_verifikasi=<?=$id_request_verifikasi;?>">
                                            <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </a>
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
<?php
    if(isset($_GET['id_request_informasi'])){
        $hapus = mysqli_query($konek,"DELETE FROM data_request_informasi WHERE id_request_informasi=$id_request_informasi");
        if($hapus){
            echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
        }else{
            echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
            }
    }elseif(isset($_GET['id_request_verifikasi'])){
        $hapus = mysqli_query($konek,"DELETE FROM data_request_verifikasi WHERE id_request_verifikasi=$id_request_verifikasi");
        if($hapus){
            echo "<script language='javascript'>swal('Selamat...', 'Hapus Berhasil', 'success');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
        }else{
            echo "<script language='javascript'>swal('Gagal...', 'Hapus Gagal', 'error');</script>" ;
            echo '<meta http-equiv="refresh" content="3; url=?halaman=tampil_status">';
        }
    }
?>
