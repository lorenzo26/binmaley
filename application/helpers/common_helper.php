<?php
	defined('BASEPATH') or exit("NO ACCESS!");
	function j_response($status, $message = "", $data = ""){
		if(!empty($status)){
			return json_encode(array('status' => $status, 'message' => $message, 'data' => $data));
		}else{
			return json_encode(array('status' => 'error'));
		}
		die();
	}
	function check_session(){
		$_ci = & get_instance();
		if(empty($_ci->session->userdata('logged_in'))){
			return $_ci->load->view('web/login/login');
		}
	}