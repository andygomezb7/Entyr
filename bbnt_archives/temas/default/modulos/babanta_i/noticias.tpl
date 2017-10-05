        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row" style="display:none!important;">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contenido
                            <small>Genera con tu pagina de Facebook</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.partner_url}">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Contenido
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row">

<div class="panel panel-danger">
    <div class="btn-group" role="group" aria-label="..." style="margin-bottom:7px;">
  {foreach from=$categorias item=c}
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page={$thispage}&cat={$c.postix_cat_id}'" class="btn btn-{cycle values="default,info,danger,warning,success"}">{$c.postix_cat_name}</button>
  {/foreach}
  </div><br>
{if $landings && !$categoriaget}
<div class="row col-md-12" style="overflow: hidden;clear: both;float: none!important;">
<h2 class="page-header" style="margin-left: 32px;">Landings </h2>
<!---->
{foreach from=$landings item=lp key=lpnumero}
<div class="col-sm-6 col-md-4" style="border-radius: 0!important;">
<div class="thumbnail" style="border-radius: 0!important;">
<img src="{$lp.postix_portada}" alt="..." style="width: 100%;height: 117px;">
<div class="caption">
<h3 style="margin: 0 0;">{$lp.postix_name}</h3>
<p style="margin-top: 9px;">Las landings incentivan a realizar conversiones :) si tienes buen publico te pueden ayudar de vez en cuando...</p>
<p><div class="input-group">
<span class="input-group-btn">
<button class="btn btn-info btn-sm" type="button" data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('langino{$lpnumero+1}'))">Copiar</button>
</span>
<div class="form-group">
<input type="text" width="100%" class="form-control" id="langino{$lpnumero+1}" style="margin:0 3px;" value="{if $lp.linkgoogl}{$lp.linkgoogl}{else}{$tsConfig.url}/int/noticias-share/{$lp.postix_id}/{$wuser->uid}/?babataserver={$smarty.now}&{$smarty.now}=oktopus{/if}" aria-describedby="basic-addon1">
</div>
</div></p>
</div>
</div>
</div>
{/foreach}
<!---->
</div>
{/if}

{*  <fieldset class="panel-body">
<div class="alert alert-info">
<div class="alert alert-warning floatL" style="width: auto;padding: 1px 4px;">¡NUEVO!</div> &nbsp; Las nuevas notas PREMIUM te permiten por un determinado tiempo y visitas enviadas el <b>CPM</b> mas alto, no se sabe cuanto durara ;) ¡A GENERAR!
  </div> 
</fieldset> *}
  <br>
{* <div class="panel-heading" style="overflow:hidden;"><div class="col-md-8"><h4>Contenido de calidad <b>;)</b></h4></div>
<div style="float:right;height:15px;"><select class="form-control" style="padding:0;" onchange="location.href=$(this).val();"><option>Selecciona una categoria</option>
<option value="{$tsConfig.partner_url}?page={$thispage}">Todas</option>
{foreach from=$categorias item=c}
        <option value="{$tsConfig.partner_url}?page={$thispage}&cat={$c.postix_cat_id}">{$c.postix_cat_name}</option>
{/foreach}</select></div>
</div> *}
{if $postscompart}
<fieldset class="panel-body">
<h2 class="page-header" style="margin-left: 32px;">Contenido </h2>
<div class="alert alert-warning" style="margin:7px 0 0 0;">Les recordamos que el <b>RANK</b> es el punteo que tiene de viral la nota <b>Siempre en su categoria</b>, si tu publico no trata de esto buscar el contenido que corresponda o solicitarlo sino esta disponible :) - ATT: ADM. Babanta</div>
<hr>
<div class="items-news">
{* {if $categoriaget != '22'} *}
{foreach from=$postscompart item=p}
<div class="col-sm-6 col-md-4 item-new">
    <div class="thumbnail" vc="{$p.postix_visitascount}" v="{$p.postix_visitas}">
      {if $p.postix_notatype==2 && $p.postix_visitas < $p.postix_visitascount || $p.postix_notatype==2 && $p.postix_visitascount == $p.postix_visitas}
<div class="alert alert-danger" style="margin: 0;padding: 6px 7px;text-align: center;overflow: hidden;height: 30px;">
<div class="alert alert-danger floatL" style="width: auto;padding: 1px 4px;">CPM: {$p.postix_valor2}$</div>
      PREMIUM</div>
{/if}
      <div class="alert alert-{if $p.postix_active == 0}info{else}danger{/if}" style="margin: 0;padding: 6px 7px;text-align: center;{if $p.postix_notatype==2 && $p.postix_visitas < $p.postix_visitascount || $p.postix_notatype==2 && $p.postix_visitascount == $p.postix_visitas}clear:both;opacity:0.3;{/if}">
{* <div class="alert alert-warning floatL" style="width: auto;padding: 1px 4px;">CPM: {$p.postix_valor}$</div>*}
      {if $p.postix_active == 1}<b>Desactivada:</b>&nbsp;{/if}{$p.postix_cat_name}</div>
      <div style="position:relative;width: 100%;float: left;margin: 0 0 20px 0;">
        <div class="alert alert-danger" style="padding:6px;position:absolute;">
