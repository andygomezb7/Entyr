<div id="mydialog"></div>
<div class="uiCntnToo dsnone" data-role="tooltip"><div class="tololtipo"></div><div class="cnToo"></div></div>
</div>
{* <div id="footer" class="footer">
<div class="footerg">{$tsConfig.net_name} - Powered by AG © {$smarty.now|date_format:"%Y"}
<div style="float: right; text-align: right;">
<a href="{$tsConfig.direccion_url}/int/terminos-y-condiciones" target="_blank">Terminos y condiciones</a>
</div>
</div>
</div> *}
{assign var=unique_id value=10|mt_rand:1000000}
<script type="text/javascript" src="{$tsConfig.js}/pg.js?server_{$unique_id}=babanta.net-s&time={$smarty.now}&ok=rkol"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
<script src="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.js"></script>
<link href="http://fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{$tsConfig.css}/design.css?time={$smarty.now}">
  <script type="text/javascript" src="{$tsConfig.js}/design.js?time={$smarty.now}"></script>
<script type="text/javascript">//{literal}
// ACA ANALITYCS
//{/literal}</script>
<style type="text/css">{literal}
.hover, .over, .bguser{transition:0.3s;-webkit-transition:0.3s;-moz-transition:0.3s;}
.hover:hover, .hover:hover a{background: #6D9611!important;color:#ffffff!important;text-decoration: none!important;}
.over:hover, .over:hover a{color:#6D9611!important;}
.overmenu a:hover{border-bottom: 4px solid #6D9611!important;color: #6D9611!important;text-decoration: none!important;}
.bguser{background: #6D9611!important} /* #006687 */{/literal}{if $mobile}{literal}
.active:active, .active:focus{background: #6D9611!important;color:white!important;}
.hover:active,.hover:focus{background: #6D9611!important;color:#ffffff!important;}
.over:focus, .over:active, .over:active a, .over:focus a{color:#006687!important;text-decoration: none!important;}
{/literal}{/if}{literal}
{/literal}</style>
</body>
</html>