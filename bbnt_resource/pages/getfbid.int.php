<?php
/*
*
*    @name home.php
*    Controlador de la Home
*
*/
 //  $tpl = 0;
//include '../../header.php';

 function post_url($url, $params) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params, null, '&'));
    $ret = curl_exec($ch);
    curl_close($ch);
    return $ret;
  }

  function get_app_access_token($app_id, $secret) {
    $url = 'https://graph.facebook.com/oauth/access_token';
    $token_params = array(
        "type" => "client_cred",
        "client_id" => $app_id,
        "client_secret" => $secret
        );
    return str_replace('access_token=', '', post_url($url, $token_params));
  }

/*
$token_url = "https://graph.facebook.com/oauth/access_token?client_id=866978713315645&client_secret=e2c8ce905bede236698e0193d6ccfc13&grant_type=client_credentials";
$app_token = file_get_contents($token_url);
$app_token = str_replace("access_token=", "", $app_token);
*/
$app_token = get_app_access_token('866978713315645', 'e2c8ce905bede236698e0193d6ccfc13');
$urlgetpost = $_REQUEST['url'];
$gettipe = $_REQUEST['objeto'];
$username = substr($urlgetpost,strrpos($urlgetpost,"/")+1);
$content = file_get_contents('https://graph.facebook.com/'.$username.'?access_token='.$app_token);
$read_json = json_decode($content, true);
$objtipe = ($gettipe) ? $gettipe : 'id';
$fsdf = ($_REQUEST['all']) ? $content : $read_json[$objtipe];
echo $fsdf;

/*
*
*   INCLUDE FINAL
*/
//include(TS_ROOT."/footer.php");
?>