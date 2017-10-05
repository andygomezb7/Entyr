        {if $wuser->admod}
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Administrar facturación
                            <small>Facturas!</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="{$tsConfig.partner_url}/">Tablero</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-fw fa-bar-charts-o"></i> Administrar facturación
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    {if $userid}
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Usuario</th>
<th>Info de desarrollador</th>
<th>Rango del usuario</th>
<th>Estado</th>
<th>Fecha</th>
<th>Cantidad en dolares</th>
<th>Emitir a</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$pall item=p}{if $p.buser_nick || $p.c_user_id}
<tr>
<td>
<span>{if $p.buser_name || $p.buser_ap}{$p.buser_name} {$p.buser_ap}{else}{$p.buser_nick}{/if}</span>
</td>
<td>
[{$p.c_user_id}-{$p.c_type}-{$p.c_pais}]
</td>
<td>
<a href="javascript:void(0)" class="btn btn-success" onclick="postixurango({$p.buser_id}, $('#user{$p.buser_id}rango').val())">Dar rango</a>
<select id="user{$p.buser_id}rango">
<option>Selec. Rango</option>
<option value="2" {if $p.buser_rango == 2}selected="selected"{/if}>Generador</option>
<option value="1" {if $p.buser_rango == 1}selected="selected"{/if}>Administrador</option>
<option value="3" {if $p.buser_rango == 3}selected="selected"{/if}>Editor</option>
</select>
</td>
<td>
    {if $p.c_type == 3}Sin revisar
    {elseif $p.c_type == 1}Pendiente
    {elseif $p.p_type == '1.5'}Emitido
    {elseif $p.c_type == '2.5'}Pagado
    {else}Sin revisar{/if}<b class="dsnone" style="display:none!important;">({$p.cid}-{$p.c_pais})</b></td>
<td>{$p.c_date|date_format} {if $p.p_date}{$p.p_date|date_format}{else}Hasta la fecha actual({$smarty.now|date_format}){/if}</td>
<td>$ {$p.c_dinero} USD</td>
<td>Emitir a: {$p.partner_metodo}:<b>{$p.partner_pago}</b></td>
<td><button class="btn btn-info" onclick="postix.pago({$p.buser_id}, {$p.cid}, $('#lol{$p.cid}').val())">Emitir</button>
<select width="21px" id="lol{$p.cid}">
<option value="2.5">Pagar</option>
<option value="1">Pendiente</option>
</select>
</td>
</tr>
{/if}{/foreach}
                                        </tbody>
                                    </table>
                                    <script type="text/javascript">{literal}
                                    function postixurango(i, r){
                                                              mydialog.loading('Cargando...');
                      $.post(global_data.url+'/ajax/babanta-rangos.php', {'i': i,'o':r}, function(h){
                        mydialog.end_loading();
mydialog.show(true);
mydialog.title('Funciones de administrador');
mydialog.body('<div class="alert alert-info">'+h+'</div>');
mydialog.buttons(true, true, 'Actualizar pagina', 'location.reload(true)', true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
                      });
                                    }
                                    {/literal}</script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    {else}
                    <div class="row">
                    <div class="col-lg-7">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Panel de Transacciones</h3>
                            </div>
                            <div class="panel-body">
                                {if $facturasall}
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
<th>Usuario</th>
<th>Estado</th>
<th>Fecha</th>
<th>Cantidad en dolares</th>
<th>Emitir a</th>
                                            </tr>
                                        </thead>
                                        <tbody>
{foreach from=$facturasall item=p}{if $p.buser_id}
<tr>
<td><a href="{$tsConfig.partner_url}/?page=payments&userid={$p.buser_id}" title="{$p.buser_id}">
<span>{if $p.buser_name || $p.buser_ap}{$p.buser_name} {$p.buser_ap}{else}{$p.buser_nick}{/if}</span></a></td>
<td>{if $p.c_type == 3}Sin revisar
    {elseif $p.c_type == 1}Pendiente
    {elseif $p.p_type == '1.5'}Emitido
    {elseif $p.c_type == '2.5'}Pagado
    {else}Sin revisar{/if}<b class="dsnone" style="display:none!important;">({$p.cid}-{$p.c_pais})</b></td>
<td>{$p.c_date|date_format} {if $p.p_date}{$p.p_date|date_format}{else}Hasta la fecha actual({$smarty.now|date_format}){/if}</td>
<td>$ {$p.c_dinero} USD</td>
<td><button class="btn btn-warning" onclick="location.href='{$tsConfig.partner_url}/?page=payments&userid={$p.buser_id}'">Ver</button></b></td>
</tr>
{/if}{/foreach}
                                        </tbody>
                                    </table>
                                </div>
                                {else}
                                <div class="alert alert-info">No hay ninguna factura por ahora</div>
                                {/if}
                            </div>
                        </div>
                    </div>
                </div>
                {/if}

                </div>

            </div>
            <script type="text/javascript">{literal}
            var postix = {
                pago: function(user, cid, tipo){
                    mydialog.loading('Emitiendo pago.');
                    $.post(global_data.url+'/ajax/babanta-pago.php', {'userid':user,'cid':cid,'t':tipo}, function (h){
                       mydialog.end_loading();
                        mydialog.alert('Pago', '<div class="alert alert-info">'+h+'</div>');
                    });
                }
            }
            {/literal}</script>
            {/if}