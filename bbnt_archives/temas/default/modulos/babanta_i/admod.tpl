<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
        <div id="page-wrapper">

            <div class="container-fluid">

                <div class="row">
{if $tsAction == 'home' || $tsAction == 'editar'}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>{if $tsAction == 'editar'}Editar{else}Agregar{/if} contenido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">{if $tsAction == 'editar'}Editar{else}Agregar{/if} contenido</li>
      </ol>
    </section>

 <div class="panel-body">
<!--  AGREGAR NOTA  -->
  <fieldset class="add_new">
    {if $tsConfig.net_id ==2}<div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="name" value="{$noticia.postix_name}" aria-label="..." placeholder="Mi noticia">
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Imagen Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="{$noticia.postix_portada}" name="portada" aria-label="..." placeholder="http://wortit.net/images/avatar/group3.png">
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Direcci&oacute;n Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="{$noticia.postix_url}" name="url" aria-label="..." placeholder="http://miblog.com/blocat/post-name.html">
      </div></div>

      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">CPM (valor por mil)</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="cpm" value="{if $noticia.postix_valor}{$noticia.postix_valor}{else}2{/if}" min="1" max="5">
      </div></div>

      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Tipo de nota</label>
      <div class="col-md-10">
    <select class="form-control" name="notatype" onchange="notatype($(this).val())">
<option value="1" {if $noticia.postix_notatype==2 || !$noticia.postix_notatype}selected="selected"{/if}>Nota normal</option>
<option value="2" {if $noticia.postix_notatype==2}selected="selected"{/if}>Meta de visitas</option>
    </select>
    <div class="objetcon" style="display:{if $noticia.postix_notatype==2}block{else}none{/if};">{if $noticia.postix_notatype==2 || !$noticia.postix_id}
      <input type="text" class="form-control" placeholder="Meta de visitas" name="visitascount" value="{if $noticia.postix_visitascount}{$noticia.postix_visitascount}{else}{/if}" min="1" max="5">
      <input type="text" class="form-control" placeholder="CPM premium" name="cpmdos" value="{if $noticia.postix_valor2}{$noticia.postix_valor2}{else}{/if}" min="1" max="5">{/if}
    </div>
      </div></div>

    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Categoria</label>
      <div class="col-md-10">
        <input type="hidden" name="type" value="1" />
      <select class="form-control" name="valor">
        <option>Selecciona una categoria</option>
        {foreach from=$categorias item=c}
        <option value="{$c.postix_cat_id}" {if $tsAction == 'editar' && $noticia.postix_content == $c.postix_cat_id}selected="selected"{/if}>{$c.postix_cat_name}</option>
        {/foreach}
      </select>
      </div></div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <input type="hidden" name="action" value="{if $tsAction == 'editar' && $get_.pref}5{else}2{/if}" />
        {if $tsAction == 'editar' && $get_.pref}<input type="hidden" name="id" value="{$noticia.postix_id}" />{/if}
        <button onclick="admodpostix.add_new();" class="btn btn-primary">Guardar Notas</button>
      </div>
      </div> {/if}
      </fieldset>
  
  <!--  AGREGAR CATEGORIA  -->
    {if $tsAction != 'editar'}<hr>
    <fieldset class="add_cat">
    <legend class="col-sm-offset-2">Agregar Categoria</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="name" aria-label="..." placeholder="Mi categoria">
      </div></div>
      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
      <input type="hidden" name="action" value="2" />
      <button onclick="admodpostix.add_cat()" class="btn btn-primary">Crear Categoria</button>
    </div>
    </div>
    </fieldset><hr>
    {/if}
</div>
<div>
                <script type="text/javascript">{literal}

