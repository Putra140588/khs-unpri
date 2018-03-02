<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Status extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Status';
		$data['status'] = $this->m_general->get_status_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/status/v_status');
	}
	
	function simpan()
	{
		$this->m_security->getsecurity();
		$kd_status = $this->input->post('kd_status');
		$check = $this->db->get_where('status',array('kd_status'=>$kd_status))->result();
		if (count($check) > 0){
			$this->session->set_flashdata('info','Kode status Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('status/tambah'));
		}
		else
		{
			$data = $this->input->post();
			$res = $this->m_general->insertdata('status',$data);
			
			$sql = $this->m_general->get_all_modul();
			foreach ($sql->result() as $row)
			{
				$input['kd_status'] = $kd_status;
				$input['id_modul'] = $row->id_modul;
				$merge = array_merge($input);
				$res = $this->m_general->insertdata('akses',$input);
			}
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan status berhasil!');
				redirect(base_url('status/tambah'));
			}
		}
	}
	
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Status';	
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/status/v_tambah_status');
		
	}
	
	
	function edit($id)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Status';
		
		
		$status = $this->m_general->get_edit_status($id);
		foreach ($status->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/status/v_edit_status');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$kd_status = $this->input->post('kd_status');
		$data = $this->input->post();
		$res = $this->m_general->editdata('status',$data,array('kd_status'=>$kd_status));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit status berhasil!');
			redirect(base_url('status'));
		}
		
		
	}
	function delete($id)
	{
		$this->m_security->getsecurity();	
		
		$res = $this->m_general->deletedata('status',array('kd_status'=>$id));
		$res = $this->m_general->deletedata('akses',array('kd_status'=>$id));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete status berhasil!');
			redirect(base_url('status'));
		}
	}
}
