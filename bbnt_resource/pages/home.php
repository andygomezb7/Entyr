<?php
/*
*
*    @name home.php
*    Controlador de la Home
*
*/

/*
*---------------------------------------------------------------------
*       VARIABLES POR DEFECTO
*---------------------------------------------------------------------
*/

$tsPage = "home";
$tsTitle = $babanta->settings['name'];

	include(TS_CLASS."/panel.class.php");
	$tsDinero = new tsDinero();
	$tsDinero->cobrosmnsls();
	$action = empty($_GET['action']) ? 'dinero' : (string)$_GET['action'];
	// ACTUALIZAR PAGO MENSUAL
	$smarty->assign("tsAction",$action);
	$smarty->assign("pageworts", $babanta->setSecure($_REQUEST['pa']));
	$smarty->assign('cpcal', $tsDinero->calcular($wuser->uid));
	$smarty->assign("ingresos", $tsDinero->ingresoskoko($wuser->uid));
	$smarty->assign('estatuspagos', $tsDinero->pagos_status($wuser->uid));
	$smarty->assign("nomenu", 'noquieroelmenu');
	$smarty->assign('_chat', false);
	$smarty->assign('nofooter', 'noquieroelfooter');
	$thispage = $babanta->setSecure($_GET['page']);
	$smarty->assign('thispage', $thispage);
	$tuspaginasnum = mysql_num_rows(mysql_query("SELECT postix_user, postix_type FROM postix_posts WHERE postix_user='".$wuser->uid."' AND postix_type='3' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC"));
	$smarty->assign("tuspaginas", $tuspaginasnum);

	$allcats = result_array(mysql_query("SELECT * FROM postix_categoria WHERE postix_cat_network_id='".$babanta->settings['net_id']."'".($wuser->admod ? "" : " AND postix_cat_active='1'")));
	$smarty->assign('categorias', $allcats);

	if($thispage == 'noticias'){
		$categoriaget = $babanta->setSecure($_GET['cat']);
		$categro = ($categoriaget) ? '?page='.$thispage.'&cat='.$categoriaget : '?page='.$thispage;
		$categ = ($categoriaget) ? ' AND n.postix_content='.$categoriaget : '';
		$max = 12; // MAXIMO A MOSTRAR
        $pagina = $babanta->setSecure($_GET['png']);
        if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;}
        $limit = $inicio.','.$max;
		$querypostscompart = result_array(mysql_query("SELECT n.*, c.postix_cat_id, c.postix_cat_name FROM postix_posts AS n LEFT JOIN postix_categoria AS c ON n.postix_content = c.postix_cat_id WHERE n.postix_type='1'$categ".($wuser->admod ? "" : " AND n.postix_active='1'")." AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY n.postix_id DESC LIMIT ".$limit));
		//
		$rk = 0; foreach($querypostscompart AS $postcom){
			$rankpost = mysql_num_rows(mysql_query("SELECT id_v, type FROM visitas WHERE id_v='".$postcom['postix_id']."' AND type='58'"));
			mysql_query("UPDATE postix_posts SET postix_rank='".$rankpost."' WHERE postix_id=".$postcom['postix_id']);
			$querypostscompart[$rk]['visitas'] = $postcom['postix_rank'];
		$rk++; }
		//
		$totalnum = mysql_num_rows(mysql_query("SELECT postix_id, postix_type FROM postix_posts WHERE postix_type='1' AND postix_network_id='".$babanta->settings['net_id']."'$categ ORDER BY postix_id DESC"));
		$pagespostscompart = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
		$smarty->assign('pagelist', $pagespostscompart);
		$smarty->assign('postscompart', $querypostscompart);
		$queryurlspubs = result_array(mysql_query("SELECT * FROM postix_posts WHERE postix_type='2' AND postix_user='".$wuser->uid."'  AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC"));
	    $smarty->assign('publicaciones', $queryurlspubs);
	}else if($thispage == 'ranking'){
		$categoriaget = $babanta->setSecure($_GET['cat']);
		$categro = ($categoriaget) ? '?page='.$thispage.'&cat='.$categoriaget : '?page='.$thispage;
		$categ = ($categoriaget) ? ' AND n.postix_content='.$categoriaget : '';
		$max = 12; // MAXIMO A MOSTRAR
        $pagina = $babanta->setSecure($_GET['png']);
        if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;}
        $limit = $inicio.','.$max;
		$querypostscompart = result_array(mysql_query("SELECT n.*, c.postix_cat_id, c.postix_cat_name FROM postix_posts AS n LEFT JOIN postix_categoria AS c ON n.postix_content = c.postix_cat_id WHERE n.postix_type='1'$categ".($wuser->admod ? "" : " AND n.postix_active='1'")." AND n.postix_network_id='".$babanta->settings['net_id']."' ORDER BY n.postix_rank DESC LIMIT ".$limit));
		//
		$rk = 0; foreach($querypostscompart AS $postcom){
			$rankpost = mysql_num_rows(mysql_query("SELECT id_v, type FROM visitas WHERE id_v='".$postcom['postix_id']."' AND type='58'"));
			mysql_query("UPDATE postix_posts SET postix_rank='".$rankpost."' WHERE postix_id=".$postcom['postix_id']);
			$querypostscompart[$rk]['visitas'] = $postcom['postix_rank'];
		$rk++; }
		//
		$totalnum = mysql_num_rows(mysql_query("SELECT postix_id, postix_type FROM postix_posts WHERE postix_type='1' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC"));
		$pagespostscompart = $babanta->getpages($totalnum, 12, false, $babanta->settings['partner_url'].$categro, 'png', true);
		$smarty->assign('pagelist', $pagespostscompart);
		$smarty->assign('postscompart', $querypostscompart);
	}else if($thispage == 'payments'){
		$useridp = $babanta->setSecure($_GET['userid']);
		if($useridp){
			$pinfo = result_array(mysql_query("SELECT c.*, u.* FROM u_cobros AS c LEFT JOIN babanta_usuarios AS u ON c.c_user_id=u.buser_id WHERE u.buser_id='".$useridp."' AND c_network='".$babanta->settings['net_id']."' GROUP BY c.cid"));
			$ingresos = $tsDinero->ingresos($useridp);
			$ingresostete = $ingresos['usd'];
			$smarty->assign('ingre', $ingresostete.'=>'.$ingresos['date']);
			$smarty->assign('pall', $pinfo);
			$smarty->assign('userid', $useridp);
		}
	}elseif($thispage == 'estadisticas'){
	$smarty->assign('pordias', $tsDinero->listardias($wuser->uid));
	}elseif($thispage == 'pages'){
	$paginasquery = result_array(mysql_query("SELECT * FROM postix_posts WHERE postix_type='3' AND postix_user='".$wuser->uid."' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC"));
	$smarty->assign('paginas', $paginasquery);
    }

