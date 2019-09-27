<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();
        cek_coba_loggin();    
        superadmin_cobamasuk_notifikasi();
    }

    public function get_notify()
    {
        $this->m_notifikasi->notify_police();
        $this->m_notifikasi->notify_judicary();
    }

    // public function notification_police()
    // {
    // }
}