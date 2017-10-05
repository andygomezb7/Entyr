<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 07:16:57
         compiled from "./bbnt_archives/temas/default/modulos/babanta_i/noticiasshare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:369563833582321c9957b29-22374479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27be587af0c7a44b807bfefaa651decdeb4a9f98' => 
    array (
      0 => './bbnt_archives/temas/default/modulos/babanta_i/noticiasshare.tpl',
      1 => 1478502139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '369563833582321c9957b29-22374479',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoriaget' => 0,
    'categoriainfo' => 0,
    'postscompart' => 0,
    'p' => 0,
    'postadapostixs' => 0,
    'wuser' => 0,
    'tsConfig' => 0,
    'pagelist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_582321c99fbc15_34575342',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582321c99fbc15_34575342')) {function content_582321c99fbc15_34575342($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/babanta/cpm-services.babanta.net/bbnt_resource/libs/smarty/plugins/modifier.replace.php';
?>        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
                

<?php if ($_smarty_tpl->tpl_vars['categoriaget']->value) {?>
<div class="alert alert-warning">Estas viendo la categoria: <b><?php echo $_smarty_tpl->tpl_vars['categoriainfo']->value['postix_cat_name'];?>
</b></div>
<hr />
<?php }?>
<div class="list-group">
<?php  $_smarty_tpl->tpl_vars['p'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['p']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['postscompart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['p']->key => $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->_loop = true;
?>
<div class="list-group-item active col-md-12" style="outline: inherit!important;background: transparent!important;overflow: inherit;clear: both;border-bottom: 1px solid rgba(204, 204, 204, 0.34);margin: 0 0 9px 0;position:inherit!important;">
<div class="col-md-2" style="padding: 0;height: 100px;overflow: hidden;"><img src="<?php if ($_smarty_tpl->tpl_vars['p']->value['postix_portada']) {?>
<?php $_smarty_tpl->tpl_vars["postadapostixs"] = new Smarty_variable(smarty_modifier_replace($_smarty_tpl->tpl_vars['p']->value['postix_portada'],"http://babanta.com","http://static.babanta.com"), null, 0);?>
<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['postadapostixs']->value,"/noticias/wp-content/uploads/sites/","/wp-content/uploads/");?>
<?php } else { ?>data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkyIiBoZWlnaHQ9IjIwMCIgdmlld0JveD0iMCAwIDE5MiAyMDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzEwMCV4MjAwCkNyZWF0ZWQgd2l0aCBIb2xkZXIuanMgMi42LjAuCkxlYXJuIG1vcmUgYXQgaHR0cDovL2hvbGRlcmpzLmNvbQooYykgMjAxMi0yMDE1IEl2YW4gTWFsb3BpbnNreSAtIGh0dHA6Ly9pbXNreS5jbwotLT48ZGVmcz48c3R5bGUgdHlwZT0idGV4dC9jc3MiPjwhW0NEQVRBWyNob2xkZXJfMTUyYTliNTQ3YmMgdGV4dCB7IGZpbGw6I0FBQUFBQTtmb250LXdlaWdodDpib2xkO2ZvbnQtZmFtaWx5OkFyaWFsLCBIZWx2ZXRpY2EsIE9wZW4gU2Fucywgc2Fucy1zZXJpZiwgbW9ub3NwYWNlO2ZvbnQtc2l6ZToxMHB0IH0gXV0+PC9zdHlsZT48L2RlZnM+PGcgaWQ9ImhvbGRlcl8xNTJhOWI1NDdiYyI+PHJlY3Qgd2lkdGg9IjE5MiIgaGVpZ2h0PSIyMDAiIGZpbGw9IiNFRUVFRUUiLz48Zz48dGV4dCB4PSI3MSIgeT0iMTA0LjgiPjE5MngyMDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=<?php }?>" style="min-width: 100%;height: auto;max-width: 157%;"></div> <div class="col-md-7"><h4 class="list-group-item-heading"><?php if ($_smarty_tpl->tpl_vars['p']->value['postix_active']==1) {?><font color="red">Desactivada:</font>&nbsp;<?php }?><?php echo $_smarty_tpl->tpl_vars['p']->value['postix_name'];?>
</h4>
<div class="list-group-item-text">
<div class="btn-group" role="group" aria-label="...">

<?php if ($_smarty_tpl->tpl_vars['wuser']->value->admod||$_smarty_tpl->tpl_vars['wuser']->value->user_editor) {?><div class="btn-group">
<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-cogs"></i> <span class="caret"></span></button>
<div class="alert alert-warning" style="float:left;padding: 9px 9px;margin: 0 0 0 10px;"><b>Network: </b><?php if ($_smarty_tpl->tpl_vars['p']->value['postix_notatype']==2) {?>Patrocinadores<?php } else { ?>Hits Babanta<?php }?></div>
<ul class="dropdown-menu">
<li><a data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('value<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
'))" href="javascript:void(0)">Copiar enlace</a></li>
<li role="separator" class="divider"></li>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=editor&pref=<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
&action=editar" role="button" style="margin-bottom: 11px;">Editar nota</a></li>
<?php if ($_smarty_tpl->tpl_vars['p']->value['postix_active']==1) {?>
<li><a href="javascript:void(0)" onclick="postixclass.delet(<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
, 2, '0')" role="button" style="margin-bottom: 11px;">Activar</a></li><?php } else { ?><li><a href="javascript:void(0)" onclick="postixclass.delet(<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
, 2, '1')" role="button" style="margin-bottom: 11px;">Desactivar</a></li><?php }?>
</ul>
</div><?php } else { ?><button type="button" class="btn btn-danger" data-toggle="tooltip" title="Copiar al portapapeles" onclick="copy(document.getElementById('value<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
'))" href="javascript:void(0)"><i class="fa fa-copy"></i></button><?php }?>
</div>
      </div></div>
<div class="col-md-3">
<div class="input-group">
<label style="font-size: 13px;"><i class="fa fa-link"></i> Enlace personalizado</label>

<div class="form-group"><input type="text" width="100%" class="form-control" id="value<?php echo $_smarty_tpl->tpl_vars['p']->value['postix_id'];?>
" style="margin:0 3px;" value="<?php echo $_smarty_tpl->tpl_vars['p']->value['urlshare'];?>
" aria-describedby="basic-addon1" /></div>
</div>

<div class="input-group">
<label style="font-size: 13px;"><i class="fa fa-info"></i> <?php echo $_smarty_tpl->tpl_vars['p']->value['postix_cat_name'];?>
</label>
<div class="form-group" style="padding: 0!important;">
<div class="alert alert-warning" style="float:left;padding: 2px 9px;margin: 0 0 0 0;"><b>CPM</b><?php if ($_smarty_tpl->tpl_vars['p']->value['postix_notatype']==2) {?>: $ <?php echo $_smarty_tpl->tpl_vars['p']->value['postix_valor'];?>
<?php }?></div>
<div class="alert alert-info" style="float:left;padding: 2px 9px;margin: 0 0 0 5px;"><b>Tipo: </b><?php if ($_smarty_tpl->tpl_vars['p']->value['postix_notatype']==2) {?>CPM Fijo<?php } else { ?>Oferta<?php }?></div>
</div>
</div>
</div>
  </div>
      <?php } ?>  
</div>
<hr />
<center><div style="margin:0 40px;"><?php echo $_smarty_tpl->tpl_vars['pagelist']->value;?>
</div></center>
<div><div><div>
<style type="text/css">
.pagination>li{display: inline-block;margin: 0 0 4px 0;}
</style>
<script type="text/javascript">
function copy(valor){ 
var aux = valor;
  aux.select();
  document.execCommand("copy");
    var options =  {
    content: "Copiado al portapapeles",
    style: "toast",
    timeout: 4000
}

$.snackbar(options);
} 
function vistaprev(i){ mydialog.loading('Cargando vista previa...');
$.post(global_data.url+'/ajax/babanta-viewnote.php?id='+i, function(h){ mydialog.end_loading();
mydialog.alert('Vista previa', h);
});
}
/*var $container = $('.items-news'); 
            $container.imagesLoaded( function() {
            $container.masonry();
        });*/
// <?php if ($_smarty_tpl->tpl_vars['wuser']->value->admod||$_smarty_tpl->tpl_vars['wuser']->value->user_editor) {?>
var postixclass = {
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
                    add_pub: function(){
                    postixclass.ajax('babanta-pub', '.add_pub');
                    },
delet: function(i, t, o){
mydialog.loading('Cargando...');
$.post(global_data.url+'/ajax/babanta-delet.php', {'t': t,'i':i,'o':o}, function(h){
mydialog.end_loading();
mydialog.show(true);
mydialog.title('Funciones de editor');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
 });
}
}

var postixclass = { delet: function(i, t, o){
mydialog.loading('Cargando...');
$.post(global_data.url+'/ajax/babanta-delet.php', {'t': t,'i':i,'o':o}, function(h){
mydialog.end_loading();
mydialog.show(true);
mydialog.title('Funciones de editor');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
 });
} }
//<?php }?></script>
</div></div></div>
</div>
</div><?php }} ?>
