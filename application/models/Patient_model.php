<?php
	defined('BASEPATH') or exit('No access!');
	class Patient_model extends CI_Model{

		public function __construct(){
			parent:: __construct();
			date_default_timezone_set('Asia/Shanghai');
	        $this->load->model('query_model', 'startquery');
		}
		public function get_all_patients($patientid = "",$where_cond = [], $like = []){
			$where = [];
			$tables = array(
					'patient_profile' => 'patientid',
					'patient_vitals' => 'patientid',
					'patient_spouse' => 'patientid',
				);
			if(!empty($patientid)){
				$where = array('inf_patient_profile.patientid' => $patientid);
			}
			if($where_cond){
				$where['blood_type'] = $where_cond['blood_type'];
			}
			$all_patients = $this->startquery->QuerySelect($tables, '*, inf_patient_profile.patientid as pat_id',$where, array('inf_patient_profile.date_added' => 'DESC'),'',array(0 => 100),'','',$like);
			if($all_patients){
				$result = [];
				foreach($all_patients as $ap){
					$result[$ap['patientid']] = $ap;
				}
				return $result;
			}
		}
		public function get_all_consultations($type = 1, $cols = "*", $where = [], $like = []){
			$this->db->start_cache();
			$this->db->select($cols);
			$this->db->where('type', $type);
			if($where){
				foreach ($where as $key => $value) {
					$this->db->where($key, $value);
				}
			}
			
	        if($like){
	        	foreach ($like as $lkey => $lvalue) {
	        		$this->db->like($lkey, $lvalue, 'after');
	        	}
	        }
			$this->db->join('patient_profile','inf_consultation.patientid = inf_patient_profile.patientid', 'left');
			$this->db->join('patient_vitals', 'inf_patient_profile.patientid = inf_patient_vitals.patientid', 'left');
			$this->db->join('midwife_record', 'inf_midwife_record.mw_id = inf_consultation.id', 'left');
			$q = $this->db->get('consultation')->result_array();
			if($q){
				$res = [];
				foreach ($q as $key => $value) {
					$res[$value['patientid']] = $value;
					if(isset($value['complaint'])){
						$res[$value['patientid']]['complaint'] = json_decode($value['complaint']);
					}
				}
				return $res;
			}
		}
		public function get_patient_profiles(){
			$all_patients = $this->startquery->QuerySelect($tables, '*, inf_patient_profile.patientid as pat_id',$where, array('inf_patient_profile.date_added' => 'DESC'),'',array(0 => 100));
		}

	}