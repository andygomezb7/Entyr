<?php
$tpl = 0;
include ('../../babanta_header.php');


$postixid = $_GET['1'];
$useridget = $_GET['2'];

$windowhack = 0;
$iframehack = 0;
$querydata = mysql_fetch_assoc(mysql_query("SELECT * FROM postix_posts WHERE postix_id=".$postixid));
$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick, buser_register, buser_button, buser_adstype FROM babanta_usuarios WHERE buser_id='$useridget'"));
$querydata['postix_url'] = ($querydata['postix_url']) ? $querydata['postix_url'] : 'http://wortit.net';
$url = ($querydata['postix_active'] == 0) ? $querydata['postix_url'] : 'http://wortit.net/';
$url = str_replace('socialfap.net', 'socialfap.com', $url);
$url = str_replace('https', 'http', $url);

if(strpos($_SERVER['HTTP_USER_AGENT'],"facebook.com/externalhit_uatext.php")){
	$url = str_replace('socialfap.net', 'socialfap.org', $url);
	$extra = '?babanta_time='.time().'&sdf=wklsd_sdf&sdfmwvk_s=werg';
	die(header('location: '.$url.$extra));
}

$continue = true;

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
				die(header('location: http://www.wortit.net/'));
			}else{
				//users_to_bann('Posible Proxy');
			}		
	}
	// END HITLEAP CONTAINER

	// CONTAINERS
	$datauserin['buser_button'] = ($datauserin['buser_button']) ? $datauserin['buser_button'] : 1;
	$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id FROM u_cobros WHERE c_type=3 AND c_user_id=".$useridget));
	$decode_service = base64_decode($babanta->koxDecode($key_master));
	$data_service = explode('_', $decode_service);
	$postixid_data = $babanta->koxDecode($data_service[0]);
	$useridget_data = $babanta->koxDecode($data_service[1]);
	$this_register = $data_service[2];
	$this_valido = $data_service[3];
	$oksafe = $babanta->koxDecode($_POST['oksafe']);
	$pro = $babanta->setSecure($_REQUEST['perr']);
	//
        $cookiename = 'BBOK_'.$postixid.'_'.$useridget;
	$esvalido = ($this_valido == 'Data') ? '1' : '2';
	$validoes = (strstr($pro, 'facebook') && (time() || $infocobro['c_dinero'] < 10 && rand(0,2) == 0)) ? '1' : '2';
	//
    $oka = ($querydata['postix_content'] != 22) ? 'oc' : 'sx';
	header('location: '.$url.'?adstt='.$datauserin['buser_adstype'].'&mk='.$oka.'&u='.$useridget.'&opt='.$datauserin['buser_adstype'].($mobile ? '1' : '0').'#bb-'.$useridget);
//
?>