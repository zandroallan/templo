<?php
namespace App\Http\Classes;

class clsCorreoPlantilla
 {
    public static function invitacionInauguracion($vdatos)
     {
        return '
            <table>
                <tbody>
                    <tr height="16"></tr>
                    <tr>
                        <td>
                            <table style="min-width:332px;max-width:680px;border:1px solid #e0e0e0;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#333">
                                <tbody>
                                    <tr>
                                        <td width="32px"></td>
                                        <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:24px;color:#ffffff;line-height:1.25">
                                            Invitación
                                        </td>
                                        <td width="32px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="18px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="min-width:332px;max-width:680px;border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FAFAFA">
                                <tbody>
                                    <tr height="16px">
                                        <td rowspan="3" width="32px"></td>
                                        <td></td>
                                        <td rowspan="3" width="32px"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="text-align:justify">
                                                <p>                          
                                                    Estimado/a: C. '. $vdatos['nombre'] .'
                                                </p>

                                                <p> 
                                                    Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento “Acto Inaugural de las Mesas de Trabajo del Procedimiento de Transición 2024”, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente código es intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.
                                                </p> 

                                                <p> 
                                                    Le recordamos que el evento tendrá lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, a las 9.00 horas del día 04 de noviembre del año en curso, por lo cual se le solicita su puntual asistencia.
                                                </p>  

                                                <p> 
                                                    Esperando contar con su presencia, reciba un cordial saludo.
                                                </p> 
                                            </div>

                                            <div style="text-align:center">
                                                <h3>
                                                    <a href="https://apps.shyfpchiapas.gob.mx/transicion/invitacion/'. $vdatos['folio'] .'/qr">
                                                        Descargar Invitación
                                                    </a>
                                                </h3>
                                            </div>
                                            
                                            <div style="text-align:justify">
                                                <p>
                                                    <br />
                                                    Este correo electrónico es confidencial y/o puede contener información privilegiada.
                                                    
                                                    <br />
                                                    Si usted no es su destinatario o no es alguna persona autorizada por este para recibir sus correos electrónicos, NO deberá utilizar,
                                                    copiar, revelar, o tomar ninguna acción basada en este correo electrónico o cualquier otra información incluida en el, favor de notificar
                                                    a los teléfonos proporcionados y borrar a continuación totalmente este mensaje.
                                                    
                                                    <br />
                                                    Conmutador: (961) 61 8 75 30 Ext. 22211 y 22214

                                                    <br />
                                                    Este correo se genera automaticamente, favor de no responder.
                                                </p>
                                           </div>                                                
                                        </td>
                                    </tr>
                                    <tr height="32px"></tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr height="16"></tr>
                    <tr>
                        <td style="max-width:600px;font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:10px;color:#bcbcbc;line-height:1.5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:10px;color:#666666;line-height:18px;padding-bottom:10px">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>No se pueden enviar respuestas a esta dirección de correo electrónico</strong>.<br />
                                                            © Secretaría de la Honestidad y Función Pública., Blvd. Los Castillos No. 410, Fracc. Montes Azules Tuxtla Gutiérrez; Chiapas, CP 29056 Conmutador: (961) 61 8 75 30
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>';
     }
    
    public static function invitacionMesaTrabajo($vdatos)
     {
        return '
            <table>
                <tbody>
                    <tr height="16"></tr>
                    <tr>
                        <td>
                            <table style="min-width:332px;max-width:680px;border:1px solid #e0e0e0;border-bottom:0;border-top-left-radius:3px;border-top-right-radius:3px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#333">
                                <tbody>
                                    <tr>
                                        <td width="32px"></td>
                                        <td style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:24px;color:#ffffff;line-height:1.25">
                                            Invitación
                                        </td>
                                        <td width="32px"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" height="18px"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table style="min-width:332px;max-width:680px;border:1px solid #f0f0f0;border-bottom:1px solid #c0c0c0;border-top:0;border-bottom-left-radius:3px;border-bottom-right-radius:3px" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#FAFAFA">
                                <tbody>
                                    <tr height="16px">
                                        <td rowspan="3" width="32px"></td>
                                        <td></td>
                                        <td rowspan="3" width="32px"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div style="text-align:justify">
                                                <p>                          
                                                    Estimado/a: C. '. $vdatos['nombre'] .'
                                                </p>

                                                <p> 
                                                    Sírvase encontrar en el cuerpo de este mensaje, el código QR que le será solicitado para acceder al evento “Mesas de Trabajo del Procedimiento de Transición 2024”, el cual usted podrá presentar en medio impreso o en su dispositivo móvil. El presente código es intransferible debido a que lo identifica de forma inequívoca con sus datos personales ingresados durante el registro web.
                                                </p> 

                                                <p> 
                                                    Le recordamos que los eventos tendrán lugar en el Auditorio del Instituto de Administración Pública de Chiapas, sita en Libramiento Norte Poniente No. 2718, Zona Sin Asignación de Nombre de Col. 33, Ladera de la Loma, C.P. 29026, de esta ciudad capital, del 04 al 07 de noviembre del año en curso, en el horario que previamente se le ha indicado, por lo cual se solicita su puntual asistencia. 
                                                </p>  

                                                <p> 
                                                    Esperando contar con su presencia, reciba un cordial saludo.
                                                </p> 
                                            </div>

                                            <div style="text-align:center">
                                                <h3>
                                                    <a href="https://apps.shyfpchiapas.gob.mx/transicion/invitacion/'. $vdatos['folio'] .'/qr">
                                                        Descargar Invitación
                                                    </a>
                                                </h3>
                                            </div>
                                            
                                            <div style="text-align:justify">
                                                <p>
                                                    <br />
                                                    Este correo electrónico es confidencial y/o puede contener información privilegiada.
                                                    
                                                    <br />
                                                    Si usted no es su destinatario o no es alguna persona autorizada por este para recibir sus correos electrónicos, NO deberá utilizar,
                                                    copiar, revelar, o tomar ninguna acción basada en este correo electrónico o cualquier otra información incluida en el, favor de notificar
                                                    a los teléfonos proporcionados y borrar a continuación totalmente este mensaje.
                                                    
                                                    <br />
                                                    Conmutador: (961) 61 8 75 30 Ext. 22211 y 22214

                                                    <br />
                                                    Este correo se genera automaticamente, favor de no responder.
                                                </p>
                                           </div>                                                
                                        </td>
                                    </tr>
                                    <tr height="32px"></tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr height="16"></tr>
                    <tr>
                        <td style="max-width:600px;font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:10px;color:#bcbcbc;line-height:1.5">
                            <table>
                                <tbody>
                                    <tr>
                                        <td>
                                            <table style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:10px;color:#666666;line-height:18px;padding-bottom:10px">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <strong>No se pueden enviar respuestas a esta dirección de correo electrónico</strong>.<br />
                                                            © Secretaría de la Honestidad y Función Pública., Blvd. Los Castillos No. 410, Fracc. Montes Azules Tuxtla Gutiérrez; Chiapas, CP 29056 Conmutador: (961) 61 8 75 30
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>';
     }
 }