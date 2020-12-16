<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadr extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function single_upload($file, $config = array(
	'upload_path' => './uploads/',
	'allowed_types' => 'jpg|png|jpeg|svg|txt|wepg|csv|gif')) {
		
		if ((!isset($config['upload_path'])) or (!isset($config['allowed_types'])) {
			return "Config array must contain <upload_path> and <allowed_types>";
		}
	
		$this->load->library("upload", $config);
		
		if ($this->upload->do_upload($file, $confif)) {
			$data = $this->upload->data();
			$data['status'] = 'Successful';
		} else {
		`	$data = $this->upload->display_errors();
			$data['status'] = 'Failed';
		}
		
		return $data;
	}
}
