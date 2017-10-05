<?php
include 'babanta_header.php';
//include("bbnt_resource/libs/aes/AES.class.php");
//$aes = new AES($z); // $aes->decrypt($aes->encrypt())
$start = microtime(true);

$wid = $babanta->setSecure($_REQUEST['id']);
$infowidget = mysql_fetch_assoc(mysql_query("SELECT * FROM babanta_advertiser WHERE bad_type='1' AND bad_id='$wid'"));
$continue = 0;
if(!$infowidget['bad_id']){ header("Content-type: text/javascript"); echo '//NOT'; exit(); }

if($infowidget['bad_tipos'] == 1 || $infowidget['bad_tipos'] == '1'){ 
header("Content-type: text/javascript"); 
echo '// INVALID SERVICE'; die();
}
$header = '/*-----------------------------------*/
/*          BABANTA NETWORK          */
/*            WIDGETS CODE           */
/*-----------------------------------*/
// SERVICE: #'.$wid.'
';
$DATA_CODE = '';
$continue = 1;
$user_data = $infowidget['bad_user'].'_a_'.'WIDRO'.$infowidget['bad_id'];
if($infowidget['bad_tipos_1'] == 1 || $infowidget['bad_tipos_1'] == '1'){
$datatypes = array(
1 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&lbox=1&ip=4&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
2 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&lbox=1&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
3 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&img=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
4 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&ip=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
5 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&ip=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
6 => 'bb_link="http://oc.babanta.net/inter_request.php?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
7 => 'bb_link="http://sx.babanta.net/inter_request.php?m=1GH2SITE70818X1&a='.$user_data.'&pubid='.$user_data.'&img=2&dis_alg=mid&t=2&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+bb_link+"></scr"+"ipt>");',
8 => 'var cookienum_s = getCookie("red_babanta_'.$infowidget['bad_id'].'") ? getCookie("red_babanta_'.$infowidget['bad_id'].'") : 0; if(!cookienum_s || cookienum_s < 3){
setCookie("red_babanta_'.$infowidget['bad_id'].'",cookienum_s+1,1);
window.location="http://play.babanta.net/?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data.'";
}'
);
$DATA_CODE = $datatypes[$infowidget['bad_tipos_2']];
}elseif($infowidget['bad_tipos_1'] == 2 || $infowidget['bad_tipos_1'] == '2'){
$DATA_CODE = 'services_="http://ocio.babanta.net/inter_request.php?m=1GH2SITE66822X10&a='.$user_data.'&pubid='.$user_data.'&popup=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+services_+"></scr"+"ipt>");';
}elseif($infowidget['bad_tipos_1'] == 3 || $infowidget['bad_tipos_1'] == '3'){
$DATA_CODE = 'services_="http://ocio.tipslz.com/inter_request.php?m=1GH2SITE66822X12&a='.$user_data.'&pubid='.$user_data.'&popunder=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+services_+"></scr"+"ipt>");';
}elseif($infowidget['bad_tipos_1'] == 4 || $infowidget['bad_tipos_1'] == '4'){
$DATA_CODE = " var obj = document.getElementsByClassName('adsbybabanta'), tupeokse = Base64.encode(document.domain), tuokpek = Base64.encode(document.URL); 
objectleng = obj.length; 
for(i=0; i<objectleng; i++){
	var tpkwhofst = obj[i].parentNode, 
	tpkrsp = Base64.encode(tpkwhofst.offsetWidth+'x'+tpkwhofst.offsetHeight),
	ssdr_s = obj[i].getAttribute('data-ad-yum'), ssdr_2=Base64.decode(ssdr_s), ssdr_3 = ssdr_2.split('_'), ssdr = ssdr_3[1], 
	ssddwhthegt, dtadb=obj[i].getAttribute('data-ad-deb'), 
	dtaym=obj[i].getAttribute('data-ad-yum'); 
	if(ssdr && dtadb){ if(ssdr == 1){ ssddwhthegt = '300x250'; }else if(ssdr == 2){ ssddwhthegt = '336x280'; }else if(ssdr == 3){ ssddwhthegt = '728x90'; }else if(ssdr == 4){ ssddwhthegt = '300x600'; }else if(ssdr == 5){ ssddwhthegt = '320x100'; }else if(ssdr == 6){ ssddwhthegt = '160x600'; }else{ ssddwhthegt = '300x250'; } 
var gaDhEwhTtrSkk = ssddwhthegt.split('x'), 
aa=parseInt(gaDhEwhTtrSkk[0]), 
ee=parseInt(gaDhEwhTtrSkk[1]); 
var htmlss4 ='<iframe width=\"'+aa+'\" height=\"'+ee+'\" name=\"my-iframe_\" frameborder=\"0\" marginwidth=\"0\" marginheight=\"0\" vspace=\"0\" hspace=\"0\" allowtransparency=\"true\" allowfullscreen=\"true\" scrolling=\"no\" src=\"".$babanta->settings['url']."/frame/services_babanta/contenedor.html?p='+document.domain+'&serv=".$infowidget['bad_tipos_4']."&tm='+ssdr+'&i='+ssdr_3[0]+'#'+Base64.encode(location.href)+'\"></iframe>'; 
obj[i].innerHTML=htmlss4; 
}else{ 
obj[i].innerHTML='<center><h2>NO ADSBYBABANTA</h2><br><h4>Invalid code</h4><br></center>'; 
} 
//
}";
}elseif($infowidget['bad_tipos_1'] == 5 || $infowidget['bad_tipos_1'] == '5'){
$DATA_CODE = 'services_="http://ocio.babanta.net/inter_request.php?m=1GH2SITE66822X19&a='.$user_data.'&pubid='.$user_data.'&lbox=1&ip=4&close=1&lgid="+((new Date()).getTime() %2147483648) + Math.random();
document.write("<scr"+"ipt language=javascript type=text/javascript src="+services_+"></scr"+"ipt>");';
}
$script = "window.onload=function(){ ".$DATA_CODE." }";
$footer = '';

