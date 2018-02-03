<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Role extends CI_Controller {
	public function __construct() {
		parent::__construct();
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
			$this->load->database();
			$jumlah_data = $this->Role_model->jumlah_data();

			$data = array(
				'open_data_master' => 'active',
				'active_data_master_role' => 'active',
				'page_title' => 'Data Posisi',
				'description' => 'Informasi Data Posisi',
				'roles' => $this->Role_model->data($config['per_page'], $from)
			);
			$this->middle = 'role/index';
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
				'active_data_master_role' => 'active',
				'page_title' => 'Data Posisi',
				'description' => 'Tambah Data Posisi'
			);
			$this->middle = 'role/add';
			$this->data = $data;
			$this->layout();
		}
	}
	public function create(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$data = array();
			$data['page_title'] = 'Data Posisi';
			$data['description'] = 'Informasi Data Posisi';

			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('name', 'Nama Posisi', 'required');
			if ($this->form_validation->run() == FALSE) {
				$error_form_validation = preg_split('/\r\n|\n|\r/', $this->form_validation->error_string());
				if ($this->form_validation->error_string()){
					unset($error_form_validation[count($error_form_validation) - 1]);
					$error_form = array_merge($error_form_validation);
					$data['errors'] = array($this->form_validation->error_string());
				} else {
					$data['errors'] = "Data must be filled";
				}
				$data = array(
					'name' => $this->input->post('name', true),
					'description' => $this->input->post('description', true),
					'created_at' => date('Y-m-d H:i:s')
				);
				// $this->middle = 'role/add';
				// $this->data = $data;
				// $this->layout();
				?>
					<script type="text/javascript">
							window.history.go(-1);
				</script>
				<?php 
			}else{
				$data = array(
					'name' => $this->input->post('name', true),
					'description' => $this->input->post('description', true),
					'created_at' => date('Y-m-d H:i:s')
				);
				$this->Role_model->create_role($data);
				//$this->middle = 'patient/index';
				redirect('role/');
			}
		}
	}
	public function edit($id){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$where = array('id' => $id
			);

			$a = $this->Role_model->edit_data($where,'roles')->result();

			
			$data = array(
				'open_data_master' => 'active',
				'active_data_master_role' => 'active',
				'page_title' => 'Data Posisi',
				
				'description' => 'Mutahirkan Data Posisi',

				'roles' => $this->Role_model->edit_data($where,'roles')->result()

			);
			$this->middle = 'role/edit';
			$this->data = $data;
			$this->layout();
		}
	}
	public function update(){
		$id 	= $this->input->post('id');
		$where = array('id' => $id);

			//echo "boleh";
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('name', 'name', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$error_form_validation = preg_split('/\r\n|\n|\r/', $this->form_validation->error_string());
			if ($this->form_validation->error_string()){
				unset($error_form_validation[count($error_form_validation) - 1]);
				$error_form = array_merge($error_form_validation);
				$data['errors'] = array($this->form_validation->error_string());
			} else {
				$data['errors'] = "Data must be filled";
			}
			$data = array(
				'name' => $this->input->post('name', true),
				'description' => $this->input->post('description', true),
				'created_at' => date('Y-m-d H:i:s')
			);
					 var_dump($data);
        ?>
			<script type="text/javascript">
						window.history.go(-1);
			</script>
		
		<?php			
		}else{
				$data = array(
				'name' => $this->input->post('name', true),
				'description' => $this->input->post('description', true),
				'created_at' => date('Y-m-d H:i:s')
			);
			//var_dump($data);
			$this->Role_model->update_data($where,$data,'roles');
			redirect('role/');
		}
	}
	public function delete($id){
		$this->load->model('Role_model');
		$role = $this->Role_model->delete($id);
		redirect('role/index');
	}

	public function export_data(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
			$data = array('title' => 'Data Posisi',
				'roles' => $this->Role_model->get_roles());

			$this->load->view('role/shared/export', $data);
		}
	}
	public function upload(){
	  $fileName = $this->input->post('roles', TRUE);

	  $config['upload_path'] = './assets/import/'; 
	  $config['file_name'] = $fileName;
	  $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
	  $config['max_size'] = 10000;

	  $this->load->library('upload', $config);
	  $this->upload->initialize($config); 
	  
	  if (!$this->upload->do_upload('roles')) {
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
				'name' => $rowData[0][1],
				'description' => $rowData[0][2],
				'created_at' => date('Y-m-d H:i:s')
			);
	    if($rowData[0][1] == ''){
				$highestRow = $row;
				redirect('role/');
			}
			else{
				$this->db->insert("roles",$data);
			} 	
	   // $this->db->insert("roles",$data);
	    
	   } 
	   //var_dump($data);
	   $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
	   redirect('role');
	  }  
 	}

	function search(){
		if (isset($this->session->userdata['current_user']) == 0) {
			redirect('sessions/index');
		}else{
	 		$name = $this->input->post('name');
	 		$date_join_start = $this->input->post('date_join_start');
			$date_join_end = $this->input->get('date_join_end');
	 		$data = array(
				'open_data_master' => 'active',
				'active_data_master_role' => 'active',
				'page_title' => 'Hasil Pencarian Data Posisi',
				'description' => 'Informasi Data Posisi',
				'results' => $this->Role_model->search($name, $date_join_start, $date_join_end)
			); 		
	 		$this->middle = 'role/result';
			$this->data = $data;
			$this->layout();
	 	}
	}
}
