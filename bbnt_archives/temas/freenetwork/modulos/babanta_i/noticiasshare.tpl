        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                

{if $categoriaget}
<div class="alert alert-warning">Estas viendo la categoria: <b>{$categoriainfo.postix_cat_name}</b></div>
<hr />
{/if}
<div class="list-group">
{foreach from=$postscompart item=p}
<div class="list-group-item active col-md-12" style="outline: inherit!important;background: transparent!important;overflow: inherit;clear: both;border-bottom: 1px solid rgba(204, 204, 204, 0.34);margin: 0 0 9px 0;position:inherit!important;">
<div class="col-md-2" style="padding: 0;height: 100px;overflow: hidden;"><img src="{if $p.postix_portada}
{assign var="postadapostixs" value=$p.postix_portada|replace:"http://babanta.com":"http://static.babanta.com"}
{$postadapostixs|replace:"/noticias/wp-content/uploads/sites/":"/wp-content/uploads/"}{else}data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyYTliNTQ3YmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTJhOWI1NDdiYyI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MSIgeT0iMTA0LjgiPjE5MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4={/if}" style="min-width: 100%;height: auto;max-width: 157%;"></div> <div class="col-md-7"><h4 class="list-group-item-heading">{if $p.postix_active == 1}<font color="red">Desactivada:</font>&nbsp;{/if}{$p.postix_name}</h4>
<div class="list-group-item-text">
<div class="btn-group" role="group" aria-label="...">
{* <button type="button" class="btn btn-success" onclick="window.open('https://www.facebook.com/share.php?text={$p.postix_name} Via @BabantaNetwork&u={$p.urlshare}', 350, 100);">
<i class="fa fa-facebook-square"></i></button>
<button type="button" class="btn btn-warning" onclick="window.open('https://twitter.com/share?text={$p.postix_name} Via @BabantaNetwork&url={$p.urlshare}', 400, 400);"><i class="fa fa-twitter-square"></i></button> *}
{if $wuser->admod || $wuser->user_editor}<div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-cogs"></i> <span class="caret"></span></button>
<div class="alert alert-warning" style="float:left;padding: 9px 9px;margin: 0 0 0 10px;"><b>Network: </b>{if $p.postix_notatype == 2}Patrocinadores{else}Hits Babanta{/if}</div>
<ul class="dropdown-menu">
<li><a data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('value{$p.postix_id}'))" href="javascript:void(0)">Copiar enlace</a></li>
<li role="separator" class="divider"></li>
<li><a href="{$tsConfig.partner_url}?page=editor&pref={$p.postix_id}&action=editar" role="button" style="margin-bottom: 11px;">Editar nota</a></li>
{if $p.postix_active == 1}
<li><a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '0')" role="button" style="margin-bottom: 11px;">Activar</a></li>{else}<li><a href="javascript:void(0)" onclick="postixclass.delet({$p.postix_id}, 2, '1')" role="button" style="margin-bottom: 11px;">Desactivar</a></li>{/if}
</ul>
</div>{else}<button type="button" class="btn btn-danger" data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('value{$p.postix_id}'))" href="javascript:void(0)"><i class="fa fa-copy"></i></button>{/if}
</div>
      </div></div>
<div class="col-md-3">
<div class="input-group">
<label style="font-size: 13px;"><i class="fa fa-link"></i> Enlace personalizado</label>

<div class="form-group"><input type="text" width="100%" class="form-control" id="value{$p.postix_id}" style="margin:0 3px;" value="{$p.urlshare}" aria-describedby="basic-addon1" /></div>
</div>

<div class="input-group">
<label style="font-size: 13px;"><i class="fa fa-info"></i> {$p.postix_cat_name}</label>
<div class="form-group" style="padding: 0!important;">
<div class="alert alert-warning" style="float:left;padding: 2px 9px;margin: 0 0 0 0;"><b>CPM</b>{if $p.postix_notatype == 2}: $ {$p.postix_valor}{/if}</div>
<div class="alert alert-info" style="float:left;padding: 2px 9px;margin: 0 0 0 5px;"><b>Tipo: </b>{if $p.postix_notatype == 2}CPM Fijo{else}Oferta{/if}</div>
</div>
</div>
</div>
  </div>
      {/foreach}  
</div>
<hr />
<center><div style="margin:0 40px;">{$pagelist}</div></center>
<div><div><div>
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
    timeout: 4000
}

$.snackbar(options);
} 
function vistaprev(i){ mydialog.loading('Cargando vista previa...');
$.post(global_data.url+'/ajax/babanta-viewnote.php?id='+i, function(h){ mydialog.end_loading();
mydialog.alert('Vista previa', h);
});
}
/*var $container = $('.items-news'); 
            $container.imagesLoaded( function() {
            $container.masonry();
        });*/
// {/literal}{if $wuser->admod || $wuser->user_editor}{literal}
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
mydialog.title('Funciones de editor');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
 });
}
}

var postixclass = { delet: function(i, t, o){
mydialog.loading('Cargando...');
$.post(global_data.url+'/ajax/babanta-delet.php', {'t': t,'i':i,'o':o}, function(h){
mydialog.end_loading();
mydialog.show(true);
mydialog.title('Funciones de editor');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
 });
} }
//{/literal}{/if}</script>
</div></div></div>
</div>
</div>