<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->m_security->getsecurity();
		
		$data['judul'] = 'Home';		
		
		$this->load->view('v_home', $data);
		$this->load->view('v_dashboard');
		$this->load->view('v_footer');
		
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
