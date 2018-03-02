<?php if (!defined('BASEPATH')) exit ('No direct script access allowed!');
class Krs extends CI_Controller {
	
	function nim()
	{
		return $this->session->userdata('id_user');
	}
	
	function generate_krs_input($semester)
	{
		$this->cart->destroy();
		$data['judul'] = 'MATA KULIAH YANG AKAN DITEMPUH PADA SEMESTER INI :';
		$data['krs'] = $this->m_general->get_jadwal_krs();
		$nim = $this->nim();
		$sql = $this->m_general->get_mahasiswa($nim,$semester);
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
		//data by ipk table acktual
		$semester_before = $semester - 1;
		$get_ipk_recomend = $this->m_general->get_sks_recomend_krs($this->nim(),$semester_before);
		$data['sks_recomend'] = isset($get_ipk_recomend[0]->sks_recomend) ? $get_ipk_recomend[0]->sks_recomend : $_SESSION['sks_recomend'];
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs');
	}
	function generate_krs_disetujui($semester)
	{
		$nim = $this->nim();
		$data['judul'] = 'Kartu Rencana Studi anda sudah disetujui. Untuk melakukan perubahan jadwal atau jadwal kuliah, silahkan hubungi dosen fakultas:';
		$data['krs_detail'] = $this->m_general->get_krs_detail($nim,$semester);
		
		$total_sks = $this->m_general->get_total_sks($nim,$semester);
		$data['total_sks'] = $total_sks[0]->total_sks;
		
		$sql = $this->m_general->get_mahasiswa($this->nim(),$semester);
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
		$semester_before = $semester - 1;
		$get_ipk_recomend = $this->m_general->get_sks_recomend_krs($this->nim(),$semester_before);
		$data['sks_recomend'] = isset($get_ipk_recomend[0]->sks_recomend) ? $get_ipk_recomend[0]->sks_recomend : $_SESSION['sks_recomend'];
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs_disetujui');
	}
	function semester_ini()
	{
		$this->m_security->getsecurity();
		$this->m_general->get_error_krs();
		//cek apakah mahasiswa sudah isi krs berdasarkan semester yg sekrang
		$check_krs = $this->db->select_max('semester')							 
							  ->from   ('krs_persetujuan')
							  ->where	('nim',$this->nim())
							  ->get()->result();
		
		if (count($check_krs) > 0)
		{
			$semestermax = $check_krs[0]->semester;
			
			$where = array('nim'=>$this->nim(),'semester'=>$semestermax);
			$get_status = $this->db->get_where('krs_persetujuan',$where)->result();
			
			//jika dosen approve krs off
			$status = $get_status[0]->status_setuju_dekan;
			//jika belum disetujui
			
			if ($status == 0)
			{
				
				$this->generate_krs_input($semestermax);
			}
			else
			{
				
				$this->generate_krs_disetujui($semestermax);
			}
		}
		else
		{
			
			$this->generate_krs_input();
		}
		
		
		
		
		
		
		
	}
	function simpan()
	{
		$this->m_security->getsecurity();
		
		if ($this->input->post('check') == null)
		{
			$this->session->set_flashdata('info','Mata kuliah belum dipilih !');
			redirect(base_url('krs/semester_ini'));
		}
		else
		{
			$nim_sess = $this->nim();
			$nim['nim'] = $nim_sess;
			$check = $this->input->post('check');
			//echo "<pre>";print_r($check);die;
			foreach ($check as $val)
			{
				$expl = explode('-', $val);
				$input['kd_jadwal'] = $expl[0];
				$input['semester'] = $expl[1];
				$input['tahun_ajaran'] = $expl[2];
				//echo "<pre>";print_r($input);die;
				
				//cek apakah matakuliah sudah diinput
				$where = array_merge($nim,$input);
				$sql = $this->db->get_where('krs',$where);
				//jika matkul ada
				
				if ($sql->num_rows() > 0)
				{
					$res=1;
					
				}	
				//input data yg tidak ada
				else
				{
					
					$data = array_merge($nim,$input);
					
					//insert krs detail
					$res = $this->m_general->insertdata('krs',$data);
					
					//update persetujuan
					$whereupdate = array('nim'=>$nim_sess,'semester'=>$expl[1]);
					$update['tgl_krs'] = date('Y-m-d');		
					$update['active'] = 1;		
									
					$res = $this->m_general->editdata('krs_persetujuan',$update,$whereupdate);
					
				}		
				
			}
			if ($res > 0)
			{
				$this->cart->destroy();
				$this->session->set_flashdata('info','KRS Berhasil disimpan !');
				redirect(base_url('krs/semester_ini'));
			}
		}
			
		
		
	}
	function get_sks()
	{
		
		$sksvalue = $this->input->post('val');
		$sks_recomend = $this->input->post('sks_recomend');
		$code = $this->input->post('code');
				
		if ($code == 'tambah')
		{
			$totalsks = $this->cart->total_items() + $sksvalue;
			if ( $totalsks > $sks_recomend)
			{
				echo json_encode(array('error'=>1,'ket'=>'SKS sudah melebihi batas maksimum'));
			}
			else 
			{
				$insert = array('id'=> $this->session->userdata('id_user'),
						'qty'=>$sksvalue,
						'price'=>$sksvalue,
						'name'=>$code);
				$this->cart->insert($insert);
				$totalsks = $this->cart->total_items();				
				echo json_encode(array('error'=>0,'total_sks'=>$totalsks));
			
			}
			
		}
		else
		{
			$totalitem = $this->cart->total_items();
			$total = $totalitem - $sksvalue;
			foreach ($this->cart->contents() as $val)
			{
				$update = array('rowid'=>$val['rowid'],'qty'=>$total);
				$this->cart->update($update);
				$totalsks = $this->cart->total_items();
			}			
			echo json_encode(array('error'=>0,'total_sks'=>$totalsks));
		}
		
		
	}
	function diambil()
	{
		$this->m_security->getsecurity();
		
		$data['judul'] = 'KRS yang telah diambil :';
		$data['krs_header'] = $this->m_general->get_krs_header_all($this->nim());
		
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs_diambil');
		
	}
	function detail($nim,$semester)	
	{
		
		$this->m_security->getsecurity();	
		$data['judul'] = 'Detail KRS Yang diambil';
		$data['krs_detail'] = $this->m_general->get_krs_detail($nim,$semester);
		$total_sks = $this->m_general->get_total_sks($nim,$semester);
		$data['total_sks'] = $total_sks[0]->total_sks;
	
	
		$sql = $this->m_general->get_mahasiswa($nim,$semester);
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
		$semester_before = $semester - 1;
		$get_ipk_recomend = $this->m_general->get_sks_recomend_krs($this->nim(),$semester_before);
		$data['sks_recomend'] = isset($get_ipk_recomend[0]->sks_recomend) ? $get_ipk_recomend[0]->sks_recomend : $_SESSION['sks_recomend'];
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_detail_krs');
	}
	function destroy_cart()
	{
		$this->cart->destroy();
	}
	function nilai_khs($nim,$semester)
	{
		$this->m_security->getsecurity();
		
		$data['judul'] = 'Kartu Hasil Studi Mahasiswa :';
		
		$mahasiswa = $this->m_general->get_mahasiswa_khs($nim,$semester);
		foreach ($mahasiswa->result() as $val)
			foreach ($val as $key=>$val)
			{
				$data[$key]= $val;
			}
		
		//data nilai by nilai input
		$total = $this->m_general->get_total_nilai_mutu($nim,$semester);		
		$total_nm = $total[0]->total_nm;		
		$data['total_nm'] = $total_nm;		
		
		//data khs by krs
		$sql = $this->m_general->get_data_khs($nim,$semester);
		$data['datakrs'] = $sql;
		
		//data by ipk table acktual
		$get_ipk_recomend = $this->m_general->get_sks_recomend($nim,$semester);		
		$total_sks_all = $get_ipk_recomend[0]->total_sks;	
			
		$data['sks_recomend'] = $get_ipk_recomend[0]->sks_recomend;
		$data['total_sks_all'] = $get_ipk_recomend[0]->total_sks;		
		$data['total_sks'] = $get_ipk_recomend[0]->sks_now;	
		$data['total_ipk'] = number_format($get_ipk_recomend[0]->ipk,2);
		$data['sks_diambil'] = $get_ipk_recomend[0]->sks_total_diambil;
		$data['sks_last'] = $get_ipk_recomend[0]->sks_belum_diambil;
		
		
		//sks yang belum diambil (total seluruh sks - wajib sks);
		
		
		$this->load->view('admin/khs/v_khs',$data);
	}
	
