var mydialog={
is_show:false,class_aux:'',mask_close:true,close_button:false,
show:function(class_aux){
if(this.is_show)return;else this.is_show=true;
if($('#mydialog').html()=='')
	$('#mydialog').html('<div id="dialog" class="modal-dialog"><div id="dglog"><div id="olog"><div id="plog" class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" onclick="mydialog.close();"">&times;</button><div id="title" class="modal-title"></div></div><div id="cuerpo" class="modal-body"><div id="procesando"><div id="error" class="dsnone" style="margin: 0px 0 8px 0;"></div></div><div id="modalBody"></div><div id="buttons" class="modal-footer"></div></div></div></div></div></div>');
if(class_aux==true)$('#mydialog').addClass(this.class_aux);else if(this.class_aux!=''){
	$('#mydialog').removeClass(this.class_aux);this.class_aux='';
}
//if(this.mask_close)$('#mask').click(function(){mydialog.close();});else $('#mask').unbind('click');
if(this.close_button)$('#mydialog #dialog').append('');else $('#mydialog #dialog .close_dialog').remove();
this.mask(1);
//$('#mydialog #dialog #plog').animate({'marginTop':'137px'}, 1000);
$("#mydialog").show();
$('#mydialog #dialog').fadeIn('slow');
$('#mydialog #dialog #plog').animate({'marginTop':'0'});
},
close:function(){
	this.class_aux='';this.mask_close=true;this.close_button=false;this.is_show=false;
	//$('#mydialog #dialog #plog').animate({'marginTop':'-800px'}, 2000);
	this.mask();
	$("#mydialog").hide();
	$('#mydialog #dialog').fadeOut('slow',function(){$(this).remove()});
	this.procesando_fin();
},
mask:function(tt){
	if(!$('#mask').length){ $(document.body).append('<div id="mask"></div>'); }
if(tt == 1){
$('#mask').fadeIn(250);
}else{
$('#mask').fadeOut(250);
}
},
center:function(){
//
},title:function(title,displayall){
	if(displayall&&displayall==false){
		$('#mydialog #title').addClass('dsnone');
}
$('#mydialog #title').html(title);
},
body:function(body,width,height){
	$('#mydialog #dialog').width(width?width:'').height(height?height:'');
	$('#mydialog #modalBody').html(body);
},
buttons:function(display_all,btn1_display,btn1_val,btn1_action,btn1_enabled,btn1_focus,btn2_display,btn2_val,btn2_action,btn2_enabled,btn2_focus){
	if(!display_all){
		$('#mydialog #buttons').css('display','none').html('');return;
	}
	if(btn1_action=='close')
		btn1_action='mydialog.close()';
	if(btn2_action=='close'||!btn2_val)
		btn2_action='mydialog.close()';
	if(!btn2_val){
		btn2_val='Cancelar';
		btn2_enabled=true;
	}
		var html='';
		if(btn1_display)
			html+='<input type="button" class="btn btn-success mBtn btnOk'+(btn1_enabled?'':' disabled')+'" style="display:'+(btn1_display?'inline-block':'none')+'"'+(btn1_display?' value="'+btn1_val+'"':'')+(btn1_display?' onclick="'+btn1_action+'"':'')+(btn1_enabled?'':' disabled')+' />';if(btn2_display)html+=' <input type="button" class="btn btn-danger mBtn btnCancel'+(btn1_enabled?'':' disabled')+'" style="display:'+(btn2_display?'inline-block':'none')+'"'+(btn2_display?' value="'+btn2_val+'"':'')+(btn2_display?' onclick="'+btn2_action+'"':'')+(btn2_enabled?'':' disabled')+' />';
		$('#mydialog #buttons').html(html).css('display','inline-block');
		if(btn1_focus)
			$('#mydialog #buttons .mBtn.btnOk').focus();
		else if(btn2_focus)$('#mydialog #buttons .mBtn.btnCancel').focus();
	},buttons_enabled:function(btn1_enabled,btn2_enabled){if($('#mydialog #buttons .mBtn.btnOk'))if(btn1_enabled)$('#mydialog #buttons .mBtn.btnOk').removeClass('disabled').removeAttr('disabled');else $('#mydialog #buttons .mBtn.btnOk').addClass('disabled').attr('disabled','disabled');if($('#mydialog #buttons .mBtn.btnCancel'))if(btn2_enabled)$('#mydialog #buttons .mBtn.btnCancel').removeClass('disabled').removeAttr('disabled');else $('#mydialog #buttons .mBtn.btnCancel').addClass('disabled').attr('disabled','disabled');},
	alert:function(title,body,reload){
		this.show();this.title(title);this.body(body);this.buttons(true,true,'Aceptar','mydialog.close();'+(reload?'location.reload();':'close'),true,true,false);this.center();
	},loading:function(msj){
		var loading_html='<center><div style="font-size: 19px;text-transform: uppercase;font-weight: bold;font-family: &quot;Raleway&quot;;">'+(msj?msj:'Cargando...')+'</div><br><div style="height: 15px;width: 100%;background: repeating-linear-gradient( 42deg, #ffffff 0, #ffffff 15px, #006687 15px, #006687 27px ) 0 / 200%;animation: loader 5s linear infinite;"></div></center>';
		if(!this.is_show){
			this.show();this.title('&nbsp;');this.body(loading_html);this.center();type_loading=false;
		}else{
			$('#loading').show();
			$('#loading .titl').html(loading_html);
			type_loading=true;
		}
	},end_loading:function(){if(this.type_loading){this.close();}else{$('#loading').hide();$('#loading .titl').html('Cargando...');}},
	error_500:function(fun_reintentar){
		setTimeout(function(){mydialog.procesando_fin();mydialog.show();mydialog.title('Error');mydialog.body(lang['error procesar']);mydialog.buttons(true,true,'Reintentar','mydialog.close();'+fun_reintentar,true,true,true,'Cancelar','close',true,false);mydialog.center();},200);},
		procesando_inicio:function(value,title){if(!this.is_show){this.show();this.title(title);this.body('');this.buttons(false,false);this.center();}$('#mydialog #procesando #mensaje').html('<img src="'+global_data.url+'/images/icons/ajax-loader.gif" />');$('#mydialog #procesando').fadeIn('fast');},
		procesando_fin:function(){$('#mydialog #procesando').fadeOut('fast');} };