function notatype(val){
if(val== 2){
$('.objetcon').show();
}else{
$('.objetcon').hide();
}
}

                var admodpostix = {
                    ajax: function(ajax, id){
                        mydialog.loading('Guardando datos...');
                    var params = $(id+' input[name],'+id+' select[name], '+id+' textarea[name]');
                    $.ajax({
                    url: global_data.url+'/ajax/'+ajax+'.php',
                    type: 'POST',
                    data: $.param(params),
                    success: function(h){ mydialog.end_loading();
                    if(h.charAt(0) == 0){ 
                    mydialog.alert('Aviso', '<div id="error_flat" class="red_flat">'+h.substring(2)+'</div>')
                    }else{
                    mydialog.alert('Aviso', '<div id="error_flat" class="blue_flat">'+h.substring(2)+'</div>')
                    //location.reload(true);
                    }
                    }
                    })
                    },
                    add_cat: function (){
                        admodpostix.ajax('babanta-cat', '.add_cat');
                    },
                    edt_cat: function(){
                        admodpostix.ajax('babanta-cat', '.edt_cat');
                    },
                    add_new: function(){
                        admodpostix.ajax('babanta-new', '.add_new');
                    },
                    edt_new: function(){
                        admodpostix.ajax('babanta-new', '.edt_new');
                    }
                }
                {/literal}</script>
</div>
{elseif $tsAction == 'webmaster'}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>Solicitudes de Webmaster</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">Solicitudes de webmaster</li>
      </ol>
    </section>
<div class="row panel-body">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading">Solicitudes de <b>Websmasters</b></div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Estado</th>
    <th>Ver Solicitud</th>
    <th>Funciones</th>
  </thead>
  <tbody>
    {foreach from=$websolit item=ws}
    <tr id="solicitud{$ws.buser_id}">
      <td>{if $ws.buser_name}{$ws.buser_name} ({$ws.buser_id}){else}{$ws.buser_nick} ({$ws.buser_id}){/if}</td>
      <td>{if $ws.buser_state==2}Actualizaci&oacute;n de cuenta{elseif $ws.buser_state==3}Registro webmaster{else}{$ws.buser_state}{/if}</td>
      <td><a class="btn btn-success" href="javascript:void(0)" onclick="mydialog.alert('Solicitud de {$ws.buser_nick} ({$ws.buser_id})', '<b>Sitio web: </b><i>{$ws.buser_state_web}</i>\n<br /><b>Estado: </b><i>{if $ws.buser_state==2}Actualizaci&oacute;n de cuenta{elseif $ws.buser_state==3}Registro webmaster{else}{$ws.buser_state}{/if}<i>');">Ver solicitud</a></td>
      <td><a class="btn btn-success" href="javascript:void(0)" onclick="acceptwebmast({$ws.buser_id})">Aceptar Solicitud</a></td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
<hr>
<center><div style="margin:0 40px;">{$pageshtml}</div></center>
</div>
<script type="text/javascript">{literal}
function acceptwebmast(uid){
  mydialog.loading('Confirmando solicitud...');
$.ajax({
  url: global_data.url+'/ajax/babanta-webmasterk.php',
  type: 'POST',
  data: 'confirm=true&userid='+uid,
  success: function(h){
    mydialog.end_loading();
    mydialog.alert('Confirmar solicitud', '<div class="alert alert-info">'+h+'</div>');
    $('#solicitud'+uid).remove();
  }
});
}
{/literal}</script>
                </div>
{elseif $tsAction == 'locationsolit'}
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAvqSWPhgdlIvmldQ9m-LzPHFGL0ihE3E8"></script>
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>{if $location_user}Direcciones de los usuarios{else}Nuevas direcciones{/if}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">{if $location_user}Direcciones de los usuarios{else}Nuevas direcciones{/if}</li>
      </ol>
    </section>
<div class="row panel-body">
<div class="col-md-12">}
{if $location_user}
<div class="alert alert-warning">Estas viendo las solicitudes de <b>{$location_user}</b></div>
<hr />
  {/if}
