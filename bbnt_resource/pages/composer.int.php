<?php
/*
*
*    @name apuntes.php
*    Controlador de la Home
*
*/
$tpl = 0;
include ('../../babanta_header.php');

/*
*---------------------------------------------------------------------
*       VARIABLES POR DEFECTO
*---------------------------------------------------------------------
*/
$postixid = $_GET['pid'];
$useridget = $_GET['uid'];
$referido = $_SERVER["HTTP_REFERER"];
$fbotw = (strstr($referido, 'facebook') || strstr($referido, 'twitter')) ? true : false;
$esvalido = ($fbotw && $referido) ? 'Data' : 'Row';
$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick, buser_register FROM babanta_usuarios WHERE buser_id='$useridget'"));
$name = base64_encode($babanta->koxEncode($postixid).'_'.$babanta->koxEncode($useridget).'_'.md5($datauserin['buser_register']).'_'.$esvalido); 
$keymaster_babanta = $babanta->koxEncode($name);
echo '
<meta charset="utf-8" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<div style="background: #2986E6;width: 100%;height: 100%;display: block;color: whitesmoke;position:relative;">
<div style="    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 70%;
    height: 60%;
    text-align: -webkit-center;">
<center><h1>¿Eres mayor a 13 años?</h1><br>
<form method="POST" action="http://www.babanta.net/int/share/?ur=$location">
<input type="submit" class="button" value="SI" />
<input type="hidden" value="'.$keymaster_babanta.'" name="nomber" />
<input type="hidden" value="'.$postixid.'" name="service" />
<input type="hidden" value="'.$useridget.'" name="proveder" />
<input type="button" class="button" style="background:red;" value="NO" />
</form><br>
<small>En <b>Babanta</b> cuidamos a nuestros usuarios, y mostramos segun sus edades nuestro contenido.</small>
</center>
</div>
</div>
<style type="text/css">
*{font-family: Roboto;text-shadow: 0px 1px 4px #000;-webkit-text-shadow: 0px 1px 4px #000;-moz-text-shadow: 0px 1px 4px #000;}
body{margin: 0;padding: 0;}
.button{
	padding: 15px 30px;
	background: #2BDE52;
    border: 0;
    color: whitesmoke;
    font-size: 25px;
    text-shadow: 0px 1px 4px #000;
    margin: 0 6px 0;
    cursor: pointer;
}
.button:hover{
	opacity: 0.7;
}
</style>
';
?>