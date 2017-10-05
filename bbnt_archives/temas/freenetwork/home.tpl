    {if !$wuser->uid}
    {include file='modulos/babanta_i/unlogged.tpl'}
    {elseif $wuser->uid && ($wuser->info.buser_verified == 1 || $wuser->info.buser_verified == '1')}
{include file='includes/main_header.tpl'}
    {if $wuser->uid}<link href="{$tsConfig.css}/sb-admin.css" rel="stylesheet">
    <link href="{$tsConfig.css}/morris.css" rel="stylesheet">{/if}
    <link href="{$tsConfig.css}/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
     <div id="wrapper" {if $wuser->uid && $wuser->info.buser_verified != 1}style="padding:0!important;"{/if}>
    {include file='modulos/babanta_i/navigate.tpl'}
    <!---->
<style type="text/css">{literal}
.form-group{overflow:hidden!important;}
{/literal}</style>

{if (!$wuser->info.buser_name || !$wuser->info.buser_date_1 || !$wuser->info.buser_date_2 || !$wuser->info.buser_date_3 || !$wuser->info.buser_codepostal || !$wuser->info.partner_pago || !$wuser->info.partner_metodo || $wuser->info.buser_data_fact > 3) && $thispage != 'config' }
<div class="modal fade" id="modalfacturacion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rellena tu informaci&oacute;n de facturaci&oacute;n</h4>
      </div>
      <div class="modal-body edt_cuenta">
   {if $wuser->info.buser_data_fact > 2}
    <div class="alert alert-warning"><b>Hemos revisado tu dirección</b>: la guardamos como <i>{if $wuser->info.buser_data_fact == 3}Aprobada{elseif $wuser->info.buser_data_fact == 4}Rechazada{elseif $wuser->info.buser_data_fact == 5}Requiere cambios{/if}</i>.<br>
    <b>Comentarios de un administrador:</b> {$wuser->facturacion.comentarios}</div>
    <hr />
    {/if}
<div class="panel panel-info" style="overflow: hidden;padding: 3px 17px;">
<div class="panel-body">
<br />
<div class="form-group">
 <div class="form-group label-floating">
    <label for="i5" class="control-label">Nombre completo</label>
    <input type="text" name="namepart" value="{$wuser->info.buser_name}" class="form-control" id="i5">
    <span class="help-block">Nombre particular completo <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Dirección</label>
    <input type="text" name="dirpart" value="{$wuser->info.buser_date_1}" class="form-control" id="i5">
    <span class="help-block">Dirección Particular <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Ciudad</label>
    <input type="text" name="ciupart" value="{$wuser->info.buser_date_2}" class="form-control" id="i5">
    <span class="help-block">Ciudad de residencia <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Estado / Provincia</label>
    <input type="text" name="stapart" value="{$wuser->info.buser_date_3}" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Codigo postal</label>
    <input type="text" name="codpart" value="{$wuser->info.buser_codepostal}" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

        <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label" style="color:gray;">Metodo de pago</label>
      <div class="col-md-10">
      <select class="form-control" name="metodo" onchange="nameok($(this).val())">
        <option value="1" {if $wuser->info.partner_metodo == 1}selected="selected"{/if}>Paypal</option>
      </select>
      </div></div>
      <div class="form-group" style="clear:both!important;">
      <label for="inputEmail" class="col-md-2 control-label">Correo de PayPal</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="valor" value="{$wuser->info.partner_pago}" aria-label="..." placeholder="ej: mi_correo@hotmail.com">
      </div></div>

</div>

</div>
  </div>

