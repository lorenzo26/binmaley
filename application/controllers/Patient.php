<?php
	defined('BASEPATH') or exit("No access!");
	class Patient extends CI_Controller{
		public function __construct(){
			parent :: __construct();
			$this->load->helper('common');
	        $this->load->model('query_model', 'startquery');
			$this->load->model('patient_model', 'patient');
		}
		public function index(){
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// echo "<pre>";
				// $data['css'] = '';
				$where = [];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_patients('',$where, $like);
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/patient_list', $data);
			}
		}
		public function dental(){
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
					// $data['css'] = '';
				$where = [];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				// $data['css'] = '';
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations('',$where, $like);
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/dental', $data);
			}
		}
		public function midwife() {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				// echo "<pre>";
				$where = [];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations(0,$where, $like);
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/midwife', $data);
			}
		}
		public function other_patients() {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$where = [];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				// $data['css'] = '';
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations(2,$where, $like);
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/other_patients', $data);
			}
		}
		public function history($patient_id) {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$where = [];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				if(!$patient_id) header('location: '.base_url()."patient");
				// $data['css'] = '';
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				// echo "<pre>";
				$data['patient'] = $this->startquery->QuerySelect('patient_profile','*', ['patientid' => $patient_id])[0];
				$history = $this->startquery->QuerySelect(['consultation' => 'vitals_id', 'patient_vitals' => 'id'],'*, inf_consultation.id as cons_id', ['inf_consultation.patientid' => $patient_id]);
				if($history){
					foreach ($history as $value) {
						$data['history'][$value['cons_id']] = $value;	
						$data['history'][$value['cons_id']]['complaint'] = json_decode($data['history'][$value['cons_id']]['complaint']);
					}
				}
				// print_r($data['history']); die();
				if(isset($data['history'])){
					$data['json_cons_record'] = json_encode($data['history']);
				}
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/history', $data);
			}
		}
		public function save(){
			$patient_spouse = [];
			$midwife_record = [];
			$patient_profile = array(
				'birthdate' 	 	=> $_POST['birthdate'],
				'contact_number' 	=> $_POST['contact_number'],
				'firstname'		 	=> $_POST['firstname'],
				'gender'		 	=> $_POST['gender'],
				'lastname'		 	=> $_POST['lastname'],
				'middlename'	 	=> $_POST['middlename'],
				'address'		 	=> $_POST['address'],
				'blood_type'		=> $_POST['blood_type'],
				'mother_maidenname'	=> $_POST['mother_maidenname'],
				'civilstatus'		=> $_POST['civilstatus'],
			);
			$patient_vitals = array(
				'bp' 	 => $_POST['bp'],
				'height' => $_POST['height'],
				'hr' 	 => $_POST['hr'],
				'rr' 	 => $_POST['rr'],
				'temp' 	 => $_POST['temp'],
				'weight' => $_POST['weight'],
			);
			$complaint      = [];
			$complaint_type = "";
			if(isset($_POST['complaint_type'])){
				$complaint_type = $_POST['complaint_type'];
				if(isset($_POST['complaint']) && count($_POST['complaint']) > 0){
					$complaint = $_POST['complaint'];
				}
				$other_complaint = 'other_complaint'.$complaint_type;
				if(!empty($_POST[$other_complaint])){
					array_push($complaint, $_POST[$other_complaint]);
				}
			}
			if(isset($_POST['sp_lname']) || isset($_POST['sp_fname'])){
				$patient_spouse = array(
					'sp_firstname' => $_POST['sp_fname'],
					'sp_lastname'  => $_POST['sp_lname']
				);
			}
			if(isset($_POST['pregnancy_stage'])){
				$midwife_record = array('pregnancy_stage' => $_POST['pregnancy_stage'], 'child_count' => $_POST['child_count']);
			}
			if(isset($_POST['patientid']) AND $_POST['patientid'] != NULL){
				$vitals_id = $_POST['vitals_id'];
				$save_patient = $this->update_patient_profile($_POST['patientid'], $patient_profile, $patient_vitals, $complaint, $complaint_type, $vitals_id, $patient_spouse);
			}
			else{
				$save_patient = $this->save_patient_profile($patient_profile, $patient_vitals, $complaint, $complaint_type, $patient_spouse, $midwife_record);
			}
			echo json_encode($save_patient);
		}
		public function update_patient_profile($id, $profile = [], $vital = [], $complaint = [], $complaint_type="", $vitals_id="",$patient_spouse = []){
			$res['status'] 		= 'Success';
			$res['message'] 	= 'Successfully Saved!';
			$vital['patientid'] = $id;
			$upd_profile = $this->startquery->QueryUpdate('patient_profile', $profile, array('patientid' => $id));
			$upd_vitals = $this->startquery->QueryUpdate('patient_vitals', $vital, array('patientid' => $id, 'id' => $vitals_id));
			if(!$upd_profile){
				$res['status'] = 'Error';
				$res['message'] = 'Patient Record not updated!';
			}
			if(!$upd_vitals){
				$res['status']  = 'Error';
				$res['message'] = 'Patient Vitals not updated!';
			}
			if($complaint){
				$save_complaint = $this->save_patient_complaint($id, $vitals_id, $complaint, $complaint_type);
				if(!$save_complaint){
					$res['status'] = 'Warning';
					$res['message'] = 'Patient complaint not saved! Problem encountered!';
				}
			}
			if($patient_spouse){
				$spouse = $this->startquery->QuerySelect('patient_spouse','*', ['patientid' => $id]);
				if(count($spouse) > 0){
					$upd_profile = $this->startquery->QueryUpdate('patient_spouse', $patient_spouse, array('patientid' => $id));
				}
				else{
					$patient_spouse['patientid']  = $id;
					$patient_spouse['sp_date_added'] = date('Y-m-d H:i:s');
					$save_spouse = $this->startquery->QueryInsert('patient_spouse', $patient_spouse);
					if(!$save_spouse){
						$res['status']  = 'Error';
						$res['message'] = 'Patient Spouse not saved!';
					}
				}
			}
			return $res;
		}
		public function save_patient_profile($profile = [], $vital = [], $complaint = [], $complaint_type = 1, $patient_spouse = [], $midwife_record = []){
			$res['status'] = 'Success';
			$res['message'] = 'Successfully Saved!';
			$save_profile = $this->startquery->QueryInsert('patient_profile', $profile);
			if($save_profile){
				$vital['patientid'] = $save_profile;
				$save_vital = $this->startquery->QueryInsert('patient_vitals', $vital);
				if(!$save_vital){
					$res['status']  = 'Warning';
					$res['message'] = 'Patient Vitals not saved! Problem encountered!';
				}
				else {
					if(isset($complaint) && count($complaint) > 0){
						$save_complaint = $this->save_patient_complaint($vital['patientid'], $save_vital, $complaint, $complaint_type);
						if(!$save_complaint){
							$res['status']  = 'Warning';
							$res['message'] = 'Patient complaint not saved! Problem encountered!';
						}
						else{
							$midwife_record['mw_id'] = $save_complaint;
							$save_mw_record = $this->startquery->QueryInsert('midwife_record', $midwife_record);
							if(!$save_mw_record){
								$res['status']  = 'Warning';
								$res['message'] = 'Midwife Record not saved! Problem encountered!';
							}
						}
					}
				}
				if($patient_spouse){
					$patient_spouse['patientid']  = $save_profile;
					$patient_spouse['sp_date_added'] = date('Y-m-d H:i:s');
					$save_spouse = $this->startquery->QueryInsert('patient_spouse', $patient_spouse);
					if(!$save_spouse){
						$res['status'] = 'Warning';
						$res['message'] = 'Patient spouse record not saved! Problem encountered!';
					}
				}
			}
			else{
				$res['status'] = 'Error';
				$res['message'] = 'Something went wrong! Please try again';
			}
			return $res;
		}
		public function save_patient_complaint($patientid = "", $vital_id = "", $complaint = [], $complaint_type = 1){
			$patient_complaint = array(
					'patientid' 		=> $patientid,
					'vitals_id'	 		=> $vital_id,
					'complaint'  		=> json_encode($complaint),
					'consultation_date' => date('Y-m-d'),
					'type' 				=> $complaint_type
				);
			$save_complaint = $this->startquery->QueryInsert('consultation', $patient_complaint);
			return $save_complaint;
		}
		public function add($patient_id = '', $type = ""){
			// echo $type; die();
			$data = [];
			$data['patient'] = [];
			$data['patient']['id'] = "";
			$data['comp_type'] = $type;
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				if($patient_id != ""){
					$data['patient'] = $this->patient->get_all_patients($patient_id);
					$data['patient']['id'] = $patient_id;
				}
				$data['js']	 = base_url('assets/js/js_add_patient.js');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head'); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/add', $data);
			}
		}
		public function midwife_report() {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				// echo "<pre>";
				$where = ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y')];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations(0, $where, $like);
				// echo "<pre>";
				$data['ultrasound'] = 0;
				$data['pap_smear']  = 0;
				$data['pnc']        = 0;
				$data['others']     = 0;
				if(isset($data['patients'])){
					foreach ($data['patients'] as $key => $value) {
						foreach($value['complaint'] as $comp){
							if($comp == 'premental check-up'){
								$data['pnc'] ++;
							}
							elseif($comp == 'ultrasound'){
								$data['ultrasound'] ++;
							}
							elseif($comp == 'pap smear'){
								$data['pap_smear'] ++;
							}
							else{
								$data['others'] ++;
							}
						}
					}
				}
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/midwife_report', $data);
			}
		}
		public function dental_report() {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				// echo "<pre>";
				$where = ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y')];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations(1, '', $where,$like);
			;
				$data['ta']     = 0;
				$data['dt']     = 0;
				$data['bg']     = 0;
				$data['bb']     = 0;
				$data['others'] = 0;
				if(isset($data['patients'])){
					foreach ($data['patients'] as $key => $value) {
						foreach($value['complaint'] as $comp){
							if($comp == 'Toothache'){
								$data['ta'] ++;
							}
							elseif($comp == 'Decayed Tooth'){
								$data['dt'] ++;
							}
							elseif($comp == 'Bad Breath'){
								$data['bb'] ++;
							}
							elseif($comp == 'Bleeding Gum'){
								$data['bg'] ++;
							}
							else{
								$data['others'] ++;
							}
						}
					}
				}
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/dental_report', $data);
			}
		}
		public function other_patients_report() {
			$data = [];
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				// $data['css'] = '';
				// echo "<pre>";
				$where = ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y')];
				$like = [];
				if(isset($_GET['blood_type']) && ($_GET['blood_type'] == 'O' || $_GET['blood_type'] == 'A' || $_GET['blood_type'] == 'AB' || $_GET['blood_type'] == 'B')){
					$where['blood_type'] = $_GET['blood_type'];
				}
				if(isset($_GET['search_firstname']) && !empty($_GET['search_firstname'])){
					$like ['firstname'] = $_GET['search_firstname'];
				}
				if(isset($_GET['search_lastname']) && !empty($_GET['search_lastname'])){
					$like ['lastname'] = $_GET['search_lastname'];	
				}
				$data['js']	 = base_url('assets/js/js_patient_list.js');
				$data['patients'] = $this->patient->get_all_consultations(2, '', $where,$like);
				$data['abdom_pain']    = 0;
				$data['annual_pe']     = 0;
				$data['abc_formation'] = 0;
				$data['others']        = 0;
				if(isset($data['patients'])){
					foreach ($data['patients'] as $key => $value) {
						foreach($value['complaint'] as $comp){
							if($comp == 'Abdominal Pain'){
								$data['abdom_pain'] ++;
							}
							elseif($comp == 'Annual PE'){
								$data['annual_pe'] ++;
							}
							elseif($comp == 'Abscess Formation'){
								$data['abc_formation'] ++;
							}
							else{
								$data['others'] ++;
							}
						}
					}
				}
				$data['json_patients'] = json_encode($data['patients']);
				// print_r($data['json_patients']);die();
				$data['logged_in'] = $this->session->userdata('logged_in');
				$this->template->BodyLayout('default_layout'); //location, data
				$this->template->Navigations('head','head', $data['logged_in']); //type. location , data
				$this->template->Navigations('foot','foot');
				$this->template->Navigations('side','side');
				$this->template->Content('web/patient/other_patients_report', $data);
			}
		}
	}