if($wuser->admod){
	if($thispage == 'admod'){
	if($action == 'editar' && $get_['pref']){
		$editarnoticia = mysql_fetch_assoc(mysql_query("SELECT * FROM postix_posts WHERE postix_id='".$get_['pref']."' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC LIMIT 1"));
		$smarty->assign('noticia', $editarnoticia);
	}
	$smarty->assign('ingresosadmin', $tsDinero->ingresoskoko(false, true, true));
	$paginasnuevas = result_array(mysql_query("SELECT postix_name, postix_url, postix_hace, postix_type, postix_network_id FROM postix_posts WHERE postix_type ='3' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC LIMIT 17"));
	$publicacionesrecientes = result_array(mysql_query("SELECT postix_name, postix_url, postix_hace, postix_type, postix_network_id FROM postix_posts WHERE postix_type='2' AND postix_network_id='".$babanta->settings['net_id']."' ORDER BY postix_id DESC LIMIT 17"));
    $smarty->assign('publicadmin', $publicacionesrecientes);
    $smarty->assign('pagesadmin', $paginasnuevas);
    }elseif($thispage == 'payments'){
    $todslosfact = $tsDinero->getadminfacturas();
    $smarty->assign('facturasall', $todslosfact);
    }
}

	//Meta Descripcion
	$tsBodyp = "Babanta network es sinonimo de montización social, Genera ingresos con tus redes sociales de manera simple! y con la gente mas capacitada para ayudarte";
	//Meta Tags
	$tsBodytags = "babanta, monetización, redes sociales, twitter, facebook, google +, google plus, google mas, generar, ganar dinero";
	//Meta Imagen
	$tsBodyi = 'http://i.imgur.com/1wcOPRw.png';
	//Meta Url
	$tsUrl = $babanta->settings['url'].'?time='.time();
	$smarty->assign("tsBodyp", $tsBodyp);
	$smarty->assign("tsBodytags", $tsBodytags);
	$smarty->assign("tsBodyi", $tsBodyi);
	$smarty->assign("tsUrl", $tsUrl);
			
    $smarty->assign("tsAction",$action);	

	if(empty($tsAjax)) {	// SI LA PETICION SE HIZO POR AJAX DETENER EL SCRIPT Y NO MOSTRAR PLANTILLA, SI NO ENTONCES MOSTRARLA.
	$smarty->assign("tsTitle",$tsTitle);	// AGREGAR EL TITULO DE LA PAGINA ACTUAL
	/*++++++++ = ++++++++*/
	include(TS_ROOT."/footer.php");
	/*++++++++ = ++++++++*/
	}
?>