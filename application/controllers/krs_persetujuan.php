<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Krs_persetujuan extends CI_Controller {
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Persetujuan KRS';
		$code = 'krs';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_krs($code);
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs_persetujuan/v_krs_persetujuan');
	}
	function detail($nim,$semester,$dosen)
	{
		$this->m_security->getsecurity();
	
		$data['judul'] = 'Detail KRS yang diambil :';
		$data['krs_detail'] = $this->m_general->get_krs_detail($nim,$semester);
		$total_sks = $this->m_general->get_total_sks($nim,$semester);
		$data['total_sks'] = $total_sks[0]->total_sks;
	
		
		$sql = $this->m_general->get_mahasiswa($nim,$semester);
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
		//data by ipk table acktual
		$semester_before = $semester - 1;
		$get_ipk_recomend = $this->m_general->get_sks_recomend_krs($nim,$semester_before);
		$data['sks_recomend'] = isset($get_ipk_recomend[0]->sks_recomend) ? $get_ipk_recomend[0]->sks_recomend : $_SESSION['sks_recomend'];
		$data['dosen'] = $dosen;
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs_persetujuan/v_krs_persetujuan_detail');
	}
	function setuju($nim,$semester,$dosen)
	{
		
		$this->m_security->getsecurity();
		$where = array('nim'=>$nim,'semester'=>$semester);
		
		//semester yang akan ditempuh
		if ($dosen == 'kajur')
		{
			$res = $this->m_general->editdata('krs_persetujuan',array('status_setuju_kajur'=>1),$where);
			
		}
		else
		{
			$res = $this->m_general->editdata('krs_persetujuan',array('status_setuju_dekan'=>1),$where);
			$res = $this->m_general->editdata('krs',array('keterangan'=>1,'semester'=>$semester),$where);
		}
		if ($res > 0)
		{
			$this->session->set_flashdata('info','KRS Berhasil disetujui!');
			redirect(base_url('krs_persetujuan/detail/'.$nim.'/'.$semester.'/'.$dosen));
		}
	}
	function batal_semua($nim,$semester,$dosen)
	{
		$this->m_security->getsecurity();
		$where = array('nim'=>$nim,'semester'=>$semester);
	
		if ($dosen == 'kajur')
		{
			$res = $this->m_general->editdata('krs_persetujuan',array('status_setuju_kajur'=>0),$where);
		}
		else
		{
			$res = $this->m_general->editdata('krs_persetujuan',array('status_setuju_dekan'=>0),$where);
			$res = $this->m_general->editdata('krs',array('keterangan'=>0,'semester'=>$semester),$where);
		}
		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','KRS Berhasil dibatalkan!');
			redirect(base_url('krs_persetujuan/detail/'.$nim.'/'.$semester.'/'.$dosen));
		}
	}
	function batal_jadwal($nim,$semester,$kd,$dosen)
	{
		
		$this->m_security->getsecurity();
		$where = array('kd_krs'=>$kd);
		
		$res = $this->m_general->deletedata('krs',$where);
		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Jadwal berhasil dibatalkan!');
			redirect(base_url('krs_persetujuan/detail/'.$nim.'/'.$semester.'/'.$dosen));
		}
	}
	function kajur()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Persetujuan KRS Kajur (Ketua Jurusan)';
		$code = 'krs_kajur';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_krs($code);
		$data['dosen'] = 'kajur';
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs_persetujuan/v_krs_persetujuan');
	}
	
	function dekan()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Persetujuan KRS Dekan (Ketua Dekan)';
		$code = 'krs_dekan';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_krs($code);
		$data['dosen'] = 'dekan';
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs_persetujuan/v_krs_persetujuan');
	}
	
	
	
}