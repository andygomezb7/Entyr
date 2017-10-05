    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{$tsConfig.css}/animate.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="{$tsConfig.css}/creative.css">
    <body id="page-top">

    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">{$tsConfig.name}</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#about">{if $idioma == 'en'}About{else}Acerca de{/if}</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">{if $idioma == 'en'}Service{else}Servicio{/if}</a>
                    </li>
                    {* <li>
                        <a class="page-scroll" href="#portfolio">Comentarios</a>
                    </li> *}
                    <li>
                        <a class="page-scroll" href="#contact">{if $idioma == 'en'}SIGN UP!{else}Registrarte!{/if}</a>
                    </li>
                    <li>
                        <a href="https://chrome.google.com/webstore/detail/babanta-network/cffflhkignoaboaeokjjfibfjdamboeb/reviews">¡Extención!</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header style="min-height:470px;background-image:url(//www.babanta.net/bbnt_archives/images/fondo3.png?babanta=cool);background-color:#eee!important;color:#4E4747!important;">
        <div class="header-content">
            <div class="header-content-inner" style="text-shadow: -2px 4px 24px #000;">
                <h1 style="text-shadow:none!important;color:white!important;">GENERA DINERO CON EL MEJOR CPM DEL MERCADO!</h1>
                <hr>
                <p style="color:white!important;">{if $idioma == 'en'}GENERATE REVENUE FROM YOUR SOCIAL NETWORKS SIMPLE WAY!{else}GENERA INGRESOS CON TUS REDES SOCIALES DE MANERA SIMPLE!{/if}</p>
<div class="topbuttons">
                <a href="#about" class="btn btn-primary btn-xl page-scroll button_bux_1" >{if $idioma == 'en'}Learn more!{else}Conocer más!{/if}</a>
                <a href="javascript:void(0)" onclick="anonimo.login()" class="btn btn-success btn-xl button_bux_2 ">{if $idioma == 'en'}Login{else}Ingresar{/if}</a>
                <a href="javascript:void(0)" onclick="anonimo.register()" class="btn btn-info btn-xl button_bux_3">{if $idioma == 'en'}Register{else}Registrarme{/if}</a>
</div>
            </div>
        </div>
    </header>
	<style>
	{literal}
	.button_bux_1{
		color: white !important;
		background-color: #009688 !important;
		opacity:0.8;
	}
	.button_bux_2{
		color: white !important;
		background-color: #4caf50 !important;
		opacity:0.8;
	}
	.button_bux_3{
		color: white !important;
		background-color: #03a9f4 !important;
		opacity:0.8;
	}
	.button_bux_4{
		color: white !important;
		background-color: black !important;
		opacity:0.8;
	}
	.button_bux_5{
		color: black !important;
		background: white !important;
		opacity:0.8;
	}
	    
	.button_bux_1:hover, .button_bux_2:hover, .button_bux_3:hover, .button_bux_4:hover {
		opacity:1;
	}
