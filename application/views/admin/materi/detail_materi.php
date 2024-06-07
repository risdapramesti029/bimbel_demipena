

<section class="content">
	<div class="container-fluid">
		<!-- Input -->
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<form action="<?php echo site_url(); ?>Materi/createMateri" method="post" enctype="multipart/form-data">
				<div class="card">
					<div class="header">
						<h2 style="font-weight: bold;color: #ad1455;font-size: 22px;">
							<center>FORM TAMBAH MATERI</center>
							<br>
						</h2>
					</div>

					<div class="body">
							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Judul Materi</h4>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control" value="<?= $materi['judul_materi'] ?>" name="judul_materi" id="judul_materi" readonly />
										</div>
									</div>
								</div>
							</div>


							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Kode Kelas</h4>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control" value="<?= $materi['kode_kelas'] ?>"   name="kode_kelas" id="kode_kelas" readonly autocomplete="off" />
										</div>
									</div>
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Tingkatan Kelas</h4>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control" value="<?= $materi['tingkatan_kelas'] ?>"   name="tingkatan_kelas" id="tingkatan_kelas" readonly autocomplete="off" />
										</div>
									</div>
								</div>
							</div>

							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Upload Materi PDF</h4>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
									<div class="form-group">
										<!-- <div class="form-line"> -->
										<a href="<?= site_url('assets/upload/materi/' . $materi['file_materi']) ?>" class="btn btn-primary" target="_blank">Lihat Materi</a>
										<!-- </div> -->
									</div>
								</div>
							</div>
							
							<?php $i = 1;
										foreach ($soals as $soal) : ?>

							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Soal <?= $i++ ?></h4> 
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="soalContainer">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control" value="<?= $soal['soal'] ?>" name="soal[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" value="A. <?= $soal['option_a'] ?>" name="option_a[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" value="B. <?= $soal['option_b'] ?>" name="option_b[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" value="C. <?= $soal['option_c'] ?>" name="option_c[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" value="D. <?= $soal['option_d'] ?>" name="option_d[]" required autocomplete="off" />
										</div>
										<br>  
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" value="Jawaban Benar:  <?= $soal['option_correct']?>" name="option_correct[]" required autocomplete="off" />
										</div>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
						<div class="card-footer" style="padding:50px">
							<button type="submit" class="btn btn-primary pull-right" style="margin-right: 20px;">SIMPAN</button>
						</div>
					</div>
				</div>
				</form>
			</div>
		<!-- #END# Input -->

		</div>
	</div>
</section>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

         
