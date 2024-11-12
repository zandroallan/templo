<?php
namespace App\Http\Classes;

class clsImprimir
 {
    private $right_logo;
    private $left_logo;

    public function __construct()
     {
        $this->left_logo= public_path()."/tools/img/cabeza_izquierda.png";
        $this->right_logo= public_path()."/tools/img/cabeza_derecha.png";
     }
	
    private function encabezado($titulo="")
     {
        $html = '
            <table width="100%">
                <tr>
                    <td width="25%" style="text-align: left; vertical-align: middle;">
                        <img src='.$this->left_logo.' width="28%" />
                    </td>
                    <td width="50%" class="titulo">
                        Secretaría de la Honestidad y Función Pública<br>
                        Oficina de la C. Secretaria
                    </td>
                    <td width="25%" style="text-align: right; vertical-align: middle;">
                    
                    </td>                    
                </tr>
            </table>';
        if ( $titulo != "" )
            $html.= '<h4 class="titulo2">'.$titulo.'</h4>';
        
        return $html;
     }

    private function pie() 
     {
        $html = '       
            <table style="background-color:#333333; color:#fff; margin-left:-80px; font-size:10px;">
                <tr>
                    <td width="13%"></td>
                    <td width="72%">
                        Blvd. Los Castillos No. 410, Fracc. Montes Azules C.P. 29056, <br>
                        Tuxtla Gutiérrez, Chiapas. <br> Conmutador: (961) 61 8 75 30 Ext. 22211 y 22214
                        <br> www.shyfpchiapas.gob.mx
                    </td>
                </tr>
            </table>';
        return $html;
     }
   
    public function invitacionPDF($contenido, $mode, $nameFile='formato_invitacion')
     {
        $mpdf = new \Mpdf\Mpdf([     
            'tempDir' => public_path()."/pdf/tmp",     
            'margin_left' => 20,
            'margin_right' => 15,
            'margin_top' => 35,
            'margin_bottom' => 30,
            'margin_header' => 10,
            'margin_footer' => 10,
            'format' => 'Letter'
        ]);

        $html=$contenido;

        $stylesheet=file_get_contents(public_path()."/tools/css/print.css");                
        $mpdf->SetProtection(array('print'));
        $mpdf->SetTitle("Acuse Invitación");
        $mpdf->SetAuthor("Secretaría de la Honestidad y Función Pública");
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHTMLHeader($this->encabezado());
        $mpdf->SetHTMLFooter($this->pie());
        $mpdf->WriteHTML($stylesheet,1);
        $mpdf->WriteHTML($html);

        $pdf=$mpdf->Output($nameFile, $mode);     
        if ( $mode == 'D' ) $pdf= $pdf->setContentType('application/pdf');
        return $pdf;      
     }
 }
?>
