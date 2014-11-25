<?php namespace FollowUp\Services;


class BaseExcel{

	public function create(){
		return new \PHPExcel;
	}

	public function setLogo($obj){
		$objDrawing = new \PHPExcel_Worksheet_Drawing();
		$objDrawing->setPath('../public/assets/images/logo.jpeg');
		$objDrawing->setHeight(45);
		$objDrawing->setWorksheet($obj->getActiveSheet());
	}

	public function setTitulo($obj, $ini, $fin, $titulo){
		$titulo = $titulo != '' ? $titulo : 'sin titulo';
		$this->mergeCelda($obj, $ini, $fin, $titulo,'', 'CENTER','N');
	}



	public function save($obj, $nombre){
		$nombre = $nombre != '' ? $nombre : 'sin nombre';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename='.$nombre.".xlsx");
		$objWriter = \PHPExcel_IOFactory::createWriter($obj, 'Excel2007');
		$objWriter->save('php://output');
		exit;
	}


	/*funciones generales */

	public function mergeCelda($objPHPExcel,$rini,$rfin,$mensaje,$color='', $alinear='',$bordes='',$hgt = 0, $wrap = '', $moneda='', $width = 0){
		$styleArray = array(
			'borders' => array(
				'outline' => array(
					'style' => \PHPExcel_Style_Border::BORDER_THIN,
					'color' => array('argb' => 'FF000000'),
				),
			),
		);
		$objPHPExcel->getActiveSheet()->mergeCells($rini.':'.$rfin);
		$objPHPExcel->getActiveSheet()->setCellValue($rini,$mensaje);

		if($color != ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini.':'.$rfin)->getFill()
			->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)
			->getStartColor()->setARGB($color);
		}

		if($alinear == 'CENTER'){
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setHorizontal(\PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setVertical(\PHPExcel_Style_Alignment::VERTICAL_CENTER);
		}
		if($bordes == ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini.':'.$rfin)->applyFromArray($styleArray);
		}

		if($hgt != 0){
			$num = substr($rini, 1);
			$objPHPExcel->getActiveSheet()->getRowDimension($num)->setRowHeight($hgt);
		}

		if($wrap != '')
		{
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getAlignment()->setWrapText(true);
		}

		if($moneda != ''){
			$objPHPExcel->getActiveSheet()->getStyle($rini)->getNumberFormat()->setFormatCode('$  #,##0.00');
		}
		if($width != 0){
			$letter = substr($rini, 0, 1);
			$objPHPExcel->getActiveSheet()->getColumnDimension($letter)->setWidth($width);
		}






	}

}
