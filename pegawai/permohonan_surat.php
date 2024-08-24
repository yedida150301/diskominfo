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
										<h4 class="card-title">STATUS REQUEST INFORMASI BERITA</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add5" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_informasi natural join data_user WHERE status=2";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
                                                        $id_request_informasi=$data['id_request_informasi'];
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_informasi = $data['id_request_informasi'];
														if($status=="2"){
                                                            $status = "<b style='color:blue'>SUDAH ACC KADIS</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
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
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
																	<i class="fa fa-edit"></i>
																</button>
															</a>
														</div>
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
										<h4 class="card-title">STATUS REQUEST SURAT REKOMENDASI JAMINAN KESEHATAN DAERAH</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="add5" class="display table table-striped table-hover" >
											<thead>
												<tr>
                                                    <th>Tanggal Request</th>
                                                    <th>NIK</th>
                                                    <th>Nama Lengkap</th>
													<th>Keperluan</th>
													<th>Status</th>
													<th style="width: 10%">Action</th>
												</tr>
											</thead>
											<tbody>
                                                <?php
                                                    $sql = "SELECT * FROM data_request_verifikasi natural join data_user where status=2";
                                                    $query = mysqli_query($konek,$sql);
                                                    while($data=mysqli_fetch_array($query,MYSQLI_BOTH)){
														$tgl = $data['tanggal_request'];
														$format = date('d F Y', strtotime($tgl));
                                                        $nik = $data['nik'];
                                                        $nama = $data['nama'];
														$status = $data['status'];
														$keperluan = $data['keperluan'];
														$keterangan = $data['keterangan'];
														$id_request_verifikasi = $data['id_request_verifikasi'];
														if($status=="2"){
                                                            $status = "<b style='color:blue'>SUDAH ACC KADIS</b>";
                                                        }elseif($status=="0"){
                                                            $status = "<b style='color:red'>BELUM ACC</b>";
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
																<button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Cetak">
																	<i class="fa fa-edit"></i>
																</button>
															</a>
														</div>
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
                        
					
                        
