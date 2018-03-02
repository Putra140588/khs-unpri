<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Admin extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Data Admin';
		$data['admin'] = $this->m_general->get_admin_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/admins/v_admin');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$nik = $this->input->post('nik');
		$check = $this->db->get_where('admins',array('nik'=>$nik))->result();
		if (count($check) > 0){
			$this->session->set_flashdata('info','Nik Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('admin/tambah'));
		}
		else
		{
			$data = $this->input->post();
			$res = $this->m_general->insertdata('admins',$data);
			
			//save login
			$simpan['id_user'] = $nik;
			$simpan['password'] = md5($nik);
			$simpan['kd_status'] = $this->input->post('kd_status');
			$simpan['nama_login'] = $this->input->post('nama_admin');
			$res = $this->m_general->insertdata('login',$simpan);
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan admin dosen berhasil!');
				redirect(base_url('admin/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Admin';	
		$data['status'] = $this->m_general->get_status_all();
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/admins/v_tambah_admin');
		
	}
	
	
	function edit($nik)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Admin';
		
		$data['status'] = $this->m_general->get_status_all();
		$admin = $this->m_general->get_edit_admin($nik);
		foreach ($admin->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/admins/v_edit_admin');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$nik = $this->input->post('nik');
		$data = $this->input->post();
		$res = $this->m_general->editdata('admins',$data,array('nik'=>$nik));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit Admin berhasil!');
			redirect(base_url('admin'));
		}
		
		
	}
	function delete($nik)
	{
		$this->m_security->getsecurity();
		
		
		$res = $this->m_general->deletedata('admins',array('nik'=>$nik));
		$res = $this->m_general->deletedata('login',array('id_user'=>$nik));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete Admin berhasil!');
			redirect(base_url('admin'));
		}
	}
}
