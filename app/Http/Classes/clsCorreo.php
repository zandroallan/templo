<?php
namespace App\Http\Classes;
use PHPMailer\PHPMailer;
class clsCorreo
 {
    public static function sendEmail($vdatosEnviarEmail, $status, $attachment=null)
     {
        $mail=new PHPMailer\PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->SMTPOptions = array (
                'ssl' => array (
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            
            $mail->CharSet="utf-8";
            $mail->SMTPAuth=true;
            $mail->SMTPSecure="tls";
            $mail->Host="smtp.gmail.com";
            $mail->Port=587;           
            
            $mail->Username="srcse.shyfpchiapas@gmail.com";
            $mail->Password="ixwhzhbxicrnyxcn";
            $mail->setFrom("srcse.shyfpchiapas@gmail.com", "Secretaría de la Honestidad y Función Pública");

            $mail->Subject=$vdatosEnviarEmail['asunto'];
            $mail->MsgHTML($vdatosEnviarEmail['cuerpo']);
            if($status==1) {
                foreach($vdatosEnviarEmail['correoDestinatario'] as $correo) {
                    $mail->addAddress($correo, $vdatosEnviarEmail['nombreDestinatario']);
                } 
            }
            else {
                $mail->addAddress($vdatosEnviarEmail['correoDestinatario'], $vdatosEnviarEmail['nombreDestinatario']);           
            }

            if($attachment!=null) {
                $mail->addStringAttachment($attachment, 'pdf.pdf');
            }
           
            if (!$mail->send())
                return 0;
            else
                return 1;
        } 
        catch (phpmailerException $e) {
            return 0;
        } 
        catch (Exception $e) {
            throw new Exception($e->getMessage(), $e->getCode());
        }
        return 0;
     }
 }