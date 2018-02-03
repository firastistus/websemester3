<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public $template = array();
	public $data = array();

	public function layout(){
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('layouts/application', $this->template);
	}

	public function index()
	{
		$data = array(
			'page_title' => 'Biodata',
			'description' => 'Informasi Akun Anda'
		);
		$this->middle = 'profile/index';
		$this->data = $data;
		$this->layout();
	}
}
