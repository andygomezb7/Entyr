<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
*--------------------------------------------------------------------
*  BABANTA script - POWERED BY ANDY GÓMEZ (www.facebook.com/andesau)
*  Licencia para <Social Network>
*--------------------------------------------------------------------
*/
/* MOSTRAMOS EL HEADER */
include 'babanta_header.php';
/* MOSTRAMOS LA PAGINA DE INICIA */
 $dominio = $_SERVER['HTTP_HOST'];
        if (!preg_match("~^(?:f|ht)tps?://~i", $dominio)) {
            $dominio = $dominio;
        }
        $dominio = str_replace("www.", "", $dominio);
if($dominio == 'pub.babanta.net'){
if(!$wuser->uid){ header('location: http://www.babanta.net'); }
include ('bbnt_resource/pages/publisher.php');
}else{
include ('bbnt_resource/pages/old.php');
}
?>