.topbuttons {
    width: 100%;
    position: absolute;
    right: 0;
    left: 0;
    /* background: rgb(91, 73, 85); */
    padding: 0 0;
}
.topbuttons a {
    padding: 18px 19px;
    margin: -2px -2px 0;
    text-shadow: none;
    font-size: 15px;
    letter-spacing: 2px;
    border-radius: 0!important;
}
.navbar-default.affix .navbar-header .navbar-brand{color: rgb(210, 206, 206)!important;}
.navbar-default .nav > li.active>a, .navbar-default .nav>li.active>a:focus{color:#ddd!important;}
.navbar, .navbar.navbar-default{background-color: #CA1818!important;}
.navbar-default.affix .nav > li>a, .navbar-default.affix .nav>li>a:focus{color:#eee!important;}
header .header-content .header-content-inner p{margin-right: auto;
    margin-left: auto;
    max-width: 80%;
    font-size: 15px!important;
    color: inherit!important;
    text-shadow: none!important;
    text-transform: uppercase!important;}
	{/literal}
	</style>
    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">{if $idioma == 'en'}What is {$tsConfig.name}?{else}¿Que es {$tsConfig.name}?{/if}</h2>
                    <center><hr class="light"></center>
                    <p class="text-faded">{if $idioma == 'en'}We are the result of hard work and dedication, in Babanta not need much professional knowledge or experience in monetization. Every step and every option you need to start making money with your hobby and talent, are not invasive that at each entrance provide all the information provided and simply register and start to take one more step! is not simply to make money ... It's an important step in your career ;)

WHAT DO WE OFFER?
{else}Somos el resultado de esfuerzo y dedicación, en Babanta no necesitas de mucho conocimiento profesional o experiencia en el área de monetización. Cada paso y cada opción que necesites para empezar a ganar dinero con talento y tu pasatiempo, no somos invasivos por que en cada entrada brindamos toda la información que se ofrece y basta con registrarte y empezar a dar un paso mas! no es simplemente ganar dinero... Es un paso importante en tu carrera <b>;)</b>{/if}</p>
                    <a href="#services" class="btn btn-default btn-xl page-scroll button_bux_4">{if $idioma == 'en'}What do we offer?{else}¿Que te ofrecemos?{/if}</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">{if $idioma == 'en'}What we have for you{else}Lo que tenemos para ti{/if}</h2>
                    <center><hr class="primary"></center>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-usd wow bounceIn text-primary"></i>
                        <h3>{if $idioma == 'en'}Secure payments{else}Pagos seguros{/if}</h3>
                        <p class="text-muted">{if $idioma == 'en'}Weekly payments with all the safety and punctuality, our customers support us that we have not failed our operation.{else}Pagos semanales con toda la seguridad y puntualidad, nuestros clientes nos respaldan que no hemos fallado a nuestro funcionamiento.{/if}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>{if $idioma == 'en'}Contact anytime{else}Contacto cuando quieras{/if}</h3>
                        <p class="text-muted">{if $idioma == 'en'}We are ready to answer any questions you have in all our methods of contact.{else}Estamos dispuestos a resolver cualquier duda que tengas en todos nuestros metodos de contacto.{/if}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>{if $idioma == 'en'}Notes and Content{else}Notas y contenido{/if}</h3>
                        <p class="text-muted">{if $idioma == 'en'}viral content adapted to your area and always adding new.{else}Contenido viral, adaptado a tu área y siempre agregando nuevo.{/if}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>{if $idioma == 'en'}Muto effort{else}Esfuerzo muto{/if}</h3>
                        <p class="text-muted">{if $idioma == 'en'}Our contribution and effort + yours will always be the best combination for best results.{else}Nuestro aporte y esfuerzo + el tuyo siempre sera la mejor combinación para los mejores resultados.{/if}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="no-padding" id="portfolio" style="display:none;">
        <div class="container-fluid">
            <div class="row no-gutter">
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/1.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/2.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/3.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/4.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/5.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <a hrf="#" class="portfolio-box">
                        <img src="{$tsConfig.images}/portfolio/6.jpg" class="img-responsive" alt="">
                        <div class="portfolio-box-caption">
                            <div class="portfolio-box-caption-content">
                                <div class="project-category text-faded">
                                    Category
                                </div>
                                <div class="project-name">
                                    Project Name
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <aside class="bg-dark">
        <div class="container text-center">
            <div class="call-to-action">
                <h2>{if $idioma == 'en'}Join <b>{$tsConfig.name}</b> today and now!{else}Unete a <b>{$tsConfig.name}</b> hoy y ahora!{/if}</h2>
                <a href="javascript:void(0)" onclick="anonimo.register()" class="btn btn-default btn-xl wow tada button_bux_5">{if $idioma == 'en'}Join Now!{else}Unirme ahora!{/if}</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">{if $idioma == 'en'}Contact us today!{else}Contacta con nosotros hoy!{/if}</h2>
                    <center><hr class="primary"></center>
                    <p>{if $idioma == 'en'}We answer your questions and requests always :){else}Respondemos a tus preguntas y peticiones siempre :){/if}</p>
                </div>
<div class="row col-md-12 text-center">
                {if $tsConfig.fb_link}
                <div class="col-lg-2 col-lg-offset-3 text-center">
                    <i class="fa fa-facebook fa-3x wow bounceIn"></i>
                    <p><a href="{$tsConfig.fb_link}">Facebook fans</a></p>
                </div>
                {/if}
                {if $tsConfig.fb_group_link}
                <div class="col-lg-1 text-center">
                    <i class="fa fa-facebook-square fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="{$tsConfig.fb_group_link}">Facebook grupo</a></p>
                </div>
                {/if}
                <div class="col-lg-1 text-center">
                    <i class="fa fa-skype fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <div style="margin-bottom: 20px;
    font-size: 16px;
    line-height: 1.5;
    height: 23px;
    margin: -8px 0 0;"><script type="text/javascript" src="https://secure.skypeassets.com/i/scom/js/skype-uri.js"></script>
<div id="SkypeButton_Call_babantanetwork_1">
 <script type="text/javascript">
 Skype.ui({
 "name": "dropdown",
 "element": "SkypeButton_Call_babantanetwork_1",
 "participants": ["babantanetwork"],
 "imageSize": 16
 });
 </script>
</div></div>
                </div>
                <div class="col-lg-1 text-center">
                    <i class="fa fa-envelope fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="mailito:babanta.net@gmail.com">E-mail</a></p>
                </div>
                <div class="col-lg-1 text-center">
                    <i class="fa fa-twitter fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="http://twitter.com/babantanetwork">Twitter</a></p>
                </div>
</div>
            </div>
        </div>
    </section>
    <script src="{$tsConfig.js}/jquery.easing.min.js"></script>
    <script src="{$tsConfig.js}/jquery.fittext.js"></script>
    <script src="{$tsConfig.js}/wow.min.js"></script>
    <script src="{$tsConfig.js}/creative.js"></script>
    <script type="text/javascript">{literal}
    $(window).load(function () {
    $('header').css({'min-height':$(window).outerHeight()});
    });
    {/literal}</script>
    <style type="text/css">{literal}
    #headtotalhe{margin-top:0!important;}
    {/literal}</style>