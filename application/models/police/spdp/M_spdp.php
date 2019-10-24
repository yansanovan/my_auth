<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_spdp extends CI_Model 
{
	public function create($insert, $notification)
	{
        $this->db->set('date', 'NOW()', FALSE);
        $this->db->insert('tbl_police', $insert);

        $this->db->insert('notification', $notification);  
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
        $data['message'] = 'success';
        $pusher->trigger('my-channel', 'my-event', $data);
        return true;
	}
}
