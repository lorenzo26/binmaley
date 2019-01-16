<?php
	defined('BASEPATH') or exit('No access');
	class User extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->helper('common');
	        $this->load->model('query_model', 'startquery');
			$this->load->model('users_model', 'users');
		}
		public function index(){
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$where = [];
				$like = [];
				// $data['css'] = '';
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_user_list.js');
				$data['users'] = $this->users->get_all_users( $like);
				$data['json_users'] = json_encode($data['users']);

				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/user/user_list', $data);
			}
		}
		public function update_user_status(){
			if(!isset($_POST['is_active'])){
				header('location: '.base_url());
			}
			$res['status'] = 'Error';
			$res['message'] = 'Error on updating user!';
			$update = $this->startquery->QueryUpdate('user_login', array('is_active' => $_POST['is_active'] ), array('userid' => $_POST['userid']));
			if($update){
				$res['status'] = 'Success';
				$res['message'] = 'User has been updated!';
			}
			print_r(json_encode($res));
		}
		public function my_profile(){
			$res['status'] = 'Success';
			$res['message'] = 'Profile updated!';
			$query = $this->startquery->QuerySelect(array('inf_user_profile' => 'userid', 'inf_user_login' => 'userid'), '*', array('inf_user_profile.userid' => $_POST['userid']));
			$user_profile_data = array(
				'userid' 	=> $_POST['userid'],
				'firstname' => $_POST['firstname'],
				'middlename' => $_POST['middlename'],
				'lastname' => $_POST['lastname'],
				'position' => $_POST['position']
			);
			$user_login_data = array(
				'userid' 	=> $_POST['userid'],
				'username' => $_POST['username'],
				'password' => $_POST['password']
			);
			$userid= array ('userid' => $_POST['userid']);
			if(count($query) > 0){
				$update = $this->update_myprofile($user_profile_data, $userid);
			}
			else{
				$save = $this->startquery->QueryInsert('user_profile',$user_profile_data);
			}
			$this->update_mylogin($user_login_data, $userid);
			$validation = [];
			$validation['data'] = $this->startquery->QuerySelect('user_login', '*', $userid)[0];
			$validation['data']['user_profile'] = $this->users->get_logged_in_user_info($_POST['userid']);
			$this->session->set_userdata('logged_in',$validation['data']);

			print_r(json_encode($res));
		}
		public function update_myprofile($data = [], $userid = []){
			$update = $this->startquery->QueryUpdate('user_profile', $data ,$userid);
			if(!$update){
				$res ['status'] = 'Warning';
				$res['message'] = 'Profile not updated! Please try again!';
				return $res;
			}
		}
		public function update_mylogin($data = [], $userid){
			$update = $this->startquery->QueryUpdate('user_login', $data, $userid);
			if(!$update){
				$res ['status'] = 'Warning';
				$res['message'] = 'User login not updated! Please try again!';
				return $res;
			}
		}
	}