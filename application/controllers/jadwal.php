<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Jadwal extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Jadwal Perkuliahan';
		$data['jadwal'] = $this->m_general->get_jadwal_matkul();
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_mata_kuliah/v_jadwal_mk');
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		
		
			$data = $this->input->post();				
			if ($data['kd_fakultas'] == 'all' && $data['kd_jurusan'] == 'all')
			{
				$input['kd_mata_kuliah'] = $data['kd_mata_kuliah'];
				$input['id_dosen']= $data['id_dosen'];				
				$input['kd_kelas_program']= $data['kd_kelas_program'];
				$input['tahun_ajaran']= $data['tahun_ajaran'];
				$input['hari']= $data['hari'];
				$input['waktu_mulai']= $data['waktu_mulai'];
				$input['waktu_selesai']= $data['waktu_selesai'];
				$input['lokasi']= $data['lokasi'];
				$input['kelas']= $data['kelas'];
				
				$sql = $this->db->get('jurusan')->result();
				foreach ($sql as $row)
				{
					$merge['kd_fakultas'] = $row->kd_fakultas;
					$merge['kd_jurusan'] = $row->kd_jurusan;
					$inputmerge = array_merge($input,$merge);
					$res = $this->m_general->insertdata('jadwal_mata_kuliah',$inputmerge);
					
				}
			}
			else 
			{
				$res = $this->m_general->insertdata('jadwal_mata_kuliah',$data);
			}
			
			
			
			
			if ($res > 0)
			{
				$this->session->set_flashdata('info','Simpan jadwal perkuliahan berhasil!');
				redirect(base_url('jadwal/tambah'));
			}
		
	}
	function tambah()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Tambah Jadwal';	
		$data['dosen'] = $this->m_general->get_dosen_all();
		$data['kelas_program'] = $this->m_general->get_kelas_program();
		$data['fakultas'] = $this->m_general->get_fakultas(); 
		$data['matkul'] = $this->m_general->get_matakuliah_all(); 
		$data['lokasi'] = $this->m_general->get_lantai(); 
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_mata_kuliah/v_tambah_jadwal');
		
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
		$data['judul'] = 'Edit Jadwal Perkuliahan';
		$data['dosen'] = $this->m_general->get_dosen_all();
		$data['kelas_program'] = $this->m_general->get_kelas_program();
		$data['fakultas'] = $this->m_general->get_fakultas();
		$data['matkul'] = $this->m_general->get_matakuliah_all();
		$data['lokasi_kelas'] = $this->m_general->get_lantai();
		
		
		
		$jadwal = $this->m_general->get_edit_jadwal($id);
		foreach ($jadwal->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key] = $val;
			}		
		$kd_jurusan = $row->kd_fakultas;
		$data['jurusan'] = $this->m_general->get_jurusan($kd_jurusan);
		$id_kelas = isset($row->kelas);
		$data['ruang_kelas'] = $this->m_general->get_kelas($id_kelas);
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_mata_kuliah/v_edit_jadwal');
	
	}
	function simpan_edit()
	{
		$this->m_security->getsecurity();
		$kd = $this->input->post('kd_jadwal');
		$data = $this->input->post();
		$res = $this->m_general->editdata('jadwal_mata_kuliah',$data,array('kd_jadwal'=>$kd));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit Jadwal berhasil!');
			redirect(base_url('jadwal'));
		}
		
		
	}
	function delete($kd)
	{
		$this->m_security->getsecurity();		
		
		$res = $this->m_general->deletedata('jadwal_mata_kuliah',array('kd_jadwal'=>$kd));		
		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Delete jadwal berhasil!');
			redirect(base_url('jadwal'));
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
	
	function show_kelas()
	{
		$id = $this->input->post('id');
		$sql = $this->m_general->get_kelas($id);
		if ($sql->num_rows() > 0)
		{
			foreach ($sql->result() as $row)
			{
				echo '<option value="'.$row->id_kelas.'">'.$row->nama_kelas.'</option>';
			}
		}
		else
		{
			echo '<option="">N/A</option>';
		}
	
	}
}
