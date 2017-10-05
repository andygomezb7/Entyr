<?php 
include ('../../babanta_header.php');
	$tsPage = "factura";	// tsPage.tpl -> PLANTILLA PARA MOSTRAR CON ESTE ARCHIVO.
	$tsLevel = 1;		// NIVEL DE ACCESO A ESTA PAGINA. => VER FAQs
	$tsContinue = true;	// CONTINUAR EL SCRIPT
	$tsTitle = $babanta->settings['name']; 	// TITULO DE LA PAGINA ACTUAL
	if($wuser->admod){
		error_reporting(true);
	}

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
	
	$action = empty($_GET['action']) ? 'dinero' : (string)$_GET['action'];
		// ACTUALIZAR PAGO MENSUAL
	$smarty->assign("tsAction",$action);
	$smarty->assign("pageworts", $babanta->setSecure($_REQUEST['pa']));
	$smarty->assign('nofooter', 'noquieroelfooter');
	$thispage = $babanta->setSecure($_GET['page']);
	$smarty->assign('thispage', $thispage);
	if(!$wuser->uid){ die(header('location: http://www.babanta.net')); }
	//
	$facturaid = $babanta->setSecure($_GET['id']);
	$facturainfo = mysql_query("SELECT * FROM u_cobros WHERE cid='$facturaid'");
	$number_factura = mysql_num_rows($facturainfo);
	$factura_info = mysql_fetch_assoc($facturainfo);
	$pagoinfo = mysql_fetch_assoc(mysql_query("SELECT * FROM u_pagos WHERE pid='".$factura_info['c_pais']."'"));
	$userinfo = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_usuarios WHERE buser_id=".$factura_info['c_user_id']));
	//$error = false;
	if($factura_info['c_user_id'] != $wuser->uid){ 
		$error = array(
			'title' => 'Sin acceso', 
			'desc' => 'No tienes permiso para ver esta factura'
			); 
	}elseif($number_factura <= 0){
			$error = array(
			'title' => 'No existe', 
			'desc' => 'Esta factura no existe'
			); 
	}
	$smarty->assign('error', $error);
	$smarty->assign('pagoinfo', $pagoinfo);
	$smarty->assign('userinfo', $userinfo);
	$smarty->assign('facturainfo', $factura_info);
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