header("Content-type: text/javascript");
echo $header;
?>eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('7 G={j:"T+/=",S:C(5){7 8="";7 t,o,m,v,s,h,f;7 i=0;5=G.J(5);F(i<5.E){t=5.q(i++);o=5.q(i++);m=5.q(i++);v=t>>2;s=((t&3)<<4)|(o>>4);h=((o&H)<<2)|(m>>6);f=m&u;p(M(o)){h=f=z}x p(M(m)){f=z}8=8+k.j.l(v)+k.j.l(s)+k.j.l(h)+k.j.l(f)}B 8},R:C(5){7 8="";7 t,o,m;7 v,s,h,f;7 i=0;5=5.I(/[^A-P-Q-9\\+\\/\\=]/g,"");F(i<5.E){v=k.j.D(5.l(i++));s=k.j.D(5.l(i++));h=k.j.D(5.l(i++));f=k.j.D(5.l(i++));t=(v<<2)|(s>>4);o=((s&H)<<4)|(h>>2);m=((h&3)<<6)|f;8=8+d.b(t);p(h!=z){8=8+d.b(o)}p(f!=z){8=8+d.b(m)}}8=G.O(8);B 8},J:C(e){e=e.I(/\\r\\n/g,"\\n");7 a="";10(7 n=0;n<e.E;n++){7 c=e.q(n);p(c<w){a+=d.b(c)}x p((c>Y)&&(c<U)){a+=d.b((c>>6)|V);a+=d.b((c&u)|w)}x{a+=d.b((c>>N)|L);a+=d.b(((c>>6)&u)|w);a+=d.b((c&u)|w)}}B a},O:C(a){7 e="";7 i=0;7 c=W=y=0;F(i<a.E){c=a.q(i);p(c<w){e+=d.b(c);i++}x p((c>Z)&&(c<L)){y=a.q(i+1);e+=d.b(((c&X)<<6)|(y&u));i+=2}x{y=a.q(i+1);K=a.q(i+2);e+=d.b(((c&H)<<N)|((y&u)<<6)|(K&u));i+=3}}B e}}',62,63,'|||||input||var|output||utftext|fromCharCode||String|string|enc4||enc3||_keyStr|this|charAt|chr3||chr2|if|charCodeAt||enc2|chr1|63|enc1|128|else|c2|64||return|function|indexOf|length|while|Base64|15|replace|_utf8_encode|c3|224|isNaN|12|_utf8_decode|Za|z0|decode|encode|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|2048|192|c1|31|127|191|for'.split('|'),0,{}));
 function setCookie(cname,cvalue,exdays){var d=new Date();d.setTime(d.getTime()+(exdays*24*60*60*1000));var expires="expires="+d.toUTCString();document.cookie=cname+"="+cvalue+"; "+expires+"; path=/"}function bbntxx(){return((navigator.userAgent.match(/Android/i))||(navigator.userAgent.match(/webOS/i))||(navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.match(/iPod/i))||(navigator.userAgent.match(/iPad/i))||(navigator.userAgent.match(/BlackBerry/)))}function clicb(){setCookie("babanta_widg<?=$infowidget['bad_id']?>","1",1)}function getCookie(cname){var name=cname+"=";var ca=document.cookie.split(';');for(var i=0;i<ca.length;i++){var c=ca[i];while(c.charAt(0)==' ')c=c.substring(1);if(c.indexOf(name)==0)return c.substring(name.length,c.length)}return""} <?php
