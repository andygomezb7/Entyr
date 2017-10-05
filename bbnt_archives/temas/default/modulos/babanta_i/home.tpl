        <div id="page-wrapper">

            <div class="container-fluid">
<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
<section class="content-header">
      <h1>
        Tablero
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">{if $idioma == 'en'}Board{else}Tablero{/if}</li>
      </ol>
    </section>

    {* <div class="alert alert-info" style="margin-top:18px;">Ahora el CPM es individual y variable, dependiendo de las conversiones que consigas tu CPM puede subir (varia entre los paises de las conversiones)</div> *}
    {* <div class="alert alert-info" style="margin-top:18px;">Habilitamos un sistema de alertas, para que cualquier problema que tu cuenta tenga se te informara a trav&eacute;s del panel o hacia tu correo personal :)</div> 
    <div class="alert alert-warning"><i>BETA</i>: <b>Nuevo!</b> Panel de referidos, podras llevar al contabilidad de tus referidos y poder manejarlos mejor, encuentra la opci&oacute;n en el menu</div> *}
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
{*<div style="margin: 0 0 6px;display: inline-block;">{if $idioma == 'en'}Last update{else}Ultima actualizaci&oacute;n{/if}: <div class="label label-info actualizacion">{$ingresos.actualizacion}</div></div> *}
<div style="margin: 0 0 6px;display: inline-block;position: relative;"><span>En directo</span>&nbsp; <div class="pulsa te lite"><div class="xtedos lite2 pelse"></div></div></div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tasks" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Clics" alt="Clics">{if $idioma == 'en'}Hits{else}Hits{/if}</span>
              <span class="info-box-number"><span class="impresiones">{$ingresos.impresiones}</span> <small>Hits</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Por cobrar" alt="Por cobrar">{if $idioma == 'en'}Receivable{else}Por cobrar{/if}</span>
              <span class="info-box-number"><span class="ingresos">{$ingresos.usd}</span> <small>USD</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-industry" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Referidos" alt="Referidos">CPM General</span>
              <span class="info-box-number"><span class="CPM">{$ingresos.CPM}</span> <small style="font-size:11px;">{if $idioma == 'en'}General cost per thousand impressions{else}Costo por mil impresiones general{/if}</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
       
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Facturación del sistema</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>NO.</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    {foreach from=$estatuspagos item=p}
                  <tr {*onclick="location.href='{$tsConfig.net_url}/int/factura/?id={$p.cid}'" style="cursor:pointer;" alt="{$tsConfig.net_url}/int/factura/?id={$p.cid}" title="{$tsConfig.net_url}/int/factura/?id={$p.cid}"*}>
                    <td><a href="{$tsConfig.net_url}/int/factura/?id={$p.cid}">{$p.cid}</a></td>
                    <td>{if $p.c_type == '5'}<b><i>$ {$p.c_recaudado} USD</i></b>{/if}&nbsp;de&nbsp;$ {if $p.c_type == 3}<span id="ingresosf">{/if}{$p.c_dinero}{if $p.c_type == 3}</span>{/if} USD</td>
                    <td>{$p.c_date|date_format} 
                    {if $p.c_type == '2.5' && $p.p_date}
                    <i>Pagada el</i>&nbsp; {$p.p_date|date_format}
                    {/if}</td>
                    <td>
{if $p.c_type == 3}
<span class="label label-warning">Sin revisar</span>
{elseif $p.c_type == 1}
<span class="label label-danger">Pendiente de pago</span>
{elseif $p.c_type == '1.5'}
<span class="label label-primary">Pago en proceso</span>
{elseif $p.c_type == '2.5'}
<span class="label label-success">Pago completado</span>
{elseif $p.c_type == '5'}
<span class="label label-info">Recaudando</span>
{elseif $p.c_type == '6'}
<span class="label label-warning">Centavos</span>
{elseif $p.c_type == '7'}
<span class="label label-warning">$1 USD en Proceso</span>
{else}
<span class="label label-warning">Sin revisar</span>
{/if}
                    </td>
                    <td><a href="{$tsConfig.net_url}/int/factura/?id={$p.cid}" class="btn btn-success">Ver</a></td>
                  </tr>
                  {/foreach}
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{$tsConfig.url}/?page=pages" class="btn btn-sm btn-info btn-flat pull-left">Administrar tus paginas</a>
              <a href="{$tsConfig.url}/?page=config" class="btn btn-sm btn-default btn-flat pull-right">Configurar metodo de pago</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        <div class="col-md-4">

<div class="box box-primary" style="background: #fbfafa;border: 1px solid #eee;">
            <div class="box-header with-border">
              <h3 class="box-title">Tu manager</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body"><div>
                <div class="row">
                    <div class="col-sm-10 col-md-12">
                        <h4>@{$managerinfo.buser_nick}</h4>
                        <small style="margin: 0 0 5px 0;display: block;"><cite title="Manager {$tsConfig.net_name}">Manager verificado <i class="fa fa-check">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>&nbsp;{$managerinfo.buser_mail}
                        </p> 
                    </div>
                </div>
            </div></div></div>

<div class="box box-primary" style="background: #fbfafa;border: 1px solid #eee;">
            <div class="box-header with-border">
              <h3 class="box-title">Reportar a administración</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body">
