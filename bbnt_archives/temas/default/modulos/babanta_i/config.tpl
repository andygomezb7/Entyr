<link rel="stylesheet" href="{$tsConfig.css}/tlde.css">
        <div id="page-wrapper">

            <div class="container-fluid">
                <!-- Page Heading -->
<section class="content-header" style="margin-bottom:15px;">
      <h1>
        Configuración de cuenta
        <small>Actualiza tu información</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {$tsConfig.net_name}</a></li>
        <li class="active">Configuración de cuenta</li>
      </ol>
    </section>
                <!-- /.row -->

      <div class="row">
      <div class="edt_cuenta">
{if $wuser->info.buser_data_fact == 2 || $wuser->info.buser_data_fact == '2'}        
<div class="col-md-12">
<div class="alert alert-info">Tu información esta siendo validada por un administrador.</div>
</div><hr>
{elseif $wuser->info.buser_data_fact == 3 || $wuser->info.buser_data_fact == '3'}
<div class="col-md-12">
<div class="alert alert-warning">Tu informaci&oacute;n fue aprobada. Ten en cuenta que si realizas cambios a esta información deber&aacute; pasar un proceso de validación nuevamente.</div>
</div><hr>
{/if}
<div class="col-md-6">
  <div class="panel panel-info" style="overflow: hidden;padding: 3px 17px;">
    <div class="panel-header">
<h2>Información de facturación</h2>
    </div>
<div class="panel-body">

<div class="form-group">
 <div class="form-group label-floating">
    <label for="i5" class="control-label">Nombre completo</label>
    <input type="text" name="namepart" value="{$wuser->info.buser_name}" class="form-control" id="i5">
    <span class="help-block">Nombre particular completo <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Dirección</label>
    <input type="text" name="dirpart" value="{$wuser->info.buser_date_1}" class="form-control" id="i5">
    <span class="help-block">Dirección Particular <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Ciudad</label>
    <input type="text" name="ciupart" value="{$wuser->info.buser_date_2}" class="form-control" id="i5">
    <span class="help-block">Ciudad de residencia <code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Estado / Provincia</label>
    <input type="text" name="stapart" value="{$wuser->info.buser_date_3}" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

   <div class="form-group label-floating">
    <label for="i5" class="control-label">Codigo postal</label>
    <input type="text" name="codpart" value="{$wuser->info.buser_codepostal}" class="form-control" id="i5">
    <span class="help-block"><code>obligatorio</code></span>
  </div>

      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button onclick="cuentapostix.set()" class="btn btn-primary">Guardar</button>
      </div>
      </div>

</div>

</div>
  </div>
</div>
<div class="col-md-6">
  <div class="panel panel-info" style="overflow: hidden;padding: 3px 17px;">
    <div class="panel-header">
<h2>Metodo de pago</h2>
    </div>
    <div class="panel-body">
      <div class="form-group">
      <label for="inputEmail" class="col-md-2 control-label" style="color:gray;">Metodo de pago</label>
      <div class="col-md-10">
      <select class="form-control" name="metodo" onchange="nameok($(this).val())">
        <option value="1" {if $wuser->info.partner_metodo == 1}selected="selected"{/if}>Paypal</option>
      </select>
      </div></div>
      <div class="form-group" style="clear:both!important;">
      <label for="inputEmail" class="col-md-2 control-label">Correo de PayPal</label>
      <div class="col-md-10">
      <input type="text" class="form-control" name="valor" value="{$wuser->info.partner_pago}" aria-label="..." placeholder="ej: mi_correo@hotmail.com">
      </div></div>
      <div class="form-group">
      <div class="col-md-10 col-md-offset-2">
        <button onclick="cuentapostix.set()" class="btn btn-primary">Enviar informaci&oacute;n de pago</button>
      </div>
      </div>
    </div>
    </div>
</div>

      </div>
       </div>



               <script type="text/javascript">{literal}
/*eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('7 v(a){e(a==1){5.9(\'z u t s w r y x A.\')}}c g={3:7(3,4){5.p(\'m n...\');c d=$(4+\' o[8],\'+4+\' q[8], \'+4+\' l[8]\');$.3({j:E.j+\'/3/\'+3+\'.M\',L:\'N\',O:$.B(d),P:7(h){5.K();e(h.J(0)==0){5.9(\'b\',\'<6 4="f" k="D">\'+h.i(2)+\'</6>\')}C{5.9(\'b\',\'<6 4="f" k="F">\'+h.i(2)+\'</6>\')}}})},H:7(){g.3(\'I-G\',\'.Q\')},}',53,53,'|||ajax|id|mydialog|div|function|name|alert|val|Aviso|var|params|if|error_flat|cuentapostix||substring|url|class|textarea|Guardando|datos|input|loading|select|Paypal|electronico|correo|tu|nameok|de|el|en|Escribe|campo|param|else|red_flat|global_data|blue_flat|cuenta|set|babanta|charAt|end_loading|type|php|POST|data|success|edt_cuenta'.split('|'),0,{}))*/

eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--){d[e(c)]=k[c]||e(c)}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('7 12(s){e(s==1){3.9(\'1d v 1e M r C g D B.\')}}u d={4:7(4,6){3.x(\'G K...\');u f=$(6+\' L[c],\'+6+\' S[c], \'+6+\' J[c]\');$.4({q:I.q+\'/4/\'+4+\'.N\',R:\'Q\',P:$.O(f),E:7(h){3.z();e(h.w(0)==0){3.9(\'m\',\'<8 6="k" l="A">\'+h.j(2)+\'</8>\')}F{3.9(\'m\',\'<8 6="k" l="17">\'+h.j(2)+\'</8>\')}}})},o:7(){d.4(\'1b-i\',\'.19\')},1a:7(){3.1g();3.1l(\'1k 1j\');3.1h(\'¿1i p 18 <b>t</b> Y Z&a;n?, X g i p W U V 10 11 16 r 15&a;n y 14&a;n.\');3.13(5,5,\'t\',"d.o()",5,5,5,\'1f\',\'1c\',5,H);3.T()},}',62,84,'|||mydialog|ajax|true|id|function|div|alert|oacute||name|cuentapostix|if|params|en||cuenta|substring|error_flat|class|Aviso||setyou|que|url|de|val|Actualizar|var|tu|charAt|loading||end_loading|red_flat|campo|Paypal|el|success|else|Guardando|false|global_data|textarea|datos|input|electronico|php|param|data|POST|type|select|center|enviara|para|se|ten|esta|informaci|pasar|un|nameok|buttons|validaci|revisi|proceso|blue_flat|quieres|edt_cuenta|set|babanta|close|Escribe|correo|Cancelar|show|body|Seguro|pregunto|Te|title'.split('|'),0,{}))
                {/literal}</script>
            </div>