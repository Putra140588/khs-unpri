<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Jurusan extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Jurusan';
		$data['jurusan'] = $this->m_general->get_jurusan_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/jurusan/v_jurusan');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$kd_jurusan = $this->input->post('kd_jurusan');
		$check = $this->db->get_where('jurusan',array('kd_jurusan '=>$kd_jurusan ))->result();
		
		if (count($check) > 0){
			$this->session->set_flashdata('info','Kode Jurusan Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('jurusan/tambah'));
		}
		else
		{
			$data = $this->input->post();
			$res = $this->m_general->insertdata('jurusan',$data);			
			
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan jurusan berhasil!');
				redirect(base_url('jurusan/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Jurusan';	
		$data['dosen'] = $this->m_general->get_dosen_all();
		$data['fakultas'] = $this->m_general->get_fakultas();
		$this->load->view('v_home',$data);
		$this->load->view('admin/jurusan/v_tambah_jurusan');
		
	}
	
	
	function edit($id)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Fakultas';
		$data['fakultas'] = $this->m_general->get_fakultas_all();
		$data['dosen'] = $this->m_general->get_dosen_all();
		$jurusan= $this->m_general->get_edit_jurusan($id);
		foreach ($jurusan->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/jurusan/v_edit_jurusan');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$kd_jurusan = $this->input->post('kd_jurusan');
		$data = $this->input->post();
		$res = $this->m_general->editdata('jurusan',$data,array('kd_jurusan'=>$kd_jurusan));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit jurusan berhasil!');
			redirect(base_url('jurusan'));
		}		
		
	}
	function delete($id)
	{
		$this->m_security->getsecurity();
		
		
		$res = $this->m_general->deletedata('jurusan',array('kd_jurusan'=>$id));		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete jurusan berhasil!');
			redirect(base_url('jurusan'));
		}
	}
}
