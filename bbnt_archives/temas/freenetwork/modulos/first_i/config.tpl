        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Configuración
                            <small>Configura tu cuenta</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-wrench"></i> Configuración
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
        <fieldset class="edt_cuenta">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label" style="color:gray;">Metodo de pago</label>
      <div class="col-md-10">
      <select class="form-control" name="metodo">
        <option>Seleccina tu metodo de pago</option>
        <option value="1" {if $wuser->info.partner_metodo == 1}selected="selected"{/if}>Paypal</option>
      </select>
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Información de pago</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="valor" value="{$wuser->info.partner_pago}" aria-label="..." placeholder="Mi categoria">
      </div></div>
      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button onclick="cuentapostix.set()" class="btn btn-primary">Guardar info</button>
      </div>
      </div>
      </fieldset>
                </div>
                <script type="text/javascript">{literal}
                var cuentapostix = {
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
                    set: function (){
                        cuentapostix.ajax('babanta-cuenta', '.edt_cuenta');
                    },
                }
                {/literal}</script>
            </div>