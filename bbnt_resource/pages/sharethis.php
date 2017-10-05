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
// one, two, thre
$operador_get = $babanta->setSecure($_GET['operador']);
$id_thisurl = $babanta->setSecure($_GET['id']);
/// domains generate
$domins_valids = array(
'90min.com',
'www.90min.com'
);
// VALIDAR VISITA
function get_domain($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
}
//
function setbabantacookie($name, $horas, $contenido){
$cookiename_24 = $name;
$horascoo = ($horas) ? $horas : 24;
$cookie_time_24 = 60*60*$horascoo;
setcookie($cookiename_24, $contenido, (time() + $cookie_time_24), '/', $_SERVER['HTTP_HOST'], 0, true);
}
//
function is_cpaoffert($url_link){
global $domins_valids;
//
$domin = get_domain($url_link);
if(in_array($domin, $domins_valids)){
return true;
}else{ return false; }
}
//
function get_url_direct($url_link, $user_id, $time_post, $network_data){
global $domins_valids;
//
$domin = get_domain($url_link);
$inarr = in_array($domin, $domins_valids);
if($inarr){
$extra_gets = '';
$dom_gets = '';
$datagets = '';
}else{
$extra_gets = '-'.$user_id.'/';
$dom_gets= $network_data.'/';
$datagets = '?clic_babanta=pub'.$user_id.'-key'.md5(time());
}
$url_d = $dom_gets.$url_link.$extra_gets;
return $url_d.$datagets;

// end; get_url_direct()
}

function contar_visita($user, $cpm, $key_link, $cookie_name_link, $link_tipo_num){
if($_COOKIE[$cookie_name_link] && !$_COOKIE['servicecpm_'.$id_thisurl]){
$link_tipo = (!$link_tipo_num) ? 1 : $link_tipo_num;
//
$continuar_nlink = ($link_tipo == 2) ? true : false;
if($continuar_nlink && rand(1,2) == 2){
// sumar dinero
$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_type, c_user_id, c_impresiones FROM u_cobros WHERE c_type=3 AND c_user_id=".$user));
$my_actual_money = floatval(str_replace(',', '.', $infocobro['c_dinero']));
$total_acumulated=1*$cpm/1000;
$porcent = $total_acumulated*30/100;
$total_acumulated_porcent = $total_acumulated-$porcent;
$total_acumulated_full = $my_actual_money+$total_acumulated_porcent; 
$impresiones_count = intval($infocobro['c_impresiones'])+1;
if(mysql_query("UPDATE u_cobros SET c_dinero='$total_acumulated_full', c_impresiones='$impresiones_count' WHERE c_type='3' AND c_user_id=".$user)){
// end; sumar dinero

// remover cookie
setcookie($cookie_name_link, null, -1, '/', $_SERVER['HTTP_HOST'], 0, true);
unset($_COOKIE[$cookie_name_link]);
// end; remover cookie

return $cookie_name_link;

}else{ return false; } // query; suma de dinero
}else{ return false; } // continuar, link
}else{ return false; } // existe la cookie
}
// network data

// VALIDADOR DE OPERADORES

/*
* OPERADOR ONE
*/
if($operador_get == 'one'){ // s
// INFO
$querydata = mysql_fetch_assoc(mysql_query("SELECT a.bac_nota, a.bac_key, a.bac_user, a.bac_time, p.postix_id, p.postix_url, p.postix_network_id, u.buser_id, u.buser_nelcpa FROM babanta_acortador AS a LEFT JOIN postix_posts AS p ON a.bac_nota = p.postix_id LEFT JOIN babanta_usuarios AS u ON a.bac_user = u.buser_id WHERE bac_key='".$id_thisurl."'"));
$network_data = mysql_fetch_assoc(mysql_query("SELECT net_blogurl,net_id FROM babanta_networks WHERE net_id=".$querydata['postix_network_id']));
//
if(strpos($_SERVER['HTTP_USER_AGENT'],"facebook.com/externalhit_uatext.php")){
	die(header('location: '.get_url_direct($querydata['postix_url'], $querydata['bac_user'], $querydata['bac_time'],$network_data['net_blogurl'])));
}
//
if(!$querydata['postix_url']){ echo 'ERROR_URL_NOT_EXIST'; }
$mobile_get=($mobile) ? '2' : '1';
$key_data_array = array(
'd1' => $network_data['net_blogurl'].'/'.$querydata['postix_url'],
'd2' => $querydata['bac_user'],
'd3' => $querydata['bac_time'],
'd4' => $querydata['bac_nota'],
);
$key_data_json = json_encode($key_data_array);
$key_data = base64_encode($key_data_json);
$noacget = (intval($_GET['noac'])) ? '&noac=1' : '';
$gets_data='?m='.$mobile_get.$noacget.'&clic='.$key_data;

die(header('location: '.$babanta->settings['net_url'].'/t/'.$id_thisurl.$gets_data));

/*
* OPERADOR TWO
*/
}elseif($operador_get == 'two'){ // t
$ism = $babanta->setSecure($_GET['m']);
$iskey = $babanta->setSecure($_GET['clic']);
$key_descrypt = json_decode(base64_decode($iskey),true);
$referrer_s = $_SERVER['HTTP_REFERER'];
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
				die(header('location: http://packs.socialfap.com/?ref=HITLEAP-PUBLIC-'.$key_descrypt['d2']));
			}else{
				users_to_bann('Posible Proxy');
			}		
	}
