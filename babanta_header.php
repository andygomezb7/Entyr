<?php
/** FUNCIONES GLOBALES
*  Un proyecto desarrollado por Andy Gómez
 - BABANTA NETWORK - ORIGINAL SCRIPT
 - LICENCIA PARA <Babanta Network>
**/
if( defined('TS_HEADER') ) return;
define('UNTARGETED', TRUE);
if(!isset($_SESSION)) session_start(); 
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE); 
header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true ");
//ini_set('memory_limit', '-1');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}

if(!isset($page) ) $page = '';
$tpl = isset($tpl) ? $tpl : 1;
setlocale(LC_ALL,"es_ES");
define('TS_ROOT', realpath(dirname(__FILE__)));
define('TS_HEADER', TRUE);
define('TS_CLASS', 'bbnt_resource/class/');
define('TS_EXTRA', 'bbnt_resource/ext/');
define('TS_FILES', 'bbnt_archives/');
set_include_path(get_include_path() . PATH_SEPARATOR . realpath('./'));
$securekey['k'] = substr(md5('SF3_S3CUR3'.rand(0, 9)) ,0, 6);
include 'mysqli_start.php';
include 'config.w.php';
include TS_EXTRA.'functions.php'; // OPTIMIZADO

$serverdomain = getdomain($_SERVER['HTTP_HOST']);
$serverdomain = ($serverdomain == 'pub.babanta.net') ? 'babanta.net' : $serverdomain;
$serverdomain = ($serverdomain == 'entyr.nl') ? 'babanta.net' : $serverdomain;

include TS_CLASS.'babanta.class.php'; // OPTIMIZADO - MySQLi
include TS_EXTRA.'SmartQuery.php';
$babanta = new babanta;

include TS_CLASS.'user.class.php'; // OPTIMIZADO - MySQLi
$wuser = new wuser;

$wuser->read();
if(!$babanta->settings['exist']){
	die('<title>Error</title><body style="clear: both;background: #F6F6F6;padding: 2em 2em 1em;border: 1px solid #E7E7E7;-moz-border-radius: 5px;-webkit-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;"><h2 align="center" style="color:#222; font-size:25px; font-family:Century Gothic;">Error <br /><br />Este sitio no existe.</h2></body>');
}

if($_SERVER['HTTP_XLSWORTIT'] && $_SERVER['HTTP_HOST'] == 'babanta.net'){
$cookievalor = explode('=', $_SERVER['HTTP_XLSWORTIT']);
$datacookiesubdo = $wuser->validarcookie($cookievalor[1]);
if($datacookiesubdo['s_user']){ $request_user_subdo = $datacookiesubdo['s_user']; }
$cookievalor = $cookievalor[1];
}

$themes_array = array(
1 => 'default',
2 => 'freenetwork',
'1' => 'default',
'2' => 'freenetwork'
);
$tsTema = ($babanta->settings['net_theme'] == 2) ? 'freenetwork' : 'default';
define('TS_TEMA', $tsTema);
$mobile = $babanta->settings['isMobile'];
include 'bbnt_resource/libs/smarty/Smarty.class.php';
$smarty = new Smarty; 
$smarty->debugging = false;
$smarty->caching = false;
$smarty->cache_lifetime = 0;
$smarty->assign("mobile", $mobile);
if(strstr($_SERVER[ 'HTTP_USER_AGENT'], 'Android')){ $smarty->assign('isandroid', 'true'); }
$httphost[$securekey['k']] = $babanta->setSecure($_SERVER['HTTP_HOST']);
$requesturi[$securekey['k']] = $babanta->setSecure($_SERVER['REQUEST_URI']);
$location = "//".$httphost[$securekey['k']].$requesturi[$securekey['k']];
$smarty->assign('location', $location);
$get_['preg'] = $babanta->setSecure($_GET['preg']);
$get_['pref'] = $babanta->setSecure($_GET['pref']);
//$get_['hdrPott'] = $babanta->setSecure($_POST['hdrPott']);
$smarty->assign('get_', $get_);
// tpl
$ip = $babanta->getRealIP(); 
$idioma_val = $babanta->setSecure($_COOKIE['bbnt_idioma']);
$array_id=array(
1 => 'es',
2 => 'en'
);
$idioma = $array_id[$idioma_val];
$smarty->assign("idioma", $idioma);
$tiposervicio = ($serverdomain == 'pub.babanta.net') ? '_OK_' : '_NONE_';
$smarty->assign("tiposervicio", $tiposervicio);
?>