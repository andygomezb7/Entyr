        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Editor
                            <small>Editor de Babanta</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-charts-o"></i> Editor
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="panel-body">
<!--  AGREGAR NOTA  -->
  <fieldset class="add_new">
    <legend class="col-sm-offset-2">{if $tsAction == 'editar' && $get_.pref}Editar {else}Agregar {/if}Noticia <small><b>Puedes editar noticias</b> en la sección noticias <b>en el boton: editar noticia</b></small></legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="name" value="{$noticia.postix_name}" aria-label="..." placeholder="Mi noticia">
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Imagen Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="{$noticia.postix_portada}" name="portada" aria-label="..." placeholder="http://wortit.net/images/avatar/group3.png">
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Direcci&oacute;n Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="{$noticia.postix_url}" name="url" aria-label="..." placeholder="http://miblog.com/blocat/post-name.html">
      </div></div>

    <div class="form-group">
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
      </div>
      </fieldset>
  
  <!--  AGREGAR CATEGORIA  -->
    {if $tsAction != 'editar'}<hr>
    <fieldset class="add_cat">
    <legend class="col-sm-offset-2">Agregar Categoria</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="name" aria-label="..." placeholder="Mi categoria">
      </div></div>
      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
      <input type="hidden" name="action" value="2" />
      <button onclick="admodpostix.add_cat()" class="btn btn-primary">Crear Categoria</button>
    </div>
    </div>
    </fieldset>{/if}
</div>
      <hr>

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
                    add_cat: function (){
                        admodpostix.ajax('babnata-cat', '.add_cat');
                    },
                    edt_cat: function(){
                        admodpostix.ajax('babnata-cat', '.edt_cat');
                    },
                    add_new: function(){
                        admodpostix.ajax('babnata-new', '.add_new');
                    },
                    edt_new: function(){
                        admodpostix.ajax('babnata-new', '.edt_new');
                    }
                }
                {/literal}</script>
                </div>

            </div>