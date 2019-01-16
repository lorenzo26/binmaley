<?php
	defined('BASEPATH') or exit('NO ACCESS!');
	class Register extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->model('Query_model', 'startquery');
			$this->load->helper('common');
		}
		public function index(){
			$this->load->view('web/register/register');
		}
		public function validate_registration(){
			$data = $_POST;
			$data['is_active'] = 2;
			$validation = $this->startquery->QuerySelect('user_login', '', array('email' => $_POST['email']));
			$username = $this->startquery->QuerySelect('user_login', '', array('username' => $_POST['username']));
			if(count($validation) > 0){
				echo j_response('Warning', 'Email has been registered!');
			}
			elseif(count($username) > 0){
				echo j_response('Warning', 'Username has been used!');
			}
			else{
				$this->register($data);
			}
		}
		public function register($data = []){
			$save_user = $this->startquery->QueryInsert('user_login', $data);
			if($save_user){
				echo j_response('Success', 'User has been saved. Please contact admin to activate your account.', $data);
			}
			else{
				echo j_response('Error', 'Something went wrong! Please try again!');
			}
		}
	}