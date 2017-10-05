<?php /* Smarty version Smarty-3.1.19, created on 2016-11-09 07:16:57
         compiled from "./bbnt_archives/temas/default/includes/main_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:332864391582321c9706072-56894021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e58faf056255af3ec61a711d7714796380670eea' => 
    array (
      0 => './bbnt_archives/temas/default/includes/main_header.tpl',
      1 => 1478244777,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '332864391582321c9706072-56894021',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'get_' => 0,
    'tsTitle' => 0,
    'tsConfig' => 0,
    'tsBodyp' => 0,
    'tsBodytags' => 0,
    'tsBodyi' => 0,
    'tsUrl' => 0,
    'location' => 0,
    'wuser' => 0,
    'numaccess' => 0,
    'tsPage' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_582321c986d464_90933833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_582321c986d464_90933833')) {function content_582321c986d464_90933833($_smarty_tpl) {?><?php if (!$_smarty_tpl->tpl_vars['get_']->value['hdrPott']&&$_smarty_tpl->tpl_vars['get_']->value['hdrPott']!='httpost') {?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><title><?php echo $_smarty_tpl->tpl_vars['tsTitle']->value;?>
</title>
<link rel="shortcut icon" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
/favicon.png?time=<?php echo time();?>
" type="image/x-icon"/>
<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/jquery.min.js?time=<?php echo time();?>
"></script>
<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['tsBodyp']->value;?>
"><meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['tsBodytags']->value;?>
">

<meta name="robots" content="all, index, follow, archive">
<meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['tsTitle']->value;?>
">
<meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['tsBodyp']->value;?>
">
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['tsBodyi']->value;?>
"/>
<meta property="fb:page_id" content="402076533245521">
<meta property="fb:admins" content="100000141702335">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?php echo $_smarty_tpl->tpl_vars['tsTitle']->value;?>
">
<meta name="twitter:description" content="<?php echo $_smarty_tpl->tpl_vars['tsBodyp']->value;?>
">
<meta name="twitter:site" content="wort_it">
<meta property="twitter:image" content="<?php echo $_smarty_tpl->tpl_vars['tsBodyi']->value;?>
"/>
<link href="<?php if ($_smarty_tpl->tpl_vars['tsUrl']->value) {?><?php echo $_smarty_tpl->tpl_vars['tsUrl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['location']->value;?>
<?php }?>" rel="canonical">
<meta name="advertising-site-verification" content="733cb03bf47f84e7c43c59d10ddf2f9a" />
<meta name="google-site-verification" content="V0D372djvja2MJqF3q4tx_7oXD6OMKgol9UX9nL-ly0" />
<meta name="google-site-verification" content="IhWRx3W62zY84EB0n9p-FQkO2nflBdYG1wIS5Baz7z4" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/StlsGbls.css?time=<?php echo time();?>
">
<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['css'];?>
/bootstrap.min.css?time=<?php echo time();?>
" />
<script src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/bootstrap.js?time=<?php echo time();?>
" type="text/javascript"></script>
<?php if (!$_smarty_tpl->tpl_vars['wuser']->value->uid) {?><script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['js'];?>
/Annm.js?time=<?php echo time();?>
"></script><?php }?>
<script type="text/javascript">var global_data = { user_key: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->uid;?>
',url:'<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['url'];?>
',name:'<?php echo $_smarty_tpl->tpl_vars['tsConfig']->value['name'];?>
',img:'<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['w_avatar'];?>
',userid: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->uid;?>
',user_name: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
', name_user: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_name'];?>
', ap_user: '<?php echo $_smarty_tpl->tpl_vars['wuser']->value->info['buser_ap'];?>
',numaccess: '<?php echo $_smarty_tpl->tpl_vars['numaccess']->value;?>
', page: '<?php echo $_smarty_tpl->tpl_vars['tsPage']->value;?>
',  };
var usrjx = {
	extras: '',
}
function usrjxf(h){
	return false;
}

</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77396950-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
<div id="loading" class="dsnone"><div class="content"><div class="bbos"><div class="titl brO">Cargando...</div></div></div></div>
<div id="mask"></div>
<div id="headtotalhe">
<div id="principalcont">
<?php }?><?php }} ?>
