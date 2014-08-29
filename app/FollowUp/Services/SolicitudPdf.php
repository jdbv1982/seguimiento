<?php namespace FollowUp\Services;

use TCPDF, Response;

class SolicitudPdf extends BasePdf {


    public function imprime($solicitud){
        // create new PDF document
        $pdf = new BasePdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set font
        $pdf->SetFont('times', 'I', 10);

// add a page
        $pdf->AddPage();

        $html = '<table border="1px">
                    <tr>
                        <td>DIRIGIDO A:</td>
                        <td colspan="3">';


        foreach ($solicitud->dirigidos as $dirigido){
            $html .= $dirigido->departamentos->nombre. ', ';
        }
        $html .= '</td>
                    </tr>
                    <tr>
                        <td>FECHA DE:</td>
                        <td>'.$solicitud->fecha_direccion.'</td>
                        <td>FOLIO:</td>
                        <td>'.$solicitud->id.'</td>
                    </tr>
                    <tr>
                        <td>DESCRIPCIÓN:</td>
                        <td colspan="3">'.$solicitud->descripcion_solicitud.'</td>
                    </tr>
                    <tr>
                        <td rowspan="5">TEMA:</td>
                        <td>SOLICITUD</td>
                        <td colspan="2">'.$solicitud->tipo->clave.'</td>
                    </tr>
                    <tr>
                        <td>ESPECIFICO</td>
                        <td colspan="2">'.$solicitud->caracteristica.'</td>
                    </tr>
                    <tr>
                        <td>GESTION ADMINISTRATIVA</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>GESTION TECNICA</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>VIABILIDAD FINANCIERA</td>
                        <td colspan="2"></td>
                    </tr>
                    <tr>
                        <td>ACCIÓN</td>
                        <td colspan="3">'.$solicitud->accion.'</td>
                    </tr>
                    <tr>
                        <td>UBICACIÓN</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td>INSTRUCCIÓN</td>
                        <td colspan="3">'.$solicitud->instruccion.'</td>
                    </tr>
                    <tr>
                        <td>RESPUESTA</td>
                        <td colspan="3">'.$solicitud->respuesta->nombre.'</td>
                    </tr>
                    <tr>
                        <td>RESIDENCIA</td>
                        <td colspan="3">'.$solicitud->residencia->nombre.'</td>
                    </tr>
                    <tr>
                        <td>C.C.P.</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td colspan="2">Firma</td>
                    </tr>
                </table>';

// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');


        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'I');

        return Response::download($filename);
    }
} 