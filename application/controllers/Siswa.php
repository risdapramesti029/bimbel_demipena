<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('siswa_model', 'siswa_model');
	}

	public function index()
	{
		$data['title'] = 'Siswa';
		$data['layout'] = 'siswa';
		$this->load->view('layout', $data);
	}

	// public function profile()
	// {
	// 	if ($this->session->userdata('is_admin_login') == TRUE) {
	// 		redirect('admin/dashboard', 'refresh');
	// 	} elseif (!$this->session->userdata('is_admin_login') && !$this->session->userdata('is_user_login')) {
	// 		redirect('auth/login');
	// 	}

	// 	$upload = "";
	// 	if ($this->input->post('submit')) {

	// 		if (isset($_FILES) && !empty($_FILES)) {
	// 			if ($this->security->xss_clean($_FILES, TRUE) === FALSE) {
	// 				// file failed the XSS test

	// 				$this->session->set_flashdata('abort', 'Upload error xss');

	// 				redirect(base_url('siswa/profile'));
	// 			} else {

	// 				$upload = $this->uploadFotoProfile('./assets/upload/foto/', $_FILES);
	// 			}
	// 		}

	// 		if (!empty($upload)) {
	// 			$this->session->set_flashdata('abort', 'Upload Gagal');
	// 			redirect(base_url('siswa/profile'));
	// 		} else {
	// 			$this->session->set_flashdata('message', 'Upload Berhasil');
	// 			redirect(base_url('siswa/profile'));
	// 		}
	// 	} else {

	// 		$data['title'] = 'Siswa Profile';
	// 		$data['profile'] = $this->siswa_model->profile();

	// 		$data['layout'] = 'profile';
	// 		$this->load->view('layout', $data);
	// 	}
	// }

	public function KirimJawaban(){
		$user_id = $this->session->userdata('id_user');
		$id_materi = $this->input->post('id_materi');
		$id_soal = $this->input->post('id_soal');
		$jawabans = $this->input->post('jawaban');

		for ($i = 0; $i < count($id_soal); $i++) {
			$jawaban = array(
				'id_materi' => $id_materi,
				'id_user' => $user_id,
				'id_soal' => $id_soal[$i],
				'jawaban' => $jawabans[$id_soal[$i]],
			);

			// Panggil model untuk menyimpan data soal
			$jawabanCreate = $this->siswa_model->kirim_jawaban($jawaban);
		}

		if($jawabanCreate){
			// Set pesan flash data jika berhasil
			$this->session->set_flashdata('message', 'Berhasil');
			echo '<script>window.history.go(-1);</script>';
		} else {
			// Set pesan flash data jika gagal
			$this->session->set_flashdata('abort', 'Gagal');
			echo '<script>window.history.go(-1);</script>';
		}



	}

	public function profile()
	{
		if ($this->session->userdata('is_admin_login') == TRUE) {
			redirect('admin/dashboard', 'refresh');
		} elseif (!$this->session->userdata('is_admin_login') && !$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}

		$upload = "";
		if ($this->input->post('submit')) {


			$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('no_hp', 'no_hp', 'trim|required|min_length[3]');
			$this->form_validation->set_rules('tempat_lahir', 'tempat_lahir', 'trim|required');
			$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir', 'trim|required');
			$this->form_validation->set_rules('umur', 'umur', 'trim|required');
			$this->form_validation->set_rules('pendidikan', 'pendidikan', 'trim|required');
			$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
			$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');


			if ($this->form_validation->run() == FALSE) {
				$data = array(
					'errors' => validation_errors()
				);

				$this->session->set_flashdata('abort', $data['errors']);
				redirect(base_url('siswa/profile'), 'refresh');
			} else {
				$data = array(
					'id_user' => $this->session->userdata('id_user'),
					'nama' => $this->security->xss_clean($this->input->post('nama')),
					'no_hp' => $this->security->xss_clean($this->input->post('no_hp')),
					'tempat_lahir' => $this->security->xss_clean($this->input->post('tempat_lahir')),
					'tanggal_lahir' => $this->security->xss_clean($this->input->post('tanggal_lahir')),
					'umur' => $this->security->xss_clean($this->input->post('umur')),
					'pendidikan' => $this->security->xss_clean($this->input->post('pendidikan')),
					'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
					'alamat' => $this->security->xss_clean($this->input->post('alamat')),
					'created_at' => date('Y-m-d : h:m:s')
				);


				if (isset($_FILES) && !empty($_FILES)) {
					if ($this->security->xss_clean($_FILES, TRUE) === FALSE) {
						// file failed the XSS test

						$this->session->set_flashdata('abort', 'Upload error xss');

						redirect(base_url('siswa/profile'));
					} else {

						$upload = $this->uploadFotoProfile('./assets/upload/foto/', $_FILES);
					}
				}

				$result = $this->siswa_model->insert_profile($data, $this->session->userdata('id_user'));
				if ($result) {

					if (!empty($upload)) {
						$this->session->set_flashdata('abort', 'Upload foto gagal');
						redirect(base_url('siswa/profile'));
					} else {
						$this->session->set_flashdata('message', 'Update profile berhasil!');
						redirect(base_url('siswa/profile'), 'refresh');
					}
				} else {
					$this->session->set_flashdata('abort', 'Gagal daftar, ulangi pendaftaran atau hubungi admin.');
					redirect(base_url('siswa/profile'), 'refresh');
				}
			}
		} else {

			$data['title'] = 'Siswa Profile';
			$data['profile'] = $this->siswa_model->profile();
			$data['jenis_kelamin'] = get_jenis_kelamin();
			$data['layout'] = 'profile';
			$this->load->view('layout', $data);
		}
	}

	public function invoice($id)
	{
		if ($this->session->userdata('is_admin_login') == TRUE) {
			redirect('admin/dashboard', 'refresh');
		} elseif (!$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}
		
		// Memuat model siswa_model jika belum dimuat sebelumnya
		$this->load->model('siswa_model');
		
		// Mendapatkan ID user dari session
		$user_id = $this->session->userdata('id_user');
		
		// try {
			// Memuat data invoice dari model
			$data['invoice'] = $this->siswa_model->data_invoice($id);
		
			// Memuat library MPDF
			// $this->load->library('Mpdf', ['mode' => 'utf-8', 'format' => 'A4-P']);
		
			// Memuat view 'invoice' dan menyimpannya ke dalam variabel
			 $this->load->view('invoice', $data);

			// redirect(base_url('siswa/profile'));	
		
			// // Membuat objek Mpdf
			// $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
		
			// // Menuliskan HTML ke dalam PDF
			// $mpdf->WriteHTML($data1);
		
			// // Outputkan PDF ke browser dan hentikan proses eksekusi
			// $mpdf->Output("Kartu-Invoice.pdf", 'I');
			// exit();
		// } catch (\Mpdf\MpdfException $e) {
		// 	// Tangani eksepsi MPDF
		// 	echo $e->getMessage();
		// }
		
	}
	
	public function myKelas(){
			$id = $this->session->userdata('id_user');
			$data['title'] = 'Home';
			$data['kelas'] =  $this->siswa_model->my_kelas($id);
			$data['riwayat'] = $this->siswa_model->riwayat($id);
			$data['layout'] = 'home/myKursus';
			$this->load->view('layout', $data);
		
	}

	public function myKelasDetail($id){
		$data['title'] = 'Home';
		$data['user_id'] = $this->session->userdata('id_user');
		$data['kelas'] =  $this->siswa_model->my_kelas_detail($id);
		$data['materis'] =  $this->siswa_model->my_kelas_detail_materi($data['kelas']['kode_kelas']);
		$data['layout'] = 'home/myKursusDetail';
		$this->load->view('layout', $data);
	}

	public function kelasMy(){
		$id = $this->session->userdata('id_user');
		$data['title'] = 'Home';
		$data['kelas'] = get_kelas();
		$data['soal'] = $this->siswa_model->soal();
		$data['riwayat'] = $this->siswa_model->riwayat($id);
		$data['layout'] = 'home/myKelas';
		$this->load->view('layout', $data);
	
}
	public function riwayat()
	{

		if ($this->session->userdata('is_admin_login') == TRUE) {
			redirect('admin/dashboard', 'refresh');
		} elseif (!$this->session->userdata('is_admin_login') && !$this->session->userdata('is_user_login')) {
			redirect('auth/login');
		}

		$upload = "";
		if ($this->input->post('submit')) {

			if (isset($_FILES) && !empty($_FILES)) {
				if ($this->security->xss_clean($_FILES, TRUE) === FALSE) {
					// file failed the XSS test

					$this->session->set_flashdata('abort', 'Upload Error');

					redirect(base_url('siswa/riwayat'));
				} else {

					$upload = $this->uploadFoto('./assets/upload/bukti_pembayaran/', $_FILES, $this->input->post('id_pendaftaran'));
				}
			}

			if (!empty($upload)) {
				$this->session->set_flashdata('abort', 'Upload Gagal');
				redirect(base_url('siswa/riwayat'));
			} else {
				$this->session->set_flashdata('message', 'Upload Berhasil');
				redirect(base_url('siswa/riwayat'));
			}
		} else {
			$id = $this->session->userdata('id_user');
			$data['title'] = 'riwayat';
			$data['layout'] = 'riwayat';
			$data['riwayat'] = $this->siswa_model->riwayat($id);

			$this->load->view('layout', $data);
		}
	}

	private function uploadFoto($directory, $files, $id)
	{

		$user_id = $this->session->userdata('id_user');

		// $old_image = $data['user_info']['image'];
		if (!empty($files['file']['name'])) {
			$kode = get_nomor_pendaftaran($id);
			$config = array(
				'upload_path' => $directory,
				'allowed_types' => "jpg|png|gif|jpeg|JPG|Jpeg|PNG|GIF|JPEG",
				'overwrite' => TRUE,
				'max_size' => "848000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
			);

			$new_name =  $user_id . $kode . str_replace("image/", ".", $files['file']['type']);
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('file')) {

				$file_data = array('upload_data' => $this->upload->data());
				$dataImage =  $file_data['upload_data']['file_name'];

				// if ($old_image != 'uploads/profile/user/user.png' && $dataImage != $old_image) {

				// 	unlink(FCPATH . $old_image);
				// }

				$this->db->where('id_pendaftaran', $id);
				$this->db->update('xx_pendaftaran', ['bukti_pembayaran' => $dataImage, 'status_pembayaran' => 2]);
			} else {
				$data['file_error'] = array('error' => $this->upload->display_errors());

				var_dump($data['file_error']);
				exit();
				$this->session->set_flashdata('abort', 'Error! Please select a valid file formate');
				redirect(base_url('siswa/riwayat'));
			}
		}
		// end upload user image code		
	}

	private function uploadFotoProfile($directory, $files)
	{

		$user_id = $this->session->userdata('id_user');

		// $old_image = $data['user_info']['image'];
		if (!empty($files['foto']['name'])) {
			// $kode = get_nomor_pendaftaran($id);
			$config = array(
				'upload_path' => $directory,
				'allowed_types' => "jpg|png|gif|jpeg|JPG|Jpeg|PNG|GIF|JPEG",
				'overwrite' => TRUE,
				'max_size' => "848000" // Can be set to particular file size , here it is 0.5 MB(548 Kb)
			);

			$new_name =  $user_id . str_replace("image/", ".", $files['foto']['type']);
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {

				$file_data = array('upload_data' => $this->upload->data());
				$dataImage =  $file_data['upload_data']['file_name'];

				$this->db->where('id_user', $user_id);
				$this->db->update('xx_profile', ['foto' => $dataImage]);
			} else {
				$data['file_error'] = array('error' => $this->upload->display_errors());

				var_dump($data['file_error']);
				exit();
				$this->session->set_flashdata('abort', 'Error! Please select a valid file formate');
				redirect(base_url('siswa/profile'));
			}
		}
		// end upload user image code		
	}
}
