<?php namespace FollowUp\Services;

use TCPDF, Response;

class SolicitudPdf extends BasePdf {


    public function imprime($solicitud){

        $especifico = '';
        $gestion_a = '';
        $gestion_t = '';
        $accion = '';

        // create new PDF document
        $pdf = new BasePdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set font
        $pdf->SetFont('times', 'N', 10);

// add a page
        $pdf->AddPage();

        $html = <<<EOF
<!-- EXAMPLE OF CSS STYLE -->
<style>

    table{
        padding: 2px;
    }


    .texto-md{
         height: 70px;
         padding: 15px;
    }

    .texto-lg{
         height: 250px;
    }

    .letra-sm{
        font-size: 8px;
        text-align: justify;
    }


    .text-center{
        text-align: center;
    }


</style>

EOF;



$html .= '<table border="1px">
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
                        <td class="texto-md" colspan="3">'.$solicitud->descripcion_solicitud.'</td>
                    </tr>
                    <tr>
                        <td rowspan="5">TEMA:</td>
                        <td>SOLICITUD</td>
                        <td colspan="2">'.$solicitud->tipo->clave.'</td>
                    </tr>
                    <tr>
                        <td>ESPECIFICO</td>
                        <td colspan="2">';

                        if($solicitud->caracteristica->construccion == 1){
                            $especifico .= '-Construcción ';
                        }

                        if($solicitud->caracteristica->ampliacion == 1){
                            $especifico .= '-Ampliación y Modernización ';
                        }

                        if($solicitud->caracteristica->reconstruccion == 1){
                            $especifico .= '-Reconstrucción ';
                        }

                        if($solicitud->caracteristica->conservacion == 1){
                            $especifico .= '-Conservación ';
                        }

                        if($solicitud->caracteristica->reunion == 1){
                            $especifico .= '-Convocatoria a Reunion ';
                        }

                        if($solicitud->caracteristica->proyectos == 1){
                            $especifico .= '-Estudios y Proyectos ';
                        }

                        if($solicitud->caracteristica->observaciones != ''){
                            $especifico .= '--OBSERVACIONES: ' . $solicitud->caracteristica->observaciones;
                        }
        $html .= $especifico;
        $html .= '</td>
                    </tr>
                    <tr>
                        <td>GESTION ADMINISTRATIVA</td>
                        <td colspan="2">';
                        if($solicitud->caracteristica->pasivo == 1){
                            $gestion_a .= '-Pasivos ';
                        }
                        if($solicitud->caracteristica->adeudo == 1){
                            $gestion_a .= '-Adeudos ';
                        }
                        if($solicitud->caracteristica->pago == 1){
                            $gestion_a .= '-Pagos Atrazados ';
                        }
        $html .= $gestion_a;

        $html .= '</td>
                    </tr>
                    <tr>
                        <td>GESTION TECNICA</td>
                        <td colspan="2">';

                            if($solicitud->caracteristica->evaluacion == 1){
                                $gestion_t .= '-Evaluación ';
                            }
                            if($solicitud->caracteristica->validacion == 1){
                                $gestion_t .= '-Validación ';
                            }
                            if($solicitud->caracteristica->recursos == 1){
                                $gestion_t .= '-Solicitud de Recursos ';
                            }
                            if($solicitud->caracteristica->calidad == 1){
                                $gestion_t .= '-Control de Calidad ';
                            }

        $html .= $gestion_t;
        $html .=        '</td>
                    </tr>
                    <tr>
                        <td>VIABILIDAD FINANCIERA</td>
                        <td colspan="2">';

                            if($solicitud->caracteristica->viabilidad == 1){
                                $viable = 'SI ';
                            }else{
                                $viable = 'NO ';
                            }
        $html .= $viable;
        $html .=        '</td>
                    </tr>
                    <tr>
                        <td>ACCIÓN</td>
                        <td colspan="3">';
                        if($solicitud->accion->atencion_a == 1){
                            $accion .= '-Atencion ';
                        }
                        if($solicitud->accion->seguimiento_a == 1){
                            $accion .= '-Seguimiento ';
                        }
                        if($solicitud->accion->cumplimiento_a == 1){
                            $accion .= '-Cumplimiento ';
                        }
                        if($solicitud->accion->evaluacion_a == 1){
                            $accion .= '-Evaluación ';
                        }


        $html .= $accion;
        $html .='</td>
                    </tr>
                    <tr>
                        <td>UBICACIÓN</td>
                        <td colspan="3">'.$solicitud->region->nombre.', Distrito: '. $solicitud->distrito->nombre .', Municipio: '.$solicitud->municipio->nombre.', Localidad: ' . $solicitud->localidad->nombre .'</td>
                    </tr>
                    <tr>
                        <td>INSTRUCCIÓN</td>
                        <td colspan="3" class="texto-lg">'.$solicitud->instruccion.'</td>
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
                        <td colspan="3">';
                        if($solicitud->ccp == 1){
                            $html .= 'Jefe de la Unidad Tecnica <br>';
                        }
                        if($solicitud->ccp2 == 1){
                            $html .= 'Ing. Rafael Galindo Ramirez - Jefe de la Unidad de Coordinacion Operativa Zona Norte <br>';
                        }
                        if($solicitud->ccp3 == 1){
                            $html .= 'Ing. Sergio Trujillo Ramos - Jefe de la Unidad de Coordinacion Operativa Zona Sur <br>';
                        }
                        if($solicitud->ccp4 == 1){
                            $html .= 'Jefe de la Unidad de Seguimiento';
                        }

        $html .= '</td>
                    </tr>
                    <tr>
                        <td class="letra-sm" colspan="2">De conformidad con el articulo 56, Fracción XIV de la Ley de Responsabilidades de los Servidores
                            Públicos al servicio del Estado y Municipios de Oaxaca; sirvase enviar a esta Coordinación de Atención Ciudadana y Vinculación
                            Social, el reporte de la atención y conclusión del presente asunto, mismo que deberá contener la fecha y el número de folio con
                            que se remite, a fin de clasificarlo como terminado y, de esta forma, cumplir con el compromiso que el jefe del Ejecutivo del Estado
                            estableció con la sociedad oaxaqueña.
                        </td>
                        <td class="text-center" colspan="2">
                            <p>ARQ. GUILLERMO MARTINEZ GOMEZ</p>
                            <p>DIRECTOR GENERAL</p>
                        </td>
                    </tr>
                </table>';

// output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');


        $filename = storage_path() . '/test.pdf';
        $pdf->output($filename, 'I');

        return Response::download($filename);
    }
} 