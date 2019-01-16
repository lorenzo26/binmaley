<?php 
	defined('BASEPATH') or exit('No access!');
	function Excel_Export($filename='binmaley-inf-file', $exc_title='Binmaley Infirmary', $content=[], $content_body=[]){
		$_CI = & get_instance();
		$head = $arr = [];

		// $content [0]['col1'] ="154";
		// $content [0]['col2'] ="1212";
		// $content [0]['col3'] ="1212";
		// $content [0]['col4'] ="1212";
		// $content [0]['col5'] ="1212";
		// $content [0]['col6'] ="1212";
		// $content [0]['col7'] ="1212";
		// $content [0]['col8'] ="1212";
		// $content [1]['col1'] ="154";
		// $content [1]['col2'] ="1212";
		// $content [1]['col3'] ="1212";
		// $content [1]['col4'] ="1212";
		// $content [1]['col5'] ="1212";
		// $content [1]['col6'] ="1212";
		// $content [1]['col7'] ="1212";
		// $content [1]['col8'] ="1212";
		
		$_CI->load->library('excel');

		$_CI->excel->setActiveSheetIndex(0);

		$_CI->excel->getActiveSheet()->setTitle($exc_title);

		$_CI->excel->getActiveSheet()->setCellValue('A1', $exc_title);

		foreach($content[0] as $cont_key => $cont_val ){
			$head[] = $cont_key;
		} 
		$_CI->excel->getActiveSheet()->fromArray($head, null, 'A2');
		$i = 3;
		foreach($content as $cont){
			$_CI->excel->getActiveSheet()->fromArray($cont, null, 'A'.$i);
			$i++;
		}

		$_CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
		$_CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$_CI->excel->getActiveSheet()->getStyle('A2:Z2')->getFont()->setSize(13);
		$_CI->excel->getActiveSheet()->getStyle('A2:Z2')->getFont()->setBold(true);
		$_CI->excel->getActiveSheet()->getStyle('A2:Z2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$_CI->excel->getActiveSheet()->mergeCells('A1:D1');
		$_CI->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'.xls"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
			             
		$objWriter = PHPExcel_IOFactory::createWriter($_CI->excel, 'Excel5');  
		$objWriter->save('php://output');
	}