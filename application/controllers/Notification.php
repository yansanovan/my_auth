<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller 
{
    public function judicary()
    {
        check_session_prosecutor();
        $read = $this->input->post('read', TRUE);
        if ($read) 
        {
            $this->m_notification->read_notification($read);
        }
        $count = count($this->m_notification->notification_judicary($limit = '', $status = 'status', $unread = 'unread'));
        if ($count <= 0) 
        {
            $count = '';
        }
        $data = array('count' => $count, 'data' =>  $this->m_notification->notification_judicary($limit = 5));
        echo json_encode($data);
    }

    public function police()
    {
        check_session_police();
        $read = $this->input->post('read', TRUE);
        if ($read) 
        {
            $this->m_notification->read_notification_police($read);
        }
        $count = count($this->m_notification->notification_police($limit = NULL, $where = array('id_police' => $this->session->userdata('id'), 'status_read' => 'unread')));
        if ($count <= 0) 
        {
            $count = '';
        }
        $data = array('count' => $count, 
                      'data' =>  $this->m_notification->notification_police($limit = 5, $where = array('id_police' => $this->session->userdata('id'))));
        echo json_encode($data);
    }
}