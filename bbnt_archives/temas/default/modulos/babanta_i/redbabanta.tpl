        <link rel="stylesheet" href="{$tsConfig.css}/tlde.css"><div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
<section class="content-header" style="margin-bottom:12px;">
      <h1>
        Red Babanta
        <small>Administra tus ganancias</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Babanta</a></li>
        <li class="active">Red Babanta</li>
      </ol>
    </section>
                <!-- /.row -->

<section class="content">
      

<div style="margin: 0 0 6px;display: inline-block;position: relative;"><span>Estadisticas estaticas</span>&nbsp; </div>
      <div class="row">
        
        
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-usd" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Por cobrar" alt="Por cobrar">Ingresos</span>
              <span class="info-box-number"><span class="ingresos">{$ingresos.c_referidos}</span> <small>USD</small></span>
            </div>
            
          </div>
          
        </div>
        

        
        <div class="clearfix visible-sm-block"></div>
        
        <div class="col-md-4 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-users" style="line-height:90px;"></i></span>

            <div class="info-box-content">
              <span class="info-box-text" title="Referidos" alt="Referidos">Referidos</span>
              <span class="info-box-number"><span class="CPM">{$referidoscount}</span> <small style="font-size:11px;">Registrados</small></span>
            </div>
            
          </div>
          
        </div>
        
      </div>
      

      
      

      
      <div class="row">
        
        <div class="col-md-8">
          
          
          
          
          
<div class="row">
<div class="col-md-12"><div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tus Referidos</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body">
<div class="alert alert-danger"><b>Aviso:</b> Esta es una versión BETA, puede que los ingresos no sean exactos o tengan ciertos problemas en su calculo.</div>
<hr />
<div class="table-responsive">
                                        <table class="table user-list">
                                            <thead>
                                                <tr>
                                                    <th><span>Usuario</span></th>
                                                    <th><span>Created</span></th>
                                                    <th class="text-center"><span>Estado</span></th>
                                                    <th><span>Monto</span></th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {foreach from=$referidoslist item=rl}
                                                <tr>
                                                    <td>
                                                        
                                                        <a class="user-link">{$rl.buser_id}</a>
                                                        
                                                    </td>
                                                    <td>
                                                        {$rl.c_date|date_format}
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="label label-success">Activo</span>
                                                    </td>
                                                    <td>
                                                        $ <b>{$rl.c_dinero*5/100}</b> USD
                                                    </td>
                                                    
                                                </tr>
                                            {/foreach}
                                                
                                            </tbody>
                                        </table>
                                    </div>

            </div>
            
            
            
          </div></div>
<div class="col-md-12"> 
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Link de Referidos</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body">
<small>Los referidos de Babanta funcionan de tal manera que cada persona que se registre desde tu enlace ganas <b>el 5%</b> de lo de tus referidos.</small>
<hr>
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1"><i class="fa fa-users" aria-hidden="true"></i></span>
  <div class="form-group"><input type="text" class="form-control" value="{if $referidoslink}{$referidoslink}{else}{$tsConfig.net_url}?a={$wuser->uid}{/if}" aria-describedby="basic-addon1" /></div>
</div>
            </div>
            
            <div class="box-footer text-center">
              <a href="http://facebook.com/groups/postix/" class="uppercase"></a>
            </div>
            
          </div></div>
</div>
          
          
          
        </div>
        

        <div class="col-md-4">
<div class="row" style="/* display:none; */">

            <div class="col-md-12">
              
<div class="box box-primary" style="background: #fbfafa;border: 1px solid #eee;">
            <div class="box-header with-border">
              <h3 class="box-title">Soporte y ayuda</h3>

              <div class="box-tools pull-right">
              </div>
            </div>
            
            <div class="box-body"><div>
                <div class="row">
                    <div class="col-sm-10 col-md-12">
                        <h4>@{$managerinfo.buser_nick}</h4>
                        <small style="margin: 0 0 5px 0;display: block;"><cite title="Manager Babanta">Manager verificado <i class="fa fa-check">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>&nbsp;{$managerinfo.buser_mail}
                        </p> 
                    </div>
                </div>
            </div></div></div>


              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Reportar a administración</h3>

                  <div class="box-tools pull-right">
                  </div>
                </div>
                
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    <li style="width:100%;">
                      <script data-pagespeed-no-defer="" type="text/javascript">{literal}//<![CDATA[
