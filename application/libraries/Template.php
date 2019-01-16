<?php
	defined('BASEPATH') or die("NO ACCESS ON FILE!");
	class Template {
		private $_ci;
		private $_navigation = array();
		private $_bodylayout;
		
		public function __construct (){
			$this->_ci = & get_instance();
		}

		public function Content($location, $data = array()) {
			//render navs
			foreach ($this->_navigation AS $nKey => $nVal){
				$contents[$nKey] = $this->_ci->load->view($this->_navigation[$nKey]['view'] , $data, TRUE);
			}
			//now render the whole page
			$contents['maincontent'] = $this->_ci->load->view($location,$data, TRUE);
			$contents['layout_data'] = $this->_bodylayout['data'];
			//render layout
			$this->_ci->load->view($this->_bodylayout['view'] , $contents);
		}
		
		public function Navigations ($type, $location, $data = array()){
			$this->_navigation[$type] = array('view' => 'web/pages/'.$type.'/'.$location,
				'data' => $data	
			);
			return $this;
		}

		public function BodyLayout ($location, $data = array()) {
			$this->_bodylayout = array('view' => 'web/pages/'.$location,
				'data' => $data
			);
			return $this;
		}
	}