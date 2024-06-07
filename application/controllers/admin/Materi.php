<?php defined('BASEPATH') or exit('No direct script access allowed');

class Materi extends CI_Controller

{

    public function __construct()
	{
        parent::__construct();
		$this->load->model('admin/kelas_model', 'kelas_model');
        $this->load->model('admin/materi_model', 'materi_model');
		$this->load->library('upload');
    }

    public function index()
	{

		$data['title'] = 'materi';
		$data['list_materi'] = $this->kelas_model->list_materi();

		$data['layout'] = 'admin/materi/list_materi';
		$this->load->view('admin/layout_admin', $data);
	}
    public function add_materi()
	{
			$data['title'] = 'materi';
			$data['layout'] = 'admin/materi/add_materi';
			$data['list_kelas'] = $this->kelas_model->list_kelas();
			$this->load->view('admin/layout_admin', $data);
		
	}

	public function detail_materi($id)
	{
			$data['title'] = 'Detail materi';
			$data['layout'] = 'admin/materi/detail_materi';
			$data['materi'] = $this->materi_model->detail_materi($id);
			$data['soals'] = $this->materi_model->detail_soal($id);
			$this->load->view('admin/layout_admin', $data);
		
	}

	public function createMateri() {
		// Tentukan lokasi penyimpanan file di server
		$lokasi_penyimpanan = 'assets/upload/materi/';
		if (!is_dir($lokasi_penyimpanan)) {
			// Jika folder belum ada, buat folder
			mkdir($lokasi_penyimpanan, 0777, true);
		}

		// Ambil data dari formulir
		$judul_materi = $this->input->post('judul_materi');
		$kode_kelas = $this->input->post('kode_kelas');
		$tingkatan_kelas = $this->input->post('tingkatan_kelas');

		// Mengambil file dari formulir
		$file_materi = $_FILES['file_materi']['name']; // Nama file yang diunggah
		$tmp_file = $_FILES['file_materi']['tmp_name']; // Lokasi file sementara

		// Mendapatkan nomor unik
		$unique_number = uniqid(); // Ini akan menghasilkan nomor unik berdasarkan waktu saat ini

		// Memisahkan ekstensi file dari nama file
		$file_extension = pathinfo($file_materi, PATHINFO_EXTENSION);

		// Menambahkan nomor unik ke nama file
		$new_file_name = $unique_number . '_' . $file_materi;

		// Tentukan lokasi lengkap untuk file yang disimpan
		$lokasi_simpan = $lokasi_penyimpanan . $new_file_name;

		// Pindahkan file dari lokasi sementara ke lokasi penyimpanan di server
		move_uploaded_file($tmp_file, $lokasi_simpan);

		$data = array(
			'judul_materi' => $judul_materi,
			'kode_kelas' => $kode_kelas,
			'tingkatan_kelas' => $tingkatan_kelas,
			'file_materi' => $new_file_name // Simpan nama file ke dalam array $data
		);

		// Simpan data materi ke dalam database menggunakan model
		$materiCreate = $this->materi_model->simpanMateri($data);

		// Jika penyimpanan materi berhasil, lanjutkan menyimpan soal
		if ($materiCreate) {
			$soal = $this->input->post('soal');
			$option_a = $this->input->post('option_a');
			$option_b = $this->input->post('option_b');
			$option_c = $this->input->post('option_c');
			$option_d = $this->input->post('option_d');
			$option_correct = $this->input->post('option_correct');

			// Simpan data soal ke dalam database menggunakan model
			for ($i = 0; $i < count($soal); $i++) {
				$soal_data = array(
					'id_materi' => $materiCreate, // Menggunakan ID materi yang baru saja dibuat
					'soal' => $soal[$i],
					'option_a' => $option_a[$i],
					'option_b' => $option_b[$i],
					'option_c' => $option_c[$i],
					'option_d' => $option_d[$i],
					'option_correct' => $option_correct[$i]
				);

				// Panggil model untuk menyimpan data soal
				$this->materi_model->simpanSoal($soal_data);
			}

			// Set pesan flash data jika berhasil
			$this->session->set_flashdata('message', 'Berhasil');
			redirect(base_url('admin/materi'));
		} else {
			// Set pesan flash data jika gagal
			$this->session->set_flashdata('abort', 'Gagal');
			redirect(base_url("admin/materi/add_materi/"));
		}


    }

	public function delete_materi($id)
	{

		$this->materi_model->delete($id);
		$this->session->set_flashdata('message', 'materi berhasil dihapus!');
		redirect(base_url('admin/materi/'));
	}
}
