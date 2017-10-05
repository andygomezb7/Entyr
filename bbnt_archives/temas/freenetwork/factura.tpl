<html lang="es">
<head><meta charset="utf-8" />
<link rel="shortcut icon" href="http://cpm.babanta.net/favicon.png?time=1476403966" type="image/x-icon"/>
<title>Babanta.net - Factura #{$facturainfo.cid}</title>
<link rel="stylesheet" href="http://www.babanta.net/bbnt_archives/css/bootstrap.min.css?time={$smarty.now}">
<script src="http://www.babanta.net/bbnt_archives/js/bootstrap.js?time={$smarty.now}" type="text/javascript"></script>
</head>
<body>
<div class="container-fluid invoice-container">

        
            <div class="row">
                <div class="col-sm-7">

                                            <p><img src="http://www.babanta.net/bbnt_archives/images/logo.png" title="Babanta.net"></p>
                                        <h3>Factura #{$facturainfo.cid}</h3>

                </div>
                <div class="col-sm-5 text-center">

                    <div class="invoice-status">
{if $facturainfo.c_type == 3}
<span class="draft">Sin revisar</span>
{elseif $facturainfo.c_type == 1}
<span class="unpaid">Pendiente de pago</span>
{elseif $facturainfo.c_type == '1.5'}
<span class="unpaid">Pago en proceso</span>
{elseif $facturainfo.c_type == '2.5'}
<span class="paid">Pago completado</span>
{elseif $facturainfo.c_type == '5'}
<span class="draft">Recaudando</span>
{elseif $facturainfo.c_type == '6'}
<span class="unpaid">Centavos</span>
{elseif $facturainfo.c_type == '7'}
<span class="unpaid">$1 USD en Proceso</span>
{else}
<span class="draft">Sin revisar</span> 
{/if}

                                            </div>

                    
                </div>
            </div>

            <hr>

            
            <div class="row">
                <div class="col-sm-6 pull-sm-right text-right-sm">
                    <strong>Pago por:</strong>
                    <address class="small-text">
                        Wortit
                    </address>
                </div>
                <div class="col-sm-6">
                    <strong>Factura para:</strong>
                    <address class="small-text">
                        {$userinfo.buser_nick}<br>                        
                        {$userinfo.buser_mail}
                                            </address>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <strong>Metodo de pago:</strong><br>
                    <span class="small-text">
                    {if $userinfo.partner_metodo == 1}PayPal{else}PayPal autodefinido{/if}
                    </span>
                    <br><br>
                </div>
                <div class="col-sm-6 text-right-sm">
                    <strong>Fecha de la factura:</strong><br>
                    <span class="small-text">
                        {$facturainfo.c_date|date_format}<br><br>
                    </span>
                </div>
            </div>

            <br>

            
            
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Datos de la factura</strong></h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <td><strong>Descripci&oacute;n</strong></td>
                                    <td width="20%" class="text-center"><strong>Monto</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>Ingresos generados en Babanta.net ({$facturainfo.c_date|date_format})</td>
                                        <td class="text-center">$ {if $pagoinfo.p_dinero}{$pagoinfo.p_dinero}{else}{$facturainfo.c_dinero}{/if} USD</td>
                                    </tr>
                                <tr>
                                    <td class="total-row text-right"><strong>Sub Total</strong></td>
                                    <td class="total-row text-center">${if $pagoinfo.p_dinero}{$pagoinfo.p_dinero}{else}{$facturainfo.c_dinero}{/if} USD</td>
                                </tr>
                                 {if $facturainfo.c_type == '5'}<tr>
                                    <td class="total-row text-right"><strong>Recaudado</strong></td>
                                    <td class="total-row text-center">${$facturainfo.c_recaudado} USD</td>
                                </tr>{/if}
                                <tr>
                                    <td class="total-row text-right"><strong>{if $facturainfo.c_type == '5'}Deuda total{else}Total{/if}</strong></td>
                                    <td class="total-row text-center">$ {if $facturainfo.c_type == '5'}
{assign var=recaudadomenosdinero value=$facturainfo.c_recaudado-$facturainfo.c_dinero|replace:",":"."}
{$recaudadomenosdinero|replace:"-":""}{else}{if $pagoinfo.p_dinero}{$pagoinfo.p_dinero}{else}{$facturainfo.c_dinero}{/if}{/if} USD</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            
            {if $facturainfo.c_type == '2.5'}<div class="transactions-container small-text">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <td class="text-center"><strong>Fecha de transacción</strong></td>
                                <td class="text-center"><strong>Metodo</strong></td>
                                <td class="text-center"><strong>ID de transacción</strong></td>
                                <td class="text-center"><strong>Monto</strong></td>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td class="text-center">{if $pagoinfo.p_date}{$pagoinfo.p_date|date_format}{else}{$facturainfo.c_coment|date_format}{/if}</td>
                                    <td class="text-center">{if $userinfo.partner_metodo == 1}PayPal{else}PayPal autodefinido{/if}</td>
                                    <td class="text-center" style="text-transform:uppercase;">{if $pagoinfo.p_secret}{$pagoinfo.p_secret}{else}{$facturainfo.c_secret}{/if}</td>
                                    <td class="text-center">${if $pagoinfo.p_dinero}{$pagoinfo.p_dinero}{else}{$facturainfo.c_dinero}{/if} USD</td>
                                </tr>
                                                        <tr>
                                <td class="text-right" colspan="3"><strong>Balance</strong></td>
                                <td class="text-center">${if $pagoinfo.p_dinero}{$pagoinfo.p_dinero}{else}{$facturainfo.c_dinero}{/if} USD</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>{/if}

            <div class="pull-right btn-group btn-group-sm hidden-print">
                <a href="javascript:window.print()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
                {* <a href="dl.php?type=i&amp;id=167304" class="btn btn-default"><i class="fa fa-download"></i> Download</a> *}
            </div>

        
    </div>
    <p class="text-center hidden-print"><a href="{$tsConfig.net_url}/?ref=factura-{$facturainfo.cid}">« Regresar a {$tsConfig.net_name}</a></p>
    <style type="text/css">{literal}
    body {
    background-color: #efefef;
}

/* Container Responsive Behaviour */

.invoice-container {
    margin: 15px auto;
    padding: 70px;
    max-width: 850px;
    background-color: #fff;
    border: 1px solid #ccc;
    -moz-border-radius: 6px;
    -webkit-border-radius: 6px;
    -o-border-radius: 6px;
    border-radius: 6px;
}

@media (max-width: 895px) {
    .invoice-container {
        margin: 15px;
    }
}
@media (max-width: 767px) {
    .invoice-container {
        padding: 45px 45px 70px 45px;
    }
}

/* Invoice Status Formatting */

.invoice-container .invoice-status {
    margin: 20px 0 0 0;
    text-transform: uppercase;
    font-size: 24px;
    font-weight: bold;
}

/* Invoice Status Colors */

.draft {
    color: #888;
}
.unpaid {
    color: #cc0000;
}
.paid {
    color: #779500;
}
.refunded {
    color: #224488;
}
.cancelled {
    color: #888;
}
.collections {
    color: #ffcc00;
}

/* Payment Button Formatting */

.invoice-container .payment-btn-container {
    margin-top: 5px;
    text-align: center;
}
.invoice-container .payment-btn-container table {
    margin: 0 auto;
}

/* Text Formatting */

.invoice-container .small-text {
    font-size: 0.9em;
}

/* Invoice Items Table Formatting */

.invoice-container td.total-row {
    background-color: #f8f8f8;
}
.invoice-container td.no-line {
    border: 0;
}

    {/literal}</style>
</body>
</html>