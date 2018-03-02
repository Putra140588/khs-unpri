<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_general extends CI_Model {
	
	function __construct()
	{
		$get_setting = $this->db->get('setting');
		$i=1;
		foreach ($get_setting->result() as $row)
		{
			//membuat session content setting
			$_SESSION['konfig_app_'.$i]=$row->setting_value;	
			
			$_SESSION[$row->setting_code] = $_SESSION['konfig_app_'.$i];			
			$i++;
		}
		
	}
	
	function get_mahasiswa_all()
	{
		$sql  = $this->db->distinct()->select('A.*,B.*,C.*,D.*')
						 ->from ('mahasiswa as A')
						 ->join	('fakultas as B','A.kd_fakultas = B.kd_fakultas','left')
						 ->join	('jurusan as C','A.kd_jurusan = C.kd_jurusan','left')
						 ->join	('kelas_program as D','A.kd_kelas_program = D.kd_kelas_program','left')
						 ->get();		
		return $sql;
	}
	function get_edit_mahasiswa($nim)
	{
		$sql  = $this->db->select('A.*,C.*')
						 ->from ('mahasiswa as A')						 
						 ->join	('jurusan as C','A.kd_jurusan = C.kd_jurusan','left')						
						 ->where ('A.nim',$nim)
						 ->get();	
		return $sql;
	}
	
	function get_jenjang()
	{
		$sql = $this->db->get('jenjang');
		return $sql;
	}
	function get_fakultas()
	{
		$sql = $this->db->get('fakultas');
		return $sql;
	}
	function get_jurusan($kd)
	{
		$sql = $this->db->get_where('jurusan',array('kd_fakultas'=>$kd));
		return $sql;
	}
	function get_kelas_program()
	{
		$sql = $this->db->get('kelas_program');
		return $sql;
	}
	function insertdata($table,$data)
	{
		$sql = $this->db->insert($table,$data);
		return $sql;
	}
	function editdata($table,$data,$where)
	{
		$sql = $this->db->update($table,$data,$where);
		return $sql;
	}
	function deletedata($table,$where)
	{
		$sql = $this->db->delete($table,$where);
		return $sql;
	}
	function get_dosen_all()	
	{
		$sql = $this->db->order_by('nid','asc')->get('dosen');
		return $sql;
	}
	function get_edit_dosen($nid)
	{
		$sql = $this->db->get_where('dosen',array('nid'=>$nid));
		return $sql;
	}
	function get_all_modul()
	{
		$sql = $this->db->get('modul');
		return $sql;
	}
	function get_akses($id)
	{
		$sql = $this->db->select('A.*,B.*')
						->from ('akses as A')
						->join	('modul as B','A.id_modul = B.id_modul','left')
						->where	('A.id_user',$id)
						->get();
		return $sql;
	}
	function get_status_all()
	{
		$sql = $this->db->get('status');
		return $sql;
	}
	function get_modul_akses($id)
	{
		$sql = $this->db->select('A.*,B.*')
						->from	('akses as A')
						->join	('modul as B','A.id_modul = B.id_modul','left')
						->where('A.kd_status',$id)
						->order_by('B.sort','ASC')
						->get();
		return $sql;
	}
	function get_edit_status($id)
	{
		$sql = $this->db->get_where('status',array('kd_status'=>$id));
		return $sql;
	}
	function get_admin_all()
	{
		$sql = $this->db->get('admins');
		return $sql;
	}
	function get_edit_admin($nik)
	{
		$sql = $this->db->get_where('admins',array('nik'=>$nik));
		return $sql;
	}
	function get_fakultas_all()
	{
		$sql = $this->db->select('A.*,B.*')
						->from ('fakultas as A')
						->join	('dosen as B','A.id_dosen = B.nid','left')
						->get();
		return $sql;
		
	}
	function get_edit_fakultas($id)
	{
		$sql = $this->db->get_where('fakultas',array('kd_fakultas'=>$id));
		return $sql;
	}
	function get_edit_jurusan($id)
	{
		$sql = $this->db->get_where('jurusan',array('kd_jurusan'=>$id));
		return $sql;
	}
	function get_jurusan_all()
	{
		$sql = $this->db->select('A.*,B.*,C.*')
						->from ('jurusan as A')
						->join	('dosen as B','A.id_dosen = B.nid','left')
						->join	('fakultas as C','A.kd_fakultas = C.kd_fakultas','left')
						->get();
		return $sql;
	}
	function get_matakuliah_all()
	{
		$sql = $this->db->get('mata_kuliah');
		return $sql;
	}
	function get_edit_mata_kuliah($id)
	{
		$sql = $this->db->get_where('mata_kuliah',array('kd_mata_kuliah'=>$id));
		return $sql;
	}
	function get_jadwal_matkul()
	{
		
		$sql = $this->db->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*')
						->from ('jadwal_mata_kuliah as A')
						->join ('dosen as B','A.id_dosen = B.nid','left')
						->join ('kelas_program as C','A.kd_kelas_program = C.kd_kelas_program','left')
						->join ('mata_kuliah as D','A.kd_mata_kuliah = D.kd_mata_kuliah','left')
						->join ('jurusan as E','A.kd_jurusan = E.kd_jurusan','left')
						->join ('lantai as F','A.lokasi = F.id_lantai','left')
						->join ('kelas as G','A.kelas = G.id_kelas','left')
						->order_by ('A.kd_jadwal','DESC')
						->get();
		return $sql;
	}
	function get_lantai()
	{
		$sql = $this->db->get('lantai');
		return $sql;
	}
	function get_edit_jadwal($id)
	{
		$sql = $this->db->get_where('jadwal_mata_kuliah',array('kd_jadwal'=>$id));
		return $sql;
	}
	
	function get_kelas($id)
	{
		$sql = $this->db->get_where('kelas',array('id_lantai'=>$id));
		return $sql;
	}
	function get_jadwal_krs()
	{
		$kd_status = $this->session->userdata('kd_status');
		$id_user = $this->session->userdata('id_user');
		$semester_now = $_SESSION['semester']; //ganjil/genapp
		
		if ($kd_status == 'MHS')
		{
			
			$sql = $this->db->get_where('mahasiswa',array('nim'=>$id_user))->result();
			$kdjurusan = $sql[0]->kd_jurusan;
			$kd_kelas_program = $sql['0']->kd_kelas_program;
			$tahun_ajaran = $_SESSION['tahun'];
			
			//menampilkan jadwal base on kelas_program, jurusan, tahun ajaran, dan matakul umum(all) 
			/*$where = 'A.kd_kelas_program="'.$kd_kelas_program.'" AND 
					  A.kd_jurusan="'.$kdjurusan.'" AND 
					  D.semester like "%'.$semester_now.'%" AND 
					  A.tahun_ajaran="'.$tahun_ajaran.'" OR 
					  A.kd_jurusan="all"';*/
			$where = 'A.kd_kelas_program="'.$kd_kelas_program.'" AND
			A.kd_jurusan="'.$kdjurusan.'" AND
			D.semester like "%'.$semester_now.'%" AND
			A.tahun_ajaran="'.$tahun_ajaran.'"';
			$this->db->where($where);
			$get_jadwal =  $this->db->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*')
										->from ('jadwal_mata_kuliah as A')
										->join ('dosen as B','A.id_dosen = B.nid','left')
										->join ('kelas_program as C','A.kd_kelas_program = C.kd_kelas_program','left')
										->join ('mata_kuliah as D','A.kd_mata_kuliah = D.kd_mata_kuliah','left')
										->join ('jurusan as E','A.kd_jurusan = E.kd_jurusan','left')
										->join ('lantai as F','A.lokasi = F.id_lantai','left')
										->join ('kelas as G','A.kelas = G.id_kelas','left')																														
										->get();
			
			//$get_jadwal = $this->db->query('select * from jadwal_mata_kuliah  where kd_jurusan="'.$kdjurusan.'" || kd_jurusan="all"')->result();
			return $get_jadwal;
								  
		}
		return false;
		
		
	}
	function get_mahasiswa($id,$semester)
	{
		$this->db->where('A.nim',$id);	
		$this->db->where('F.semester',$semester);
		return $this->db->distinct()->select('A.*,B.*,C.*,D.*,E.*, F.status_setuju_dekan,F.status_setuju_kajur,F.semester as sms,F.tgl_krs')
							->from  ('mahasiswa as A')
							->join	('fakultas as B','A.kd_fakultas = B.kd_fakultas','left')
							->join	('jurusan as C','A.kd_jurusan = C.kd_jurusan','left')
							->join	('kelas_program as D','A.kd_kelas_program = D.kd_kelas_program','left')
							->join 	('dosen as E','B.id_dosen = E.nid','left')
							->join	('krs_persetujuan as F','A.nim = F.nim','left')
							->get();
	}
	
	function get_krs_detail($nim,$semester)
	{
		return  $this->db->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.semester as sms,H.nim,H.kd_krs')
						 ->from ('jadwal_mata_kuliah as A')										
						 ->join ('dosen as B','A.id_dosen = B.nid','left')
						 ->join ('kelas_program as C','A.kd_kelas_program = C.kd_kelas_program','left')
						 ->join ('mata_kuliah as D','A.kd_mata_kuliah = D.kd_mata_kuliah','left')
						 ->join ('jurusan as E','A.kd_jurusan = E.kd_jurusan','left')
						 ->join ('lantai as F','A.lokasi = F.id_lantai','left')
						 ->join ('kelas as G','A.kelas = G.id_kelas','left')
						 ->join ('krs as H','A.kd_jadwal = H.kd_jadwal','left')		
						 ->where ('H.nim',$nim)		
						 ->where ('H.semester',$semester)
						 ->get();
	}
	function get_total_sks($nim,$semester)
	{
		return $this->db->select('A.*,B.*,sum(C.sks) as total_sks')
						->from ('krs as A')
						->join ('jadwal_mata_kuliah as B','A.kd_jadwal = B.kd_jadwal','left')
						->join ('mata_kuliah as C','B.kd_mata_kuliah = C.kd_mata_kuliah','left')
						->where ('A.nim',$nim)
						->where ('A.semester',$semester)
						->get()->result();
	}
	function get_krs_header($nim,$semester)
	{
		$sql = $this->db->get_where('krs_persetujuan',array('nim'=>$nim,'semester'=>$semester));
		return $sql;
	}
	function get_krs_header_all($nim)
	{
		//ditampilkan jika krs sudah diinput mahasiswa
		$sql = $this->db->get_where('krs_persetujuan',array('nim'=>$nim,'active'=>1));
		if ($sql->num_rows() > 0)
		{
			return $sql;
		}
		else
		{
			$this->session->set_flashdata('error_page','Anda Belum input krs !');
			redirect(base_url('home/error_page'));
		}
		
		
	}
	function get_mahasiswa_krs($code)
	{
		//dosen
		$id_user = $this->session->userdata('id_user');
		//status dosen
		$kd_status = $this->session->userdata('kd_status');
		if ($kd_status == 'DSN')
		{
			//jika kajur
			if ($code == 'krs_kajur')
			{
				//get kajur
				$get_kd_jurusan = $this->db->get_where('jurusan',array('id_dosen'=>$id_user))->result();
				$kd_jurusan='';
				if (count($get_kd_jurusan) > 0)
				{
					$kd_jurusan = $get_kd_jurusan[0]->kd_jurusan;
					$where = array('B.kd_jurusan'=>$kd_jurusan);
					
				}
				else
				{
					$this->session->set_flashdata('error_page','Persetujuan KRS hanya dapat dilakukan oleh ketua jurusan (Kajur) !');
					redirect(base_url('home/error_page'));
				}
				//echo $id_user;die;
				
			}
			else if ($code == 'krs_dekan')
			{
				//persetujuan krs hanya dosen fakultas base on kd fakultas
				$get_kd_dekan = $this->db->get_where('fakultas',array('id_dosen'=>$id_user))->result();
				$kd_dekan='';
				if (count($get_kd_dekan) > 0)
				{
					$kd_dekan= $get_kd_dekan[0]->kd_fakultas;
					$where = array('B.kd_fakultas'=>$kd_dekan);
						
				}
				else
				{
					$this->session->set_flashdata('error_page','Persetujuan KRS hanya dapat dilakukan oleh ketua fakultas (Dekan) !');
					redirect(base_url('home/error_page'));
				}
				
				
			}
			else
			{
				$where = array('A.status_setuju_dekan'=>1);
			}
		
			$sql = $this->db->select('A.semester as sms, A.status_setuju_dekan,A.status_setuju_kajur,B.*,C.*,D.*,E.*')
							->from	('krs_persetujuan as A')
							->join	('mahasiswa as B','A.nim = B.nim','left')
							->join	('fakultas as C','B.kd_fakultas = C.kd_fakultas','left')
							->join	('jurusan as D','B.kd_jurusan = D.kd_jurusan','left')
							->join	('kelas_program as E','B.kd_kelas_program = E.kd_kelas_program','left')
							->where ($where)
							->order_by('B.nama_mahasiswa','ASC')
							->where ('A.active',1)
							->get();
			if ($sql->num_rows() > 0)
			{
				return $sql;
			
			}
			else
			{
				$this->session->set_flashdata('error_page','Belum ada pendaftaran KRS !');
				redirect(base_url('home/error_page'));
			}
			
			
			
		}
		
	}
	function get_inputnilai_dosen($nim,$semester)
	{
		//get base on dosen jadwal
		$kd_dosen = $this->session->userdata('id_user');
		return  $this->db->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.semester as sms,H.keterangan, H.nim,H.kd_krs')
						->from ('jadwal_mata_kuliah as A')
						->join ('dosen as B','A.id_dosen = B.nid','left')
						->join ('kelas_program as C','A.kd_kelas_program = C.kd_kelas_program','left')
						->join ('mata_kuliah as D','A.kd_mata_kuliah = D.kd_mata_kuliah','left')
						->join ('jurusan as E','A.kd_jurusan = E.kd_jurusan','left')
						->join ('lantai as F','A.lokasi = F.id_lantai','left')
						->join ('kelas as G','A.kelas = G.id_kelas','left')
						->join ('krs as H','A.kd_jadwal = H.kd_jadwal','left')
						->where ('H.nim',$nim)
						->where ('H.semester',$semester)
						->where ('A.id_dosen',$kd_dosen)
						->get();
	}
	
	function get_error_krs()
	{
		
		$id_user = $this->session->userdata("id_user");
		$check = $this->db->get_where('krs_persetujuan',array('nim'=>$id_user));
		if ($check->num_rows() == 0)
		{
			redirect(base_url('home/error_krs'));
		}
		
	}
	
	function get_nilai_akhir($kd_krs)
	{
		//menampilkan detail mahasiswa
		$sql = $this->db->select('A.*,B.*,C.*,D.*,E.*,F.*,G.*,H.*,I.*')
						->from	('krs as A')
						->join  ('jadwal_mata_kuliah as B','A.kd_jadwal = B.kd_jadwal','left')
						->join	('mata_kuliah as C','B.kd_mata_kuliah = C.kd_mata_kuliah','left')
						->join	('dosen as D','B.id_dosen = D.nid','left')
						->join	('mahasiswa as E','A.nim = E.nim','left')
						->join	('fakultas as F','E.kd_fakultas = F.kd_fakultas','left')
						->join	('jurusan as G','E.kd_jurusan = G.kd_jurusan','left')
						->join	('kelas_program as H','E.kd_kelas_program = H.kd_kelas_program','left')
						->join	('jenjang as I','E.kd_jenjang = I.kd_jenjang','left')
						->where	('A.kd_krs',$kd_krs)
						->get();
		return $sql;
	}
	function get_mahasiswa_khs($nim,$semester)
	{
		return  $sql = $this->db->select("A.*,B.*,C.*,D.*,E.*")
						->from ('mahasiswa as A')
						->join ('fakultas as B','A.kd_fakultas = B.kd_fakultas','left')
						->join	('jurusan as C','A.kd_jurusan = C.kd_jurusan','left')
						->join	('jenjang as D','A.kd_jenjang = D.kd_jenjang','left')
						->join	('krs_persetujuan as E','A.nim = E.nim','left')
						->where	('A.nim',$nim)
						->where	('E.semester',$semester)
						->get();
	}
	function get_data_khs($nim,$semester)
	{
		return $sql = $this->db->select('A.*,B.*,C.*,D.*')
								->from	('krs as A')
								->join	('nilai_mata_kuliah as B','A.kd_krs = B.kd_krs','left')
								->join	('jadwal_mata_kuliah as C','A.kd_jadwal = C.kd_jadwal','left')
								->join	('mata_kuliah as D','C.kd_mata_kuliah = D.kd_mata_kuliah','left')
								->where ('A.nim',$nim)
								->where	('A.semester',$semester)
								->get();
	}
	function get_total_sks_nilai($nim,$semester)
	{
		return  $sql = $this->db->select('A.*,sum(C.sks) as total_sks,B.*')
						->from	('krs as A')
						->join	('jadwal_mata_kuliah as B','A.kd_jadwal = B.kd_jadwal','left')
						->join	('mata_kuliah as C','B.kd_mata_kuliah = C.kd_mata_kuliah','left')
						->where('A.nim',$nim)
						->where ('A.semester',$semester)
						->get()->result();
	}
	function get_total_nilai_mutu($nim,$semester)
	{
		
		//total nilai actual
		return  $this->db->select('A.*,sum(B.nilai_mutu) as total_nm')
						->from	('krs as A')
						->join	('nilai_mata_kuliah as B','A.kd_krs = B.kd_krs')
						->where ('A.nim',$nim)
						->where ('A.semester',$semester)
						->get()->result();
						
	}
	
	
	
	function get_jadwal_dosen_bysemester()
	{
		
		$tahunajarini  = $_SESSION['tahun'];
		$id_dosen = $this->session->userdata('id_user');
		
		$sql = $this->db->select('A.*,B.*,C.*,D.kd_mata_kuliah,D.mata_kuliah,D.sks,D.semester,E.*,F.*,G.*')
						->from ('jadwal_mata_kuliah as A')
						->join ('dosen as B','A.id_dosen = B.nid','left')
						->join ('kelas_program as C','A.kd_kelas_program = C.kd_kelas_program','left')
						->join ('mata_kuliah as D','A.kd_mata_kuliah = D.kd_mata_kuliah','left')
						->join ('jurusan as E','A.kd_jurusan = E.kd_jurusan','left')
						->join ('lantai as F','A.lokasi = F.id_lantai','left')
						->join ('kelas as G','A.kelas = G.id_kelas','left')
						->order_by ('E.kd_jurusan','asc')
						->where ('A.id_dosen',$id_dosen)
						->where	('A.tahun_ajaran',$tahunajarini)
						->get();
		if ($sql->num_rows() > 0)
		{
			return $sql;
		}
		else
		{
			$this->session->set_flashdata('error_page','Anda belum mempunyai jadwal perkuliahan !');
			redirect(base_url('home/error_page'));
		}
		
		
	}
	function get_jadwal_mahasiswa($id_dosen,$semester)
	{
		
		$tahunini = $_SESSION['tahun'];
		//menampilkan data mahasiswa sesuai dosen pengajar
		$sql = $this->db->select('A.*,B.nim,B.kd_jadwal,B.semester as sms,B.keterangan,B.kd_krs,B.keterangan_nilai,C.*,D.*,E.*')
		->from  ('jadwal_mata_kuliah as A')
		->join	('krs as B','A.kd_jadwal = B.kd_jadwal','left')
		->join	('mata_kuliah as C','A.kd_mata_kuliah = C.kd_mata_kuliah','left')
		->join  ('dosen as D','A.id_dosen = D.nid','left') 
		->join	('mahasiswa as E','B.nim = E.nim','left')
		->where	('A.id_dosen',$id_dosen)
		->where ('B.semester',$semester)
		->where ('B.tahun_ajaran',$tahunini)
		->get()->result();
		/*$sql = $this->db->distinct()->select('A.*,B.*,C.*,D.*,E.*,F.nim,F.nama_mahasiswa,G.*,H.*,I.*,J.*')
						->from ('krs as A')
						->join ('jadwal_mata_kuliah as B','A.kd_jadwal = B.kd_jadwal','left')
						->join ('dosen as C','B.id_dosen = C.nid','left')
						->join	('mata_kuliah as D','B.kd_mata_kuliah = D.kd_mata_kuliah','left')
						->join	('jurusan as E','B.kd_jurusan = E.kd_jurusan','left')
						->join	('mahasiswa as F','A.nim = F.nim','left')	
						->join  ('kelas_program as G','B.kd_kelas_program = G.kd_kelas_program','left')
						->join	('kelas as H','B.kelas = H.id_kelas','left')
						->join	('lantai as I','B.lokasi = I.id_lantai','left')		
						->join	('krs_persetujuan as J','F.nim = J.nim','left')		
						->where	('B.id_dosen',$id_dosen)
						->where ('A.semester',$semester)
						->where	('A.tahun_ajaran',$tahunini)
						->order_by ('F.nim','asc')
						->get()->result();*/
		return $sql;
		
	}
	
	function get_nilai_input_akhir($kd_krs)
	{
		$sql = $this->db->get_where('nilai_mata_kuliah',array('kd_krs'=>$kd_krs));
		return $sql;
	
	}
	
	function get_ipk($nim,$semester)
	{
		
		return $sql->result();
		
	}
	
	function get_total_sks_krs($nim,$semester)
	{
		 $sql = $this->db->select('A.*,B.*,C.*,D.kd_mata_kuliah,sum(D.sks) as total_sks')
							->from	('krs as A')
							->join	('nilai_mata_kuliah as B','A.kd_krs = B.kd_krs','left')
							->join	('jadwal_mata_kuliah as C','A.kd_jadwal = C.kd_jadwal','left')
							->join	('mata_kuliah as D','C.kd_mata_kuliah = D.kd_mata_kuliah','left')
							->where ('A.nim',$nim)
							->where	('A.semester',$semester)
							->get()->result();
		return $total_sks = $sql[0]->total_sks;
	}
	
	function get_semester_min($nim)
	{
			//$sql = $this->db->get_where('ipk',array('nim'=>$nim,'semester'=>$semester))->result();
			$sql = $this->db->select_min('semester')
							->from ('ipk')
							->where ('nim',$nim)
							->get()->result();							
			 return $sql;
	}
	function get_sks_recomend($nim,$semester)
	{
		$sql = $this->db->get_where('ipk',array('nim'=>$nim,'semester'=>$semester))->result();
		return $sql;
	}
	function get_sks_recomend_krs($nim,$semester)
	{
		$sql = $this->db->get_where('ipk',array('nim'=>$nim,'semester'=>$semester))->result();
		return $sql;
	}
	//get total all sks diambil
	function get_sum_total_sks_krs($nim)
	{
		$sql = $this->db->select('sum(sks_now) as total_sks')
						->from ('ipk')
						->where('nim',$nim)
						->get()->result();
		return $sql[0]->total_sks;
	
	}
	function get_krs_mahasiswa()
	{
		
		$sql  = $this->db->distinct()->select('A.*,B.*,C.*,D.*,E.*')
						 ->from ('mahasiswa as A')
						 ->join	('fakultas as B','A.kd_fakultas = B.kd_fakultas','left')
						 ->join	('jurusan as C','A.kd_jurusan = C.kd_jurusan','left')
						 ->join	('kelas_program as D','A.kd_kelas_program = D.kd_kelas_program','left')
						 ->join ('krs_persetujuan as E','A.nim = E.nim','left')
						 ->where ('E.active',1)
						 ->get();		
		return $sql;
	}

}