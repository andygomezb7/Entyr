<?php
include 'babanta_header.php';
$p = $babanta->setSecure($_GET['p']);
$tm = $babanta->setSecure($_GET['tm']);
$i = $babanta->setSecure($_GET['i']);
$widtam = $babanta->setSecure($_GET['serv']);
session_start();

$infowidget = mysql_fetch_assoc(mysql_query("SELECT bad_id, bad_type,bad_tipos_2,bad_user, bad_tipos_4 FROM babanta_advertiser WHERE bad_type='1' AND bad_id='$i'"));
if($infowidget['bad_id']){
  $array_json = array(
  'service' => $tm,
  'p_data' => $p,
  'n_data' => time(),
  'd_data' => date('d/m/Y h:i:s A')
  );
  $json_data = json_encode($array_json);
  $palabra = 'Descargar';
    $style = 1;
    $type = $infowidget['bad_tipos_2'];
    $isMobileputo = ($mobile) ? 'true' : 'false'; // Avisa al puto si es es movil
    $widget_id= $infowidget['bad_id'];
    $user_id = $infowidget['bad_user'];
    $link = 'http://entyr.nl/link/?p=REF1214&w='.$infowidget['bad_id'].'&p_frame='.$p.'&mobile='.$isMobileputo;
$attr_serv = 'onclick="window.top.location.href=\''.$link.'\';" href="javascript:window.top.location.href=\''.$link.'\';"';
     function get_url($tipe_mkt, $tipo_2){
        global $widget_id,$isMobileputo,$p;
        $tipo_1 = ($tipo_2) ? $tipo_2 : 1;
        $array_2 = array(
            1 => array('domain' => 'play.entyr.nl', 'mkt' => 'down', 'extras' => ''), // Download
            2 => array('domain' => 'play.entyr.nl', 'mkt' => 'cpi', 'extras' => ''), // CPI - JUEGOS DESCARGAS
            3 => array('domain' => 'sx.entyr.nl', 'mkt' => 'sx', 'extras' => ''), // HOT content - Contenido caliente (+18)

        );
        $json_service = json_encode($array_2[$tipe_mkt]);
        $key_service = base64_encode($json_service);
        $url_return = 'http://entyr.nl/link/?p=REF1214&w='.$widget_id.'&sm='.$tipe_mkt.'&p_frame='.$p.'&key='.$key_service.'&mobile='.$isMobileputo;
$GLOBALS['attr_serv'] = 'onclick="window.top.location.href=\''.$url_return.'\';" href="javascript:window.top.location.href=\''.$url_return.'\';"';
            return $url_return;
     }
function wrecorte($texto, $limite=100){ 
$texto = trim($texto); $texto = strip_tags($texto); $tamano = strlen($texto); $resultado = ''; 
if($tamano <= $limite){ return $texto; }else{ $texto = substr($texto, 0, $limite); 
  $palabras = explode(' ', $texto); $resultado = implode(' ', $palabras); $resultado .= '...'; }
  return $resultado; 
}
    function plantillas($tipo, $text, $subtext, $namebutton, $mtk, $url_widget){
        $real_url_service = ($url_widget) ? $url_widget : get_url($mtk, 2);
        $real_url = 'onclick="window.top.location.href=\''.$real_url_service.'\';" href="javascript:window.top.location.href=\''.$real_url_service.'\';"';
      $plantillas = array(
1 => '<center style="margin: auto;position: absolute;top: 0;right: 0;bottom: 0;left: 0;height: 192px;"><h1 style="text-shadow: 0px 2px 9px #000;-webkit-text-shadow: 0px 2px 9px #000;-moz-text-shadow: 0px 2px 9px #000;">'.$text.'</h1><a '.$real_url.' style="clear: both;padding: 11px 11px;overflow: hidden;display: block;margin: 0 15px 10px;background: #FF5722;color: white;cursor: pointer!important;text-decoration:none!important;">'.$namebutton.'</a><small>'.$subtext.'</small></center>',
2 => '<table style="margin: -4px 0 0 0;"><tbody><tr><td style="padding: 0 0 0 18px;"><div><table><tbody><tr><td><div><a style="color:#333;font-size: 37px;font-weight: 400;"><span>'.$text.'</span></a></div></td></tr><tr><td><div style="margin: -6px 0 0 0;"><div><table><tbody><tr><td><div><table><tbody><tr><td class=""><div><span style="font-weight: 100;font-size: 16px;">'.$subtext.'</span></div></td></tr></tbody></table></div></td></tr></tbody></table></div></div></td></tr></tbody></table></div></td><td style="padding: 0;width: 111px;"><div class="xxx"></div></td><td><div><div><a '.$real_url.' class="btn_r" target="_top" title="" style="padding: 14px 18px;display: block;border: 1px solid #ccc;border-radius: 4px;"><div class="icon-container"><svg preserveAspectRatio="xMinYMin meet" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" height="26px" width="16px" viewBox="0 0 26 42" enable-background="new 0 0 26 42" xml:space="preserve"><polyline fill="none" stroke="#545454" stroke-width="5" stroke-miterlimit="10" points="2.875,2.958 21.166,20.957 2.917,38.916"></polyline></svg></div></a></div></div></td></tr></tbody></table><style>.btn_r:hover{background:#d0cece;}</style>',
3 => '<a class="btn" '.$real_url.'>'.$namebutton.'</a><style>.btn{background:#f7a311;background-image:-webkit-linear-gradient(top,#f7a311,#cc8100);background-image:-moz-linear-gradient(top,#f7a311,#cc8100);background-image:-ms-linear-gradient(top,#f7a311,#cc8100);background-image:-o-linear-gradient(top,#f7a311,#cc8100);background-image:linear-gradient(to bottom,#f7a311,#cc8100);-webkit-border-radius:8;-moz-border-radius:8;border-radius:8px;font-family:Arial;color:#fff;font-size:20px;padding:10px 20px;text-decoration:none;width:83%;height:25px;padding:11px 0;margin:auto;position:absolute;top:0;right:0;bottom:0;left:0;text-align: center;-webkit-text-align: center;-moz-text-align: center;}.btn:hover{background:#c78e24;background-image:-webkit-linear-gradient(top,#c78e24,#e69c25);background-image:-moz-linear-gradient(top,#c78e24,#e69c25);background-image:-ms-linear-gradient(top,#c78e24,#e69c25);background-image:-o-linear-gradient(top,#c78e24,#e69c25);background-image:linear-gradient(to bottom,#c78e24,#e69c25);text-decoration:none}</style>',
4 => '<a class="btn_s s_btn" '.$real_url.'>'.$namebutton.'</a>',
5 => '<div style="color: #333;width: 100%;height: 100%;position: relative;"><a style="color: white;text-shadow: 1px 4px 3px #000;" '.$real_url.'  title="'.$namebutton.'" alt="'.$namebutton.'"><div style="width: 76.5%;float: left;margin: 0 0 0 10px;overflow: hidden;word-wrap: break-word;"><h4 style="font-size: 19px;margin: 17px 0 0 0;height: 46px;">'.$namebutton.'</h4></div><div style="width: 20%;float: left;height: 100%;position: relative;"><span style="display: block;width: 20px;height: 20px;margin: auto;top: 0;bottom: 0;left: 0;right: 0;position: absolute;"><svg preserveAspectRatio="xMinYMin meet" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" height="26px" width="16px" viewBox="0 0 26 42" enable-background="new 0 0 26 42" xml:space="preserve"><polyline fill="none" stroke="white" stroke-width="5" stroke-miterlimit="10" points="2.875,2.958 21.166,20.957 2.917,38.916"></polyline></svg></span></div></a></div>',
6 => '<div style="width: 100%;height: 100%;position: relative;z-index: 100000000;"><a style="color: white;text-shadow: 1px 1px 4px #333;" '.$real_url.'><div style="width: 76.5%;height: 100%;float: left;margin: 0 0 0 10px;overflow: hidden;word-wrap: break-word;"><h4 style="font-size: 22px;margin:17px 0 0 0;height: 46px;width: 78%;display: block;margin: auto 10px auto;top: 0;bottom: 0;left: 0;right: 0;position: absolute;">'.wrecorte($namebutton, 65).'</h4></div><div style="width: 20%;float: left;height: 100%;position: relative;"><span style="display: block;width: 39px;height: 37px;margin: auto;top: 0;bottom: 0;left: 0;right: 0;position: absolute;"><svg preserveAspectRatio="xMinYMin meet" version="1.1" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink" x="0px" y="0px" height="70px" width="65px" viewBox="0 0 26 42" enable-background="new 0 0 26 42" xml:space="preserve"><polyline fill="none" stroke="#FFF" stroke-width="5" stroke-miterlimit="10" points="2.875,2.958 21.166,20.957 2.917,38.916"></polyline></svg></span></div></a></div>',
7 => '<div m="'.$mtk.'"></div>',
      );
      return $plantillas[$tipo];
    }
    
    /*
    $notarandom = mysql_fetch_row(mysql_query("SELECT postix_name, postix_url, postix_portada, postix_type, postix_content FROM postix_posts WHERE postix_type=1 AND postix_content!=22 AND postix_active=0 ORDER BY rand()"));
    $notarandomHOT = mysql_fetch_row(mysql_query("SELECT postix_name, postix_url, postix_portada, postix_type, postix_content FROM postix_posts WHERE postix_type=1 AND postix_content=22 AND postix_active=0 ORDER BY rand()"));
    */
$mkts_services = array(
    1 => 1,
    2 => 2,
    3 => 3,
    4 => 2,
);
    /*$banners = array(
        4 => array(
            'html' => plantillas(6, '', '', $notarandom[0], 2, $notarandom[1].'?adstt=1&mk=oc&u='.$user_id.'aWIR'.$widget_id.'&opt=10#bb-'.$user_id.'_a_WIR'.$widget_id),
            'image' => str_replace('http://babanta.com', 'http://www.babanta.com',$notarandom[2]),
            'tamano' => 1,
            'cat' => 2,
            ),
        10 => array(
            'html' => plantillas(5, '', '', $notarandom[0], 2, $notarandom[1].'?adstt=1&mk=oc&u='.$user_id.'aWIR'.$widget_id.'&opt=10#bb-'.$user_id.'_a_WIR'.$widget_id), 
            'image' => str_replace('http://babanta.com', 'http://www.babanta.com',$notarandom[2]),
            'tamano' => 5,
            'cat' => 2,
            ),
    );*/

   $categoria_mtk = $infowidget['bad_tipos_4'];
   $mkts = ($categoria_mtk == 1) ? $mkts_services[4] : $mkts_services[$categoria_mtk];
// $infowidget['bad_tipos_2']
$restr = ($_SESSION['bbnt_anuncios_rec']) ? " AND bpr_id!=".$_SESSION['bbnt_anuncios_rec']."" : "";
$promos_liss = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_promociones WHERE bpr_tama='".$infowidget['bad_tipos_2']."' AND bpr_tipo='".$mkts."'$restr ORDER BY rand() DESC"));
$_SESSION['bbnt_anuncios_rec'] = $promos_liss['bpr_id'];
    //
    $url_ex = ($promos_liss['bpr_url'] && $promos_liss['bpr_url'] != 1 && $promos_liss['bpr_url'] != '1') ? $promos_liss['bpr_url'] : '';
    $script = plantillas($promos_liss['bpr_plantilla'],$promos_liss['bpr_text'],$promos_liss['bpr_subtext'],$promos_liss['bpr_button_name'],$promos_liss['bpr_tipo'],$url_ex);
    $background_image = ($promos_liss['bpr_image'] != 1 || $promos_liss['bpr_image'] != '1') ? $promos_liss['bpr_image'] : '';
$style_extras .= ($promos_liss['bpr_plantilla'] == 7) ? 'background-size:100% 100%;' : '';
    echo '<html lang="es"><head>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="'.$babanta->settings['url'].'/bbnt_archives/css/data_services_styles.css?ref=W'.$infowidget['bad_id'].'&x='.time().'" />
    </head><body><div class="download_services service_'.$style.'" '.($border_data && !$background_image ? 'style="border-color:'.$border_data.';'.$style_extras.'"' : '').' '.($background_image ? 'style="background:url(http://images.babanta.com/?file='.$background_image.');'.$style_extras.'"' : '').' data=\''.$json_data.'\' O="'.$promos_liss['bpr_id'].'*'.$categoria_mtk.'-'.$mkts.'_'.$infowidget['bad_tipos_2'].'" '.$attr_serv.'>
    <div class="service_contendor">
    '.($background_image ? '<div class="oktu"></div>' : '').' '.$script.'
    </div><div class="service_footer" style="z-index:1000000;display:block!important;"><span>Ads by Babanta</span></div>
    </div></body></html>';
}else{
  die('');
}
?>