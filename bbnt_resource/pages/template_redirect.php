<?php
$idioma = substr($_SERVER["HTTP_ACCEPT_LANGUAGE"],0,2); 
$espanol = ($idioma == 'es' || $idioma == 'ES') ? true : false;
$ingles = ($idioma == 'en' || $idioma == 'EN') ? true : false;

$url_redirec_official=$link_share;
?>
<html lang="es"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Poppins' rel=stylesheet type='text/css'/>
<link rel="icon" href="<?php echo $babanta->settings['net_url']; ?>/favicon.png">
<title><?php if($ingles){ echo 'Redirecting...'; }else{ echo 'Redireccionando...'; } ?></title>
<link rel="stylesheet" href="<?php echo $babanta->settings['net_url']; ?>/bbnt_archives/css/bootstrap.min.css?time=1476408127"/>
<link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
<!--<script language="javascript" type="text/javascript">
lz="http://ocio.tipslz.com/inter_request.php?m=1GH2SITE66822X4&a=<?php echo $key_descrypt['d2'].'_a_MOBUSI'.$key_descrypt['d4']; ?>&pubid=<?php echo $key_descrypt['d2'].'_a_MOBUSI'.$key_descrypt['d4']; ?>&direct=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+lz+"></scr"+"ipt>");
</script>-->
<style type="text/css">
html{position:relative;min-height:100%}body{margin-bottom:60px;font-family:Poppins!important;}.footer{position:absolute;bottom:0;width:100%;height:60px;background-color:#f5f5f5}.container{width:auto;max-width:680px;padding:0 15px}.container .text-muted{margin:20px 0}
</style>
<meta http-equiv="refresh" content="3;url=<?php echo $url_redirec_official; ?>" />
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1><?php if($ingles){ echo 'Please wait...'; }else{ echo 'Por favor espere...'; } ?></h1>
      </div>
      <p class="lead"><?php if($ingles){ echo 'You are being redirected to your note.'; }else{ echo 'Le estamos redireccionando a su nota.'; } ?>.</p>
      <p><?php if($ingles){ echo 'But redirected <a href="'.$url_redirec_official.'">click here</a>.'; }else{ echo 'Sino le redirecciona haga <a href="'.$url_redirec_official.'">clic aquí</a>.'; } ?></p><br />
<center><div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
    100%
  </div>
</div></center>
<iframe src="about:blank" onload="document.location.replace('<?php echo $url_redirec_official; ?>');" width="100px" border="no" height="100px" style="display:none;">
    </div>
    <footer class="footer">
      <div class="container">
        <p class="text-muted"><?php if($ingles){ echo '&copy; '.date('Y').' - Powered by Babanta'; }else{ echo '&copy; '.date('Y').' - Impulsado por Babanta'; } ?>.</p>
      </div>
    </footer>
</body></html>