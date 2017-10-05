<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 07:16:57
         compiled from "./bbnt_archives/temas/default/includes/main_footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1598428875582321c9a02712-99774601%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be9873df442124accfd085071a7fb9384028184c' => 
    array (
      0 => './bbnt_archives/temas/default/includes/main_footer.tpl',
      1 => 1475379121,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1598428875582321c9a02712-99774601',
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
  'unifunc' => 'content_582321c9a2fa14_64826044',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582321c9a2fa14_64826044')) {function content_582321c9a2fa14_64826044($_smarty_tpl) {?><div id="mydialog"></div>
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