	function tes()
	{
		$hm = 'E';
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
	}
	
	function krs_mahasiswa()
	{
		
		$this->m_security->getsecurity();
		$data['judul'] = 'KRS Mahasiswa';
		$data['krs_mahasiswa'] = $this->m_general->get_krs_mahasiswa();
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs_mahasiswa');
	}
	
	function detail_krs($nim,$semester)
	{
		$this->m_security->getsecurity();		
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs_mahasiswa');
	}
	
	function detail_krs_mahasiswa($nim,$semester)
	{
		$this->m_security->getsecurity();
		
		$data['krs_detail'] = $this->m_general->get_krs_detail($nim,$semester);
		$total_sks = $this->m_general->get_total_sks($nim,$semester);
		$data['total_sks'] = $total_sks[0]->total_sks;
	
		
		$sql = $this->m_general->get_mahasiswa($nim,$semester);
		foreach ($sql->result() as $row)
			foreach ($row as $key=>$val)
			{
				$data[$key]=$val;
			}
			
		$semester_before = $semester - 1;		
		$get_ipk_recomend = $this->m_general->get_sks_recomend_krs($nim,$semester_before);
		$data['sks_recomend'] = isset($get_ipk_recomend[0]->sks_recomend) ? $get_ipk_recomend[0]->sks_recomend : $_SESSION['sks_recomend'];
		$this->load->view('v_home',$data);
		$this->load->view('admin/krs/v_krs_mahasiswa_admin');
	}
	
}