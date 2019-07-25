<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadilan_surat extends CI_Model 
{
	public function surat_kejaksaan($id_surat = NULL)
	{
		if ($id_surat != NULL) {
			$this->db->select('tbl_kejaksaan.*, DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY) as tgl_jatuh_tempo,  DATEDIFF(DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY), CURDATE()) as selisih, tbl_users.*');
			$this->db->from('tbl_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
			$this->db->where(array('tbl_kejaksaan.id_surat' => $id_surat));
			return $this->db->get();
		}
		$this->db->select('tbl_kejaksaan.*, DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY) as tgl_jatuh_tempo,  DATEDIFF(DATE_ADD(tanggal_penahanan, INTERVAL 20 DAY), CURDATE()) as selisih');
		$this->db->from('tbl_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_kejaksaan.id_users_kejaksaan');
		$this->db->order_by('id_surat', 'ASC');
		return $this->db->get()->result();
	}

	public function cek_balas_surat($id_surat_balas)
	{
		$this->db->where('id_surat_balas', $id_surat_balas);
		$query = $this->db->get('tbl_balas_surat_kejaksaan');
		return $query;
	}	

	public function simpan($id_surat_balas)
	{
		$config['upload_path']          = './uploads/pengadilan';
	    $config['allowed_types']        = 'pdf|doc|docx|rtf';
	    $config['max_size']             = 0;
	    $config['max_width']            = 0;
	    $config['max_height']           = 0;

	    $this->load->library('upload', $config);

	    if (!empty($this->upload->do_upload('t_6')))
	    {
	        $t_6 = $this->upload->data();
	    }
	    if (!empty($this->upload->do_upload('t_7'))) 
	    {
	        $t_7 = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('t_10'))) 
	    {
	        $t_10 = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('p_29'))) 
	    {
	        $p_29 = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('p_31')))
	    {
	        $p_31  = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('p_32')))
	    {
	        $p_32  = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('p_42')))
	    {
	        $p_42  = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('p_48')))
	    {
	        $p_48  = $this->upload->data(); 
	    }
	    if (!empty($this->upload->do_upload('ba_17')))
	    {
	        $ba_17   = $this->upload->data(); 
	    }
        $post = $this->input->post(NULL, TRUE);
        $data = array('id_surat_balas'      => $post['id_surat_balas'],
        			  'id_users_pengadilan' => $this->session->userdata('id'),
        			  'id_users_kejaksaan'  => $post['id_users_kejaksaan'],
                      't_6'                 => $t_6['file_name'],
                      't_7'                 => $t_7['file_name'],
                      't_10'                => $t_10['file_name'],
                      'p_29'                => $p_29['file_name'],
                      'p_31'                => $p_31['file_name'],
                      'p_32'                => $p_32['file_name'], 
                      'p_42'                => $p_42['file_name'], 
                      'p_48'                => $p_48['file_name'], 
                      'ba_17'               => $ba_17['file_name'],
                  	  'tanggal_balas'		=> date('Y-m-d'), 
                  	  'notif'				=> 1);
        $query = $this->db->insert('tbl_balas_surat_kejaksaan', $data);
        if ($query) {
        	$this->db->where('id_surat', base64_decode($id_surat_balas));
        	$this->db->update('tbl_kejaksaan', array('status_balas' => 1 ));
	        return true;
        }
	}

	public function riwayat_balas($id_surat = NULL)
	{
		if ($id_surat != NULL) {
			$this->db->select('tbl_balas_surat_kejaksaan.*, tbl_kejaksaan.id_surat as id_surat, tbl_kejaksaan.nama_tersangka as nama_tersangka, tbl_kejaksaan.nama_jpu as nama_jpu,  tbl_kejaksaan.p_16 as p_16, tbl_kejaksaan.tanggal_penahanan as tanggal_penahanan, tbl_kejaksaan.tanggal_pelimpahan_p31 as tanggal_pelimpahan_p31, tbl_kejaksaan.tanggal_pelimpahan_p32 as tanggal_pelimpahan_p32, tbl_users.*');
			$this->db->from('tbl_balas_surat_kejaksaan');
			$this->db->join('tbl_users', 'tbl_users.id = tbl_balas_surat_kejaksaan.id_users_kejaksaan');
			$this->db->join('tbl_kejaksaan', 'tbl_kejaksaan.id_surat = tbl_balas_surat_kejaksaan.id_surat_balas');
			$this->db->where(array('tbl_balas_surat_kejaksaan.id_surat_balas' => $id_surat));
			return $this->db->get();
		}
		$this->db->select('*');
		$this->db->from('tbl_balas_surat_kejaksaan');
		$this->db->join('tbl_users', 'tbl_users.id = tbl_balas_surat_kejaksaan.id_users_kejaksaan');
		$this->db->join('tbl_kejaksaan', 'tbl_kejaksaan.id_surat = tbl_balas_surat_kejaksaan.id_surat_balas');
		$this->db->where('id_users_pengadilan', $this->session->userdata('id'));
		return $this->db->get()->result();
	}

	public function edit()
	{
		$post = $this->input->post(NULL, TRUE);
        $id_surat = $this->uri->segment(3);
        $file = $this->riwayat_balas(base64_decode($id_surat))->row();

        $config['upload_path']          = './uploads/pengadilan';
        $config['allowed_types']        = 'pdf|doc|docx|rtf';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;

        $this->load->library('upload', $config);
        
        if (!empty($this->upload->do_upload('t_6')))
        {
            $t_6 = $this->upload->data('file_name');
            $this->db->set('t_6', $t_6);
            @unlink('./uploads/pengadilan/'. $file->t_6);
        }
        if (!empty($this->upload->do_upload('t_7')))
        {
            $t_7 = $this->upload->data('file_name');
            $this->db->set('t_7', $t_7);
            @unlink('./uploads/pengadilan/'. $file->t_7);
        }
        if (!empty($this->upload->do_upload('t_10')))
        {
            $t_10 = $this->upload->data('file_name');
            $this->db->set('t_10', $t_10);
            @unlink('./uploads/pengadilan/'. $file->t_10);
        }
        if (!empty($this->upload->do_upload('p_29')))
        {
            $p_29 = $this->upload->data('file_name');
            $this->db->set('p_29', $p_29);
            @unlink('./uploads/pengadilan/'. $file->p_29);
        }
        if (!empty($this->upload->do_upload('p_31')))
        {
            $p_31 = $this->upload->data('file_name');
            $this->db->set('p_31', $p_31);
            @unlink('./uploads/pengadilan/'. $file->p_31);
        }
        if (!empty($this->upload->do_upload('p_32')))
        {
            $p_32 = $this->upload->data('file_name');
            $this->db->set('p_32', $p_32);
            @unlink('./uploads/pengadilan/'. $file->p_32);
        }
        if (!empty($this->upload->do_upload('p_42')))
        {
            $p_42 = $this->upload->data('file_name');
            $this->db->set('p_42', $p_42);
            @unlink('./uploads/pengadilan/'. $file->p_42);
        }
        if (!empty($this->upload->do_upload('p_48')))
        {
            $p_48 = $this->upload->data('file_name');
            $this->db->set('p_48', $p_48);
            @unlink('./uploads/pengadilan/'. $file->p_48);
        }
        if (!empty($this->upload->do_upload('ba_17')))
        {
            $ba_17 = $this->upload->data('file_name');
            $this->db->set('ba_17', $ba_17);
            @unlink('./uploads/pengadilan/'. $file->ba_17);
        }
		$this->db->where('id_surat_balas', base64_decode($id_surat));
		$this->db->update('tbl_balas_surat_kejaksaan', array('id_surat_balas' => $post['id_surat_balas']));
		return true;
	}
	public function hapus($id_surat_balas)
	{
		$this->db->where('id_surat_balas', $id_surat_balas);
		$delete = $this->db->delete('tbl_balas_surat_kejaksaan');
		if ($delete) {
			$this->db->where('id_surat', $id_surat_balas);
			$delete = $this->db->update('tbl_kejaksaan', array('status_balas' => 0 ));
			return true;
		}
	}
}
