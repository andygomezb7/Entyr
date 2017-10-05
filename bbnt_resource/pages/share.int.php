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
$postixid = $_POST['service'];
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
				users_to_bann('Posible Proxy');
			}		
	}
// END HITLEAP CONTAINER

	// CONTAINERS
$querydata = mysql_fetch_assoc(mysql_query("SELECT postix_id, postix_url, postix_active, postix_valor, postix_name, postix_portada FROM postix_posts WHERE postix_id=".$postixid));
$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick FROM babanta_usuarios WHERE buser_id='$useridget'"));
$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id FROM u_cobros WHERE c_type=3 AND c_user_id=".$useridget));
$decode_service = base64_decode($babanta->koxDecode($key_master));
$data_service = explode('_', $decode_service);
$postixid_data = $babanta->koxDecode($data_service[0]);
$useridget_data = $babanta->koxDecode($data_service[1]);
$this_register = $data_service[2];
$this_valido = $data_service[3];
$url = ($querydata['postix_id'] && $querydata['postix_active'] == 0) ? $querydata['postix_url'] : 'http://wortit.net/';
$url = str_replace('socialfap.net', 'socialfap.com', $url);

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

?>