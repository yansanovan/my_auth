<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        check_is_logged();    
        superadmin_cobamasuk_notifikasi();
    }

    public function judicary()
    {
        $read = $this->input->post('read', TRUE);
        if ($read) 
        {
            $this->m_notifikasi->read_notification($read);
        }
        $count = count($this->m_notifikasi->notification_judicary($limit = '', $status = 'status', $unread = 'unread'));
        if ($count <= 0) 
        {
            $count = '';
        }
        $data = array('count' => $count, 'data' =>  $this->m_notifikasi->notification_judicary($limit = 5));
        echo json_encode($data);
    }

    public function police()
    {
        $read = $this->input->post('read', TRUE);
        if ($read) 
        {
            $this->m_notifikasi->read_notification_police($read);
        }
        $count = count($this->m_notifikasi->notification_police($limit = NULL, $where = array('id_police' => $this->session->userdata('id'), 'status_read' => 'unread')));
        if ($count <= 0) {
            $count = '';
        }
        $data = array('count' => $count, 
                      'data' =>  $this->m_notifikasi->notification_police($limit = 5, $where = array('id_police' => $this->session->userdata('id'))));
        echo json_encode($data);
    }
}