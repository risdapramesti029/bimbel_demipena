<?php

class Materi_model extends CI_Model
{
    public function simpanMateri($data) {
        $this->db->insert('xx_materi_', $data);
        return $this->db->insert_id(); // Mengembalikan ID materi yang baru saja disimpan
    }

	
    public function simpanSoal($data)
    {
		$this->db->insert('xx_soal', $data);
        return $this->db->insert_id(); // Mengembalikan ID materi yang baru saja disimpan
    }

	public function detail_materi($id)
	{
		$this->db->select('*');
		$this->db->from('xx_materi_');
		$this->db->where('id_materi', $id);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function detail_soal($id)
	{
		$this->db->select('*');
		$this->db->from('xx_soal');
		$this->db->where('id_materi', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete($id)
	{
		$this->db->where('id_materi', $id);
		$this->db->delete('xx_materi_');
		return true;
	}


}
