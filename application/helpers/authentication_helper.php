<?php defined('BASEPATH') OR exit('No direct script access allowed');

	function check_session_superadmin()
	{
		$ci =& get_instance();
		if($ci->session->userdata('level') !='superadmin' AND $ci->session->userdata('status') != 'logged') 
        {
            $ci->m_pesan->generatePesan('access_denied', 'Access denied!');
            redirect('auth');
        }
        if ($ci->session->userdata('level') != 'superadmin'  AND $ci->session->userdata('status') == 'logged') 
        {
            redirect('authentication/checkrolecontroller');
        }
	}

	function check_session_police()
	{
		$ci =& get_instance();
		if($ci->session->userdata('level') !='kepolisian' AND $ci->session->userdata('status') != 'logged') 
        {
            $ci->m_pesan->generatePesan('access_denied', 'Access denied!');
            redirect('auth');
        }
        if ($ci->session->userdata('level') != 'kepolisian'  AND $ci->session->userdata('status') == 'logged') 
        {
            redirect('authentication/checkrolecontroller');
        }
	}

	function check_session_prosecutor()
	{
		$ci =& get_instance();
		if($ci->session->userdata('level') !='kejaksaan' AND $ci->session->userdata('status') != 'logged') 
        {
            $ci->m_pesan->generatePesan('access_denied', 'Access denied!');
            redirect('auth');
        }
        if ($ci->session->userdata('level') != 'kejaksaan'  AND $ci->session->userdata('status') == 'logged') 
        {
            redirect('authentication/checkrolecontroller');
        }
	}

	function check_session_court()
	{
		$ci =& get_instance();
		if($ci->session->userdata('level') !='pengadilan' AND $ci->session->userdata('status') != 'logged') 
        {
            $ci->m_pesan->generatePesan('access_denied', 'Access denied!');
            redirect('auth');
        }
        if ($ci->session->userdata('level') != 'pengadilan') 
        {
            redirect('authentication/checkrolecontroller');
        }
	}

	function check_session_prison()
	{
		$ci =& get_instance();
		if($ci->session->userdata('level') !='lapas' AND $ci->session->userdata('status') != 'logged') 
        {
            $ci->m_pesan->generatePesan('access_denied', 'Access denied!');
            redirect('auth');
        }
        if ($ci->session->userdata('level') != 'lapas') 
        {
            redirect('authentication/checkrolecontroller');
        }
	}

	// check all users if they want access login page through url, if they still logged, redirect to dashboard
	function check_logout()
	{
        $ci =& get_instance();
		if ($ci->session->userdata('status') == 'logged') 
		{
			if ($ci->session->userdata('level') =='kepolisian') 
			{
				$ci->m_pesan->generatePesan('access_denied', 'Access denied');
				redirect('police/dashboard');
			}
			elseif ($ci->session->userdata('level') =='kejaksaan') 
			{
				$ci->m_pesan->generatePesan('access_denied', 'you must logout');
				redirect('prosecutor/dashboard');
			}
			elseif ($ci->session->userdata('level') =='pengadilan') 
			{
				$ci->m_pesan->generatePesan('access_denied', 'Access denied');
				redirect('court/dashboard');
			}
			elseif ($ci->session->userdata('level') =='lapas') 
			{
				$ci->m_pesan->generatePesan('access_denied', 'Access denied');
				redirect('prison/dashboard');
			}
			elseif ($ci->session->userdata('level') =='superadmin') 
			{
				$ci->m_pesan->generatePesan('access_denied', 'Access denied');
				redirect('superadmin');
			}
		}
	}
