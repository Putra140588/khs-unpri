<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Fakultas extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Fakultas';
		$data['fakultas'] = $this->m_general->get_fakultas_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/fakultas/v_fakultas');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$kd_fakultas = $this->input->post('kd_fakultas');
		$check = $this->db->get_where('fakultas',array('kd_fakultas '=>$kd_fakultas ))->result();
		
		if (count($check) > 0){
			$this->session->set_flashdata('info','Kode Fakultas Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('fakultas/tambah'));
		}
		else
		{
			$data = $this->input->post();
			$res = $this->m_general->insertdata('fakultas',$data);			
			
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan fakultas berhasil!');
				redirect(base_url('fakultas/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah fakultas';	
		$data['dosen'] = $this->m_general->get_dosen_all();
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/fakultas/v_tambah_fakultas');
		
	}
	
	
	function edit($id)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Fakultas';
		
		$data['dosen'] = $this->m_general->get_dosen_all();
		$dosen = $this->m_general->get_edit_fakultas($id);
		foreach ($dosen->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/fakultas/v_edit_fakultas');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$kd_fakultas = $this->input->post('kd_fakultas');
		$data = $this->input->post();
		$res = $this->m_general->editdata('fakultas',$data,array('kd_fakultas'=>$kd_fakultas));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit fakultas berhasil!');
			redirect(base_url('fakultas'));
		}		
		
	}
	function delete($id)
	{
		$this->m_security->getsecurity();
		
		
		$res = $this->m_general->deletedata('fakultas',array('kd_fakultas'=>$id));		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete fakultas berhasil!');
			redirect(base_url('fakultas'));
		}
	}
}