<p style="font-size: 18px;">
                            <i class="glyphicon glyphicon-envelope"></i>&nbsp;{$tsConfig.net_mailsupport}
                        </p>
            </div>
            
          </div>

        <div class="info-box">
            <span class="info-box-icon" style="background-color: #B7335E;color: white;"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Por cobrar" alt="Por cobrar">$ por referidos</span>
              <span class="info-box-number"><span class="referidos">{$ingresos.c_referidos}</span> <small>USD</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-users" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tus referidos</span>
              <span class="info-box-number">{$referidoscount} <small>Referidos registrados</small></span>

              {* <div class="progress">
                <div class="progress-bar" style="width: 50%"></div>
              </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span> *}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Ultimo pago realizado" alt="Ultimo pago realizado">Ultimo pago realizado</span>
              <span class="info-box-number">{$ultimopago.total}</span>

              {* <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div> *}
                  <span class="progress-description" title="Incremento en un {$ultimopago.porcent}%" alt="Incremento en un {$ultimopago.porcent}%">
                    Incremento en un <span>{$ultimopago.porcent}</span>%
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
<!---->
<div class="col-md-12"> <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">{if $idioma == 'en'}Link referral{else}Link de Referidos{/if}</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<small>{if $idioma == 'en'}Referrals from {$tsConfig.net_name} work so that every person who registers link from you win <b>5%</b> of what your referrals.{else}Los referidos de {$tsConfig.net_name} funcionan de tal manera que cada persona que se registre desde tu enlace ganas <b>el 5%</b> de lo de tus referidos.{/if}</small>
<hr>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
  <input type="text" class="form-control" value="{if $referidoslink}{$referidoslink}{else}{$tsConfig.net_url}?a={$wuser->uid}{/if}" aria-describedby="basic-addon1">
</div>
            </div>
            <!-- /.box-body -->
          </div></div>
<!---->
          {* <!-- /.info-box -->
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-line-chart" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Incremento de conversiones" alt="Incremento de conversiones">Incremento de conversiones</span>
              <span class="info-box-number">{$incrconversiones.total}</span>
                  <span class="progress-description" title="Incremento en un {$incrconversiones.porcent}%" alt="Incremento en un {$incrconversiones.porcent}%">
Incremento estimado frente al mes pasado
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-tasks" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Incremento de impresiones" alt="Incremento de impresiones">Incremento de impresiones</span>
              <span class="info-box-number">{$incrimpresiones.total}</span>
                  <span class="progress-description" title="Incremento en un {$incrimpresiones.porcent}%" alt="Incremento en un {$incrimpresiones.porcent}%">
Incremento estimado frente al mes pasado
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div> *}
          <!-- /.info-box -->
                    <!-- PRODUCT LIST -->
          <div class="box box-primary" style="display:none!Important;">
            <div class="box-header with-border">
              <h3 class="box-title">Boletines recientes</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
               {* <li class="item">
                  <div class="product-img">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">Samsung TV
                      <span class="label label-warning pull-right">$1800</span></a>
                        <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span>
                  </div>
                </li>
                <!-- /.item --> *}
                     
<li class="item">
                  <div class="product-img" style="display: none;">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info" style="margin: 0;">
                    <a class="product-title" style="
    color: #333;
">Pagos semanales en {$tsConfig.net_name}<span class="label label-warning pull-right">Minimo $100 USD</span></a>
                        <span class="product-description">Ahora los pagos son enviados cada 30 de cada mes con minimo de $100 USD
</span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </section>
    <!-- /.content -->

<script type="text/javascript">{literal}
infouser();
$(function(){
    infouser();
})
function val(dat, val){
$(dat).html(val);
}
{/literal}{if !$wuser->advertiser}{literal}function webmasRang(val){
  if(val){
  $('#procesando #error').show().html('Cargando...');
  var claseal = 'info';
  $.post(global_data.url+'/ajax/babanta-webmaster.php', {'bt':$('#mydialog #webblog').val()}, function(h){
    if(h.charAt(0) != 1 || h.charAt(0) != '1'){
      claseal = 'danger';
    }else{
      claseal = 'success';
    }
    $('#procesando #error').hide()
    mydialog.alert('Ascender a Webmaster', '<div class="alert alert-'+claseal+'">'+h.substring(2)+'</div>');
  });
}else{
  mydialog.show(true);
mydialog.title('Solicitud para ascender a Webmaster');
mydialog.body('<div class="row add_page"><div class="form-group webmasterblog"><label for="webblog" class="control-label">Ingresa tu sitio web/blog</label><div class="input-group"><span class="input-group-addon" id="basic-addon1">http://</span><input type="text" class="form-control" id="webblog" name="webblog" value="" required="" title="Ingresar tu sitio web" placeholder="Ingresar tu sitio web"></div><span class="help-block"></span></div></div>');
mydialog.buttons(true, true, 'Enviar solicitud', 'webmasRang(true)', true, true, true, 'Cancelar', 'close', true, false);
mydialog.center();
}
}{/literal}{/if}{literal}
function adsbbtn(){ mydialog.loading('Guardando informaci��n');
var data = $('.adsmethod select[name=adstype]').val();
$.post(global_data.url+'/ajax/babanta-adstype.php', {'o':data}, function(h){ mydialog.end_loading();
mydialog.alert('Anuncios en tus enlaces', '<div class="alert alert-info">'+h+'</div>');
});
}
function usrjxf(h){
//$('.ganancias_panel').css({'opacity':'0.3'});
val('.ingresos', h['babantau']);
val('.impresiones', h['babantav']);
//val('.userslive', h['babantaonli']);
val('.CPM', h['babantacpmuser']);
//val('.actualizacion', h['babantaupd']);
//val('.usercps', h['babantacps']);
val('.userconver', h['babantaconver']);
val('.referidos', h['babantarefs']);
//$('.ganancias_panel').css({'opacity':'1'});
    return false;
}
{/literal}</script>
            </div>