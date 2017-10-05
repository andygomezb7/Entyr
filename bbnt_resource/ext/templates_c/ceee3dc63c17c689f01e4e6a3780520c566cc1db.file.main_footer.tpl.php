<?php /* Smarty version Smarty-3.1.19, created on 2016-11-08 23:17:57
         compiled from "./bbnt_archives/temas/freenetwork/includes/main_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13778458805822b185ed9f20-81815454%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ceee3dc63c17c689f01e4e6a3780520c566cc1db' => 
    array (
      0 => './bbnt_archives/temas/freenetwork/includes/main_footer.tpl',
      1 => 1478666137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13778458805822b185ed9f20-81815454',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tsConfig' => 0,
    'unique_id' => 0,
    'mobile' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_5822b185f09da0_06271522',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5822b185f09da0_06271522')) {function content_5822b185f09da0_06271522($_smarty_tpl) {?><div id="mydialog"></div>
<div class="uiCntnToo dsnone" data-role="tooltip"><div class="tololtipo"></div><div class="cnToo"></div></div>
</div>

<?php $_smarty_tpl->tpl_vars['unique_id'] = new Smarty_variable(mt_rand(10,1000000), null, 0);?>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/pg.js?server_<?php echo $_smarty_tpl->tpl_vars['unique_id']->value;?>
=babanta.net-s&time=<?php echo time();?>
&ok=rkol"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
<script src="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
<link href="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/design.css?time=<?php echo time();?>
">
  <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/design.js?time=<?php echo time();?>
"></script>
<script type="text/javascript">//
// ACA ANALITYCS
//</script>
<style type="text/css">
.hover, .over, .bguser{transition:0.3s;-webkit-transition:0.3s;-moz-transition:0.3s;}
.hover:hover, .hover:hover a{background: #6D9611!important;color:#ffffff!important;text-decoration: none!important;}
.over:hover, .over:hover a{color:#6D9611!important;}
.overmenu a:hover{border-bottom: 4px solid #6D9611!important;color: #6D9611!important;text-decoration: none!important;}
.bguser{background: #6D9611!important} /* #006687 */<?php if ($_smarty_tpl->tpl_vars['mobile']->value) {?>
.active:active, .active:focus{background: #6D9611!important;color:white!important;}
.hover:active,.hover:focus{background: #6D9611!important;color:#ffffff!important;}
.over:focus, .over:active, .over:active a, .over:focus a{color:#006687!important;text-decoration: none!important;}
<?php }?>
</style>
</body>
</html><?php }} ?>
