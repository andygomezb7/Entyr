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
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
}
setlocale(LC_ALL,"es_ES");
setlocale(LC_ALL,"es_ES");
define('TS_ROOT', realpath(dirname(__FILE__)));
define('TS_HEADER', TRUE);
include '../../mysqli_start.php';
include '../../config.w.php';
include '../functions.php';
//
//
function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}
$ip_user = getUserIP();
$admin_id = $_SESSION['admin_postid'];
if($admin_id){ $login = true; }
$unlogin = intval($_GET['logout']);
if(intval($_POST['loggin']) == 1 || intval($_POST['loggin']) == '1'){
$user = intval($_POST['user']);
$pass = intval($_POST['pass']);
//
if($user == 2884343 && $pass == 'cpmbabanta'){ $_SESSION['admin_postid'] = 'ADMIN_BABANTA_WEB'; header('location: http://'.$_SERVER['HTTP_HOST'].'/admin-babanta/index.php?logina_dmin=true'); }else{ header('location: http://'.$_SERVER['HTTP_HOST'].'/?fail=login'); }
}
if($login){
$new_post = intval($_POST['new_post']);

if($new_post == 1 || $new_post == '1'){
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
if(!$content){ $error .= 'Hace falta: '.$name; }
}
if($error){
$error = $error;
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
bbgs_videourl) VALUES(
'".$data_array['titulo']."',
'".$ip_user."',
'".$data_array['contenido']."',
'".$data_array['portada']."',
'".$data_array['videoimg']."',
'".$data_array['seourl']."',
'".$data_array['seodesc']."',
'".$data_array['cpacat']."',
'".$data_array['adstype']."',
'".$data_array['vurl']."')")){
$success = 'Publicada Correctamente';
}else{
$success = 'Ocurrio un error en la base de datos. '.mysql_error();
}
}
}

//


if($unlogin == 1592495 || $unlogin == '1592495'){
unset($_SESSION['admin_postid']);
$_SESSION['admin_postid'] = false;
header('location: http://'.$_SERVER['HTTP_HOST'].'/admin-babanta/index.php?unlogeda_dmin=true');
}elseif($unlogin && $unlogin != 1592495){ header('location: http://'.$_SERVER['HTTP_HOST'].'/admin-babanta/index.php?unlogeda_dmin=false'); }
?>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
<script src="http://www.babanta.net/bbnt_archives/js/jquery.min.js"></script>
    <title>Admin Babanta web</title>

    <!-- Bootstrap core CSS -->
    <link href="http://www.babanta.net/bbnt_archives/css/bootstrap.min.css?time=1475887032" rel="stylesheet">
    <script src="http://www.babanta.net/bbnt_archives/js/bootstrap.js?time=1475887032" type="text/javascript"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<link href="http://web.babanta.net/recurses/editor.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.Editor-container{background:white!important;}
.form-signin{max-width:680px!important;}
</style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#cont').Editor();
});
function submitpost(){
$('textarea#cont').val($('#cont').Editor("getText"));
$('.formpostcont').submit();
}
</script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<script src="http://web.babanta.net/recurses/editor.js"></script>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
<center>
<a class="btn btn-danger" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/admin-babanta/index.php?logout=1592495">Cerrar sesi&oacute;n</a>
</center>
<hr/>
      <form class="form-signin formpostcont" method="POST" action="">
<?php if($error){ ?>
<div class="alert alert-danger"><?php echo $error; ?></div>
<?php }elseif($success){ ?>
<div class="alert alert-info"><?php echo $success; ?></div>
<?php } ?>
        <h2 class="form-signin-heading">Crea una nota</h2>
        <label for="tit" class="sr-only">Titulo</label>
        <input type="text" id="tit" class="form-control" name="titulo" placeholder="Titulo" required=""><br />
        <label for="cont" class="sr-only">Contenido (descripci&oacute;n)</label>
        <textarea id="cont" class="form-control" name="contentido" placeholder="Descripci&oacute;n" width="100%" style="min-height:340px;" required="" ></textarea><br />
        <label for="desc" class="sr-only">Descripci&oacute;n breve (para mostrar en facebook)</label>
        <input type="text" id="desc" class="form-control" name="desc" placeholder="Descripcion breve" required=""><br />
        <label for="port" class="sr-only">Portada (Url)</label>
        <input type="text" id="port" class="form-control" name="portada" placeholder="Portada url" required=""><br />
        <label for="seo" class="sr-only">SEO titulo (Sin espacios)</label>
        <input type="text" id="seo" class="form-control" name="seo" placeholder="hola-esto-es-un-post" required=""><br />
        <label for="video" class="sr-only">Imagen del video fake (Url)</label>
        <input type="text" id="video" class="form-control" name="videoimg" placeholder="Url de la imagen del video" required=""><br />
        <label for="videou" class="sr-only">URL del pack/video (Url)</label>
        <input type="text" id="videou" class="form-control" name="videourl" placeholder="Url del pack/video" required=""><br />

        <label for="catcpa" class="sr-only">Categoria</label>
        <select id="catcpa" class="form-control" name="catcpa" required="">
        <option>Categoria</option>
        <option value="1">Descarga</option>
        <option value="2">Ocio</option>
        <option value="3">Caliente (HOT)</option>
        </select><br />
        <label for="adstipe" class="sr-only">Tipo de publicidad</label>
        <select id="adstipe" class="form-control" name="adstipe" required="">
        <option>Tipo de publicidad</option>
        <option value="1">CPA</option>
        <option value="2">Nota de CPM Babanta</option>
        <option value="3">Pack</option>
        </select><br />
        
        <input type="hidden" id="inputEmail" class="form-control" name="new_post" value="1">
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="submitpost()">Guardar</button>
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body></html>
<?php }else{ ?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="http://www.babanta.net/bbnt_archives/css/bootstrap.min.css?time=1475887032" rel="stylesheet">
    <script src="http://www.babanta.net/bbnt_archives/js/bootstrap.js?time=1475887032" type="text/javascript"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style type="text/css">
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
</style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <form class="form-signin" method="POST" action="">
        <h2 class="form-signin-heading">Ingresa</h2>
        <label for="inputEmail" class="sr-only">Usuario</label>
        <input type="text" id="inputEmail" class="form-control" name="user" placeholder="User" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Contra</label>
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required="">
<input type="hidden" id="inputEmail" class="form-control" name="loggin" value="1">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body></html>
<?php } ?>