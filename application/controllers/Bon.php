<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bon extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->cek_coba_loggin();
		$this->lapas_cobamasuk_kepolisian();
		$this->superadmin_cobamasuk_kepolisian();
		$this->load->helper('file');
		$this->load->model('m_bon');
		$this->load->model('m_surat');
		$this->load->helper('date');
	}

	public function index()
	{
		$data['data'] = $this->m_bon->ambil_bon();
		$this->load->view('pages/bon/bon_balasan/index', $data);
	}

	public function form_bon()
	{
		$data['data'] = $this->m_bon->riwayat_bon();
		$this->load->view('pages/bon/form_bon/index', $data);
	}

	public function simpan()
	{

		$this->form_validation->set_rules('nama_tersangka','Nama tersangka','required', array('required' => 'Nama tersangka tidak Boleh Kosong!'));
		$this->form_validation->set_rules('file_pengajuan_bon', '', 'callback_file_pengajuan_bon');

		if ($this->form_validation->run() == FALSE) 
		{
			$this->form_bon();
		}
		else
		{
			$config['upload_path']          = './uploads/kepolisian/bon';
			$config['allowed_types']        = 'pdf|doc|docx';
			$config['max_size']             = 0;
			$config['max_width']            = 0;
			$config['max_height']           = 0;

			$this->load->library('upload', $config);
	
			if (!empty($this->upload->do_upload('file_pengajuan_bon')))
			{
				$file_pengajuan_bon = $this->upload->data();
			}
			
				$post = $this->input->post(NULL, TRUE);
				$data = array('id_users_pemohon' 			=> $this->session->userdata('id'),
							  'nama_tersangka'			=> $post['nama_tersangka'],
							  'file_pengajuan_bon'		=> $file_pengajuan_bon['file_name'],
							  'keterangan'				=> $post['keterangan']);

			$this->m_bon->simpan($data);	
			$this->session->set_flashdata('berhasil', '<div class="alert alert-success" role="alert">Bon berhasil di simpan dan terkirim!</div>');
			redirect(base_url('bon/form_bon'));			
		}
	}

	public function file_pengajuan_bon($str)
	{
        $allowed_mime_type_arr = array('application/pdf', 'application/msword');
        $mime = get_mime_by_extension($_FILES['file_pengajuan_bon']['name']);
        if($_FILES['file_pengajuan_bon']['name'])
        {
            if(in_array($mime, $allowed_mime_type_arr))
            {
                return true;
            }
            else
            {
                $this->form_validation->set_message('file_pengajuan_bon', 'Pilih file pengajuan bon hanya word atau pdf.');
                return false;
            }
        }
        else
        {
        	$this->form_validation->set_message('file_pengajuan_bon', 'file pengajuan bon tidak boleh kosong!');
            return false;
        }
    }

    public function get_autocomplete()
	{
		$get = $this->input->get('term', TRUE);
		if (isset($get)) {
		  	$result = $this->m_bon->autocomplete_bon($get);
		   	if (count($result) > 0) 
		   	{
		    	foreach ($result as $row)
		     		
		     	$arr_result[] = array(
					'label'	=> $row->nama_tersangka
				);
		     	echo json_encode($arr_result);	
		   	}
		}
	}	
}