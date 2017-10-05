<?php
	header('Access-Control-Allow-Origin: *'); 
	if(isset($_GET['iframe'])){
			$data = "Iframe Detected: ".$_GET["iframe"]."\n";
			$myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/iframe_detect.txt", "a") or die("Unable to open file!");
			$txt = $data;
			fwrite($myfile, $txt);
			fclose($myfile);
    }elseif(isset($_GET['detect'])){
    function url_dominio($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
    }
$arrayreferrers = array(
'm.facebook.com' => 1,
'mobile.facebook.com' => 1,
'web.facebook.com' => 1,
'www.facebook.com' => 1,
'lm.facebook.com' => 1,
'l.facebook.com' => 1,
'lr.facebook.com' => 1,
'lmr.facebook.com' => 1,
false
);
    $dominio = url_dominio(base64_decode($_REQUEST["domain"]));
    $estaen = $arrayreferrers[$dominio];
    if(!$estaen || $_GET["detect"]){
    		$data = "SOSPECHAS: *".$dominio.($estaen == 1 ? '1' : '2')."*".$_GET["detect"]."\n";
			$myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/sospechas_ban.txt", "a") or die("Unable to open file!");
			$txt = $data;
			fwrite($myfile, $txt);
			fclose($myfile);
			echo ($estaen == 1 ? '1' : '2').'-'.$dominio;
		}else{
			echo $dominio;
		}
	}elseif(isset($_GET['proxy'])){
    		$data = "Proxy User: ".$_GET["proxy"]."\n";
			$myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/proxy.txt", "a") or die("Unable to open file!");
			$txt = $data;
			fwrite($myfile, $txt);
			fclose($myfile);
	}else{
			if(!strpos($_GET["name"],"ull") &&  $_GET["name"]!=='undefined;data=1960' &&  $_GET["name"]!=='undefined;data=1473'){
				$data = "Window Name: ".$_GET["name"]."\n";
				$myfile = fopen($_SERVER["DOCUMENT_ROOT"]."/window_name.txt", "a") or die("Unable to open file!");
				$txt = $data;
				fwrite($myfile, $txt);
				fclose($myfile);
			}
	}
			
?>