<?php if ( ! defined('TS_HEADER')) exit('No se permite el acceso directo al script'); 
$tsTitle = $tsTitle ? $tsTitle : $babanta->settings['name'];
   /** USO DE SMARTY PARA MOSTAR PAGINAS **/
$smarty->assign("tsPage",$tsPage);
$smarty->assign("tsConfig", $babanta->settings);
$smarty_next = true;
$smarty->assign("wuser", $wuser);
//$wuser->updatew();

if(!$smarty->templateExists("$tsPage.tpl")){ echo TS_TEMA;
$smarty->template_dir = TS_ROOT.DIRECTORY_SEPARATOR.'bbnt_archives'.DIRECTORY_SEPARATOR.'temas'.DIRECTORY_SEPARATOR.TS_TEMA;
if($smarty->templateExists("$tsPage.tpl")) $smarty_next = true;
}else $smarty_next = true;
if($smarty_next == true){ 
if($wuser->ban){
$smarty->display("ban.tpl");
}else{
$smarty->display($tsPage.".tpl");
}
}else{ die("0: Lo sentimos, se produjo un error al cargar la plantilla. Contacte al administrador"); }
?>