<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inbox extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		check_session_prosecutor();
	}
	public function index()
	{
        $this->template->load('pages/template/template','pages/kejaksaan/inbox/content');    
	}

	public function spdp_inbox()
    {
        $this->template->load('pages/template/template','pages/kejaksaan/inbox/spdp/content');
    }

    public function get_data()
    {   
		$this->load->model('M_history_spdp');

        $list = $this->M_history_spdp->get_datatables();
        $data = array();
        $no = $this->input->post('start');
        foreach ($list as $field) {

            if ($field->status_reply == 0) {
                $status = ' <span class="label label-danger">unreply</span>';
                $datatarget = '#modal_reply_spdp';
                $fa_icon = 'unlock';
                $btn_color = 'danger';
                $text = 'Unreply';
            }
            else
            {
                $fa_icon = 'lock';
                $btn_color = 'success';
                $text = 'Replied';
                $status = ' <span class="label label-success">replied</span>';
                $datatarget = '';
            }
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $field->nama_tersangka;
            $row[] = $field->file;
            $row[] = $field->date;
            $row[] =    '<td>
                            <a data-fancybox data-type="iframe" class="btn btn-success btn-xs" data-src="'.base_url('inbox/details/'.$field->id).'">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <a class="btn btn-'.$btn_color.' btn-xs reply_spdp" id="check_status" data-toggle="modal" data-target="'.$datatarget.'"  data-id="'.$field->id.'" data-id_police="'.$field->id_police.'" data-status_reply="'.$field->status_reply.'">
                                <i class="fa fa-'.$fa_icon.'"></i> '. $text.'</a>
                        </td>';  
            $data[] = $row;
        }
 
        $output = array(
            "draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_history_spdp->count_all(),
            "recordsFiltered" => $this->M_history_spdp->count_filtered(),
            "data" => $data,
        );

        $csrf_hash = $this->security->get_csrf_hash();  
        $output['hash'] = $csrf_hash;   
        echo json_encode($output);
    }

    public function details($id)
    {
        $this->load->library('pdf');
        $data['data'] = $this->db->get_where('tbl_police', array('id' => $id))->row();
        $this->pdf->generate('pages/kepolisian/history/report/content',  $data);
    }
	public function perpanjangan_penahanan_inbox()
	{
		$data['data'] = $this->db->get('tbl_perpanjangan_penahanan')->result();
        $this->template->load('pages/template/template','pages/kejaksaan/inbox/perpanjangan_penahanan/content', $data);    
	}
}

