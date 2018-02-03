<?php
	if (!defined('BASEPATH'))

    	exit('No direct script access allowed');
	class Role_model extends CI_Model {
		function __construct() {
			parent::__construct();
		}

		function get_roles(){
			$this->db->select("roles.*");
			$this->db->from("roles");
			$this->db->order_by('id', 'DESC');

			return $this->db->get();
		}

		function create_role($data){
			if($this->db->insert('roles', $data)){
	            	return TRUE;
			} else{
		        	return FALSE;
		      }
		}
		function edit_data($where, $table){
			return $this->db->get_where($table,$where);
		}

		function update_data($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		function delete($id){

			//$query=$this->db->query("DELETE FROM roles WHERE id = '$id' ");
			$query=$this->db->query("UPDATE roles SET deleted = 'deleted' WHERE id = '$id' ");
		}

		public function search($name, $date_join_start, $date_join_end){
			$this->db->select('roles.*');
			$this->db->from("roles");

			if ($name != "") {
				$this->db->where("LOWER(roles.name) LIKE '%".$name."%' ");
			}
			if ($date_join_start != "") {
				$this->db->where("roles.created_at BETWEEN '".$date_join_start."' AND '".$date_join_end."'");
			}
			//$this->db->like('name', $name);
			$this->db->where("deleted", "active");
			$this->db->order_by("id DESC");
			$query = $this->db->get();
			return $query;

		}

		function data($number, $offset){
			$this->db->where('deleted','active');
			return $query = $this->db->get('roles',$number,$offset)->result();
		}

		function jumlah_data(){
			return $this->db->get('roles')->num_rows();
		}
	}