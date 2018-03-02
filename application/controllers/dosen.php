<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Dosen extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Data Dosen';
		$data['dosen'] = $this->m_general->get_dosen_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/dosen/v_dosen');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$nid = $this->input->post('nid');
		$check = $this->db->get_where('dosen',array('nid'=>$nid))->result();
		if (count($check) > 0){
			$this->session->set_flashdata('info','Nid Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('dosen/tambah'));
		}
		else
		{
			$data = $this->input->post();
			$res = $this->m_general->insertdata('dosen',$data);
			
			//save login
			$simpan['id_user'] = $nid;
			$simpan['password'] = md5($nid);
			$simpan['kd_status'] = $this->input->post('kd_status');
			$simpan['nama_login'] = $this->input->post('nama_dosen');
			$res = $this->m_general->insertdata('login',$simpan);
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan dosen berhasil!');
				redirect(base_url('dosen/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Dosen';	
		$data['status'] = $this->m_general->get_status_all();
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/dosen/v_tambah_dosen');
		
	}
	
	
	function edit($nid)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Dosen';
		
		$data['status'] = $this->m_general->get_status_all();
		$dosen = $this->m_general->get_edit_dosen($nid);
		foreach ($dosen->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/dosen/v_edit_dosen');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$nid = $this->input->post('nid');
		$data = $this->input->post();
		$res = $this->m_general->editdata('dosen',$data,array('nid'=>$nid));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit Dosen berhasil!');
			redirect(base_url('dosen'));
		}
		
		
	}
	function delete($nid)
	{
		$this->m_security->getsecurity();
		
		
		$res = $this->m_general->deletedata('dosen',array('nid'=>$nid));
		$res = $this->m_general->deletedata('login',array('id_user'=>$nid));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete Dosen berhasil!');
			redirect(base_url('dosen'));
		}
	}
}