function get_html_translation_table(d,e){var a={},f={},b=0,c="";c={};var h={},g={},i={};c[0]="HTML_SPECIALCHARS";c[1]="HTML_ENTITIES";h[0]="ENT_NOQUOTES";h[2]="ENT_COMPAT";h[3]="ENT_QUOTES";g=!isNaN(d)?c[d]:d?d.toUpperCase():"HTML_SPECIALCHARS";i=!isNaN(e)?h[e]:e?e.toUpperCase():"ENT_COMPAT";if(g!=="HTML_SPECIALCHARS"&&g!=="HTML_ENTITIES")throw new Error("Table: "+g+" not supported");a["38"]="&amp;";if(g==="HTML_ENTITIES"){a["160"]="&nbsp;";a["161"]="&iexcl;";a["162"]="&cent;";a["163"]="&pound;";a["164"]="&curren;";a["165"]="&yen;";a["166"]="&brvbar;";a["167"]="&sect;";a["168"]="&uml;";a["169"]="&copy;";a["170"]="&ordf;";a["171"]="&laquo;";a["172"]="&not;";a["173"]="&shy;";a["174"]="&reg;";a["175"]="&macr;";a["176"]="&deg;";a["177"]="&plusmn;";a["178"]="&sup2;";a["179"]="&sup3;";a["180"]="&acute;";a["181"]="&micro;";a["182"]="&para;";a["183"]="&middot;";a["184"]="&cedil;";a["185"]="&sup1;";a["186"]="&ordm;";a["187"]="&raquo;";a["188"]="&frac14;";a["189"]="&frac12;";a["190"]="&frac34;";a["191"]="&iquest;";a["192"]="&Agrave;";a["193"]="&Aacute;";a["194"]="&Acirc;";a["195"]="&Atilde;";a["196"]="&Auml;";a["197"]="&Aring;";a["198"]="&AElig;";a["199"]="&Ccedil;";a["200"]="&Egrave;";a["201"]="&Eacute;";a["202"]="&Ecirc;";a["203"]="&Euml;";a["204"]="&Igrave;";a["205"]="&Iacute;";a["206"]="&Icirc;";a["207"]="&Iuml;";a["208"]="&ETH;";a["209"]="&Ntilde;";a["210"]="&Ograve;";a["211"]="&Oacute;";a["212"]="&Ocirc;";a["213"]="&Otilde;";a["214"]="&Ouml;";a["215"]="&times;";a["216"]="&Oslash;";a["217"]="&Ugrave;";a["218"]="&Uacute;";a["219"]="&Ucirc;";a["220"]="&Uuml;";a["221"]="&Yacute;";a["222"]="&THORN;";a["223"]="&szlig;";a["224"]="&agrave;";a["225"]="&aacute;";a["226"]="&acirc;";a["227"]="&atilde;";a["228"]="&auml;";a["229"]="&aring;";a["230"]="&aelig;";a["231"]="&ccedil;";a["232"]="&egrave;";a["233"]="&eacute;";a["234"]="&ecirc;";a["235"]="&euml;";a["236"]="&igrave;";a["237"]="&iacute;";a["238"]="&icirc;";a["239"]="&iuml;";a["240"]="&eth;";a["241"]="&ntilde;";a["242"]="&ograve;";a["243"]="&oacute;";a["244"]="&ocirc;";a["245"]="&otilde;";a["246"]="&ouml;";a["247"]="&divide;";a["248"]="&oslash;";a["249"]="&ugrave;";a["250"]="&uacute;";a["251"]="&ucirc;";a["252"]="&uuml;";a["253"]="&yacute;";a["254"]="&thorn;";a["255"]="&yuml;"}if(i!=="ENT_NOQUOTES")a["34"]="&quot;";if(i==="ENT_QUOTES")a["39"]="&#39;";a["60"]="&lt;";a["62"]="&gt;";for(b in a){c=String.fromCharCode(b);f[c]=a[b]}return f}function htmlspecialchars_decode(d,e){var a={},f="",b="",c="";b=d.toString();if(false===(a=this.get_html_translation_table("HTML_SPECIALCHARS",e)))return false;for(f in a){c=a[f];b=b.split(c).join(f)}return b=b.split("&#039;").join("'")};function number_format(a,b,e,f){a=a;b=b;var c=function(i,g){g=Math.pow(10,g);return(Math.round(i*g)/g).toString()};a=!isFinite(+a)?0:+a;b=!isFinite(+b)?0:Math.abs(b);f=typeof f==="undefined"?",":f;e=typeof e==="undefined"?".":e;var d=b>0?c(a,b):c(Math.round(a),b);c=c(Math.abs(a),b);var h;if(c>=1E3){c=c.split(/\D/);h=c[0].length%3||3;c[0]=d.slice(0,h+(a<0))+c[0].slice(h).replace(/(\d{3})/g,f+"$1");d=c.join(e)}else d=d.replace(".",e);a=d.indexOf(e);if(b>=1&&a!==-1&&d.length-a-1<b)d+=(new Array(b-(d.length-a-1))).join(0)+"0";else if(b>=1&&a===-1)d+=e+(new Array(b)).join(0)+"0";return d};function empty(a,b){var c;if(a===""||!b&&(a===0||a==="0")||a===null||a===false||typeof a==="undefined")return true;if(typeof a=="object"){for(c in a)return false;return true}return false};function checkdate(a,c,b){return a>0&&a<13&&b>0&&b<32768&&c>0&&c<=(new Date(b,a,0)).getDate()};function strpos(a,c,b){a=(a+"").indexOf(c,b?b:0);return a===-1?false:a};$(function($){$.fn.tooltup=function($html,$typ){$('.uiCntnToo').fadeIn(250);var $otalOoo=$('.uiTolupOo').length;if($otalOoo>=1){$('.uiTolupOo').css({'box-shadow':'inherit','z-index':'inherit'});}var $ksle=$(this);var topskOoo=$.extend({},$(this).offset(),{width:this.outerWidth(),height:this.outerHeight()});var $cntnr=$ksle.offset();$ksle.addClass('uiTolupOo');$ksle.css({'box-shadow':'rgb(165, 238, 248) 0px 0px 3px','position':'relative','z-index':'5200'});$('#mask').css({'width':'100%','height':'100%'}).fadeIn(250);$('.uiCntnToo .cnToo').html($html);var potop=topskOoo.top+topskOoo.height+10;var poslrf=topskOoo.left+8;$('.uiCntnToo').css({'position':'absolute','top':potop,'left':poslrf,'z-index':'1000'}).fadeIn(250);$('#mask').click(function(){$('#mask').fadeOut(250).css({'width':'inherit','height':'inherit'});$('.uiCntnToo').fadeOut(250);$ksle.css({'box-shadow':'inherit','z-index':'inherit'});});$('.close_tooltup').click(function(){$('#mask').fadeOut(250).css({'width':'inherit','height':'inherit'});$('.uiCntnToo').fadeOut(250);$ksle.css({'box-shadow':'inherit','z-index':'inherit'});});};});(function(){var defaults={className:'autosizejs',id:'autosizejs',append:'\n',callback:false,resizeDelay:10,placeholder:true},copy='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',typographyStyles=['fontFamily','fontSize','fontWeight','fontStyle','letterSpacing','textTransform','wordSpacing','textIndent','whiteSpace'],mirrored,mirror=$(copy).data('autosize',true)[0];mirror.style.lineHeight='99px';if($(mirror).css('lineHeight')==='99px'){typographyStyles.push('lineHeight')}mirror.style.lineHeight='';$.fn.autosize=function(options){if(!this.length){return this}options=$.extend({},defaults,options||{});if(mirror.parentNode!==document.body){$(document.body).append(mirror)}return this.each(function(){var ta=this,$ta=$(ta),maxHeight,minHeight,boxOffset=0,callback=$.isFunction(options.callback),originalStyles={height:ta.style.height,overflow:ta.style.overflow,overflowY:ta.style.overflowY,wordWrap:ta.style.wordWrap,resize:ta.style.resize},timeout,width=$ta.width(),taResize=$ta.css('resize');if($ta.data('autosize')){return}$ta.data('autosize',true);if($ta.css('box-sizing')==='border-box'||$ta.css('-moz-box-sizing')==='border-box'||$ta.css('-webkit-box-sizing')==='border-box'){boxOffset=$ta.outerHeight()-$ta.height()}minHeight=Math.max(parseFloat($ta.css('minHeight'))-boxOffset||0,$ta.height());$ta.css({overflow:'hidden',overflowY:'hidden',wordWrap:'break-word'});if(taResize==='vertical'){$ta.css('resize','none')}else if(taResize==='both'){$ta.css('resize','horizontal')}function setWidth(){var width;var style=window.getComputedStyle?window.getComputedStyle(ta,null):null;if(style){width=parseFloat(style.width);if(style.boxSizing==='border-box'||style.webkitBoxSizing==='border-box'||style.mozBoxSizing==='border-box'){$.each(['paddingLeft','paddingRight','borderLeftWidth','borderRightWidth'],function(i,val){width-=parseFloat(style[val])})}}else{width=$ta.width()}mirror.style.width=Math.max(width,0)+'px'}function initMirror(){var styles={};mirrored=ta;mirror.className=options.className;mirror.id=options.id;maxHeight=parseFloat($ta.css('maxHeight'));$.each(typographyStyles,function(i,val){styles[val]=$ta.css(val)});$(mirror).css(styles).attr('wrap',$ta.attr('wrap'));setWidth();if(window.chrome){var width=ta.style.width;ta.style.width='0px';var ignore=ta.offsetWidth;ta.style.width=width}}function adjust(){var height,originalHeight;if(mirrored!==ta){initMirror()}else{setWidth()}if(!ta.value&&options.placeholder){mirror.value=($ta.attr("placeholder")||'')}else{mirror.value=ta.value}mirror.value+=options.append||'';mirror.style.overflowY=ta.style.overflowY;originalHeight=parseFloat(ta.style.height)||0;mirror.scrollTop=0;mirror.scrollTop=9e4;height=mirror.scrollTop;if(maxHeight&&height>maxHeight){ta.style.overflowY='scroll';height=maxHeight}else{ta.style.overflowY='hidden';if(height<minHeight){height=minHeight}}height+=boxOffset;if(Math.abs(originalHeight-height)>1/100){ta.style.height=height+'px';mirror.className=mirror.className;if(callback){options.callback.call(ta,ta)}$ta.trigger('autosize.resized')}}function resize(){clearTimeout(timeout);timeout=setTimeout(function(){var newWidth=$ta.width();if(newWidth!==width){width=newWidth;adjust()}},parseInt(options.resizeDelay,10))}if('onpropertychange'in ta){if('oninput'in ta){$ta.on('input.autosize keyup.autosize',adjust)}else{$ta.on('propertychange.autosize',function(){if(event.propertyName==='value'){adjust()}})}}else{$ta.on('input.autosize',adjust)}if(options.resizeDelay!==false){$(window).on('resize.autosize',resize)}$ta.on('autosize.resize',adjust);$ta.on('autosize.resizeIncludeStyle',function(){mirrored=null;adjust()});$ta.on('autosize.destroy',function(){mirrored=null;clearTimeout(timeout);$(window).off('resize',resize);$ta.off('autosize').off('.autosize').css(originalStyles).removeData('autosize')});adjust()})}}(jQuery||$));
function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + "; path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}
function salir(){
	mydialog.loading('Saliendo...');
		$.post(global_data.url+'/ajax/babanta-salir.php?time='+Math.round(Math.random()*1000000),function(h){
			mydialog.end_loading();
			if(h.charAt() == 0 || h.charAt(0) == '0'){
				mydialog.alert('Error al salir', '<div class="alert alert-danger">'+h.substring(2)+'</div>');
			}else{
				location.reload(true);
			}
		});
}

