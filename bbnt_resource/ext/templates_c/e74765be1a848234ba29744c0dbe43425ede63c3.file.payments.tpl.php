<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 21:34:38
         compiled from "./bbnt_archives/temas/default/modulos/babanta_i/payments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3362629555823eacee3d486-32753980%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e74765be1a848234ba29744c0dbe43425ede63c3' => 
    array (
      0 => './bbnt_archives/temas/default/modulos/babanta_i/payments.tpl',
      1 => 1475379121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3362629555823eacee3d486-32753980',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tsConfig' => 0,
    'userid' => 0,
    'userinfofact' => 0,
    'isuserid' => 0,
    'ingre' => 0,
    'userbanned' => 0,
    'userbanid' => 0,
    'userinfo' => 0,
    'pall' => 0,
    'p' => 0,
    'pagesfacturas' => 0,
    'facturasall' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5823eacf22b5c9_64358175',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5823eacf22b5c9_64358175')) {function content_5823eacf22b5c9_64358175($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/babanta/cpm-services.babanta.net/bbnt_resource/libs/smarty/plugins/modifier.date_format.php';
?><link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/tlde.css">
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>Administrar Facturas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Babanta</a></li>
        <li class="active">Administrador Panel</li>
      </ol>
    </section>

                <!-- /.row -->

                <div class="row">
  <center>
<?php if ($_smarty_tpl->tpl_vars['userid']->value) {?>
<a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=payments" class="btn btn-info">VOLVER A VER TODAS LAS FACTURAS</a>
<hr>
<h4>Filtros para las facturas del usuario <b><?php echo $_smarty_tpl->tpl_vars['userinfofact']->value['buser_nick'];?>
</b></h4>
<?php }?>
  <div class="btn-group" role="group" aria-label="..." style="margin-bottom:7px;">
  <button type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=payments<?php echo $_smarty_tpl->tpl_vars['isuserid']->value;?>
'" class="btn btn-default">Todas las facturas</button>
  <button type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=payments&tipo=3<?php echo $_smarty_tpl->tpl_vars['isuserid']->value;?>
'" class="btn btn-default">Facturas sin revisar</button>
  <button type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=payments&tipo=1.5<?php echo $_smarty_tpl->tpl_vars['isuserid']->value;?>
'" class="btn btn-danger">Facturas en proceso</button>
  <button type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=payments&tipo=1<?php echo $_smarty_tpl->tpl_vars['isuserid']->value;?>
'" class="btn btn-warning">Facturas pendientes</button>
  <button type="button" onclick="location.href='<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=payments&tipo=2.5<?php echo $_smarty_tpl->tpl_vars['isuserid']->value;?>
'" class="btn btn-success">Facturas pagadas</button>
  </div>
  <?php if (!$_smarty_tpl->tpl_vars['userid']->value) {?>
<form class="form-group" method="GET" action="http://babanta.net/">
<input type="hidden" name="page" value="payments" />
<div class="input-group">
  <span class="input-group-addon">Ver facturas por usuario</span>
  <input type="text" name="userid" class="form-control" placeholder="Nick o id" required/>
   <span class="input-group-btn">
        <button type="submit" class="btn btn-default" type="button">Ver ahora</button>
   </span>
</div>
</form>
<?php }?>
</center><hr>
                    <?php if ($_smarty_tpl->tpl_vars['userid']->value) {?>
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones | <a class="btn btn-info" onclick="mydialog.alert('Info extra','<?php echo $_smarty_tpl->tpl_vars['ingre']->value;?>
');">Más información</a></h3>
                            </div>
                            <div class="panel-body">
  
  <center><div class="btn-group" role="group" aria-label="...">
  <?php if ($_smarty_tpl->tpl_vars['userbanned']->value>=1) {?><div class="alert alert-danger">El usuario #<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
 esta baneado del sistema</div><?php } else { ?><button type="button" onclick="seguromadafucker(<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
)" class="btn btn-danger">Emitir Baneo</button><?php }?>
  
  <button type="button" onclick="quitarboton(<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
, <?php if ($_smarty_tpl->tpl_vars['userinfo']->value['buser_button']=='
  3') {?>1<?php } else { ?>3<?php }?>)" class="btn btn-primary"><?php if ($_smarty_tpl->tpl_vars['userinfo']->value['buser_button']=='3') {?>Quitar advertiser<?php } else { ?>Dar advertiser<?php }?></button>
<a type="button" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=admod&action=pages&pref=<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
" class="btn btn-info">P&aacute;ginas</a>
<a type="button" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=admod&action=locationsolit&pref=<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
" class="btn btn-warning">Direcciones</a>
  </div></center>
  <hr>
  <center>
<div class="btn-group" role="group" aria-label="...">
<a type="button" onclick="shake(<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
);" class="btn btn-warning">Cambiar contraseña</a>
</div>
 <div class="input-group">
      <span class="input-group-addon">
        <input type="button" class="btn btn-info" onclick="moverank(<?php echo $_smarty_tpl->tpl_vars['userbanid']->value;?>
, $('#rangoeditto').val());" value="Cambiar" />
      </span>
      <select class="form-control" aria-label="..." id="rangoeditto">
<option>Rangos</option>
<option value="1" <?php if ($_smarty_tpl->tpl_vars['userinfofact']->value['buser_rango']==1) {?>selected="selected"<?php }?>>Admin (DIOS)</option>
<option value="2" <?php if ($_smarty_tpl->tpl_vars['userinfofact']->value['buser_rango']==2) {?>selected="selected"<?php }?>>Usuario (Mortal)</option>
<option value="3" <?php if ($_smarty_tpl->tpl_vars['userinfofact']->value['buser_rango']==3) {?>selected="selected"<?php }?>>Editor (Lacayo)</option>
<option value="4" <?php if ($_smarty_tpl->tpl_vars['userinfofact']->value['buser_rango']==4) {?>selected="selected"<?php }?>>Manager (Semi DIOS)</option>
</select>
    </div>
  </center>
  <script type="text/javascript">
  function shake(userid){
  	mydialog.show();
mydialog.title('Recover pass');
mydialog.body('<div class="input-group pass_new"><span class="input-group-addon" id="basic-addon1">New pass</span><input type="text" class="form-control" name="pass_dos" placeholder="Contraseña" aria-describedby="basic-addon1"></div>');
mydialog.buttons(true, true, 'Cambiar', "shakedos("+userid+")", true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
  }
  function shakedos(userid){
  	mydialog.loading('Cambiando...');
  	   $.post(global_data.url+'/ajax/babanta-pass.php', {'userid':userid,'data':$('#mydialog .pass_new input[name=pass_dos]').val()},function(h){
        mydialog.end_loading();
        mydialog.alert('Genial!','<div class="alert alert-info">'+h+'</div>');
    });
  }
  function seguromadafucker(id){
mydialog.show();
mydialog.title('Te pregunto');
mydialog.body('¿Seguro que quieres banear a este usuario?');
mydialog.buttons(true, true, 'Awebo, s&iacute;!', "madafucker("+id+")", true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
  }
   function madafucker(id){
    $.post(global_data.url+'/ajax/babanta-ban.php', {'ob':id,'type':'2'},function(h){
        mydialog.alert('Ya se baneo','<div class="alert alert-info"><b>Do&nacute;a florinda:</b>Kiko, ya no te juntes con esa chusma!\n<br> <b>Kiko:</b> ¡Chusma, chusma, chusma! Pfff!!</div>');
    });
   }
   function quitarboton(uid, btn){
mydialog.show();
mydialog.title('Te pregunto');
mydialog.body('¿Seguro que quieres dar <b>Advertiser</b> a este usuario?');
mydialog.buttons(true, true, 'Me cae bien, sí!', "oisi("+uid+", "+btn+")", true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
   }
   function oisi(uid, btn){
    $.post(global_data.url+'/ajax/babanta-revoc.php', {'uid':uid,'bt':btn},function(h){
      var es = (h.charAt(0) == '1' || h.charAt(0) == 1) ? 'info' : 'danger';
        mydialog.alert('Listo!','<div class="alert alert-'+es+'">'+h.substring(2)+'</div>');
    });
   }
function moverank(user,rank){
	mydialog.loading('Cambiando rango...');
	$.post(global_data.url+'/ajax/babanta-moverango.php', {'userid':user,'rang':rank}, function(h){
		mydialog.end_loading();
		mydialog.alert('Cambiar rango', '<div class="alert alert-'+(h == 0 || h == '0' ? 'warning' : 'info')+'">'+h+'</div>');
	});
}
  </script>
  
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>NO.</th>
<th>Usuario</th>
<th>Estado</th>
<th>Emitido</th>
<th>Monto</th>
<th>Metodo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['pall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value['buser_nick']||$_smarty_tpl->tpl_vars['p']->value['c_user_id']) {?>
<tr <?php if ($_smarty_tpl->tpl_vars['p']->value['banned']>=1) {?>style="background:red;"<?php }?>>
<td>#<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
<button class="btn btn-info" onclick="mydialog.alert('info user:<?php echo $_smarty_tpl->tpl_vars['p']->value['c_user_id'];?>
', '<b>impresiones:</b> <?php echo $_smarty_tpl->tpl_vars['p']->value['c_impresiones'];?>
\n<br /> <b>referidos:</b> <?php echo $_smarty_tpl->tpl_vars['p']->value['c_referidos'];?>
\n<br /> <b>USER ID:</b> <?php echo $_smarty_tpl->tpl_vars['p']->value['c_user_id'];?>
\n<br /> <b>TIPO:</b> <?php echo $_smarty_tpl->tpl_vars['p']->value['c_type'];?>
\n<br /> <b>PAIS:</b> <?php echo $_smarty_tpl->tpl_vars['p']->value['c_pais'];?>
');"><i class="fa fa-plus"></i></button></td>
<td><a>
<span><?php if ($_smarty_tpl->tpl_vars['p']->value['name_original']||$_smarty_tpl->tpl_vars['p']->value['ap_original']) {?><?php echo $_smarty_tpl->tpl_vars['p']->value['name_original'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['ap_original'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['p']->value['buser_nick'];?>
<?php }?> </span></a></td>
<td>
    <?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']==3) {?>Sin revisar
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']==1) {?>Pendiente
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='1.5') {?>En proceso
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='2.5') {?>Pagado
    <?php } else { ?>Sin revisar<?php }?><b class="dsnone" style="display:none!important;">(<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['c_pais'];?>
)</b></td>
<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_date']);?>
 <?php if ($_smarty_tpl->tpl_vars['p']->value['p_date']) {?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['p_date']);?>
<?php } else { ?>Hasta la fecha actual(<?php echo smarty_modifier_date_format(time());?>
)<?php }?> &nbsp;&nbsp;Act. <i><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_update']);?>
</i></td>
<td><a><?php echo $_smarty_tpl->tpl_vars['p']->value['c_dinero'];?>
 USD</a></td>
<td><a class="btn btn-warning" onclick="mydialog.alert('Información de facturación', '<b>Monto: </b><i><?php echo $_smarty_tpl->tpl_vars['p']->value['c_dinero'];?>
 USD</i>\n<br /><b>Usuario: </b><i><?php echo $_smarty_tpl->tpl_vars['p']->value['buser_nick'];?>
</i>\n<br /><b>Datos: </b><i><?php echo $_smarty_tpl->tpl_vars['p']->value['partner_pago'];?>
</i>\n<br><b>Tipo de pago: </b><i><?php echo $_smarty_tpl->tpl_vars['p']->value['partner_metodo'];?>
</i>\n<br /><br /><pre>BABANTA NETWORK\n•  Nombre de la transacción: Factura No.<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
\n•  Factura No.<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
\n•  Usuario de la cuenta: <?php echo $_smarty_tpl->tpl_vars['p']->value['buser_nick'];?>
\n•  Pago enviado a: <?php echo $_smarty_tpl->tpl_vars['p']->value['partner_pago'];?>
\n•  Fecha de cancelación de factura: <?php echo smarty_modifier_date_format(time(),"%e de %B de %Y");?>
\n•  Factura emitida el: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_date'],"%e de %B de %Y");?>
\n \n* ----------------------------------- *\n Babanta Network.\n  Contactar a: babanta.net@gmail.com\n</pre>');"><i class="fa fa-plus"></i></a></td>
<td>
<div class="btn-group" role="group" aria-label="...">
<button class="btn btn-info" onclick="postix.pago(<?php echo $_smarty_tpl->tpl_vars['p']->value['buser_id'];?>
, <?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
, $('.tipo<?php echo $_smarty_tpl->tpl_vars['p']->value['c_date'];?>
').val())"><i class="fa fa-send"></i></button>
<select class="tipo<?php echo $_smarty_tpl->tpl_vars['p']->value['c_date'];?>
" class="form-control">
<option>Acción</option>
<option value="3">Sin revisar</option>
<option value="1.5">En proceso</option>
<option value="2.5">Pagar</option>
<option value="5">Recaudando</option>
<option value="1">Pendiente</option>
</select>
</div>
</td>
</tr>
<?php }?><?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                <?php echo $_smarty_tpl->tpl_vars['pagesfacturas']->value;?>

                            </div>
                        </div>
                    </div>
                </div>
                    <?php } else { ?>
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Factura No.</th>
<th>Usuario</th>
<th>Estado</th>
<th>Fecha</th>
<th>ULT. Act</th>
<th>Cantidad en dolares</th>
<th>Funciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['facturasall']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['p']->value['buser_nick']||$_smarty_tpl->tpl_vars['p']->value['c_user_id']) {?>
<tr <?php if ($_smarty_tpl->tpl_vars['p']->value['banned']>=1) {?>style="background:red;"<?php }?>>
<td><?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
</td>
<td><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=payments&userid=<?php echo $_smarty_tpl->tpl_vars['p']->value['buser_id'];?>
">
<span><?php if ($_smarty_tpl->tpl_vars['p']->value['name_original']||$_smarty_tpl->tpl_vars['p']->value['ap_original']) {?><?php echo $_smarty_tpl->tpl_vars['p']->value['name_original'];?>
 <?php echo $_smarty_tpl->tpl_vars['p']->value['ap_original'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['p']->value['buser_nick'];?>
<?php }?> (<?php echo $_smarty_tpl->tpl_vars['p']->value['c_user_id'];?>
)</span></a></td>
<td><?php if ($_smarty_tpl->tpl_vars['p']->value['c_type']==3) {?>Sin revisar
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']==1) {?>Pendiente
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='1.5') {?>En proceso
    <?php } elseif ($_smarty_tpl->tpl_vars['p']->value['c_type']=='2.5') {?>Pagado
    <?php } else { ?>Sin revisar<?php }?><b class="dsnone" style="display:none!important;">(<?php echo $_smarty_tpl->tpl_vars['p']->value['cid'];?>
-<?php echo $_smarty_tpl->tpl_vars['p']->value['c_pais'];?>
)</b></td>
<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_date']);?>
 <?php if ($_smarty_tpl->tpl_vars['p']->value['p_date']) {?><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['p_date']);?>
<?php } else { ?>Hasta la fecha actual(<?php echo smarty_modifier_date_format(time());?>
)<?php }?></td>
<td title="<?php echo $_smarty_tpl->tpl_vars['p']->value['c_update'];?>
"><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['p']->value['c_update']);?>
</td>
<td><font color="black" title="Dinero: <?php echo $_smarty_tpl->tpl_vars['p']->value['c_dinero'];?>
 & Referidos: <?php echo $_smarty_tpl->tpl_vars['p']->value['c_referidos'];?>
 & Pago total: <?php echo $_smarty_tpl->tpl_vars['p']->value['pagototal'];?>
">$ <?php echo $_smarty_tpl->tpl_vars['p']->value['c_dinero']+$_smarty_tpl->tpl_vars['p']->value['c_referidos'];?>
 USD</font></td>
<td><a class="btn btn-warning" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=payments&userid=<?php echo $_smarty_tpl->tpl_vars['p']->value['buser_id'];?>
">Ver</a></b></td>
</tr>
<?php }?><?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                     <hr>
                                    <?php echo $_smarty_tpl->tpl_vars['pagesfacturas']->value;?>

                                
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>

                </div>

            </div>
            <script type="text/javascript">
            var postix = {
                pago: function(user, cid, tipo){
                    mydialog.loading('Emitiendo pago.');
                    $.post(global_data.url+'/ajax/babanta-pagob.php?time=<?php echo time();?>
', 
                        {'userid':user,'cid':cid,'t':tipo}, function (h){
                       mydialog.end_loading();
                        mydialog.alert('Pago', '<i>'+tipo+'</i>:<div class="alert alert-info">'+h+'</div>');
                    });
                }
            }
            </script><?php }} ?>
