        <div id="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        {if !$wuser->info.partner_pago}
                        <a style="text-decoration:none;" href="{$tsConfig.partner_url}/?page=config"><div class="alert alert-warning alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> Configura tu <strong>metodo de pago</strong> ahora! y no pierdas tus pagos mensuales (<small>si no se paga al mes se acumula al siguiente mes</small>)
                        </div></a>
                        {/if}
                        {if $tuspaginas <= 0}
                         <a style="text-decoration:none;" href="{$tsConfig.partner_url}/?page=pages"><div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i> Vincula tus <strong>paginas de facebook</strong> a tu cuenta (<small>Las necesitamos para saber donde publicas</small>)
                        </div></a>
                        {/if}
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-danger">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-usd fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">$ <span id="ingresos">{$ingresos.usd}</span> USD</div>
                                        <div>Por cobrar</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left">Dolares generados hasta ahora</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><span id="impresiones">{$cpcal.impresiones}</span></div>
                                        <div>Impresiones este mes</div>
                                    </div>
                                </div>
                            </div>
                            <a>
                                <div class="panel-footer">
                                    <span class="pull-left">Numero de impresiones este mes</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {* <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-cart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">124</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">13</div>
                                        <div>Support Tickets!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> *}
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Estado</th>
<th>Fecha</th>
<th>Cantidad en dolares</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$estatuspagos item=p}
<tr>
<td style="color:#5F5D5D;{if $p.c_type == 3}background:#97E6B3;
{elseif $p.c_type == 1}background:#B7B9BB;
{elseif $p.c_type == '1.5'}background:#A9A0DC;
{elseif $p.c_type == '2.5'}color:#EFEAEA!important;background:#4E89F7;
{else}background:#97E6B3;{/if}">{if $p.estado}{$p.estado}{else}
{if $p.c_type == 3}<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Sin revisar
{elseif $p.c_type == 1}<span class="glyphicon glyphicon-time" aria-hidden="true"></span> Pendiente de pago
{elseif $p.c_type == '1.5'}<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span> Pago emitido (en espera...)
{elseif $p.c_type == '2.5'}<span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Pago efectuado
{else}<span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> Sin revisar{/if}{/if}<b class="dsnone">({$p.cid}-{$p.c_pais})</b></td>
<td>{$p.c_date|date_format} {if $p.p_date}{$p.p_date|date_format}{else}Hasta la fecha actual({$smarty.now|date_format}){/if}</td>
<td>$ {if $p.c_type == 3}<span id="ingresosf">{/if}{$p.c_dinero}{if $p.c_type == 3}</span>{/if} USD</td>
</tr>
{/foreach}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->