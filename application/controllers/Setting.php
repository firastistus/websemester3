<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
	
	public $template = array();
	public $data = array();

	public function layout(){
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('layouts/application', $this->template);
	}

	public function index()
	{
		$data = array(
			'page_title' => 'Setting',
			'description' => 'Atur Data Anda'
		);
		$this->middle = 'setting/index';
		$this->data = $data;
		$this->layout();
	}
}
