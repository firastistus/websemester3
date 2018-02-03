<?php
	if (!defined('BASEPATH'))

    	exit('No direct script access allowed');
	class User_model extends CI_Model {
		var $id;
		function __construct() {
			parent::__construct();
		}

		function get_users(){
			$this->db->select("users.*");
			$this->db->from("users");

			if ($this->id) {
				$this->db->where("id", $this->id);
			}
			
			$this->db->where("deleted", "active");
			$this->db->order_by('id', 'ASC');
			$query = $this->db->get();
			return $query;
		}
		
		function get_roles(){
			$this->db->select("roles.*");
			$this->db->from("roles");

			return $this->db->get();
		}

		function create_user($data){
			if($this->db->insert('users', $data)){
	            	return TRUE;
			} else{
		        	return FALSE;
		      }
		}
		function edit_data($where, $table){
			return $this->db->get_where($table,$where);
		}

		function update_data($id, $data){
			$this->db->where('id', $id);
			if($this->db->update('users', $data)){
				return TRUE;
			}
		}

		function delete($id){

			//$query=$this->db->query("DELETE FROM users WHERE id = '$id' ");
			$query=$this->db->query("UPDATE users SET deleted = 'deleted' WHERE id = '$id' ");
		}
		public function login($data){
			$condition = "username =" . "'" . $data['username'] . "' AND " . "encrypted_password =" . "'" . $data['password'] . "'";
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();
			if ($query->num_rows() == 1) {
				return true;
			}else{
				return false;
			}
		}

		public function read_user_information($username){
			$condition = "username = " . "'" . $username . "'";
			$this->db->select("*");
			$this->db->from("users");
			$this->db->where($condition);
			$this->db->limit(1);
			$query = $this->db->get();

			if ($query->num_rows() == 1) {
				return $query->result();
			}else{
				return false;
			}
		}

		public function search($username, $phone){
			$this->db->select('users.*');
			$this->db->from("users");
			if ($username != "") {
				$this->db->where("LOWER(users.username) LIKE '%".$username."%' ");
			}
			if ($phone != "") {
				$this->db->where("users.phone LIKE '%".$phone."%'");
			}
			if ($date_join_start != "") {
				$this->db->where("DATE(users.created_at) BETWEEN '".$date_join_start."' AND '".$date_join_end."'");
			}
			
			$this->db->where("deleted", "active");
			$this->db->order_by("id DESC");
			$query = $this->db->get();
			return $query;
		}

		function data($number=null, $offset=null, $filter = null){
			$this->db->select("users.*");
			$this->db->from("users");
			$this->db->order_by("id DESC");
			if ($this->id) {
				$this->db->where("id", $this->id);
			}
			if ($filter['username'] != "") {
				$this->db->where("LOWER(users.username) LIKE '%".$filter['username']."%'");
			}

			if ($filter['phone'] != "") {
				$this->db->where("users.phone", $filter['phone']);
			}
			
			$this->db->where("deleted", "active");
			
			if (isset($rows) == 1) {
				$db = $this->db->get();
			}else{
				$this->db->offset($offset);
				$this->db->limit($number);
				$db = $this->db->get();
			}
			return $db;
		}

		function jumlah_data(){
			return $this->db->get('users')->num_rows();
		}
	}