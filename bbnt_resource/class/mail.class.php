<?php if ( ! defined('TS_HEADER')) exit('No entiendo que buscas aca :v');
/*
* @name         mail.class.php
* @author       Powered by Andy Gómez
* @Programed    Andy Gómez (andyg)
*/

class tsMail {
    function tsMail(){
        global $babanta;
        $this->responder = array('c' => 'no-reply-services@babanta.net', 'n' => 'Babanta Network');
        $this->general = array('c' => 'no-reply-services@babanta.net', 'n' => 'Babanta Network');
        $this->creador = array('c' => 'no-reply-services@babanta.net', 'n' => 'Andy de Babanta');
        $this->notificacion = array('c' => 'no-reply-services@babanta.net', 'n' => 'Notificaciones '.$babanta->settings['name'].'');
        $this->aviso = array('c' => 'no-reply-services@babanta.net', 'n' => 'Avisos '.$babanta->settings['name'].'');
        $this->contacto = array('c' => 'no-reply-services@babanta.net', 'n' => 'Andy de Babanta');
        $this->recuperarcontra = array('c' => 'no-reply-services@babanta.net', 'n' => 'Recuperar contraseña');
        // topes
$this->header = '<div style="margin:0;padding:0" dir="ltr" bgcolor="#ffffff"><table cellspacing="0" cellpadding="0" width="100%;" border="0" style="border-collapse:collapse"><tbody>
<tr>
<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff"><table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse">
<tbody>
<tr><td height="20" style="line-height:20px" colspan="3">&nbsp;</td></tr>
<tr>
<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td>
<td>
<table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse"><tbody>
<tr>
<td height="16" style="line-height:16px" colspan="3">&nbsp;</td></tr>
<tr>
<td width="20%" align="left" valign="middle" style="height:32;line-height:0px">
<a href="#" style="color:#2A192B;text-decoration:none" target="_blank">
<img src="http://www.babanta.net/bbnt_archives/images/logo.png" width="100%" height="32" style="border:0" class="CToWUd">
</a>
</td>
<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td>
<td width="75%"><a href="#" style="color:#2A192B;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:19px;line-height:32px" target="_blank">'.$babanta->settings['name'].'</a></td></tr>
<tr style="border-bottom:solid 1px #e5e5e5">
<td height="16" style="line-height:16px" colspan="3">&nbsp;</td></tr></tbody></table></td>
<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td></tr><tr><td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td><td>';
    }

function createBody($top, $center, $bottom, $correopara, $linkbottom, $linkbottomcontent,$link, $contentlink = 'Ir&nbsp;a&nbsp; $babanta->settings[name]'){
$correopara = $correopara;
$body = '<table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse"><tbody>
<tr>
<td height="28" style="line-height:28px">&nbsp;</td>
</tr><tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
'.$top.'
</span>
</td>
</tr>
<tr><td height="14" style="line-height:14px">&nbsp;</td></tr><tr><td><span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823"><center><a href="'.$link.'" style="color:#6B8A28;text-decoration:none" target="_blank"><table cellspacing="0" cellpadding="0" width="50%" style="border-collapse:collapse"><tbody><tr><td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border: solid 1px #2A192B;background: #635763;padding:7px 16px 11px 16px">
<a href="'.$link.'" style="color:#6B8A28;text-decoration:none;display:block" target="_blank">
<center><font size="3">
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">
'.$contentlink.'
</span>
</font>
</center></a>
</td>
</tr>
</tbody></table></a></center></span></td></tr><tr>
<td height="14" style="line-height:14px">&nbsp;</td>
</tr><tr><td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
'.$center.'
</span>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px">&nbsp;</td></tr><tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
'.$bottom.'
<center>
<a href="'.$linkbottom.'" style="color:#6B8A28;text-decoration:none" target="_blank">'.$linkbottomcontent.'</a>
</center>
</span>
</td></tr><tr>
<td height="14" style="line-height:14px">&nbsp;</td></tr></tbody>
</table>';
if(is_array($correopara)){ $ierl = 0; foreach($correopara AS $dta => $dto){
$enviadoa .= '<a href="mailito:'.$dto.'" style="color:#2A192B;text-decoration:none" target="_blank">'.$dto.'</a>'.($ierl==count($correopara)+1 ? '' : ','); $ierl++; }
}else{
$enviadoa = '<a href="mailito:'.$correopara.'" style="color:#2A192B;text-decoration:none" target="_blank">'.$correopara.'</a>';
}
$footer = '</td>
<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td>
<td>
<table cellspacing="0" cellpadding="0" width="100%" style="border-collapse:collapse"><tbody>
<tr style="border-top:solid 1px #e5e5e5">
<td height="16" style="line-height:16px">&nbsp;</td></tr>
<tr><td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#aaaaaa;line-height:16px">

Este mensaje se ha enviado a '.$enviadoa.'.<br>Babanta.net

</td></tr>
</tbody></table>
</td>
<td width="15" style="display:block;width:15px">&nbsp;&nbsp;&nbsp;</td></tr>
<tr><td height="20" style="line-height:20px" colspan="3">&nbsp;</td></tr></tbody></table>
</td></tr>
</tbody>
</table>
</div>';
return $this->header.$body.$footer;
}

function sendMail($para, $de, $asunto, $body, $altbody, $html = true){
global $wuser, $w;
include TS_ROOT.'/bbnt_resource/libs/PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

$correode = array(
    1 => $this->responder,
    2 => $this->general,
    3 => $this->creador,
    4 => $this->notificacion,
    5 => $this->aviso,
    6 => $this->contacto,
    7 => $this->recuperarcontra,
);
$enviara = array(
    1 => array('c' => $wuser->info['buser_mail'], 'n' => $wuser->info['buser_nick']),
    2 => array('c' => 'no-reply-services@babanta.net', 'n' => 'Babanta network'),
);

//Tell PHPMailer to use SMTP
/*$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "no-reply-services@babanta.net";
$mail->Password = "Fansclubu123";*/
$mail->setFrom($correode[$de]['c'], $correode[$de]['n']);
$mail->addReplyTo($this->responder['c'], $this->responder['n']);

if(is_array($para)){
$ier = 0; foreach($para as $email){
$mail->AddAddress($email['c'], $email['n']);
$correopara[$ier] = $email['c'];
$ier++;}
}else{
$mail->addAddress($enviara[$para]['c'], $enviara[$para]['n']);
$correopara = $enviara['c'];
}
$mail->isHTML($html);

$mail->Subject = $asunto;
$mail->Body =  $this->createBody($body['top'], $body['center'], $body['bottom'], $correopara, $body['link2']['link'], $body['link2']['name'], $body['link']['link'], $body['link']['name']);
$mail->AltBody = $altbody;

if(!$mail->send()){
return false;
} else {
return true;
}
}

// END CLASS FUNCTION
}

