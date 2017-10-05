<?php /* Smarty version Smarty-3.1.19, created on 2016-11-08 22:51:24
         compiled from "./bbnt_archives/temas/default/modulos/babanta_i/unlogged.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2552399075822ab4cef5ae8-20795117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'adba4cde669f86d76008d6e89a817b11d0ab876d' => 
    array (
      0 => './bbnt_archives/temas/default/modulos/babanta_i/unlogged.tpl',
      1 => 1478300717,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2552399075822ab4cef5ae8-20795117',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tsConfig' => 0,
    'wuser' => 0,
    'numaccess' => 0,
    'tsPage' => 0,
    'actionlogin' => 0,
    'unique_id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5822ab4d076e56_36695899',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822ab4d076e56_36695899')) {function content_5822ab4d076e56_36695899($_smarty_tpl) {?><!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8"/><meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
/favicon.png?time=<?php echo time();?>
" type="image/x-icon"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/jquery.min.js?time=<?php echo time();?>
"></script>
<title>CPM Babanta</title>
<link href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
/bbnt_archives/css/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
<meta name="description" content="Inteligencia mas que trabajo, Una frase que nos define, Babanta network somos todos los que trabajamos y no dejamos de innovar y dejar de hacer tendencia"><meta name="keywords" content="babanta, monetización, redes sociales, twitter, facebook, google +, google plus, google mas, generar, ganar dinero">
<meta name="robots" content="all, index, follow, archive">
<meta property="og:title" content="Babanta Network">
<meta property="og:description" content="Inteligencia mas que trabajo, Una frase que nos define, Babanta network somos todos los que trabajamos y no dejamos de innovar y dejar de hacer tendencia">
<meta property="og:image" content="http://i.imgur.com/1wcOPRw.png"/>
<meta property="fb:page_id" content="402076533245521">
<meta property="fb:admins" content="100000141702335">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="Babanta Network">
<meta name="twitter:description" content="Inteligencia mas que trabajo,Una frase que nos define, Babanta network somos todos los que trabajamos y no dejamos de innovar y dejar de hacer tendencia">
<meta name="twitter:site" content="wort_it">
<meta property="twitter:image" content="http://i.imgur.com/1wcOPRw.png"/>
<link href="http://www.babanta.net?time=1478295170" rel="canonical">
<meta name="advertising-site-verification" content="733cb03bf47f84e7c43c59d10ddf2f9a"/>
<meta name="google-site-verification" content="V0D372djvja2MJqF3q4tx_7oXD6OMKgol9UX9nL-ly0"/>
<meta name="google-site-verification" content="IhWRx3W62zY84EB0n9p-FQkO2nflBdYG1wIS5Baz7z4"/>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/StlsGbls.css?time=<?php echo time();?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/bootstrap.min.css?time=<?php echo time();?>
" />
<script src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/bootstrap.js?time=<?php echo time();?>
" type="text/javascript"></script>
<?php if (!$_smarty_tpl->tpl_vars['wuser']->value->uid) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/Annm.js?time=<?php echo time();?>
"></script><?php }?>
<script type="text/javascript">var global_data = { user_key: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->uid;?>
',url:'<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
',name:'<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['name'];?>
',img:'<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['w_avatar'];?>
',userid: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->uid;?>
',user_name: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
', name_user: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
', ap_user: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_ap'];?>
',numaccess: '<?php echo $_smarty_tpl->tpl_vars['numaccess']->value;?>
', page: '<?php echo $_smarty_tpl->tpl_vars['tsPage']->value;?>
',  };
var usrjx = {
	extras: '',
}
function usrjxf(h){
	return false;
}
<?php if ($_smarty_tpl->tpl_vars['actionlogin']->value=='loginahora') {?>
$(document).ready(function(){
$('#selectnetwork').modal('hide');
anonimo.login();
});
<?php }?>
function llevarnet(url){
if(url == 1 || url == '1'){ 
window.location.replace('http://www.babanta.net?ref=cpmlanding&actionlogin=loginahora');
}else if(url == 2 || url == '2'){ $('#selectnetwork').modal('hide');
anonimo.login();
}
}
  $('#loadnetwork').on('click', function () {
    var $btn = $(this).button('loading')
    // business logic...
    $btn.button('reset')
  })

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86658331-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>

<div id="loading" class="dsnone"><div class="content"><div class="bbos"><div class="titl brO">Cargando...</div></div></div></div>
<div id="mask"></div>

<div id="headtotalhe" style="margin:0!important;background:transparent!Important;text-shadow: none!important;color: #333!important;">
<div id="principalcont" style="width: inherit!important;min-height: inherit!important;">
<div id="mydialog"></div><div class="uiCntnToo dsnone" data-role="tooltip"><div class="tololtipo"></div><div class="cnToo"></div></div></div>
</div>

<div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand"><img src="http://www.babanta.net/bbnt_archives/images/logo.png"><b>CPM</b></h3>
              <nav>
                <ul class="nav masthead-nav">
                  <li><a href="#">Network</a></li>
                  <li><a href="http://www.babanta.net/?ref=homelanding">CPA</a></li>
                  <li class="active"><a href="http://cpm.babanta.net/?ref=homelanding">CPM</a></li>
                </ul>
              </nav>
            </div>
          </div>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="
    height: 445px;
">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox" style="height:100%;">
<div class="item inner cover active" data-slide-to="0"><div class="carousel-caption">
<h3>El Mejor CPM del mercado</h3>
<p>Inteligencia mas que trabajo, una frase que nos define, Babanta network somos todos los que trabajamos y no dejamos de innovar y dejar de hacer tendencia.</p>
<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#selectnetwork">Empezar</button>
</div></div>
<div class="item inner cover" data-slide-to="1"><div class="carousel-caption">
<h3>Monetización social</h3><p>Monetiza todas tus redes sociales con nosotros, tu publico te lo agradecera!</p>
<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#selectnetwork">Empezar</button>
</div></div> 
<div class="item inner cover" data-slide-to="2"><div class="carousel-caption">
<h3>Muchas opciones</h3><p>Contamos con contenido para todo tipo de publico, desde contenido caliente hasta consejos para chicas y las ultimas noticias del futbol!</p>
<button type="button" class="btn btn-default btn-md" data-toggle="modal" data-target="#selectnetwork">Empezar</button>
</div></div> 

    </div></div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="background: none;">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style="background: none;">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

          <div class="inner cover" style="display:none;">
            <h1 class="cover-heading" style="font-weight:bold;">Inteligencia mas que trabajo</h1>
            <p class="lead">Una frase que nos define, Babanta network somos todos los que trabajamos y no dejamos de innovar y dejar de hacer tendencia.</p>
            <p class="lead">
              <a href="http://login.babanta.net" class="btn btn-lg btn-default">A trabajar!</a>
            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p><a href="http://cpm.babanta.net">CPM Babanta</a>, by <a href="http://www.babanta.net">Babanta Network.</a></p>
            </div>
          </div>

        </div>

      </div>

    </div>

<!-- Modal -->
<div class="modal fade" id="selectnetwork" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="text-shadow:none!Important;color:#333!important;">Selecciona una empresa</h4>
      </div>
      <div class="modal-body">

<div class="btn-group" data-toggle="buttons">
  <label class="btn btn-default btn-lg">
    <input type="radio" name="optionsnet" value="1" id="option1" autocomplete="off"> CPA Babanta
  </label>
  <label class="btn btn-default active btn-lg">
    <input type="radio" name="optionsnet" value="2" id="option1" autocomplete="off" checked> CPM Babanta
  </label>
</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="llevarnet($('#option1:checked').val())" data-loading-text="Cargando..." id="loadnetwork">Empezar</button>
<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/pg.js?server_<?php echo $_smarty_tpl->tpl_vars['unique_id']->value;?>
=babanta.net-s&time=<?php echo time();?>
&ok=rkol"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/design.css?time=<?php echo time();?>
">
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/design.js?time=<?php echo time();?>
"></script>
<style type="text/css">
a,a:focus,a:hover{color:#fff}
.btn-default,.btn-default:hover,.btn-default:focus{color:#333;text-shadow:none;background-color:#fff;border:1px solid #fff}
html,body{height:100%;background-color:#333}
body{color:#fff;text-align:center;text-shadow:0 1px 3px rgba(0,0,0,.5);background-image: url(http://babanta.net/bbnt_archives/images/fondo.png);background-size: 100% auto;}
.site-wrapper{display:table;width:100%;height:100%;min-height:100%;-webkit-box-shadow:inset 0 0 100px rgba(0,0,0,.5);box-shadow:inset 0 0 100px rgba(0,0,0,.5);background-color: rgba(29, 28, 28, 0.51);}
.site-wrapper-inner{display:table-cell;vertical-align:top}
.cover-container{margin-right:auto;margin-left:auto}
.inner{padding:30px}
.masthead-brand{margin-top:10px;margin-bottom:10px}
.masthead-nav > li{display:inline-block}
.masthead-nav > li + li{margin-left:20px}
.masthead-nav > li > a{padding-right:0;padding-left:0;font-size:16px;font-weight:700;color:#fff;color:rgba(255,255,255,.75);border-bottom:2px solid transparent}
.masthead-nav > li > a:hover,.masthead-nav > li > a:focus{background-color:transparent;border-bottom-color:#a9a9a9;border-bottom-color:rgba(255,255,255,.25)}
.masthead-nav > .active > a,.masthead-nav > .active > a:hover,.masthead-nav > .active > a:focus{color:#fff;border-bottom-color:#fff}
.item.inner{height: 69%;}
@media (max-width: 664px) {
body{background-size: auto 100%!important;}
.item.inner{height: 50%;}
}
@media (min-width: 768px) {
.masthead-brand{float:left}
.masthead-nav{float:right}
}
.cover{padding:0 20px}
.cover .btn-lg{padding:10px 20px;font-weight:700}
.mastfoot{color:#999;color:rgba(255,255,255,.5)}
@media (min-width: 768px) {
.masthead{position:fixed;top:0}
.mastfoot{position:fixed;bottom:0}
.site-wrapper-inner{vertical-align:middle}
.masthead,.mastfoot,.cover-container{width:100%}
}
@media (min-width: 992px) {
.masthead,.mastfoot,.cover-container{width:700px}
}
#mydialog .modal-title{font-size: 20px!important;color: #969595!important;font-weight: 100!important;}
</style>

</body>
</html><?php }} ?>
