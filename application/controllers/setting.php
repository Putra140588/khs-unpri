<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Setting extends CI_Controller {
	
	function thn_ajaran()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Setting Tahun Ajaran :';	
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/setting/v_setting_tahun_ajaran');
	}
	function simpan()
	{
		$data = $this->input->post();
		$semester = $data['semester'];
		$tahun = $data['tahun_ajaran'];
		
		//update semster
		$res = $this->db->update('setting',array('setting_value'=>$semester),array('modul_id'=>'sms'));
		
		//update tahun
		$res = $this->db->update('setting',array('setting_value'=>$tahun),array('modul_id'=>'thn'));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Edit tahun ajaran berhasil!');
			redirect(base_url('setting/thn_ajaran'));
		}
	}
	function pendaftaran_krs()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Pendaftaran KRS';
		$data['mahasiswa'] = $this->m_general->get_mahasiswa_all();
		$this->load->view('v_home',$data);
		$this->load->view('admin/setting/v_pendaftaran_krs');
	}
	function daftar_krs($nim,$semester)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Daftar KRS';	
		$data['nim'] = $nim;	
		$data['semester'] = $semester;
		$this->load->view('v_home',$data);
		$this->load->view('admin/setting/v_daftar_krs');
	}
	function simpan_daftar()
	{
		$this->m_security->getsecurity();
		$sms= $this->input->post("semester");
		$nim =  $this->input->post("nim");
		$input['semester'] = $sms;
		$input['nim'] =$nim;
		$input['tahun_ajaran'] = $_SESSION['tahun'];
		
		$check = $this->db->get_where("krs_persetujuan",array('nim'=>$nim,'semester'=>$sms));
	
		if ($check->num_rows() > 0)
		{
			
			$this->session->set_flashdata('info','KRS tidak berhasil disimpan!');
			redirect(base_url('setting/pendaftaran_krs'));
			
		}
		else
		{
						
			
			//insert krs_persetujuan
			$res = $this->m_general->insertdata('krs_persetujuan',$input);				
			$res = $this->m_general->editdata('mahasiswa',array('semester'=>$sms,'tahun_ajaran'=>$_SESSION['tahun']),array('nim'=>$nim,'tahun_ajaran'=>$_SESSION['tahun']));
			//insert ipk
			$insert_ipk['nim'] = $nim;
			$insert_ipk['semester'] = $sms;
			$insert_ipk['tahun_ajaran'] = $_SESSION['tahun'];
			//$insert_ipk['sks_recomend'] = $_SESSION['sks_recomend'];
			$insert_ipk['total_sks'] = $_SESSION['sks_maks'];
			$res = $this->m_general->insertdata('ipk',$insert_ipk);			

			
		}
		
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Daftar KRS Berhasil disimpan!');
			redirect(base_url('setting/pendaftaran_krs'));
		}
	}
}