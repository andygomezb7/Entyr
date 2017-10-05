{if !$get_.hdrPott && $get_.hdrPott != 'httpost'}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "//www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="//www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"><title>{$tsTitle}</title>
<link rel="shortcut icon" href="{$tsConfig.url}/favicon.png?time={$smarty.now}" type="image/x-icon"/>
<script type="text/javascript" src="{$tsConfig.js}/jquery.min.js?time={$smarty.now}"></script>
<meta name="description" content="{$tsBodyp}"><meta name="keywords" content="{$tsBodytags}">
{*<meta name="author" content="{$tsConfig.name}"><meta http-equiv=="content-language" content="es"> *}
<meta name="robots" content="all, index, follow, archive">
<meta property="og:title" content="{$tsTitle}">
<meta property="og:description" content="{$tsBodyp}">
<meta property="og:image" content="{$tsBodyi}"/>
<meta property="fb:page_id" content="402076533245521">
<meta property="fb:admins" content="100000141702335">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{$tsTitle}">
<meta name="twitter:description" content="{$tsBodyp}">
<meta name="twitter:site" content="wort_it">
<meta property="twitter:image" content="{$tsBodyi}"/>
<link href="{if $tsUrl}{$tsUrl}{else}{$location}{/if}" rel="canonical">
<meta name="advertising-site-verification" content="733cb03bf47f84e7c43c59d10ddf2f9a" />
<meta name="google-site-verification" content="V0D372djvja2MJqF3q4tx_7oXD6OMKgol9UX9nL-ly0" />
<meta name="google-site-verification" content="IhWRx3W62zY84EB0n9p-FQkO2nflBdYG1wIS5Baz7z4" />
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto|Raleway:400,700">
<link rel="stylesheet" type="text/css" href="{$tsConfig.css}/StlsGbls.css?time={$smarty.now}">
<link rel="stylesheet" href="{$tsConfig.css}/bootstrap.min.css?time={$smarty.now}" />
<script src="{$tsConfig.js}/bootstrap.js?time={$smarty.now}" type="text/javascript"></script>
{if !$wuser->uid}<script type="text/javascript" src="{$tsConfig.js}/Annm.js?time={$smarty.now}"></script>{/if}
<script type="text/javascript">{literal}var global_data = { {/literal}user_key: '{$wuser->uid}',url:'{$tsConfig.url}',name:'{$tsConfig.name}',img:'{$wuser->info.w_avatar}',userid: '{$wuser->uid}',user_name: '{$wuser->info.buser_name}', name_user: '{$wuser->info.buser_name}', ap_user: '{$wuser->info.buser_ap}',numaccess: '{$numaccess}', page: '{$tsPage}', {literal} };
var usrjx = {
	extras: '',
}
function usrjxf(h){
	return false;
}
{/literal}
</script>
<script>{literal}
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77396950-1', 'auto');
  ga('send', 'pageview');

{/literal}</script>
</head>
<body>
<div id="loading" class="dsnone"><div class="content"><div class="bbos"><div class="titl brO">Cargando...</div></div></div></div>
<div id="mask"></div>
<div id="headtotalhe">
<div id="principalcont">
{/if}