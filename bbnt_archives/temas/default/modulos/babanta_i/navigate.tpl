<!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{$tsConfig.partner_url}" style="width: 183px;">{if $tsConfig.logo_link}<img src="{$tsConfig.logo_link}" style="max-height: 46px;margin: -15px 0 0 0;float:left;"/>{else}{$tsConfig.name}{/if}</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" style="padding: 20px 19px;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {$wuser->info.buser_nick} {if $wuser->info.buser_nick}({$wuser->info.buser_name}){/if} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        {if $wuser->admod}
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=admod"><i class="fa fa-fw fa-gear"></i> Admin</a>
                        </li>
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=payments"><i class="fa fa-fw fa-gear"></i> Facturación</a>
                        </li>
                        {/if}
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=config"><i class="fa fa-fw fa-gear"></i> Tus datos</a>
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
                    <li {if !$thispage || $thispage == 'home'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}"><i class="fa fa-fw fa-dashboard"></i> Tablero</a>
                    </li>
                    {if $wuser->advertiser}<li {if $thispage == 'advertiser'}class="active"{/if}>
                        <a class="alert alert-info" style="margin:0;" href="{$tsConfig.partner_url}?page=advertiser"><i class="fa fa-fw fa-bar-chart-o"></i> Webmaster</a>
                    </li>{/if}
                    <li {if $thispage == 'noticias'}class="btn-group active"{else}class="btn-group"{/if} role="group">
                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-fw fa-dashboard"></i> Contenido&nbsp;<span class="caret"></span></a>
<ul class="dropdown-menu col-md-12">
<li><a href="{$tsConfig.partner_url}?page=share">Todo el contenido</a></li>
{foreach from=$categorias item=catgg}
<li><a href="{$tsConfig.partner_url}?page=share&cat={$catgg.postix_cat_id}">{$catgg.postix_cat_name}</a></li>
{/foreach}
</ul>
                    </li>
                    {if $wuser->user_editor || $wuser->admod}
                   <li {if $thispage == 'editor'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=editor"><i class="fa fa-fw fa-dashboard"></i> Editor</a>
                    </li>
                    {/if}
                    {if $wuser->user_manager || $wuser->admod}
                   <li {if $thispage == 'manager'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=manager"><i class="fa fa-fw fa-dashboard"></i> Manager</a>
                    </li>
                    {/if}
                    {* <li {if $thispage == 'ranking'}class="active"{/if}>
                        <a class="alert alert-danger" style="margin:0;" href="http://www.babanta.net?page=noticias&cat=22"><i class="fa fa-fw fa-bookmark"></i>Contenido GIF</a>
                    </li> *}
                    <li {if $thispage == 'red'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=red"><i class="fa fa-fw fa-users"></i> Contabilidad de Referidos</a>
                    </li>
                    {if $wuser->admod}
                   <li {if $thispage == 'admod'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=admod"><i class="fa fa-fw fa-bar-chart-o"></i> Administración</a>
                    </li>
                    <li {if $thispage == 'payments'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}/?page=payments"><i class="fa fa-fw fa-gear"></i> Facturación</a>
                        </li>
                    {/if}
                    <li {if $thispage == 'pages'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=pages"><i class="fa fa-fw fa-bar-chart-o"></i> Tus paginas</a>
                    </li>
                    <li {if $thispage == 'config'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=config"><i class="fa fa-fw fa-wrench"></i> Configuración</a>
                    </li>
                    {* <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Más <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                            <li>
                                <a href="#">Dropdown Item</a>
                            </li>
                        </ul>
                    </li> *}
                </ul>
            </div>
        </nav>
            <style type="text/css">{literal}
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
    {/literal}</style>