RANK: <i>{$p.postix_visitas*30/1000}</i></div>
<a style="padding:6px;position:absolute;right: 0;color: white;background: #4caf50;border-radius: 0;" href="javascript:void(0)" onclick="vistaprev({$p.postix_id})" class="btn btn-success">Vista previa</a>
      <img src="{if $p.postix_portada}
{assign var="postadapostixs" value=$p.postix_portada|replace:"http://babanta.com":"http://static.babanta.com"}
{$postadapostixs|replace:"/noticias/wp-content/uploads/sites/":"/wp-content/uploads/"}{else}data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyYTliNTQ3YmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTJhOWI1NDdiYyI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MSIgeT0iMTA0LjgiPjE5MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4={/if}" style="max-width:100%;" alt="...">
    </div>
      <div class="caption">
        <h3>{$p.postix_name}</h3>
        <div class="fb-share-button" style="height:25px;widht:100%;" data-href="{if $p.linkgoogl}{$p.linkgoogl}{else}{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?babataserver={$smarty.now}&{$smarty.now}=oktopus{/if}" data-layout="button_count"></div>
        <a onclick="window.open('https://twitter.com/share?text={$p.postix_name} Via @BabantaNetwork&url={if $p.linkgoogl}{$p.linkgoogl}{else}{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?babataserver={$smarty.now}&{$smarty.now}=oktopus{/if}', 400, 400);" class="btn btn-warning btn-sm" role="button" style="margin: 9px 0 11px 0;">Compartir en Twitter</a>
        {if $wuser->admod}<a href="{$tsConfig.partner_url}?page=admod&pref={$p.postix_id}&action=editar" class="btn btn-warning btn-sm" role="button" style="margin-bottom: 11px;">Editar nota</a>
        {if $p.postix_active == 1}<a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '0')" class="btn btn-success btn-sm" role="button" style="margin-bottom: 11px;">Activar</a>{else}<a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '1')" class="btn btn-danger btn-sm" role="button" style="margin-bottom: 11px;">Desactivar</a>{/if}
        {/if}
<div class="input-group">
<span class="input-group-btn">
<button class="btn btn-info btn-sm" type="button" data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('value{$p.postix_id}'))">Copiar</button>
</span>
<input type="text" width="100%" class="form-control" id="value{$p.postix_id}" style="margin:0 3px;" value="{if $p.linkgoogl}{$p.linkgoogl}{else}{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?babataserver={$smarty.now}&{$smarty.now}=oktopus{/if}" aria-describedby="basic-addon1" />
</div>
{if $p.linkgoogl}<hr style="margin:9px 0;" />
<center><a href="https://goo.gl/#analytics/goo.gl/{$p.linkgoogl|replace:"http://goo.gl/":""}/all_time" class="btn btn-info">Ver estad&iacutesticas</a></center>{/if}
      </div>
      {* <div class="alert alert-warning" style="margin: 0;padding: 6px 7px;text-align: center;">Ranking <b>{$p.visitas}</b></div> *}
    </div>
  </div>
{/foreach}
{* {else}<div class="alert alert-danger">Hemos desactivado los GIF's solo por unos dias para comprobar que esto no afecta a sus ganancias pues la gente al ingresar a los gifs no tienen el minimo deseo de verlo segun nuestros usuarios...  <b>Volveran en unos dias</b></div>{/if} *}
</div>
</fieldset>
{else}
<div id="error_flat" class="blue_flat">No hay Noticias para compartir :(, espera que generemos contenido :)</div>
{/if}
<center><div style="margin:0 40px;">{$pagelist}</div></center>
</div>
                </div>

            </div>
<script type="text/javascript" src="{$tsConfig.js}/masonry.pkgd.min.js?babataserver={$smarty.now}&{$smarty.now}=oktopus"></script>
<script src="//imagesloaded.desandro.com/imagesloaded.pkgd.min.js"></script>
            <!-- /.container-fluid -->
<style type="text/css">{literal}
.pagination>li{display: inline-block;margin: 0 0 4px 0;}
{/literal}</style>
<script type="text/javascript">{literal}
function copy(valor){ 
var aux = valor;
  aux.select();
  document.execCommand("copy");
  var options =  {
    content: "Copiado al portapapeles",
    style: "toast",
    timeout: 6000
}

$.snackbar(options);
} 
function vistaprev(i){ mydialog.loading('Cargando vista previa...');
$.post(global_data.url+'/ajax/babanta-viewnote.php?id='+i, function(h){ mydialog.end_loading();
mydialog.alert('Vista previa', h);
});
}
var $container = $('.items-news'); 
            $container.imagesLoaded( function() {
            $container.masonry();
        });
var postixclass = {
                    ajax: function(ajax, id){
                    mydialog.loading('Guardando datos...');
                    var params = $(id+' input[name],'+id+' select[name], '+id+' textarea[name]');
                    $.ajax({
                    url: global_data.url+'/ajax/'+ajax+'.php',
                    type: 'POST',
                    data: $.param(params),
                    success: function(h){ mydialog.end_loading();
                    if(h.charAt(0) == 0){ 
                    mydialog.alert('Aviso', '<div id="error_flat" class="red_flat">'+h.substring(2)+'</div>')
                    }else{
                    mydialog.alert('Aviso', '<div id="error_flat" class="blue_flat">'+h.substring(2)+'</div>')
                    //location.reload(true);
                    }
                    }
                    })
                    },
                    add_pub: function(){
                    postixclass.ajax('babanta-pub', '.add_pub');
                    },
                                        delet: function(i, t, o){
                      mydialog.loading('Cargando...');
                      $.post(global_data.url+'/ajax/babanta-delet.php', {'t': t,'i':i,'o':o}, function(h){
                        mydialog.end_loading();
mydialog.show(true);
mydialog.title('Funciones de administrador');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
                      });
                    }
}
{/literal}</script>
<div id="fb-root"></div>
<script>{literal}(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.5&appId=866978713315645";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));{/literal}</script>
        </div>
        <!-- /#page-wrapper -->