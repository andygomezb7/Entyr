        <div id="page-wrapper">

            <div class="container-fluid">

<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
<section class="content-header">
      <h1>
        Editor
        <small>Agregar contenido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Editor</li>
      </ol>
    </section>

                <div class="row">
                    <div class="panel-body">
<!--  AGREGAR NOTA  -->
  <fieldset class="add_new">
    <legend class="col-sm-offset-2">{if $tsAction == 'editar' && $get_.pref}Editar {else}Agregar {/if}Noticia</legend>
     <form class="form-signin formpostcont" method="POST" action="">
{if $error_new}<div class="alert alert-{$error_new}">{$error_new_text}</div>{/if}
        <h2 class="form-signin-heading">Crea una nota</h2>
        <label for="tit" class="sr-only">Titulo</label>
        <input type="text" id="tit" class="form-control" value="{$noticia.bbgs_title}" name="titulo" placeholder="Titulo" required=""><br />
        <label for="cont" class="sr-only">Contenido (descripci&oacute;n)</label>
        <textarea id="cont" class="form-control" name="contentido" placeholder="Descripci&oacute;n" width="100%" style="min-height:340px;" required="" value="{$noticia.bbgs_content}"></textarea><br />
        <label for="desc" class="sr-only">Descripci&oacute;n breve (para mostrar en facebook)</label>
        <input type="text" id="desc" class="form-control" value="{$noticia.bbgs_seodesc}" name="desc" placeholder="Descripcion breve" required=""><br />
        <label for="port" class="sr-only">Portada (Url)</label>
        <input type="text" id="port" class="form-control" value="{$noticia.bbgs_portada}" name="portada" placeholder="Portada url" required=""><br />
        <label for="seo" class="sr-only">SEO titulo (Sin espacios)</label>
        <input type="text" id="seo" class="form-control" name="seo" value="{$noticia.bbgs_seo}" placeholder="hola-esto-es-un-post" required=""><br />
        <label for="video" class="sr-only">Portada en la pagina</label>
        <input type="text" id="video" class="form-control" name="videoimg" value="{$noticia.bbgs_videoimg}" placeholder="Url de la imagen del video" required=""><br />
        <label for="videou" class="sr-only">Referencia de la nota</label>
        <input type="text" id="videou" class="form-control" name="videourl" value="{$noticia.bbgs_videourl}" placeholder="Url del pack/video" required=""><br />

        <label for="catcpa" class="sr-only">Categoria</label>
        <select id="catcpa" class="form-control" name="catcpa" required="">
        <option>Categoria</option>
{foreach from=$categorias item=c}
<option value="{$c.postix_cat_id}" {if $noticia.bbgs_cpa == $c.postix_cat_id}selected="selected"{/if}>{$c.postix_cat_name}</option>
{/foreach}
        </select><br />
        <label for="adstipe" class="sr-only">Tipo de publicidad</label>
        <select id="adstipe" class="form-control" name="adstipe" required="">
        <option>Tipo de publicidad</option>
        <option value="1" {if $noticia.bbgs_tipoads == 1}selected="selected"{/if}>CPA campaña</option>
        <option value="2" {if $noticia.bbgs_tipoads == 2}selected="selected"{/if}>Nota Normal</option>
        <option value="3" {if $noticia.bbgs_tipoads == 3}selected="selected"{/if}>Enlace fuera de la pagina</option>
        </select><br />
        
        <input type="hidden" id="inputEmail" class="form-control" name="new_post" value="1">
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="submitpost()">Guardar</button>
      </form>   
<script src="http://web.babanta.net/recurses/editor.js"></script>
<link href="http://web.babanta.net/recurses/editor.css" rel="stylesheet">
<script type="text/javascript">{literal}
$(document).ready(function(){
$('#cont').Editor();
});
function submitpost(){
$('textarea#cont').val($('.Editor-editor').html()); // Editor("getText")
$('.formpostcont').submit();
}
{/literal}</script>
<style type="text/css">{literal}
body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #eee;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.Editor-container{background:white!important;}
.form-signin{max-width:680px!important;}
{/literal}</style>
</div>

    {*<div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Categoria</label>
      <div class="col-md-10">
        <input type="hidden" name="type" value="1" />
      <select class="form-control" name="valor">
        <option>Selecciona una categoria</option>
        {foreach from=$categorias item=c}
        <option value="{$c.postix_cat_id}" {if $tsAction == 'editar' && $noticia.postix_content == $c.postix_cat_id}selected="selected"{/if}>{$c.postix_cat_name}</option>
        {/foreach}
      </select>
      </div></div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <input type="hidden" name="action" value="{if $tsAction == 'editar' && $get_.pref}5{else}2{/if}" />
        {if $tsAction == 'editar' && $get_.pref}<input type="hidden" name="id" value="{$noticia.postix_id}" />{/if}
        <button onclick="admodpostix.add_new();" class="btn btn-primary">Guardar Notas</button>
      </div>
      </div>*}
      </fieldset>
  
</div>
</div>
                <script type="text/javascript">{literal}
                var admodpostix = {
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
                    add_new: function(){
                        admodpostix.ajax('babanta-new', '.add_new');
                    },
                    edt_new: function(){
                        admodpostix.ajax('babanta-new', '.edt_new');
                    }
                }
                {/literal}</script>
                </div>

            </div>