// END HITLEAP CONTAINER

$is_cpababanta = is_cpaoffert($key_descrypt['d1']);
/* SELECTOR DE PUBLICIDAD */
$rand_publicidad = rand(1,4);
$rand_publicidad_1 = $rand_publicidad;

// cookie
$cookiename = substr(md5($id_thisurl),0, 8).'_'.substr(md5(time()),0,4);
$cookie_time = strtotime( '+2 minutes' );
setcookie($cookiename, 'THIS_'.$ip.'_THISTIME_'.time(), $cookie_time, '/', $_SERVER['HTTP_HOST'], 0, true);
// 24hrs_visita
$cookiename_24 = 'servicecpm_'.$id_thisurl;
$cookie_time_24 = 60*60*24;
setcookie($cookiename_24, 'THIS'.$ip.'_THISTIME'.time(), (time() + $cookie_time_24), '/', $_SERVER['HTTP_HOST'], 0, true);
//
$url_acort_r = $babanta->settings['net_url'].'/r/'.$id_thisurl.'?s_t='.$cookiename.'&number='.$rand_publicidad_1;
//
$cookie_cpa_name = 'cpmb_cpa_'.$id_thisurl; $cookie_obtener_cpa = $_COOKIE[$cookie_cpa_name];
$cookie_ouo_name = 'cpmb_ac_'.$id_thisurl; $cookie_obtener_ouoio = $_COOKIE[$cookie_ouo_name];
$cookie_cpa_namembda = 'cpmb_cpa_mbd'.$id_thisurl; $cookie_obtener_cpambda = $_COOKIE[$cookie_cpa_namembda];
//
$noac = intval($_GET['noac']);
//
if($rand_publicidad == 1 || $rand_publicidad == 0){ // && intval($cookie_obtener_ouoio) < 3
$link_share = $url_acort_r;
}elseif($rand_publicidad == 3 && intval($cookie_obtener_cpa) <= 7 && $mobile && $querydata['buser_nelcpa'] != 2){
$user_data = $babanta->settings['net_id'].'_n_'.$key_descrypt['d2'].'_a_MOBUSI'.$key_descrypt['d4'];
$cookie_cpa_name = 'cpmb_cpa_'.$id_thisurl; $cookie_obtener_cpa = $_COOKIE[$cookie_cpa_name];
if($cookie_obtener_cpa){ $cookie_cpa_content = intval($cookie_obtener_cpa)+1;
setbabantacookie($cookie_cpa_name, 12, $cookie_cpa_content); }else{ $cookie_cpa_content = '1'; 
setbabantacookie($cookie_cpa_name, 12, $cookie_cpa_content); 
} // cookie
$link_share = 'http://ocio.tipslz.com/?m=1GH2SITE69128X3&a='.$user_data.'&pubid='.$user_data;
}elseif($rand_publicidad == 2 && !$noac){
$url_acort_e = $babanta->settings['net_url'].'/e/'.$id_thisurl.'?s_t='.$cookiename.'&number='.$rand_publicidad_1;
$ouo_io_link = file_get_contents('http://ouo.io/api/gHW9nW84?s='.$url_acort_e);
if($cookie_obtener_ouoio){ $cookie_ouo_content = intval($cookie_obtener_ouoio)+1;
setbabantacookie($cookie_ouo_name, 12, $cookie_ouo_content); }else{ $cookie_ouo_content = '1'; 
setbabantacookie($cookie_ouo_name, 12, $cookie_ouo_content); 
} // cookie
$link_share = $ouo_io_link.'?noac='.$noac;
}elseif($rand_publicidad == 4 && intval($cookie_obtener_cpambda) <= 9 && $mobile && $querydata['buser_nelcpa'] != 2){
$user_data = $babanta->settings['net_id'].'_n_'.$key_descrypt['d2'].'_a_MOBIDEA'.$key_descrypt['d4'];
if($cookie_obtener_cpambda){ $cookie_cpambda_content = intval($cookie_obtener_cpambda)+1;
setbabantacookie($cookie_cpa_namembda, 12, $cookie_cpambda_content); }else{ $cookie_cpambda_content = '1'; 
setbabantacookie($cookie_cpa_namembda, 12, $cookie_cpambda_content); 
} // cookie
$link_share = 'http://www.mobilecontentstore.mobi/?sl=720315-b09d3&data1='.$user_data.'&data3='.$user_data.'&data2='.date('d/m/Y');
}else{
$link_share = $url_acort_r;
//end; else rand_publicidad
}

