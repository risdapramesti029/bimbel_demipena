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
	<section class="ftco-section" style="padding: 4em 0 !important">
		<div class="container">
			<div class="row">
				<div class="card mx-auto shadow rounded mb-3" style="width:1100px">
					<img src="<?= base_url(); ?>assets/User/images/bg_<?= rand(1, 15) ?>.jpg" style="height:300px;" class="card-img-top" alt="...">
					<div class="card-body">
						<h3 class="card-title"><?= $kelas['judul_kelas'] ?></h3>
						<p class="card-text"><?= $kelas['deskripsi_kelas'] ?></p>
						<ul class="list-group">
							<li class="list-group-item">Class day  :  <?= $kelas['jadwal_kelas'] ?></li>
							<li class="list-group-item">Class time : <?= $kelas['waktu_kelas'] ?></li>
						</ul>
					</div>
				</div>

				<?php foreach($materis as $materi): ?>
				<?php
					$this->db->select('*');
					$this->db->from('xx_jawaban'); // Ganti jawaban_table dengan nama tabel jawaban Anda
					$this->db->where('id_materi', $materi['id_materi']);
					$this->db->where('id_user', $user_id); // Ganti id_pengguna dengan id pengguna yang sedang login
					$query = $this->db->get();
					$cek = $query->row_array(); // Mengambil jawaban pengguna
				?>
				<?php if ($cek && $cek['id_materi'] == $materi['id_materi']): ?>
    <div class="accordion mx-auto" id="materi<?= $materi['id_materi']?>">
        <div class="card shadow" style="width:1100px">
            <div class="card-header bg-success" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left text-white" type="button" data-toggle="collapse" data-target="#collapse<?= $materi["id_materi"] ?>" aria-expanded="true" aria-controls="collapse<?= $materi["id_materi"] ?>">
                        <?= $materi['judul_materi'] ?>
                    </button>
                </h2>
            </div>

            <div id="collapse<?= $materi["id_materi"] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#materi<?= $materi['id_materi']?>">
                <div class="card-body">
                    <div class="mb-3">
                        <a href="<?= site_url('assets/upload/materi/' . $materi['file_materi']) ?>" class="btn btn-primary" target="_blank">Lihat Materi</a>
                    </div>
                    <h3>Latihan Soal</h3>

                    <?php 
                        $this->db->select('*');
                        $this->db->from('xx_soal');
                        $this->db->where('id_materi', $materi['id_materi']);
                        $query = $this->db->get();
                        $soals = $query->result_array();
                        $no = 1;
                        $jumlah_jawaban_benar = 0; // Inisialisasi variabel untuk menyimpan jumlah jawaban yang benar
                    ?>

                    <?php foreach ($soals as $soal): ?>
                        <?php 
                            $this->db->select('*');
                            $this->db->from('xx_jawaban');
                            $this->db->where('id_soal', $soal['id_soal']);
                            $this->db->where('id_user', $user_id);
                            $query = $this->db->get();
                            $cek2 = $query->row_array(); 

                            // Bandingkan jawaban dengan jawaban yang benar
                            if ($cek2 && $cek2['jawaban'] == $soal['option_correct']) {
                                $jumlah_jawaban_benar++; // Tambahkan jika jawaban benar
                            }
                        ?>

                        <div class="form-group">
                            <input type="hidden" name="id_soal[]" value="<?= $soal['id_soal'] ?>">
                            <label for="soal<?= $soal['id_soal'] ?>">Soal <?= $soal['soal'] ?></label>
                            <div class="form-check">
								<input class="form-check-input" disabled <?= $cek2 && 'A' == $cek2['jawaban'] ? 'checked' : '' ?> type="radio" name="jawaban[<?= $soal['id_soal'] ?>]" id="soal1<?= $soal['id_soal'] ?>" value="A">
                                <label class="form-check-label" for="soal1<?= $soal['id_soal'] ?>">
                                    A . <?= $soal['option_a'] ?>
                                </label>
                            </div>
                            <div class="form-check">
								<input class="form-check-input" disabled <?= $cek2 && 'B' == $cek2['jawaban'] ? 'checked' : '' ?>  type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal2<?= $soal['id_soal'] ?>" value="B">
                                <label class="form-check-label" for="soal2<?= $soal['id_soal'] ?>">
                                    B. <?= $soal['option_b'] ?>
                                </label>
                            </div>
                            <div class="form-check">
								<input class="form-check-input" disabled <?= $cek2 && 'C' == $cek2['jawaban'] ? 'checked' : '' ?> type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal3<?= $soal['id_soal'] ?>" value="C">
                                <label class="form-check-label" for="soal3<?= $soal['id_soal'] ?>">
                                    C. <?= $soal['option_c'] ?>
                                </label>
                            </div>
                            <div class="form-check mb-4">
								<input class="form-check-input" disabled <?= $cek2 && 'D' == $cek2['jawaban'] ? 'checked' : '' ?> type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal4<?= $soal['id_soal'] ?>" value="D">
                                <label class="form-check-label" for="soal4<?= $soal['id_soal'] ?>">
                                    D. <?= $soal['option_d'] ?>
                                </label>
                            </div>
                        </div>

                        <h4>Jawaban Benar : <?= $soal['option_correct'] ?></h4>
                    <?php endforeach; ?>

                    <?php 
                        // Menghitung nilai dalam persentase
                        $total_soal = count($soals); // Menghitung total soal
                        $nilai = ($jumlah_jawaban_benar / $total_soal) * 100; // Menghitung nilai dalam persentase
                        $nilai = number_format($nilai); // Menampilkan nilai dengan dua angka desimal

						$data = array(
							'nilai' => $nilai
						);
						
						// Melakukan update pada tabel xx_jawaban
						$this->db->where('id_jawaban', $cek['id_jawaban']);
						$this->db->update('xx_jawaban', $data);
                    ?>

					<hr>
					<h4>Jumlah Jawaban Benar: <?= $jumlah_jawaban_benar ?> / <?= $total_soal ?></h4>
                    <h4>Nilai: <?= $nilai ?></h4>
					
                </div>
            </div>
        </div>
    </div>
