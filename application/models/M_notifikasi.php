<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_notifikasi extends CI_Model 
{

	function notify_judicary()
	{
		$this->load->view('vendor/autoload.php');
		$this->db->select('*');
		$this->db->from('notification');
		$where = array('type'=> 'spdp', 'status' =>'1');
		$this->db->where($where);
		// $this->db->or_where('type', 'perpanjangan');
		// $this->db->or_where('type', 'pengiriman_berkas');
		$this->db->limit(5);
		$this->db->order_by('id', 'desc');				
		$result = $this->db->get();
        $output = '';

        if($result->num_rows() > 0)
        {
            foreach($result->result() as $value)
            {
                $output .= '
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="'.base_url('kepolisian').'">
                          <i class="fa fa-bell-o"></i> 
                           	<strong>'.$value->type.'</strong><br>
                            <small><i class="fa fa-time"></i>Message : '.$value->message.'</small><br />
                            <small>Date sent : '.date('d-m-Y H:i:s', strtotime($value->create_at)).'</small><br />
                        </a>
                      </li>
                    </ul>
                  </li>
                ';
            }
        }
        else
        {
            $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
        }

        $this->db->select('*');
		$this->db->from('notification');
		$where = array(
		  'type' => 'spdp',
		  'status'   => '1'
		);
		$this->db->where($where);
		// $this->db->or_where('status', '0');
		// $this->db->or_where('type', 'perpanjangan');
		// $this->db->or_where('type', 'pengiriman_berkas');
		$this->db->order_by('id', 'desc');				
		$notif = $this->db->get()->result();
        $count = count($notif);
        $data  = array(
            'notification'   => $output,
            'count_notification'   => $count
        );

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
        $pusher->trigger('aplikasi_terpadu', 'aplikasi_terpadu', $data);
	}


	function notify_police()
	{
		$this->db->select('*');
		$this->db->from('notification');
		$where = array(
			'type' => 'pengiriman_berkas'
		// 'status'   => '0'
		);
		$this->db->where($where);

		$this->db->or_where('type', 'perpanjangan');
		// $this->db->or_where('type', 'perpanjangan');
		// $this->db->or_where('type', 'pengiriman_berkas');
		$this->db->limit(5);
		$this->db->order_by('id', 'desc');				
		$result = $this->db->get();
        $output = '';

        if($result->num_rows() > 0)
        {
            foreach($result->result() as $value)
            {
                $output .= '
                  <li>
                    <ul class="menu">
                      <li>
                        <a href="'.base_url('kepolisian').'">
                          <i class="fa fa-bell-o"></i> 
                           <strong>'.$value->type.'</strong><br>
                            <small>Messsage : '.$value->message.'</small><br />
                            <small>Date sent : '.date('d-m-Y H:i:s', strtotime($value->create_at)).'</small><br />
                        </a>
                      </li>
                    </ul>
                  </li>
                ';
            }
        }
        else
        {
            $output .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
        }

        $this->db->select('*');
		$this->db->from('notification');
		// $where = array(
		//   'type' => 'pengiriman_berkas'
		//   // 'status'   => '0'
		// );
		// $this->db->where($where);
		// $this->db->or_where('status', '0');
		// $this->db->or_where('type', 'perpanjangan');
		$this->db->where('type', 'pengiriman_berkas');
		$this->db->or_where('type', 'perpanjangan');

		$this->db->order_by('id', 'desc');				
		$notif = $this->db->get()->result();
        $count = count($notif);
        $data  = array(
            'notification_police'   => $output,
            'count_notification_police'   => $count
        );
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
        $pusher->trigger('aplikasi_terpadu', 'aplikasi_terpadu', $data);
	}
	function notifikasi_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->join('tbl_notification','tbl_notification.id_surat_balasan =  tbl_kepolisian.id_data', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_notification.id_users_pembalas', 'LEFT');
		$this->db->where("id_polisi", $this->session->userdata('id'));
		$this->db->limit(5);
		$this->db->order_by("tanggal_balas", "desc");	
		return $this->db->get();
	}

	function update_notif_polisi()
	{
		$this->db->where('id_polisi', $this->session->userdata('id'));
		$this->db->update('tbl_notification', array('notif_balasan' => 1));
		return true;
	}

	function hitung_nofikasi_balasan_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_notification');
		$this->db->where("notif_balasan", 0);	
		$this->db->where(array('id_polisi' => $this->session->userdata('id')));	
		return $this->db->get()->result();
	}

	// Notifikasi surat dari polisi ke Kejaksaan
	function notifikasi_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->limit(5);
		$this->db->where('status_kj', 0);
		$this->db->order_by("id_data", "desc");		
		return $this->db->get();
	}

	function update_notif_kejakaan()
	{
		$notif = 1;
		$this->db->where('notif_kj', 0);
		$this->db->update('tbl_kepolisian', array('notif_kj' => $notif));
		return true;
	}

	function hitung_nofikasi_masuk_dari_polisi()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where("notif_kj", 0);		
		$this->db->order_by("id_data", "desc");		
		return $this->db->get()->result();
	}
	// pengadilan
	function notifikasi_pengadilan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->limit(5);
		$this->db->where('status_pn', 0);
		$this->db->order_by("id_data", "desc");		
		return $this->db->get();
	}

	function update_notif_pengadilan()
	{
		$notif = 1;
		$this->db->where('notif_pn', 0);
		$this->db->update('tbl_kepolisian', array('notif_pn' => $notif));
		return true;
	}

	function hitung_nofikasi_masuk_dari_polisi_ke_pn()
	{
		$this->db->select('*');
		$this->db->from('tbl_kepolisian');
		$this->db->where("notif_pn", 0);			
		return $this->db->get()->result();
	}

	// notifikasi surat dari kejaksaan ke pengadilan
	function surat_dari_kejaksaan_pengadilan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->limit(5);
		$this->db->where('status_balas', 0);
		$this->db->order_by("id_surat", "desc");		
		return $this->db->get();
	}

	function update_surat_dari_kejaksaan_pengadilan()
	{
		$notif = 1;
		$this->db->where('notifikasi_kirim', 0);
		$this->db->update('tbl_kejaksaan', array('notifikasi_kirim' => $notif));
		return true;
	}

	function hitung_surat_dari_kejaksaan_pengadilan()
	{
		$this->db->select('*');
		$this->db->from('tbl_kejaksaan');
		$this->db->where("notifikasi_kirim", 0);			
		return $this->db->get()->result();
	}

	// notifikasi surat balasan dari pengadilan ke kejaksaan
	function notifikasi_surat_balasan_dari_pengadilan_ke_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_surat_kejaksaan');
		$this->db->join('tbl_kejaksaan','tbl_kejaksaan.id_surat =  tbl_balas_surat_kejaksaan.id_balas', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_surat_kejaksaan.id_users_pengadilan', 'LEFT');
		$this->db->limit(5);
		$this->db->where("notif", 1);
		$this->db->where("id_users_kejaksaan_balas", $this->session->userdata('id'));
		$this->db->order_by("id_balas", "desc");		
		return $this->db->get();
	}

	function update_notifikasi_surat_pn_ke_kj()
	{
		$notif = 1;
		$this->db->where('notif', 0);
		$this->db->update('tbl_balas_surat_kejaksaan', array('notif' => $notif));
		return true;
	}

	function hitung_surat_balasan_dari_pengadilan_ke_kejaksaan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_surat_kejaksaan');
		$this->db->where("notif", 0);		
		$this->db->order_by("id_balas", "desc");		
		return $this->db->get()->result();
	}

	// lapas
	function notif_bon_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->join('tbl_users','tbl_users.id = tbl_bon.id_users_pemohon', 'LEFT');
		$this->db->limit(5);
		$this->db->where('status_balas', 0);
		$this->db->order_by("id_bon", "desc");		
		return $this->db->get();
	}
	function update_notif_bon_lapas()
	{
		$this->db->where('notif_status', 0);
		$this->db->update('tbl_bon', array('notif_status' => 1));
		return true;
	}
	function hitung_notif_bon_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_bon');
		$this->db->where("notif_status", 0);		
		$this->db->order_by("id_bon", "desc");		
		return $this->db->get()->result();
	}

	// Bon balasan 
	function notif_bon_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->join('tbl_bon','tbl_bon.id_bon =  tbl_balas_bon.id_bon_balasan', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_bon.id_users_lapas', 'LEFT');
		$this->db->limit(5);
		$this->db->where("notif_bon_balasan", 1);
		$this->db->where("id_users_pemohon_balasan", $this->session->userdata('id'));
		$this->db->order_by("tanggal_balas_bon", "desc");		
		return $this->db->get();
	}

	function update_notif_bon_balasan()
	{
		$this->db->where('id_users_pemohon_balasan', $this->session->userdata('id'));
		$this->db->update('tbl_balas_bon', array('notif_bon_balasan' => 1));
		return true;
	}

	function hitung_notif_bon_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_bon');
		$this->db->where("notif_bon_balasan", 0);
		$this->db->where('id_users_pemohon_balasan', $this->session->userdata('id'));		
		$this->db->order_by("id", "desc");		
		return $this->db->get()->result();
	}

	// lapas
	function notif_apl_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_apl');
		$this->db->join('tbl_users','tbl_users.id = tbl_apl.id_users_apl', 'LEFT');
		$this->db->limit(5);
		$this->db->where('status_balas', 0);
		$this->db->order_by("id_apl", "desc");		
		return $this->db->get();
	}
	function update_notif_apl_masuk_ke_lapas()
	{
		$this->db->where('notif_status', 0);
		$this->db->update('tbl_apl', array('notif_status' => 1));
		return true;
	}
	function hitung_notif_apl_masuk_ke_lapas()
	{
		$this->db->select('*');
		$this->db->from('tbl_apl');
		$this->db->where("notif_status", 0);		
		$this->db->order_by("id_apl", "desc");		
		return $this->db->get()->result();
	}

	// apl balasan 
	function notif_apl_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_apl');
		$this->db->join('tbl_apl','tbl_apl.id_apl =  tbl_balas_apl.id_apl_balasan', 'LEFT');
		$this->db->join('tbl_users','tbl_users.id = tbl_balas_apl.id_users_lapas', 'LEFT');
		$this->db->limit(5);
		$this->db->where("notif_apl_balasan", 1);
		$this->db->where("id_users_pemohon", $this->session->userdata('id'));
		$this->db->order_by("tanggal_balas_apl", "desc");		
		return $this->db->get();
	}

	function update_notif_apl_balasan()
	{
		$this->db->where('id_users_pemohon', $this->session->userdata('id'));
		$this->db->update('tbl_balas_apl', array('notif_apl_balasan' => 1));
		return true;
	}

	function hitung_notif_apl_balasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_balas_apl');
		$this->db->where("notif_apl_balasan", 0);
		$this->db->where('id_users_pemohon', $this->session->userdata('id'));		
		$this->db->order_by("id_apl", "desc");		
		return $this->db->get()->result();
	}
}