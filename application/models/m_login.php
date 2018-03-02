<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
	
	public function getlogin($u, $p) {
		
		$pwd = md5($p);		
		$this->db->where('id_user', $u);
		$this->db->where('password', $pwd);		
		$query = $this->db->select('A.*,B.*')
						  ->from ('login as A')
						  ->join  ('status as B','A.kd_status = B.kd_status','left')
						  ->get();

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$sess = array('nama_login'=>$row->nama_login,
							  'id_user'	=>$row->id_user,
							  'status'=>$row->status,
							  'kd_status'=>$row->kd_status,
							  'login'=>true);
				$this->session->set_userdata($sess);
				
				
				redirect('home');
			}
		}
		else {
			$this->session->set_flashdata('info', 'Maaf Username atau Password salah');
			redirect('login');
		}
	}
}
