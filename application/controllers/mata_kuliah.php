<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Mata_kuliah extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Mata Kuliah';
		$data['matkul'] = $this->m_general->get_matakuliah_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/mata_kuliah/v_mata_kuliah');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		$kd = $this->input->post('kd_mata_kuliah');
		$check = $this->db->get_where('mata_kuliah',array('kd_mata_kuliah'=>$kd))->result();
		if (count($check) > 0){
			$this->session->set_flashdata('info','Kode Mata Kuliah Sudah Terdaftar, Silahkan masukan lagi!');
			redirect(base_url('mata_kuliah/tambah'));
		}
		else
		{
			$data = $this->input->post();			
			$res = $this->m_general->insertdata('mata_kuliah',$data);			
			
			
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan mata kuliah berhasil!');
				redirect(base_url('mata_kuliah/tambah'));
			}
		}
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Mata Kuliah';	
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/mata_kuliah/v_tambah_mata_kuliah');
		
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
	function edit($id)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Edit Mata Kuliah';
		
		$matkul = $this->m_general->get_edit_mata_kuliah($id);
		foreach ($matkul->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/mata_kuliah/v_edit_mata_kuliah');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$kd = $this->input->post('kd_mata_kuliah');
		$data = $this->input->post();
		$res = $this->m_general->editdata('mata_kuliah',$data,array('kd_mata_kuliah'=>$kd));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit mata kuliah berhasil!');
			redirect(base_url('mata_kuliah'));
		}
		
		
	}
	function delete($kd)
	{
		$this->m_security->getsecurity();		
		
		$res = $this->m_general->deletedata('mata_kuliah',array('kd_mata_kuliah'=>$kd));		
		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete mata kuliah berhasil!');
			redirect(base_url('mata_kuliah'));
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
