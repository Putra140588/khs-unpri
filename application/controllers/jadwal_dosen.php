<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Jadwal_dosen extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Jadwal Dosen Tahun Ajaran '.$_SESSION['tahun'];
		$data['jadwal_dosen'] = $this->m_general->get_jadwal_dosen_bysemester();
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_dosen/v_jadwal_dosen');
	}
}