if($iskey && $key_descrypt['d1'] && $key_descrypt['d2'] && $key_descrypt['d3'] && $key_descrypt['d4']){
//
}else{ die(header('location: '.$link_share)); }

include './template_redirect.php';
/*
* OPERADOR THRE
*/
}elseif($operador_get == 'thre'){ // e
// VALIDADOR DE ACORTADOR DE ENLACES
$s_t = $babanta->setSecure($_GET['s_t']);
// INFO
$querydata = mysql_fetch_assoc(mysql_query("SELECT a.bac_nota, a.bac_key, a.bac_user, a.bac_time, p.postix_id, p.postix_url, p.postix_network_id, u.buser_id, u.buser_nelcpa FROM babanta_acortador AS a LEFT JOIN postix_posts AS p ON a.bac_nota = p.postix_id LEFT JOIN babanta_usuarios AS u ON a.bac_user = u.buser_id WHERE bac_key='".$id_thisurl."'"));
$network_data = mysql_fetch_assoc(mysql_query("SELECT net_blogurl,net_id FROM babanta_networks WHERE net_id=".$querydata['postix_network_id']));
//

$url_redirect = get_url_direct($querydata['postix_url'],$querydata['bac_user'],$querydata['bac_time'],$network_data['net_blogurl']);

if(contar_visita($querydata['bac_user'], 0.20, $querydata['bac_key'], $s_t, 2)){
$url_direct=$url_redirect.'&ads_service=cpm_babanta';
}else{
$url_direct=$url_redirect.'&discount=true_1';
}

die(header('location: '.$url_direct));



/*
* OPERADOR FOUR
*/
}elseif($operador_get == 'four'){ // r
// Validar de visitas normal
$s_t = $babanta->setSecure($_GET['s_t']);
$Numberget = $babanta->setSecure($_GET['number']);
// INFO
$querydata = mysql_fetch_assoc(mysql_query("SELECT a.bac_nota, a.bac_key, a.bac_user, a.bac_time, p.postix_id, p.postix_url, p.postix_network_id, p.postix_notatype, u.buser_id, u.buser_nelcpa FROM babanta_acortador AS a LEFT JOIN postix_posts AS p ON a.bac_nota = p.postix_id LEFT JOIN babanta_usuarios AS u ON a.bac_user = u.buser_id WHERE bac_key='".$id_thisurl."'"));
$network_data = mysql_fetch_assoc(mysql_query("SELECT net_blogurl,net_id FROM babanta_networks WHERE net_id=".$querydata['postix_network_id']));
//
$url_redirect = get_url_direct($querydata['postix_url'], $querydata['bac_user'], $querydata['bac_time'],$network_data['net_blogurl']);
//
$cpm_thisnota = ($querydata['postix_notatype'] == 2) ? intval($querydata['postix_valor']) : 1;
$count_visita = contar_visita($querydata['bac_user'], $cpm_thisnota, $querydata['bac_key'], $s_t,2);// DEBERIA SER 1
if($count_visita){
$url_direct=$url_redirect.'&ads_service=cpm_babanta&k='.$count_visita.'&number='.$Numberget;
}else{
$url_direct=$url_redirect.'&discount=true_2&k='.$count_visita.'&number='.$Numberget;
}

die(header('location: '.$url_direct));

}else{
echo 'ERROR 404';
}

?>