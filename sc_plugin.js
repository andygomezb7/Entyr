function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/"
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length)
    }
    return ""
}

function Oktupus() {
    var metas = document.getElementsByTagName('meta');
    for (var i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute("property") == "og:url") {
            return metas[i].getAttribute("content")
        }
    }
    return ""
}

function bbntxx() {
    return ((navigator.userAgent.match(/Android/i)) || (navigator.userAgent.match(/webOS/i)) || (navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)) || (navigator.userAgent.match(/iPad/i)) || (navigator.userAgent.match(/BlackBerry/)))
}

function clicb() {
    setCookie("bbnt_mobi", "1", 1)
}
var $_GET = {},
    args = location.search.substr(1).split(/&/);
for (var i = 0; i < args.length; ++i) {
    var tmp = args[i].split(/=/);
    if (tmp[0] != "") {
        $_GET[decodeURIComponent(tmp[0])] = decodeURIComponent(tmp.slice(1).join("").replace("+", " "))
    }
}
var hash = window.location.hash.substring(1);
var exphash = hash.split('-'),
    utri = ($_GET['u']) ? $_GET['u'] : '153_a_1',
    dohashusert = exphash[1],
    dohashuser = (dohashusert) ? dohashusert : utri;
var image_url = Oktupus();
var tipoget = $_GET['adstt'],
    mkt = ($_GET['mk'] == 'oc') ? '1GH2SITE69128X1' : '1GH2SITE70818X1',
    directmkt = ($_GET['mk'] == 'oc') ? '1GH2SITE66822X3' : '1GH2SITE70818X1',
    rxmkt = ($_GET['mk'] == 'oc') ? 'ocio.babanta.net' : 'sx.babanta.net';

