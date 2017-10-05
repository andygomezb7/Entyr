<?php   if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/** FUNCIONES GLOBALES 
 * Un proyecto desarrollado por Andy Gómez
**/

class babanta{
var $settings; var $querys = 0;
public function isMobile(){ $mobiles = array( "midp", "240x320", "blackberry", "netfront", "nokia", "panasonic", "portalmmm", "sharp", "sie-", "sonyericsson", "symbian", "windows ce", "windows phone", "benq", "mda", "mot-", "opera mini", "philips", "pocket pc", "sagem", "samsung", "sda", "sgh-", "vodafone", "xda", "iphone", "android" ); foreach($mobiles as $mobileClient){ if (strstr(strtolower($_SERVER['HTTP_USER_AGENT']), $mobileClient)) return true; } return false; }
function babanta(){
	global $serverdomain;
	$this->settings = $this->getConfigs($serverdomain);
$this->settings['url'] = $this->settings['net_url'];
$this->settings['domain'] = $this->settings['net_domain'];
$this->settings['partner_url'] = $this->settings['net_url'];
$this->settings['name'] = $this->settings['net_name'];
$this->settings['exist'] = ($this->settings['net_id']) ? 1 : false;
$this->settings['css'] = $this->settings['url'].'/bbnt_archives/css';
$this->settings['js'] = $this->settings['url'].'/bbnt_archives/js';
$this->settings['images'] = $this->settings['url'].'/bbnt_archives/images';
$this->settings['isMobile'] = $this->isMobile();
}
function posnum($number){ 
$pre = 'KMG'; 
if ($number >= 1000) { 
for ($i=-1; $number>=1000; ++$i) { 
	$number /= 1000; 
} 
return round($number,1).$pre[$i]; 
} else return $number; 
}
public function setSecure($var, $xss = FALSE){ 
global $mysqli; 
$var = mysql_real_escape_string(function_exists('magic_quotes_gpc') ? stripslashes($var) : $var); 
if($xss){ return $var; }else{ return $var; } /* htmlspecialchars( */ 
}
function getConfigs($domain){
	$query = mysql_query("SELECT * FROM babanta_networks WHERE net_domain='".$domain."'");
	$data = mysql_fetch_assoc($query);
	return $data;
}
function wrecorte($texto, $limite=100){ 
$texto = trim($texto); $texto = strip_tags($texto); $tamano = strlen($texto); $resultado = ''; 
if($tamano <= $limite){ return $texto; }else{ $texto = substr($texto, 0, $limite); 
	$palabras = explode(' ', $texto); $resultado = implode(' ', $palabras); $resultado .= '...'; }
	return $resultado; 
}
function getRealIP() { 
		foreach (array('HTTP_CLIENT_IP',
					   'HTTP_X_FORWARDED_FOR',
					   'HTTP_X_FORWARDED',
					   'HTTP_X_CLUSTER_CLIENT_IP',
					   'HTTP_FORWARDED_FOR',
					   'HTTP_FORWARDED',
					   'REMOTE_ADDR') as $key){
			if (array_key_exists($key, $_SERVER) === true){
				foreach (explode(',', $_SERVER[$key]) as $IPaddress){
					$IPaddress = trim($IPaddress); // Just to be safe

					if (filter_var($IPaddress,
								   FILTER_VALIDATE_IP,
								   FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
						!== false) {

						return $IPaddress;
					}
				}
			}
		}
}

function ipexistconvert($ip){
					foreach (explode(',', $ip) as $IPaddress){
					$IPaddress = trim($IPaddress); // Just to be safe

					if (filter_var($IPaddress,
								   FILTER_VALIDATE_IP,
								   FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)
						!== false) {

						return $IPaddress;
					}
				}
}
    function url_dominio($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
    }
function visitasAdd($id, $type, $con){ 
global $wuser, $mysqli, $mobile; 
$u = $this->getRealIP();
$read = $_COOKIE['BB_CKR_'.$u];
if($read){
$data = json_decode($read, true);
}else{
$viscon = ($con) ? $con : '';
$agent = $_SERVER['HTTP_USER_AGENT']; //$this->detectUserAgent(
$referido = $_SERVER["HTTP_REFERER"];
$fbotw = (strstr($referido, 'facebook') || strstr($referido, 'twitter')) ? true : false;
$esvalido = ($fbotw && $referido) ? '1' : '0';
$pais = $_SERVER['HTTP_COUNTRY'];
$idioma = $this->getUserLanguage();
$mobile = ($mobile) ? '1' : '0';
$dominio = $this->url_dominio($referido);
$data = array(
'ip' => $u,
'agent' => $agent,
'referido' => $referido,
'valido' => $esvalido,
'pais' => $pais,
'idioma' => $idioma,
'mobile' => $mobile,
'dominio' => $dominio,
'viscon' => $viscon
);
$content = json_encode($data);
setcookie('BB_CKR_'.$u, $content, (time() + 60*60*24), '/', '.'.$_SERVER['HTTP_HOST'], 0, true);
}
if($u){
mysql_query("INSERT INTO visitas (
	id_v,
	type, 
	v_hace, 
	u_v, 
	vis_con, 
	vw_date 
	vw_ref, 
	vw_valida, 
	vw_pais, 
	vw_idioma, 
	vw_agent) VALUES(
	'".$id."', 
	'".$type."', 
	'".time()."', 
	'".$data['ip']."', 
	'".$data['viscon']."', 
	'".date("j/n/Y H:i:s")."', 
	'".$data['referido']."', 
	'".$data['valido']."', 
	'".$data['pais']."', 
	'".$data['idioma']."', 
	'".$data['agent']."')");  
}
}

/*
NUEVA FORMA DE CONTAR VISITAS
*/

function visitas($id, $useridget){
$useridget = ($useridget) ? $useridget : '0';
$querypostix = mysql_query("SELECT postix_id, postix_url, postix_active FROM postix_posts WHERE postix_id=".$id);
$querydata = mysql_fetch_assoc($querypostix);
if($querydata['postix_active'] == 0){

$file_to_bann=$_SERVER["DOCUMENT_ROOT"]."/sub_server/data_visitas.txt";
$read_file_ban = fopen($file_to_bann, "r");
$services_lists=fread($read_file_ban,filesize($file_to_bann));
$data_json = json_decode($services_lists, true);
		// data
$ip = $this->getRealIP();
$viscon = ($id) ? $id : '0';
$data_json_thisip = $data_json[$ip.'-'.$viscon];
if((!$data_json_thisip['data']['viscon'][$data['viscon']] && !$data_json_thisip['data']['user_post'][$data['user_post']]) || !is_array($data_json)){
// si no existe
$agent = $this->detectUserAgent($_SERVER['HTTP_USER_AGENT']);
$referido = $_SERVER["HTTP_REFERER"];
$fbotw = (strstr($referido, 'facebook') || strstr($referido, 'twitter')) ? true : false;
$esvalido = ($fbotw && $referido) ? '1' : '0';
$pais = $_SERVER['HTTP_COUNTRY'];
$idioma = $this->getUserLanguage();
$mobile = ($mobile) ? '1' : '0';
$dominio = $this->url_dominio($referido);
$data = array(
'ip' => $ip,
'agent' => $agent,
'referido' => $referido,
'valido' => $esvalido,
'pais' => $pais,
'idioma' => $idioma,
'mobile' => $mobile,
'dominio' => $dominio,
'viscon' => $viscon,
'time' => time(),
'date' => date("j/n/Y H:i:s"),
'user_post' => $useridget,
);
// end si no existe
}
		// end data
        $data_json_update = '';
if(is_array($data_json)){
		/*foreach($data_json AS $set => $row){
			$data_json_update[$set]['data'] = $row['data'];
		}*/
		if(!$data_json_thisip['data']['viscon'][$data['viscon']] && !$data_json_thisip['data']['user_post'][$data['user_post']]){
		$data_json_update[$ip.'-'.$data['viscon']]['data'] = $data;
		$data_json = array_merge($data_json_update, $data_json);
	    }else{
	    	//exit('etsiste');
	    }
}else{
	$data_json = array();
$data_json[$data['ip'].'-'.$viscon]['data'] = $data;
}
		$update_services = json_encode($data_json);
			$rewrite_banned=fopen($file_to_bann,"w");
			fwrite($rewrite_banned, $update_services);
		//var_dump($update_services);
		fclose($rewrite_banned);

	}

$url = ($querydata['postix_id']) ? $querydata['postix_url'] : $this->settings['url'].'/';
$url = ($querydata['postix_active'] == 0) ? $url : 'http://wortit.net';
return $url;
}
	function procesar_visita(){
		$id = ($_GET['pid']) ? $_GET['pid'] : 0;
		$userip = ($_GET['uid']) ? $_GET['uid'] : 0;
		$referido = $_SERVER["HTTP_REFERER"];
$fbotw = (strstr($referido, 'facebook') || strstr($referido, 'twitter')) ? true : false;
$esvalido = ($fbotw && $referido) ? '1' : '0';
if($esvalido == '1'){
		$control_ip_file=$_SERVER["DOCUMENT_ROOT"]."/sub_server/NEW_IP/".$_GET['pid'].'_'.$_GET['uid']."_".$this->getRealIP().".txt";
		if (!file_exists($control_ip_file)) {
			$grab_ip = fopen($control_ip_file , "a");
			fwrite($grab_ip, time());
			fclose($grab_ip);
			$visita_unica=true;
		}else{
			$ultimo_acceso = fread(fopen($control_ip_file, "r"), filesize($control_ip_file));
			$ultimo_acceso=(int)$ultimo_acceso;
			$un_dia_atras=time()-86400;
			if($ultimo_acceso<$un_dia_atras){
				$grab_ip = fopen($control_ip_file , "w");
				fwrite($grab_ip, time());
				fclose($grab_ip);
				$visita_unica=true;
			}else{
				$visita_unica=false;
			}			
		}
}else{
	return false;
}
		return $visita_unica;
	}
	/*
		getUserCountry()
	*/
	function getUserCountry(){
		//
		require(TS_ROOT.'/bbnt_resource/ext/geoip.inc.php');
		$ip = $this->getRealIP();
		$country = getCountryFromIP($ip, "code");
		//
		return $country;
	}
	function getUserLanguage() {  
       $idioma =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
       return $idioma;  
  }
/**
 * Funcion que devuelve un array con los valores:
 *  os => sistema operativo
 *  browser => navegador
 *  version => version del navegador
 */
function detectUserAgent($uagent){
$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME",'Ie','ie','Opera','opera','Mozilla','mozilla','Netscape','NetScape','netscape','Firefox','firefox','Safari','safari','Chrome','chrome',"midp", "240x320", "blackberry", "netfront", "nokia", "panasonic", "portalmmm", "sharp", "sie-", "sonyericsson", "symbian", "windows ce", "windows phone", "benq", "mda", "mot-", "opera mini", "philips", "pocket pc", "sagem", "samsung", "sda", "sgh-", "vodafone", "xda", "iphone", "android");
$os=array("WIN","MAC","LINUX",'win','Win','Mac','mac','Linux','linux');
foreach($browser as $parent){
$s = strpos(strtoupper($uagent), $parent);
$f = $s + strlen($parent);
$version = substr($uagent, $f, 15);
$version = preg_replace('/[^0-9,.]/','',$version);
if($s){ $info['browser'] = $parent; $info['version'] = $version; }
}
foreach($os as $val){
if(strpos(strtoupper($uagent),$val)!==false) $info['os'] = $val;
}
return $info;
}
function getIUP($array, $prefix = ''){ 
	$fields = array_keys($array); 
	$valores = array_values($array); 
	foreach($valores as $i => $val) { 
		if(!is_numeric($val)) $sets[$i] = $prefix.$fields[$i]." = '".$val."'"; else $sets[$i] = $prefix.$fields[$i]." = ".$val; } 
		$values = implode(', ',$sets); 
		return $values; 
	}
function encryptIt( $q ) { $cryptKey  = 'CLV_OKRWE_WRTTOK_WRK78.SLWWE-_-SKEFKW#154%100porcnt'; $qEncoded  = base64_encode($q.'#&%'.base64_encode($cryptKey)); return( $qEncoded );}
function decryptIt( $q ) { $cryptKey  = 'CLV_OKRWE_WRTTOK_WRK78.SLWWE-_-SKEFKW#154%100porcnt'; $qDecoded  = base64_decode($q); $explode = explode('#&%', $qDecoded); $qDecodedee = $explode[0]; return( $qDecodedee ); }
function checkPass($pass){ 
$count=strlen($pass); $entropia=0; 
if($count < 6){ return '0: Tu contraseña es muy corta.'; }
$upper = 0; $lower = 0; $numeros = 0; $otros = 0; 
if($count > 16){
return '0: La contraseña no puede ser mayor a 16 caracteres'; 
}elseif(!preg_match("`[a-z]`",$pass)){
return '0: La contraseña debe tener al menos una letra minúscula';
}elseif(!preg_match("`[A-Z]`",$pass)){
return '0: La contraseña debe tener al menos una letra mayúscula';
}elseif(!preg_match("`[0-9]`",$pass)){
return '0: La contraseña debe tener al menos un numero';
}else{
return false;
}
}

//

	/*
		Encriptador KOX
		Encriptacion simple by JNeutron :D
		koxEncode($tsData,$kox_1)
	*/
	function koxEncode($tsData,$kox_l = NULL){
		$KOXkey = array(
			'a' => '0','b' => 1,'c' => 2,'d' => 3,'e' => 4,'f' => 5,'g' => 6,'h' => 7,'i' => 8,'j' => 9,
			'k' => 'z','l' => 'y','m' => 'x','n' => 'w','o' => 'v','p' => 'u','q' => 't','r' => 's',
			's' => 'r','t' => 'q','u' => 'p','v' => 'o','w' => 'n','x' => 'm','y' => 'l','z' => 'k',
			'0' => 'j',1 => 'i',2 => 'h',3 => 'g',4 => 'f',5 => 'e',6 => 'd',7 => 'c',8 => 'b',9 => 'a',
			'@' => '{', '.' => '}',
		);
		if(!$kox_l || $kox_l > 9) $kox_l = rand(1,9);
		$kox_n = $KOXkey[$kox_l];
		$kox_s = strlen($tsData);
		for($i=0;$i<$kox_s;$i++){
			$kox_c = $tsData[$i];
			for($j=0;$j<$kox_l;$j++){
				if($KOXkey[$kox_c] != '') $kox_c = $KOXkey[$kox_c];
				else $kox_c = $tsData[$i];
			}
			$kox_key .= $kox_c;
		}
		return $kox_key.$kox_n;
	}
	/*
		By JNeutron
		koxDecode($tsKey)
	*/
	function koxDecode($tsKey){
		$KOXkey = array(
			'0' => 'a',1 => 'b',2 => 'c',3 => 'd',4 => 'e',5 => 'f',6 => 'g',7 => 'h',8 => 'i',9 => 'j',
			'z' => 'k','y' => 'l','x' => 'm','w' => 'n','v' => 'o','u' => 'p','t' => 'q','s' => 'r',
			'r' => 's','q' => 't','p' => 'u','o' => 'v','n' => 'w','m' => 'x','l' => 'y','k' => 'z',
			'j' => '0','i' => 1,'h' => 2,'g' => 3,'f' => 4,'e' => 5,'d' => 6,'c' => 7,'b' => 8,'a' => 9,
			'{' => '@', '}' => '.',
		);
		$kox_s = strlen($tsKey);
		$kox_l = $tsKey[$kox_s-1];
		$kox_n = $KOXkey[$kox_l];
		for($i=0;$i<$kox_s-1;$i++){
			$kox_c = $tsKey[$i];
			for($j=$kox_n;$j>0;$j--){
				if($KOXkey[$kox_c] != '') $kox_c = $KOXkey[$kox_c];
				else $kox_c = $kox_c;
			}
			$kox_txt .= $kox_c;
		}
		return $kox_txt;
	}

//

function url_exists( $url = NULL ) {
if(( $url == '' ) ||( $url == NULL ) ){ return false; }
$ch = curl_init($url);
curl_setopt($ch,CURLOPT_TIMEOUT,5);
curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,5);
curl_setopt($handle, CURLOPT_NOBODY, true);
curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$data = curl_exec($ch);
$httpcode = curl_getinfo($ch,CURLINFO_HTTP_CODE);
curl_close($ch); $accepted_response = array(200,301,302);
if( in_array( $httpcode, $accepted_response ) ) { return true; } else { return false; }
}
function getpages($numrows, $max = 21, $tamano = false, $url, $pagename = 'pgn', $mas){
$urlss = $url.($mas ? '&' : '?'); 
$pagina = (!$_REQUEST[$pagename]) ? 1 : $_REQUEST[$pagename];
$tamano = ($tamano != false) ? ' pagination-'.$tamano : '';
$datapages = '<nav><ul class="pagination'.$tamano.'">';
$total_paginas = round($numrows / $max);
if($total_paginas >= 1){
if ($pagina != 1 && $pagina > 1) $datapages .= '<li><a href="'.$urlss.$pagename.'='.($pagina-1).'"><span aria-hidden="true">&laquo;</span></a></li>';
for($i=1;$i<=$total_paginas;$i++){
if($pagina == $i){ $datapages .= '<li class="active"><a>'.$pagina.'</a></li>'; }else{ $datapages .= '<li><a href="'.$urlss.$pagename.'='.$i.'">'.$i.'</a>'; } }
if ($pagina != $total_paginas && $pagina <= $total_paginas) $datapages .= '<li><a href="'.$urlss.$pagename.'='.($pagina+1).'"><span aria-hidden="true">&raquo;</span></a></li>';
}else{
$datapages .= '<li class="active" ttl="'.$numrows.'"><a>1</a></li>';	
}
$datapages .= '</ul></nav>';
return $datapages;
}

// END CLASS
}