(function(){var g=this;function h(b,d){var a=b.split("."),c=g;a[0]in c||!c.execScript||c.execScript("var "+a[0]);for(var e;a.length&&(e=a.shift());)a.length||void 0===d?c[e]?c=c[e]:c=c[e]={}:c[e]=d};function l(b){var d=b.length;if(0<d){for(var a=Array(d),c=0;c<d;c++)a[c]=b[c];return a}return[]};function m(b){var d=window;if(d.addEventListener)d.addEventListener("load",b,!1);else if(d.attachEvent)d.attachEvent("onload",b);else{var a=d.onload;d.onload=function(){b.call(this);a&&a.call(this)}}};var n;function p(b,d,a,c,e){this.h=b;this.j=d;this.l=a;this.f=e;this.g={height:window.innerHeight||document.documentElement.clientHeight||document.body.clientHeight,width:window.innerWidth||document.documentElement.clientWidth||document.body.clientWidth};this.i=c;this.b={};this.a=[];this.c={}}function q(b,d){var a,c,e=d.getAttribute("data-pagespeed-url-hash");if(a=e&&!(e in b.c))if(0>=d.offsetWidth&&0>=d.offsetHeight)a=!1;else{c=d.getBoundingClientRect();var f=document.body;a=c.top+("pageYOffset"in window?window.pageYOffset:(document.documentElement||f.parentNode||f).scrollTop);c=c.left+("pageXOffset"in window?window.pageXOffset:(document.documentElement||f.parentNode||f).scrollLeft);f=a.toString()+","+c;b.b.hasOwnProperty(f)?a=!1:(b.b[f]=!0,a=a<=b.g.height&&c<=b.g.width)}a&&(b.a.push(e),b.c[e]=!0)}p.prototype.checkImageForCriticality=function(b){b.getBoundingClientRect&&q(this,b)};h("pagespeed.CriticalImages.checkImageForCriticality",function(b){n.checkImageForCriticality(b)});h("pagespeed.CriticalImages.checkCriticalImages",function(){r(n)});function r(b){b.b={};for(var d=["IMG","INPUT"],a=[],c=0;c<d.length;++c)a=a.concat(l(document.getElementsByTagName(d[c])));if(0!=a.length&&a[0].getBoundingClientRect){for(c=0;d=a[c];++c)q(b,d);a="oh="+b.l;b.f&&(a+="&n="+b.f);if(d=0!=b.a.length)for(a+="&ci="+encodeURIComponent(b.a[0]),c=1;c<b.a.length;++c){var e=","+encodeURIComponent(b.a[c]);131072>=a.length+e.length&&(a+=e)}b.i&&(e="&rd="+encodeURIComponent(JSON.stringify(t())),131072>=a.length+e.length&&(a+=e),d=!0);u=a;if(d){c=b.h;b=b.j;var f;if(window.XMLHttpRequest)f=new XMLHttpRequest;else if(window.ActiveXObject)try{f=new ActiveXObject("Msxml2.XMLHTTP")}catch(k){try{f=new ActiveXObject("Microsoft.XMLHTTP")}catch(v){}}f&&(f.open("POST",c+(-1==c.indexOf("?")?"?":"&")+"url="+encodeURIComponent(b)),f.setRequestHeader("Content-Type","application/x-www-form-urlencoded"),f.send(a))}}}function t(){var b={},d=document.getElementsByTagName("IMG");if(0==d.length)return{};var a=d[0];if(!("naturalWidth"in a&&"naturalHeight"in a))return{};for(var c=0;a=d[c];++c){var e=a.getAttribute("data-pagespeed-url-hash");e&&(!(e in b)&&0<a.width&&0<a.height&&0<a.naturalWidth&&0<a.naturalHeight||e in b&&a.width>=b[e].o&&a.height>=b[e].m)&&(b[e]={rw:a.width,rh:a.height,ow:a.naturalWidth,oh:a.naturalHeight})}return b}var u="";h("pagespeed.CriticalImages.getBeaconData",function(){return u});h("pagespeed.CriticalImages.Run",function(b,d,a,c,e,f){var k=new p(b,d,a,e,f);n=k;c&&m(function(){window.setTimeout(function(){r(k)},0)})});})();pagespeed.CriticalImages.Run('/mod_pagespeed_beacon','http://www.babanta.net/','vsddupemmZ',true,false,'3PhrNUHFj14');
//]]>{/literal}</script><img src="https://2.bp.blogspot.com/-taiXSiL98fY/V6vixrCm1yI/AAAAAAAADUw/5lXv84vxBsgFCq4UeUUK5jcIAPdnm6h5gCLcB/s1600/babanta-favicon.png" alt="User Image" data-pagespeed-url-hash="1733176118" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                      <a class="users-list-name" href="javacsript:void(0);" style="
    margin: 7px 0 0 0;
">Babanta Network</a>
                      <span class="users-list-date"><a href="mailito:Babanta.net@gmail.com">Babanta.net@gmail.com</a></span>
                    </li>
                  </ul>
                  
                </div>

                
              </div>
              
            </div>
            
          </div>

        </div>
        
      </div>
      
      </section>

            </div>