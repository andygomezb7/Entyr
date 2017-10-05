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
include '../mysqli_start.php';
include '../config.w.php';
include 'functions.php';
//
//
$get_seo = $_GET['seotext'];
$get_seoid = intval($_GET['seoident']);

$query_1 = mysql_query("SELECT * FROM babanta_blogads WHERE bbgs_seo='".$get_seo."'");
$info_post = mysql_fetch_assoc($query_1);

$mkt_url = ($info_post['bbgs_cpa'] ? $info_post['bbgs_cpa'] : '3');
$seoid_url = ($get_seoid ? $get_seoid : '153');
$array_urlcpa = array('mkt' => $mkt_url, 'domain' => $seoid_url.'web.babanta.net');
$json_urlcpa = json_encode($array_urlcpa);
$key_urlcpa = base64_encode($json_urlcpa);
$urlcpauser = ($get_seoid) ? $get_seoid : '153';
$url_cpa = 'http://entyr.nl/link/web_cpm.php?key='.$key_urlcpa.'&y='.$urlcpauser.'&p=REF1214&ntid='.$info_post['bbgs_network'].'&p_frame='.base64_encode($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);

$videoid = '11ywCKmdcQs';
$cookie_visita_n = 'cpmbbnt_u'.$get_seoid.'n'.$info_post['bbgs_id'];
if(!$_COOKIE[$cookie_visita_n]){
mysql_query("UPDATE u_cobros SET c_imp_reales=c_imp_reales+1 WHERE c_type='3' AND c_user_id=".$get_seoid);
}else{
$cookie_time_24 = 60*60*24;
setcookie($cookie_visita_n, 'U'.$ip.'_NOTA'.$info_post['bbgs_id'], (time() + $cookie_time_24), '/', $_SERVER['HTTP_HOST'], 0, true);
}

$result_referrer = parse_url($_SERVER['HTTP_REFERER']);
$referrer_domain=$result_referrer['host'];
$array_referrers = array(
'www.facebook.com',
'm.facebook.com',
'l.facebook.com',
'lm.facebook.com',
'facebook.com'
);
$isfacebook = in_array($referrer_domain, $array_referrers);
$isadsensebbcompa = ($info_post['bbgs_tipoads'] == 2 || $info_post['bbgs_tipoads'] == '2') ? true : false;
$iscpacompa = ($info_post['bbgs_tipoads'] == 1 || $info_post['bbgs_tipoads'] == '1') ? true : false;
$isliveshow = ($info_post['bbgs_tipoads'] == 3 || $info_post['bbgs_tipoads'] == '3') ? true : false;
//
$isdownload = ($info_post['bbgs_cpa'] == '1' || $info_post['bbgs_cpa'] == 1) ? true : false;
$iscpi = ($info_post['bbgs_cpa'] == '2' || $info_post['bbgs_cpa'] == 2) ? true : false;
$ishot = ($info_post['bbgs_cpa'] == '3' || $info_post['bbgs_cpa'] == 3) ? true : false;
//
$realurlshrink = file_get_contents('http://ouo.io/api/gHW9nW84?s='.urlencode($info_post['bbgs_videourl']));
//
$selectrecomeded = result_array(mysql_query("SELECT * FROM babanta_blogads WHERE bbgs_cpa='".$info_post['bbgs_cpa']."' AND bbgs_tipoads='".$info_post['bbgs_tipoads']."' ORDER BY rand() DESC LIMIT 7"));
?>
<html lang="en"><head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'/>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css?id=wortit" />
<link rel="shortcut icon" href="http://www.babanta.net/favicon.png?time=1476217858" type="image/x-icon"/>
    <meta name="description" content="<?php echo $info_post['bbgs_seodesc']; ?>">
