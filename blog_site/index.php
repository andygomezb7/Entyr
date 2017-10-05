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
$searchq = $_GET['q'];
// get content
$max = 4; // MAXIMO A MOSTRAR
$pagina = intval($_GET['pagina']);
if(!$pagina){ $inicio = 0; $pagina = 1; }else{ $inicio = ($pagina - 1) * $max;}
$limit = $inicio.','.$max;
$searchquery = ($searchq) ? " WHERE bbgs_title LIKE '%$searchq%'" : "";
$query_1 = mysql_query("SELECT bbgs_id, bbgs_title, bbgs_seo, bbgs_portada, bbgs_seodesc FROM babanta_blogads".$searchquery." ORDER BY bbgs_id DESC LIMIT ".$limit);
$info_post = result_array($query_1); 
$todo = mysql_num_rows(mysql_query("SELECT bbgs_id,bbgs_title FROM babanta_blogads".$searchquery." ORDER BY bbgs_id DESC"));
$pages = ceil($todo / $max)+1;
if (!isset($pagina))
  $screen = 1;
else
  $position = (int)$pagina;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet' type='text/css'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="shortcut icon" href="http://www.babanta.net/favicon.png?time=1476217858" type="image/x-icon"/>
    <meta name="description" content="Bienvenidos a <?php echo $_SERVER['HTTP_HOST']; ?>, El mejor lugar para conseguir el contenido viral, visita <?php echo $_SERVER['HTTP_HOST']; ?> para más!">
    <meta name="author" content="Web Babanta">

    <title>Inicio - Linker by Babanta</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css?id=wortit"/>
    <!-- Bootstrap Core CSS -->
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<link rel="stylesheet" href="http://www.babanta.net/bbnt_archives/css/bootstrap.min.css?time=1475887032"/>
<script src="http://www.babanta.net/bbnt_archives/js/bootstrap.js?time=1475887032" type="text/javascript"></script>
<link rel="stylesheet" href="http://linker.babanta.net/css/general.css?time=1475887032"/>
    <!-- Custom CSS -->
    <style type="text/css">
body {
    padding-top: 70px; /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
font-family:Poppins!Important;
}

footer {
    margin: 50px 0;
}
</style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background: #286090;border-color: #286090;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>" style="text-transform:uppercase;color:white!important;">Linker by Babanta</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li>
                        <a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/">Inicio</a>
                    </li>
                    <li>
                        <a href="http://facebook.com/babanta.network/?ref=<?php echo $_SERVER['HTTP_HOST']; ?>">Facebook</a>
                    </li>
                    <li>
                        <a href="http://hot.babanta.com/?ref=<?php echo $_SERVER['HTTP_HOST']; ?>">Aun más contenido</a>
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    <?php if($searchq){ ?>Resultados de busqueda
                    <small>Search results</small>
                    <?php }else{ ?>Notas Recientes
                    <small>Recent posts</small>
                    <?php } ?>
                </h1>

<?php 
if($todo > 0){
foreach($info_post AS $row){
?><div class="posts-home"><a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/<?php echo $row['bbgs_seo']; ?>-153/">
<img src="<?php echo $row['bbgs_portada']; ?>" style="width:100%;max-height:300px;" alt="">
<div class="content_post">
<h2 class="color_this"><?php echo $row['bbgs_title']; ?></h2>
<p class="color_this"><span class="fa fa-time"></span> Publicado en <b><?php if($row['bbgs_tipoads'] == 1){ echo 'Normal'; }elseif($row['bbgs_tipoads'] ==2){ echo 'Curiosidades'; }else{ echo 'Caliente'; } ?></b></p>
<div class="bton color_this">Ver más <span class="fa fa-chevron-right"></span></div>
</div>
</a>
</div>
<?php 
}
}else{
echo '<div class="alert alert-warning">No se encontraron resultados</div>';
}
?>

                <!-- Pager -->
                <ul class="pager">
<?php
if ($position >= 1) {
if($pagina >= 2){
  $url = $_SERVER['HTTP_HOST']."?pagina=0";
  echo "<li class='next'><a href=\"http://$url\">Primero</a></li>";
  $url = $_SERVER['HTTP_HOST']."?pagina=" .($position-1);
  echo "<li class='previous'><a href=\"http://$url\">Anterior</a></li>";
}
}
//sirve para expandir el prollecto para poder paginar de la manera (Primero Anterior | 0 | 1 | 2 | 3 | Siguiente Ultimo)
/*for ($i = 0; $i < $pages; $i++) {
  $url = "pag_next.php?screen=" . $i;
  echo " | <a href=\"$url\">$i</a> | ";
}*/

