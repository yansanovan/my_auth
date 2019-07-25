<?php
if($this->session->userdata('level') =='kepolisian') {
	$this->load->view('pages/dashboard/kepolisian/content');
}
if($this->session->userdata('level') =='kejaksaan') {
	$this->load->view('pages/dashboard/kejaksaan/content');
}
if($this->session->userdata('level') =='pengadilan') {
	$this->load->view('pages/dashboard/pengadilan/content');
}
if($this->session->userdata('level') =='lapas') {
	$this->load->view('pages/dashboard/lapas/content');
}