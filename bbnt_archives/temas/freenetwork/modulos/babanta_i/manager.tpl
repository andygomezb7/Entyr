        <div id="page-wrapper">

            <div class="container-fluid">

<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
<section class="content-header">
      <h1>
        Manager panel
        <small>Administrar {$tsConfig.net_name}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Manager panel</li>
      </ol>
    </section>

                <div class="row" style="margin:12px 0 0 0;">
                   <a style="display:block;" href="{$tsConfig.partner_url}/?page=red" class="alert alert-info">Te recordamos que tus ganancias como <b>manager</b> esta reflejadas en <b>Contabilidad de referidos</b>.</a>
<br />
<div class="col-md-12 padding-0">
                                <div class="col-md-6">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none" style="
    background: transparent;
">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                          <h4 class="text-left">Asignados</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                           <h4>
                                           <span class="icon-user icons icon text-right"></span>
                                           </h4>
                                        </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h1>{$asignadoscount}</h1>
                                        <p>Nuevos miembros asignados</p>
                                        <hr>
                                      </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="panel box-v1">
                                      <div class="panel-heading bg-white border-none" style="
    background: transparent;
">
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                                          <h4 class="text-left">Tus referidos</h4>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                                           <h4>
                                           <span class="icon-basket-loaded icons icon text-right"></span>
                                           </h4>
                                        </div>
                                      </div>
                                      <div class="panel-body text-center">
                                        <h1>{$referidoscount}</h1>
                                        <p>Tus registrados referidos</p>
                                        <hr>
                                      </div>
                                    </div>
                                </div>
                            </div>

<!---->
<br />
<div class="box box-primary" style="overflow:hidden;">
<div class="box-header with-border">
              <h3 class="box-title">Tus usuarios asignados</h3>
            </div>
<div class="box-body">
<div class="alert alert-info">Tus asignados te contactaran a este correo: <b>{$wuser->info.buser_mail}</b>.</div>
<div class="table-responsive">
                                        <table class="table user-list">
                                            <thead>
                                                <tr>
                                                    <th><span>Nick</span></th>
                                                    <th><span>Correo</span></th>
                                                    <th class="text-center"><span>Estado</span></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>{foreach from=$asignadoslist item=p}<tr>
                                                    <td>
                                                        
                                                        <a class="user-link">{$p.buser_nick}</a>
                                                        
                                                    </td>
                                                    <td>
                                                        <a href="mailito:{$p.buser_mail}">{$p.buser_mail}</a>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="label label-success">Activo</span>
                                                    </td>                                                    
                                                </tr>
                                                     {/foreach}                                       
                                            </tbody>
                                        </table>
                                    </div>
</div></div>
<center><div style="margin: 14px 0 0 0;">{$pageshtml}</div></center>
<!---->

                </div>

            </div>