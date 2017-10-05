<?php /* Smarty version Smarty-3.1.19, created on 2016-11-08 22:54:17
         compiled from "./bbnt_archives/temas/freenetwork/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16764592605822abf93dbaa0-66835528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c8fed60ec85979710173d90aa175946c0543875d' => 
    array (
      0 => './bbnt_archives/temas/freenetwork/home.tpl',
      1 => 1478666137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16764592605822abf93dbaa0-66835528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wuser' => 0,
    'tsConfig' => 0,
    'thispage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5822abf9677e34_66990212',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822abf9677e34_66990212')) {function content_5822abf9677e34_66990212($_smarty_tpl) {?>    <?php if (!$_smarty_tpl->tpl_vars['wuser']->value->uid) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/unlogged.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['wuser']->value->uid&&($_smarty_tpl->tpl_vars['wuser']->value->info['buser_verified']==1||$_smarty_tpl->tpl_vars['wuser']->value->info['buser_verified']=='1')) {?>
<?php echo $_smarty_tpl->getSubTemplate ('includes/main_header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->uid) {?><link href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/sb-admin.css" rel="stylesheet">
    <link href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/morris.css" rel="stylesheet"><?php }?>
    <link href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/fontawesome/font-awesome.min.css" rel="stylesheet" type="text/css">
     <div id="wrapper" <?php if ($_smarty_tpl->tpl_vars['wuser']->value->uid&&$_smarty_tpl->tpl_vars['wuser']->value->info['buser_verified']!=1) {?>style="padding:0!important;"<?php }?>>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/navigate.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <!---->
<style type="text/css">
.form-group{overflow:hidden!important;}
</style>

<?php if ((!$_smarty_tpl->tpl_vars['wuser']->value->info['buser_name']||!$_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_1']||!$_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_2']||!$_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_3']||!$_smarty_tpl->tpl_vars['wuser']->value->info['buser_codepostal']||!$_smarty_tpl->tpl_vars['wuser']->value->info['partner_pago']||!$_smarty_tpl->tpl_vars['wuser']->value->info['partner_metodo']||$_smarty_tpl->tpl_vars['wuser']->value->info['buser_data_fact']>3)&&$_smarty_tpl->tpl_vars['thispage']->value!='config') {?>
<div class="modal fade" id="modalfacturacion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Rellena tu informaci&oacute;n de facturaci&oacute;n</h4>
      </div>
      <div class="modal-body edt_cuenta">
   <?php if ($_smarty_tpl->tpl_vars['wuser']->value->info['buser_data_fact']>2) {?>
    <div class="alert alert-warning"><b>Hemos revisado tu dirección</b>: la guardamos como <i><?php if ($_smarty_tpl->tpl_vars['wuser']->value->info['buser_data_fact']==3) {?>Aprobada<?php } elseif ($_smarty_tpl->tpl_vars['wuser']->value->info['buser_data_fact']==4) {?>Rechazada<?php } elseif ($_smarty_tpl->tpl_vars['wuser']->value->info['buser_data_fact']==5) {?>Requiere cambios<?php }?></i>.<br>
    <b>Comentarios de un administrador:</b> <?php echo $_smarty_tpl->tpl_vars['wuser']->value->facturacion['comentarios'];?>
</div>
    <hr />
    <?php }?>
<div class="panel panel-info" style="overflow: hidden;padding: 3px 17px;">
<div class="panel-body">
<br />
<div class="form-group">
 <div class="form-group label-floating">
    <label for="i5" class="control-label">Nombre completo</label>
    <input type="text" name="namepart" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
" class="form-control" id="i5">
    <span class="help-block">Nombre particular completo <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Dirección</label>
    <input type="text" name="dirpart" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_1'];?>
" class="form-control" id="i5">
    <span class="help-block">Dirección Particular <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Ciudad</label>
    <input type="text" name="ciupart" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_2'];?>
" class="form-control" id="i5">
    <span class="help-block">Ciudad de residencia <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Estado / Provincia</label>
    <input type="text" name="stapart" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_date_3'];?>
" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Codigo postal</label>
    <input type="text" name="codpart" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_codepostal'];?>
" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

        <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label" style="color:gray;">Metodo de pago</label>
      <div class="col-md-10">
      <select class="form-control" name="metodo" onchange="nameok($(this).val())">
        <option value="1" <?php if ($_smarty_tpl->tpl_vars['wuser']->value->info['partner_metodo']==1) {?>selected="selected"<?php }?>>Paypal</option>
      </select>
      </div></div>
      <div class="form-group" style="clear:both!important;">
      <label for="inputEmail" class="col-md-2 control-label">Correo de PayPal</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="valor" value="<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['partner_pago'];?>
" aria-label="..." placeholder="ej: mi_correo@hotmail.com">
      </div></div>

</div>

</div>
  </div>

</div>
      <div class="modal-footer">
        <button type="button" onclick="cuentapostix.set()" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
               <script type="text/javascript">
               $('#modalfacturacion').modal();
eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('7 p(i){c(i==1){5.8(\'q x w t u v y A z.\')}}e j={3:7(3,4){5.s(\'B l...\');e d=$(4+\' m[9],\'+4+\' r[9], \'+4+\' n[9]\');$.3({b:o.b+\'/3/\'+3+\'.F\',P:\'O\',N:$.Q(d),C:7(h){5.T();c(h.S(0)==0){5.8(\'a\',\'<6 4="g" f="L">\'+h.k(2)+\'</6>\')}M{5.8(\'a\',\'<6 4="g" f="E">\'+h.k(2)+\'</6>\');D.G(H)}}})},K:7(){j.3(\'J-I\',\'.R\')},}',56,56,'|||ajax|id|mydialog|div|function|alert|name|Aviso|url|if|params|var|class|error_flat||val|cuentapostix|substring|datos|input|textarea|global_data|nameok|Escribe|select|loading|electronico|de|Paypal|correo|tu|en|campo|el|Guardando|success|location|blue_flat|php|reload|true|cuenta|babanta|set|red_flat|else|data|POST|type|param|edt_cuenta|charAt|end_loading'.split('|'),0,{}))
                </script>
<?php }?>

    <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='noticias') {?>
   <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/noticias.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='charts') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/charts.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

     <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='share') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/noticiasshare.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='config') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/config.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='pages') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/pages.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='estadisticas') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/estadisticas.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='soporte') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/soporte.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='ranking') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/ranking.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='editor'&&($_smarty_tpl->tpl_vars['wuser']->value->admod||$_smarty_tpl->tpl_vars['wuser']->value->user_editor)) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/editor.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='manager'&&($_smarty_tpl->tpl_vars['wuser']->value->admod||$_smarty_tpl->tpl_vars['wuser']->value->user_manager)) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/manager.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='admod'&&$_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/admod.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='payments'&&$_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/payments.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='publisher') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/publishers.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='advertiser'&&($_smarty_tpl->tpl_vars['wuser']->value->admod||$_smarty_tpl->tpl_vars['wuser']->value->advertiser)) {?>
    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->advertiserpet) {?>
    <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Esperando Confirmación</h1>
        <p>Esperando la confirmación de un administrador para monetizar tu blog.</p>
      </div>
    </div>
    <?php } else { ?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/advertiser.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
    <?php } else { ?>
    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->advertiser&&$_smarty_tpl->tpl_vars['wuser']->value->advertiserload) {?>
     <div class="jumbotron">
      <div class="container">
        <h1 class="display-3">Esperando Confirmación</h1>
        <p>Esperando la confirmación de un administrador para monetizar tu blog.</p>
      </div>
    </div>
    <?php } elseif ($_smarty_tpl->tpl_vars['wuser']->value->advertiser&&$_smarty_tpl->tpl_vars['wuser']->value->advertisercheck) {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/advertiser.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php } elseif ($_smarty_tpl->tpl_vars['thispage']->value=='red') {?>
    <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/redbabanta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

     <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate ('modulos/babanta_i/home.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?>
    <?php }?>
    <!---->
<?php } else { ?>
<center>
<h1>Tu cuenta aun no esta verificada</h1><br />
<h4>Para más info: <a href="mailito:cpm_verificaciones@babanta.net">cpm_verificaciones@babanta.net</a></h4><br />
<a onclick="salir()" href="javascript:void(0)" class="btn btn-danger"><i class="fa fa-fw fa-power-off"></i> Cerrar sesi&oacute;n</a>
</center>
    <?php }?>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->uid) {?><script src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/raphael.min.js"></script>

<script type="text/javascript">
            var time_notica=5000;
            var pixel_noticia=30;
            var count_noticia=1;
            var procesar_noticia=true;
            $( "#news" ).mouseover(function() {
                procesar_noticia=false;
            });
            $( "#news" ).mouseover(function() {
                procesar_noticia=false;
            }).mouseout(function() {
                procesar_noticia=true;
            });
            function zeropadder(n) {
              return (parseInt(n,10) < 10 ? '0' : '')+n;
            }
            function updateTime(){
              var timeNow= new Date(),
              hh = timeNow.getHours(),
              mm = timeNow.getMinutes(),
              ss = timeNow.getSeconds(),
              formatAMPM = (hh >= 12?'PM':'AM');
              hh = hh % 12 || 12;
              currentTime.innerHTML = hh + ":" + zeropadder(mm) + ":" + zeropadder(ss) + " " + formatAMPM;
              setTimeout(updateTime,1000);
            }
            function noticiones(count){
                count--;
                setInterval(function(){
                    if(procesar_noticia){
                        $('#news').animate({top: '-'+pixel_noticia+'px'});
                        if (count_noticia<count){
                            pixel_noticia=pixel_noticia+30;
                            count_noticia++;
                        }else{
                            pixel_noticia=0;
                            count_noticia=0;
                        }
                    }                                       
                }, time_notica);
            }
            $(function(){
                noticiones($('#news li').length);
            });
</script>
<style type="text/css">
.breakingNews{overflow: hidden;padding: 0px 4px;background: white;}
#news{padding: 0px; margin: 0px 0px 0px 138px; list-style: none; position: relative; width: 400px; top: 0px;width:auto;}
#news li{height: 30px !important;line-height: 30px !important;}
.flechiten{border-style: solid;border-width: 10px 0 10px 10px;border-color: transparent transparent transparent #607D8B;position: absolute;top: 7px;}
.noticion{display: inline-block;margin: 0;margin-top: 2px !important;display: block;padding: 0 10px !important;font-size: 11px !important;font-weight: 700 !important;height: 29px !important;line-height: 29px !important;float: left !important;text-align: center !important;color: #FFF !important;background-color: #607D8B !important;text-transform: uppercase !important;}
</style>
<?php echo $_smarty_tpl->getSubTemplate ('includes/main_footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php }?><?php }} ?>
