<?php 
	defined('BASEPATH') or exit('No Access!');
	class Authentication extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('Query_model', 'startquery');
			$this->load->model('Users_model', 'user');
			$this->load->helper('form');
			$this->load->helper('common');
		}
		public function index(){
			if($this->session->userdata('logged_in')){
				header('location: '. base_url());
			}
			else{
				$this->load->view('web/login/login');
			}
		}
		public function Login(){
			if(!$this->input->post('username')){
				echo j_response('Error','Please insert username!');
				die();
			}
			if(!$this->input->post('password')){
				echo j_response('Error','Please insert password!');
				die();
			}
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$validation = $this->Authentication($username, $password);
			if(isset($validation['data'])){
				$validation['data']['user_profile'] = $this->user->get_logged_in_user_info($validation['data']['userid']);
				$this->session->set_userdata('logged_in',$validation['data']);
			}
			echo json_encode($validation);
		}
		public function Authentication($username, $password){
			$where= array(
				'username' => $username
			);
			$where_email= array(
				'email' => $username
			);
			$validation = $this->startquery->QuerySelect('user_login', '', $where);
			if(count($validation) > 0){
				if($validation[0]['is_active'] != 1){
					if($validation[0]['is_active'] == 2){
						$result['message'] = 'Account is not yet activated! Please contact administrator!';
						$result['status'] = 'Error'; 
					}
					else{
						$result['message'] = 'You do not have access!';
						$result['status'] = 'Error'; 
					}
				}
				else{
					if($validation[0]['password'] == $password){
						$result['status'] 	= 'Success';
						$result['message'] 	= 'Login Success!';
						$result['data']		= $validation[0];
					}
					else{
						$result['status'] 	= 'Error';
						$result['message'] = 'Password does not match';
					}
				}
			}
			else{
				$validation = $this->startquery->QuerySelect('user_login', '', $where_email);
				if(count($validation) > 0){
					if($validation[0]['is_active'] != 1){
						if($validation[0]['is_active'] == 2){
							$result['message'] = 'Account is not yet activated! Please contact administrator!';
							$result['status'] = 'Error'; 
						}
						else{
							$result['message'] = 'You do not have access!';
							$result['status'] = 'Error'; 
						}
					}
					else{
						if($validation[0]['password'] == $password){
							$result['status'] 	= 'Success';
							$result['message'] 	= 'Login Success!';
							$result['data']		= $validation[0];
						}
						else{
							$result['status'] 	= 'Error';
							$result['message'] = 'Password does not match';
						}
					}
				}
				else{
					$result['status'] 	= 'Error';
					$result['message']= 'Username does not exist!';
				}
			}

			return $result;
		}
		public function logout(){
			session_destroy();
			header('location: '.base_url());
		}
	}