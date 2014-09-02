<?php namespace FollowUp\Services;


class BasePdf extends \TCPDF {
    public function Header() {
        // Logo
        $image_file = "../public/assets/images/logo.png";
        $this->Image($image_file, 10, 10, 35, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        $this->SetFont('helvetica', 'B', 10);
        $this->Cell(0, 0, '', 0, 1, 'C', 0, '', 0);
        $this->Cell(0, 0, 'DIRECCION GENERAL', 0, 1, 'C', 0, '', 0);
        $this->Cell(0, 0, 'TARJETA DE INSTRUCCIÓN', 0, 1, 'C', 0, '', 0);


        //logo 2
        $image_file = "../public/assets/images/logo1.png";
        $this->Image($image_file, 180, 10, 15, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

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