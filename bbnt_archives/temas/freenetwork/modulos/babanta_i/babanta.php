<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.likes.php
 * @author  Wortit Developers | Powered by Andy Gómez
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCIÓN
	$files = array(
		'babanta-register' => array('n' => 1, 'p' => ''),
		'babanta-login' => array('n' => 1, 'p' => ''),
		'babanta-cat' => array('n' => 1, 'p' => ''),
		'babanta-new' => array('n' => 1, 'p' => ''),
		'babanta-pub' => array('n' => 1, 'p' => ''),
		'babanta-cuenta' => array('n' => 1, 'p' => ''),
		'babanta-pages' => array('n' => 1, 'p' => ''),
		'babanta-pagob' => array('n' => 4, 'p' => ''),
		'babanta-limpiar' => array('n' => 4, 'p' => ''),
		'babanta-datos' => array('n' => 1, 'p' => ''),
		'babanta-delet' => array('n' => 4, 'p' => ''),
		'babanta-rangos' => array('n' => 4, 'p' => ''),
		'babanta-salir' => array('n' => 1, 'p' => ''),
		'babanta-server' => array('n' => 1,'p' => ''),
		'babanta-lim' => array('n' => 4, 'p' => ''),
		'babanta-revoc' => array('n' => 4, 'p' => ''),
		'babanta-deletpage' => array('n' => 1, 'p' => '')
	);

/**********************************\

* (VARIABLES LOCALES ESTE ARCHIVO)	*

\*********************************/

	// REDEFINIR VARIABLES
	$tsPage = 'ajax_files/'.$files[$action]['p'];
	$tsLevel = $files[$action]['n'];
	$tsAjax = empty($files[$action]['p']) ? 1 : 0;

	if($tsLevel == 4 && !$wuser->admod){
		die ('0: No tienes permisos para realizar esto');
	}

    if($files[$action]['p']){
    include '../libs/smarty/Smarty.class.php';
    $smarty = new Smarty;
    }else{}

