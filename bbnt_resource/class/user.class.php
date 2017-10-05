<?php  if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/**
 * Modelo para el control de los usuarios
 *
 * @name    c.user.php
 * @author  Wortit Developers
 */
class wuser{
	function validarcookie($cookie){
global $babanta, $mysqli;
$key_3 = str_replace('_', '', strstr($cookie, '__'));
$part_1 = strstr($cookie, '__', true);
$key_2 = str_replace('_', '', strstr($part_1, '_'));
$key_1 = strstr($part_1, '_', true);
$query = mysql_query('SELECT * FROM w_sessions WHERE s_user = \''.$key_1.'\' AND s_key = \''.$key_2.'\' AND s_date = \''.$key_3.'\' LIMIT 1');
$data = mysql_fetch_assoc($query);
return $data;
}
function read(){ global $babanta, $mysqli; 
$cookie_name = 'LS_'.substr(md5($babanta->settings['url']), 0, 6); 
$cookie = $_COOKIE[$cookie_name]; 
if($cookie){
$data = $this->validarcookie($cookie);
if($data['s_user']){
$usuarioid = $data['s_user'];
$query = mysql_query("SELECT * FROM babanta_usuarios WHERE buser_id='".$usuarioid."' LIMIT 1"); 
$datas = mysql_fetch_assoc($query);
$bannedquery = mysql_query("SELECT * FROM babanta_banned WHERE bbb_obj='$usuarioid' AND bbb_type='2' AND bbb_state='1' ");
$thisbanuser = mysql_num_rows($bannedquery);
$this->baninfo = mysql_fetch_assoc($bannedquery);
$this->dotup();
$this->ban = ($thisbanuser <= 0) ? false : true;
$factu_info = mysql_fetch_array(mysql_query("SELECT brv_info, brv_user, brv_id FROM babanta_reviciones WHERE brv_id=".$datas['buser_fact_rev']));
$fact_json_info = json_decode($factu_info[0], true);
$this->facturacion = array(
'comentarios' => $fact_json_info['comentarios']
);
if($datas['buser_button'] == 3 || $datas['buser_button'] == '3'){
	if($datas['buser_state'] == 2 || $datas['buser_state'] == '2'){
		$this->advertiserpet = 1;
	}elseif($datas['buser_state'] == 3 || $datas['buser_state'] == '3'){
		$this->advertiserload = 1;
	}elseif($datas['buser_state'] == 4 || $datas['buser_state'] == '4'){
		$this->advertisercheck = 1;
	}
	$this->advertiser = 1;
}
$this->info = $datas; 
$this->uid = $datas['buser_id']; 
$this->nick = $datas['buser_nick'];
if($datas['buser_rango'] == 0 || $datas['buser_rango'] == 1 && $datas['buser_network'] == $babanta->settings['net_id'] || $babanta->settings['net_creator'] == $datas['buser_id']){
	$this->admod = $datas['buser_id']; $this->user_editor = $datas['buser_id']; $this->user_manager = $datas['buser_id'];
}
$this->name = ($datas['buser_name'] || $datas['	buser_ap']) ? $datas['name_original'].' '.$datas['buser_ap'] : $datas['buser_nick'];
$this->is_member = $this->uid; 
if($datas['buser_rango'] == 3 || $datas['buser_rango'] == '3'){
$this->user_editor = $datas['buser_id'];
} //
if($datas['buser_rango'] == 4 || $datas['buser_rango'] == '4'){
$this->user_manager = $datas['buser_id'];
}
//
 }
// 
} 
}
function updatew(){ global $mysqli; if($this->uid){ $data_sess = $this->get_session(); if($data_sess['s_id']){ $mysqli->query('UPDATE w_sessions SET s_update = '.time().' WHERE s_id = \''.$data_sess['s_id'].'\' LIMIT 1'); } } }
function get_session(){ global $mysqli, $babanta; $cookie_name = 'LS_'.substr(md5($babanta->settings['url']), 0, 6); $cookie = $babanta->setSecure($_COOKIE[$cookie_name]); if($cookie){ $key_3 = str_replace('_', '', strstr($cookie, '__'))+5915; $part_1 = strstr($cookie, '__', true); $key_2 = str_replace('_', '', strstr($part_1, '_')); $key_1 = strstr($part_1, '_', true); $query = mysql_query('SELECT s_user, s_id FROM w_sessions WHERE s_user = \''.$key_1.'\' AND s_key = \''.$key_2.'\' AND s_date = \''.$key_3.'\' LIMIT 1'); $data = mysql_fetch_assoc($query); if($data) return $data; else return false; }else return false; }	
function dotup(){ 
global $babanta; 
$row = $this->info;
$fecha = $row['buser_refresh']; 
$ahora = time(); $tiempo = $ahora-$fecha; $totod = round($tiempo / 60); 
$defined = ($totod <= 15) ? '1' : ($totod >= 17 && $totod <= 38) ? '2' : '3'; 
mysql_query("UPDATE babanta_usuarios SET buser_refresh='$ahora',buser_active='$defined' WHERE buser_id='".$row['buser_id']."'");  
}
}
?>