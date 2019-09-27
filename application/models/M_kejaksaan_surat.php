<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kejaksaan_surat extends CI_Model 
{
	function __construct()
	{
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'file'));
	}

    public function surat_balasan_pengadilan()
    {
        $this->db->select('*');
        $this->db->from('tbl_balas_surat_kejaksaan');
        $this->db->join('tbl_users', 'tbl_users.id = tbl_balas_surat_kejaksaan.id_users_pengadilan');
        $this->db->join('tbl_kejaksaan', 'tbl_kejaksaan.id_surat = tbl_balas_surat_kejaksaan.id_surat_balas');
        $this->db->where(array('tbl_balas_surat_kejaksaan.id_users_kejaksaan_balas' => $this->session->userdata('id')));
        return $this->db->get();
    }

	public function riwayat_surat($id_surat = NULL)
	{
		if ($id_surat != NULL) {
			// $this->db->select('*');
            $this->db->select('tbl_kejaksaan.*, tbl_users.*, DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY) as tgl_jatuh_tempo,  DATEDIFF(DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY), CURDATE()) as selisih');

			$this->db->from('tbl_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
			$this->db->where(array('tbl_kejaksaan.id_surat' => base64_decode($id_surat)));
			return $this->db->get();
		}
		// $this->db->select('*');
        $this->db->select('tbl_kejaksaan.*, tbl_users.*, DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY) as tgl_jatuh_tempo,  DATEDIFF(DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY), CURDATE()) as selisih');
        
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
		$this->db->where(array('tbl_kejaksaan.id_users_kejaksaan' => $this->session->userdata('id')));
        $this->db->order_by("id_surat", "desc");     
		return $this->db->get()->result();
	}	

    public function detail_balasan($id_surat = NULL)
    {
        if ($id_surat != NULL) {
            $this->db->select('tbl_balas_surat_kejaksaan.*, tbl_kejaksaan.nama_tersangka as nama_tersangka, tbl_kejaksaan.nama_jpu as nama_jpu, tbl_kejaksaan.tanggal_penahanan as tanggal_penahanan, tbl_kejaksaan.tanggal_pelimpahan_p31 as tanggal_pelimpahan_p31, tbl_kejaksaan.tanggal_pelimpahan_p32 as tanggal_pelimpahan_p32, tbl_users.username as username');
            $this->db->from('tbl_balas_surat_kejaksaan');
            $this->db->join('tbl_users', 'tbl_users.id = tbl_balas_surat_kejaksaan.id_users_pengadilan');
            $this->db->join('tbl_kejaksaan', 'tbl_kejaksaan.id_surat = tbl_balas_surat_kejaksaan.id_surat_balas');
            $this->db->where(array('tbl_balas_surat_kejaksaan.id_surat_balas' => $id_surat));
            return $this->db->get();
        }
    }
	public function simpan($data)
	{
		$this->db->insert('tbl_kejaksaan', $data);
		return true;
	}

	public function edit($id_surat)
	{
		$post = $this->input->post(NULL, TRUE);
        $config['upload_path']          = './uploads/kejaksaan';
        $config['allowed_types']        = 'pdf|doc|docx|rtf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        
        if (!empty($this->upload->do_upload('t_7')))
        {
            $t_7 = $this->upload->data('file_name');
            $this->db->set('t_7', $t_7);
            @unlink('./uploads/kejaksaan/'. $post['old_t_7']);
        }
        if (!empty($this->upload->do_upload('t_6')))
        {
            $t_6 = $this->upload->data('file_name');
            $this->db->set('t_6', $t_6);
            @unlink('./uploads/kejaksaan/'. $post['old_t_6']);
        }
        if (!empty($this->upload->do_upload('t_10')))
        {
            $t_10 = $this->upload->data('file_name');
            $this->db->set('t_10', $t_10);
            @unlink('./uploads/kejaksaan/'. $post['old_t_10']);
        }
        if (!empty($this->upload->do_upload('p_29')))
        {
            $p_29 = $this->upload->data('file_name');
            $this->db->set('p_29', $p_29);
            @unlink('./uploads/kejaksaan/'. $post['old_p_29']);
        }
        if (!empty($this->upload->do_upload('p_31')))
        {
            $p_31 = $this->upload->data('file_name');
            $this->db->set('p_31', $p_31);
            @unlink('./uploads/kejaksaan/'. $post['old_p_31']);
        }
        if (!empty($this->upload->do_upload('p_32')))
        {
            $p_32 = $this->upload->data('file_name');
            $this->db->set('p_32', $p_32);
            @unlink('./uploads/kejaksaan/'. $post['old_p_32']);
        }
        if (!empty($this->upload->do_upload('p_42')))
        {
            $p_42 = $this->upload->data('file_name');
            $this->db->set('p_42', $p_42);
            @unlink('./uploads/kejaksaan/'. $post['old_p_42']);
        }
        if (!empty($this->upload->do_upload('p_48')))
        {
            $p_48 = $this->upload->data('file_name');
            $this->db->set('p_48', $p_48);
            @unlink('./uploads/kejaksaan/'. $post['old_p_48']);
        }
        if (!empty($this->upload->do_upload('ba_17')))
        {
            $ba_17 = $this->upload->data('file_name');
            $this->db->set('ba_17', $ba_17);
            @unlink('./uploads/kejaksaan/'. $post['old_ba_17']);
        }
        $data = array('nama_tersangka'     		=> $post['nama_tersangka'],
                      'nama_jpu'            	=> $post['nama_jpu'],
                      'tanggal_penahanan'   	=> $post['tanggal_penahanan'],
                      'tanggal_pelimpahan_p31' 	=> $post['tanggal_pelimpahan_p31'],
                      'tanggal_pelimpahan_p32' 	=> $post['tanggal_pelimpahan_p32']);

        $this->db->where('id_surat', base64_decode($id_surat));
        $this->db->update('tbl_kejaksaan', $data);
        return true;
	}

	public function hapus($id_surat)
	{
		$this->db->where('id_surat', base64_decode($id_surat));
		$this->db->delete('tbl_kejaksaan');
		return true;
	}
}