function popbanta() {
    window.open('http://' + rxmkt + '/?m=' + mkt + '&a=' + dohashuser + '&pubid=' + dohashuser, '_blank')
}
if (tipoget == '1' || tipoget == 'dota') {
    var trev = setInterval(function() {
        var existeo = document.getElementById('button_babanta');
        if (!existeo) {
            var linkbabanta = (tipoget == 'dota') ? 'http://bimo.by/e/?cz=3&tz=1&sz=51112&iz=' + dohashuser : 'http://' + rxmkt + '/?m=' + directmkt + '&a=' + dohashuser + '&pubid=' + dohashuser;
            if (bbntxx() && !getCookie('bbnt_mobi')) {
                $(document.body).append('<div class="mask_babanta">&nbsp;</div><div class="button_babanta" id="button_babanta"><div class="red_babanta"><div class="redonda_babanta" style="display:none!important;">&#8250;</div><div class="rx_babanta"><center><div><h1 class="h1_babanta">¿Tienes mas de 18 años?</h1><div><div class="pt_babanta"><a href="' + linkbabanta + '" onclick="window.open(\'https://www.facebook.com/sharer/sharer.php?u=' + location.href + '\', 400, 400);" class="bbnt fbbb">Compartir en Facebook</a><a href="' + linkbabanta + '" onclick="window.open(\'https://twitter.com/share?text=' + document.title + ' Via @BabantaNetwork&url=' + location.href + '\', 400, 400);" class="bbnt twbb">Compartir en Twitter</a></div><a href="' + linkbabanta + '" class="read_babanta" style="background: #2196F3;" onclick="clicb()">S&iacute;</a><a href="' + linkbabanta + '" class="read_babanta" onclick="clicb()">No</a><div style="font-size: 19px;font-weight: bold;margin: 19px 0 0 0;color: gray;">* Confirma tu edad para continuar</div></div></div></center></div></div></div><style type="text/css">body{overflow:hidden!important;}.mask_babanta{width: 100%;height: 100%;position: fixed;background: #000;display: block;top: 0;z-index:1000000;}.button_babanta{position:fixed;bottom: 0;top: 0;right: 0;left: 0;margin: auto;width: 100%;height: 24%;z-index: 10000000;/*background: rgba(255, 255, 255, 0.67);*/}.red_babanta{width: 80%;margin: auto;height: 100%;}.redonda_babanta{background-image:url(' + image_url + ');background-size: 100% auto;display: block;width: 150px;height: 150px;background: #F44336;border-radius: 60%;top: -77px;position: relative;margin: auto;line-height:126px;font-size:173px;font-weight: bold;color:white;text-align:center;}.rx_babanta{position: relative;top: -59px;padding: 0 18px;text-align: center;}.h1_babanta{margin: 0 0 40px 0;font-family: Roboto;line-height: 43px;text-transform: uppercase;color: white;}.pt_babanta{display: none;clear: both;margin: 0 0 0 0;width: 100%;overflow: hidden;}.bbnt{width: 50%;display: block;float: left;padding: 6px 0;color: white;}.bbnt.fbbb{background: #3b5998;}.bbnt.twbb{background: rgb(51,204,255);}.read_babanta{padding:16px 8px;background: #F44336;color: white!important;border: 0;font-weight: bold;clear: both;margin: 16px 0 0 0;display: block;text-transform: uppercase;font-size: 19px;}</style>')
            }
        }
    }, 100);
    lz = "http://r.babanta.net/inter_request.php?m=1GH2SITE66822X13&a=" + dohashuser + "&img=2&dis_alg=mid&wifi=1&pubid=" + dohashuser + "&offer_id=424215,339345&t=2&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz + "></scr" + "ipt>");
    lz2 = "http://r.babanta.net/inter_request.php?m=1GH2SITE70818X1&a=" + dohashuser + "&img=2&dis_alg=mid&ip=1&pubid=" + dohashuser + "&offer_id=226775=2&t=2&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz2 + "></scr" + "ipt>")
} else if (tipoget == '2') {
    lz = "http://ocio.babanta.net/inter_request.php?m=" + mkt + "&a=" + dohashuser + "&pubid=" + dohashuser + "&img=1&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz + "></scr" + "ipt>")
} else if (tipoget == '3') {
    lz = "http://ocio.babanta.net/inter_request.php?m=" + mkt + "&a=" + dohashuser + "&pubid=" + dohashuser + "&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz + "></scr" + "ipt>")
} else if (tipoget == '4') {
    lz = "http://ocio.babanta.net/inter_request.php?m=1GH2SITE66822X10&a=" + dohashuser + "&pubid=" + dohashuser + "&popup=1&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz + "></scr" + "ipt>")
} else if (tipoget == '5') {
    lz = "http://ocio.babanta.net/inter_request.php?m=1GH2SITE66822X12&a=" + dohashuser + "&pubid=" + dohashuser + "&popunder=1&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz + "></scr" + "ipt>")
} else {
    lz = "http://ocio.babanta.net/inter_request.php?m=1GH2SITE66822X2&a=" + dohashuser + "&pubid=" + dohashuser + "&floa=1&idtm=300x250&t=2&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language='javascript' type='text/javascript' src='" + lz + "'></scr" + "ipt>");
    lz3 = "http://r.babanta.net/inter_request.php?m=1GH2SITE66822X13&a=" + dohashuser + "&img=2&dis_alg=mid&wifi=1&pubid=" + dohashuser + "&offer_id=424215,339345&t=2&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz3 + "></scr" + "ipt>");
    lz2 = "http://r.babanta.net/inter_request.php?m=1GH2SITE70818X1&a=" + dohashuser + "&img=2&dis_alg=mid&ip=1&pubid=" + dohashuser + "&offer_id=226775=2&t=2&lgid=" + ((new Date()).getTime() % 2147483648) + Math.random();
    document.write("<scr" + "ipt language=javascript type=text/javascript src=" + lz2 + "></scr" + "ipt>");
    var str_k = 0;
    document.onclick = function(e) {
        str_k = str_k + 1;
        if (str_k % 6 == 0 || str_k == 1) {
            popbanta()
        }
    }
}

