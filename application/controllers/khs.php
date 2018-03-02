<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Khs extends CI_Controller {
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Input Nilai Mahasiswa';
		$code = 'input_nilai';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_krs($code);
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/input_nilai/v_input_nilai');
	}
}