<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Jadwal_mahasiswa extends CI_Controller {
	
	
	function index()
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Jadwal Mahasiswa Tahun Ajaran '.$_SESSION['tahun'];
		
		//echo "<pre>";print_r($data['jadwal_mahasiswa']);die;
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_mahasiswa/v_jadwal_mahasiswa_semester');
	}
	
	function input_nilai($nim,$kd_krs)
	{
		$this->m_security->getsecurity();
		$data['judul'] = 'Input Nilai Akhir';
		$code = 'input_nilai_akhir';
		$sql = $this->m_general->get_nilai_akhir($kd_krs);
		//echo "<pre>";print_r($sql->result_array());die;
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
			
		$krs = $this->m_general->get_nilai_input_akhir($kd_krs);
		$data['nilai_uts'] =  '';
		$data['nilai_uas'] =  '';
		$data['nilai_tugas'] =  '';
		$data['nilai_absensi'] =  '';
		$data['disabled'] = '';
		if ($krs->num_rows() > 0)
		{
			foreach ($krs->result() as $r)	{	
			$data['nilai_uts'] =  $r->nilai_uts;
			$data['nilai_uas'] =  $r->nilai_uas;
			$data['nilai_tugas'] =  $r->nilai_tugas;
			$data['nilai_absensi'] =  $r->nilai_absensi;}
			$data['disabled'] = 'disabled';
			
		}
		
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/jadwal_mahasiswa/v_input_nilai_akhir');
	}
	function simpan_nilai($nim,$semester)
	{
	
		//echo $semester;die;
		$data = $this->input->post();
		$nilai_uts = $data['nilai_uts'];
		$nilai_uas = $data['nilai_uas'];
		$nilai_tugas = $data['nilai_tugas'];
		$nilai_absensi = $data['nilai_absensi'];
		$sks = $data['sks'];
		$kd_krs = $data['kd_krs'];
		
		//deklare precentase
		$uts = 25;
		$uas = 40;
		$tugas = 25;
		$absen = 10;
		$persen = 100;
	
		$ht_uts = ($nilai_uts * $uts) / $persen;
		$ht_uas = ($nilai_uas * $uas) / $persen;
		$ht_tugas = ($nilai_tugas * $tugas) / $persen;
		$ht_absensi = ($nilai_absensi * $absen) / $persen;
		$total = $ht_uts + $ht_uas + $ht_tugas + $ht_absensi;
		
		$subtotal = number_format($total,0);
		
		if ($subtotal <= 49)
		{
			$hm ='E';
		}
		else if ($subtotal > 49 && $subtotal <= 56 )
		{
			$hm = 'D';
		}
		else if ($subtotal > 56 && $subtotal <= 63)
		{
			$hm = 'C';
		}
		else if ($subtotal > 63 && $subtotal <= 70)
		{
			$hm = 'C+';
		}
		else if ($subtotal > 70 && $subtotal <= 77)
		{
			$hm = 'B';
		}
		else if ($subtotal > 77 && $subtotal <= 84)
		{
			$hm = 'B+';
		}
		else if ($subtotal > 84 && $subtotal <= 100)
		{
			$hm = 'A';
		}
		else
		{
			$hm = 'XX';
		}
	
	
		if ($hm == 'E')
		{
			$bobot = 0;
		}
		else if ($hm == 'D')
		{
			$bobot = 1.00;
		}
		else if ($hm == 'C')
		{
			$bobot = 2.00;
		}
		else if ($hm == 'C+')
		{
			$bobot = 2.50;
		}
		else if ($hm == 'B')
		{
			$bobot = 3.00;
		}
		else if ($hm == 'B+')
		{
			$bobot = 3.50;
		}
		else if ($hm == 'A')
		{
			$bobot = 4.00;
		}
		else
		{
			$bobot = 0;
		}
			
	
		$insert = $data;
		$insert['angka_mutu']=$subtotal;
		$insert['huruf_mutu']=$hm;
		$insert['nilai_mutu'] = $sks * $bobot;
		$insert['bobot'] =  $bobot;
		$insert['date_add'] = date('Y-d-m');
		$insert['add_by'] = $this->session->userdata('nama_login');
		
		//insert nilai mata kuliah
		$res = $this->m_general->insertdata('nilai_mata_kuliah',$insert);		
		
		//by krs diambil
		$total = $this->m_general->get_total_nilai_mutu($nim,$semester);	
		//total nilai acktual	
		$total_nm = $total[0]->total_nm;	
	
		//by sks krs
		$total_sks_krs =$this->m_general->get_total_sks_krs($nim,$semester);
		$total_ipk = $total_nm / $total_sks_krs;		
		
		if ($total_ipk < 1.49)
		{
			$sks_recomend = 15;
				
		}
		else if ($total_ipk > 1.49 && $total_ipk <= 1.50)
		{
			$sks_recomend = 18;
		}
		else if ($total_ipk > 1.50 && $total_ipk <= 2.49)
		{
				
			$sks_recomend = 20;
		}
		else if ($total_ipk > 1.49 && $total_ipk <= 2.99)
		{
			$sks_recomend = 21;
		}
		else if ($total_ipk > 2.99 && $total_ipk <= 4.00)
		{
			$sks_recomend = 24;
		
		}
		else
		{
			$sks_recomend = 0;
		}
		
		//edit tb ipk	
		$editipk['sks_total_diambil'] = $this->m_general->get_sum_total_sks_krs($nim);
		$editipk['sks_now'] = $total_sks_krs;
		$editipk['sks_recomend'] = $sks_recomend;
		$editipk['ipk'] = $total_ipk;
		$res = $this->m_general->editdata('ipk',$editipk,array('nim'=>$nim,'semester'=>$semester));
		
		//update ipk2
		$total_all_sks_diambil = $this->m_general->get_sum_total_sks_krs($nim);
		$editipk2['sks_total_diambil'] = $total_all_sks_diambil;
		$editipk2['sks_belum_diambil'] = $_SESSION['sks_maks'] - $total_all_sks_diambil;
		$res = $this->m_general->editdata('ipk',$editipk2,array('nim'=>$nim,'semester'=>$semester));
		
		
		//update status krs keterangan nilai kalau nilai sudah diinput
		$res = $this->m_general->editdata('krs',array('keterangan_nilai'=>1),array('kd_krs'=>$kd_krs));
		if ($res > 0)
		{
			$this->session->set_flashdata('info','Simpan Nilai Akhir Berhasil !');
			redirect(base_url('jadwal_mahasiswa'));
		}
	
	
	}
	function show_jadwal()
	{
		$id_dosen = $this->session->userdata('id_user');
		$semester = $this->input->post('val');
		$data['jadwal_mahasiswa'] = $this->m_general->get_jadwal_mahasiswa($id_dosen,$semester);
		//echo "<pre>";print_r($data['jadwal_mahasiswa']);die;
		echo $this->load->view('admin/jadwal_mahasiswa/v_jadwal_mahasiswa',$data,true);
	}
	
}