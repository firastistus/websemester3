<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Sessions extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('User_model');
	}

	public $template = array();
	public $data = array();

	public function layout(){
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('layouts/portal', $this->template);
	}

	public function index()
	{
		if (isset($this->session->userdata['current_user']) == 1) {
			redirect('welcome/index');
		}else{

			$this->middle = 'sessions/index';
			$this->layout();
		}
	}

	public function user_login_process(){
		if (isset($this->session->userdata['current_user']) == 1) {
			redirect('welcome/index');
		}else{

		$this->form_validation->set_rules('username', 'username', 'required');
		$this->form_validation->set_rules('encrypted_password', 'encrypted_password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = array('alert' => 'Silakan masukan username dan password Anda');
			$this->middle = 'sessions/index';
			$this->data = $data;
			$this->layout();
		}else{
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('encrypted_password')
			);
			$result = $this->User_model->login($data);

			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->User_model->read_user_information($username);
				if ($result != false) {
					// $session_data = array(
					// 	'user_id' => $result[0]->id
					// 	'username' => $result[0]->username,
					// 	'email' => $result[0]->email
					// );
					$this->session->set_userdata(array('current_user' =>$result[0]->id, "role_id" => $result[0]->role_id));
					redirect('welcome/index');
				}
			}else{
				$data = array('alert' => 'Username atau Password salah');
				$this->middle = 'sessions/index';
				$this->data = $data;
				$this->layout();
			}
		}
	}
}

	public function logout(){
			
		$this->session->unset_userdata(array("current_user", "role_id","payment_id"));
		$this->session->sess_destroy();
		redirect('sessions/index');
		// $this->load->view('sessions/index', $data);
}

	public function remove_message(){
		if (isset($this->session->userdata['current_user']) == 1) {
			redirect('welcome/index');
		}else{

		$this->session->unset_userdata("message");
	}
	}
}
