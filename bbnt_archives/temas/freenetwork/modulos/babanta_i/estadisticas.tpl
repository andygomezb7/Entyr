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
                <!-- /.row -->
                <!--stats by Wortit-->
                                <div class="row">{if $fechas}
                                    <div class="panel panel-default">
                                        <div class="panel-body">
<div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Fecha</th>
<th>Visitas</th>
<th>CPS (costo por segundo)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$fechas item=p}
<tr>
<td>{$p.ues_fecha}</td>
<td>{$p.ues_visitas}</td>
<td>{$p.ues_promedio}</td>
</tr>
{/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
<div class="alert alert-info">No hemos recibido visitas en tus enlaces.</div>
                                {/if}
                            </div>
                            </div>
                                </div>


                                </div>

            </div>