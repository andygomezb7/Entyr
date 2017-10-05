<?php
    function getdomain($url){
    $protocolos = array('http://', 'https://', 'ftp://', 'www.');
    $url = explode('/', str_replace($protocolos, '', $url));
    return $url[0];
    }
function result_array($result){ if(!is_resource($result)) return false; while($row = mysql_fetch_assoc($result)) $array[] = $row; return $array; }
function mysqli_array($result){ while($row = $result->fetch_assoc()) $data_each[] = $row; return $data_each; }
function json($data, $type = 'encode'){ require 'JSON.php'; $json = new Services_JSON;
if($type == 'encode') return $json->encode($data); elseif($type == 'decode') return $json->decode($data); }
$db_link = mysql_connect($db['hostname'.$securekey['k']], $db['username'.$securekey['k']], $db['password'.$securekey['k']]);
if($db_link){
if(!mysql_select_db($db['database'.$securekey['k']], $db_link)){ exit('<title>Error</title><body style="clear: both;background: #F6F6F6;padding: 2em 2em 1em;border: 1px solid #E7E7E7;-moz-border-radius: 5px;-webkit-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;"><h2 align="center" style="color:#222; font-size:25px; font-family:Century Gothic;">Error <br /><br />No se ha podido seleccionar la base de datos ' . $db['database'.$mysql['secure_key']] .' </h2></body>'); }
mysql_query("set names 'utf8'", $db_link);
mysql_set_charset("utf8");
mysql_query("set character set utf8", $db_link);
}else{ 
//exit('<title>Error</title><body style="clear: both;background: #F6F6F6;padding: 2em 2em 1em;border: 1px solid #E7E7E7;-moz-border-radius: 5px;-webkit-border-radius: 5px;-o-border-radius: 5px;border-radius: 5px;"><h2 align="center" style="color:#222; font-size:25px; font-family:Century Gothic;">Error <br /><br />No se pudo establecer la conexi&oacute;n a la base de datos </h2></body>'); 
echo '0: ERROR - no se pudo establecer con la base de datos.';
}
unset($db);
?>