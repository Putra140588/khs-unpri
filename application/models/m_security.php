<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_security extends CI_Model {
	public function getsecurity() {
		$username = $this->session->userdata('login');
		if ($username == false) {
			$this->session->sess_destroy();
			redirect('login');
		}
	}
}
