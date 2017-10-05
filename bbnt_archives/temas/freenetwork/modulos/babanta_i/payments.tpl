<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
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
{if $userid}
<a href="{$tsConfig.partner_url}/?page=payments" class="btn btn-info">VOLVER A VER TODAS LAS FACTURAS</a>
<hr>
<h4>Filtros para las facturas del usuario <b>{$userinfofact.buser_nick}</b></h4>
{/if}
  <div class="btn-group" role="group" aria-label="..." style="margin-bottom:7px;">
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page=payments{$isuserid}'" class="btn btn-default">Todas las facturas</button>
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page=payments&tipo=3{$isuserid}'" class="btn btn-default">Facturas sin revisar</button>
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page=payments&tipo=1.5{$isuserid}'" class="btn btn-danger">Facturas en proceso</button>
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page=payments&tipo=1{$isuserid}'" class="btn btn-warning">Facturas pendientes</button>
  <button type="button" onclick="location.href='{$tsConfig.partner_url}?page=payments&tipo=2.5{$isuserid}'" class="btn btn-success">Facturas pagadas</button>
  </div>
  {if !$userid}
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
{/if}
</center><hr>
                    {if $userid}
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones | <a class="btn btn-info" onclick="mydialog.alert('Info extra','{$ingre}');">Más información</a></h3>
                            </div>
                            <div class="panel-body">
  {* FUNCINOES DE USUARIOS *}
  <center><div class="btn-group" role="group" aria-label="...">
  {if $userbanned >= 1}<div class="alert alert-danger">El usuario #{$userbanid} esta baneado del sistema</div>{else}<button type="button" onclick="seguromadafucker({$userbanid})" class="btn btn-danger">Emitir Baneo</button>{/if}
  {* <button type="button" onclick="quitarboton({$userbanid}, {if $userinfo.buser_button == '2'}1{else}2{/if})" class="btn btn-primary">{if $userinfo.buser_button == '2'}Regresar{else}Quitar{/if} botón</button> *}
  <button type="button" onclick="quitarboton({$userbanid}, {if $userinfo.buser_button == '
  3'}1{else}3{/if})" class="btn btn-primary">{if $userinfo.buser_button == '3'}Quitar advertiser{else}Dar advertiser{/if}</button>
<a type="button" href="{$tsConfig.partner_url}?page=admod&action=pages&pref={$userbanid}" class="btn btn-info">P&aacute;ginas</a>
<a type="button" href="{$tsConfig.partner_url}?page=admod&action=locationsolit&pref={$userbanid}" class="btn btn-warning">Direcciones</a>
  </div></center>
  <hr>
  <center>
<div class="btn-group" role="group" aria-label="...">
<a type="button" onclick="shake({$userbanid});" class="btn btn-warning">Cambiar contraseña</a>
</div>
 <div class="input-group">
      <span class="input-group-addon">
        <input type="button" class="btn btn-info" onclick="moverank({$userbanid}, $('#rangoeditto').val());" value="Cambiar" />
      </span>
      <select class="form-control" aria-label="..." id="rangoeditto">
<option>Rangos</option>
<option value="1" {if $userinfofact.buser_rango == 1}selected="selected"{/if}>Admin (DIOS)</option>
<option value="2" {if $userinfofact.buser_rango == 2}selected="selected"{/if}>Usuario (Mortal)</option>
<option value="3" {if $userinfofact.buser_rango == 3}selected="selected"{/if}>Editor (Lacayo)</option>
<option value="4" {if $userinfofact.buser_rango == 4}selected="selected"{/if}>Manager (Semi DIOS)</option>
</select>
    </div>
  </center>
  <script type="text/javascript">{literal}
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
  {/literal}</script>
  {* END FUNCIONS DE USUARIOS *}
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
{foreach from=$pall item=p}{if $p.buser_nick || $p.c_user_id}
<tr {if $p.banned >= 1}style="background:red;"{/if}>
<td>#{$p.cid}<button class="btn btn-info" onclick="mydialog.alert('info user:{$p.c_user_id}', '<b>impresiones:</b> {$p.c_impresiones}\n<br /> <b>referidos:</b> {$p.c_referidos}\n<br /> <b>USER ID:</b> {$p.c_user_id}\n<br /> <b>TIPO:</b> {$p.c_type}\n<br /> <b>PAIS:</b> {$p.c_pais}');"><i class="fa fa-plus"></i></button></td>
<td><a>
<span>{if $p.name_original || $p.ap_original}{$p.name_original} {$p.ap_original}{else}{$p.buser_nick}{/if} </span></a></td>
<td>
    {if $p.c_type == 3}Sin revisar
    {elseif $p.c_type == 1}Pendiente
    {elseif $p.c_type == '1.5'}En proceso
    {elseif $p.c_type == '2.5'}Pagado
    {else}Sin revisar{/if}<b class="dsnone" style="display:none!important;">({$p.cid}-{$p.c_pais})</b></td>
