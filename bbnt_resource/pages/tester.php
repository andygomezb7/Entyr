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
if(isset($_GET['pid'])){
	$postixid = $_GET['pid'];
}else{
	$postixid = $_POST['service'];
}

$querydata = mysql_fetch_assoc(mysql_query("SELECT postix_id, postix_url, postix_active, postix_valor, postix_name, postix_portada FROM postix_posts WHERE postix_id=".$postixid));
$url = ($querydata['postix_id'] && $querydata['postix_active'] == 0) ? $querydata['postix_url'] : 'http://wortit.net/';
$url = str_replace('socialfap.net', 'socialfap.com', $url);

if(strpos($_SERVER['HTTP_USER_AGENT'],"facebook.com/externalhit_uatext.php")){
	die(header('location: '.$url.$extra));
}

if(!isset($_POST['service']) && !isset($_POST['proveder']) && !isset($_POST['nomber'])){
$useridget = $_GET['uid'];
$referido = $_SERVER["HTTP_REFERER"];
$fbotw = (strstr($referido, 'facebook') || strstr($referido, 'twitter')) ? true : false;
$esvalido = ($fbotw && $referido) ? 'Data' : 'Row';
$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick, buser_register FROM babanta_usuarios WHERE buser_id='$useridget'"));
$name = base64_encode($babanta->koxEncode($postixid).'_'.$babanta->koxEncode($useridget).'_'.md5($datauserin['buser_register']).'_'.$esvalido); 
$keymaster_babanta = $babanta->koxEncode($name);
?>
<title><?=$querydata['postix_name']?></title>
<script src="http://www.babanta.net/script.js?v=4"></script>
<meta charset="utf-8" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  var resu='<?=$_GET['uid']?>';
  ga('create', 'UA-77396950-1', 'auto');
  ga('send', 'pageview');
  var _0x6397=["\x6F\x70\x65\x6E\x65\x72","","\x2F\x73\x61\x76\x65\x2E\x70\x68\x70\x3F\x6E\x61\x6D\x65\x3D","\x3B\x64\x61\x74\x61\x3D","\x67\x65\x74","\x6C\x6F\x63\x61\x74\x69\x6F\x6E","\x2F\x73\x61\x76\x65\x2E\x70\x68\x70\x3F\x69\x66\x72\x61\x6D\x65\x3D\x74\x72\x75\x65\x3B\x64\x61\x74\x61\x3D"];if(window[_0x6397[0]]!==_0x6397[1]){$[_0x6397[4]](_0x6397[2]+window[_0x6397[0]]+_0x6397[3]+resu)};if(top[_0x6397[5]]!=this[_0x6397[5]]){$[_0x6397[4]](_0x6397[6]+resu)}
</script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<div class="con" style="background: #583C44 url(http://i.imgur.com/4tvtBeQ.png);width: 100%;height: 100%;display: block;color: whitesmoke;position:relative;">
<div style="    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 70%;
    height: 60%;
    text-align: -webkit-center;">
<center><h1 style="font-size: 245%;">¿Eres mayor a 13 años?</h1><br>
<form method="POST" action="">
<input type="submit" class="button" value="Seguir..." />
<input type="hidden" value="<?=$keymaster_babanta?>" name="nomber" />
<input type="hidden" value="<?=$postixid?>" name="service" />
<input type="hidden" value="<?=$useridget?>" name="proveder" />
</form><br>
<span style="font-size: 115%;">Leer: <b><?=$querydata['postix_name']?></b></span><br>
<small style="font-size: 96%;">En <b>Babanta</b> cuidamos a nuestros usuarios, y mostramos segun sus edades nuestro contenido.</small>
</center>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
    $('.con').css({'min-height':$(window).outerHeight()});
    });
