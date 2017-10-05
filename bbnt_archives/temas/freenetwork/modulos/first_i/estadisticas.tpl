        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tus estadisticas
                            <small>Control de tus ganancias</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.url}/php/pages/postix/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-charts-o"></i> Estadisticas
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o fa-fw"></i> Estadisticas</h3>
                            </div>
                            <div class="panel-body">
                                <div id="morris-line-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="{$tsConfig.js}/morris.min.js"></script>
                <script type="text/javascript">{literal}
                $(function(){
                Morris.Line({
                element: 'morris-line-chart',
                data: [{/literal}{$ingresos.estadisticas}{literal}],
                xkey: 'd',
                ykeys: ['visits'],
                labels: ['Visitas'],
                smooth: false,
                resize: true
                });
                });
                {/literal}</script>
                <!-- /.row -->
                <!--stats by Wortit-->
                                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Ganancias (BETA)</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Fecha</th>
<th>Visitas</th>
<th>Pago</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$pordias item=p key=dt}
<tr {if $dt%2 == 0}style="background:rgba(63, 81, 181, 0.16);"{/if}>
<td>{$p.fecha}</td>
<td>{$p.visitas}</td>
<td>{$p.pago} $</td>
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

            </div>