<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        cek_coba_loggin();
        superadmin_cobamasuk_notifikasi();
        $this->load->model('m_notifikasi');        
        $this->load->model('m_surat');    
    }

    public function kepolisian()
    {
       kejaksaan_cobamasuk_kepolisian();
       pengadilan_cobamasuk_kepolisian();
       lapas_cobamasuk_kepolisian();

        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notif_polisi();
            }
            $result = $this->m_notifikasi->notifikasi_polisi();
            
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
                              <i class="fa fa-envelope"></i> 
                                <strong>Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Surat Anda Dibalas oleh : '.$value->username.' ( '.$value->level.' )</small><br />
                                <small>Tanggal balas : '.date('d-m-Y', strtotime($value->tanggal_balas)).'</small><br />
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
            $notif = $this->m_notifikasi->hitung_nofikasi_balasan_polisi();
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
        lapas_cobamasuk_kejaksaan();
        kepolisian_cobamasuk_kejaksaan();
        pengadilan_cobamasuk_kejaksaan();

        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notif_kejakaan();
            }
            $result = $this->m_notifikasi->notifikasi_kejaksaan();
            
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
                                <i class="fa fa-envelope"></i>  
                                <strong>Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Anda menerima surat dari Polisi</small><br />
                                <small>Tanggal Posting : <i class="fa fa-calendar"></i> ' .date('d-m-Y', strtotime($value->tanggal_posting)).'</small><br />
                                <small>Pasal : '.$value->pasal.'</small><br />
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
            $hitung = $this->m_notifikasi->hitung_nofikasi_masuk_dari_polisi();
            $count = count($hitung);

            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }


    public function test()
    {
        lapas_cobamasuk_kejaksaan();
        kepolisian_cobamasuk_kejaksaan();
        pengadilan_cobamasuk_kejaksaan();

        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notifikasi_surat_pn_ke_kj();
            }
            $result = $this->m_notifikasi->notifikasi_surat_pn_ke_kj();
            
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
                                <i class="fa fa-envelope"></i>  
                                <strong>Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Anda menerima surat dari Polisi</small><br />
                                <small>Tanggal Posting : <i class="fa fa-calendar"></i> ' .date('d-m-Y', strtotime($value->tanggal_posting)).'</small><br />
                                <small>Pasal : '.$value->pasal.'</small><br />
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
            $hitung = $this->m_notifikasi->hitung_notifikasi_surat_pn_ke_kj();
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
        lapas_cobamasuk_pengadilan();
        
        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notif_pengadilan();
            }
            $result = $this->m_notifikasi->notifikasi_pengadilan();
            
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
                                  <i class="fa fa-envelope"></i> 
                                    <strong>Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                    <small>Polisi Mengirimkan Surat </small><br />
                                    <small>Pasal : '.$value->pasal.'</small><br />
                                    <small>Tanggal Kirim : <i class="fa fa-calendar"></i> '.date('d-m-Y', strtotime($value->tanggal_posting)).'</small><br />
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
            $result2 = $this->m_notifikasi->hitung_nofikasi_masuk_dari_polisi_ke_pn();
            $count = count($result2);
            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count
            );
            echo json_encode($data);
        }
    }

    public function lapas()
    {
        kepolisian_cobamasuk_lapas();
        kejaksaan_cobamasuk_lapas();
        pengadilan_cobamasuk_lapas();
        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notif_bon_lapas();
            }
            $result = $this->m_notifikasi->notif_bon_masuk_ke_lapas();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                     $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('lapas').'">
                                <i class="fa fa-envelope"></i>  
                                 <strong>Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Username : '.$value->username.' ('.$value->level.')</small><br>
                                <small>Tanggal Permintaan : <i class="fa fa-calendar"></i> '. date('d-m-Y',strtotime($value->tanggal_posting)).'</small><br />
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

            $hitung = $this->m_notifikasi->hitung_notif_bon_masuk_ke_lapas();
            $count = count($hitung);

            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count,
            );
            echo json_encode($data);
        }
    }

    public function bon_balasan()
    {
        if(isset($_POST["view"]))
        {
            if($_POST["view"] != '')
            {
                $this->m_notifikasi->update_notif_bon_balasan();
            }
            $result = $this->m_notifikasi->notif_bon_balasan();
            
            $output = '';

            if($result->num_rows() > 0)
            {
                foreach($result->result() as $value)
                {
                     $output .= '
                      <li>
                        <ul class="menu">
                          <li>
                            <a href="'.base_url('bon').'">
                             <strong><i class="fa fa-envelope"></i> Nama Tersangka : '.$value->nama_tersangka.'</strong><br>
                                <small>Bon Anda Dibalas oleh : '.$value->username.' ( '.$value->level.' )</small><br />
                            <small>Tanggal Balas Bon : <i class="fa fa-calendar"></i> '. date('d-m-Y',strtotime($value->tanggal_balas_bon)).'</small><br />
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

            $hitung = $this->m_notifikasi->hitung_notif_bon_balasan();
            $count = count($hitung);

            $data  = array(
                'notification'   => $output,
                'unseen_notification' => $count,
            );
            echo json_encode($data);
        }
    }
}