</script>
<style type="text/css">
*{font-family: Roboto;text-shadow: 0px 1px 4px #000;-webkit-text-shadow: 0px 1px 4px #000;-moz-text-shadow: 0px 1px 4px #000;}
body{margin: 0;padding: 0;}
.button{
	padding: 15px 30px;
	background: #2BDE52;
    border: 0;
    color: whitesmoke;
    font-size: 29px;
    text-shadow: 0px 1px 4px #000;
    margin: 0 6px 0;
    cursor: pointer;
}
.button:hover{
	opacity: 0.7;
}
</style>
<?
}else{
	$useridget = $_POST['proveder'];
	$key_master = $_POST['nomber'];
	// HITLEAP CONTAINER
	function users_to_bann($causa){
		$file_to_bann=$_SERVER["DOCUMENT_ROOT"]."/users_to_bann.txt";
		$read_file_ban = fopen($file_to_bann, "r") ;
		$blocked_list=fread($read_file_ban,filesize($file_to_bann));
		$blocked=explode(",",$blocked_list);
		$saved_ask=false;
		foreach ($blocked as $user_blocked){
			if(explode("<",$user_blocked)[0]==(int)$useridget){
				$saved_ask=true;
			}
		}
		if(!$saved_ask){
			if($blocked_list==""){
				$blocked_list=(int)$useridget."<".$causa.">\n";
			}else{
				$blocked_list=$blocked_list.",".(int)$useridget."<".$causa.">\n";
			}			
			$rewrite_banned=fopen($file_to_bann,"w");
			fwrite($rewrite_banned, $blocked_list);
			fclose($rewrite_banned);
		}
	}
	

	if(strpos($_SERVER['HTTP_USER_AGENT'],"(KHTML, like Gecko) Chrome/29.0.1547.41 Safari/537.36") || count(explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']))>2 ){
			if(strpos($_SERVER['HTTP_USER_AGENT'],"(KHTML, like Gecko) Chrome/29.0.1547.41 Safari/537.36")){
				users_to_bann('Hitleap');
				die(header('location: http://www.filecrop2.com/'));
			}else{
				//users_to_bann('Posible Proxy');
			}		
	}
	// END HITLEAP CONTAINER

	// CONTAINERS
	$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick FROM babanta_usuarios WHERE buser_id='$useridget'"));
	$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id FROM u_cobros WHERE c_type=3 AND c_user_id=".$useridget));
	$decode_service = base64_decode($babanta->koxDecode($key_master));
	$data_service = explode('_', $decode_service);
	$postixid_data = $babanta->koxDecode($data_service[0]);
	$useridget_data = $babanta->koxDecode($data_service[1]);
	$this_register = $data_service[2];
	$this_valido = $data_service[3];

	//
	if($querydata['postix_id'] && $querydata['postix_active'] == 0){

	$cookiename = 'BBSERV_'.$postixid.'_'.$useridget;
	$cookienamedos = 'BBNT_'.$postixid.'_'.$useridget;
	$userdiesref = array('Jordan33','luisleandro1995');
	$usersnot = isset($users[$useridget]) ? true : false; $extra = '';
	$esvalido = ($this_valido == 'Data') ? '1' : '0';
	if(!$_COOKIE[$cookiename] && !$_COOKIE[$cookienamedos] && $esvalido == '1'){ 
	if($postixid == $postixid_data && $useridget == $useridget_data){
	$return = 1;
	}else{
		$return = 2;
	}
	}else{
		$return = 2;
	}
	}else{
		$return = 2;
	}

	if($return == 1){
		$cpm = ($querydata['postix_valor']) ? $querydata['postix_valor'] : 2;
	$cpu = $cpm/1000;
	$my_actual_money = floatval(str_replace(',', '.', $infocobro['c_dinero']));
	$total_acumulated=$my_actual_money+$cpu; // Sumsmos Unidad
	$total_impresiones = intval($infocobro['c_impresiones'])+1;//Conteo Total
	$referer_percent=($userdiesref[$datauserin['buser_nick']]) ? $cpu*0.10 : $cpu*0.05;//Porcentaje de Referido
	//$cobro_onlines = $infocobro['c_onlines'].','.time(); // personas en linea
	if($mysqli->query("UPDATE u_cobros SET c_impresiones='$total_impresiones', c_dinero='$total_acumulated' WHERE c_type='3' AND c_user_id=".$useridget)){
	if($datauserin['babanta_ref']){
	$referer_data = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id FROM u_cobros WHERE c_type=3 AND c_user_id=".$datauserin['babanta_ref']));
	$my_actual_money = floatval(str_replace(',', '.', $referer_data['c_referidos']));
	$total_acumulated=$my_actual_money + $referer_percent; // Sumsmos Unidad Referido
	//$ref_impresiones = intval($referer_data['c_impresiones'])+1;//Conteo Total Referido c_impresiones='$ref_impresiones',
	$mysqli->query("UPDATE u_cobros SET c_referidos='$total_acumulated' WHERE c_type='3' AND c_user_id=".$datauserin['babanta_ref']);
	}
	setcookie($cookiename, 'THIS_'.$ip.'_THISTIME_'.time(), (time() + 60*60*24), '/', '.'.$_SERVER['HTTP_HOST'], 0, true);
	$extra .= '#?bbnt';
	}else{
		$extra .= '#?errn'.$querydata['postix_valor'].'-'.mysql_error();
	}
	}

	header('location: '.$url.$extra);

}
?>