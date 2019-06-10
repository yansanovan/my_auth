<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        cek_coba_loggin();
        lapas_cobamasuk_kejaksaan();
        superadmin_cobamasuk_kejaksaan();
        $this->load->model('m_kepolisian');
        $this->load->model('m_kejaksaan');
        $this->load->model('m_pengadilan');
        $this->load->model('m_surat');      

    }

    public function kepolisian()
    {

       kejaksaan_cobamasuk_kepolisian();
       pengadilan_cobamasuk_kepolisian();

        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_kepolisian->update_notif();
            }
            $result = $this->m_kepolisian->fetch();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                    $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('kejaksaan').'">
                              <i class="fa fa-file text-aqua"></i> 
                                <strong>File Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Dibalas oleh : '.$value->username.' ( '.$value->level.' )</small><br />
                                <small>Tanggal balas : '.$value->tanggal_balas.'</small><br />
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
            $notif = $this->m_kepolisian->fetch_count();
            $count = count($notif);
            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

    public function kejaksaan()
    {
       kepolisian_cobamasuk_kejaksaan();
       pengadilan_cobamasuk_kejaksaan();

        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_kejaksaan->update_notif();
            }
            $result = $this->m_kejaksaan->fetch();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                     $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('kejaksaan').'">
                              <i class="fa fa-file text-aqua"></i> 
                                <strong>File Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Tanggal Posting : '.$value->pasal.'</small><br />
                            </a>
                          </li>
                        </ul>
                      </li>
                    ';
                }
            }
            else
            {
                $output .= '<li>
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                          <i class="fa fa-warning text-red"></i> Tidak ada notifikasi!
                                        </a>
                                    </li>
                                </ul>
                            </li>';
            }
            $hitung = $this->m_kejaksaan->fetch_2();
            $count = count($hitung);

            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }


    public function pengadilan()
    {
        kepolisian_cobamasuk_pengadilan();
        kejaksaan_cobamasuk_pengadilan();
        
        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_pengadilan->update_notif();
            }
            $result = $this->m_pengadilan->fetch();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                   $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('pengadilan').'">
                              <i class="fa fa-file text-aqua"></i> 
                                  <strong>'.$value->nama_tersangka.'</strong><br />
                                <small><em>'.$value->pasal.'</em></small>
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
            $result2 = $this->m_pengadilan->fetch_2();
            $count = count($result2);
            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

}