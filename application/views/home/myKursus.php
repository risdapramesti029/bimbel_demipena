<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.28.4/dist/sweetalert2.all.min.js"></script>
	<?php if ($this->session->flashdata('message')) : ?>
		<script type="text/javascript">
			swal({
				title: "BERHASIL !!!",
				text: "<?php echo $this->session->flashdata('message'); ?>",
				showConfirmButton: true,
				type: 'success'
			});
		</script>
	<?php endif; ?>
	<?php if ($this->session->flashdata('abort')) : ?>
		<script type="text/javascript">
			swal({
				title: "ERROR !!!",
				text: "<?php echo $this->session->flashdata('abort'); ?>",
				showConfirmButton: true,
				type: 'error'
			});
		</script>
	<?php endif; ?>
	<section class="home-slider owl-carousel">
		<div class="slider-item" style="background-image:url(<?= base_url(); ?>assets/User/images/bg_1.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center ftco-animate">
						<h1 class="mb-4">Berkembang Bersama <span> Ilmu dan Pemahaman</span></h1>
						<?php if ($this->session->userdata('is_user_login') == true) : ?>
							<p><a href="<?= base_url(); ?>home/form" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php elseif ($this->session->userdata('is_admin_login') == true) : ?>
							<p><a href="<?= base_url(); ?>admin/dashboard" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php else : ?>
							<p><a href="<?= base_url(); ?>auth/login" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php endif; ?>

					</div>
				</div>
			</div>
		</div>

		<div class="slider-item" style="background-image:url(<?= base_url(); ?>assets/User/images/bg_2.jpg);">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
					<div class="col-md-8 text-center ftco-animate">
						<h1 class="mb-4">Menguatkan Pikiran, <span> Membangun Masa Depan.</span></h1>
						<?php if ($this->session->userdata('is_user_login') == true) : ?>
							<p><a href="<?= base_url(); ?>home/form" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php elseif ($this->session->userdata('is_admin_login') == true) : ?>
							<p><a href="<?= base_url(); ?>admin/dashboard" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php else : ?>
							<p><a href="<?= base_url(); ?>auth/login" class="btn btn-secondary px-4 py-3 mt-3">Daftar Sekarang</a></p>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-services ftco-no-pb">
		<div class="container-wrap">
			<div class="row no-gutters justify-content-center">
				<div class="col services pb-4 px-4 ftco-animate bg-primary">
					<div class="media block-6 d-block text-center">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-teacher"></span>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Tutor Berpengalaman</h3>
							<p>Semua Tutor yang mengajar sudah berpengalaman</p>
						</div>
					</div>
				</div>
				<div class="col services pb-4 px-4 ftco-animate bg-tertiary">
					<div class="media block-6 d-block text-center">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-reading"></span>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Grup Belajar</h3>
							<p>Grup belajar siswa sesuai jenjang pendidikan dengan tim belajar yang menyenangkan</p>
						</div>
					</div>
				</div>
				
				<div class="col services pb-4 px-4 ftco-animate bg-quarternary">
					<div class="media block-6 d-block text-center">
						<div class="icon d-flex justify-content-center align-items-center">
							<span class="flaticon-diploma"></span>
						</div>
						<div class="media-body p-2 mt-3">
							<h3 class="heading">Pendidikan Khusus</h3>
							<p>Pendidikan untuk siswa SD, SMP dan SMA/SMK</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>




	<section class="ftco-section" style="padding: 4em 0 !important">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-8 text-center heading-section ftco-animate">
					<h2 class="mb-4"><span>My</span> Kelas</h2>

				</div>
			</div>
			<div class="row">

				<?php $i = 1;
				foreach ($kelas as $kel) : ?>
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="pricing-entry bg-light pb-4 text-center">
							<div>
								<h3 class="mb-3"><?= $kel['judul_kelas'] ?></h3>
								<p class="subheading"><span>Class day:</span> <?= $kel['jadwal_kelas'] ?></p>
								<p class="subheading"><span>Class time:</span> <?= $kel['waktu_kelas'] ?></p>
							</div>
							<div class="img" style="background-image: url(<?= base_url(); ?>assets/User/images/bg_<?= $i++; ?>.jpg);"></div>
							<div class="px-4">
								<p><?= $kel['deskripsi_kelas'] ?></p>
							</div>
							<?php if ($this->session->userdata('is_user_login') == true) : ?>
								<p class="button text-center"><a href="<?= base_url('siswa/myKelasDetail/'.$kel['id_kelas']) ?>" class="btn btn-primary px-4 py-3">Mulai Kursus</a></p>
							<?php elseif ($this->session->userdata('is_admin_login') == true) : ?>
								<p class="button text-center"><a href="<?= base_url('admin/dashboard') ?>" class="btn btn-primary px-4 py-3">Ambil Kursus</a></p>
							<?php else : ?>
								<p class="button text-center"><a href="<?= base_url('auth/login') ?>" class="btn btn-primary px-4 py-3">Ambil Kursus</a></p>
							<?php endif; ?>
						</div>
					</div>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
