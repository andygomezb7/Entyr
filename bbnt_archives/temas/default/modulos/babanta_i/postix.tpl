{include file='includes/main_header.tpl'}
    {if $wuser->uid}<link href="{$tsConfig.url}/css/sb-admin.css" rel="stylesheet">
    <link href="{$tsConfig.url}/css/plugins/morris.css" rel="stylesheet">{/if}
    <link href="{$tsConfig.url}/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
     <div id="wrapper">
    {if !$wuser->uid}
    {include file='modulos/postix_i/unlogged.tpl'}
    {else}
    {include file='modulos/postix_i/navigate.tpl'}
    {if $thispage == 'noticias'}
    {include file='modulos/postix_i/noticias.tpl'}
    {else}
    {include file='modulos/postix_i/home.tpl'}
    {/if}
    {/if}
</div>
    {if $wuser->uid}<script src="{$tsConfig.url}/js/plugins/morris/raphael.min.js"></script>
    <script src="{$tsConfig.url}/js/plugins/morris/morris.min.js"></script>
    <script src="{$tsConfig.url}/js/plugins/morris/morris-data.js"></script>{/if}
{include file='includes/main_footer.tpl'}