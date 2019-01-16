<?php
	defined('BASEPATH') or exit("No access!");
	class Home extends CI_Controller{
		public function __construct(){
			parent :: __construct();
			$this->load->helper('common');
			$this->load->model('Query_model', 'startquery');
		}
		public function index(){
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				// $data['js']	 = '';
				$data['dental'] = $this->startquery->QuerySelect('consultation','count(id) as total', ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y'), 'type'=> '1'])[0]['total'];
				$data['midwife'] = $this->startquery->QuerySelect('consultation','count(id) as total', ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y'), 'type'=> '0'])[0]['total'];
				$data['other'] = $this->startquery->QuerySelect('consultation','count(id) as total', ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y'), 'type'=> '2'])[0]['total'];
				
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/content/home', $data);
			}
		}
	}