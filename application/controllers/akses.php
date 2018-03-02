<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Akses extends CI_Controller {
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Akses';
		$data['status'] = $this->m_general->get_status_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/akses/v_akses');
	}
	function modul($id)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Modul Akses';
		$data['kd_status'] = $id;
		$data['modul'] = $this->m_general->get_modul_akses($id);
		$this->load->view('v_home',$data);
		$this->load->view('admin/akses/v_modul_akses');
	}
	
	function edit_akses()
	{
		$val = $this->input->post('val');
		$check = $this->input->post('check');
		
		$res = $this->db->update('akses',array('active'=>$check),array('id_akses'=>$val));
		if ($res > 0)
		{
			echo 1;	
		}
		
	}
	function edit_akses_all()
	{
		$val = $this->input->post('val');
		$check = $this->input->post('check');
	
		$res = $this->db->update('akses',array('active'=>$check),array('kd_status'=>$val));
		if ($res > 0)
		{
			echo 1;
		}
	
	}
	
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Akses';
		$data['status'] = $this->m_general->get_status_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/akses/v_akses');
	}
	
	
}