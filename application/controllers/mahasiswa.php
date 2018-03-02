<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Mahasiswa extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Data Mahasiswa';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/mahasiswa/v_mahasiswa');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$nim = $this->input->post('nim');
		$check = $this->db->get_where('mahasiswa',array('nim'=>$nim))->result();
		if (count($check) > 0){
			$this->session->set_flashdata('info','Nim Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('mahasiswa/tambah'));
		}
		else
		{
			$data = $this->input->post();			
			$res = $this->m_general->insertdata('mahasiswa',$data);
			
			//save login
			$simpan['id_user'] = $nim;
			$simpan['password'] = md5($nim);
			$simpan['kd_status'] = $this->input->post('kd_status');
			$simpan['nama_login'] = $this->input->post('nama_mahasiswa');
			$res = $this->m_general->insertdata('login',$simpan);
			
			
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan mahasiswa berhasil!');
				redirect(base_url('mahasiswa/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Mahasiswa';	
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_all();
		$data['jenjang'] = $this->m_general->get_jenjang();
		$data['fakultas'] = $this->m_general->get_fakultas();
		$data['kelas'] = $this->m_general->get_kelas_program();
		$data['status'] = $this->m_general->get_status_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/mahasiswa/v_tambah_mahasiswa');
		
	}
	
	public function show_jurusan()
	{
		$kd_fakultas = $this->input->post('kd_fakultas');
		$jurusan = $this->m_general->get_jurusan($kd_fakultas);
		if ($jurusan->num_rows() > 0)
		{
			foreach ($jurusan->result() as $row)
			{
				echo '<option value="'.$row->kd_jurusan.'">'.$row->jurusan.'</option>';
			}
		}
		else
		{
			echo '<option value="">N/A</option>';
		}
	}
	function edit($nim)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Mahasiswa';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_all();
		$data['jenjang'] = $this->m_general->get_jenjang();
		$data['fakultas'] = $this->m_general->get_fakultas();
		$data['kelas'] = $this->m_general->get_kelas_program();
		$data['status'] = $this->m_general->get_status_all();
		$mahasiswa = $this->m_general->get_edit_mahasiswa($nim);
		foreach ($mahasiswa->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/mahasiswa/v_edit_mahasiswa');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$nim = $this->input->post('nim');
		$data = $this->input->post();
		$res = $this->m_general->editdata('mahasiswa',$data,array('nim'=>$nim));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit mahasiswa berhasil!');
			redirect(base_url('mahasiswa'));
		}
		
		
	}
	function delete($nim)
	{
		$this->m_security->getsecurity();		
		
		$res = $this->m_general->deletedata('mahasiswa',array('nim'=>$nim));		
		$res = $this->m_general->deletedata('login',array('id_user'=>$nim));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete mahasiswa berhasil!');
			redirect(base_url('mahasiswa'));
		}
	}
	function akses($nim)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Data Akses';
		$data['akses'] = $this->m_general->get_akses($nim);
		echo "<pre>";print_r($data['akses']->result());die;
		$this->load->view('v_home',$data);
		$this->load->view('admin/mahasiswa/v_akses');
	}
}