<meta content='https://www.facebook.com/babanta.network/' property='article:publisher'/>
<meta content='https://www.facebook.com/babanta.network/' property='article:author'/>
<meta name="description" content="<?php echo $info_post['bbgs_seodesc']; ?>">
<meta name="keywords" content="<?php echo $info_post['bbgs_seodesc']; ?>">
<script type="text/javascript" src="http://www.babanta.net/bbnt_archives/js/jquery.min.js?time=1475889851"></script>
<meta name="robots" content="all, index, follow, archive">
<meta property="og:title" content="<?php echo $info_post['bbgs_title']; ?>">
<meta property="og:description" content="<?php echo $info_post['bbgs_seodesc']; ?>">
<meta property="og:image" content="<?php echo $info_post['bbgs_portada']; ?>"/>
<meta property="fb:page_id" content="402076533245521">
<meta property="fb:admins" content="100000141702335">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $info_post['bbgs_title']; ?>">
<meta name="twitter:description" content="B<?php echo $info_post['bbgs_seodesc']; ?>">
<meta name="twitter:site" content="babantanetwork">
<meta property="twitter:image" content="<?php echo $info_post['bbgs_portada']; ?>"/>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-86658331-1', 'auto');
  ga('send', 'pageview');

function setCookie(cname,cvalue,exdays){var d=new Date();d.setTime(d.getTime()+(exdays*24*60*60*1000));var expires="expires="+d.toUTCString();document.cookie=cname+"="+cvalue+"; "+expires+"; path=/"}function bbntxx(){return((navigator.userAgent.match(/Android/i))||(navigator.userAgent.match(/webOS/i))||(navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))||(navigator.userAgent.match(/BlackBerry/)))}function getCookie(cname){var name=cname+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1);if(c.indexOf(name)==0)return c.substring(name.length,c.length)}return""}
$(document).ready(function(){
<?php
$cookiereproductor = ($_COOKIE['site_bb_reproductor_'.$info_post['bbgs_id']]) ? $_COOKIE['site_bb_reproductor_'.$info_post['bbgs_id']] : '0';
if($isliveshow && $cookiereproductor <= 2){
$cookie_value = intval($cookiereproductor)+1;
echo 'setCookie("site_bb_reproductor_'.$info_post['bbgs_id'].'","'.$cookie_value.'",1);';
}
?>
});
</script>
    <title><?php echo $info_post['bbgs_title']; ?> - Web Babanta</title>
    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="http://www.babanta.net/bbnt_archives/css/bootstrap.min.css?time=1475887032"/>
<script src="http://www.babanta.net/bbnt_archives/js/bootstrap.js?time=1475887032" type="text/javascript"></script>
<link rel="stylesheet" href="http://linker.babanta.net/css/general.css?time=1475887032"/>
    <!-- Custom CSS -->
    <style type="text/css">
body {
    padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
font-family:Poppins!important;
}
h1,h2,h3,h4,h5,h6,div,span{
font-family:Poppins!important;
}
footer {
    margin: 50px 0;
}
.pc_banner_1{
display:block;
}
.movil_banner_1{
display:none;
}
@media screen and (max-width: 640px) {
.pc_banner_1{
display:none!important;
}
.movil_banner_1{
display:block!important;
}
.content_post{overflow: hidden;width: 100%;}
}
body{min-width:1000px!important;}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8&appId=866978713315645";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>

<body style="min-width:1000px!important;">
<div id="fb-root"></div>

<!-- Composite Start -->
<div id="M207727ScriptRootC80684">
        <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M207727ScriptRootC80684")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("M207727ScriptRootC80684");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=80684;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/l/i/linker.babanta.net.80684.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- Composite End -->

