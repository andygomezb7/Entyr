        <div id="page-wrapper">

            <div class="container-fluid">


                 <!-- Content Header (Page header) -->
<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
<section class="content-header">
      <h1>
        Advertiser panel
        <small>Monetiza tu sitio web</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Babanta</a></li>
        <li class="active">Advertiser Panel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-7">

          <a style="display:block;" class="btn btn-info" href="javascript:void(0)" data-toggle="modal" data-target="#AreaCreate">Crear nueva area</a><br>

          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Areas creadas</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Area NO.</th>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Código</th>
                  </tr>
                  </thead>
                  <tbody>
                    {foreach from=$areaswidgets item=p}
                   {if $p.bad_tipos==1}<tr>
                    <td>WIDG{$p.bad_id}</td>
                    <td>{$p.bad_content}</td>
                    <td>{if $p.bad_data == 1}
                      Intestitial mobile
                      {elseif $p.bad_data == 2}
Interstitial Lightbox
                    {elseif $p.bad_data == 3}
                    Layer mobile
                  {elseif $p.bad_data == 4}
                  Interstitial basado en comportamiento
                {elseif $p.bad_data == 5}
                Interstitial mixto basado en comportamiento
              {elseif $p.bad_data == 6}
              Interstitial redirect
            {elseif $p.bad_data == 7}
            Interstitial social adulto
            {/if}</td>
                    <td><a class="btn btn-success" href="javascript:void(0)" onclick="toptic.loadwidget({$p.bad_id},{$p.bad_tipos})">Ver Código</a></td>
                    <td>
                    </td>
                  </tr>{else}
                   <tr>
                    <td><a>{$p.bad_id}</a></td>
                    <td>{$p.bad_content}</td>
                    <td>
                      {if $p.bad_tipos_1 == 1}
                      <u>Redirección</u> <b>&gt;</b>
                     <i>{if $p.bad_tipos_2 == 1}
                      Intestitial mobile
                      {elseif $p.bad_tipos_2 == 2}
                      Interstitial Lightbox
                      {elseif $p.bad_tipos_2 == 3}
                      Layer mobile
                      {elseif $p.bad_tipos_2 == 4}
                      Interstitial basado en comportamiento
                      {elseif $p.bad_tipos_2 == 5}
                      Interstitial mixto basado en comportamiento
                      {elseif $p.bad_tipos_2 == 6}
                      Interstitial redirect
                      {elseif $p.bad_tipos_2 == 7}
                      Interstitial social adulto
                      {elseif $p.bad_tipos_2 == 8}
                      General: Movil y PC
                      {/if}
                    </i>
                      {elseif $p.bad_tipos_1 == 2}
                      Popups
                      {elseif $p.bad_tipos_1 == 3}
                      Popunder
                      {elseif $p.bad_tipos_1 == 4}
                      Baners  <b>&gt;</b>
<i k="{$p.bad_tipos_2}">{if $p.bad_tipos_2 == 1}
300x250
{elseif $p.bad_tipos_2 == 2}
336 x 280
{elseif $p.bad_tipos_2 == 3}
728 x 90
{elseif $p.bad_tipos_2 == 4}
300 x 600
{elseif $p.bad_tipos_2 == 5}
320 x 100
{elseif $p.bad_tipos_2 == 6}
160 x 600
{/if}</i>
                      {elseif $p.bad_tipos_1 == 5}
                      Baners a nivel de página movil
                      {elseif $p.bad_tipos_1 == 6}
                      Baner ft.Babanta
                      {/if}
                    </td>
                    <td><a class="btn btn-success" href="javascript:void(0)" onclick="toptic.loadwidget({$p.bad_id},{$p.bad_tipos})">Ver Código</a></td>
                    <td>
                    </td>
                  </tr>
                  {/if}
                  {/foreach}
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{$tsConfig.url}/" class="btn btn-sm btn-info btn-flat pull-left">Volver al tablero</a>
              <a href="{$tsConfig.url}/?page=config" class="btn btn-sm btn-default btn-flat pull-right">Configurar metodo de pago</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
{$pageshtml}
        </div>
        <!-- /.col -->
<div class="col-md-5">


<div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Dominios registrados</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Dominio</th>
                    <th>Generado</th>
                    <th>Conversiones</th>
                  </tr>
                  </thead>
                  <tbody>
                    {foreach from=$datadomains item=d}<tr>
                    <td>{$d.domainname}</td>
                    <td>{$d.dinero} USD</td>
                    <td>{$d.conversiones}</td>
                  </tr>{/foreach}
                </tbody>
                </table>
              </div>
              
            </div>
            
            
          </div>


</div>
      </div>
      <!-- /.row -->
      </section>
    <!-- /.content -->
	<!-- Modal -->
<div class="modal fade" id="AreaCreate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Crear una nueva Area</h4>
      </div>
      <div class="modal-body dataadvertisecreate">
        <div id="errorpreadver" class="alert alert-info" style="display:none;">.</div><br>
       <div class="form-group">
<div class="form-group">
<label for="basic-url" id="basic-addon5">Tipo del widget</label>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon5">Escoge el tipo</span>
  <select name="tipo" onchange="toptic.tipook($(this).val())" class="form-control" id="basic-url" aria-describedby="basic-addon3">
    <option>Selecciona un tipo</option>
    <option value="1">Redirecci&oacute;n</option>
    <option value="2">Popups</option>
    <option value="3">Popunder</option>
    <option value="4">Baners</option>
    <option value="6">Baner ft.Babanta</option>
  </select>
