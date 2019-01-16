<?php 
	defined('BASEPATH') or die("NO ACCESS!");
	class Users_model extends CI_Model{
	
		public function __construct(){
			parent:: __construct();
			date_default_timezone_set('Asia/Shanghai');
			$this->load->model('Query_model', 'startquery');
		}
		public function login_process($username, $password){
			$this->db->start_cache();
			$this->db->where('username', $username);
			$this->db->where('password', $password);
			$query = $this->db->get('tbl_users')->result_array();
			$this->db->stop_cache();
			$this->db->flush_cache();
			return $query;
		}
		public function get_logged_in_user_info($user_id = ""){
			$this->db->start_cache();
			$this->db->where('userid', $user_id);
			$query = $this->db->get('user_profile')->result_array();
			$this->db->stop_cache();
			$this->db->flush_cache();
			if($query){
				$value = $query[0];
				$value['fullname'] = $query[0]['lastname'].', '.$query[0]['firstname'].' '.$query[0]['middlename'];
				return $value;
			}
		}
		public function get_all_users($like = []) {
			$where = "";
			$tables = array(
					'user_login' => 'userid',
					'user_profile' => 'userid',
				);
			if(!empty($patientid)){
				$where = array('inf_patient_profile.patientid' => $patientid);
			}
			 if($like){
	        	foreach ($like as $lkey => $lvalue) {
	        		$this->db->like($lkey, $lvalue, 'after');
	        	}
	        }
			$all_users = $this->startquery->QuerySelect($tables);
			$res = [];
			foreach ($all_users as $key => $value) {
				$res [$value['userid']] = $value;
				if($value['lastname'] && $value['firstname']){
					$res [$value['userid']]['fullname'] = $value['lastname'].', '.$value['firstname']. ' '.$value['middlename'];
				}
			}
			return $res;
		}
	}