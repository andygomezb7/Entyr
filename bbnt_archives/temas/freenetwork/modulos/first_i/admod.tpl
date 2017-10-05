        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administración
                            <small>Administra tu network</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-chart-o"></i> Administración
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">

            <div class="row">
                <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">$ {$ingresosadmin.usd} USD</div>
                                        <div>Por cobrar</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left">Dolares totales generados hasta ahora</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                                        <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{$ingresosadmin.impresiones}</div>
                                        <div>Impresiones totales este mes</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left">Numero de impresiones este mes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <hr>
                                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Estadisticas <b><small>Fase de pruebas</small></b></h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-line-chart"></div>
                <script src="{$tsConfig.js}/morris.min.js"></script>
                <script type="text/javascript">{literal}
                $(function(){
                Morris.Line({
                element: 'morris-line-chart',
                data: [{/literal}{$ingresosadmin.estadisticas}{literal}],
                xkey: 'd',
                ykeys: ['visits'],
                labels: ['Visitas'],
                smooth: false,
                resize: true
                });
                });
                {/literal}</script> 

                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row panel-body">
                  <div class="col-md-6">
<div class="panel panel-info">
<div class="panel-heading">Nuevas paginas</div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Fecha</th>
  </thead>
  <tbody>
    {foreach from=$pagesadmin item=p}
    <tr>
      <td><a href="{$p.postix_url}">{$p.postix_name}</a></td>
      <td>{$p.postix_hace|hace}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-info">
<div class="panel-heading">Publicaciones nuevas</div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Fecha</th>
  </thead>
  <tbody>
    {foreach from=$publicadmin item=tt}
    <tr>
      <td><a href="{$tt.postix_url}">{$tt.postix_url|truncate:32}</a></td>
      <td>{$tt.postix_hace|hace}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
</div>
                </div>
<hr>
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
    </fieldset>

<br>

    <fieldset class="add_cat">
    <legend class="col-sm-offset-2">Listar categorias</legend>
    <div class="form-group">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Id</th>
<th>Nombre</th>
<th>Funciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$categorias item=ct}
<tr>
<td>
  {$ct.postix_cat_id}
</td>
<td>
{if $ct.postix_cat_active == 0}<b>Inactiva:</b>&nbps; {/if}{$ct.postix_cat_name}
</td>
<td>
{if $ct.postix_cat_active == 1}<a href="javascript:void(0)" class="btn btn-success" onclick="admodpostix.catedit({$ct.postix_cat_id}, 1, '0')">Desactivar</a>{else}<a href="javascript:void(0)" class="btn btn-success" onclick="admodpostix.catedit({$ct.postix_cat_id}, 1, '1')">Activar</a>{/if}
</td>
</tr>
{/foreach}
                                        </tbody>
                                    </table>
    </div>
  </fieldset>
    {/if}
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
                        admodpostix.ajax('babanta-cat', '.add_cat');
                    },
                    edt_cat: function(){
                        admodpostix.ajax('babanta-cat', '.edt_cat');
                    },
                    add_new: function(){
                        admodpostix.ajax('babanta-new', '.add_new');
                    },
                    edt_new: function(){
                        admodpostix.ajax('babanta-new', '.edt_new');
                    },
                    catedit: function(i, t, o){
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
            </div>