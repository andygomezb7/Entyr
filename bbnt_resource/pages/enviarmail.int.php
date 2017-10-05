<?php
include ('../../babanta_header.php');
//// ENVIAR CORREO ////
$para = 'andygomezb7@gmail.com';
$titulo = $babanta->settings['net_name'].' | Confirmación de pago ';
require_once TS_ROOT.'/bbnt_resource/class/mail.class.php';
$tsMail = new tsMail;
$para = array(1 => array('c' => $para, 'n' => '@andyg'));
$de = 2;
$asunto = $titulo;
$body = array(
'top' => 'Hola, esperamos que estes teniendo un buen dia, este correo es solo una confirmaci&oacute;n de pago en tu cuenta de '.$babanta->settings['net_name'].', por favor no responder este correo.',
'center' => 'Se ha enviado el pago de tu factura #0',
'bottom' => '',
'link' => array('link' => $babanta->settings['url'].'/inf/factura/?id=0', 'name' => 'Ver&nbsp;a&nbsp;Factura'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Se ha enviado el pago de tu factura #0, esta solo es una confirmaci&oacute;n por favor entrar a babanta.net y revisar mas informaci&oacute;n';
$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);
/// END CORREO /////
if($sentmail){
echo 'enviado';
}else{
echo 'no enviado';
}


?>