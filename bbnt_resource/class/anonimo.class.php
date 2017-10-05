<?php  if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo ala web');
/**
 * Modelo para el control de los babanta_usuarios
 *
 * @name    anonimo.class.php
 * @author  Wortit Developers
 */
class tsAnonimo{

		// INSTANCIA DE LA CLASE
	public static function &getInstance(){
		static $instance;

		if( is_null($instance) ){
			$instance = new tsAnonimo();
    	}
		return $instance;
	}


	    	 function login($id, $fbid, $typol, $postix){
		global $babanta,$serverdomain;
			//=> VARIABLES DE SEGURIDAD
			$time = time();
			$cookie_name = 'LS_'.substr(md5($babanta->settings['url']), 0, 6);
			$cookie_time = 60*60*24;
			$_SERVER['REMOTE_ADDR'] = $_SERVER['X_FORWARDED_FOR'] ? $_SERVER['X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
			$key_1 = $id;
			$key_2 = substr(sha1(md5($time).'RFT'), 0, 15);
			$key_3 = $time-5915;
			$key = $key_1.'_'.$key_2.'__'.$key_3;
			if(mysql_query('INSERT INTO w_sessions (s_key, s_user, s_ip, s_date, s_update, s_remember, s_domain, s_network) VALUES (\''.$key_2.'\', \''.$key_1.'\', \''.$_SERVER['REMOTE_ADDR'].'\', \''.$key_3.'\', \''.$time.'\', \''.$rem.'\', \''.$babanta->settings['net_domain'].'\', \''.$babanta->settings['net_id'].'\')')){
				$host = parse_url($babanta->settings['domain']);
				$host = str_replace('www.', '' , strtolower($host['host']));
				//($host == 'localhost') ? '' : '.' . $host
				$this_domain = '.babanta.net';
				if(setcookie($cookie_name,$key, (time() + $cookie_time), '/', $this_domain, 0, true)){
				mysql_query('UPDATE babanta_usuarios SET buser_active = \'1\' WHERE 	buser_id = \''.$key_1.'\'');
				mysql_query("UPDATE babanta_usuarios SET buser_refresh='".time()."' WHERE 	buser_id='".$key_1."'");
				return 1;
			    }else{ return 'Problemas con el sistema, perdonanos esta vez :). Intenta otra vez.'; }
			}else return 'Problemas con el sistema, intenta otra vez.';
	        }


		function cerrar($user_id = 0, $all_sessions = false){
		global $babanta, $wuser, $cookievalor,$serverdomain;
		$user_id = empty($user_id) ? $wuser->uid : $user_id;
		if($all_sessions){
			$query = mysql_query('DELETE FROM w_sessions WHERE s_user = \''.$user_id.'\' LIMIT 1');
		}
		$cookie_name = 'LS_'.substr(md5($babanta->settings['url']), 0, 6);
		$cookies = $babanta->setSecure($_COOKIE[$cookie_name]);
		$cookie = empty($cookies) ? $cookievalor : $cookies;
		if($user_id){
		if($cookie){
            $key_3 = str_replace('_', '', strstr($cookie, '__'));
			$part_1 = strstr($cookie, '__', true);
			$key_2 = str_replace('_', '', strstr($part_1, '_'));
			$key_1 = strstr($part_1, '_', true);
			$query = mysql_query('SELECT s_id, s_user, s_key, s_date FROM w_sessions WHERE s_user = \''.$key_1.'\' AND s_key = \''.$key_2.'\' AND s_date = \''.$key_3.'\' LIMIT 1');
			$data = mysql_fetch_assoc($query);
			if($data['s_user']){
				mysql_query('UPDATE babanta_usuarios SET buser_active = \'0\' WHERE 	buser_id = \''.$user_id.'\'');
				mysql_query('DELETE FROM w_sessions WHERE s_user = \''.intval($data['s_user']).'\' AND s_key = \''.$data['s_key'].'\' AND s_date = \''.$data['s_date'].'\'');
			    $last_active = time();
		        mysql_query('UPDATE babanta_usuarios SET buser_refresh=\''.$last_active.'\' WHERE 	buser_id = \''.$user_id.'\'');
				$host = parse_url($babanta->settings['url']);
				$host = str_replace('www.', '' , strtolower($host['host']));
				//($host == 'localhost') ? '' : '.' . $host
				$this_domain = '.babanta.net';
				setcookie($cookie_name, '', (time() - 999*999), '/', $this_domain);
				unset($cookie);
				return 1;
			}else return 1; // $key_1.' - '.$key_2.' - '.$key_3.' _- '.$data['s_user']
		}else return '0: No esta registrada tu sesi&oacute;n.';
	}else return '0: No esta el usuario .('.$user_id.')';
	   }

	   	      	/*
		CERRAR SESSION
		logoutUser($redirectTo)
	*/
	function logoutUser($user_id, $redirectTo = '/'){
		global $babanta, $wuser;
		$_SESSION['uid'] = ''; 
		session_destroy();
		unset($_SESSION['uid']);
		$user_id = ($user_id) ? $user_id : $wuser->uid;
		$je = $this->cerrar($user_id, true);
		if($je == 1){ $c = '1:Esperamos que vuelvas pronto'; }elseif($je == 3){ $c = '0: Esperamos que vuelvas pronto'; }else{ $c = '0: '.$je; }
		return $c;
	}
	
	
		  //LOGGEAMOS AL USUARIO 
	  function loginUser($username, $password, $fbid = false, $postix){
	  global $babanta;
	  if($username && $password){
        $username = $username;
        $infouserbanned = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username')"));
		if(mysql_num_rows(mysql_query("SELECT buser_nick, buser_pass FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username') AND buser_pass='".md5($password)."'"))){
		$pp_password = md5($password);
	    }elseif(mysql_num_rows(mysql_query("SELECT buser_nick, buser_pass FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username') AND buser_pass='".$babanta->encryptIt($password)."'"))){
		$pp_password = $babanta->encryptIt($password);
	    }else{ 
	    $pp_password = $password; 
	    }
		$query = mysql_query("SELECT * FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username') AND buser_pass='".$pp_password."'");
        if(!$query) $query = mysql_query("SELECT * FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username') AND buser_pass='".$pp_password."'");
		$data = mysql_fetch_assoc($query);
        $sdfleuaesk = mysql_num_rows(mysql_query("SELECT buser_nick, buser_mail FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username')"));
        $SD65F4S6513 = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_usuarios WHERE (buser_nick='$username' OR buser_mail='$username')"));
         if($sdfleuaesk >= 1){ 
         if($SD65F4S6513['buser_network'] == $babanta->settings['net_id'] || $SD65F4S6513['buser_rango'] == 1){
	 if($data['buser_pass'] != $pp_password){ return '0: Esta contrase&ntilde;a no va con esta cuenta'; }else{
        //session_start();
        //$_SESSION['uid'] = $data['	buser_id'];
        $s4df5w4e = $this->login($SD65F4S6513['buser_id'], false, false, $postix);
        $_SESSION['uid'] = $SD65F4S6513['buser_id'];			
        if($s4df5w4e == 1){ return '1: Entrando a la web mas genial de la historia...'; }else{ return '0:'.$s4df5w4e; }
		}
                }else{ return '0: No eres usuario de esta Network.'; }
		}else{ return '0: Al parecer este nombre de usuario no existe, prueba con otras palabras'; }
		}else{ return '0: Ingresa tus datos, por Dios!!'; } // end; ingresar datos
	  } // end; login()
	   /*VALIDA EMAIL */
	   function valida_email($correo) {
       if (preg_match_all("^[_.0-9a-z-]+@[0-9a-z._-]+.[a-z]{2,4}$", $correo)) return true; else return false;
      } // end; function

            /****
	  *------------------------------------------------------------------
	  *                         register_fb($id, $username, $fullname, $email);
	  *                 @action Registrar Usuarios
	  *------------------------------------------------------------------
	  ****/

	  function register_fb($id, $usernamee, $fullname, $email, $link, $typo, $gender, $locate, $imgprofile){
	  global $babanta, $tsWall, $tsWeb;
	  $typo = ($typo) ? $typo : 1;
      $fullnamess = explode(' ', $fullname);
      $fullpname = $fullnamess[0];
      $fullapell = $fullnamess[1];
      $referido = 'faceboook';
      $username = ($usernamee) ? $usernamee : $id;
      $s5qa64we = mysql_num_rows(mysql_query("SELECT * FROM babanta_usuarios WHERE user_fb='".$id."'"));
      $user_login_type = ($typo == 1) ? 'user_fb' : ($typo == 2) ? 'user_google' : 'user_fb';
      if($s5qa64we >= 1){ $this->login($s5qa64we['	buser_id'], $id); }else{
      	// mail_antes='".$femail."', nombre_antes='".$fbfullname."', es_pagina='".$fblink."'
      mysql_query("INSERT INTO babanta_usuarios(identi, mail_antes, nombre_antes, es_pagina, buser_nick, name_original, ap_original, buser_mail, ".$user_login_type.", color) VALUES(
      '".time()."',
      '".$email."',
      '".$fullname."',
      '".$link."',
      '".$username."',
      '".$fullpname."',
      '".$fullapell."',
      '".$email."',
      '".$id."',
      '#66757f')");
      $idsfklwe = mysql_insert_id();
      $insertId = $idsfklwe;
      $prefix_in = ($typo == 1) ? 'fb_' : ($typo == 2) ? 'gl_' : ($typo == 3) ? 'gl_' : 'fb_';
      $prefix_on = ($typo == 1) ? 'fb_' : ($typo == 2) ? 'googl_' : ($typo == 3) ? 'googl' : 'fb_';
      mysql_query("INSERT INTO ".$prefix_on."users_members (".$prefix_in."userid,".$prefix_in."name, ".$prefix_in."lname, ".$prefix_in."email, ".$prefix_in."link) VALUES('".$id."','".$usernamee."', '".$fullname."', '".$email."', '".$link."')");
      $userinsertind = mysql_insert_id();
      if($typo == 2 || $typo == 3){ mysql_query("UPDATE ".$prefix_on."users_members SET gl_gender='".$gender."',gl_locate='".$locate."', gl_img='".$imgprofile."'  WHERE ".$prefix_in."id='".$id."' AND ".$prefix_in."userid='".$idsfklwe."'"); }
      if($typo == 3){ mysql_query("UPDATE ".$prefix_on."users_members SET ".$prefix_in."type='2' WHERE ".$prefix_in."id='".$id."' AND ".$prefix_in."userid='".$idsfklwe."'"); }
      // CREAR AVATAR
      /////////////////////AVATAR ALEATORIO/////////////////////
      $gender2 = ($gender == 'male') ? 1 : 2;
      $sexo = ($gender) ? $gender2 : 0;
       if($sexo == 0 or $sexo == '0' || $sexo == 1){ $r = rand(1, 2); $number=rand(1,20); 
       if($r == 1){ $name=$number.'.png'; } if($r == 2){ $name=$number.'.jpg'; } 
       copy(TS_ROOT.'/files/avatar/mont/'.$name.'',TS_ROOT.'/files/avatar/'.$insertId.'_120.png'); 
       }else{ $number=rand(1,24); 
       $name=$number.'.png'; 
       copy(TS_ROOT.'/files/avatar/girl/'.$name.'',TS_ROOT.'/files/avatar/'.$insertId.'_120.png'); 
       }
       $avatarww = $babanta->settings['url'].'/files/avatar/'.$insertId.'_120.png';
       mysql_query('UPDATE babanta_usuarios SET w_avatar=\''.$avatarww.'\' WHERE 	buser_id = \''.$insertId.'\'');
       ////////////////FIN ALEATORIO/////////////
      // DAR BIENVENIDA
      //$tsWall->Darbienvenida_newuser($idsfklwe);
      $tsWeb->getNotifis($wuser->uid, 75, $idsfklwe, $wuser->uid);
      $this->login($idsfklwe, $id,1);
      }
	  }

      /****
	  *------------------------------------------------------------------
	  *                         register();
	  *                 @action Registrar Usuarios
	  *------------------------------------------------------------------
	  ****/
	function register(){
	global $babanta, $wuser, $tsWall, $tsWeb;
    $buser_nick = $babanta->setSecure($_POST['nombre']);
    $buser_pass = $babanta->setSecure($_POST['clave']);
    $buser_mail = $babanta->setSecure($_POST['email']);
    $pais = $babanta->setSecure($_POST['pais']);
    $sexo = $babanta->setSecure($_POST['sexo']);
    $original = $babanta->setSecure($_POST['original']);
    $ap = $babanta->setSecure($_POST['ap']);
    $identi = time();
    $referido = "";
    $diac = $babanta->setSecure($_POST['dia']);
    $mesc = $babanta->setSecure($_POST['mes']);
    $anioc = $babanta->setSecure($_POST['anio']);
    $sjdokf = $babanta->setSecure($_POST['clave']); // CLAVE REAL
    $sjdokfSSE = strlen($sjdokf); $sjdokfSSEK = $sjdokfSSE-4;
    $sjdokfSS = $babanta->wrecorte($sjdokf, $sjdokfSSEK);
    $postixrefer = $babanta->setSecure($_POST['postix']);
    $typeaccount = $babanta->setSecure($_POST['typeaccount']);
    $webblog = $babanta->setSecure($_POST['webblog']);
    $tipeaccount = ($typeaccount == 2 || $typeaccount == '2') ? '3' : '1';
    $stateuserad = ($tipeaccount == '3' || $tipeaccount == 3) ? '3' : '1';

	  $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_"; 
   for ($i=0; $i<strlen($buser_nick); $i++){ 
      if (strpos($permitidos, substr($buser_nick,$i,1))===false){ 
         return $buser_nick . " no es válido"; 
      } 
   } 

   $nonames = array('admin', 'adm', 'administrador', 'moderador', 'ayuda', 'login', 'soporte', 'comunidades', 'support', 'acceso', 'seguro', 'payments', 'pago', 'pagar', 'oficial', 'ssl', 'publi', 'bwort', 'wortitme', 'wortit.me', 'wortit.org', 'wortit.net', 'wortit.com', 'wortit_com', 'wortit_net', 'wortit_org', 'wortit_me', 'wortit.org', 'musica', 'music', 'download', 'descargar', 'bajar');
   $nonames2 = array('recaptcha', 'configurar', 'cuenta', 'settings', 'configuracion', 'configuración', 'configurar', 'arreglar', 'editar','imagenes', 'img', 'images', 'imagen', 'calendario', 'chats', 'chat', 'grupos', 'mail', 'groups', 'foro', 'fotos', 'foto', 'photos', 'galeria', 'galery');
   $tiposdecuentas = array(1, 2, '1', '2');
	require '../ext/recaptchalib.php';
	$secret = "6LcFkA4TAAAAAMLcxLrGMyMiLIdilWyjBp4fx0xK";
	$robot = new ReCaptcha($secret);
	$robot->verifyResponse($_SERVER["REMOTE_ADDR"], $_POST['g-recaptcha-response']);
	if(!$robot->success){
    return '0: Hey que pasa? Demuestra que no eres un robot!'; }else{ // or $original == NULL or $ap == NULL or $diac == NULL or $mesc == NULL or $anioc == NULL or $pais == NULL or $sexo == NULL
    if(!$typeaccount or !in_array($typeaccount, $tiposdecuentas) or ($stateuserad == '3' && !$webblog) or $buser_nick == NULL or $sjdokf == NULL or $_POST['reclave'] == NULL or $buser_mail == NULL){
    return '0: Por favor llene todos los campos.';
    }else{ $rec = mysql_query("SELECT * FROM babanta_usuarios WHERE buser_nick='".$buser_nick."'"); $verificarusuario = mysql_num_rows($rec); if($verificarusuario == 1 or $verificarusuario > 0){ 
	return "0: Este usuario no esta disponible. <a href='mydialog.close();'>Reintentar</a>.";   
    }else{ if(in_array($buser_nick, $nonames)){ 
	return '0: Este nombre de usuario no esta disponible.';
    }else{ if(in_array($buser_nick, $nonames2)){ 
	return '0: El nombre de usuario no esta disponible. 2';
    }else{ if($_POST['clave'] != $_POST['reclave']){ 
	return '0: Las contraseñas no son iguales.';
    }else{ $passwordvalid = $babanta->checkPass($_POST['clave']); 
    if($passwordvalid){
    	return $passwordvalid;
    }else{
    $sin_espacios = count_chars($buser_nick, 1); if(!empty($sin_espacios[32])){ 
	return "0: El campo <em>Nick de usuario</em> no debe contener espacios en blanco. <a href='javascript:history.back();'>Reintentar</a>";
    }else{ $emailnaca = mysql_num_rows(mysql_query("SELECT * FROM babanta_usuarios WHERE buser_mail='".$_POST['email']."'")); $emaill = $emailnaca; if($emaill == 1 or $emaill > 1){ 
	return "0: La Direccion De Email elegida ya ha sido registrado anteriormente. <a href='javascript:history.back();'>Reintentar</a>";
    }else{
$buser_pass = $babanta->encryptIt($buser_pass); $IP = $babanta->getRealIP(); $re = $babanta->setSecure($_POST['r']); if($re){ $r = $re; }else{ $r = ''; }
$partnerpostix = ($postixrefer == 'referer') ? '1' : '0';
$babantaref = $babanta->setSecure($_COOKIE['babanta_ref']);
$babantareforg = ($babantaref) ? $babantaref : '0';
$manager_rand = mysql_fetch_assoc(mysql_query("SELECT buser_id FROM babanta_usuarios WHERE buser_rango=4 ORDER BY rand() LIMIT 1"));
$manager_rand_id = $manager_rand['buser_id'] ? $manager_rand['buser_id'] : '0';
$manager_assign = $manager_rand_id;
$babantareforg = ($babantaref) ? $babantaref : $manager_rand_id;
if(mysql_query("INSERT INTO babanta_usuarios(buser_state_web, buser_state, buser_button,buser_nick, buser_pass, buser_mail, buser_register, buser_network, babanta_ref, buser_ip, buser_m_assign) VALUES('".$webblog."','".$stateuserad."','".$tipeaccount."','".$buser_nick."', '".$buser_pass."', '".$buser_mail."', '".$identi."', '".$babanta->settings['net_id']."', '".$babantareforg."','".$IP."', '".$manager_assign."')")){
$insertId = mysql_insert_id();
mysql_query("INSERT INTO segurityw(s_uid, sp_datos, sp_bworts, sp_bwortsp, sp_temas, sp_notas, sp_publicpp, ss_notifiem) VALUES('".$insertId."', '1', '1', '1', '1', '1', '1', '0')");

$this->login($insertId, false, false, $partnerpostix);
$this->is_member = $insertId;	
return '1: Registrado correctamente <br>'.$creaCOREO; 	     
}else{ return '0: Ocurrio un error, Intenta nuevamente.'; }
} } } } } } } } }
// Fin de la función
}
/*function checkPass($pass) {
$count=strlen($pass);
$entropia=0;
if($count < 6){ return '0: Tu contraseña es muy corta.'; }
$upper = 0; $lower = 0; $numeros = 0; $otros = 0;
for($i = 0, $j = strlen($pass); $i < $j; $i++){
$c = substr($pass,$i,1);
if (preg_match('/^[[:upper:]]$/',$c)) { $upper++; } elseif (preg_match('/^[[:lower:]]$/',$c)) { $lower++;  } elseif (preg_match('/^[[:digit:]]$/',$c)) { $numeros++; } else { $otros++; }
}
$entropia= ($upper*4.7)+ ($lower*4.7)+($numeros*3.32)+($otros*6.55);
if ($entropia<28){
return "0: Tu contraseña es muy debil";     
}elseif($entropia<36) {
return "0: Tu contraseña es debil";            
}elseif($entropia<60) {
return false; // Razonable 
}elseif($entropia<128) {
return false; // Es fuerte 
}else {
return false; // Es muy fuerte 
}  
}*/

// REGISTRAR CUENTA DE CORREO ELECTRONICO
function crearCorreo($username, $pass){
global $babanta;
$domain = $babanta->domainmail;
$quota = 5000;
include('apimail.class.php');
$tsApiMail =& tsApiMail::getInstance();
return $tsApiMail->create($username, $pass, '03d07cd1283e4acc2a0a47f61477c963', $domain, $quota);
}

	/****
	*---------------------------------------------------
	*            Recuperar Contraseña
	*  @action Enviar nuevos datos y actualizarlos
	*---------------------------------------------------
	****/

	function recuperar_contra($email){
	global $babanta, $ip;
    $res=mysql_query("SELECT * FROM babanta_usuarios WHERE buser_mail='".$email."'"); 
    $row=mysql_fetch_assoc($res); 
    if($email){ 
    $sdfasdfwaefw = $email;
    if($row['buser_nick']){
    $better_tokenn = md5(uniqid(mt_rand(), true));
    $better_tokenchi = md5(substr($better_tokenn, 0, 6));
    $passfnwieou = md5(md5(time()));
    $better_token = substr(md5(sha1($passfnwieou).'WortitNet'), 0, 35);
    $loginname = $row['buser_nick'];
    $loginid = $row['	buser_id'];
    $loginmail = $row['buser_mail'];
    //mysql_query("UPDATE babanta_usuarios SET buser_pass='".$better_tokenchi."' WHERE 	buser_id='".$rowd['	buser_id']."' ");
				$time = time();
				$key = $time+$time;
				$key3 = $time-573;
				$code = substr(md5($time.$loginid.$loginmail), 0, 20);
				$pass = substr(md5($time.$loginid.$loginmail), 0, 15);
				$link = $babanta->settings['url'].'/login/recuperar/?type=act&key='.$key.'&code='.$better_token;
				$email_to = $email;
require_once 'mail.class.php';
$tsMail = new tsMail;
$para = array(
  1 => array('c' => $email_to, 'n' => '@'.$loginname)
);
$de = 7;
$asunto = 'Recupera tu contraseña de Wortit';
$body = array(
'top' => 'Este es un correo generado automáticamente para recuperar la contraseña de tu cuenta de Wortit, por favor da clic en el siguiente botón',
'center' => '',
'bottom' => '',
'link' => array('link' => $link, 'name' => 'Recuperar mi contraseña'),
'link2' => array('link' => '', 'name' => ''),
);
$altbody = 'Para recuperar tu contraseña de Wortit porfavor copia y pega en el navegador este enlace: '.$link;
$sentmail = $tsMail->sendMail($para, $de, $asunto, $body, $altbody);

if($sentmail){
mysql_query("INSERT INTO user_emails(ue_user, ue_identi, ue_date, ue_ip, ue_type, ue_email, ue_key) VALUES('".$loginname."', '".$better_token."', '".time()."', '".$ip."', '1', '".$email_to."', '".$key."')");
$help = "1: Tu Nueva contraseña se ha enviado correctamente a tu correo. <br /> Si no ves tu correo en el inicio de tu bandeja de entrada ve a 'Correo no deseado', Puede ser que se alla filtrado.<br /> Si en caso no llega tu correo inmediatamente espera cierto tiempo, sino: Reporta un 'Bug' dando click en el boton de el fin de la pagina.";
}else{ $help = '0: Ocurrio un error al enviar el correo. Intenta nuevamente.'; }
}else{ $help = '0: Los datos no se encontraron en nuestro sistema.'; }
}else{ $help = '0: Inserta los datos porfavor...'; }
return $help;
}

                
	 /**
     * @name Cambiar contraseña
     * @access public
     * @param int
     * @return array
     * @info CAMBIA LA CONTRASEÑA DE UN USUARIO DESEADO
     */

     function userpassemailsdk($user, $passnew, $key, $code){
     	global $babanta;
       $userconfig = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_usuarios WHERE buser_nick='".$user."'"));
       $keyconfig = mysql_fetch_assoc(mysql_query("SELECT * FROM user_emails WHERE ue_key='".$key."'"));
       $codeconfig = mysql_fetch_assoc(mysql_query("SELECT * FROM user_emails WHERE ue_identi='".$code."'"));
       $coincidencias = mysql_fetch_assoc(mysql_query("SELECT * FROM user_emails WHERE buser_nick='".$user."' AND ue_key='".$key."' AND ue_identi='".$code."' "));
      if($userconfig['buser_nick']){
       if($keyconfig['ue_user']){
         if($codeconfig['ue_user']){
         	if($coincidencias['ue_id']){
            $passwordvalid = $babanta->checkPass($_POST['clave']); 
            if($passwordvalid == false){
        $fechamail = $codeconfig['ue_date']; 
		$ahoramail = time();
		$tiempomail = $ahoramail-$fechamail; 
	    $canmail = round($tiempomail / 60); 
          if($canmail <= 30){ return '0: La key ya esta vencida. Vuelve a solicitar una nueva.'; }else{
          	$newpass = $babanta->encryptIt($passnew);
            if(mysql_query("UPDATE babanta_usuarios SET buser_pass='".$newpass."' WHERE buser_nick='".$user."'")) return '1: Contraseña reestablecida correctamente. Ya puedes iniciar sesion.'; else return '0: Ocurrio un error, intenta nuevamente.';
          }
          }else{ return $passwordvalid; }
          }else{ return '0: Los datos no coinciden en nuestro sistema.'; }
         }else{ return '0: La Key no es valida.'; }
       }else{ return '0: La key no es valida.'; }
      }else{ return '0: El usuario no existe.'; }
     }


}
?>