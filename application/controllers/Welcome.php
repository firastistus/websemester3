<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public $template = array();
	public $data = array();

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

	public function layout(){
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('layouts/application', $this->template);
	}

	public function index()
	{
		if (isset($this->session->userdata['current_user']) == 1) {
			$filter = array(
				'username' => $this->input->get('username'),
				'phone' => $this->input->get('phone'),
				'date_join_start' => $this->input->get('date_join_start'),
				'date_join_end' => $this->input->get('date_join_end')
			);
			$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Data Penduduk',
				'description' => 'Informasi Data Penduduk',
				'users' => $this->User_model->data(10, $filter),
				'user_all' => $this->User_model->data(null, $filter)
			);

			$from = $this->uri->segment(3);
			$data['users'] = $this->User_model->get_users($filter);			
			$this->middle = 'welcome/index';
			$this->data = $data;
			$this->layout();
		}else{
			redirect('sessions/index');
		}
	}
}