/**********************************\

*	(INSTRUCCIONES DE CODIGO)		*

\*********************************/
	
	// CODIGO
	switch($action){
		case 'babanta-cat':
		if($wuser->admod || $wuser->babantaeditor){
		$action = $babanta->setSecure($_REQUEST['action']);
		$value = $babanta->setSecure($_REQUEST['vl']);
		if($action == 2){ // SUBMIT
			$valores = array(
				'id' => $babanta->setSecure($_REQUEST['id']),
				'name' => $babanta->setSecure($_REQUEST['name']),
				'date' => date('d/m/Y h:i:s A'),
				'time' => time()
			);
			$yaexistecat = mysql_num_rows(mysql_query("SELECT postix_cat_name FROM postix_categoria WHERE postix_cat_name=".$valores['name']));
			if($valores['name']){
			if($yaexistecat <= 0){
			if(mysql_query("INSERT INTO postix_categoria (postix_cat_name, postix_cat_date, postix_cat_hace) VALUES('".$valores['name']."', '".$valores['date']."', '".$valores['time']."')")){
				echo '1: Se agrego tu categoria: '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		}else{ echo '0: Ya existe una categoria con el mismo nombre'; }
		    }else{ echo '0: Ingresa los datos'; }
		}else{
			$valores = array(
				'id' => $babanta->setSecure($_REQUEST['id']),
				'name' => $babanta->setSecure($_REQUEST['name']),
				'date' => date('d/m/Y h:i:s A'),
				'time' => time()
			);
			if($valores['id']){
			if(mysql_query("UPDATE postix_categoria SET postix_cat_name ='".$valores['name']."',postix_cat_date ='".$valores['date']."', postix_cat_hace= '".$valores['time']."' WHERE postix_cat_id='".$valores['id']."'")){
				echo '1: Se edito tu categoria: '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		}
	}else{ echo '0: No tienes permisos para realizar esta acción'; }
		break;
		case 'babanta-new':
		if($wuser->admod || $wuser->babantaeditor){
		$action = $babanta->setSecure($_REQUEST['action']);
		$value = $babanta->setSecure($_REQUEST['vl']);
		$cpmdos = $babanta->setSecure($_POST['cpmdos']);
		$notatype = $babanta->setSecure($_POST['notatype']);
		$visitascount = $babanta->setSecure($_POST['visitascount']);
		if($action == 2){ // SUBMIT
			$valores = array(
				'name' => $babanta->setSecure($_REQUEST['name']),
				'portada' => $babanta->setSecure($_REQUEST['portada']),
				'url' => $babanta->setSecure($_REQUEST['url']),
				'type' => $babanta->setSecure($_REQUEST['type']),
				'valor' => $babanta->setSecure($_REQUEST['valor']),
				'user' => $wuser->uid,
				'date' => date('d/m/Y h:i:s A'),
				'time' => time(),
				'cpm' => $babanta->setSecure($_REQUEST['cpm']),
				'cpmdos' => ($cpmdos) ? $cpmdos : '1',
				'notatype' => ($notatype) ? $notatype : 1,
				'visitascount' => ($visitascount) ? $visitascount : 1,
			);
			if($valores['name'] && $valores['url'] && $valores['portada'] && $valores['valor']){
			if(mysql_query("INSERT INTO postix_posts (postix_name, 
				postix_hace, 
				postix_portada, 
				postix_url, 
				postix_type, 
				postix_user, 
				postix_content,
				postix_valor,
				postix_notatype,
				postix_valor2,
				postix_visitascount) VALUES(
				'".$valores['name']."', 
				'".$valores['time']."',
				'".$valores['portada']."',
				'".$valores['url']."',
				'".$valores['type']."',
				'".$valores['user']."',     
				'".$valores['valor']."',
				'".$valores['cpm']."',
				'".$valores['notatype']."',
				'".$valores['cpmdos']."',
				'".$valores['visitascount']."')")){
				echo '1: Se agrego tu noticia: '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		}else{
			$valores = array(
				'id' => $babanta->setSecure($_REQUEST['id']),
				'name' => $babanta->setSecure($_REQUEST['name']),
				'portada' => $babanta->setSecure($_REQUEST['portada']),
				'url' => $babanta->setSecure($_REQUEST['url']),
				'type' => $babanta->setSecure($_REQUEST['type']),
				'valor' => $babanta->setSecure($_REQUEST['valor']),
				'user' => $wuser->uid,
				'date' => date('d/m/Y h:i:s A'),
				'time' => time(),
				'cpm' => $babanta->setSecure($_REQUEST['cpm']),
				'cpmdos' => ($cpmdos) ? $cpmdos : '1',
				'notatype' => ($notatype) ? $notatype : 1,
			'visitascount' => ($visitascount) ? $visitascount : 1,
			);
			if($valores['name'] && $valores['id'] && $valores['portada'] && $valores['url'] && $valores['valor']){
			if(mysql_query("UPDATE postix_posts SET postix_name='".$valores['name']."', 
				postix_hace='".$valores['time']."', 
				postix_portada='".$valores['portada']."', 
				postix_url='".$valores['url']."', 
				postix_type='".$valores['type']."', 
				postix_content='".$valores['valor']."',
				postix_valor='".$valores['cpm']."',
				postix_notatype='".$valores['notatype']."',
				postix_valor2='".$valores['cpmdos']."',
				postix_visitascount='".$valores['visitascount']."',
				postix_update='".time()."' WHERE postix_id='".$valores['id']."'")){
				echo '1: Se edito tu nota ('.$valores['notatype'].'-'.$valores['cpmdos'].') : '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		}
		}else{ echo '0: No tienes permisos para realizar esta acción'; }
		break;
		case 'babanta-pub':
			$valores = array(
				'url' => $babanta->setSecure($_REQUEST['url']),
				'type' => $babanta->setSecure($_REQUEST['type']),
				'user' => $wuser->uid,
				'time' => time()
			);
			if($valores['url']){
			if(mysql_query("INSERT INTO postix_posts (
				postix_hace, 
				postix_url, 
				postix_type, 
				postix_user) VALUES(
				'".$valores['time']."', 
				'".$valores['url']."',
				'".$valores['type']."',
				'".$valores['user']."')")){
				echo '1: Se agrego tu Publicacion: '.$valores['url'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		break;
		case 'babanta-cuenta':
		$metodos = array(
			1 => 'paypal'
			);
		$metodo = $babanta->setSecure($_REQUEST['metodo']);
		$valor = $babanta->setSecure($_REQUEST['valor']);
		$banpay = mysql_num_rows(mysql_query("SELECT * FROM babanta_banned WHERE bbb_type='2' AND bbb_obj='".$valor."' AND bbb_state='1'"));
		if($metodo && $valor){
			if($banpay <= 0){
			if($valor != $wuser->info['partner_metodo']){
			if($metodos[$metodo]){
				if(mysql_query("UPDATE babanta_usuarios SET partner_metodo='".$metodo."', partner_pago='".$valor."' WHERE buser_id='".$wuser->uid."'")){
				echo '1: informaci&oacute;n guardada correctamente.';
				}else{ echo '0: ocurrio un error'; }
			}else{ echo '0: selecciona un metodo valido.'; }
		  }else{ echo '0: El valor que intentas actualizar es el mismo que tienes registrado.'; }
		}else{ echo '0: la cuenta que intentas ingresar esta baneada por el sistema.'; }
		}else{ echo '0: inserta los valores'; }
		break;
		case 'babanta-pages':
		$valores = array(
			'name' => $babanta->setSecure($_REQUEST['name']),
				'url' => $babanta->setSecure($_REQUEST['url']),
				'type' => $babanta->setSecure($_REQUEST['type']),
				'user' => $wuser->uid,
				'time' => time()
			);
		$domainsval = array(
			'twitter.com',
			'm.twitter.com',
			'facebook.com',
			'm.facebook.com',
			'web.facebook.com',
			'mobile.facebook.com',
			'mobile.twitter.com',
			'0.facebook.com'
			);
		$fbid = file_get_contents('http://www.babanta.net/int/getfbid/?url='.$valores['url']);
		$regispage = mysql_num_rows(mysql_query("SELECT * FROM postix_posts WHERE postix_type='3' AND postix_url='".$fbid."'"));
		    $dom = $babanta->url_dominio($valores['url']);
			if($valores['url'] && $valores['name']){
		if($regispage <= 0){
			if($fbid){
			if(mysql_query("INSERT INTO postix_posts (
				postix_name,
				postix_hace, 
				postix_url, 
				postix_type, 
				postix_user) VALUES(
				'".$valores['name']."', 
				'".$valores['time']."', 
				'".$fbid."',
				'".$valores['type']."',
				'".$valores['user']."')")){
				echo '1: Se agrego tu pagina: '.$valores['url'];
			}else{ echo '0: Ocurrio un error'; }
		}else{ echo '0: Esta no es una pagina valida ('.$fbid.')'; }
	    }else{ echo '0: Esta pagina ya esta registrada'; }
		    }else{ echo '0: Ingresa los datos'; }
		break;
		case 'babanta-pagob':
		$userid = ($_POST['userid']) ? $_POST['userid'] : $_GET['userid'];
		$cid = ($_POST['cid']) ? $_POST['cid'] : $_GET['cid'];
		if($userid){
		include("../class/old.class.php");
	    $tsDinero = new tsDinero();
	    $tipo = $babanta->setSecure($_POST['t']);
	    echo $tsDinero->pagar($userid, $cid, $tipo);
	}else{
		echo '0: No haz insertado un usuario.';
	}
		break;
		case 'babanta-limpiar':
		include("../class/old.class.php");
	    $tsDinero = new tsDinero();
	    var_dump($tsDinero->limpiar_visitas());
		break;
		case 'babanta-datos':
		include("../class/old.class.php");
	    $tsDinero = new tsDinero();
	    $user = $babanta->setSecure($_REQUEST['u']);
	    $tsDinero->cobrosmnsls(false, true);
	    $lim = $tsDinero->limpiar_visitas($user, true);

	    echo '<center><h1><img title="'.$lim['Aviso'].'" src="http://consuman.com/images/man-with-check-sign-05.png" width="30%" /></h1><hr><p>Tus datos han sido actualizados con exito, <a href="'.$babanta->settings['partner_url'].'">Revisar mis ganancias</a></p></center>';
		break;
		case 'babanta-delet':
		$type = $babanta->setSecure($_REQUEST['t']);
		$id = $babanta->setSecure($_REQUEST['i']);
		$vl = $babanta->setSecure($_REQUEST['o']);
		$vl = ($vl) ? $vl : '0';
		if($type == 1){ // categoria
			if(mysql_query("UPDATE postix_categoria SET postix_cat_active='".$vl."' WHERE postix_cat_id=".$id)){
				echo '1: Ejecutado';
			}else{
				echo '0: Error';
			}
		}else if($type == 2){ // noticia
			if(mysql_query("UPDATE postix_posts SET postix_active='".$vl."' WHERE postix_id=".$id)){
				echo '1: Ejecutado';
			}else{
				echo '0: Error';
			}
		}
		break;
		case 'babanta-onlines':
		echo '0';
		break;
		case 'babanta-ban':
		include("../class/old.class.php");
	    $tsDinero = new tsDinero();
	    $ob = $babanta->setSecure($_REQUEST['ob']);
	    $type = $babanta->setSecure($_REQUEST['type']);
	    $con = $babanta->setSecure($_REQUEST['con']);
	    $to = $babanta->setSecure($_REQUEST['to']);
	    echo $tsDinero->ban($ob, $type, $con, $to);
		break;
		case 'babanta-register':
	    $eject = $babanta->setSecure($_REQUEST['eject']);
		if($eject){
		include '../class/anonimo.class.php';
		$tsAnonimo =& tsAnonimo::getInstance();
		echo $tsAnonimo->register();
	    }else{
	    	echo '<div class="row">
                  <div {if $optionsregister}class="col-xs-6"{/if}>
                      <div class="well">
                          <form id="registerform" method="POST" novalidate="novalidate">
                              <div class="form-group">
                                  <label for="username" class="control-label">Username</label>
                                  <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">@</span>
                                  <input type="text" class="form-control" id="username" name="nombre" value="" required="" title="Please enter you username" placeholder="minick">
                                 </div>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">Correo</label>
                                  <input type="email" class="form-control" id="username" name="email" value="" required="" title="Please enter you username" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Password</label>
                                  <input type="password" class="form-control" id="password" name="clave" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">Confirmar password</label>
                                  <input type="password" class="form-control" id="password" name="reclave" value="" required="" title="Please enter your password">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">No eres un Robot?</label>
                                  <div class="g-recaptcha" data-sitekey="6LcFkA4TAAAAAK_e3l47bhEiAzvHJjaKs6U5M6X_"></div>
                                  <span class="help-block"></span>
                              </div>
                              <div id="loginErrorMsg" class="alert alert-error hide"></div>
                          </form>
                      </div>
                  </div>
              </div>
<script type="text/javascript">
  $(function(){
  	$.getScript("https://www.google.com/recaptcha/api.js?hl=es");
  });
</script>
              ';
	    }
		break;
		case 'babanta-login':
		$eject = $babanta->setSecure($_REQUEST['eject']);
		if($eject){
		include '../class/anonimo.class.php';
		$tsAnonimo =& tsAnonimo::getInstance();
		$username = $babanta->setSecure($_REQUEST['username']);
		$pass = $babanta->setSecure($_REQUEST['password']);
		echo $tsAnonimo->loginUser($username, $pass);
		}else{
		echo '<div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>
                                    </form>
                                    </div>
                                    </div>';
                                }
		break;
		case 'babanta-delet':
		$type = $babanta->setSecure($_REQUEST['t']);
		$id = $babanta->setSecure($_REQUEST['i']);
		$vl = $babanta->setSecure($_REQUEST['o']);
		$vl = ($vl) ? $vl : '0';
		if($type == 1){ // categoria
			if(mysql_query("UPDATE postix_categoria SET postix_cat_active='".$vl."' WHERE postix_cat_network_id='".$babanta->settings['net_id']."' AND postix_cat_id=".$id)){
				echo '1: Ejecutado';
			}else{
				echo '0: Error';
			}
		}else if($type == 2){ // noticia
			if(mysql_query("UPDATE postix_posts SET postix_active='".$vl."' WHERE postix_network_id='".$babanta->settings['net_id']."' AND postix_id=".$id)){
				echo '1: Ejecutado';
			}else{
				echo '0: Error';
			}
		}
		break;
		case 'babanta-rangos':
		$user = $babanta->setSecure($_REQUEST['i']);
		$rango = $babanta->setSecure($_REQUEST['o']);
			if(mysql_query("UPDATE babanta_usuarios SET buser_rango='".$rango."' WHERE buser_network='".$babanta->settings['net_id']."' AND buser_id=".$user)){
				echo '1: Ejecutado';
			}else{
				echo '0: Error';
			}
		break;
		case 'babanta-salir':
		include '../class/anonimo.class.php';
		$tsAnonimo =& tsAnonimo::getInstance();
		echo $tsAnonimo->logoutUser();
		break;
		case 'babanta-server':
		    if($wuser->uid){
		    include(TS_ROOT."/bbnt_resource/class/old.class.php");
	        $tsDinero = new tsDinero();
	        $tsDinero->cobrosmnsls(false, true);
	        $ingresos = $tsDinero->ingresoskoko($wuser->uid, false, false, true);
	        //$onl = strtotime('-10 minutes');
	        //$server_onlines = explode(',',$ingresos['c_onlines']);
	        $onlines_true = 0;
	        /*if(is_array($server_onlines)){
	        foreach($server_onlines AS $seronl => $toline){
	        	if($toline >= $onl){ $onlines_true = $onlines_true+1; }else{
	        	$onlins_se = str_replace(','.$seronl, '', $ingresos['c_onlines']);
	        	$mysqli->query("UPDATE u_cobros SET c_onlines='$onlins_se' WHERE c_type='3' AND c_user_id=".$wuser->uid);
	            }
	        }
	        }*/
            //$onlinesbabanta = mysql_num_rows(mysql_query("SELECT vis_con, vw_valida, type, v_hace, u_v FROM visitas WHERE vis_con='$wuser->uid' AND vw_valida='1' AND v_hace >= '$onl' AND type='58' GROUP BY u_v"));
        	$kjs['babantau'] = $ingresos['usd'];
        	$kjs['babantav'] = $ingresos['impresiones'];
        	$kjs['babantarefs'] = $ingresos['c_referidos'];
        	$kjs['babantaonli'] = intval($onlines_true);
        	$kjs['babantaupd'] = date('d/m/Y h:i:s');
        }else{
        	$kjs['error'] = 'Inicia sesi&oacute;n antes de continuar';
        }
        	echo json($kjs);
		break;
		case 'babanta-lim':
		$query = mysql_query("SELECT id, u_v FROM visitas WHERE u_v LIKE '%,%'");
		while($row = mysql_fetch_assoc($query)){
			$ar = explode(',', $row['u_v']);
			if(is_array($ar)){
			$ipreal = $babanta->ipexistconvert($row['u_v']);
			mysql_query("UPDATE visitas SET u_v='".$ipreal."' WHERE id=".$row['id']);
		}
		}
		die('listo!');
		break;
		case 'babanta-revoc':
			$useridb = $babanta->setSecure($_REQUEST['uid']);
			$buttonb = $babanta->setSecure($_REQUEST['bt']);
			$button = (!$buttonb) ? '1' : $buttonb;
			$userexist = mysql_num_rows(mysql_query("SELECT buser_id FROM babanta_usuarios WHERE buser_id=".$useridb));
		if($wuser->admod){
			if($userexist >= 1){
			if($mysqli->query("UPDATE babanta_usuarios SET buser_button='".$button."' WHERE buser_id=".$useridb)){
				echo '1: Le quitamos correctamente el botón.';
			}else{ echo '0: No se pudo realizar la acción.'; }
		}else{ echo '0: Este usuario no existe.'; }
		}else{ echo '0: no tienes permisos para realizar esto.'; }
		break;
		case 'babanta-deletpage':
		$pageid = $babanta->setSecure($_REQUEST['pageid']);
		$query = mysql_num_rows(mysql_query("SELECT * FROM postix_posts WHERE postix_type='3' AND postix_user='$wuser->uid' AND postix_id=".$pageid));
		if($query <= 0){
			echo '0: Esta pagina no es tuya';
		}else{
			if(mysql_query("DELETE postix_posts WHERE postix_type='3' AND postix_user='$wuser->uid' AND postix_id=".$pageid)){
				echo '1: Se elimino correctamente.';
			}else{ echo '0: Ocurrio un error, intentan nuevamente.'; }
		}
		break;
		default:
        echo '0: El archivo no existe.';
		break;
	}