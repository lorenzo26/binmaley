<?php 
	defined('BASEPATH') or die("NO ACCESS!");
	class Query_model extends CI_Model{
	
		public function __construct(){
			parent:: __construct();
			date_default_timezone_set('Asia/Shanghai');
		}
		public function QuerySelect($tables,  $fields = [], $where = [], $order_by = [], $group_by = '', $limit = [], $paging = [], $search = [], $like =[] ){
	        if (empty($tables)) {
	            throw new Exception("no table declared");
	        }

	        $this->db->start_cache();

	        # Start query
	        if (!empty($fields)) {
	            $this->db->select($fields);
	        } else {
	            $this->db->select('*');
	        }

	        if (is_array($tables)) {
	            $first_row = true;
	            foreach ($tables as $key => $val) {
	                if ($first_row) {
	                    $this->db->from($key);
	                    $first_row = false;
	                } else {
	                    $this->db->join($key, $val, 'LEFT');
	                }
	            }
	        }else{
	        	$this->db->from($tables);
	        }
	        if($like){
	        	foreach ($like as $lkey => $lvalue) {
	        		$this->db->like($lkey, $lvalue, 'after');
	        	}
	        }
	        if (!empty($where)) {
	            foreach ($where as $key => $val) {
	                if (is_array($val)) {
	                    $this->db->where_in($key, $val);
	                } else {
	                    $this->db->where($key, $val);
	                }
	            }
	        }
	        if (!empty($limit)) {
	        	if(empty($where)){
	        		$this->db->where('patientid != -1');
	        	}
	            if (is_array($limit)) {
	                foreach ($limit as $key => $val) {
	                	$this->db->limit($val, $key);
	                }
	            } else {
	                $this->db->limit($limit);
	            }
	        }
	        if (!empty($order_by)) {
	            foreach ($order_by as $o => $b) {
	                if (is_numeric($o)) {
	                    $this->db->order_by($b, 'ASC');
	                } else {
	                    $this->db->order_by($o, $b);
	                }
	            }
	        }

	        if (!empty($group_by)) {
	            $this->db->group_by($group_by);
	        }

	        if (!empty($search)) {
	            $like_statements = array();
	            foreach ($search as $key => $value) {
	                $like_statements[] = "{$key} LIKE '%{$value}%'";
	            }
	            $like_string = "(" . implode(' OR ', $like_statements) . ")";
	            $this->db->where($like_string);
	        }

	        if (!empty($paging['per_page'])) {
	            $this->db->limit($paging['per_page'], $paging['segment']);
	        }

	        $query = $this->db->get();
	        # End Query

	        $this->db->stop_cache();
	        $this->db->flush_cache();
	        return $query->result_array();
	    }
		public function QueryInsert($table, $data){
			$insert = $this->db->insert($table, $data);
			if ($insert) {
			    $insert_id = $this->db->insert_id();
				return $insert_id;
			}else{
				return false;
			}
		}
		public function QueryDelete($table, $data){
			$delete = $this->db->delete($table, $data);
			if ($delete) {
				return true;
			}else{
				return false;
			}
		}
		public function QueryDelete_Batch($table, $key, $arr){
			$this->db->where_in($key, $arr);
			$delete = $this->db->delete($table);
			if ($delete) {
				return true;
			}else{
				return false;
			}
		}
		public function QueryInsert_Batch($table, $data){
			return $this->db->insert_batch($table, $data);
		}

		public function QueryUpdate($table, $data, $param){
			return $this->db->update($table, $data, $param);
		}

		public function QueryUpdate_Batch($table, $data, $key){
			return $this->db->update_batch($table, $data, $key);
		}
	}