<style type="text/css">#b361{position:fixed !important;position:absolute;top:3px;top:expression((t=document.documentElement.scrollTop?document.documentElement.scrollTop:document.body.scrollTop)+"px");left:2px;width:98%;height:98%;background-color:#fff;opacity:.95;filter:alpha(opacity=95);display:block;padding:20% 0}#b361 *{text-align:center;margin:0 auto;display:block;filter:none;font:bold 14px Verdana,Arial,sans-serif;text-decoration:none}#b361 ~ *{display:none}</style><div id="b361"><font>Please enable JavaScript!<br />¡Por favor activa el Javascript!</font></div><script type="text/javascript">
window.document.getElementById("b361").parentNode.removeChild(window.document.getElementById("b361"));(function(f,k){function g(a){a&&b361.nextFunction()}var h=f.document,l=["i","u"];g.prototype={rand:function(a){return Math.floor(Math.random()*a)},getElementBy:function(a,b){return a?h.getElementById(a):h.getElementsByTagName(b)},getStyle:function(a){var b=h.defaultView;return b&&b.getComputedStyle?b.getComputedStyle(a,null):a.currentStyle},deferExecution:function(a){setTimeout(a,2E3)},insert:function(a,b){var d=h.createElement("font"),e=h.body,c=e.childNodes.length,m=e.style,f=0,g=0;if("b361"==b){d.setAttribute("id",b);m.margin=m.padding=0;m.height="100%";for(c=this.rand(c);f<c;f++)1==e.childNodes[f].nodeType&&(g=Math.max(g,parseFloat(this.getStyle(e.childNodes[f]).zIndex)||0));g&&(d.style.zIndex=g+1);c++}d.innerHTML=a;e.insertBefore(d,e.childNodes[c-1])},r:function(a){var b=h.body.style;this.getElementBy(a).parentNode.removeChild(this.getElementBy(a));b.height=b.margin=b.padding=""},displayMessage:function(a){a="abisuq".charAt(this.rand(5));var b,d='<input type="button" onclick="b361.r(\'b361\')" value=60 disabled></'+a+">";this.insert("<"+a+'>Please disable your ad blocker and refresh this page!<br />¡Por favor, desactive el bloqueador de anuncios y actualiza la pagina'+d,"b361");d=this.getElementBy("b361").firstChild.lastChild;b=setInterval(function(){d.value--;1>d.value&&(clearInterval(b),d.value="Close",d.disabled="")},1E3)},i:function(){for(var a="ad600,adPlacer,bigadframe,r_adver,speed_ads,subpageAd,travel_ad,ad,ads,adsense".split(","),b=a.length,d="",e=this,c=0,f="abisuq".charAt(e.rand(5));c<b;c++)e.getElementBy(a[c])||(d+="<"+f+' id="'+a[c]+'"></'+f+">");e.insert(d);e.deferExecution(function(){for(c=0;c<b;c++)if(null==e.getElementBy(a[c]).offsetParent||"none"==e.getStyle(e.getElementBy(a[c])).display)return e.displayMessage("#"+a[c]+"("+c+")");e.nextFunction()})},u:function(){var a="/ad160x600.,/ad_banners/ad,/adcode.,/ads_gallery/ad,/ads_medrec_,/adtrack.,/ak/ads/ad,/twgetad3.,_120_600.,_728_90.".split(","),b=this,d=b.getElementBy(0,"img"),e,c;d[0]!==k&&d[0].src!==k&&(e=new Image,e.onload=function(){c=this;c.onload=null;c.onerror=function(){l=null;b.displayMessage(c.src)};c.src=d[0].src+"#"+a.join("")},e.src=d[0].src);b.deferExecution(function(){b.nextFunction()})},nextFunction:function(){var a=l[0];a!==k&&(l.shift(),this[a]())}};f.b361=b361=new g;h.addEventListener?f.addEventListener("load",g,!1):f.attachEvent("onload",g)})(window);
</script>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#2c4b8a!important;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/" style="text-transform:uppercase;color:white!important;"><?php echo $_SERVER['HTTP_HOST']; ?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="http://www.facebook.com/babanta.network/">Facebook</a>
                    </li>
                    <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/">Más contenido</a>
                    </li>
                    <li>
                        <a href="http://bit.ly/socialfap">Contenido SEXy</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