</div>
</div>
<div id="banners_tam" style="display:none;">
<div class="form-group">
<label for="basic-url">Tamaño del baner</label>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">Escoge el tamaño</span>
  <select name="tipo_red" class="form-control" id="ban_t" aria-describedby="basic-addon3">
    <option>Selecciona un tamaño</option>
    <option value="1">300x250</option>
    <option value="2">336 x 280</option>
    <option value="3">728 x 90</option>
    <option value="4">300 x 600</option>
    <option value="5">320 x 100</option>
    <option value="6">160 x 600</option>
  </select>
</div></div>
</div>
<div class="redirecc" style="display:none;">
<div class="form-group">
<label for="basic-url">Tipo de redirecci&oacute;n</label>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon3">Escoge el tipo</span>
  <select name="tipo_red" onchange="toptic.tiporead($(this).val())" class="form-control" id="tipo_redirecc" aria-describedby="basic-addon3">
    <option>Selecciona un tipo</option>
    <option value="1">Intestitial mobile</option>
    <option value="2">Interstitial Lightbox</option>
    <option value="3">Layer mobile</option>
    <option value="4">Interstitial basado en comportamiento</option>
    <option value="5">Interstitial mixto basado en comportamiento</option>
    <option value="6">Interstitial redirect</option>
    <option value="7">Interstitial social adulto</option>
    <option value="8">General: Movil y PC</option>
  </select>
</div>
<span style="margin:0 0 6px 0;"><span class="tipodesc">Seleccion aun tipo para leer aca la descripción</span>.</span><br>
</div>
</div>
<div class="form-group">
<label for="basic-url">Nombre del Area</label>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon4">Nombre: </span>
  <input type="text" name="nambre" class="form-control" id="basic-url" aria-describedby="basic-addon4">
</div>
</div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" onclick="toptic.create()">Crear Area</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">{literal}
var toptic = {
  create: function(){
var params = $('.dataadvertisecreate input[name], .dataadvertisecreate select[name], .dataadvertisecreate textarea[name]');
mydialog.loading('Guardando...');
$.ajax({
type: 'POST',
url: global_data.url+'/ajax/babanta-widget.php',
data: $.param(params),
beforeSend: function(){ mydialog.end_loading(); },
success: function(h){
switch(h.charAt(0)){
case 0: case '0': default:
$('#errorpreadver').fadeIn(250).html(h.substring(3));
break;
case 1: case '1':
$('#errorpreadver').fadeIn(250).html('Cambios Guardados correctamente, Actualizando...');
$('#AreaCreate').modal('hide');
location.reload(true);
break;
}
},
error: function(){ mydialog.error_500("toptic.create()"); }
});
  },
  defread:function(r){
    $('.tipodesc').html(r);
  },
  tipook: function(tw){
    if(tw == 1){
      $('.redirecc').show();
$('#ban_t').attr('disabled', 'disabled').removeAttr('name');
$('#tipo_redirecc').removeAttr('disabled').attr('name','tipo_red');
  }else if(tw == 4){
      $('.redirecc').hide();
      $('#tipo_redirecc').attr('disabled', 'disabled').removeAttr('name');
      $('#banners_tam').show();
     $('#ban_t').removeAttr('disabled').attr('name','tipo_red');
    }else{
      $('.redirecc').hide();
    }
  },
  tiporead: function(t){
    if(t == 1){
      toptic.defread(' en wifi muestra campañas con prelanding y en 3g muestra un iframe de la campaña directamente sin hacer redirección');
    }else if(t == 2){
      toptic.defread('SIEMPRE muestra el iframe, incluso en wifi');
    }else if(t == 3){
      toptic.defread('muestra prelanding');
    }else if(t == 4){
      toptic.defread('En wifi no muestra nada, en 3g redirige');
    }else if(t == 5){
      toptic.defread('En wifi muestra un layer mobile, en 3g redirige');
    }else if(t == 6){
      toptic.defread('funciona casi igual que el redirect pero permite retroceder');
    }else if(t == 7){
      toptic.defread('Muestra una prelanding que redirige al hacer click');
    }else{
      toptic.defread('Seleccion aun tipo para leer aca la descripción.');
    }
  },
  loadwidget:function(h,kr){
mydialog.loading('Cargando area...');
$.post(global_data.url+'/ajax/babanta-loadwidget.php', {'p':h,'kr':kr}, function(r){
  mydialog.end_loading();
mydialog.show();
mydialog.title('Código WIDG#'+h);
mydialog.body(r);
mydialog.buttons(true, true, 'Guardar', 'toptic.savewidget('+h+')', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
    });
  },
savewidget:function(h){
mydialog.loading('Guardando...');
$.post(global_data.url+'/ajax/babanta-savewidget.php', {'p':$('#categoria'+h).val(),'i':h}, function(r){
  mydialog.end_loading();
var options =  { 
content: r, 
style: "snackbar", 
timeout: 4000 
} 
$.snackbar(options);
    });
}
}
{/literal}</script>
            </div>