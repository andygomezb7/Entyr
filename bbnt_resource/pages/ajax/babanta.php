<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script');
/**
 * Controlador AJAX
 *
 * @name    ajax.likes.php
 * @author  Wortit Developers | Powered by Andy G�mez
*/
/**********************************\

*	(VARIABLES POR DEFAULT)		*

\*********************************/

	// NIVELES DE ACCESO Y PLANTILLAS DE CADA ACCI�N
	$files = array(
		'babanta-register' => array('n' => 1, 'p' => ''),
		'babanta-login' => array('n' => 1, 'p' => ''),
		'babanta-cat' => array('n' => 2, 'p' => ''),
		'babanta-new' => array('n' => 2, 'p' => ''),
		'babanta-pub' => array('n' => 2, 'p' => ''),
		'babanta-cuenta' => array('n' => 2, 'p' => ''),
		'babanta-pages' => array('n' => 2, 'p' => ''),
		'babanta-pagob' => array('n' => 4, 'p' => ''),
		'babanta-limpiar' => array('n' => 4, 'p' => ''),
		'babanta-datos' => array('n' => 1, 'p' => ''),
		'babanta-delet' => array('n' => 4, 'p' => ''),
		'babanta-rangos' => array('n' => 4, 'p' => ''),
		'babanta-salir' => array('n' => 2, 'p' => ''),
		'babanta-server' => array('n' => 1,'p' => ''),
		'babanta-lim' => array('n' => 4, 'p' => ''),
		'babanta-revoc' => array('n' => 4, 'p' => ''),
		'babanta-deletpage' => array('n' => 2, 'p' => ''),
		'babanta-country' => array('n' => 4, 'p' => ''),
		'babanta-widget' => array('n' => 2, 'p' => ''),
		'babanta-loadwidget' => array('n' => 2, 'p' => ''),
		'babanta-ads' => array('n' => 1,'p' => ''),
		'babanta-webmaster' => array('n' => 2, 'p' => ''),
'babanta-adstype' => array('n' => 2, 'p' => ''),
'babanta-viewnote' => array('n' => 2, 'p' => ''),
'babanta-requeriments' => array('n' => 1, 'p' => ''),
'babanta-validardata' => array('n' => 4, 'p' => ''),
'babanta-webmasterk' => array('n' => 4, 'p' => ''),
'babanta-locationwk' => array('n' => 4, 'p' => ''),
'babanta-pass' => array('n' => 4, 'p' => ''),
'babanta-savewidget' => array('n' => 2, 'p' => ''),
'babanta-moverango' => array('n' => 4, 'p' => ''),
'babanta-addcamp' => array('n' => 4, 'p' => ''),
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
	}elseif($tsLevel == 2 && !$wuser->uid){
		die ('0: Inicia sesi�n antes');
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
			$yaexistecat = mysql_num_rows(mysql_query("SELECT postix_cat_name FROM postix_categoria WHERE postix_cat_name='".$valores['name']."' AND postix_cat_network_id='".$babanta->settings['net_id']."'"));
			if($valores['name']){
			if($yaexistecat <= 0){
			if(mysql_query("INSERT INTO postix_categoria (postix_cat_name, postix_cat_date, postix_cat_hace,postix_cat_network_id) VALUES('".$valores['name']."', '".$valores['date']."', '".$valores['time']."','".$babanta->settings['net_id']."')")){
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
			if(mysql_query("UPDATE postix_categoria SET postix_cat_name ='".$valores['name']."',postix_cat_date ='".$valores['date']."', postix_cat_hace= '".$valores['time']."' WHERE postix_cat_id='".$valores['id']."' AND postix_cat_network_id='".$babanta->settings['net_id']."'")){
				echo '1: Se edito tu categoria: '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		}
	}else{ echo '0: No tienes permisos para realizar esta acci�n'; }
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
				postix_visitascount,
                                postix_network_id) VALUES(
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
				'".$valores['visitascount']."',
                                '".$babanta->settings['net_id']."')")){
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
				postix_update='".time()."' WHERE postix_id='".$valores['id']."' AND postix_network_id='".$babanta->settings['net_id']."'")){
				echo '1: Se edito tu nota ('.$valores['notatype'].'-'.$valores['cpmdos'].') : '.$valores['name'];
			}else{ echo '0: Ocurrio un error'; }
		    }else{ echo '0: Ingresa los datos'; }
		}
		}else{ echo '0: No tienes permisos para realizar esta acci�n'; }
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
		$datosfact = array(
		'Nombre' => $babanta->setSecure($_REQUEST['namepart']),
		'Direccion' => $babanta->setSecure($_REQUEST['dirpart']),
		'Ciudad' => $babanta->setSecure($_REQUEST['ciupart']),
		'Estado' => $babanta->setSecure($_REQUEST['stapart']),
		'Codigo' => $babanta->setSecure($_REQUEST['codpart']),
		);
		$error = '';
		foreach($datosfact AS $cod => $part){
			if(!$part){ $error .= 'No ingresaste: '.$cod.'<br>'; }
		}
		if($error){ die('0: '.$error);}

		$banpay = mysql_num_rows(mysql_query("SELECT * FROM babanta_banned WHERE bbb_type='2' AND bbb_obj='".$valor."' AND bbb_state='1'"));
		if($metodo && $valor || !$error){
			if($banpay <= 0){
			if($valor != $wuser->info['partner_metodo']){
			if($metodos[$metodo] || !$error){
				if(mysql_query("UPDATE babanta_usuarios SET 
				".($metodo && $valor ? "partner_metodo='".$metodo."', 
				partner_pago='".$valor."'," : "")."
				buser_name='".$datosfact['Nombre']."',
				buser_date_1='".$datosfact['Direccion']."',
				buser_date_2='".$datosfact['Ciudad']."',
				buser_date_3='".$datosfact['Estado']."',
				buser_codepostal='".$datosfact['Codigo']."',
				buser_data_fact='2'
				WHERE buser_id='".$wuser->uid."' AND buser_network='".$babanta->settings['net_id']."'")){
				echo '1: Tu informaci&oacute;n se ha enviado para revisi&oacute;n correctamente.';
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
if(($wuser->admod && $wuser->info['buser_network'] == $babanta->settings['net_id']) || $wuser->info['buser_rango'] == 1){
	    echo $tsDinero->ban($ob, $type, $con, $to);
}else{ echo '0: No tienes permisos para realizar esta acci&oacute;n.'; }
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
                                  <div class="input-group" style="display:none!important;">
                                  <select onchange="itswebmaster($(this).val())" class="form-control" id="typeaccount" name="typeaccount" required="" >
                                  <option value="1" selected="selected">'.($idioma == 'en' ? 'Editor' : 'Editor').'</option>
                                  <option value="2">'.($idioma == 'en' ? 'Webmaster' : 'Webmaster').'</option>
                                  </select>
                                 </div>
                                  <span class="help-block"></span>
                              </div>
                              <script type="text/javascript">
                              function itswebmaster(val){
                              	if(val == 2){
                              		$(\'.webmasterblog\').show();
                              	}else{ $(\'.webmasterblog\').hide(); }
                              }
                              </script>
                              <div class="form-group webmasterblog" style="display:none;">
                                  <label for="webblog" class="control-label">'.($idioma == 'en' ? 'Enter your website/blog' : 'Ingresa tu sitio web/blog').'</label>
                                  <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">http://</span>
                                  <input type="text" class="form-control" id="webblog" name="webblog" value="" required="" title="'.($idioma == 'en' ? 'Enter your website/blog' : 'Ingresa tu sitio web/blog').'" placeholder="'.($idioma == 'en' ? 'Enter your website/blog' : 'Ingresa tu sitio web/blog').'">
                                 </div>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">'.($idioma == 'en' ? 'Username' : 'Nombre de usuario').'</label>
                                  <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">@</span>
                                  <input type="text" class="form-control" id="username" name="nombre" value="" required="" title="'.($idioma == 'en' ? 'Enter your username' : 'Ingrese su nombre de usuario').'" placeholder="'.($idioma == 'en' ? 'Enter your username' : 'Ingrese su nombre de usuario').'">
                                 </div>
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="username" class="control-label">'.($idioma == 'en' ? 'E-mail' : 'Correo electronico').'</label>
                                  <input type="email" class="form-control" id="username" name="email" value="" required="" title="'.($idioma == 'en' ? 'Example' : 'Ejemplo').'@mail.com" placeholder="example@gmail.com">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">'.($idioma == 'en' ? 'Password' : 'Contrase&ntilde;a').'</label>
                                  <input type="password" class="form-control" id="password" name="clave" value="" required="" title="******">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">'.($idioma == 'en' ? 'Confirm your password' : 'Confirmar tu contrase&ntilde;a').'</label>
                                  <input type="password" class="form-control" id="password" name="reclave" value="" required="" title="******">
                                  <span class="help-block"></span>
                              </div>
                              <div class="form-group">
                                  <label for="password" class="control-label">'.($idioma == 'en' ? 'Are not you a robot?' : '�No eres un robot?').'</label>
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
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="'.($idioma == 'en' ? 'Username or e-mail' : 'Nombre de usuario o correo').'">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="'.($idioma == 'en' ? 'Password' : 'Contrase&ntilde;a').'">
                                    </div>
                                    

                                
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                         ¿No tienes cuenta? <a href="javascript:void(0)" style="color:#222!important;font-weight:bold!important;" onclick="anonimo.register()">REGISTRATE ahora!</a>
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
	        $time_now=time();
		    $time_now=date('m-d-Y', $time_now);
		    $dinero_today = str_replace(',', '.', intval($ingresos['usd']));
		    $dinerocpm = floatval(str_replace(',', '.', $ingresos['usd']));
		    $CPM_user = $dinerocpm/$ingresos['impresiones']*1000;
	        //$onl = strtotime('-10 minutes');
	        //$server_onlines = explode(',',$ingresos['c_onlines']);
	        $onlines_true = 0;
	        /*if(is_array($server_onlines)){
	        foreach($server_onlines AS $seronl => $toline){
	        	if($toline >= $onl){ $onlines_true = $onlines_true+1; }else{
	        	$onlins_se = str_replace(','.$seronl, '', $ingresos['c_onlines']);
	        	$mysqli->query("UPDATE u_cobros SET c_onlines='$onlins_se' WHERE c_network='".$babanta->settings['net_id']."' AND c_type='3' AND c_user_id=".$wuser->uid);
	            }
	        }
	        }*/
                $cpmuserkoko = number_format($CPM_user,2,".",",");
                //$onlinesbabanta = mysql_num_rows(mysql_query("SELECT vis_con, vw_valida, type, v_hace, u_v FROM visitas WHERE vis_con='$wuser->uid' AND vw_valida='1' AND v_hace >= '$onl' AND type='58' GROUP BY u_v"));
        	$kjs['babantaconver'] = $ingresos['c_conversiones'];
        	$kjs['babantacpmuser'] = ($cpmuserkoko == 0 || $cpmuserkoko == '0') ? 1 : $cpmuserkoko;
        	$kjs['babantacps'] = $dinero_today/(time() - strtotime("today"));
        	$kjs['babantau'] = $ingresos['usd'];
        	$kjs['babantav'] = $ingresos['impresiones'];
        	$kjs['babantarefs'] = $ingresos['c_referidos'];
        	$kjs['babantaonli'] = intval($onlines_true);
        	$kjs['babantaupd'] = date('d/m/Y h:i:s A  e',$ingresos['c_update']);
        	mysql_query("UPDATE `user_estadisticas` SET ues_promedio='".$kjs['babantacps']."' WHERE ues_user='$wuser->uid' AND ues_fecha='$time_now'");
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
			$userexist = mysql_num_rows(mysql_query("SELECT buser_id FROM babanta_usuarios WHERE buser_network='".$babanta->settings['net_id']."' AND buser_id=".$useridb));
		if($wuser->admod){
			if($userexist >= 1){
			if($mysqli->query("UPDATE babanta_usuarios SET buser_button='".$button."' WHERE buser_network='".$babanta->settings['net_id']."' AND buser_id=".$useridb)){
				echo '1: Le quitamos correctamente el bot�n.';
			}else{ echo '0: No se pudo realizar la acci�n.'; }
		}else{ echo '0: Este usuario no existe.'; }
		}else{ echo '0: no tienes permisos para realizar esto.'; }
		break;
		case 'babanta-deletpage':
		$pageid = $babanta->setSecure($_REQUEST['pageid']);
		$query = mysql_num_rows(mysql_query("SELECT * FROM postix_posts WHERE postix_type='3' AND postix_user='$wuser->uid' AND postix_id=".$pageid));
		if($query <= 0){
			echo '0: Esta pagina no es tuya';
		}else{
			if(mysql_query("DELETE FROM postix_posts WHERE postix_type='3' AND postix_user='$wuser->uid' AND postix_id=".$pageid)){
				echo '1: Se elimino correctamente.';
			}else{ echo '0: Ocurrio un error, intentan nuevamente.'; }
		}
		break;
		case 'babanta-country':
		$country = $babanta->setSecure($_REQUEST['c']);
		$setLevel = $babanta->setSecure($_REQUEST['secure']);
		if(mysql_query("UPDATE u_paises SET p_puntos='$setLevel' WHERE pid=".$country)){
			echo '1: Editado';
		}else{
			echo '0: Error';
		}
		break;
		case 'babanta-widget':
		$nombre = $babanta->setSecure($_REQUEST['nambre']);
		$tipo = $babanta->setSecure($_REQUEST['tipo']);
		$tipo_2 = $babanta->setSecure($_REQUEST['tipo_red']);
		if($nombre && $tipo && $wuser->uid){
			if(mysql_query("INSERT INTO babanta_advertiser (
				bad_type,
				bad_tipos,
				bad_tipos_1,
				bad_tipos_2,
			    bad_content,
			    bad_user,
			    bad_time,
			    bad_update) VALUES(
			    '1',
			    '2',
			    '".$tipo."',
			    '".$tipo_2."',
			    '".$nombre."',
			    '".$wuser->uid."',
			    '".time()."',
			    '".time()."')")){
				echo '1: Creada correctamente. ('.$wuser->uid.')';
			}else{ echo '0: Ocurrio un error, intenta nuevamente.'; }
		}else{ echo '0: Rellena los datos'; }
		break;
		case 'babanta-loadwidget':
		$wid = $babanta->setSecure($_REQUEST['p']);
		$kr_id = $babanta->setSecure($_REQUEST['kr']);
		$infowidget = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_id='$wid' AND bad_user=".$wuser->uid));
if($infowidget['bad_id']){
//if($kr_id == 1){
$datatypes = array(
1 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&lbox=1&ip=4&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
2 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&lbox=1&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
3 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&img=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
4 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&ip=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
5 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&ip=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
6 => '<script language="javascript" type="text/javascript">
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>',
7 => '<script language="javascript" type="text/javascript">
bb_link="http://sx.babanta.net/inter_request.php?m=1GH2SITE70818X1&a=WIDG'.$infowidget['bad_id'].'&pubid='.$wuser->uid.'&img=2&dis_alg=mid&t=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
</script>'
);

if($kr_id == 1 || $kr_id == '1'){
echo '
<div class="alert alert-info">'.$infowidget['bad_tipos_1'].', Copia y pega este c&oacute;digo en tu sitio web  <i>(Opcional: ponlo arriba de la etiqueta <b>&lt;/head&gt;</b>)</i></div>
<br><div class="form-group">
<div class="form-group">
<label for="basic-url">C&oacute;digo</label>
<div class="input-group">
<input type="text" class="form-control" id="datawid'.$infowidget['bad_id'].'" value=\''.$scriptcopy.'\' placeholder="Script code">
<span class="input-group-btn">
<button class="btn btn-default" onclick="copy(document.getElementById(\'datawid'.$infowidget['bad_id'].'\'))" type="button">Copiar c&oacute;digo</button>
</span></div></div>
</div>
';
}else{
$scriptcopy = '<script language="javascript" type="text/javascript" src="http://www.babanta.net/cloud/babantaservices_'.$infowidget['bad_id'].'.js"></script>';
$is_banner = ($infowidget['bad_tipos_1'] == 4 || $infowidget['bad_tipos_1'] == '4') ? '<ins class="adsbybabanta" data-ad-yum="'.base64_encode($infowidget['bad_id'].'_'.$infowidget['bad_tipos_2'].'').'" data-ad-deb="'.md5('BBNT'.$infowidget['bad_user']).'"></ins>' : '';
echo '
'.($infowidget['bad_tipos_1'] != 4 || $infowidget['bad_tipos_1'] != '4' ? '<div class="alert alert-info">Copia y pega este c&oacute;digo en tu sitio web  <i>(Opcional: ponlo arriba de la etiqueta <b>&lt;/head&gt;</b>)</i></div>' : '').'
<br><div class="form-group">
<div class="form-group">
<label for="basic-url">C&oacute;digo'.($infowidget['bad_tipos_1'] == 4 || $infowidget['bad_tipos_1'] == '4' ? ' del banner' : '').'</label>
<div class="input-group">
<input type="text" class="form-control" id="datawid'.$infowidget['bad_id'].'" value=\''.$scriptcopy.''.$is_banner.'\' placeholder="Script code">
<span class="input-group-btn">
<button class="btn btn-default" onclick="copy(document.getElementById(\'datawid'.$infowidget['bad_id'].'\'))" type="button">Copiar c&oacute;digo</button>
</span></div></div>
<div class="form-group" '.($infowidget['bad_tipos_1'] == 4 || $infowidget['bad_tipos_1'] == 6 ? '' : 'style="display:none;"').'>
<label for="basic-url">Tipo de publicidad</label>
<div class="input-group">
<select class="form-control" id="categoria'.$infowidget['bad_id'].'" name="categoria'.$infowidget['bad_id'].'">
<option value="">Categoria</option>
<option value="1" '.($infowidget['bad_tipos_4'] == 1 || $infowidget['bad_tipos_4'] == '1' ? 'selected="selected"' : '').'>General</option>
<option value="2" '.($infowidget['bad_tipos_4'] == 2 || $infowidget['bad_tipos_4'] == '2' ? 'selected="selected"' : '').'>Instalaciones (Ocio)</option>
<option value="3" '.($infowidget['bad_tipos_4'] == 3 || $infowidget['bad_tipos_4'] == '3' ? 'selected="selected"' : '').'>Adulto (+18)</option>
<option value="4" '.($infowidget['bad_tipos_4'] == 4 || $infowidget['bad_tipos_4'] == '4' ? 'selected="selected"' : '').'>Descargas</option>
</select>
</div></div>
</div>
';
}

}else{
echo '<div class="alert alert-info">Este widget no existe.</div>';
}
		break;
		case 'babanta-ads':
$wid = $babanta->setSecure($_REQUEST['p']);
		$infowidget = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_id='$wid'"));
		if($infowidget['bad_id']){
		$datatypes = array(
			1 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&lbox=1&ip=4&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             2 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&lbox=1&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             3 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&img=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             4 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&ip=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             5 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&ip=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             6 => '
bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
',
             7 => '
bb_link="http://sx.babanta.net/inter_request.php?m=1GH2SITE70818X1&a=WIDG'.$infowidget['bad_id'].'&pubid='.$infowidget['bad_user'].'&img=2&dis_alg=mid&t=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");
'
		);
header("Content-type: text/javascript");
echo $datatypes[$infowidget['bad_data']];
	    }else{
	    	header("Content-type: text/javascript");
	    	echo '';
	    }
		break;
		case 'babanta-webmaster':
			$buttonb = $babanta->setSecure($_REQUEST['bt']);
			if($buttonb){
			if($mysqli->query("UPDATE babanta_usuarios SET buser_state_web='".$buttonb."',buser_button='3', buser_state='2' WHERE buser_id=".$wuser->uid)){
				echo '1: Solicitud enviada, recibiras un correo en breves cuando tu solicitud sea aceptada.';
			}else{ echo '0: No se pudo realizar la acci�n.'; }
		}else{ echo '0: Ingresa tu sitio web.'; }
		break;
case 'babanta-adstype':
$data = $babanta->setSecure($_POST['o']);
$array = array(
'1' => 'r',
'2' => 'r',
'3' => 'r',
'4' => 'p',
'5' => 'p'
);
if($array[$data]){
if(mysql_query("UPDATE babanta_usuarios SET buser_adstype='$data' WHERE buser_id=".$wuser->uid)){
echo 'Informaci�n actualizada';
}else{ echo 'Ocurrio un error, intenta nuevamente'; }
}else{
echo 'no existe este tipo';
}
break;
case 'babanta-viewnote':
$postixid = $babanta->setSecure($_REQUEST['id']);
if(!$postixid){ die('0:error'); }
$querynote =mysql_fetch_assoc(mysql_query("SELECT * FROM postix_posts WHERE postix_id=".$postixid));
if(!$querynote['postix_id']){ die('0:error'); }

function getUrlData($url)
{
    $result = false;
    
    $contents = @file_get_contents($url);

    if (isset($contents) && is_string($contents))
    {
        $title = null;
        $metaTags = null;
        
        preg_match('/<title>([^>]*)<\/title>/si', $contents, $match );

        if (isset($match) && is_array($match) && count($match) > 0)
        {
            $title = strip_tags($match[1]);
        }
        
        preg_match_all('/<[\s]*meta[\s]*name="?' . '([^>"]*)"?[\s]*' . 'content="?([^>"]*)"?[\s]*[\/]?[\s]*>/si', $contents, $match);
        
        if (isset($match) && is_array($match) && count($match) == 3)
        {
            $originals = $match[0];
            $names = $match[1];
            $values = $match[2];
            
            if (count($originals) == count($names) && count($names) == count($values))
            {
                $metaTags = array();
                
                for ($i=0, $limiti=count($names); $i < $limiti; $i++)
                {
                    $metaTags[$names[$i]] = array (
                        'html' => htmlentities($originals[$i]),
                        'value' => $values[$i]
                    );
                }
            }
        }
        
        $result = array (
            'title' => $title,
            'metaTags' => $metaTags
        );
    }
    
    return $result;
}

$tags = getUrlData($querynote['postix_url']);
$description = ($tags['metaTags']['description']) ? $tags['metaTags']['description'] : count($tags['metaTags']);
echo '<div class="row">
<div class="row">
  <div style="width:485px;margin:auto;">
    <div class="thumbnail">
<div style="width: 476px;height: 246px;overflow: hidden;">
     <img src="'.$querynote['postix_portada'].'" alt="..." style="
    -webkit-column-count: 3;
    -webkit-column-gap: 10px;
    -webkit-column-fill: auto;
    -moz-column-count: 3;
    -moz-column-gap: 10px;
    -moz-column-fill: auto;
    column-count: 3;
    column-gap: 15px;
    column-fill: auto;width:100%;">
</div>
      <div class="caption">
        <h3 style="margin: 10px 0;">'.$babanta->wrecorte($querynote['postix_name'],100).'</h3>
        <p>&nbsp'.$babanta->wrecorte($description, 80).'</p>
        <p style="margin: 16px 0 0;"><span>BABANTA.COM</span> <span>| DE <a href="javascript:void(0)">BABANTA</a></span></p>
      </div>
    </div>
  </div>
</div>
</div>';
break;
case 'babanta-requeriments': $servero = $babanta->setSecure($_REQUEST['server']);
$arrayrequeriments=array(
'money' => $babanta->setSecure($_REQUEST['money']),
'affiliate' => $babanta->setSecure($_REQUEST['affiliate']),
'idtransaction' => $babanta->setSecure($_REQUEST['idtransaction']),
'country' => $babanta->setSecure($_REQUEST['country']),
'currency' => $babanta->setSecure($_REQUEST['currency']),
'date' => $babanta->setSecure($_REQUEST['date']),
'server' => $servero ? $servero : 1,
);
// ejemplo: $NETID_n_$USERID_a_$POSTID
$affiliate_info = explode('_a_', $arrayrequeriments['affiliate']);
$affiliate_id_1 = $affiliate_info[0];
$affiliate_id_ex = explode('_n_', $affiliate_id_1);
$affiliate_id = $affiliate_id_ex[1];
$affiliate_network = $affiliate_id_ex[0];
$noticia_id = ($affiliate_info[1]) ? $affiliate_info[1] : $affiliate_info_2[1];
$error = false;
$net_fail = 0;
foreach($arrayrequeriments AS $ret => $lord){
if(!$lord){
	//die('{"type":2,"error":"No esta insertado: '.$ret.'","success":""}');
	//$error = true;
	$net_fail= $net_fail+1;
}
}
$json_pep = array();
$json_pep['uno']='dos';
foreach($_REQUEST AS $lal => $ske){
if(!$arrayrequeriments[$lal]){
	$json_pep[$lal] = $ske;
}
}

$json_xtras = json_encode($json_pep);
$expression = $babanta->setSecure($_REQUEST['expression']);
if($expression != 'DATA288573'){  
$error = true;
mysql_query("UPDATE babanta_networks SET net_fail=net_fail+1 WHERE net_id=".$babanta->settings['net_id']);
echo '{"type":2,"error":"Error de seguridad","success":""}';
}
if(!$error){
$money_require = str_replace(',','.',$arrayrequeriments['money']);
	if(mysql_query("INSERT INTO babanta_conversiones(
		bcon_money,
		bcon_affiliate,
		bcon_idtransaction,
		bcon_country,
		bcon_currency,
		bcon_date,
		bcon_time,
		bcon_json,
        bcon_server,
        bcon_note,
        bcon_network
		) VALUES(
		'".$money_require."',
		'".$affiliate_id."',
		'".$arrayrequeriments['idtransaction']."',
		'".$arrayrequeriments['country']."',
		'".$arrayrequeriments['currency']."',
		'".$arrayrequeriments['date']."',
		'".time()."',
		'".$json_xtras."',
        '".$arrayrequeriments['server']."',
        '".$noticia_id."',
        '".$affiliate_network."'
		)")){
	$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id, c_conversiones, c_network FROM u_cobros WHERE c_type=3 AND c_user_id='".$affiliate_id."' AND c_network='".$affiliate_network."'"));
	$my_actual_money = floatval(str_replace(',', '.', $infocobro['c_dinero']));
	$total_acumulated=$arrayrequeriments['money'];
	$porcent = $total_acumulated*30/100;
	$total_acumulated_porcent = $total_acumulated-$porcent;
	$total_acumulated_full = $my_actual_money+$total_acumulated_porcent; 
	$mysqli->query("UPDATE u_cobros SET c_dinero='$total_acumulated_full' WHERE c_network='".$affiliate_network."' AND c_type='3' AND c_user_id=".$affiliate_id);
	// REFERIDO INFO
	$datauserin = mysql_fetch_array(mysql_query("SELECT babanta_ref, buser_id, buser_network FROM babanta_usuarios WHERE buser_id='".$affiliate_id."' AND buser_network='".$affiliate_network."'"));
	if($datauserin['babanta_ref']){
	$referer_data = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id, c_network FROM u_cobros WHERE c_type=3 AND c_network='".$affiliate_network."' AND c_user_id=".$datauserin['babanta_ref']));
	$my_actual_money = floatval(str_replace(',', '.', $referer_data['c_referidos']));
	$referer_percent=$arrayrequeriments['money']*0.05;
	$total_acumulated=$my_actual_money + $referer_percent; 
	$mysqli->query("UPDATE u_cobros SET c_referidos='$total_acumulated' WHERE c_network='".$affiliate_network."' AND c_type='3' AND c_user_id=".$datauserin['babanta_ref']);
	}
	// REFERIDO END;
	$mysqli->query("UPDATE u_cobros SET c_conversiones=c_conversiones+1 WHERE c_network='".$affiliate_network."' AND c_type='3' AND c_user_id=".$affiliate_id);
        $mysqli->query("UPDATE u_cobros SET c_impresiones=c_impresiones+1 WHERE c_network='".$affiliate_network."' AND c_type='3' AND c_user_id=".$affiliate_id);
	$array_notice = array(
		1 => array('search' => 'SITE', 'type' => 1),
	    2 => array('search' => 'WIDRO', 'type' => 2),
	);
		foreach($array_notice AS $row => $data){
	 $pos_view = strpos($noticia_id, $data['search']);
	 if($pos_view === false){ /**/ }else{
	 	$exp_info = explode($data['search'], $noticia_id);
	 	$ide_cont = $exp_info[1];
	 	$num_co=mysql_fetch_assoc(mysql_query("SELECT bss_ide, bss_type,bss_dinero,bss_network FROM babanta_statics_search WHERE bss_ide='".$ide_cont."' AND bss_network='".$affiliate_network."' AND bss_type='".$data['type']."' "));
	    if(!$num_co{'bss_ide'}){
	    mysql_query("INSERT INTO babanta_statics_search(bss_ide,bss_dinero,bss_conv,bss_act,bss_act_time,bss_type,bss_user,bss_network) VALUES('".$ide_cont."','".$total_acumulated_full."','1','".date('d/m/Y h:i:s')."','".time()."','".$data['type']."','".$affiliate_id."','".$affiliate_network."')");
	    }else{
	    	$total_SITE_ACCOUM = $num_co['bss_dinero']+$total_acumulated_porcent;
	    	mysql_query("UPDATE babanta_statics_search SET bss_dinero='$total_SITE_ACCOUM', bss_conv=bss_conv+1, bss_act='".date('d/m/Y h:i:s')."', bss_act_time='".time()."' WHERE bss_network='".$affiliate_network."' AND bss_ide='".$ide_cont."' AND bss_type='".$data['type']."'");
	    }
	 }
	}
	echo '{"type":1,"error":"","success":"Completado'.$arrayrequeriments['affiliate'].'=>'.$affiliate_id.'"}';
if($net_fail>=1){
	//mysql_query("UPDATE babanta_networks SET net_fail=net_fail+1 WHERE net_id=".$babanta->settings['net_id']);
}
	}else{
		mysql_query("UPDATE babanta_networks SET net_fail=net_fail+1 WHERE net_id=".$babanta->settings['net_id']);
		echo '{"type":2,"error":"Error en la base de datos'.MySQL_error().'","success":""}';
	}
}
break;
case 'babanta-validardata':
$userid = $babanta->setSecure($_REQUEST['u']);
$infocobro = mysql_fetch_assoc(mysql_query("SELECT c_referidos,c_dinero, c_impresiones, c_type, c_user_id, c_conversiones, c_date FROM u_cobros WHERE c_type=3 AND c_user_id=".$userid));
$cobro_time = $infocobro['c_date'];
$conversiones_query = result_array(mysql_query("SELECT bcon_money,bcon_affiliate FROM babanta_conversiones WHERE bcon_time > $cobro_time AND bcon_affiliate=".$userid));

$bcon_acumulated = 0;
foreach($conversiones_query AS $row => $exist){
$money = floatval(str_replace(',', '.', $exist['bcon_money']));
$bcon_acumulated = $bcon_acumulated+$money;
}
$porcent = $bcon_acumulated*20/100;
$cacuml = $bcon_acumulated-$porcent;
if($mysqli->query("UPDATE u_cobros SET c_dinero='$cacuml' WHERE c_type='3' AND c_user_id=".$userid)){
echo 'actualizado a: '.$cacuml.', ganando: '.$porcent;
}else{
	echo 'ERROR: '.$mysqli->error;
}

break;
case 'babanta-webmasterk':
$userid = $babanta->setSecure($_REQUEST['userid']);
$confirm = $babanta->setSecure($_REQUEST['confirm']);

if($confirm && $userid){
$userinfo = mysql_fetch_assoc(mysql_query("SELECT buser_id, buser_mail, buser_nick FROM babanta_usuarios WHERE buser_id=".$userid));
if(mysql_query("UPDATE babanta_usuarios SET buser_state='1' WHERE buser_id=".$userid)){
//// ENVIAR CORREO ////
$para = $userinfo['buser_mail'];
$titulo = $babanta->settings['net_name'].' | Tu sitio web ha sido aceptado';
include TS_ROOT.'/bbnt_resource/class/mail.class.php';
$tsMail = new tsMail;
$para = array(
  1 => array('c' => $para, 'n' => '@'.$buser_nick)
);
$de = 2;
$asunto = $titulo;
$body = array(
'top' => 'Gracias por optar a monetizar tu sitio web con nosotros <b>'.$userinfo['buser_nick'].'</b>, agradecemos la confianza que haz brindado con nosotros y esperamos tengas la mejor experiencia y las mejores ganancias con nosotros.',
'center' => 'De parte del equipo de <b>Babanta</b> te deseo buena suerte y exito en tus ganancias y en tu vida :)',
'bottom' => '',
'link' => array('link' => 'http://www.babanta.net/?welcome', 'name' => 'Ir&nbsp;a&nbsp;Babanta'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Gracias por optar a monetizar tu sitio web con nosotros '.$userinfo['buser_nick'].', agradecemos la confianza que haz brindado con nosotros y esperamos tengas la mejor experiencia y las mejores ganancias con nosotros. entra al panel y empieza a generar! (www.babanta.net)';

$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);
/// END CORREO /////
$correosend = ($sentmail) ? '(Correo enviado)' : '(Problemas con la bienvenida)'; 
echo 'Solicitud confirmada.'.$correosend;
}else{ echo 'Error! en la base de datos, contacta a un programador.'; }
}else{ echo 'Error! no enviaste nada.'; }
break;
case 'babanta-locationwk':
//
$userid = $babanta->setSecure($_REQUEST['userid']);
$confirm = $babanta->setSecure($_REQUEST['confirm']);
$ss_info = $babanta->setSecure($_REQUEST['ss']);
$array_status = array(
3 => 'Aprobada',
4 => 'Rechazada',
5 => 'Necesita modificaciones'
);
$rev_status = $array_status[$confirm];
$array_info = array(
'usuario_id' => $userid,
'estado_tipo' => $confirm,
'estado_texto' => $rev_status,
'comentarios' => $ss_info,
'user_name' => $wuser->info['buser_name'],
'buser_date_1' => $wuser->info['buser_date_1'],
'buser_date_2' => $wuser->info['buser_date_2'],
'buser_date_3' => $wuser->info['buser_date_3'],
'buser_codepostal' => $wuser->info['buser_codepostal']
);
$info_json = json_encode($array_info);
if($confirm && $userid && $ss_info){
$userinfo = mysql_fetch_assoc(mysql_query("SELECT buser_id, buser_mail, buser_nick FROM babanta_usuarios WHERE buser_id=".$userid));
//// GUARDAR REVICIÓN ////
mysql_query("INSERT INTO babanta_reviciones (brv_admin,brv_user,brv_info,brv_hace,brv_date,brv_act)VALUES('".$wuser->uid."', '".$userid."','".$info_json."', '".time()."','".date('d/m/Y H:i:s')."', '".time()."')");
////
if(mysql_query("UPDATE babanta_usuarios SET buser_fact_rev='".mysql_insert_id()."',buser_data_fact='".$confirm."' WHERE buser_id=".$userid)){
//// ENVIAR CORREO ////
$para = $userinfo['buser_mail'];
$titulo = $babanta->settings['net_name'].' | Revisamos tu dirección de facturación';
include TS_ROOT.'/bbnt_resource/class/mail.class.php';
$tsMail = new tsMail;
$para = array(
  1 => array('c' => $para, 'n' => '@'.$buser_nick)
);
$de = 2;
$asunto = $titulo;
$body = array(
'top' => 'Hola, <b>'.$userinfo['buser_nick'].'</b>. Hemos revisado tu dirección de facturación y este es el resultado :)',
'center' => '<b>Estado</b>: <i>'.$rev_status.'</i> <br /> <b>Comentarios</b>: <i>'.$ss_info.'</i>',
'bottom' => '',
'link' => array('link' => 'http://www.babanta.net/?page=config', 'name' => 'Revisar&nbsp;mi&nbsp;configuración'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Hola, '.$userinfo['buser_nick'].'. Hemos revisado tu dirección de facturación y este es el resultado. Estado: '.$rev_status.'\n Comentarios: '.$ss_info;

$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);
/// END CORREO /////
$correosend = ($sentmail) ? '(Correo enviado)' : '(Problemas con la bienvenida)'; 
echo 'Comentarios enviados. '.$correosend;
}else{ echo 'Error! en la base de datos, contacta a un programador.'; }
}else{ echo 'Error! no enviaste nada.'; }
break;
case 'babanta-pass':
$buserid = $_POST['userid'];
$pass = $_POST['data'];
//
if($buserid && $pass){
//
$data_ca = mysql_query("SELECT * FROM babanta_usuarios WHERE buser_id=".$buserid);
$data_fe = mysql_fetch_assoc($data_ca);
//
if(mysql_num_rows($data_ca)){
$newpass = base64_encode($pass.'#&%Q0xWX09LUldFX1dSVFRPS19XUks3OC5TTFdXRS1fLVNLRUZLVyMxNTQlMTAwcG9yY250');
//
if(mysql_query("UPDATE babanta_usuarios SET buser_pass='".$newpass."' WHERE buser_id=".$buserid)){
mysql_query("INSERT INTO babanta_pass_die(bpass_user,bpass_ant,bpass_nw,bpass_admin,bpass_hace) VALUES('".$buserid."','".$data_fe['buser_pass']."','".$newpass."','".$wuser->uid."','".time()."')");
echo 'yeah!';
}else{ echo 'base de datos error, '.mysql_error(); }
//
}else{ echo 'no existe'; }
}else{ echo 'nada'; }
break;
case 'babanta-savewidget':
$p_widget = $babanta->setSecure($_REQUEST['p']);
$info_widget = $babanta->setSecure($_REQUEST['i']);
if($p_widget){
$infowidget = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_id='$info_widget'"));
if(!$infowidget['bad_id']){ die('No existe esta area'); }
if($infowidget['bad_user'] == $wuser->uid){
if(mysql_query("UPDATE babanta_advertiser SET bad_tipos_4='".$p_widget."' WHERE bad_id='$info_widget'")){
	echo 'Informaci&oacute;n guardada!';
}else{ echo 'Database errorno#o8193'; }
}else{ echo 'No te pertenece esa area. ('.$infowidget['bad_user'].'-'.$wuser->uid.')'; }
}else{ echo 'Indefinido. Errorno#1129'; }
break;
case 'babanta-moverango':
$userid = $babanta->setSecure($_REQUEST['userid']);
$rang = $babanta->setSecure($_REQUEST['rang']);
if($userid && $rang){
	$rangos_data = array(1 => 'admin', 2 => 'user', 3 => 'editor', 4 => 'manager'); 
if(!$rangos_data[$rang]){ die('0: El rango no existe'); }
if(mysql_query("UPDATE babanta_usuarios SET buser_rango='".$rang."' WHERE buser_id=".$userid)){
echo 'cambiado';
}
}else{ echo '0: Ingresa algo.'; }
break;
case 'babanta-addcamp':
$action_serv = $babanta->setSecure($_REQUEST['id_edit']);
$array_datas = array(
'tipo' => $babanta->setSecure($_REQUEST['tp']),
'tam' => $babanta->setSecure($_REQUEST['tam']),
'user' => $wuser->uid,
'url' => $babanta->setSecure($_REQUEST['u']),
'image' => $babanta->setSecure($_REQUEST['i']),
'text' => $babanta->setSecure($_REQUEST['t']),
'sbtext' => $babanta->setSecure($_REQUEST['st']),
'btext' => $babanta->setSecure($_REQUEST['bt']),
'plantilla' => $babanta->setSecure($_REQUEST['pl']),
);
$error = '';
foreach($array_datas AS $r => $dat){
if(!$dat){ $error .= '<br />No ingresaste <b>'.$r.'</b>'; }
}
if(!$error){
	$serv_exist = mysql_fetch_row(mysql_query("SELECT bpr_id FROM babanta_promociones WHERE bpr_id=".$action_serv));
if($action_serv){
if($serv_exist[0]){
if(mysql_query("UPDATE babanta_promociones SET 
	bpr_tipo='".$array_datas['tipo']."',
	bpr_tama='".$array_datas['tam']."',
	bpr_url='".$array_datas['url']."',
	bpr_image='".$array_datas['image']."',
	bpr_text='".$array_datas['text']."',
	bpr_subtext='".$array_datas['sbtext']."',
	bpr_button_name='".$array_datas['btext']."',
	bpr_plantilla='".$array_datas['plantilla']."' WHERE bpr_id=".$action_serv)){
echo 'Guardado';
}else{ echo '0: Database error'; }
}else{ echo '0: No existe esta campaña'; }
}else{
if(mysql_query("INSERT INTO babanta_promociones (bpr_obj_type,bpr_tipo,bpr_tama,bpr_user,bpr_conv,bpr_url,bpr_image,bpr_text,bpr_subtext,bpr_button_name,bpr_plantilla) VALUES('1','".$array_datas['tipo']."','".$array_datas['tam']."','".$array_datas['user']."','0','".$array_datas['url']."','".$array_datas['image']."','".$array_datas['text']."','".$array_datas['sbtext']."','".$array_datas['btext']."','".$array_datas['plantilla']."')")){
echo 'Agregada';
}else{ echo '0: Database error'; }
}
}else{ echo '0: '.$error; }
break;
		default:
        echo '0: El archivo no existe.';
		break;
	}