<?php if(!$info_post['bbgs_id']){ ?>
<center><div><h2>ERROR 404</h2><h4>No se ha encontrado lo que estas buscando, es posible que estes siguiendo un enlace roto</h4>
<a class="btn btn-success" href="<?php echo $url_cpa; ?>">Buscar mas contenido</a></div></center>
<?php }else{ ?>
    <!-- Page Content -->
    <div class="container" style="width: 1170px!important;">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8 content_post" style="width: 66.66666667%!important;float:left!important;">
 <h1 style="font-size: 26px;font-weight: bold;"><?php echo $info_post['bbgs_title']; ?></h1>
<p style="font-size: 13px;color: gray;"><span class="fa fa-time"></span> Publicado el <?php echo date('d/m/Y H:i'); ?></p>
<hr />
<center><!-- Composite Start -->
<div id="M207727ScriptRootC80686">
        <div id="M207727PreloadC80686">
        Loading...
    </div>
        <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M207727ScriptRootC80686")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("M207727ScriptRootC80686");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=80686;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/l/i/linker.babanta.net.80686.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- Composite End --></center><hr />

<?php
// ($isliveshow && $cookiereproductor <= 2)
$mostrar_reproductor = false; // (($iscpacompa || $isadsensebbcompa) || ($isliveshow && $isdownload)) ? true : false
if($mostrar_reproductor){ // $isadsensebbcompa || $iscpacompa
?>
<div class="ctrl_u"><a style="display:block;overflow:hidden;" href="<?php echo $url_cpa; ?>">
<?php if($isadsensebbcompa){ ?>
<center><div class="publicidad"><div>
BBANN
</div></div></center>
<?php } ?>
<div class="shadow_top"></div>
<div class="tr_yt"><?php echo $info_post['bbgs_title']; ?></div>
<div class="button_yt"></div>
<img class="img-responsive"  src="<?php echo ($isliveshow && !$isdownload) ? '' : $info_post['bbgs_videoimg']; ?>" alt="" data-pagespeed-url-hash="3437247194" onload="pagespeed.CriticalImages.checkImageForCriticality(this);" style="background:black;width: 100%;height: 100%;"/>
</a>
</div>
<?php if($isliveshow && $isdownload){
 ?>
<a enlace="<?php echo $url_cpa; ?>" class="btn btn-lg btn-<?php if($iscpi){ echo 'info'; }elseif($isdownload){ echo 'success'; }elseif($ishot){ echo 'danger'; } ?>" onclick="globaldownload($(this))" style="padding: 11px 20px;font-size: 25px;font-family: Poppins;border-radius: 0!important;display: block;width: 89%;margin: 0 auto;border: 0;"><i class="fa fa-download"></i>&nbsp;Descargar</a>

<script type="text/javascript">
function globaldownload(docum){ var enlace = docum.attr('enlace');
$('.downloadprog').show('slow');
var widthok = 0,progresval=$('.downloadprog .progress-bar'),widthinter=setInterval(function(){ widthok++;
if(widthok >= 101){ 
clearInterval(widthinter); document.location.replace(enlace);
window.open('<?php echo $realurlshrink; ?>', "_blank"); alert('Siga los pasos para continuar!');
}else{ progresval.css('width', widthok+'%'); }
}, 100);
}
</script>
<div class="downloadprog" style="display:none;"><hr />
<center><h4>Espera y sigue los pasos....</h4></center>
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
    <span class="sr-only">45% Complete</span>
  </div>
</div></div>
<?php } ?>
<style type="text/css">
<?php if($isadsensebbcompa){ ?>.publicidad{
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0px;
    margin: auto;
    z-index: 100000;
    opacity: 0;
}<?php } ?>
.ctrl_u{
width: 89%;max-height: 376px;position: relative;margin: auto;overflow: hidden;cursor: pointer;
transition:.3;
-webkit-transition:.3;
-moz-transition:.3;
}
.tr_yt{
    height: 40px;
    width: 100%;
    position: absolute;
    top: 13px;
    left: 18px;
    right: 0;
    font-size: 18px;
    font-weight: 600;
    color: white;
}
.button_yt{
    background-image: url(http://web.babanta.net/recurses/unnamed_gris.png);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    height: 45px;
    width: 67px;
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
transition:.3;
-webkit-transition:.3;
-moz-transition:.3;
}
.ctrl_u:hover{cursor:pointer!important;}
.ctrl_u:hover .button_yt{
transition:.3;
-webkit-transition:.3;
-moz-transition:.3;
cursor:pointer!important;background-image: url(http://web.babanta.net/recurses/unnamed.png);}
.shadow_top{-webkit-box-sizing: border-box;
    box-sizing: border-box;
    width: 100%;
    height: 109px;
    display: block;
    overflow: hidden;
    margin-top: -108px;
    padding: 24px;
    top: 107px;
    position: absolute;
    -webkit-box-direction: normal;
    box-direction: normal;
    -webkit-box-orient: horizontal;
    box-orient: horizontal;
    -webkit-flex-direction: row;
    flex-direction: row;
    -webkit-box-align: center;
    box-align: center;
    -webkit-align-items: center;
    align-items: center;
    background-color: rgba(0,0,0,0);
    background-image: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0));
    background-image: linear-gradient(rgba(0,0,0,0.55),rgba(0,0,0,0));
}
</style>
<?php
}else{
?>
<?php 
if($isliveshow && $info_post['bbgs_videourl']){
?>
<!--http://l.entyr.nl/1/<?php echo $get_seoid; ?>/?u=<?php echo base64_encode($info_post['bbgs_videourl']); ?>-->
<div class="embed-responsive embed-responsive-16by9">
<div class="embed_adblock" style="position: absolute;width: 100%;height: 100%;display: block;background: rgba(0, 0, 0, 0.48);z-index: 1000;">

<div class="center-block text-center block_embed" style="position: absolute;top: 0;left: 0;right: 0;bottom: 0;margin: auto;width: 100%;height: 86px;font-size: 26px;text-shadow: 5px 7px 9px #000;color:white!Important;">Pulsa abajo para ver este video

<div class="downloadprog" style="display:none;">
<center style="display: none;"><h4>Espera un momento....</h4></center>
<div class="progress" style="margin: auto;width: 78%;">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
    <b>3%</b> Completo
  </div>
</div></div>
</div>

</div>
<iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/<?php echo $info_post['bbgs_videourl']; ?>"></iframe>
</div>
<center><a href="<?php echo $url_cpa; ?>" target="_blank" class="btn btn-lg btn-<?php if($iscpi){ echo 'info'; }elseif($isdownload){ echo 'success'; }elseif($ishot){ echo 'danger'; } ?>" onclick="globaldownload($(this))" style="width: 100%;padding: 20px 23px;font-size: 29px;font-family: Poppins;border-radius: 0!important;"><i class="fa fa-play"></i>&nbsp;Ver el video</a></center>
<script type="text/javascript">
function globaldownload(docum){ //var enlace = docum.attr('enlace');
$('.downloadprog').show('slow');
var widthok = 0,progresval=$('.downloadprog .progress-bar'),widthinter=setInterval(function(){ widthok++;
if(widthok >= 101){ 
clearInterval(widthinter); $('.embed_adblock').hide(); $('.block_embed').hide(); $('.downloadprog').hide('slow');
//document.location.replace(enlace); window.open('<?php echo 'https://youtube.com/watch?v='.$info_post['bbgs_videourl']; ?>', "_blank"); alert('Esto te puede interesar...');
}else{ $('.downloadprog .progress-bar b').html(widthok+'%'); progresval.css('width', widthok+'%'); }
}, 100);
}
</script>
<!--<div class="downloadprog" style="display:none;"><hr />
<center><h4>Espera un momento....</h4></center>
<div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 2%">
    <b>3%</b> Completo
  </div>
</div></div>-->
<hr>
<?php 
}
?>
<center>
<a style="<?php if($ishot){ ?>display:none!Important;<?php } ?>overflow:hidden;" href="<?php echo $url_cpa; ?>"><img src="<?php echo ($isliveshow) ? $info_post['bbgs_videoimg'] : $info_post['bbgs_portada']; ?>" style="width: 89%;"/></a>
</center>

<?php
}
?>

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $info_post['bbgs_seodesc']; ?></p>
<div style="overflow:hidden;width:100%;margin:12px 0;">
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3450806733277082"
     data-ad-slot="1137520454"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</div>
<?php  $full_content = intval($_GET['full']); ?>
<?php if(!$full_content){  ?><div style="max-height:230px;overflow:hidden;"><?php }  ?>
<div style="font-size:15px;"><?php echo $info_post['bbgs_content']; ?></div>
<?php if(!$full_content){  ?></div>
<a href="<?php echo $url_cpa; ?>" target="_blank" onclick="document.location.replace('http://<?php echo $_SERVER['HTTP_HOST'].'/'.$info_post['bbgs_seo'].'-'.$get_seoid.'/?full=1'; ?>');" class="btn btn-warning button_viewmore">Ver nota completa</a>
<!--<form method="GET" action="" style="display:none!important;"><input type="hidden" name="full" value="1" /><button type="submit" class="btn btn-warning button_viewmore" >Ver nota completa</button></form>-->
<?php } ?>

                <hr>
<center style="overflow:hidden;width:100%;">
<div style="display: inline-block;">
<div class="fb-like" data-href="https://www.facebook.com/babanta.network/?ref=ts&amp;fref=ts" data-layout="box_count" data-action="like" data-size="large" data-show-faces="false" data-share="false"></div>
</div><div style="margin:0 0 0 12px;display: inline-block;">
<div class="fb-share-button" data-href="http://<?php echo $_SERVER['HTTP_HOST']; ?><?php echo $_SERVER["REQUEST_URI"]; ?>" data-layout="box_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>
</div>
</center>
<hr />

<div style="overflow:hidden;width:100%;">
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-3450806733277082"
     data-ad-slot="1137520454"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</div>
<hr />
                <!-- Blog Comments -->

                <!-- Comments Form -->
<center><div>
<!-- Composite Start -->
<div id="M207727ScriptRootC80685">
        <div id="M207727PreloadC80685">
        Loading...
    </div>
        <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M207727ScriptRootC80685")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("M207727ScriptRootC80685");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=80685;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/l/i/linker.babanta.net.80685.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- Composite End -->
</div></center><hr />
<?php if($iscpacompa && $ishot){ ?>
<script type="text/javascript">
function submitcomment(){
$('.comment_form').hide();
$('.thaksfor_youcomment').show();

setInterval(function(){
$('.thanks_comment').submit();
}, 8000);
}
</script>
<div class="thaksfor_youcomment" style="display:none;">
<div class="alert alert-info">Gracias por comentar! tu comentario se revisara y se publicara lo mas antes posible :)</div>
</div>

<div class="well comment_form">
                    <h4>D&eacute;janos tu comentario:</h4>
<form method="GET" class="thanks_comment" action="" style="display:none!Important;">
<input type="hidden" name="aviso" value="Thanks_for_your_comment" />
</form>
                    <form role="form">
                        <div class="form-group">
                            <input type="text" placeholder="Ingresa tu nombre" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" placeholder="Ingresa tu comentario" rows="3"></textarea>
                        </div>
                        <button type="button" onclick="submitcomment()" class="btn btn-primary">Comentar</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" style="width:64px;height:64px;" src="http://web.babanta.net/recurses/avatar1.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Roberto santiago
                            <small><?php echo date( "d-m-Y H:i"); ?></small>
                        </h4>
                        Interesante...
                    </div>
                </div>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" style="width:64px;height:64px;" src="http://web.babanta.net/recurses/avatar2.png" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Cristian lorenzo
                            <small><?php echo date( "d-m-Y H:i", strtotime( "-1 day") ); ?></small>
                        </h4>
                        Me encanto!
                    </div>
                </div>
<?php }else{ ?>
<div class="fb-comments" data-href="http://<?php echo 'web.babanta.net'.str_replace('-'.$get_seoid, '', $_SERVER['REQUEST_URI']); ?>" data-numposts="5" data-width="100%"></div>
<?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4" style="width: 33.33333333%!important;float:left!important;">
                <!-- Blog Categories Well -->
                <div class="row">

<?php
/*
<div>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-3450806733277082"
     data-ad-slot="3250952059"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</div><hr />
*/
?>
<center>
<div style="display:none; position: relative;">
  <iframe style="display:none;"></iframe>
  <script type="text/javascript">
    var data = {
      placementid: '1011582315615167_1011587288948003',
      format: '300x250',
      testmode: false,
      onAdLoaded: function(element) {
        console.log('Audience Network [1011582315615167_1011587288948003] ad loaded');
        element.style.display = 'block';
      },
      onAdError: function(errorCode, errorMessage) {
        console.log('Audience Network [1011582315615167_1011587288948003] error (' + errorCode + ') ' + errorMessage);
      }
    };
    (function(w,l,d,t){var a=t();var b=d.currentScript||(function(){var c=d.getElementsByTagName('script');return c[c.length-1];})();var e=b.parentElement;e.dataset.placementid=data.placementid;var f=function(v){try{return v.document.referrer;}catch(e){}return'';};var g=function(h){var i=h.indexOf('/',h.indexOf('://')+3);if(i===-1){return h;}return h.substring(0,i);};var j=[l.href];var k=false;var m=false;if(w!==w.parent){var n;var o=w;while(o!==n){var h;try{m=m||(o.$sf&&o.$sf.ext);h=o.location.href;}catch(e){k=true;}j.push(h||f(n));n=o;o=o.parent;}}var p=l.ancestorOrigins;if(p){if(p.length>0){data.domain=p[p.length-1];}else{data.domain=g(j[j.length-1]);}}data.url=j[j.length-1];data.channel=g(j[0]);data.width=screen.width;data.height=screen.height;data.pixelratio=w.devicePixelRatio;data.placementindex=w.ADNW&&w.ADNW.Ads?w.ADNW.Ads.length:0;data.crossdomain=k;data.safeframe=!!m;var q={};q.iframe=e.firstElementChild;var r='https://www.facebook.com/audiencenetwork/web/?sdk=5.3';for(var s in data){q[s]=data[s];if(typeof(data[s])!=='function'){r+='&'+s+'='+encodeURIComponent(data[s]);}}q.iframe.src=r;q.tagJsInitTime=a;q.rootElement=e;q.events=[];w.addEventListener('message',function(u){if(u.source!==q.iframe.contentWindow){return;}u.data.receivedTimestamp=t();if(this.sdkEventHandler){this.sdkEventHandler(u.data);}else{this.events.push(u.data);}}.bind(q),false);q.tagJsIframeAppendedTime=t();w.ADNW=w.ADNW||{};w.ADNW.Ads=w.ADNW.Ads||[];w.ADNW.Ads.push(q);w.ADNW.init&&w.ADNW.init(q);})(window,location,document,Date.now||function(){return+new Date;});
  </script>
  <script type="text/javascript" src="https://connect.facebook.net/en_US/fbadnw.js" async></script>
</div>
</center><hr />

<div>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300*600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-3450806733277082"
     data-ad-slot="2624697253"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</div><hr />

<div class="row" style="overflow:hidden;width:100%;padding: 0 60px;">
<?php foreach($selectrecomeded AS $datai){ ?>
<div class="media" style="overflow:hidden;"><a style="display: block;text-decoration:none!Important;" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $datai['bbgs_seo']; ?>-<?php echo $get_seoid; ?>/"> <div class="media-left" style="display:none!important;"><img alt="64x64" class="media-object" data-src="<?php echo $datai['bbgs_portada']; ?>" src="<?php echo $datai['bbgs_portada']; ?>" data-holder-rendered="true" style="width: 64px; height: 64px;"> </div> <div class="media-body"> <h4 class="media-heading" style="color:#333!important;"><i class="fa fa-bookmark"></i>&nbsp;<?php echo substr($datai['bbgs_title'],0,70); ?></h4> <?php echo substr($datai['bbgs_seodesc'],0,90); ?>...</div> </a></div>
<?php } ?>
</div><hr />
<div>

<center><!-- Composite Start -->
<div id="M206481ScriptRootC80687">
        <div id="M206481PreloadC80687">
        Loading...
    </div>
        <script>
                (function(){
            var D=new Date(),d=document,b='body',ce='createElement',ac='appendChild',st='style',ds='display',n='none',gi='getElementById';
            var i=d[ce]('iframe');i[st][ds]=n;d[gi]("M206481ScriptRootC80687")[ac](i);try{var iw=i.contentWindow.document;iw.open();iw.writeln("<ht"+"ml><bo"+"dy></bo"+"dy></ht"+"ml>");iw.close();var c=iw[b];}
            catch(e){var iw=d;var c=d[gi]("M206481ScriptRootC80687");}var dv=iw[ce]('div');dv.id="MG_ID";dv[st][ds]=n;dv.innerHTML=80687;c[ac](dv);
            var s=iw[ce]('script');s.async='async';s.defer='defer';s.charset='utf-8';s.src="//jsc.mgid.com/b/a/babanta.com.80687.js?t="+D.getYear()+D.getMonth()+D.getDate()+D.getHours();c[ac](s);})();
    </script>
</div>
<!-- Composite End --></center><hr />

<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 300*600 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-3450806733277082"
     data-ad-slot="2624697253"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</div>
            </div>

        </div>
        <!-- /.row -->
</div>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2016 - Todos los derechos reservados</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->
<?php } ?>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</body></html>