function infouser(){
	var loadinfo = $('#loading'),ajaxinfo = loadinfo.attr('data-ajax');
	if((ajaxinfo == '2' || ajaxinfo == 2) || !ajaxinfo){
	$.ajax({
		type:"POST",
		url:global_data.url+"/ajax/babanta-server.php?time="+Math.round(Math.random()*1000000),
		dataType:"json",
		data: usrjx.extras, 
		beforeSend: function(){
			loadinfo.attr('data-ajax', '1');
			//$('#loading').show();
		},
		success:function(l){
			//$('#loading').hide();
			usrjxf(l);
			loadinfo.attr('data-ajax', '2');
		},
		error: function(){
			loadinfo.attr('data-ajax', '2');
			infouser();
			//mydialog.alert('Error', 'Ocurrio un error. reportalo al administrador: andyg@babanta.com');
		}
	});
   }
}

function idioma_bb(vale){
setCookie('bbnt_idioma', vale, 9999999999); location.reload(true);
}

function sla(){
	    $.material.init();
    $(".shor").noUiSlider({
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });

    $(".svert").noUiSlider({
      orientation: "vertical",
      start: 40,
      connect: "lower",
      range: {
        min: 0,
        max: 100
      }
    });
}
function copy(valor){ var aux = valor; aux.select(); document.execCommand("copy"); 
var options =  { 
content: "Copiado al portapapeles", 
style: "toast", 
timeout: 4000 
} 
$.snackbar(options); 
}
$(window).load(function(){ if(global_data.user_key){ infouser(); }
var estadisticas = setInterval(function(){ infouser() }, 15000);
setInterval(function(){ 
/*if(global_data.user_key){
infouser();
}*/
sla();
},300); sla();
$('.logout').click(function(){
mydialog.show(true);
mydialog.title('Seguro que quieres salir de '+global_data.name+'?');
mydialog.body('Salir de '+global_data.name);
mydialog.buttons(true, true, 'Salir', 'salir()', true, true, true, 'Cancelar', 'close', true, false);
mydialog.center();
});
})