<td>{$p.c_date|date_format} {if $p.p_date}{$p.p_date|date_format}{else}Hasta la fecha actual({$smarty.now|date_format}){/if} &nbsp;&nbsp;Act. <i>{$p.c_update|date_format}</i></td>
<td><a>{$p.c_dinero} USD</a></td>
<td><a class="btn btn-warning" onclick="mydialog.alert('Información de facturación', '<b>Monto: </b><i>{$p.c_dinero} USD</i>\n<br /><b>Usuario: </b><i>{$p.buser_nick}</i>\n<br /><b>Datos: </b><i>{$p.partner_pago}</i>\n<br><b>Tipo de pago: </b><i>{$p.partner_metodo}</i>\n<br /><br /><pre>BABANTA NETWORK\n•  Nombre de la transacción: Factura No.{$p.cid}\n•  Factura No.{$p.cid}\n•  Usuario de la cuenta: {$p.buser_nick}\n•  Pago enviado a: {$p.partner_pago}\n•  Fecha de cancelación de factura: {$smarty.now|date_format:"%e de %B de %Y"}\n•  Factura emitida el: {$p.c_date|date_format:"%e de %B de %Y"}\n \n* ----------------------------------- *\n Babanta Network.\n  Contactar a: babanta.net@gmail.com\n</pre>');"><i class="fa fa-plus"></i></a></td>
<td>
<div class="btn-group" role="group" aria-label="...">
<button class="btn btn-info" onclick="postix.pago({$p.buser_id}, {$p.cid}, $('.tipo{$p.c_date}').val())"><i class="fa fa-send"></i></button>
<select class="tipo{$p.c_date}" class="form-control">
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
{/if}{/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                                {$pagesfacturas}
                            </div>
                        </div>
                    </div>
                </div>
                    {else}
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
{foreach from=$facturasall item=p}{if $p.buser_nick || $p.c_user_id}
<tr {if $p.banned >= 1}style="background:red;"{/if}>
<td>{$p.cid}</td>
<td><a href="{$tsConfig.partner_url}/?page=payments&userid={$p.buser_id}">
<span>{if $p.name_original || $p.ap_original}{$p.name_original} {$p.ap_original}{else}{$p.buser_nick}{/if} ({$p.c_user_id})</span></a></td>
<td>{if $p.c_type == 3}Sin revisar
    {elseif $p.c_type == 1}Pendiente
    {elseif $p.c_type == '1.5'}En proceso
    {elseif $p.c_type == '2.5'}Pagado
    {else}Sin revisar{/if}<b class="dsnone" style="display:none!important;">({$p.cid}-{$p.c_pais})</b></td>
<td>{$p.c_date|date_format} {if $p.p_date}{$p.p_date|date_format}{else}Hasta la fecha actual({$smarty.now|date_format}){/if}</td>
<td title="{$p.c_update}">{$p.c_update|date_format}</td>
<td><font color="black" title="Dinero: {$p.c_dinero} & Referidos: {$p.c_referidos} & Pago total: {$p.pagototal}">$ {$p.c_dinero+$p.c_referidos} USD</font></td>
<td><a class="btn btn-warning" href="{$tsConfig.partner_url}/?page=payments&userid={$p.buser_id}">Ver</a></b></td>
</tr>
{/if}{/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                     <hr>
                                    {$pagesfacturas}
                                {* <h3>Total: <b>{$dineroall}</b></h3> *}
                            </div>
                        </div>
                    </div>
                </div>
                {/if}

                </div>

            </div>
            <script type="text/javascript">{literal}
            var postix = {
                pago: function(user, cid, tipo){
                    mydialog.loading('Emitiendo pago.');
                    $.post(global_data.url+'/ajax/babanta-pagob.php?time={/literal}{$smarty.now}{literal}', 
                        {'userid':user,'cid':cid,'t':tipo}, function (h){
                       mydialog.end_loading();
                        mydialog.alert('Pago', '<i>'+tipo+'</i>:<div class="alert alert-info">'+h+'</div>');
                    });
                }
            }
            {/literal}</script>