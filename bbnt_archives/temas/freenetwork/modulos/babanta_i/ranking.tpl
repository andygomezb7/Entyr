        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Ranking de contenido
                            <small>El mejor contenido en Babanta</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Contenido
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row">

<div class="panel panel-success">
<div class="panel-heading" style="overflow:hidden;"><div class="col-md-8"><h4>Contenido de calidad <b>;)</b></h4></div>
<div style="float:right;height:15px;"><select class="form-control" style="padding:0;" onchange="location.href=$(this).val();"><option>Selecciona una categoria</option>
<option value="{$tsConfig.partner_url}?page={$thispage}">Todas</option>
{foreach from=$categorias item=c}
        <option value="{$tsConfig.partner_url}?page={$thispage}&cat={$c.postix_cat_id}">{$c.postix_cat_name}</option>
{/foreach}</select></div>
</div>
{if $postscompart}
                  <fieldset class="panel-body">
                  <div class="items-news">
{foreach from=$postscompart item=p}
<div class="col-sm-6 col-md-4 item-new">
    <div class="thumbnail">
      <div class="alert alert-info" style="margin: 0;padding: 6px 7px;text-align: center;">
<div class="alert alert-warning floatL" style="width: auto;padding: 1px 4px;">CPM: {$p.postix_valor}$</div>
{if $p.postix_active == 1}<b>Desactivada:</b>&nbsp;{/if}
      {$p.postix_cat_name}</div>
      <img src="{if $p.postix_portada}{$p.postix_portada}{else}data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyYTliNTQ3YmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTJhOWI1NDdiYyI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MSIgeT0iMTA0LjgiPjE5MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4={/if}" alt="...">
      <div class="caption">
        <h3>{$p.postix_name}</h3>
        <div class="fb-share-button" style="height:25px;widht:100%;" data-href="{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?dataget=turn-{$smarty.now}" data-layout="button_count"></div>
        <a onclick="window.open('https://twitter.com/home?status={$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?dataget=turn-{$smarty.now}', 400, 400);" class="btn btn-warning btn-sm" role="button" style="margin: 9px 0 11px 0;">Compartir en Twitter</a>
        {if $wuser->admod}<a href="{$tsConfig.partner_url}?page=admod&pref={$p.postix_id}&action=editar" class="btn btn-warning btn-sm" role="button" style="margin-bottom: 11px;">Editar nota</a>{/if}
<div class="input-group">
<span class="input-group-btn">
<button class="btn btn-info btn-sm" type="button" onclick="copy(document.getElementById('value{$p.postix_id}'))">Copiar</button>
</span>
<input type="text" width="100%" class="form-control" id="value{$p.postix_id}" style="margin:0 3px;" value="{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/?dataget=turn-{$smarty.now}" aria-describedby="basic-addon1" />
</div>
      </div>
      {* <div class="alert alert-warning" style="margin: 0;padding: 6px 7px;text-align: center;">Ranking <b>{$p.visitas}</b></div> *}
    </div>
  </div>
{/foreach}
</div>
</fieldset>
{else}
<div id="error_flat" class="blue_flat">No hay Noticias para compartir :(, espera que generemos contenido :)</div>
{/if}
<center>{$pagelist}</center>
</div>
                </div>

            </div>
<script type="text/javascript" src="{$tsConfig.js}/masonry.pkgd.min.js?dataget=turn-{$smarty.now}"></script>
<script src="//imagesloaded.desandro.com/imagesloaded.pkgd.min.js"></script>
            <!-- /.container-fluid -->
<script type="text/javascript">{literal}
function copy(valor){ 
var aux = valor;
  aux.select();
  document.execCommand("copy");
   alertw.sow("Copiado!","Copiado al portapapeles!",4e3,"blue")
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