</div>
      <div class="modal-footer">
        <button type="button" onclick="cuentapostix.set()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
               <script type="text/javascript">{literal}
               $('#modalfacturacion').modal();
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('7 p(i){c(i==1){5.8(\'q x w t u v y A z.\')}}e j={3:7(3,4){5.s(\'B l...\');e d=$(4+\' m[9],\'+4+\' r[9], \'+4+\' n[9]\');$.3({b:o.b+\'/3/\'+3+\'.F\',P:\'O\',N:$.Q(d),C:7(h){5.T();c(h.S(0)==0){5.8(\'a\',\'<6 4="g" f="L">\'+h.k(2)+\'</6>\')}M{5.8(\'a\',\'<6 4="g" f="E">\'+h.k(2)+\'</6>\');D.G(H)}}})},K:7(){j.3(\'J-I\',\'.R\')},}',56,56,'|||ajax|id|mydialog|div|function|alert|name|Aviso|url|if|params|var|class|error_flat||val|cuentapostix|substring|datos|input|textarea|global_data|nameok|Escribe|select|loading|electronico|de|Paypal|correo|tu|en|campo|el|Guardando|success|location|blue_flat|php|reload|true|cuenta|babanta|set|red_flat|else|data|POST|type|param|edt_cuenta|charAt|end_loading'.split('|'),0,{}))
                {/literal}</script>
{/if}

    {if $thispage == 'noticias'}
   {include file='modulos/babanta_i/noticias.tpl'}
    {elseif $thispage == 'charts'}
    {include file='modulos/babanta_i/charts.tpl'}
     {elseif $thispage == 'share'}
    {include file='modulos/babanta_i/noticiasshare.tpl'}
    {elseif $thispage == 'config'}
    {include file='modulos/babanta_i/config.tpl'}
    {elseif $thispage == 'pages'}
    {include file='modulos/babanta_i/pages.tpl'}
    {elseif $thispage == 'estadisticas'}
    {include file='modulos/babanta_i/estadisticas.tpl'}
    {elseif $thispage == 'soporte'}
    {include file='modulos/babanta_i/soporte.tpl'}
    {elseif $thispage == 'ranking'}
    {include file='modulos/babanta_i/ranking.tpl'}
    {elseif $thispage == 'editor' && ($wuser->admod || $wuser->user_editor)}
    {include file='modulos/babanta_i/editor.tpl'}
    {elseif $thispage == 'manager' && ($wuser->admod || $wuser->user_manager) }
    {include file='modulos/babanta_i/manager.tpl'}
    {elseif $thispage == 'admod' && $wuser->admod}
    {include file='modulos/babanta_i/admod.tpl'}
    {elseif $thispage == 'payments' && $wuser->admod}
    {include file='modulos/babanta_i/payments.tpl'}
    {elseif $thispage == 'publisher'}
    {include file='modulos/babanta_i/publishers.tpl'}
    {elseif $thispage == 'advertiser' && ($wuser->admod || $wuser->advertiser)}
    {if $wuser->advertiserpet}
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Esperando Confirmación</h1>
        <p>Esperando la confirmación de un administrador para monetizar tu blog.</p>
      </div>
    </div>
    {else}
    {include file='modulos/babanta_i/advertiser.tpl'}
    {/if}
    {else}
    {if $wuser->advertiser && $wuser->advertiserload}
     <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Esperando Confirmación</h1>
        <p>Esperando la confirmación de un administrador para monetizar tu blog.</p>
      </div>
    </div>
    {elseif $wuser->advertiser && $wuser->advertisercheck}
    {include file='modulos/babanta_i/advertiser.tpl'}
    {elseif $thispage == 'red'}
    {include file='modulos/babanta_i/redbabanta.tpl'}
     {else}
        {include file='modulos/babanta_i/home.tpl'}
    {/if}
    {/if}
    <!---->
{else}
<center>
<h1>Tu cuenta aun no esta verificada</h1><br />
<h4>Para más info: <a href="mailito:cpm_verificaciones@babanta.net">cpm_verificaciones@babanta.net</a></h4><br />
<a onclick="salir()" href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-fw fa-power-off"></i> Cerrar sesi&oacute;n</a>
</center>
    {/if}
    </div>
    {if $wuser->uid}<script src="{$tsConfig.js}/raphael.min.js"></script>

<script type="text/javascript">{literal}
            var time_notica=5000;
            var pixel_noticia=30;
            var count_noticia=1;
            var procesar_noticia=true;
            $( "#news" ).mouseover(function() {
                procesar_noticia=false;
            });
            $( "#news" ).mouseover(function() {
                procesar_noticia=false;
            }).mouseout(function() {
                procesar_noticia=true;
            });
            function zeropadder(n) {
              return (parseInt(n,10) < 10 ? '0' : '')+n;
            }
            function updateTime(){
              var timeNow= new Date(),
              hh = timeNow.getHours(),
              mm = timeNow.getMinutes(),
              ss = timeNow.getSeconds(),
              formatAMPM = (hh >= 12?'PM':'AM');
              hh = hh % 12 || 12;
              currentTime.innerHTML = hh + ":" + zeropadder(mm) + ":" + zeropadder(ss) + " " + formatAMPM;
              setTimeout(updateTime,1000);
            }
            function noticiones(count){
                count--;
                setInterval(function(){
                    if(procesar_noticia){
                        $('#news').animate({top: '-'+pixel_noticia+'px'});
                        if (count_noticia<count){
                            pixel_noticia=pixel_noticia+30;
                            count_noticia++;
                        }else{
                            pixel_noticia=0;
                            count_noticia=0;
                        }
                    }                                       
                }, time_notica);
            }
            $(function(){
                noticiones($('#news li').length);
            });
{/literal}</script>
<style type="text/css">{literal}
.breakingNews{overflow: hidden;padding: 0px 4px;background: white;}
#news{padding: 0px; margin: 0px 0px 0px 138px; list-style: none; position: relative; width: 400px; top: 0px;width:auto;}
#news li{height: 30px !important;line-height: 30px !important;}
.flechiten{border-style: solid;border-width: 10px 0 10px 10px;border-color: transparent transparent transparent #607D8B;position: absolute;top: 7px;}
.noticion{display: inline-block;margin: 0;margin-top: 2px !important;display: block;padding: 0 10px !important;font-size: 11px !important;font-weight: 700 !important;height: 29px !important;line-height: 29px !important;float: left !important;text-align: center !important;color: #FFF !important;background-color: #607D8B !important;text-transform: uppercase !important;}
{/literal}</style>
{include file='includes/main_footer.tpl'}
    {/if}