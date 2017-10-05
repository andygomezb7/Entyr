<?php
$tpl = 0;
include ('../../babanta_header.php');

if(isset($_GET['pid'])){
	$postixid = $_GET['pid'];
}else{
	$postixid = $_POST['service'];
}
$useridget = $_GET['uid'];

$windowhack = 0;
$iframehack = 0;
$querydata = mysql_fetch_assoc(mysql_query("SELECT * FROM postix_posts WHERE postix_id=".$postixid));
$datauserin = mysql_fetch_assoc(mysql_query("SELECT buser_id,babanta_ref, buser_nick, buser_register, buser_button, buser_adstype,buser_servidor FROM babanta_usuarios WHERE buser_id='$useridget'"));
$querydata['postix_url'] = ($querydata['postix_url']) ? $querydata['postix_url'] : 'http://www.babanta.com/?akamaid=services';
$url = ($querydata['postix_active'] == 0) ? $querydata['postix_url'] : 'http://www.babanta.com/?akamaid=services';
$url = str_replace('socialfap.net', 'socialfap.com', $url);
$url = str_replace('https', 'http', $url);

if(strpos($_SERVER['HTTP_USER_AGENT'],"facebook.com/externalhit_uatext.php")){
	$url = str_replace('socialfap.net', 'socialfap.org', $url);
	$extra = '?babanta_akamaid='.time().'&time_akamaid=services&top_existe=trending_topic';
	die(header('location: '.$url.$extra));
}

