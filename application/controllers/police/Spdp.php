<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spdp extends MY_Validate
{
	function __construct()
	{
		parent::__construct();
        check_session_police();
	}
	public function index()
	{	
        $this->load->library('encryption');  
	    $this->load->helper('text');
        $list = $this->M_history_spdp->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $field) 
        {
            $no++;
            $row = array();
            $row[] = '<td align="center"><input type="checkbox" class="checkbox" name="delete" value="'.$field->id.'"></td>';
            $row[] = $no;
            $row[] = $field->nama_tersangka;
            $row[] = character_limiter($field->rujukan, 20);
            $row[] =  '<i class="fa fa-calendar"></i> '. date('d-m-Y  H:i:s', strtotime($field->date));
            $row[] = $field->file;
            $row[] = '<td>
                        <a data-fancybox data-type="iframe" class="btn btn-info btn-xs" data-src="'.base_url('police/spdp/details/'.$field->id).'">
                            <i class="fa fa-eye"></i> View
                        </a>
                        <a class="btn btn-danger btn-xs removed" id="'.$this->encryption->encrypt($field->id).'"><i class="fa fa-remove"></i> Delete</a>
                        <a class="btn btn-warning btn-xs edit" id="'.$this->encryption->encrypt($field->id).'"><i class="fa fa-edit"></i> Edit</a>
                    </td>';  
            $data[] = $row;
        }
        
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_history_spdp->count_all(),
            "recordsFiltered" => $this->M_history_spdp->count_filtered(),
            "data" => $data,
        );
        //output format JSON
        echo json_encode($output);
    }

    public function create()
    {
        $this->template->load('pages/template/template','pages/police/form/content');      
    }

    public function store()
    {
        $this->input->is_ajax_request();
        $this->form_validation->set_rules('nama_tersangka', 'Nama tersangka', 'required');
        $this->form_validation->set_rules('no_pol', 'No Pol', 'required');
        $this->form_validation->set_rules('rujukan', 'Rujukan', 'required');
        $this->form_validation->set_rules('file', 'File', 'callback_file_check1|trim|xss_clean');

        if ($this->form_validation->run() === FALSE)
        {
            $result = array('nama_tersangka' => form_error('nama_tersangka'),
                           'no_pol' => form_error('no_pol'), 
                           'rujukan' => form_error('rujukan'),
                           'file' => form_error('file'),
                           'hash' => $this->security->get_csrf_hash()      
                        );     
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
        else
        {
            $config['upload_path']="./assets/spdp";
            $config['allowed_types']='gif|jpg|jpeg|png';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);

            $result = array('hash' => $this->security->get_csrf_hash());       
            $post   = $this->input->post(NULL, TRUE);          

            if($this->upload->do_upload('file'))
            {
                $data = array('upload_data' => $this->upload->data('file_name'));
                $result = array('success' => 'Data has been inserted', 
                                'newToken' => $this->security->get_csrf_hash());
            }
            else
            {
               $result = array('file' => 'Opps, Something error');
            }
            $url = bin2hex(openssl_random_pseudo_bytes(32));

            $insert = array('id_police' => $this->session->userdata('id'), 
                            'nama_tersangka' => $post['nama_tersangka'],
                            'no_pol' => $post['no_pol'],
                            'rujukan' => $_POST['rujukan'],
                            'file' => $data['upload_data'],
                            'url'  => $url);
            $notification = array('id_users' => $this->session->userdata('id'), 
                                  'type'     => 'spdp',
                                  'message'  => $post['nama_tersangka'],
                                  'url'      => $url, 
                                  'status'   => 'unread');
            $this->m_spdp->create($insert, $notification);
            $this->output->set_content_type('application/json')->set_output(json_encode($result));
        }
    }

    public function history()
    {
        $this->template->load('pages/template/template','pages/police/spdp/history/content');
    }

    public function delete_history()
    {   
        $this->load->library('encryption');    
        $post = $this->input->post(NULL, TRUE);
        $delete_file = $this->db->get_where('tbl_police', array('id' => $this->encryption->decrypt($post['id'])))->row();
        @unlink('./uploads/kepolisian/'. $file->spdp);

        $delete_data = $this->db->delete('tbl_police', array('id' => $this->encryption->decrypt($post['id']))); 
        if ($delete_data = TRUE) 
        {
            $this->m_pesan->generatePesan('berhasil', 'Data has been deleted!');
            $this->load->view('vendor/autoload.php');
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
                );
                $pusher = new Pusher\Pusher(
                '30c7051b6b50d432b7b9',
                'a7448f51e726240fe5df',
                '779476',
                $options
            );
            $data['message'] = 'deleted_spdp';
            $pusher->trigger('my-channel', 'my-event', $data);
        }       
    }

    public function details($id)
    {
        $this->load->library('pdf');
        $data['data'] = $this->db->get_where('tbl_police', array('id' => $id))->row();
        $this->pdf->generate('pages/police/history/report/content',  $data);
    }

    public function replied()
    {
        $this->template->load('pages/template/template','pages/police/spdp/replied/content');
    }

    public function get_replied()
    {   
        $this->load->model('m_replied_spdp');
        $list = $this->m_replied_spdp->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $field) 
        {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_tersangka;
            $row[] = $field->message;
            $row[] = '<i class="fa fa-user" aria-hidden="true"></i> '. $field->username .' ('. $field->level .')';
            $row[] = '<i class="fa fa-calendar"></i> '. date('d-m-Y  H:i:s', strtotime($field->date));
            $row[] = $field->file_reply;
            $row[] = '<td>
                        <a data-fancybox data-type="iframe" class="btn btn-success btn-xs " data-src="'.base_url('kepolisian/details/'.$field->id_spdp).'">
                            <i class="fa fa-eye"></i> View
                        </a>
                    </td>';  
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->m_replied_spdp->count_all(),
            "recordsFiltered" => $this->m_replied_spdp->count_filtered(),
            "data" => $data,
        );
        //output JSON
        echo json_encode($output);
    }
}


