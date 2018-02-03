<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		 $this->load->model('User_model');
    	}

	public $template = array();
	public $data = array();

	public function layout(){
		$this->template['middle'] = $this->load->view($this->middle, $this->data, true);
		$this->load->view('layouts/application', $this->template);
	}

	public function index()
	{
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			//$this->load->library('pagination');
			//$from = $this->uri->segment(3);
		
			$filter = array(
				'username' => $this->input->get('username'),
				'phone' => $this->input->get('phone')
			);

			$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Data Penduduk',
				'description' => 'Informasi Data Penduduk',
				'users' => $this->User_model->data(10, $filter),
				'user_all' => $this->User_model->data(null, null, $filter)
			);			
			$this->middle = 'user/index';
			$this->data = $data;
			$this->layout();
		}
	}
	public function show(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			//$this->User_model->id = $this->uri->segment(3);
			$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Data Penduduk',
				'description' => 'Detail Data Penduduk',
				'user' => $this->User_model->get_users()->row()
			);

			$this->middle = 'user/show';
			$this->data = $data;
			$this->layout();
		}
	}
	public function add()
	{
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Data Penduduk',
				'description' => 'Tambah Data Penduduk',
				'roles' => $this->User_model->get_roles()
			);
			$this->middle = 'user/add';
			$this->data = $data;
			$this->layout();
		}
	}
	public function create(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$data = array();
			$data['open_data_master'] = 'active';
			$data['active_data_master_user'] = 'active';
			$data['page_title'] = 'Data Penduduk';
			$data['description'] = 'Informasi Data Penduduk';

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
					array('is_unique'     => '%s already in use.')
				);
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('encrypted_password', 'Password', 'required');
			$this->form_validation->set_rules('birthday', 'Tanggal lahir', 'required');
			$this->form_validation->set_rules('role_id', 'Posisi', 'required');
			$this->form_validation->set_rules('phone', 'Telepon', 'required');
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$error_form_validation = preg_split('/\r\n|\n|\r/', $this->form_validation->error_string());
				if ($this->form_validation->error_string()){
					unset($error_form_validation[count($error_form_validation) - 1]);
					$error_form = array_merge($error_form_validation);
					$data['errors'] = array($this->form_validation->error_string());
				} else {
					$data['errors'] = "Data must be filled";
				}
				$data['value'] = array(
		                'username' => $this->input->post('username', true),
		                'email' => $this->input->post('email', true),
		                'encrypted_password' => $this->input->post('encrypted_password', true),
		                'fullname' => $this->input->post('fullname', true),
		                'nik' => $this->input->post('nik', true),
		                'address' => $this->input->post('address', true),
		                'city' => $this->input->post('city', true),
		                'gender' => $this->input->post('gender', true),
		                'phone' => $this->input->post('phone', true),
		                'birthday' => $this->input->post('birthday', true),
		                'role_id' => "3",
		                'photo' => "1",
		                'created_at' => date('Y-m-d H:i:s'),
				);
				$data['roles'] = $this->User_model->get_roles();
				$this->middle = 'user/add';
				$this->data = $data;
				$this->layout();				
			}else{
				$data = array(
					'username' => $this->input->post('username', true),
		                'email' => $this->input->post('email', true),
		                'encrypted_password' => $this->input->post('encrypted_password', true),
		                'fullname' => $this->input->post('fullname', true),
		                'nik' => $this->input->post('nik', true),
		                'address' => $this->input->post('address', true),
		                'city' => $this->input->post('city', true),
		                'gender' => $this->input->post('gender', true),
		                'phone' => $this->input->post('phone', true),
		                'birthday' => $this->input->post('birthday', true),
		                'role_id' => "3",
		                'photo' => "1",
		                'created_at' => date('Y-m-d H:i:s')
				);
				$this->User_model->create_user($data);
				redirect('user/');
			}
		}
	}
	public function edit(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$id = $this->uri->segment(3);
			$this->User_model->id = $id;
			$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Data Penduduk',
				'description' => 'Mutahirkan Data Penduduk',
				'roles' => $this->User_model->get_roles(),
				'user' => $this->User_model->data()->row()

			);
			$this->middle = 'user/edit';
			$this->data = $data;
			$this->layout();
		}
	}
	public function update(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$id 	= $this->input->post('id');
			$where = array('id' => $id);

			$data = array();
			$data['open_data_master'] = 'active';
			$data['active_data_master_user'] = 'active';
			$data['page_title'] = 'Data Penduduk';
			$data['description'] = 'Mutahirkan Data Penduduk';
			$data['roles'] = $this->User_model->get_roles();
			$data['user'] = $this->User_model->data()->row();

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('encrypted_password', 'Password', 'required');
			$this->form_validation->set_rules('birthday', 'Tanggal lahir', 'required');
			$this->form_validation->set_rules('role_id', 'Posisi', 'required');
			$this->form_validation->set_rules('phone', 'Telepon', 'required');
			$this->form_validation->set_rules('fullname', 'Nama Lengkap', 'required');
			
			if ($this->form_validation->run() == FALSE) {
				$error_form_validation = preg_split('/\r\n|\n|\r/', $this->form_validation->error_string());
				if ($this->form_validation->error_string()){
					unset($error_form_validation[count($error_form_validation) - 1]);
					$error_form = array_merge($error_form_validation);
					$data['errors'] = array($this->form_validation->error_string());
				} else {
					$data['errors'] = "Data must be filled";
				}
				$data['value'] = array(
					'username' => $this->input->post('username', true),
		                'email' => $this->input->post('email', true),
		                'encrypted_password' => $this->input->post('encrypted_password', true),
		                'fullname' => $this->input->post('fullname', true),
		                'nik' => $this->input->post('nik', true),
		                'address' => $this->input->post('address', true),
		                'city' => $this->input->post('city', true),
		                'gender' => $this->input->post('gender', true),
		                'phone' => $this->input->post('phone', true),
		                'birthday' => $this->input->post('birthday', true),
		                'role_id' => "3",
		                'photo' => "1",
		                'created_at' => date('Y-m-d H:i:s')
	        		);
				$data['roles'] = $this->User_model->get_roles();
				$this->middle = 'user/add';
				$this->data = $data;
				$this->layout();					
			}else{
				$data_update = array(
					'username' => $this->input->post('username', true),
		                'email' => $this->input->post('email', true),
		                'encrypted_password' => $this->input->post('encrypted_password', true),
		                'fullname' => $this->input->post('fullname', true),
		                'nik' => $this->input->post('nik', true),
		                'address' => $this->input->post('address', true),
		                'city' => $this->input->post('city', true),
		                'gender' => $this->input->post('gender', true),
		                'phone' => $this->input->post('phone', true),
		                'birthday' => $this->input->post('birthday', true),
		                'role_id' => "3",
		                'photo' => "1",
		                'created_at' => date('Y-m-d H:i:s')
				);
				$this->User_model->update_data($id, $data_update);
				redirect('user/');
			}
		}
	}
	public function delete($id){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$this->load->model('User_model');
			$user= $this->User_model->delete($id);
			redirect('user/index');
		}
	}	
	public function export_data(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$data = array('title' => 'Data Penduduk',
				'users' => $this->User_model->get_users());

			$this->load->view('user/shared/export', $data);
		}
	}

	public function upload(){
	if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			  $fileName = $this->input->post('users', TRUE);

			  $config['upload_path'] = './assets/import/'; 
			  $config['file_name'] = $fileName;
			  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
			  $config['max_size'] = 10000;

			  $this->load->library('upload', $config);
			  $this->upload->initialize($config); 
			  
			  if (!$this->upload->do_upload('users')) {
			   $error = array('error' => $this->upload->display_errors());
			   $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
			   redirect('Welcome'); 
			  } else {
			   $media = $this->upload->data();
			   $inputFileName = 'assets/import/'.$media['file_name'];
			   
			   try {
			    $inputFileType = IOFactory::identify($inputFileName);
			    $objReader = IOFactory::createReader($inputFileType);
			    $objPHPExcel = $objReader->load($inputFileName);
			   } catch(Exception $e) {
			    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
			   }

			   $sheet = $objPHPExcel->getSheet(0);
			   $highestRow = $sheet->getHighestRow();
			   $highestColumn = $sheet->getHighestColumn();

			   for ($row = 2; $row <= $highestRow; $row++){  
			     $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
			       NULL,
			       TRUE,
			       FALSE);
			     $data = array(

			     "username"=> $rowData[0][1],
			     "email"=> $rowData[0][2],
			     "encrypted_password"=> $rowData[0][3],
			     "fullname"=> $rowData[0][4],
			     "birthday"=> $rowData[0][5],
			     "phone"=> $rowData[0][6],
			     "address"=> $rowData[0][7],
			     "nik"=> $rowData[0][8],
			     "city"=> $rowData[0][9],
			     "gender"=> $rowData[0][10],
			     "photo"=> $rowData[0][11],
			     "role_id"=> $rowData[0][12],
			     "reset_password_token"=> $rowData[0][13],
			     "confirmation_token"=> $rowData[0][14],
			     "authentication_token"=> $rowData[0][15],
			     "status"=> $rowData[0][16],
			     "created_at"=> date('Y-m-d H:i:s')
			    );
			     if($rowData[0][1] == ''){
				$highestRow = $row;
				redirect('user/');
			}
			else{
				$this->db->insert("users",$data);
			}
			    //$this->db->insert("users",$data);
			    
			   } 
			   //var_dump($data);
			   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
			   redirect('user');
			}
		}  
 	}

 	function search(){
 		//$username = $this->input->post('username');
 		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$username = $this->input->post('username');
			$phone = $this->input->post('phone');
			$date_join_start = $this->input->post('date_join_start');
			$date_join_end = $this->input->post('date_join_end');
	 		$data = array(
				'open_data_master' => 'active',
				'active_data_master_user' => 'active',
				'page_title' => 'Hasil Pencarian Data Penduduk',
				'description' => 'Informasi Data Penduduk',
				'results' => $this->User_model->search($username, $phone, $date_join_start, $date_join_end)
			); 		
	 		$this->middle = 'user/result';
			$this->data = $data;
			$this->layout();
		}
 	} 
}