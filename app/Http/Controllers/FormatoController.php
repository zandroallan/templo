<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Classes\clsImprimir;
use App\Models\clsDLEvento;
use QrCode;

class FormatoController extends Controller
 {
    private $route='impresion';
    public function __construct() { } 

    public function invitacionPDF($vid)
     {  
        $vhtml ='';
        $clsImprimir=new clsImprimir;
        $vflInvitado=clsDLEvento::findOrFail($vid);

        if ( $vflInvitado->correoEnviado == 0) { 
            $datos=clsDLEvento::queryToDB(['correo'=> $vflInvitado->correo])->get();
            $i=1;
            $totalRegsitros=count($datos);
            foreach ($datos as $key => $value) {
                $png=QrCode::format('svg')->size(160)->color(10, 14, 244)->generate('https://apps.shyfpchiapas.gob.mx/transicion/asistencia/evento?folio='. $value->folio);
                $png=base64_encode($png);

                $vhtml.='<h3 style="text-align: center;">';
                $vhtml.='  Coordinación General del Proceso de Entrega Recepción Final de la Administración Pública del Estado de Chiapas 2018-2024';
                $vhtml.='</h3>';

                $vhtml.='<h5 style="text-align: center;">';
                $vhtml.='   “2024, Año de Felipe Carrillo Puerto Benemérito del Proletariado, revolucionario y Defensor del Mayab”';
                $vhtml.='</h5>';
               
                $vhtml.='<h3 style="text-align: justify; line-height: 180%">';
                $vhtml.='   Estimado/a: C. '. $value->nombre .'<br />';
                $vhtml.='   '. $value->cargo;
                $vhtml.='</h3>';

                $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
                $vhtml.='   Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento “Acto Inaugural de las Mesas';
                $vhtml.='   de Trabajo del Procedimiento de Transición 2024”, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente';
                $vhtml.='   código es intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.';
                $vhtml.='</p>';

                $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
                $vhtml.='   Le recordamos que el evento tendrá lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte';
                $vhtml.='   Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, a las 9.00 horas del';
                $vhtml.='    día 04 de noviembre del año en curso, por lo cual se le solicita su puntual asistencia.';
                $vhtml.='</p>';

                $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
                $vhtml.='   Esperamos contar con su presencia y le agradecemos de antemano su consideración.';
                $vhtml.='</p>';

                $vhtml.='<table style="width: 100%;">';
                $vhtml.='   <tr>';
                $vhtml.='       <td style="text-align: center;">';
                $vhtml.='          <img src="data:image/svg;base64,' . $png . '">'; 
                $vhtml.='       </td>';
                $vhtml.='   </tr>';
                $vhtml.='</table>';
                if ($i < $totalRegsitros ) {
                    $vhtml.='<p style="page-break-after: always"></p>';
                }
                $i++;
            }
        }
        
        return $clsImprimir->invitacionPDF($vhtml, 'S');  
     }

    public function invitacion_individualPDF($vid)
     {  
        $vhtml ='';
        $clsImprimir=new clsImprimir;
        $vflInvitado=clsDLEvento::findOrFail($vid);

        $png=QrCode::format('svg')->size(160)->color(10, 14, 244)->generate('https://apps.shyfpchiapas.gob.mx/transicion/asistencia/evento?folio='. $vflInvitado->folio);
        $png=base64_encode($png);

        $vhtml.='<h3 style="text-align: center;">';
        $vhtml.='  Coordinación General del Proceso de Entrega Recepción Final de la Administración Pública del Estado de Chiapas 2018-2024';
        $vhtml.='</h3>';

        $vhtml.='<h5 style="text-align: center;">';
        $vhtml.='   “2024, Año de Felipe Carrillo Puerto Benemérito del Proletariado, revolucionario y Defensor del Mayab”';
        $vhtml.='</h5>';

        $vhtml.='<h3 style="text-align: justify; line-height: 180%">';
        $vhtml.='   Estimado/a: C. '. $vflInvitado->nombre;
        $vhtml.='</h3>';

        if ( $vflInvitado->evento == 1 ) { 
            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento <b>“Acto Inaugural de las Mesas';
            $vhtml.='   de Trabajo del Procedimiento de Transición 2024”</b>, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente';
            $vhtml.='   código es intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.';       
            $vhtml.='</p>';

            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Le recordamos que el evento tendrá lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte';
            $vhtml.='   Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, a las 9.00 horas del';
            $vhtml.='    día 04 de noviembre del año en curso, por lo cual se le solicita su puntual asistencia.';
            $vhtml.='</p>';
        }
        if ( $vflInvitado->mesa_trabajo == 1 ) { 
            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento <b>“Mesas de Trabajo del';
            $vhtml.='   Procedimiento de Transición 2024”</b>, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente código es';
            $vhtml.='   intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.';
            $vhtml.='</p>';

            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Le recordamos que los eventos tendrán lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte';
            $vhtml.='   Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, del 04 al 07 de noviembre';
            $vhtml.='   del año en curso, en el horario que previamente se le ha indicado, por lo cual se solicita su puntual asistencia.';
            $vhtml.='</p>'; 
        } 

        $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
        $vhtml.='   Esperamos contar con su presencia y le agradecemos de antemano su consideración.';
        $vhtml.='</p>';

        $vhtml.='<table style="width: 100%;">';
        $vhtml.='   <tr>';
        $vhtml.='       <td style="text-align: center;">';
        $vhtml.='          <img src="data:image/svg;base64,' . $png . '">'; 
        $vhtml.='       </td>';
        $vhtml.='   </tr>';
        $vhtml.='</table>';
        
        $nombre_archivo=strtolower('invitacion_'. strtr($vflInvitado->nombre, " ", "_"));

        return $clsImprimir->invitacionPDF($vhtml, 'D', $nombre_archivo . '.pdf');  
     }

    public function invitacion_PDF($folio)
     {  
        $vhtml ='';
        $clsImprimir=new clsImprimir;
        $vflInvitado=clsDLEvento::where('folio', $folio)->first();

        $png=QrCode::format('svg')->size(160)->color(10, 14, 244)->generate('https://apps.shyfpchiapas.gob.mx/transicion/asistencia/evento?folio='. $vflInvitado->folio);
        $png=base64_encode($png);

        $vhtml.='<h3 style="text-align: center;">';
        $vhtml.='  Coordinación General del Proceso de Entrega Recepción Final de la Administración Pública del Estado de Chiapas 2018-2024';
        $vhtml.='</h3>';

        $vhtml.='<h5 style="text-align: center;">';
        $vhtml.='   “2024, Año de Felipe Carrillo Puerto Benemérito del Proletariado, revolucionario y Defensor del Mayab”';
        $vhtml.='</h5>';

        $vhtml.='<h3 style="text-align: justify; line-height: 180%">';
        $vhtml.='   Estimado/a: C. '. $vflInvitado->nombre;
        $vhtml.='</h3>';

        if ( $vflInvitado->evento == 1 ) { 
            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento <b>“Acto Inaugural de las Mesas';
            $vhtml.='   de Trabajo del Procedimiento de Transición 2024”</b>, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente';
            $vhtml.='   código es intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.';       
            $vhtml.='</p>';

            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Le recordamos que el evento tendrá lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte';
            $vhtml.='   Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, a las 9.00 horas del';
            $vhtml.='    día 04 de noviembre del año en curso, por lo cual se le solicita su puntual asistencia.';
            $vhtml.='</p>';
        }
        if ( $vflInvitado->mesa_trabajo == 1 ) { 
            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento <b>“Mesas de Trabajo del';
            $vhtml.='   Procedimiento de Transición 2024”</b>, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente código es';
            $vhtml.='   intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.';
            $vhtml.='</p>';

            $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
            $vhtml.='   Le recordamos que los eventos tendrán lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte';
            $vhtml.='   Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, del 04 al 07 de noviembre';
            $vhtml.='   del año en curso, en el horario que previamente se le ha indicado, por lo cual se solicita su puntual asistencia.';
            $vhtml.='</p>'; 
        }      

        $vhtml.='<p style="text-align: justify; font-size: 14px; line-height: 180%">';
        $vhtml.='   Esperando contar con su presencia, reciba un cordial saludo.';
        $vhtml.='</p>';

        $vhtml.='<table style="width: 100%;">';
        $vhtml.='   <tr>';
        $vhtml.='       <td style="text-align: center;">';
        $vhtml.='          <img src="data:image/svg;base64,' . $png . '">'; 
        $vhtml.='       </td>';
        $vhtml.='   </tr>';
        $vhtml.='</table>';
        
        $nombre_archivo=strtolower('invitacion_'. strtr($vflInvitado->nombre, " ", "_"));

        return $clsImprimir->invitacionPDF($vhtml, 'D', $nombre_archivo . '.pdf');  
     }
 }
