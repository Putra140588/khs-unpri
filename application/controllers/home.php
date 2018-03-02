<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->m_security->getsecurity();
		
		$data['judul'] = 'Home';		
		
		$this->load->view('v_home', $data);
		$this->load->view('v_dashboard');
		
		
	}
	function error_krs()
	{
		$this->m_security->getsecurity();
		
		$this->load->view('v_home');
		$this->load->view('admin/krs/v_error_page');
	}
	

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
	
	function error_page()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Halaman tidak dapat diakses !';		
		$this->load->view('v_home',$data);
		$this->load->view('v_error_page');
	}
}