<?php else: ?>


						<div class="accordion mx-auto" id="materi<?= $materi['id_materi']?>">
							<div class="card shadow" style="width:1100px">
								<div class="card-header" id="headingOne">
									<h2 class="mb-0">
										<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse<?= $materi["id_materi"] ?>" aria-expanded="true" aria-controls="collapse<?= $materi["id_materi"] ?>">
											<?= $materi['judul_materi'] ?>
										</button>
									</h2>
								</div>

								<div id="collapse<?= $materi["id_materi"] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#materi<?= $materi['id_materi']?>">
									<div class="card-body">
										<div class="mb-3">
											<a href="<?= site_url('assets/upload/materi/' . $materi['file_materi']) ?>" class="btn btn-primary" target="_blank">Lihat Materi</a>
										</div>
										<h3>Latihan Soal</h3>

										<form action="<?php echo site_url(); ?>Siswa/KirimJawaban" method="POST">
											<?php 
												$this->db->select('*');
												$this->db->from('xx_soal');
												$this->db->where('id_materi', $materi['id_materi']);
												$query = $this->db->get();
												$soals = $query->result_array();
												$no = 1;
											?>

											<input type="hidden" name="id_materi" value="<?= $materi['id_materi'] ?>">
											<?php foreach ($soals as $soal): ?>
												<div class="form-group">
													<input type="hidden" name="id_soal[]" value="<?= $soal['id_soal'] ?>">
													<label for="soal<?= $soal['id_soal'] ?>">Soal : <?= $soal['soal'] ?></label>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal1<?= $soal['id_soal'] ?>" value="A">
														<label class="form-check-label" for="soal1<?= $soal['id_soal'] ?>">
															A . <?= $soal['option_a'] ?>
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal2<?= $soal['id_soal'] ?>" value="B">
														<label class="form-check-label" for="soal2<?= $soal['id_soal'] ?>">
															B. <?= $soal['option_b'] ?>
														</label>
													</div>
													<div class="form-check">
														<input class="form-check-input" type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal3<?= $soal['id_soal'] ?>" value="C">
														<label class="form-check-label" for="soal3<?= $soal['id_soal'] ?>">
															C. <?= $soal['option_c'] ?>
														</label>
													</div>
													<div class="form-check mb-4">
														<input class="form-check-input" type="radio" name="jawaban[<?= $soal['id_soal'] ?>]"  id="soal4<?= $soal['id_soal'] ?>" value="D">
														<label class="form-check-label" for="soal4<?= $soal['id_soal'] ?>">
															D. <?= $soal['option_d'] ?>
														</label>
													</div>
												</div>
											<?php endforeach; ?>
											<button type="submit" class="btn btn-primary m-3">Submit</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>

			</div>
		</div>
	</section>