//muestra total de resultados 1 de N
echo '<strong>'.($position+1).' de '.$pages.' </strong>';

//si position es menor a el valor entre los parentesis muestra la parte (Siguiente Ultimo)
if ($position < ($pages-1)) {
  $url = $_SERVER['HTTP_HOST']."?pagina=" . ($position+1);
  echo "<li class='next'><a href=\"http://$url\">Siguiente</a></li>";
  $url = $_SERVER['HTTP_HOST']."?pagina=" . ($pages-1);
  echo "<li class='previous'><a href=\"http://$url\">Ultimo</a>\n";
}
?>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">


              <div class="panel panel-warning">
                    <div class="panel-heading"><h4 class="panel-title">Busca en el blog</h4><div></div></div>
                    <div class="panel-body"><form method="GET" action="http://<?php echo $_SERVER['HTTP_HOST']; ?>/"><div class="input-group">
                        <input type="text" name="q" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <span class="fa fa-search"></span>
                        </button>
                        </span>
                    </div></form>
               </div>
                </div>

                <!-- Blog Categories Well -->
<div class="panel panel-warning">
                    <div class="panel-heading"><h4 class="panel-title">Recomendados</h4><div></div></div>
                    <div class="panel-body">
                    <div class="row">
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
        var iframe_html = "<!DOCTYPE html><head>babantapublisher</head></html>";
          var iframe_obj = document.createElement("iframe");
          iframe_obj.srcdoc = iframe_html;
          iframe_obj.width = 350;
          iframe_obj.height = 250;
          iframe_obj.frameBorder = 0;
          iframe_obj.marginWidth = 0;
          iframe_obj.marginHeight = 0;
          iframe_obj.hSpace = 0;
          iframe_obj.vSpace = 0;
          iframe_obj.scrolling = "no";
          document.getElementById("passback_fb_109").appendChild(iframe_obj);
          document.getElementById("passback_fb_109").style.display = "block";
      }
    };
    (function(w,l,d,t){var a=t();var b=d.currentScript||(function(){var c=d.getElementsByTagName('script');return c[c.length-1];})();var e=b.parentElement;e.dataset.placementid=data.placementid;var f=function(v){try{return v.document.referrer;}catch(e){}return'';};var g=function(h){var i=h.indexOf('/',h.indexOf('://')+3);if(i===-1){return h;}return h.substring(0,i);};var j=[l.href];var k=false;var m=false;if(w!==w.parent){var n;var o=w;while(o!==n){var h;try{m=m||(o.$sf&&o.$sf.ext);h=o.location.href;}catch(e){k=true;}j.push(h||f(n));n=o;o=o.parent;}}var p=l.ancestorOrigins;if(p){if(p.length>0){data.domain=p[p.length-1];}else{data.domain=g(j[j.length-1]);}}data.url=j[j.length-1];data.channel=g(j[0]);data.width=screen.width;data.height=screen.height;data.pixelratio=w.devicePixelRatio;data.placementindex=w.ADNW&&w.ADNW.Ads?w.ADNW.Ads.length:0;data.crossdomain=k;data.safeframe=!!m;var q={};q.iframe=e.firstElementChild;var r='https://www.facebook.com/audiencenetwork/web/?sdk=5.3';for(var s in data){q[s]=data[s];if(typeof(data[s])!=='function'){r+='&'+s+'='+encodeURIComponent(data[s]);}}q.iframe.src=r;q.tagJsInitTime=a;q.rootElement=e;q.events=[];w.addEventListener('message',function(u){if(u.source!==q.iframe.contentWindow){return;}u.data.receivedTimestamp=t();if(this.sdkEventHandler){this.sdkEventHandler(u.data);}else{this.events.push(u.data);}}.bind(q),false);q.tagJsIframeAppendedTime=t();w.ADNW=w.ADNW||{};w.ADNW.Ads=w.ADNW.Ads||[];w.ADNW.Ads.push(q);w.ADNW.init&&w.ADNW.init(q);})(window,location,document,Date.now||function(){return+new Date;});
  </script>
  <script type="text/javascript" src="https://connect.facebook.net/en_US/fbadnw.js" async></script>
</div><div id="passback_fb_109" style="display: none;"></div>

</center>
                    </div>
                    <!-- /.row -->
                </div></div>

                <!-- Side Widget Well -->
<div class="panel panel-warning" >
                    <div class="panel-heading"><h4 class="panel-title">Anunciantes</h4></div>
<div class="panel-body">
                    <p>Quieres tus anuncios aquí? Contactanos: <a href="mailito:ivetaggt@gmail.com">ivetaggt@gmail.com</a>.</p>
                </div></div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Babanta <?php echo date('Y'); ?> - Todos los derechos reservados</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
