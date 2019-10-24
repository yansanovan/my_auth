<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model 
{

	function read_notification($read)
	{
        $this->db->set('status', $read);
        $this->db->where('status', 'unread');
        $this->db->update('notification');
        return true;
    }

    function notification_judicary($limit= '', $status = '', $unread = '')
    {
        if ($status == 'status' && $unread == 'unread') {
            $this->db->where($status, $unread);
            $this->db->where_in('type', ['spdp','perpanjangan penahanan', 'pengiriman berkas perkara']);
        }
        if ($limit > 0) {
            $this->db->where_in('type', ['spdp','perpanjangan penahanan', 'pengiriman berkas perkara']);
            $this->db->limit($limit);
        }
        $this->db->order_by('id', 'desc');              
        return $result = $this->db->get('notification')->result();
    }

    function notification_police($limit ='', $where = array())
    {
        $this->db->select('*');
        $this->db->from('tbl_reply_spdp');
        $this->db->join('notification','notification.url = tbl_reply_spdp.url_notification');
        if ($where) 
        {
            $this->db->where($where);
        }
        if ($limit > 0) {
            $this->db->where_in('type', ['reply spdp']);
            $this->db->limit($limit);
        }
        $this->db->order_by('id', 'desc');              
        return $result = $this->db->get()->result();
    }


    function read_notification_police($read)
    {
        $this->db->set('status_read', $read);
        $this->db->where('id_police', $this->session->userdata('id'));
        $this->db->update('tbl_reply_spdp');
        return true;
    }
}
// function count_notification_police()
// {
//     $where = array('id_police' => $this->session->userdata('id'),
//                     'status_read' => 'unread');
//     $this->db->select('*');
//     $this->db->from('tbl_reply_spdp');
//     $this->db->join('notification','notification.url = tbl_reply_spdp.url_notification');
//     $this->db->where($where);
//     $this->db->where_in('type', ['reply spdp']);
//     $this->db->order_by('id', 'desc');              
//     $result = $this->db->get()->result();
//     return $result;
// }
// $count_spdp = count($this->db->get_where('notification',  array('type' => 'spdp'))->result());
// $count_perpanjangan_penahanan = count($this->db->get_where('notification', array('type' => 'perpanjangan penahanan' ))->result());
// $count_pengiriman_berkas_perkara = count($this->db->get_where('notification', array('type' => 'Pengiriman Berkas Perkara' ))->result());
// 'count_spdp' => $count_spdp,
// 'count_perpanjangan_penahanan' => $count_perpanjangan_penahanan,
// 'count_pengiriman_berkas_perkara' => $count_pengiriman_berkas_perkara,