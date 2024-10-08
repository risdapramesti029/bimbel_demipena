<style>
	.dropdown-item:hover {
		background-color: #6c757d !important;
		color: white !important;
	}
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco_navbar ftco-navbar-light" id="ftco-navbar">
	<div class="container d-flex align-items-center">
		<a class="navbar-brand" href="#">Bimbel Demi Pena</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="oi oi-menu"></span> Menu
		</button>
		<div class="collapse navbar-collapse" id="ftco-nav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link pl-0">Home</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>Home/tentang" class="nav-link">Tentang</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>Home/infodaftar" class="nav-link">Informasi Pendafaran</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>Home/kelas" class="nav-link">Kelas</a></li>
				<li class="nav-item"><a href="<?= base_url(); ?>Home/kontak" class="nav-link">Kontak</a></li>
				<?php if ($this->session->userdata('is_user_login') == true) : ?>
					<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Hi, <?= $this->session->userdata('username')  ?></a>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="<?= base_url('siswa/profile') ?>" class="nav-link tot">Profil</a>
							<a class="dropdown-item" href="<?= base_url('siswa/riwayat') ?>" class="nav-link tot">Riwayat Pembelian</a>
							<a class="dropdown-item" href="<?= base_url('siswa/myKelas') ?>" class="nav-link tot">My Kelas</a>
							<!-- <a class="dropdown-item" href="#" class="nav-link tot">Profil</a> -->
							<a class="dropdown-item" href="<?= base_url('auth/logout') ?>" class="nav-link tot">Logout</a>
						</div>
					</li>
				<?php elseif ($this->session->userdata('is_admin_login') == true) : ?>
					<li class="nav-item"><a href="<?= base_url(); ?>auth/login" class="nav-link">Login</a></li>
				<?php else : ?>
					<li class="nav-item"><a href="<?= base_url(); ?>auth/login" class="nav-link">Login</a></li>
				<?php endif; ?>

			</ul>
		</div>
	</div>
</nav>
<!-- END nav -->
