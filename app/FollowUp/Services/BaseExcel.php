<?php namespace FollowUp\Services;


class BaseExcel{

	public function printInformacionBase(){
		 $objPHPExcel = new \PHPExcel();
		    $objPHPExcel->setActiveSheetIndex(0)
		            ->setCellValue('A1', 'imprimiendo desde')
		            ->setCellValue('A2', 'la clase base de excel!');
		    header('Content-Type: application/vnd.ms-excel');
		    header('Content-Disposition: attachment;filename="01simple.xlsx"');
		    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		    $objWriter->save('php://output');
		    exit;
	}

}
