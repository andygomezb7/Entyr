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
                        <a class="page-scroll" href="#about">Acerca de</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Servicio</a>
                    </li>
                    {* <li>
                        <a class="page-scroll" href="#portfolio">Comentarios</a>
                    </li> *}
                    <li>
                        <a class="page-scroll" href="#contact">Registrarte!</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <header style="min-height:470px;">
        <div class="header-content">
            <div class="header-content-inner">
                <h1>{$tsConfig.name} ES FRUTO DEL ESFUERZO Y UNIÓN</h1>
                <hr>
                <p>{$tsConfig.net_description}</p>
                <a href="#about" class="btn btn-primary btn-xl page-scroll">Conocer más!</a>
                <a href="javascript:void(0)" onclick="anonimo.login()" class="btn btn-success btn-xl">Ingresar</a>
            </div>
        </div>
    </header>

    <section class="bg-primary" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">{$tsConfig.name} es impresionante!</h2>
                    <hr class="light">
                    <p class="text-faded">En {$tsConfig.name} pensamos en ti y en tu esfuerzo, por eso tu trabajo y el nuestro va de la mano, nos esforzamos por tener contenido de calidad para que compartas con tu publico y nunca tengas problemas con contenido spam.</p>
                    <a href="#services" class="btn btn-default btn-xl page-scroll">Más información!</a>
                </div>
            </div>
        </div>
    </section>

    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Nuestro servicio ofrece</h2>
                    <hr class="primary">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-usd wow bounceIn text-primary"></i>
                        <h3>Pagos seguros</h3>
                        <p class="text-muted">Te pagamos mensualmente {$tsConfig.pago_mil} USD por cada mil visitas.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-paper-plane wow bounceIn text-primary" data-wow-delay=".1s"></i>
                        <h3>Soporte a cualquier duda</h3>
                        <p class="text-muted">Nos mantenemos activos y sin problemas respondemos a tus preguntas!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-newspaper-o wow bounceIn text-primary" data-wow-delay=".2s"></i>
                        <h3>Contenido de calidad</h3>
                        <p class="text-muted">Contamos con contenido de calidad e interesante para que compartas con tu publico!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 text-center">
                    <div class="service-box">
                        <i class="fa fa-4x fa-heart wow bounceIn text-primary" data-wow-delay=".3s"></i>
                        <h3>Nos esforzamos como tu!</h3>
                        <p class="text-muted">Damos el mismo esfuerzo que tu das a tu publico para tener el mejor contenido y lo mas interesante en la red!</p>
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
                <h2>Unete a <b>{$tsConfig.name}</b> hoy y ahora!</h2>
                <a href="javascript:void(0)" onclick="anonimo.register()" class="btn btn-default btn-xl wow tada">Unirme ahora!</a>
            </div>
        </div>
    </aside>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <h2 class="section-heading">Contacta con nosotros hoy!</h2>
                    <hr class="primary">
                    <p>Respondemos a tus preguntas y peticiones siempre :)</p>
                </div>
                {if $tsConfig.fb_link}
                <div class="col-lg-4 col-lg-offset-2 text-center">
                    <i class="fa fa-facebook fa-3x wow bounceIn"></i>
                    <p><a href="{$tsConfig.fb_link}">Facebook fans</a></p>
                </div>
                {/if}
                {if $tsConfig.twitter_link}
                <div class="col-lg-4 text-center">
                    <i class="fa fa-twitter fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="{$tsConfig.twitter_link}">Twitter</a></p>
                </div>
                {/if}
                {if $tsConfig.fb_group_link}
                <div class="col-lg-4 text-center">
                    <i class="fa fa-facebook-square fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                    <p><a href="{$tsConfig.fb_group_link}">Facebook grupo</a></p>
                </div>
                {/if}
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