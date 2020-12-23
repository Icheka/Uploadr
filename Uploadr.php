<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadr extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function single_upload($file, $config = array(
	'upload_path' => './uploads/',
	'allowed_types' => 'jpg|png|jpeg|svg|txt|wepg|csv|gif')) {
		
		if ((!isset($config['upload_path'])) or (!isset($config['allowed_types']))) {
			$data['status'] = "Config array must contain [upload_path] and [allowed_types]";
			return $data;
		}
	
		$this->load->library("upload", $config);
		
		if ($this->upload->do_upload($file)) {
			$data = $this->upload->data();
			$data['status'] = 'Successful';
		} else {
			$data = array("error_message" => $this->upload->display_errors(), "status" => "Failed");
		}
		
		return $data;
	}
}