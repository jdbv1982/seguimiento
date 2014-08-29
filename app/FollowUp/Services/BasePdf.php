<?php namespace FollowUp\Services;


class BasePdf extends \TCPDF {
    public function Header() {
        // Logo
        $image_file = "../public/assets/images/logo.png";
        $this->Image($image_file, 10, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        //logo 2
        $image_file = "../public/assets/images/logo1.png";
        $this->Image($image_file, 170, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Cell(0, 15, 'DIRECCION GENERAL', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        //$this->Cell(0, 30, 'TARJETA DE INSTRUCCION', 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
} 