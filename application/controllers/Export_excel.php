<?php 
	defined('BASEPATH') or exit('No access!');
	class Export_excel extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			$this->load->helper('excel');
			$this->load->model('Query_model', 'startquery');
			$this->load->model('patient_model', 'patient');
		}
		public	function index(){
			$where = [];
				foreach ($_GET as $k => $v) {
					if($v != NULL){
						$where[$k] = $v;
					}
				}
				$patients = $this->startquery->QuerySelect('patient_profile','', $where);
				$head = [];
				if($patients){
					foreach ($patients[array_keys($patients)[0]] as $key => $value) {
						array_push($head, $key );
					}
				}
				$data['header'] = $head;
				$data['value'] = $patients;
			$this->load->view('web/excel/template',$data);
		}
		public function excel_all_patients(){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$where = [];
				foreach ($_GET as $k => $v) {
					if($v != NULL){
						$where[$k] = $v;
					}
				}
				$patients = $this->startquery->QuerySelect('patient_profile','', $where);
				$head = [];
				if($patients){
					foreach ($patients[array_keys($patients)[0]] as $key => $value) {
						array_push($head, $key );
					}
				}
				$data['header'] = $head;
				$data['value'] = $patients;
				$data['title'] = 'Binmaley Infirmary Export All Patients';
				$this->load->view('web/excel/template',$data);
			}
		}
		public function excel_patients_from($filename = 'All Patients'){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$where = [];
				foreach ($_GET as $k => $v) {
					if($v != NULL){
						$where[$k] = $v;
					}
				}
				$cols = ['inf_patient_profile.patientid','lastname','firstname','middlename', 'birthdate','gender','address', 'civilstatus'];
				$patients = $this->patient->get_all_consultations($_GET['type'], $cols, $where);
				$head = [];
				if($patients){
					foreach ($patients[array_keys($patients)[0]] as $key => $value) {
						array_push($head, $key );
					}
				}
				$data['header'] = $head;
				$data['value'] = $patients;
				$data['title'] = 'Binmaley Infirmary Export Patients';
				$this->load->view('web/excel/template',$data);
			}
		}
		public function export_report_midwife(){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$month = date('m');
				$year  = date('Y');
				$data['patients'] = $this->patient->get_all_consultations(0, '', ['MONTH(consultation_date)' => $month, 'YEAR(consultation_date)' => $year]);
				$header = ['Ultrasound','PAP SMEAR','PNC','Others'];
				$data['pnc']        = 0;
				$data['ultrasound'] = 0;
				$data['pap_smear']  = 0;
				$data['others']     = 0;
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
				$c[0]['Ultrasound'] = $data['ultrasound'];
				$c[0]['PAP SMEAR'] = $data['pap_smear'];
				$c[0]['PNC'] = $data['pnc'];
				$c[0]['Others'] = $data['others'];
				$data['header'] = $header;
				$data['value'] = $c;
				$data['title'] = 'Export Midwife Report';
				$this->load->view('web/excel/template',$data);
			}
		}
		public function export_report_dental(){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$month = date('m');
				$year  = date('Y');
				$data['patients'] = $this->patient->get_all_consultations(1, '', ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y')]);
				$data['ta']     = 0;
				$data['dt']     = 0;
				$data['bg']     = 0;
				$data['bb']     = 0;
				$data['others'] = 0;
				$header = ['Toothache','Decayed Tooth','Bleeding Gum', 'Bad Breath','Others'];
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
				$c[0]['Toothache'] = $data['ta'];
				$c[0]['Decayed Tooth'] = $data['dt'];
				$c[0]['Bad Breath'] = $data['bg'];
				$c[0]['Bleeding Gum'] = $data['bb'];
				$c[0]["Others"] = $data['others'];
				$data['header'] = $header;
				$data['value'] = $c;
				$data['title'] = 'Export Dental Report';
				$this->load->view('web/excel/template',$data);
			}
		}
		public function export_report_others(){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$month = date('m');
				$year  = date('Y');
				$data['patients'] = $this->patient->get_all_consultations(2, '', ['MONTH(consultation_date)' => date('m'), 'YEAR(consultation_date)' => date('Y')]);
				$header = ['Abdominal Pain','Annual PE','Abscess Formation','Others'];
				$data['abdom_pain']    = 0;
				$data['annual_pe']     = 0;
				$data['abc_formation'] = 0;
				$data['others']        = 0;
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
				$c[0]['Abdominal Pain'] = $data['abdom_pain'];
				$c[0]['Annual PE'] = $data['annual_pe'];
				$c[0]['Abscess Formation'] = $data['abc_formation'];
				$c[0]['Others'] = $data['others'];
				$data['header'] = $header;
				$data['value'] = $c;
				$data['title'] = 'Export Diagnosis Report';
				$this->load->view('web/excel/template',$data);
			}
			
		}
		public function export_history($patient_id = ''){
			if(!$this->session->userdata('logged_in')){
				$this->load->view('web/login/login');
			}
			else{
				$hist_print = [];
				$patient = $this->startquery->QuerySelect('patient_profile','*', ['patientid' => $patient_id])[0];
				$history =  $this->startquery->QuerySelect('consultation','', ['patientid' => $patient_id]);
				if($history){
					$cnt = 0;
					foreach ($history as $value) {
						$hist_print[$cnt]['Date'] =  $value['consultation_date'];
						if($value['type'] == 1){
							$val = 'Dental';
						}elseif($value['type'] == 0){
							$val = 'Midwife';
						}else{
							$val = 'Others';
						}
						$hist_print[$cnt]['Type'] =  $val;
						$comp = "";
						foreach (json_decode($value['complaint']) as $key => $compv) {
							$comp = $comp . ', '.$compv;
						}
						$hist_print[$cnt]['Complaint'] =  ltrim($comp, ',');
						$cnt ++;
					}
				}
				$header = ['Date', 'Type', 'Complaint'];
				$data['patient'] = $patient;
				$data['header'] = $header;
				$data['value'] = $hist_print;
				$data['title'] = 'Export Patient Record';
				$this->load->view('web/excel/patient_history_template',$data);
			}
		}
	}