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
	$thispage = 'publisher';
	$smarty->assign('thispage', $thispage);
	if($wuser->uid){
		// inicio si esta loggeado
	//
	$month = date('m');
	$year = date('Y');
	$faltames = date('t', $moth)-date('d');
	$smarty->assign("faltames", $faltames);
$allcats = result_array(mysql_query("SELECT * FROM postix_categoria".($wuser->admod ? "" : " WHERE postix_cat_active='0'")));
$smarty->assign('categorias', $allcats);
//


$areaswidgets = result_array(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_user=".$wuser->uid));
    	$smarty->assign('areaswidgets', $areaswidgets);

// end si esta loggeado
}	
	//Meta Descripcion
	$tsBodyp = "Babanta network es sinonimo de montización social, Genera ingresos con tus redes sociales de manera simple! y con la gente mas capacitada para ayudarte";
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