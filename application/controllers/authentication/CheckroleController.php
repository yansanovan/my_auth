<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CheckroleController extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('status')) 
		{
            $this->m_pesan->generatePesan('access_denied', 'denied!');
			redirect('auth');
		}
	}
	public function index()
	{
		$level   =  $this->session->userdata('level');
		if ($level == 'kepolisian') 
		{
            $this->m_pesan->generatePesan('access_denied', 'You are Police!');
			redirect('police/dashboard');
		}
		elseif ($level =='kejaksaan') 
		{
            $this->m_pesan->generatePesan('access_denied', 'You are prosecutor!');
			redirect('prosecutor/dashboard');
		}	
		elseif ($level =='pengadilan') 
		{
            $this->m_pesan->generatePesan('access_denied', 'You are Court!');
			redirect('court/dashboard');
		}	
		elseif ($level =='lapas') 
		{
            $this->m_pesan->generatePesan('access_denied', 'You are prison!');
			redirect('court/dashboard');
		}	
		elseif ($level =='superadmin') 
		{
            $this->m_pesan->generatePesan('access_denied', 'You are superadmin!');
			redirect('superadmin');
		}
	}

}

