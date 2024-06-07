    
    <section class="content">
    	<div class="container-fluid">
    		

    		<!-- Basic Examples -->
    		<div class="row clearfix">
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    				<div class="card">
    					<div class="header">
    						<h2 style="font-size: 22px;color:#ad1455;font-weight: bold;">
    							<center>LIST MATERI</center>
    						</h2> <br><br>
    						<a href="<?= base_url(); ?>admin/materi/add_materi">
    							<button type="button" class="btn btn-info waves-effect">
    								<i class="material-icons">add</i>
    								<span>TAMBAH</span>
    							</button>
    						</a>
    					</div>

    					<div class="body">
    						<div class="table-responsive">
    							<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    								<thead>
    									<tr>
    										<th>No</th>
    										<th>Judul Materi</th>
    										<th>Kode Kelas</th>
    										<th>Tingkatan Kelas</th>
    										<th>Materi PDF</th>
    										<th>Soal</th>
											<th style="text-align: center;">Action</th>
    									</tr>
    								</thead>

    								<tbody>

    									<?php $i = 1;
										foreach ($list_materi as $materi) : ?>
    										<tr>
    											<td><?= $i++; ?></td>
    											<td><?= $materi['judul_materi'] ?></td>
    											<td><?= $materi['kode_kelas'] ?></td>
    											<td><?= $materi['tingkatan_kelas'] ?></td>
    											<td>
													<?php if( $materi['file_materi'])  {?>
														<a href="<?= site_url('assets/upload/materi/' . $materi['file_materi']) ?>" class="btn btn-primary" target="_blank">Lihat Materi</a>	
														<?php } ?>
												</td>
    											<td><a href="<?= base_url(); ?>admin/materi/detail_materi/<?= $materi['id_materi'];?>">
                                                    <button type="button" class="btn btn-info waves-effect">
                                                        <span>Lihat Soal</span>
                                                    </button></a>
                                                </td>
												<td>
												<a href="<?= base_url('admin/materi/delete_materi/').$materi['id_materi'] ?>" onclick="return confirm('apakah anda yakin ingin menghapus data materi ?')"><i style="color:red;" class="material-icons">delete</i></a>
												</td>
    											
    										</tr>
    									<?php endforeach; ?>

    								</tbody>
    							</table>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>

    		<!-- #END# Basic Examples -->
    	</div>
    	</div>
    </section>

    <!-- Logout Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
    			<div class="modal-header">
    				<h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
    				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
    					<span aria-hidden="true">×</span>
    				</button>
    			</div>
    			<div class="modal-body">Apakah anda yakin ingin menghapus materi ini ?</div>
    			<div class="modal-footer">
    				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    				<a id="hapus_nyo" class="btn btn-primary" href="#">Delete</a>
    			</div>
    		</div>
    	</div>
    </div>