<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		(!$this->session->userdata('login')) ? '' : redirect(base_url('home'));
		$this->load->view('v_login');
	}

	public function getlogin() {
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->load->model('m_login');
		$this->m_login->getlogin($u, $p);
	}
}
