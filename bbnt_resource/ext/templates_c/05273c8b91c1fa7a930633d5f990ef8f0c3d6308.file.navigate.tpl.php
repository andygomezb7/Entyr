<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 07:16:57
         compiled from "./bbnt_archives/temas/default/modulos/babanta_i/navigate.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2126486403582321c9873cb0-11109276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '05273c8b91c1fa7a930633d5f990ef8f0c3d6308' => 
    array (
      0 => './bbnt_archives/temas/default/modulos/babanta_i/navigate.tpl',
      1 => 1476403794,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2126486403582321c9873cb0-11109276',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tsConfig' => 0,
    'wuser' => 0,
    'thispage' => 0,
    'categorias' => 0,
    'catgg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_582321c99537c3_91778362',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582321c99537c3_91778362')) {function content_582321c99537c3_91778362($_smarty_tpl) {?><!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
" style="width: 183px;"><?php if ($_smarty_tpl->tpl_vars['tsConfig']->value['logo_link']) {?><img src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['logo_link'];?>
" style="max-height: 46px;margin: -15px 0 0 0;float:left;"/><?php } else { ?><?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['name'];?>
<?php }?></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" style="padding: 20px 19px;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_nick'];?>
 <?php if ($_smarty_tpl->tpl_vars['wuser']->value->info['buser_nick']) {?>(<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
)<?php }?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php if ($_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
                        <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=admod"><i class="fa fa-fw fa-gear"></i> Admin</a>
                        </li>
                        <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=payments"><i class="fa fa-fw fa-gear"></i> Facturación</a>
                        </li>
                        <?php }?>
                        <li>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=config"><i class="fa fa-fw fa-gear"></i> Tus datos</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a onclick="salir()" href="javascript:void(0)" action="logout_user"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse nabvar-babanta">
                <ul class="nav navbar-nav side-nav">
                    <li <?php if (!$_smarty_tpl->tpl_vars['thispage']->value||$_smarty_tpl->tpl_vars['thispage']->value=='home') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
"><i class="fa fa-fw fa-dashboard"></i> Tablero</a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->advertiser) {?><li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='advertiser') {?>class="active"<?php }?>>
                        <a class="alert alert-info" style="margin:0;" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=advertiser"><i class="fa fa-fw fa-bar-chart-o"></i> Webmaster</a>
                    </li><?php }?>
                    <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='noticias') {?>class="btn-group active"<?php } else { ?>class="btn-group"<?php }?> role="group">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-dashboard"></i> Contenido&nbsp;<span class="caret"></span></a>
<ul class="dropdown-menu col-md-12">
<li><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=share">Todo el contenido</a></li>
<?php  $_smarty_tpl->tpl_vars['catgg'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['catgg']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categorias']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['catgg']->key => $_smarty_tpl->tpl_vars['catgg']->value) {
$_smarty_tpl->tpl_vars['catgg']->_loop = true;
?>
<li><a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=share&cat=<?php echo $_smarty_tpl->tpl_vars['catgg']->value['postix_cat_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['catgg']->value['postix_cat_name'];?>
</a></li>
<?php } ?>
</ul>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->user_editor||$_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
                   <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='editor') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=editor"><i class="fa fa-fw fa-dashboard"></i> Editor</a>
                    </li>
                    <?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->user_manager||$_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
                   <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='manager') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=manager"><i class="fa fa-fw fa-dashboard"></i> Manager</a>
                    </li>
                    <?php }?>
                    
                    <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='red') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=red"><i class="fa fa-fw fa-users"></i> Contabilidad de Referidos</a>
                    </li>
                    <?php if ($_smarty_tpl->tpl_vars['wuser']->value->admod) {?>
                   <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='admod') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=admod"><i class="fa fa-fw fa-bar-chart-o"></i> Administración</a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='payments') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
/?page=payments"><i class="fa fa-fw fa-gear"></i> Facturación</a>
                        </li>
                    <?php }?>
                    <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='pages') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=pages"><i class="fa fa-fw fa-bar-chart-o"></i> Tus paginas</a>
                    </li>
                    <li <?php if ($_smarty_tpl->tpl_vars['thispage']->value=='config') {?>class="active"<?php }?>>
                        <a href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['partner_url'];?>
?page=config"><i class="fa fa-fw fa-wrench"></i> Configuración</a>
                    </li>
                    
                </ul>
            </div>
        </nav>
            <style type="text/css">
    .nabvar-babanta .dropdown-menu{
    background: rgba(0, 0, 0, 0.13)!important;
    position: relative!important;
    box-shadow: none!important;
    color: white!important;
    }
    .nabvar-babanta .dropdown-menu li a{
    color: white!important;
    margin-right: 13px!important;
    }
    </style><?php }} ?>
