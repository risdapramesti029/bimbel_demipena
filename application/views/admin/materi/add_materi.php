

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
											<input type="text" class="form-control" placeholder="Ex : Bangun Ruang " name="judul_materi" id="judul_materi" required autocomplete="off" />
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
										<select name="kode_kelas" class="form-control" id="">
											<option value="" selected hidden>Pilih Kelas</option>
											<?php foreach($list_kelas as $kelas) { ?>
												<option value="<?= $kelas['kode_kelas'] ?>"><?= $kelas['judul_kelas'] ?></option>
											<?php } ?>
										</select>
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
											<input type="text" class="form-control"  name="tingkatan_kelas" id="tingkatan_kelas" required autocomplete="off" />
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
										<div class="form-line">
											<input type="file" class="form-control"  name="file_materi" id="file_materi" required autocomplete="off" />
										</div>
									</div>
								</div>
							</div>
							
							<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
									<h4 style="font-size: 17.1px;">Soal</h4>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="soalContainer">
									<div class="form-group">
										<div class="form-line">
											<input type="text" class="form-control" placeholder='1.' name="soal[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" placeholder='a.' name="option_a[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" placeholder='b.' name="option_b[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" placeholder='c.' name="option_c[]" required autocomplete="off" />
										</div>
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" placeholder='d.' name="option_d[]" required autocomplete="off" />
										</div>
										<br>  
										<div class="form-line" style='margin-left:20px'>
											<input type="text" class="form-control" placeholder='Kunci Soal' name="option_correct[]" oninput="this.value = this.value.toUpperCase()" required autocomplete="off" />
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer" style="padding:30px">
							<button type="button" id="addQuestionBtn" class="btn btn-secondary">Tambah Soal</button>
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
<script>
    $(document).ready(function(){
        $("#addQuestionBtn").click(function(){
            var questionCount = $("#soalContainer").children().length + 1;
            var newQuestion = `
                <div class="form-group">
					<div class="form-line">
						<input type="text" class="form-control" placeholder='${questionCount}.' name="soal[]" required autocomplete="off" />
					</div>
					<div class="form-line" style='margin-left:20px'>
						<input type="text" class="form-control" placeholder='a.' name="option_a[]" required autocomplete="off" />
					</div>
					<div class="form-line" style='margin-left:20px'>
						<input type="text" class="form-control" placeholder='b.' name="option_b[]" required autocomplete="off" />
					</div>
					<div class="form-line" style='margin-left:20px'>
						<input type="text" class="form-control" placeholder='c.' name="option_c[]" required autocomplete="off" />
					</div>
					<div class="form-line" style='margin-left:20px'>
						<input type="text" class="form-control" placeholder='d.' name="option_d[]" required autocomplete="off" />
					</div>
					<br>  
					<div class="form-line" style='margin-left:20px'>
						<input type="text" class="form-control" placeholder='Kunci Soal' name="option_correct[]" required autocomplete="off" />
					</div>
                </div>
            `;
            $("#soalContainer").append(newQuestion);
        });
    });
</script>
<!-- <script>
    function simpan(){
        var judulmateri = $('#judul_materi').val();
        var kodekelas = $('#kode_kelas').val();
        var uploadpdf = $('#upload_pdf').prop('files')[0];
      
        var idsoal = $('#idsoal').val();
        var idsoal1 = $('#idsoal1').val();
        var idsoal2 = $('#idsoal2').val();
        var idsoal3 = $('#idsoal3').val();
        var idsoal4 = $('#idsoal4').val();
        var kunci = $('#kunci').val();    

        var idsoal2a = $('#idsoal2a').val();
        var idsoal5 = $('#idsoal5').val();
        var idsoal6 = $('#idsoal6').val();
        var idsoal7 = $('#idsoal7').val();
        var idsoal8 = $('#idsoal8').val();
        var kunci2 = $('#kunci2').val();   

        var idsoal3a = $('#idsoal3a').val();
        var idsoal9 = $('#idsoal9').val();
        var idsoal10 = $('#idsoal10').val();
        var idsoal11 = $('#idsoal11').val();
        var idsoal12 = $('#idsoal12').val();
        var kunci3 = $('#kunci3').val();   

        var idsoal4a = $('#idsoal4a').val();
        var idsoal13 = $('#idsoal13').val();
        var idsoal14 = $('#idsoal14').val();
        var idsoal15 = $('#idsoal15').val();
        var idsoal16 = $('#idsoal16').val();
        var kunci4 = $('#kunci4').val();   

        var idsoal5a = $('#idsoal5a').val();
        var idsoal17 = $('#idsoal17').val();
        var idsoal18 = $('#idsoal18').val();
        var idsoal19  = $('#idsoal19').val();
        var idsoal20 = $('#idsoal20').val();
        var kunci5 = $('#kunci5').val();   

        var data=[
            {
                "soal1":idsoal,
                "kunci":kunci,
                "type":'1',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal1,
                "kunci":kunci,
                "type":'1a',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal2,
                "kunci":kunci,
                "type":'1b',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal3,
                "kunci":kunci,
                "type":'1c',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal4,
                "kunci":kunci,
                "type":'1d',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal2a,
                "kunci":kunci2,
                "type":'2',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal5,
                "kunci":kunci2,
                "type":'2a',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal6,
                "kunci":kunci2,
                "type":'2b',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal7,
                "kunci":kunci2,
                "type":'2c',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal8,
                "kunci":kunci2,
                "type":'2d',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal3a,
                "kunci":kunci3,
                "type":'3',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal9,
                "kunci":kunci3,
                "type":'3a',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal10,
                "kunci":kunci3,
                "type":'3b',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal11,
                "kunci":kunci3,
                "type":'3c',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal12,
                "kunci":kunci3,
                "type":'3d',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal4a,
                "kunci":kunci4,
                "type":'4',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal13,
                "kunci":kunci4,
                "type":'4a',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal14,
                "kunci":kunci4,
                "type":'4b',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal15,
                "kunci":kunci4,
                "type":'4c',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal16,
                "kunci":kunci4,
                "type":'4d',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal5a,
                "kunci":kunci5,
                "type":'5',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal17,
                "kunci":kunci5,
                "type":'5a',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal18,
                "kunci":kunci5,
                "type":'5b',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal19,
                "kunci":kunci5,
                "type":'5c',
                "kodekelas":kodekelas
            },
            {
                "soal1":idsoal20,
                "kunci":kunci5,
                "type":'5d',
                "kodekelas":kodekelas
            }

        ]
        var datamateri=[
            {
                'judulmateri':judulmateri,
                'kodekelas': kodekelas,
                "uploadpdf":uploadpdf
            }
        ]
        var formData = new FormData();
        formData.append('datasoal', JSON.stringify(data));
        formData.append('uploadpdf', uploadpdf);
        formData.append('datamateri', JSON.stringify(datamateri));

        console.log(datamateri,data);
        $.ajax({
            url: "<?php echo site_url(); ?>Materi/createMateri",
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.status == 1) {
                    Swal.fire(
                        'Berhasil   !',
                        data.pesan
                    ).then(function() {
                        location.reload(); 
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: data.pesan
                    }).then(function() {
                        location.reload();
                    });
                }
            }
        });
    }
</script> -->

         
