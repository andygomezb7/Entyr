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
                <a class="navbar-brand" href="{$tsConfig.partner_url}" style="width: 183px;">{if $tsConfig.logo_link}<img src="{$tsConfig.logo_link}" style="max-height: 46px;margin: -15px 0 0 0;float:left;"/>{else}{$tsConfig.name}{/if} <span style="font-size:15px!important;">Por <b>Wortit</b></span></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {$wuser->name} <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=profile&user={$wuser->info.usuario_nombre}"><i class="fa fa-fw fa-user"></i> Perfil</a>
                        </li>
                        {if $wuser->admod}
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=admod"><i class="fa fa-fw fa-gear"></i> Admin</a>
                        </li>
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=payments"><i class="fa fa-fw fa-gear"></i> Facturación</a>
                        </li>
                        {/if}
                        <li>
                        <a href="{$tsConfig.partner_url}/?page=config"><i class="fa fa-fw fa-gear"></i> Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        <a class="logout" action="logout_user"><i class="fa fa-fw fa-power-off"></i> Salir</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li {if !$thispage || $thispage == 'home'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}"><i class="fa fa-fw fa-dashboard"></i> Tablero</a>
                    </li>
                    <li {if $thispage == 'estadisticas'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=estadisticas"><i class="fa fa-fw fa-bar-chart-o"></i> Estadisticas</a>
                    </li> 
                    <li {if $thispage == 'soporte'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=soporte"><i class="fa fa-fw fa-gear"></i> Ayuda y preguntas</a>
                    </li> 
                    <li {if $thispage == 'noticias'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=noticias"><i class="fa fa-fw fa-dashboard"></i> Contenido</a>
                    </li>
                    {if $wuser->babantaeditor}
                   <li {if $thispage == 'editor'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=editor"><i class="fa fa-fw fa-dashboard"></i> Editor</a>
                    </li>
                    {/if}
                    <li {if $thispage == 'ranking'}class="active"{/if}>
                        <a href="{$tsConfig.partner_url}?page=ranking"><i class="fa fa-fw fa-bookmark"></i>Top Contenido</a>
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