<div class="panel panel-info">
<div class="panel-heading"><b>Direcciones</b> en solicitud</div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Fecha</th>
    <th>Estado</th>
    <th>Funciones</th>
  </thead>
  <tbody>
    {foreach from=$locationsolit item=ws}
    <tr id="solicitudl{$ws.buser_id}">
      <td><a href="{$tsConfig.partner_url}/?page=admod&action=locationsolit&pref={$ws.buser_id}">{if $ws.buser_name}{$ws.buser_name} ({$ws.buser_id}){else}{$ws.buser_nick} ({$ws.buser_id}){/if}</a></td>
      <td>{$ws.buser_date_3}, <i>{$ws.buser_date_2}</i></td>
      <td>{if $ws.factura_date}{$ws.factura_date|date_format}{else}No ha sido revisada (en revici&oacute;n{/if}</td>
      <td>{if $ws.buser_data_fact == 2}En revici&oacute;n{elseif $ws.buser_data_fact == 3}Aprobado{elseif $ws.buser_data_fact == 4}Rechazado{elseif $ws.buser_data_fact == 5}Requiere cambios{/if}</td>
      <td><a class="btn btn-success" href="javascript:void(0)" onclick="confirmlocation_modal({$ws.buser_id},'<b>Nombre completo: </b><i>{$ws.buser_name}</i>\n<br /><b>Direcci&oacute;n: </b><i>{$ws.buser_date_1}</i>\n<br /><b>Ciudad: </b><i>{$ws.buser_date_2}</i>\n<br /><b>Estado: </b><i>{$ws.buser_date_3}</i>\n<br /><b>C&oacute;digo postal: </b><i>{$ws.buser_codepostal}</i>', '{$ws.buser_date_2}', '{$ws.buser_date_3}, {$ws.buser_date_1}')">Revisar direccï&oacute;n</a></td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
<center><div style="margin:0 40px;">{$pageshtml}</div></center>
</div>
<style type="text/css">{literal}
.active3{background: green!important}
.active4{background: red!important}
.active5{background: #ccc!important}
{/literal}</style>
<script type="text/javascript">{literal}
function confirmlocation_modal(uid, data_info, fact_pais, fact_dir){
mydialog.show();
mydialog.title('Solicitud de dirección');
mydialog.body(data_info+'<hr><div class="row data_1"><div class="col-lg-12"><div class="input-group"><span class="input-group-addon"><select name="datoda"><option value="">Realizar</option><option value="3">Confirmar</option><option value="4">Rechazar</option><option value="5">Por favor mejorar</option></select></span><input type="text" class="form-control" placeholder="Envia una descripci&oacute;n" name="desc" aria-label="..."></div></div></div><hr><div class="col-md-12 maps_user" id="maps_user"><div class="col-md-12 googleMapUser" id="googleMapUser" style="height:370px;"></div><div class="col-md-6 googleMapLap" id="googleMapLap" style="display:none;"></div></div>');
mydialog.buttons(true, true, 'Enviar', "confirmlocation("+uid+")", true, true, true, 'Cerrar', 'close', true, false);
mydialog.center();
//
   var address = fact_pais+', '+fact_dir;

   var map = new google.maps.Map(document.getElementById('googleMapUser'), { 
       mapTypeId: google.maps.MapTypeId.TERRAIN,
       zoom: 6
   });

   var geocoder = new google.maps.Geocoder();

   geocoder.geocode({
      'address': address
   }, 
   function(results, status) {
      if(status == google.maps.GeocoderStatus.OK) {
         new google.maps.Marker({
            position: results[0].geometry.location,
            map: map
         });
         map.setCenter(results[0].geometry.location);
      }
   });
//
}
function confirmlocation(uid){
  mydialog.loading('Enviando registro...');
$.ajax({
  url: global_data.url+'/ajax/babanta-locationwk.php',
  type: 'POST',
  data: 'confirm='+$('#mydialog .data_1 select[name=datoda]').val()+'&userid='+uid+'&ss='+$('#mydialog .data_1 input[name=desc]').val(),
  success: function(h){
    mydialog.end_loading();
    mydialog.alert('Solicitud de direcci&oacute;n', '<div class="alert alert-info">'+h+'</div>');
    $('#solicitudl'+uid).addClass('active3');
  }
});
}
{/literal}</script>
</div>
{elseif $tsAction == 'pages'}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>P&aacute;ginas</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">P&aacute;ginas</li>
      </ol>
    </section>
<div class="row panel-body">
<div class="col-md-12">
  {if $buser_pages}
  <div class="alert alert-warning">Estas viendo las p&aacute;nas de <b>{$buser_pages}</b></div>
  {/if}
<div class="panel panel-info">
<div class="panel-heading">Nuevas paginas</div>
<style type="text/css">{literal}
.widget .label-info { float: right; }
.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;padding: 5px 5px 5px;display: block;}
.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
.widget .mic-info { color: #666666;font-size: 11px; }
.widget .comment-text { font-size: 12px; }
.widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
{/literal}</style>
<div class="widget">
                <ul class="list-group">
{foreach from=$pagesadmin item=p}{if $p.postix_name && $p.info.username}
                    <li class="list-group-item fbpage{$p.postix_id}">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://images.babanta.com/?file={$p.info.cover.source}" alt="" style="width: 47px;height: 47px;margin: 4px;" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="{$p.info.link}">{$p.info.name}</a>
                                    <div class="mic-info">
                                        Agregado por <i><a href="{$tsConfig.partner_url}?page=admod&action=pages&pref={$p.buser_id}">{$p.buser_nick}</a></i> - <b>{$p.info.likes|posnum}</b> Likes - {if $p.info.is_published == true}<font color="green">Publicada</font>{else}<font color="gray">No publicada</font>{/if}
                                    </div>
                                </div>
                                <div class="comment-text">
                                    {$p.info.description} - Categoria: {$p.info.category}
                                </div>
                            </div>
                        </div>
                    </li>
{/if}{/foreach}
                </ul>
</div>

</div>
<center><div style="margin:0 40px;">{$pageshtml}</div></center>
</div>
</div>
{elseif $tsAction == 'pubs'}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>Publicaciones</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">Publicaciones</li>
      </ol>
    </section>
<div class="row panel-body">
<div class="col-md-12">
<div class="panel panel-info">
<div class="panel-heading">Publicaciones nuevas</div>
<table class="table">
  <thead>
    <th>Nombre</th>
    <th>Fecha</th>
  </thead>
  <tbody>
    {foreach from=$publicadmin item=tt}
    <tr>
      <td><a href="{$tt.postix_url}">{$tt.postix_url|truncate:32}</a></td>
      <td>{$tt.postix_hace|hace}</td>
    </tr>
    {/foreach}
  </tbody>
</table>
</div>
<center><div style="margin:0 40px;">{$pageshtml}</div></center>
</div>
</div>
{elseif $tsAction == 'camp'}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>Campa&ntilde;as</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">Campa&ntilde;as</li>
{if $get_.preg == 'editar' && $get_.pref}
<li class="active">Editor</li>
{/if}
      </ol>
    </section>

<div class="row" style="margin:13px 0 0 0;">
  <fieldset class="add_camp">
    <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Tipo de la campa&ntilde;a</label>
      <div class="col-md-10">
<select class="form-control" name="tp">
<option value="1" >Descargas</option>
<option value="2" >Ocio</option>
<option value="3">Adulto (+18)</option>
</select>
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Dimensiones</label>
      <div class="col-md-10">
    <select class="form-control" name="tam">
<option value="1">300x250</option>
    <option value="2">336 x 280</option>
    <option value="3">728 x 90</option>
    <option value="4">300 x 600</option>
    <option value="5">320 x 100</option>
    <option value="6">160 x 600</option>
    </select>
      </div></div>
          <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Plantilla</label>
      <div class="col-md-10">
<select class="form-control" name="pl">
<option value="1" >300x250 con boton enmedio</option>
<option value="2" >728x90 bot&oacute;n ala derecha</option>
<option value="3">Bot&oacute;n amarillo</option>
<option value="4">Bot&oacute;n azul</option>
<option value="5">320x100 recomendados</option>
<option value="6">300x250 recomendados</option>
<option value="7">Imag&eacute;n simple</option>
</select>
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Imagen Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="" name="i" aria-label="..." placeholder="http://wortit.net/images/avatar/group3.png">
      </div></div>
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Direcci&oacute;n Url</label>
      <div class="col-md-10">
      <input type="text" class="form-control" value="" name="u" aria-label="..." placeholder="http://miblog.com/blocat/post-name.html">
      </div></div>

      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Titulo</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="t" value="" min="1" max="5">
      </div></div>

      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Sub titulo</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="st" value="" min="1" max="5">
      </div></div>

      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label">Nombre del bot&oacute;n</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="bt" value="{if $noticia.postix_valor}{$noticia.postix_valor}{else}2{/if}" min="1" max="5">
      </div></div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <input type="hidden" name="action" value="{if $get_.preg == 'editar' && $get_.pref}5{else}2{/if}" />
        {if $get_.preg == 'editar' && $get_.pref}<input type="hidden" name="id_edit" value="{$get_.pref}" />{/if}
        <button onclick="admodpostix.add_new();" class="btn btn-primary">Guardar Campa&ntilde;a</button>
      </div>
      </div>

       <script type="text/javascript">{literal}
                var admodpostix = {
                    ajax: function(ajax, id){
                        mydialog.loading('Guardando datos...');
                    var params = $(id+' input[name],'+id+' select[name], '+id+' textarea[name]');
                    $.ajax({
                    url: global_data.url+'/ajax/'+ajax+'.php',
                    type: 'POST',
                    data: $.param(params),
                    success: function(h){ mydialog.end_loading();
                    if(h.charAt(0) == 0){ 
                    mydialog.alert('Aviso', '<div id="error_flat" class="red_flat">'+h.substring(2)+'</div>')
                    }else{
                    mydialog.alert('Aviso', '<div id="error_flat" class="blue_flat">'+h.substring(2)+'</div>')
                    //location.reload(true);
                    }
                    }
                    })
                    },
                    add_new: function(){
                        admodpostix.ajax('babanta-addcamp', '.add_camp');
                    }
                }
                {/literal}</script>
      </fieldset>
<hr />
<div class="panel panel-info">
<div class="panel-heading">Campa�0�9as</div>
<style type="text/css">{literal}
.widget .label-info { float: right; }
.widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;padding: 5px 5px 5px;display: block;}
.widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
.widget .mic-info { color: #666666;font-size: 11px; }
.widget .comment-text { font-size: 12px; }
.widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
{/literal}</style>
<div class="widget">
                <ul class="list-group">
{foreach from=$bpromos item=p}
                    <li class="list-group-item fbpage{$p.bpr_obj_type}">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="http://images.babanta.com/?file={$p.bpr_image}" alt="" style="width: 47px;height: 47px;margin: 4px;" /></div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    <a href="{$tsConfig.partner_url}?page=admod&action=camp&preg=editar&pref={$p.bpr_id}">{if $p.bpr_tama == 1}300x250
{elseif $p.bpr_tama == 2}336 x 280
{elseif $p.bpr_tama == 3}728 x 90
{elseif $p.bpr_tama == 4}300 x 600
{elseif $p.bpr_tama == 5}320 x 100
{elseif $p.bpr_tama == 6}160 x 600
{/if} - {if $p.bpr_tipo == 1}Descargas{elseif $p.bpr_tipo == 2}Ocio{elseif $p.bpr_tipo == 3}Adulto{/if}</a>
                                    <div class="mic-info">
                                        Agregado por <i><a href="{$tsConfig.partner_url}?page=admod&action=payments&pref={$p.bpr_user}">{$p.bpr_user}</a></i>
                                    </div>
                                </div>
                                <div class="comment-text">
                                    {$p.bpr_text} <small>{$p.bpr_subtext}</small> _ {$p.bpr_button_name}
                                </div>
                            </div>
                        </div>
                    </li>
{/foreach}
                </ul>
</div>

</div>
<center><div style="margin:0 40px;">{$pageshtml}</div></center>

</div>
{else}
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Administrador Panel
        <small>Menu principal</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Administrador Panel</li>
        <li class="active">Menu principal</li>
      </ol>
    </section>

<div class="btn-group btn-group-lg" role="group" aria-label="...">
  <div class="btn-group" role="group" aria-label="...">
<a type="button" href="{$tsConfig.partner_url}?page=admod&action=home" class="btn btn-default">Agregar contenido</a>
{* <a type="button" href="{$tsConfig.partner_url}?page=admod&action=webmaster" class="btn btn-default">Webmasters Admin</a> *}
<a type="button" href="{$tsConfig.partner_url}?page=admod&action=locationsolit" class="btn btn-default">Direcciones Admin</a>
{* <a type="button" href="{$tsConfig.partner_url}?page=admod&action=camp" class="btn btn-default">Campa&ntilde;as</a> *}
</div>
<div class="btn-group" role="group" aria-label="...">
<a type="button" href="{$tsConfig.partner_url}?page=admod&action=pages" class="btn btn-default">P&aacute;ginas</a>
{* <a type="button" href="{$tsConfig.partner_url}?page=admod&action=pubs" class="btn btn-default">Publicaciones</a> *}
</div>
</div>

{/if}

</div>
</div>