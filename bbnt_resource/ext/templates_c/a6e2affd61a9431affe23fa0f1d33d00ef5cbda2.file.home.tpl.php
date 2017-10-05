<?php /* Smarty version Smarty-3.1.19, created on 2016-11-08 23:17:57
         compiled from "./bbnt_archives/temas/freenetwork/modulos/babanta_i/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10294074045822b185dbfe42-78312949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a6e2affd61a9431affe23fa0f1d33d00ef5cbda2' => 
    array (
      0 => './bbnt_archives/temas/freenetwork/modulos/babanta_i/home.tpl',
      1 => 1478666137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10294074045822b185dbfe42-78312949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tsConfig' => 0,
    'idioma' => 0,
    'ingresos' => 0,
    'estatuspagos' => 0,
    'p' => 0,
    'managerinfo' => 0,
    'referidoscount' => 0,
    'ultimopago' => 0,
    'referidoslink' => 0,
    'wuser' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5822b185ed4219_65050246',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822b185ed4219_65050246')) {function content_5822b185ed4219_65050246($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/babanta/cpm-services.babanta.net/bbnt_resource/libs/smarty/plugins/modifier.date_format.php';
?>        <div id="page-wrapper">

            <div class="container-fluid">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/tlde.css">
<section class="content-header">
      <h1>
        Tablero
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_name'];?>
</a></li>
        <li class="active"><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>Board<?php } else { ?>Tablero<?php }?></li>
      </ol>
    </section>

    
    
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->

<div style="margin: 0 0 6px;display: inline-block;position: relative;"><span>En directo</span>&nbsp; <div class="pulsa te lite"><div class="xtedos lite2 pelse"></div></div></div>
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-tasks" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Clics" alt="Clics"><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>Hits<?php } else { ?>Hits<?php }?></span>
              <span class="info-box-number"><span class="impresiones"><?php echo $_smarty_tpl->tpl_vars['ingresos']->value['impresiones'];?>
</span> <small>Hits</small></span>
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
              <span class="info-box-text" title="Por cobrar" alt="Por cobrar"><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>Receivable<?php } else { ?>Por cobrar<?php }?></span>
              <span class="info-box-number"><span class="ingresos"><?php echo $_smarty_tpl->tpl_vars['ingresos']->value['usd'];?>
</span> <small>USD</small></span>
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
              <span class="info-box-number"><span class="CPM"><?php echo $_smarty_tpl->tpl_vars['ingresos']->value['CPM'];?>
</span> <small style="font-size:11px;"><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>General cost per thousand impressions<?php } else { ?>Costo por mil impresiones general<?php }?></small></span>
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
                    <?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['estatuspagos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
                  <tr >
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_url'];?>
/int/factura/?id=<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
</a></td>
                    <td><?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']=='5') {?><b><i>$ <?php echo $_smarty_tpl->tpl_vars['p']->value['c_recaudado'];?>
 USD</i></b><?php }?>&nbsp;de&nbsp;$ <?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']==3) {?><span id="ingresosf"><?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value['c_dinero'];?>
<?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']==3) {?></span><?php }?> USD</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_date']);?>
 
                    <?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']=='2.5'&&$_smarty_tpl->tpl_vars['p']->value['p_date']) {?>
                    <i>Pagada el</i>&nbsp; <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['p_date']);?>

                    <?php }?></td>
                    <td>
<?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']==3) {?>
<span class="label label-warning">Sin revisar</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']==1) {?>
<span class="label label-danger">Pendiente de pago</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='1.5') {?>
<span class="label label-primary">Pago en proceso</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='2.5') {?>
<span class="label label-success">Pago completado</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='5') {?>
<span class="label label-info">Recaudando</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='6') {?>
<span class="label label-warning">Centavos</span>
<?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='7') {?>
<span class="label label-warning">$1 USD en Proceso</span>
<?php } else { ?>
<span class="label label-warning">Sin revisar</span>
<?php }?>
                    </td>
                    <td><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_url'];?>
/int/factura/?id=<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
" class="btn btn-success">Ver</a></td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
/?page=pages" class="btn btn-sm btn-info btn-flat pull-left">Administrar tus paginas</a>
              <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
/?page=config" class="btn btn-sm btn-default btn-flat pull-right">Configurar metodo de pago</a>
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
                        <h4>@<?php echo $_smarty_tpl->tpl_vars['managerinfo']->value['buser_nick'];?>
</h4>
                        <small style="margin: 0 0 5px 0;display: block;"><cite title="Manager <?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_name'];?>
">Manager verificado <i class="fa fa-check">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['managerinfo']->value['buser_mail'];?>

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
                            <i class="glyphicon glyphicon-envelope"></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_mailsupport'];?>

                        </p>
            </div>
            
          </div>

        <div class="info-box">
            <span class="info-box-icon" style="background-color: #B7335E;color: white;"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Por cobrar" alt="Por cobrar">$ por referidos</span>
              <span class="info-box-number"><span class="referidos"><?php echo $_smarty_tpl->tpl_vars['ingresos']->value['c_referidos'];?>
</span> <small>USD</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- Info Boxes Style 2 -->
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-users" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tus referidos</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['referidoscount']->value;?>
 <small>Referidos registrados</small></span>

              
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Ultimo pago realizado" alt="Ultimo pago realizado">Ultimo pago realizado</span>
              <span class="info-box-number"><?php echo $_smarty_tpl->tpl_vars['ultimopago']->value['total'];?>
</span>

              
                  <span class="progress-description" title="Incremento en un <?php echo $_smarty_tpl->tpl_vars['ultimopago']->value['porcent'];?>
%" alt="Incremento en un <?php echo $_smarty_tpl->tpl_vars['ultimopago']->value['porcent'];?>
%">
                    Incremento en un <span><?php echo $_smarty_tpl->tpl_vars['ultimopago']->value['porcent'];?>
</span>%
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
<!---->
<div class="col-md-12"> <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>Link referral<?php } else { ?>Link de Referidos<?php }?></h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
<small><?php if ($_smarty_tpl->tpl_vars['idioma']->value=='en') {?>Referrals from <?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_name'];?>
 work so that every person who registers link from you win <b>5%</b> of what your referrals.<?php } else { ?>Los referidos de <?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_name'];?>
 funcionan de tal manera que cada persona que se registre desde tu enlace ganas <b>el 5%</b> de lo de tus referidos.<?php }?></small>
<hr>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
  <input type="text" class="form-control" value="<?php if ($_smarty_tpl->tpl_vars['referidoslink']->value) {?><?php echo $_smarty_tpl->tpl_vars['referidoslink']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_url'];?>
?a=<?php echo $_smarty_tpl->tpl_vars['wuser']->value->uid;?>
<?php }?>" aria-describedby="basic-addon1">
</div>
            </div>
            <!-- /.box-body -->
          </div></div>
<!---->
          
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
               
                     
<li class="item">
                  <div class="product-img" style="display: none;">
                    <img src="dist/img/default-50x50.gif" alt="Product Image">
                  </div>
                  <div class="product-info" style="margin: 0;">
                    <a class="product-title" style="
    color: #333;
">Pagos semanales en <?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['net_name'];?>
<span class="label label-warning pull-right">Minimo $100 USD</span></a>
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

<script type="text/javascript">
infouser();
$(function(){
    infouser();
})
function val(dat, val){
$(dat).html(val);
}
<?php if (!$_smarty_tpl->tpl_vars['wuser']->value->advertiser) {?>function webmasRang(val){
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
}<?php }?>
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
</script>
            </div><?php }} ?>
