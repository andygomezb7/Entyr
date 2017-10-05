<?php 
	$tsPage = "home";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.
	$tsLevel = 1;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	$tsTitle = $babanta->settings['name']; 	// TITULO DE LA PAGINA ACTUAL
	if($wuser->admod){
		error_reporting(true);
	}
	include(TS_CLASS."/old.class.php");
	$tsDinero = new tsDinero();

	include TS_ROOT.'/bbnt_resource/class/goo.gl.php';
	$googl = new Googl();

	if($tsContinue){
	$cookie_name = 'LS_'.substr(md5($babanta->settings['url']), 0, 6); 
	$cookie = $_COOKIE[$cookie_name]; 
	$datossubdo = array(
	'dominio' => 'babanta',
	'extencion' => 'babanta.net',
	'cookiename' => $cookie_name,
	'cookievalue' => $cookie
	);
	$smarty->assign('subdo', $datossubdo);
	$referi = $babanta->setSecure($_REQUEST['a']);
	if(!$wuser->uid && $referi){
		$dato = mysql_fetch_assoc(mysql_query("SELECT buser_id FROM babanta_usuarios WHERE buser_id=".$referi));
	   if($dato['buser_id']){
		$this_domain = '.'.$_SERVER['HTTP_HOST'];
		$cookie_time = 60*60*24*7*12*10;
		setcookie('babanta_ref', $dato['buser_id'], (time() + $cookie_time), '/', $this_domain, 0, true);
	   }
	}
	
	$action = empty($_GET['action']) ? 'dinero' : (string)$_GET['action'];
		// ACTUALIZAR PAGO MENSUAL
	$smarty->assign("tsAction",$action);
	$smarty->assign("pageworts", $babanta->setSecure($_REQUEST['pa']));
	$smarty->assign('nofooter', 'noquieroelfooter');
	$thispage = $babanta->setSecure($_GET['page']);
	$smarty->assign('thispage', $thispage);
        $smarty->assign('actionlogin', $babanta->setSecure($_GET['actionlogin']));
	if($wuser->uid){
		// inicio si esta loggeado
	//
$manager_assign = mysql_fetch_assoc(mysql_query("SELECT buser_nick, buser_mail FROM babanta_usuarios WHERE buser_id=".$wuser->info['buser_m_assign']));
$smarty->assign('managerinfo', $manager_assign);
	$month = date('m');
	$year = date('Y');
	$faltames = date('t', $moth)-date('d');
	$smarty->assign("faltames", $faltames);
$allcats = result_array(mysql_query("SELECT * FROM postix_categoria".($wuser->admod ? " WHERE postix_cat_network_id='".$babanta->settings['net_id']."'" : " WHERE postix_cat_network_id='".$babanta->settings['net_id']."' AND postix_cat_active='0'")));
$smarty->assign('categorias', $allcats);
//
if($thispage == 'noticias' || $thispage == 'share'){
//

$categoriaget = $babanta->setSecure($_GET['cat']);
$smarty->assign('categoriaget', $categoriaget);
if($categoriaget){
	$querycatinfo = mysql_fetch_assoc(mysql_query("SELECT * FROM postix_categoria WHERE postix_cat_network_id='".$babanta->settings['net_id']."' AND postix_cat_id=".$categoriaget));
	$smarty->assign('categoriainfo', $querycatinfo);
}
$categro = ($categoriaget) ? '?page='.$thispage.'&cat='.$categoriaget : '?page='.$thispage;
$categ = ($categoriaget) ? ' AND postix_content='.$categoriaget : " AND postix_content!='22' AND postix_content!='30' AND postix_content!='31'";
$max = 12; // MAXIMO A MOSTRAR
$pagina = $babanta->setSecure($_GET['png']);
if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;}
$limit = $inicio.','.$max;
$querypostscompart = result_array(mysql_query("SELECT n.*, c.postix_cat_id, c.postix_cat_name FROM postix_posts AS n LEFT JOIN postix_categoria AS c ON n.postix_content = c.postix_cat_id WHERE n.postix_network_id='".$babanta->settings['net_id']."' AND n.postix_type='1'$categ".($wuser->admod ? "" : " AND n.postix_active='0'")." ORDER BY n.postix_id DESC LIMIT ".$limit));
//
$rk = 0; foreach($querypostscompart AS $postcom){
$urlshare_query = mysql_fetch_assoc(mysql_query("SELECT bac_id, bac_user, bac_nota, bac_key FROM babanta_acortador WHERE bac_nota='".$postcom['postix_id']."' AND bac_user='".$wuser->uid."'"));
if($urlshare_query['bac_id']){
$urlshare_thislink = $babanta->settings['net_url'].'/s/'.$urlshare_query['bac_key'];
}else{
$key_thislink = str_replace('=','',base64_encode($wuser->uid.'_'.$postcom['postix_id']));
if(mysql_query("INSERT INTO babanta_acortador(bac_user, bac_nota, bac_key,bac_time) VALUES('".$wuser->uid."','".$postcom['postix_id']."','".$key_thislink."','".time()."')")){
$urlshare_thislink = $babanta->settings['net_url'].'/s/'.$key_thislink; 
}else{ $urlshare_thislink = 'DTB ERROR';}
}
$querypostscompart[$rk]['visitas'] = $postcom['postix_rank'];
$querypostscompart[$rk]['urlshare'] = $urlshare_thislink; 
$rk++; }
//
$totalnum = mysql_num_rows(mysql_query("SELECT postix_id, postix_type, postix_active, postix_content, postix_network_id FROM postix_posts WHERE postix_network_id='".$babanta->settings['net_id']."' AND postix_type='1'$categ".($wuser->admod ? "" : " AND postix_active='0'")." ORDER BY postix_id DESC"));
$pagespostscompart = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
$smarty->assign('pagelist', $pagespostscompart);
$smarty->assign('postscompart', $querypostscompart);
//$queryurlspubs = result_array(mysql_query("SELECT * FROM postix_posts WHERE postix_network_id='".$babanta->settings['net_id']."' AND postix_type='2' AND postix_user='".$wuser->uid."' ORDER BY postix_id DESC"));
//$smarty->assign('publicaciones', $queryurlspubs);
// categorias

// 
//editor
}elseif($thispage == 'editor'){

if($action == 'editar' && $get_['pref']){
		$editarnoticia = mysql_fetch_assoc(mysql_query("SELECT p.*,b.* FROM postix_posts AS p LEFT JOIN babanta_blogads AS b ON p.postix_url = b.bbgs_seo WHERE p.postix_id='".$get_['pref']."' AND p.postix_network_id='".$babanta->settings['net_id']."' ORDER BY p.postix_id DESC LIMIT 1"));
		$smarty->assign('noticia', $editarnoticia);
	}

$new_post = intval($_POST['new_post']);
if($new_post == 1 || $new_post == '1'){ //
$data_array = array(
'titulo' => $_POST['titulo'],
'contenido' => $_POST['contentido'],
'seodesc' => $_POST['desc'],
'portada' => $_POST['portada'],
'seourl' => $_POST['seo'],
'videoimg' => $_POST['videoimg'],
'cpacat' => $_POST['catcpa'],
'adstype' => $_POST['adstipe'],
'vurl' => $_POST['videourl'],
);
$error = '';
foreach($data_array AS $name => $content){
if(!$content){ $error .= 'Hace falta: '.$name.'<br />'; }
}
if($error){
$error = $error;
$smarty->assign('error_new', 'warning');
$smarty->assign('error_new_text',$error);
}else{
if(mysql_query("INSERT INTO babanta_blogads (bbgs_title,
bbgs_ipauthor,
bbgs_content,
bbgs_portada,
bbgs_videoimg,
bbgs_seo,
bbgs_seodesc,
bbgs_cpa,
bbgs_tipoads,
bbgs_videourl,
bbgs_network) VALUES(
'".$data_array['titulo']."',
'".$ip_user."',
'".$data_array['contenido']."',
'".$data_array['portada']."',
'".$data_array['videoimg']."',
'".$data_array['seourl']."',
'".$data_array['seodesc']."',
'".$data_array['cpacat']."',
'".$data_array['adstype']."',
'".$data_array['vurl']."',
'".$babanta->settings['net_id']."')")){
$sucess_1 = 'Publicada en el blog';
//
if(mysql_query("INSERT INTO postix_posts (postix_name, postix_hace, postix_portada, postix_url, postix_type, postix_user, postix_content,postix_valor,postix_notatype,postix_valor2,postix_visitascount,postix_network_id) VALUES('".$data_array['titulo']."','".time()."','".$data_array['portada']."','".$data_array['seourl']."','1','".$wuser->uid."', '1','1','1','1','1','".$babanta->settings['net_id']."')")){ $success = $sucess_1.'; Publicada Correctamente';$smarty->assign('error_new', 'success'); $smarty->assign('error_new_text',$success);
}else{
 $success = $sucess_1.'; Error en agregar al panel'; $smarty->assign('error_new', 'danger'); $smarty->assign('error_new_text',$success); 
}
//
}else{
$success = 'Ocurrio un error en la base de datos. '.mysql_error();
$smarty->assign('error_new', 'danger');
$smarty->assign('error_new_text',$success);
}
}
}
	 // ESTADISTICAS
	}elseif($thispage == 'pages'){
	$paginasquery = result_array(mysql_query("SELECT * FROM postix_posts WHERE postix_network_id='".$babanta->settings['net_id']."' AND postix_type='3' AND postix_user='".$wuser->uid."' ORDER BY postix_id DESC"));
	$pin=0;foreach($paginasquery AS $pagein){
		$fbid = json_decode(file_get_contents('http:/'.$babanta->settings['net_domain'].'/int/getfbid/?all=true&url=http://facebook.com/'.$pagein['postix_url']), true);
		$paginasquery[$pin]['info'] =$fbid;
	$pin++; }
	$smarty->assign('paginas', $paginasquery);
    //
    }elseif($thispage == 'home' || !$thispage){
    	//
    $tuspaginasnum = mysql_num_rows(mysql_query("SELECT postix_user, postix_type,postix_network_id FROM postix_posts WHERE postix_network_id='".$babanta->settings['net_id']."' ANDpostix_user='".$wuser->uid."' AND postix_type='3' ORDER BY postix_id DESC"));
	$smarty->assign("tuspaginas", $tuspaginasnum);
    //
    $smarty->assign('minimodepago', $minimodepago);
    $smarty->assign('tupago',$total);
    $smarty->assign('proximomes', date($proxm, 'F'));
    $smarty->assign('onlines', '-');
    //
    $tsDinero->cobrosmnsls(false, true);
    $ingresos = $tsDinero->ingresoskoko($wuser->uid, false, false, true);
    //
    $referidoscount = mysql_num_rows(mysql_query("SELECT babanta_ref FROM babanta_usuarios WHERE babanta_ref=".$wuser->uid));
    $smarty->assign('referidoscount', $referidoscount);
    $ultimopago = mysql_fetch_assoc(mysql_query("SELECT * FROM u_cobros WHERE c_network='".$babanta->settings['net_id']."' AND c_type='2.5' AND c_user_id='$wuser->uid' ORDER BY cid DESC"));
    $ultpago = array(
    'total' => $ultimopago['c_dinero'],
    'porcent' => $ingresos['usd']/$ultimopago['c_dinero']*100
    );
    $smarty->assign('ultimopago', $ultpago);
    $seconds_elapsed=time() - strtotime("today");
    $incrimpresiones = array(
    'total' => $ingresos['impresiones']/$seconds_elapsed,
    'porcent' => $ingresos['impresiones']/$ultimopago['impresiones']*100
    );
    $smarty->assign('incrimpresiones', $incrimpresiones);
    $incrconversiones = array(
    'total' => $ingresos['c_conversiones']/$seconds_elapsed,
    'porcent' => $ingresos['c_conversiones']/$ultimopago['c_conversiones']*100
    );
    $smarty->assign('incrconversiones', $incrconversiones);
    //
    $dinerocpm = floatval(str_replace(',', '.', $ingresos['usd']));
    $CPM_user = $ingresos['impresiones']*$dinerocpm/1000;
    $ingresos = array('usd' => $ingresos['usd'], 'c_referidos' => $ingresos['c_referidos'], 'impresiones' => $ingresos['impresiones'], 'cps' => '0', 'conversiones' => $ingresos['c_conversiones'], 'CPM' => number_format($CPM_user,2,".",","), 'actualizacion' => date('d/m/Y h:i:s A  e',$ingresos['c_update']));
	$smarty->assign("ingresos", $ingresos); // $tsDinero->ingresoskoko($wuser->uid)
	$smarty->assign('cpcal', $ingresos);
	$smarty->assign('estatuspagos', $tsDinero->pagos_status($wuser->uid));
    $urlmin = $googl->shorten($babanta->settings['net_url'].'?a='.$wuser->uid);
	$referidoslink = ($urlmin) ? $urlmin : $babanta->settings['net_url'].'?a='.$wuser->uid;
	$smarty->assign('referidoslink', $referidoslink);
	$toppaisesxx = result_array(mysql_query('SELECT c.*,p.* FROM babanta_conversiones AS c LEFT JOIN u_paises AS p ON c.bcon_country = p.p_prefijo WHERE c.bcon_affiliate=\''.$wuser->uid.'\' GROUP BY p.p_prefijo ORDER BY c.bcon_money DESC LIMIT 5'));
    $smarty->assign('tpaises', $toppaisesxx);
    // END HOME;
    }elseif($thispage == 'red' || $thispage == 'manager'){

if($thispage == 'manager'){
    $max = 12; // MAXIMO A MOSTRAR
    $pagina = $babanta->setSecure($_GET['png']);
    if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;} $limit = $inicio.','.$max;
$asignadoslist = result_array(mysql_query("SELECT * FROM babanta_usuarios WHERE buser_m_assign='".$wuser->uid."' LIMIT ".$limit));
$asignadoscount = mysql_num_rows(mysql_query("SELECT buser_m_assign FROM babanta_usuarios WHERE buser_m_assign=".$wuser->uid));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($asignadoscount, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
$smarty->assign('asignadoscount', $asignadoscount);
$smarty->assign('asignadoslist', $asignadoslist);
}

    $urlmin = $googl->shorten($babanta->settings['net_url'].'?a='.$wuser->uid);
    $referidoslist = result_array(mysql_query("SELECT u.*, c.* FROM babanta_usuarios AS u LEFT JOIN u_cobros AS c ON u.buser_id = c.c_user_id WHERE c.c_type=3 AND u.babanta_ref=".$wuser->uid));
    /*$dinero = 0;
    foreach($referidoslist as $group => $row){
    	$data_dinero = floatval(str_replace(',', '.', $row['c_dinero'])); 
    	$org_dinero = $data_dinero*5/100; $dinero = $dinero+$org_dinero;
    }*/
    //$dinero = floatval(str_replace(',', '.', $dinero));
    //if($dinero>0){ mysql_query("UPDATE u_cobros SET c_referidos='$dinero' WHERE c_type=3 AND c_user_id=".$wuser->uid); }
    $smarty->assign('referidoslist', $referidoslist);
    $referidoslink = ($urlmin) ? $urlmin : $babanta->settings['net_url'].'?a='.$wuser->uid;
	$smarty->assign('referidoslink', $referidoslink);

	$ingresos = $tsDinero->ingresoskoko($wuser->uid, false, false, true);
	$CPM_user = floatval(str_replace(',', '.', $ingresos['usd']))*$ingresos['impresiones']/1000;
    $ingresos = array('usd' => $ingresos['usd'], 'c_referidos' => $ingresos['c_referidos'], 'impresiones' => $ingresos['impresiones'], 'cps' => '0', 'conversiones' => $ingresos['c_conversiones'], 'CPM' => number_format($CPM_user,2,".",","), 'actualizacion' => date('d/m/Y h:i:s A  e',$ingresos['c_update']));
	$smarty->assign("ingresos", $ingresos);
	$referidoscount = mysql_num_rows(mysql_query("SELECT babanta_ref FROM babanta_usuarios WHERE babanta_ref=".$wuser->uid));
    $smarty->assign('referidoscount', $referidoscount);

    }elseif($thispage == 'advertiser'){
    $max = 12; // MAXIMO A MOSTRAR
    $pagina = $babanta->setSecure($_GET['png']);
    if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;} $limit = $inicio.','.$max;
    	$areaswidgets = result_array(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_user=".$wuser->uid." LIMIT ".$limit));
$asignadoscount_widgers = mysql_num_rows(mysql_query("SELECT bad_type,bad_user FROM babanta_advertiser WHERE bad_type='1' AND bad_user=".$wuser->uid));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($asignadoscount_widgers, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
//
    	$smarty->assign('areaswidgets', $areaswidgets);
    $datadomains = result_array(mysql_query("SELECT * FROM  `babanta_statics_search` WHERE bss_user='".$wuser->uid."'"));
$din = 0; foreach($datadomains AS $rowdom){
$domitem = explode('_',base64_decode($rowdom['bss_ide']));
$datadomains2[$domitem[1]]['domainname'] = $domitem[1];
$datadomains2[$domitem[1]]['dinero'] = $rowdom['bss_dinero'];
$datadomains2[$domitem[1]]['conversiones'] = $rowdom['bss_conv'];
$din++; }
    $smarty->assign('datadomains', $datadomains2);

    }
    if($wuser->admod){
	if($thispage == 'admod'){
	if($action == 'editar' && $get_['pref']){
		$editarnoticia = mysql_fetch_assoc(mysql_query("SELECT * FROM postix_posts WHERE postix_id='".$get_['pref']."' ORDER BY postix_id DESC LIMIT 1"));
		$smarty->assign('noticia', $editarnoticia);
	}
	//$setCountrys = result_array(mysql_query("SELECT * FROM u_paises"));
	//$smarty->assign('countrys',$setCountrys);
	//$smarty->assign('ingresosadmin', $tsDinero->ingresoskoko(false, true, true));
    $max = 12; // MAXIMO A MOSTRAR
    $pagina = $babanta->setSecure($_GET['png']);
    if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;} $limit = $inicio.','.$max;
    //
    if($action == 'pages'){
		if($get_['pref']){
    		$buserpages = mysql_fetch_array(mysql_query("SELECT buser_nick, buser_id FROM babanta_usuarios WHERE buser_id=".$get_['pref']));
    		$smarty->assign('buser_pages', $buserpages[0]);
    	}
	$paginasnuevas = result_array(mysql_query("SELECT p.postix_name, p.postix_url, p.postix_hace, p.postix_type, p.postix_user, u.buser_nick, u.buser_id FROM postix_posts AS p LEFT JOIN babanta_usuarios AS u ON p.postix_user=u.buser_id WHERE p.postix_type ='3'".($get_['pref'] ? " AND p.postix_user=".$get_['pref'] : "")." ORDER BY p.postix_id DESC LIMIT ".$limit));
		$pin=0;foreach($paginasnuevas AS $pagein){
		$fbid = json_decode(file_get_contents('http://babanta.net/int/getfbid/?all=true&url=http://facebook.com/'.$pagein['postix_url']), true);
		$paginasnuevas[$pin]['info'] =$fbid;
	$pin++; }
	$smarty->assign('pagesadmin', $paginasnuevas);
	$totalnum = mysql_num_rows(mysql_query("SELECT postix_id, postix_type, postix_user FROM postix_posts WHERE postix_type ='3'".($get_['pref'] ? " AND postix_user=".$get_['pref'] : "")." ORDER BY postix_id DESC"));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
    //
    }elseif($action == 'pubs'){
	$publicacionesrecientes = result_array(mysql_query("SELECT postix_name, postix_url, postix_hace, postix_type FROM postix_posts WHERE postix_type='2' ORDER BY postix_id DESC LIMIT ".$limit));
    $smarty->assign('publicadmin', $publicacionesrecientes);
    $totalnum = mysql_num_rows(mysql_query("SELECT postix_name, postix_url, postix_hace, postix_type FROM postix_posts WHERE postix_type='2' ORDER BY postix_id DESC"));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
    //
    }elseif($action == 'camp'){
    $promoslist = result_array(mysql_query("SELECT * FROM babanta_promociones LIMIT ".$limit));
    $smarty->assign('bpromos', $promoslist);
    $totalnum = mysql_num_rows(mysql_query("SELECT * FROM  `babanta_promociones`"));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
    //
    }elseif($action == 'webmaster'){
    $webmaster_solit = result_array(mysql_query("SELECT * FROM  `babanta_usuarios` WHERE buser_state !=1 LIMIT ".$limit));
    $smarty->assign('websolit', $webmaster_solit);
    $totalnum = mysql_num_rows(mysql_query("SELECT * FROM  `babanta_usuarios` WHERE buser_state !=1"));
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
    //
    }elseif($action == 'locationsolit'){
	$websolit = result_array(mysql_query("SELECT * FROM  `babanta_usuarios` WHERE ".($get_['pref'] ? "buser_id=".$get_['pref'] : "buser_data_fact=2")." AND buser_network='".$babanta->settings['net_id']."' LIMIT ".$limit));
    $totalnum = mysql_num_rows(mysql_query("SELECT * FROM  `babanta_usuarios` WHERE ".($get_['pref'] ? "buser_id=".$get_['pref'] : "buser_data_fact=2")." AND buser_network='".$babanta->settings['net_id']."'"));
    if($get_['pref']){
    $buserpages = mysql_fetch_array(mysql_query("SELECT buser_nick, buser_id FROM babanta_usuarios WHERE buser_id='".$get_['pref']."' AND buser_network='".$babanta->settings['net_id']."'"));
    $smarty->assign('location_user', $buserpages[0]);	
    $websolit_dos = result_array(mysql_query("SELECT f.*, u.* FROM babanta_reviciones AS f LEFT JOIN babanta_usuarios AS u ON f.brv_user = u.buser_id WHERE f.brv_user=".$get_['pref']." AND u.buser_network='".$babanta->settings['net_id']."' LIMIT ".$limit));
    $totalnum_dos = mysql_num_rows(mysql_query("SELECT f.*, u.* FROM babanta_reviciones AS f LEFT JOIN babanta_usuarios AS u ON f.brv_user = u.buser_id WHERE f.brv_user=".$get_['pref']." AND u.buser_network='".$babanta->settings['net_id']."'"));
    array_push($websolit, $websolit_dos);
    if($totalnum_dos>0){ $totalnum = $totalnum+$totalnum_dos; }
    }
    $fss=0;foreach($websolit as $rowa){
    	$infofact = mysql_fetch_array(mysql_query("SELECT brv_info, brv_hace FROM babanta_reviciones WHERE brv_id=".$rowa['']));
    	$websolit[$fss]['location'] = json_decode($infofact[0],true);
    	$websolit[$fss]['factura_date'] = $infofact[1];
    $fss++;
    }
    $smarty->assign('locationsolit', $websolit);
    $categro = ($action) ? '?page='.$thispage.'&action='.$action : '?page='.$thispage;
    $webmast_pages = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
    $smarty->assign('pageshtml', $webmast_pages);
    //
    }
	    // 
    }elseif($thispage == 'payments'){

$useridp = $babanta->setSecure($_GET['userid']);
		$iposs = $babanta->setSecure($_GET['tipo']);
		if($useridp){
$userinfofact = mysql_fetch_assoc(mysql_query("SELECT buser_id, buser_name, buser_nick, buser_rango FROM babanta_usuarios WHERE buser_id='".$useridp."' OR buser_nick='".$useridp."'"));
$smarty->assign('userinfofact', $userinfofact);
if($useridp>0){
$useridp = $useridp; 
}else{
$useridp = $userinfofact['buser_id'];
}
			$tsDinero->cobrosmnsls($useridp, true);
			//$pinfo = result_array(mysql_query("SELECT c.*, u.* FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id=u.buser_id WHERE u.buser_id='".$useridp."' GROUP BY c.cid"));
			$pinfo = $tsDinero->getadminfacturas($iposs, $useridp, true);
			$ingresos = $tsDinero->ingresos($useridp);
			$ingresostete = $ingresos['usd'];
			$smarty->assign('ingre', $ingresostete.'=>'.$ingresos['date'].' && '.strtotime("8 April 2016").' /= ');
			$smarty->assign('pagesfacturas', $pinfo['pages']);
			$smarty->assign('pall', $pinfo['array']);
			$isuserid = ($useridp) ? '&userid='.$useridp : '';
			$isbanned = mysql_num_rows(mysql_query("SELECT * FROM babanta_banned WHERE bbb_obj='$useridp' AND bbb_type='2' AND bbb_state='1' "));
			$smarty->assign('userbanned', $isbanned);
			$smarty->assign('isuserid', $isuserid);
			$smarty->assign('userid', $useridp);
			$smarty->assign('userbanid', $useridp);
			$userinfote = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_usuarios WHERE buser_id=".$useridp));
			$smarty->assign('userinfo', $userinfote);
    	 }else{
    $tipode = $babanta->setSecure($_REQUEST['tipo']);
    $todslosfact = $tsDinero->getadminfacturas($tipode);
    $smarty->assign('pagesfacturas', $todslosfact['pages']);
    $smarty->assign('facturasall', $todslosfact['array']);
    $smarty->assign('dineroall', $todslosfact['total']);
        }
    }
}


// end si esta loggeado
}	
	//Meta Descripcion
	$tsBodyp = "CPM Babanta es la mejor empresa CPM del mercado, las mejores ofertas semanales y los mejores pagos por monetizar tus visitas sociales!, entra ahora y solicita unirte";
	//Meta Tags
	$tsBodytags = "babanta, monetización, redes sociales, twitter, facebook, google +, google plus, google mas, generar, ganar dinero";
	//Meta Imagen
	$tsBodyi = 'http://i.imgur.com/1wcOPRw.png';
	// meta url
	$tsUrl = $babanta->settings['url'].'?time='.time();
	$smarty->assign("tsBodyp", $tsBodyp);
	$smarty->assign("tsBodytags", $tsBodytags);
	$smarty->assign("tsBodyi", $tsBodyi);
	$smarty->assign("tsUrl", $tsUrl);
			
    $smarty->assign("tsAction",$action);	
	}
	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL

	/*++++++++ = ++++++++*/
	include(TS_ROOT."/footer.php");
	/*++++++++ = ++++++++*/