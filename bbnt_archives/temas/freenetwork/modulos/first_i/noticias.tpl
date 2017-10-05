        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Contenido
                            <small>Genera con tu pagina de Facebook</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Contenido
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

<div class="row">

<fieldset class="panel-body">
<div class="row">
  <div class="col-md-6">
<div class="panel panel-warning add_pub">
<div class="panel-heading">Todo lo que publiques.. <small>Agregalo al sistema para controlarlo</small></div>
<div class="panel-body">
<div class="form-group label-floating" style="margin:9px 0 0 0;">
  <label class="control-label" for="addon2">Url de la publicación</label>
  <div class="input-group col-md-12">
    <input type="text" id="addon2" value="{$url.postix_url}" name="url" aria-label="..." class="form-control col-md-12">
  </div>
</div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button onclick="postixclass.add_pub();" class="btn btn-primary">Guardar publicación</button>
      </div>
      </div>
    </div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-info">
<div class="panel-heading">Tus publicaciones</div>
<table class="table">
  <thead>
    <th>Url</th>
    <th>Fecha</th>
  </thead>
  <tbody>
    {foreach from=$publicaciones item=p}
    <tr>
      <td><a href="{$p.postix_url}" target="_blank">{$p.postix_url|truncate:24}</a></td>
      <td>{$p.postix_hace|hace}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
</div>
</div>
</fieldset>
                  <hr>
<div class="panel panel-success">
<div class="panel-heading" style="overflow:hidden;"><div class="col-md-8"><h4>Contenido de calidad <b>;)</b></h4></div>
<div style="float:right;height:15px;"><select class="form-control" style="padding:0;" onchange="location.href=$(this).val();"><option>Selecciona una categoria</option>
<option value="{$tsConfig.partner_url}?page={$thispage}">Todas</option>
{foreach from=$categorias item=c}
        <option value="{$tsConfig.partner_url}?page={$thispage}&cat={$c.postix_cat_id}">{if $c.postix_cat_active == 0}Inactiva: {/if}{$c.postix_cat_name}</option>
{/foreach}</select></div>
</div>
{if $postscompart}
                  <fieldset class="panel-body">
                  <div class="items-news">
{foreach from=$postscompart item=p}
<div class="col-sm-6 col-md-4 item-new">
    <div class="thumbnail">
      <div class="alert alert-{if $p.postix_active == 1}info{else}danger{/if}" style="margin: 0;padding: 6px 7px;text-align: center;">{if $p.postix_active == 0}<b>Desactivada:</b>&nbsp;{/if}{$p.postix_cat_name}</div>
      <img src="{if $p.postix_portada}{$p.postix_portada}{else}data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyYTliNTQ3YmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTJhOWI1NDdiYyI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MSIgeT0iMTA0LjgiPjE5MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4={/if}" alt="...">
      <div class="caption">
        <h3>{$p.postix_name}</h3>
        <div class="fb-share-button" data-href="{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/" data-layout="button_count"></div>
        <a onclick="window.open('https://twitter.com/home?status={$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/', 400, 400);" class="btn btn-warning btn-sm color_white" role="button" style="margin: 9px 0 11px 0;">Compartir en Twitter</a>
        {if $wuser->admod}<a href="{$tsConfig.partner_url}?page=admod&pref={$p.postix_id}&action=editar" class="btn btn-warning btn-sm color_white" role="button" style="margin-bottom: 11px;">Editar nota</a>
        {if $p.postix_active == 0}<a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '1')" class="btn btn-success btn-sm color_white" role="button" style="margin-bottom: 11px;">Activar</a>{else}<a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '0')" class="btn btn-danger btn-sm color_white" role="button" style="margin-bottom: 11px;">Desactivar</a>{/if}
        {/if}
<div class="input-group">
<span class="input-group-btn">
<button class="btn btn-info btn-sm" type="button" onclick="copy(document.getElementById('value{$p.postix_id}'))">Copiar</button>
</span>
<input type="text" width="100%" class="form-control" id="value{$p.postix_id}" style="margin:0 3px;" value="{$tsConfig.url}/int/noticias-share/{$p.postix_id}/{$wuser->uid}/" aria-describedby="basic-addon1" />
</div>
      </div>
      <div class="alert alert-warning" style="margin: 0;padding: 6px 7px;text-align: center;">Ranking <b>{$p.visitas}</b></div>
    </div>
  </div>
{/foreach}
</div>
</fieldset>
{else}
<div id="error_flat" class="blue_flat">No hay Noticias para compartir :(, espera que generemos contenido :)</div>
{/if}
{$pagelist}
</div>
                </div>

            </div>
<script type="text/javascript" src="//wortit.net/js/code/masonry.pkgd.min.js"></script>
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