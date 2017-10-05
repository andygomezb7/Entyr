<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('TS_HEADER', TRUE);
$securekey['k'] = substr(md5('SF3_S3CUR3'.rand(0, 9)) ,0, 6);
include ($_SERVER["DOCUMENT_ROOT"].'/config.w.php');
$mysqli = new mysqli($db['hostname'.$securekey['k']], $db['username'.$securekey['k']], $db['password'.$securekey['k']],$db['database'.$securekey['k']]);
foreach(array_keys($_POST) as $key){
  $_POST[$key] = htmlspecialchars($mysqli->real_escape_string($_POST[$key]), ENT_QUOTES, 'UTF-8');
}
foreach(array_keys($_GET) as $key){
  $_GET[$key] = htmlspecialchars($mysqli->real_escape_string($_GET[$key]), ENT_QUOTES, 'UTF-8');
}
function encryptIt( $q ) { $cryptKey  = 'CLV_OKRWE_WRTTOK_WRK78.SLWWE-_-SKEFKW#154%100porcnt'; $qEncoded  = base64_encode($q.'#&%'.base64_encode($cryptKey)); return( $qEncoded );}
function number_shorten($number, $precision = 1, $divisors = null) {

    // Setup default $divisors if not provided
    if (!isset($divisors)) {
        $divisors = array(
            pow(1000, 0) => '', // 1000^0 == 1
            pow(1000, 1) => 'K', // Thousand
            pow(1000, 2) => 'M', // Million
            pow(1000, 3) => 'B', // Billion
            pow(1000, 4) => 'T', // Trillion
            pow(1000, 5) => 'Qa', // Quadrillion
            pow(1000, 6) => 'Qi', // Quintillion
        );    
    }

    // Loop through each $divisor and find the
    // lowest amount that matches
    foreach ($divisors as $divisor => $shorthand) {
        if ($number < ($divisor * 1000)) {
            // We found a match!
            break;
        }
    }

    // We found our match, or there were no matches.
    // Either way, use the last defined value for $divisor.
    return number_format($number / $divisor, $precision) . $shorthand;
}
$response['error']=false;
$response['error_data']=false;
if($_POST){
	switch ($_GET['type']) {
		case 'username':
			if(isset($_POST['nick']) && isset($_POST['pass'])){
			$query = $mysqli->query("SELECT buser_id FROM babanta_usuarios WHERE (buser_nick='".$_POST['nick']."' OR buser_mail='".$_POST['nick']."') AND (buser_pass='".md5($_POST['pass'])."' OR buser_pass='".encryptIt($_POST['pass'])."') LIMIT 1");
			$data=$query->fetch_assoc();
			if(isset($data['buser_id'])){
				$response['data']['user_id']=base64_encode($data['buser_id']);
			}else{
				$response['error']=true;
				$response['error_data']='Datos Incorrectos';
			}	
			}else{
				$response['error']=true;
				$response['error_data']='Falta Informacion';
			}	
			
			break;
		case 'notas':
			if($_POST['categoria']!=='0'){
				$extra_query_one="AND postix_content='".$_POST['categoria']."'";
			}else{
				$extra_query_one="";
			}
			$pagina=$_POST['pagina']*10;
			if($_POST['categoria']=='premium'){
				$query = $mysqli->query("SELECT * FROM postix_posts WHERE postix_type='1' AND postix_active='0' AND postix_notatype='2' AND (postix_visitas < postix_visitascount OR postix_visitascount = postix_visitas) ORDER by postix_id DESC LIMIT $pagina,10");
			}else{
				$query = $mysqli->query("SELECT * FROM `postix_posts` WHERE postix_portada<>'' $extra_query_one ORDER by postix_id DESC LIMIT $pagina,10");				
			}
			$i=0;
			while ($row = $query->fetch_assoc()) {
				$response['data'][$i]=$row;
				$response['data'][$i]['postix_name']=base64_encode($row['postix_name']);
				$response['data'][$i]['premium']=false;
				$response['data'][$i]['visitas']=number_shorten($row['postix_visitas']);
				if($row['postix_notatype']==2 && $row['postix_visitas']<$row['postix_visitascount']){
					$response['data'][$i]['postix_valor']=$row['postix_valor2'];
					$response['data'][$i]['premium']=true;
				}
				$i++;
			}
			if($i==0){
				$response['error']=true;
				$response['error_data']='No hay notas en esta categoria';
			}
			break;
		case 'categorias':
			$query = $mysqli->query("SELECT * FROM `postix_categoria`");
			$i=0;
			while ($row = $query->fetch_assoc()) {				
				$response['data'][$i]=$row;
				$response['data'][$i]['postix_cat_name']=base64_encode($row['postix_cat_name']);
				$i++;
			}
			break;
		case 'stats':
			if(isset($_POST['nick']) && isset($_POST['pass'])){
			$query = $mysqli->query("SELECT buser_id FROM babanta_usuarios WHERE (buser_nick='".$_POST['nick']."' OR buser_mail='".$_POST['nick']."') AND (buser_pass='".md5($_POST['pass'])."' OR buser_pass='".encryptIt($_POST['pass'])."') LIMIT 1");
			$data=$query->fetch_assoc();
			if(isset($data['buser_id'])){
				$query = $mysqli->query("SELECT * FROM u_cobros WHERE c_type='3' AND c_user_id='".$data['buser_id']."'");
				$response['data']=$query->fetch_assoc();
			}else{
				$response['error']=true;
				$response['error_data']='Fallo la solicitud de estadisticas, vuelve a intentar en instantes';
			}	
			}else{
				$response['error']=true;
				$response['error_data']='Falta Informacion';
			}
			break;
		case 'count':
			$time=time()-86400;
			$query = $mysqli->query("SELECT COUNT(*) FROM postix_posts WHERE postix_type='1' AND postix_active='0' AND postix_notatype='2' AND (postix_visitas < postix_visitascount OR postix_visitascount = postix_visitas)");
			$data=$query->fetch_assoc();
			$response['data']['count']=$data['COUNT(*)'];
			break;
		case 'premium':
			$time=time()-600;
			$query = $mysqli->query("SELECT * FROM postix_posts WHERE postix_type='1' AND postix_active='0' AND postix_notatype='2' AND (postix_visitas < postix_visitascount OR postix_visitascount = postix_visitas) AND postix_update>='$time' LIMIT 1");
			$data=$query->fetch_assoc();
			if(!isset($data['postix_id'])){
				$response['data']=false;
			}else{
				$response['data']=$data;
			}			
			break;
		default:
			$response['error']=true;
			$response['error_data']='Datos Incorrectos';
	}
}else{
	$response['error']=true;
	$response['error_data']='Faltan datos';
}

echo json_encode($response);
?>