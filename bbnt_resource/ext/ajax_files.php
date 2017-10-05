<?php
/** 
* POWERED BY: Andy Gómez 
**/
   include('../../babanta_header.php');

	$action = htmlspecialchars($_GET['action']);
	$action_type = explode('-',$action);
	$action_type = $action_type[0];
    $file = '../pages/ajax/'.$action_type.'.php';
	if(file_exists($file)) include($file); else die("0: No se encontro el archivo que se ha solicitado.");

    if($files[$action]['p']){
    $smarty->template_ts = false;  
    $smarty->assign("tsTitle",$tsTitle);
    //
    include(TS_ROOT."/footer.php");
    }