if($infowidget['bad_tipos_1'] == 6 || $infowidget['bad_tipos_1'] == '6'){
	$babanta_url_redirect = 'http://ocio.babanta.net/?m=1GH2SITE66822X3&a='.$user_data.'&pubid='.$user_data;
?>
if(!getCookie('babanta_widg<?=$infowidget['bad_id']?>')){ var babanta_servico = document.createElement("div"); babanta_servico.innerHTML='<div class="mask_babanta">&nbsp;</div><div class="service_babanta" id="service_babanta"><div class="red_babanta"><div class="redonda_babanta">&#8250;</div><div class="rx_babanta"><center><div><h1 class="h1_babanta">Para continuar clic en...</h1><div><a href="<?=$babanta_url_redirect?>" class="read_babanta" onclick="clicb()">Clic aqu&iacute; para continuar</a><a href="<?=$babanta_url_redirect?>" class="read_babanta" style="background: #4CAF50;" onclick="clicb()">Ver otro contenido</a></div></div></center></div><div style="color: white;float: right;font-size: 11px;">Ads by <a href="http://www.babanta.net/" style="font-weight: bold;color: #ddd;">Babanta</a></div></div></div><style type="text/css">body{overflow:hidden!important;}.mask_babanta{width: 100%;height: 100%;position: fixed;background: rgb(0, 0, 0);display: block;top: 0;z-index:100;}.service_babanta{position:fixed;bottom: 0;top: 90px;right: 0;left: 0;margin: auto;width: 100%;height: 60%;z-index: 1000;/*background: rgba(255, 255, 255, 0.67);*/}.service_babanta>.red_babanta{width: 80%;margin: auto;height: 100%;}.service_babanta>.red_babanta>.redonda_babanta{display: block;width: 150px;height: 150px;background-color: #2196F3;border-radius: 60%;top: -77px;position: relative;margin: auto;line-height:126px;font-size:173px;font-weight: bold;color:white;text-align:center;}.service_babanta>.red_babanta>.rx_babanta{position: relative;top: -59px;padding: 0 18px;text-align: center;}.service_babanta>.red_babanta>.rx_babanta>.h1_babanta{margin: 24px 0 39px 0;font-family: Arial,verdana;line-height: 30px;text-transform: uppercase;color: white;font-size: 35px!important;}.service_babanta>.red_babanta>.rx_babanta>.read_babanta{padding:16px 8px;background: #2196F3;color:white!important;text-decoration:none!important;border: 0;font-weight: bold;clear: both;margin: 16px 0 0 0;display: block;text-transform: uppercase;font-size: 19px;}</style>';document.body.appendChild(babanta_servico);} 
}
<?php
}else{ echo $script; }
$end = microtime(true);
echo "//Execution time: " . ($end - $start);
echo $footer;
?>