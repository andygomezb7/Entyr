        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Paginas de fans
                            <small>Paginas de fans de Facebook</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-charts-o"></i> Paginas de fans
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                  <div class="panel panel-warning">
<div class="panel-heading">Control de tu contenido <small>Agrega aqui tus publicaciones</small></div>
                  <fieldset class="panel-body">
    <div class="row add_page">
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre de la pagina</label>
      <div class="col-md-10">
        <input type="hidden" name="type" value="2" />
       <input type="text" class="form-control" name="name" aria-label="..." placeholder="Mi pagina de Faceobok">
      </div>
  </div>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Url de la pagina</label>
      <div class="col-md-10">
        <input type="hidden" name="type" value="3" />
       <input type="text" class="form-control" value="{$url.postix_url}" name="url" aria-label="..." placeholder="https://www.facebook.com/mipagina">
      </div>
  </div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button onclick="pages.set();" class="btn btn-primary">Guardar Pagina</button>
      </div>
      </div>
                    </div>
                                        <hr>
<div class="panel panel-info">
<div class="panel-heading">Tus paginas</div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Fecha</th>
  </thead>
  <tbody>
    {foreach from=$paginas item=p}
    <tr>
      <td><a href="{$p.postix_url}">{$p.postix_name}</a></td>
      <td>{$p.postix_hace|hace}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
                </fieldset>
            </div>

<script type="text/javascript">{literal}
var pages = {
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
                    set: function(){
                    pages.ajax('babanta-pages', '.add_page');
                    }
}
{/literal}</script>
                </div>

            </div>