$sxooc = ($querydata['postix_content'] != 22) ? 'ocio.tipslz.com' : 'sx.videosexlz.com';
$MKT = ($querydata['postix_content'] != 22) ? '1GH2SITE66822X3' : '1GH2SITE70818X1';
$referido = $_SERVER["HTTP_REFERER"];
$continue = true;
if($querydata['postix_content'] == 31 || $querydata['postix_content'] == 22 || $mobile){
$referido = $_SERVER["HTTP_REFERER"];
$domainreferrer = $babanta->url_dominio($referido);
$fbotw = ($facebook[$domainreferrer] || strpos($referido, 'facebook') || strpos($referido, 'twitter') || strpos($referido, 't.co')) ? true : false;
$esvalidolol = ($fbotw && $referido) ? 'Data' : 'Row';
$name = base64_encode($babanta->koxEncode($postixid).'_'.$babanta->koxEncode($useridget).'_'.md5($datauserin['buser_register']).'_'.$esvalidolol); 
$keymaster_babanta = $babanta->koxEncode($name);
$adstt = $datauserin['buser_adstype'];
$redirecion_url_hot = ''.$url.'?adstt='.$adstt.'&mk='.$oka.'&u='.$useridget.'_a_'.$postixid.'&opt='.$datauserin['buser_adstype'].($mobile ? '1' : '0').'#bb-'.$useridget.'_a_'.$postixid;
$idioma_navegador =substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 

    $cookiename = 'BBOK_'.$postixid.'_'.$useridget;
	//

	/* CONTEO DE LAS VISITAS PREMIUM */
	$postix_visitascount = intval($querydata['postix_visitas'])+1;
	$count_visitaspremium = mysql_query("UPDATE postix_posts SET postix_visitas = '$postix_visitascount' WHERE postix_id=".$querydata['postix_id']);

	/* END CONTEO DE LAS VISITAS PREMIUM */
	if(!$_COOKIE[$cookiename]){ $cookie_time = 60*60*24; setcookie($cookiename, 'THIS_'.$ip.'_THISTIME_'.time(), (time() + $cookie_time), '/', '.'.$_SERVER['HTTP_HOST'], 0, true); }

if(!$_COOKIE[$cookiename] && (rand(1,2) == 1 || intval($infocobro['c_impresiones']) < 5)){
$total_impresiones = intval($infocobro['c_impresiones'])+1;
$mysqli->query("UPDATE u_cobros SET c_impresiones='$total_impresiones' WHERE c_type='3' AND c_user_id=".$useridget);
$mysqli->query("UPDATE babanta_networks SET net_visitas=net_visitas+1 WHERE net_id=".$babanta->settings['net_id']);
}

?>
<meta charset="utf-8" /><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77396950-1', 'auto');
  ga('send', 'pageview');

</script>
<script>
/*lz="http://ocio.tipslz.com/inter_request.php?m=1GH2SITE66822X4&a=&direct=1&a=<?php echo $useridget; ?>_a_<?php echo $postixid; ?>&pubid=<?php echo $useridget; ?>_a_<?php echo $postixid; ?>&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+lz+"></scr"+"ipt>");*/
<?php if($mobile){ 
if($querydata['postix_content'] == 22){
$url_traffic_entyr= 'http://www.wirelesstube.mobi/?sl=256469-c1dd7&data1='.$useridget.'_a_'.$postixid.'&data3='.$useridget.'_a_'.$postixid.'&data2='.date('d-m-Y').'';
}else{
$url_traffic_entyr= 'http://www.bestphoneapps.mobi/?sl=697786-1efa0&data1='.$useridget.'_a_'.$postixid.'&data3='.$useridget.'_a_'.$postixid.'&data2='.date('d/m/Y').'';
  }
}else{ 
$url_traffic_entyr= $redirecion_url_hot;
}
?>
function redirect(){
location.href='<?php echo $url_traffic_entyr; ?>';
}
</script>
<h4 style="font-family:verdana, arial;"><?php if($idioma_navegador == 'es' || $idioma_navegador == 'ES'){ ?>
Por favor, espera un momento. De otro modo da <a href="<?php echo $url_traffic_entyr; ?>">click aqu&iacute;</a>
<?php }else{ ?>
Please wait a moment, alternatively <a href="<?php echo $url_traffic_entyr; ?>">click HERE</a>
<?php } ?>
</h4>
<iframe src="about:blank" onload="redirect()" style="display:none!important;width:100px;height:100px;"></iframe>
<meta http-equiv="Refresh" content="1;url=<?php echo $redirecion_url_hot; ?>">
<form method="POST" target="_parent" id="toto" action=""><input type="submit" class="button" onclick="h()" value="Seguir leyendo..." <?php if($continue){ echo 'style="display:none;"'; }?>/><input type="hidden" value="<?=$keymaster_babanta?>" name="nomber" /><input type="hidden" value="<?=$postixid?>" name="service" /><input type="hidden" value="<?=$useridget?>" name="proveder" /><input type="hidden" value="<?php echo $babanta->koxEncode($_SERVER['HTTP_REFERER']); ?>" name="oksafe" /><input type="hidden" value="0" name="perr"/></form>

<?php
}else{
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
	//

	/* CONTEO DE LAS VISITAS PREMIUM */
	$postix_visitascount = intval($querydata['postix_visitas'])+1;
	$count_visitaspremium = mysql_query("UPDATE postix_posts SET postix_visitas = '$postix_visitascount' WHERE postix_id=".$querydata['postix_id']);

	/* END CONTEO DE LAS VISITAS PREMIUM */
	if(!$_COOKIE[$cookiename]){ $cookie_time = 60*60*24; setcookie($cookiename, 'THIS_'.$ip.'_THISTIME_'.time(), (time() + $cookie_time), '/', '.'.$_SERVER['HTTP_HOST'], 0, true); }

if(!$_COOKIE[$cookiename] && (rand(1,4) == 1 || intval($infocobro['c_impresiones']) < 5)){
$total_impresiones = intval($infocobro['c_impresiones'])+1;
$mysqli->query("UPDATE u_cobros SET c_impresiones='$total_impresiones' WHERE c_type='3' AND c_user_id=".$useridget);
$mysqli->query("UPDATE babanta_networks SET net_visitas=net_visitas+1 WHERE net_id=".$babanta->settings['net_id']);
}

  $redirect = (!$datauserin['buser_adstype'] || $datauserin['buser_adstype'] == '1' || $datauserin['buser_adstype'] == 1) ? true : false;
   //if($redirect){
   //$dataacortador = mysql_fetch_assoc(mysql_query("SELECT bac_user, bac_nota, bac_url FROM babanta_acortador WHERE bac_user='".$useridget."' AND bac_nota=".$postixid));
   //if($_COOKIE[$cookiename] && $dataacortador['bac_url'] && $useridget=='1'){ 
   //	die(header('location: '.$dataacortador['bac_url'])); 
   // }else{
  	//
    /*if($mobile){  
    	$url_dredirec_mobusi = 'http://'.$sxooc.'/?m='.$MKT.'&pubid='.$useridget.'&a='.$useridget.'&xtra=1';
    	$bimoby_adulto = 'http://bimo.by/s/?cz=4&tz=1&sz=51112&iz='.$useridget;
    	$bimoby_ocio='http://bimo.by/s/?cz=3&tz=1&sz=51112&iz='.$useridget;
    	$url_dredirec_bimoby = ($querydata['postix_content'] != 22) ? $bimoby_ocio : $bimoby_ocio;
    	$bimoby_server = ($datauserin['buser_servidor'] == 2 || $datauserin['buser_servidor'] == '2') ? true : false;
    	$url_redireccion = ($bimoby_server) ? $url_dredirec_bimoby : $url_dredirec_mobusi;
    	//if($querydata['postix_content'] == 22 || $querydata['postix_content'] == '22'){ die(header('location: '.$url_redireccion)); }
    }*/
    //
   // } /// end; ouo.io
   //}

    $oka = ($querydata['postix_content'] != 22) ? 'oc' : 'sx';
    $adstt = $datauserin['buser_adstype'];
    //$url = ($querydata['postix_content'] == 22 || $querydata['postix_content'] == '22') ? 'http://pages.babanta.com/p/socialfap.html' : $url;
	header('location: '.$url.'?adstt='.$adstt.'&mk='.$oka.'&u='.$useridget.'_a_'.$postixid.'&opt='.$datauserin['buser_adstype'].($mobile ? '1' : '0').'#bb-'.$useridget.'_a_'.$postixid);
//
}
?>