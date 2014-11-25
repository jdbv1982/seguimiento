<?php namespace FollowUp\Services;

class SolicitudExcel extends BaseExcel{

	public function printInformacion($solicitudes, $nombre){
		 $objExcel = $this->create();
		 $this->setLogo($objExcel);
		 $this->setTitulo($objExcel,'C2', 'N2', $nombre);

		 $this->setCabeceras($objExcel);
		 $this->setInfo($objExcel, $solicitudes);


		 $this->save($objExcel, $nombre);

	}


	public function setCabeceras($obj){
	//($objPHPExcel,$rini,$rfin,$mensaje,$color='', $alinear='',$bordes='',$hgt = 0, $wrap = '', $moneda='', $width = 0)
		$this->mergeCelda($obj, 'C4', 'C4', '#','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'D4', 'D4', 'Instrucción','','CENTER','N',0,'Y','',60);
		$this->mergeCelda($obj, 'E4', 'E4', 'comentario','','CENTER','N',0,'Y','',60);
		$this->mergeCelda($obj, 'F4', 'F4', 'Descripción','','CENTER','N',0,'Y','',60);
		$this->mergeCelda($obj, 'G4', 'G4', 'Respuesta','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'H4', 'H4', 'Estatus','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'I4', 'I4', 'Region','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'J4', 'J4', 'Municipio','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'K4', 'K4', 'Localidad','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'L4', 'L4', 'Residencia','','CENTER','N',0,'Y','',25);
		$this->mergeCelda($obj, 'M4', 'M4', 'Tipo','','CENTER','N',0,'Y','',0);
		$this->mergeCelda($obj, 'N4', 'N4', 'Año','','CENTER','N',35,'Y','',0);
	}

	public function setInfo($obj, $solicitudes){
		 $i=5;
		foreach ($solicitudes as $key => $dato) {
			$obj->getActiveSheet()->setCellValue('C'.$i, $dato->id);
			$obj->getActiveSheet()->setCellValue('D'.$i, $dato->instruccion);
			$obj->getActiveSheet()->setCellValue('E'.$i, $dato->comentario);
			$obj->getActiveSheet()->setCellValue('F'.$i, $dato->descripcion_solicitud);
			$obj->getActiveSheet()->setCellValue('G'.$i, $dato->respuesta->nombre);
			$obj->getActiveSheet()->setCellValue('H'.$i, $dato->state->status);
			$obj->getActiveSheet()->setCellValue('I'.$i, $dato->region->nombre);
			$obj->getActiveSheet()->setCellValue('J'.$i, $dato->municipio->nombre);
			$obj->getActiveSheet()->setCellValue('K'.$i, $dato->localidad->nombre);
			$obj->getActiveSheet()->setCellValue('L'.$i, $dato->residencia->nombre);
			$obj->getActiveSheet()->setCellValue('M'.$i, $dato->tipo->nombre);
			$obj->getActiveSheet()->setCellValue('N'.$i, date("Y", strtotime($dato->fecha_direccion)));

		$i++;
		}

	}

}
