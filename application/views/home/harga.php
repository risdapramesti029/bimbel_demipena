<section class="hero-wrap hero-wrap-2" style="background-image: url('<?= base_url(); ?>assets/User/images/bg_2.jpg');">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<h1 class="mb-2 bread">Daftar Harga</h1>
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Daftar Harga <i class="ion-ios-arrow-forward"></i></span></p>
			</div>
		</div>
	</div>
</section>

<section class="ftco-section" style="padding: 4em 0 !important">
	<div class="container">

	<div class="row justify-content-center mb-5 pb-2">
		<div class="col-md-8 text-center heading-section ftco-animate">
			<h2 class="mb-4"><span>Daftar</span> Kelas</h2>
			<p>Daftar kelas dan harga yang tersedia saat ini</p>
		</div>
	</div>
		<div class="row">
			<?php $i = 3;
			foreach ($kelas as $kel) : ?>
			
				<div class="col-md-6 col-lg-3 ftco-animate mb-4">
			
					<div class="pricing-entry bg-light pb-4 text-center">
						<div>
							<h3 class="mb-3"><?= $kel['judul_kelas'] ?></h3>
							<p class="subheading"><span>Class day:</span> <?= $kel['jadwal_kelas'] ?></p>
							<p class="subheading"><span>Class time:</span> <?= $kel['waktu_kelas'] ?></p>
							<p><span class="price">Rp. <?= number_format($kel['harga_kelas']) ?></span> <span class="per">/ Bulan</span></p>
						</div>
						<div class="img" style="background-image: url(<?= base_url(); ?>assets/User/images/bg_<?= $i++; ?>.jpg);"></div>
						
						<div class="px-4">
							<?php
								$short_desc = substr($kel['deskripsi_kelas'], 0, 20); // Potong teks deskripsi
								$full_desc = $kel['deskripsi_kelas'];
							?>
							<p class="short-desc"><?= $short_desc ?>...</p>
							<p class="full-desc" style="display: none;"><?= $full_desc ?></p>
							<a href="javascript:void(0);" class="read-more">Baca Selengkapnya</a>
						</div>

						<?php if ($this->session->userdata('is_user_login') == true) : ?>
							<p class="button text-center"><a href="<?= base_url('home/form') ?>" class="btn btn-primary px-4 py-3 ambil-kelas" data-jenjang="<?= $kel['pendidikan'] ?>">Ambil Kelas</a></p>
						<?php elseif ($this->session->userdata('is_admin_login') == true) : ?>
							<p class="button text-center"><a href="<?= base_url('auth/login') ?>" class="btn btn-primary px-4 py-3">Ambil Kelas</a></p>
						<?php else : ?>
							<p class="button text-center"><a href="<?= base_url('auth/login') ?>" class="btn btn-primary px-4 py-3">Ambil Kelas</a></p>
						<?php endif; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const ambilKelasButtons = document.querySelectorAll('.ambil-kelas');
		ambilKelasButtons.forEach(button => {
			button.addEventListener('click', function(event) {
				const kelasJenjang = this.getAttribute('data-jenjang');
				const siswaJenjang = '<?= $this->session->userdata('pendidikan'); ?>'; // Asumsikan pendidikan disimpan di session

				// Debugging logs
				console.log('Kelas Jenjang:', kelasJenjang);
				console.log('Siswa Jenjang:', siswaJenjang);

				if (kelasJenjang !== siswaJenjang) {
					event.preventDefault();
					swal({
						title: "ERROR !!!",
						text: "Anda tidak bisa mendaftar kelas ini. Pastikan memilih kelas sesuai jenjang pendidikan anda.",
						showConfirmButton: true,
						type: 'error'
					});
				} else {
					window.location.href = this.getAttribute('href');
				}
			});
		});
	});
</script>

