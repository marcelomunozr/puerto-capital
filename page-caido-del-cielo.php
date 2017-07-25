<?php
header("Location: /oportunidad-caida-del-cielo/"); /* Redirección del navegador */

/* Asegurándonos de que el código interior no será ejecutado cuando se realiza la redirección. */
exit;
?>
<!doctype html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Puerto Capital - Una oportunidad caída del cielo</title>

    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/dist/favicon.ico">
    <link rel="apple-touch-icon" href="<?php bloginfo('template_url'); ?>/dist/apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/caidos/styles/main.css">
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/caidos/styles/challa.css">

    <!-- OGte -->
    <meta property="og:url" content="http://www.puertocapital.cl/caido-del-cielo/" />
    <meta property="og:title" content="Puerto Capital - Una oportunidad caída del cielo">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="es_ES">
    <meta property="og:image" content="http://www.puertocapital.cl/fb-puerto-capital/shared-face.jpg">
    <meta property="og:description" content="Porque sabemos que hoy los créditos hipotecarios alcanzan sólo el 80% del valor total, queremos abrirte las puertas de tu nuevo departamento.">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="628">
    <!-- /OG -->



    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css"><!-- font-family: 'Open Sans', sans-serif; -->
    <?php wp_head(); ?>
  </head>
  <body>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.5&appId=1698074830465309";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>


<?php $face = get_page_by_path('nosotros'); ?>
    
    <!-- MODAL COPMARTIR -->
    <div class="modal fade modal-contacto" tabindex="-1" role="dialog" aria-labelledby="myModalContacto">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?php echo do_shortcode('[contact-form-7 id="2800" title="Compartir por email"]'); ?>
        </div>
      </div>
    </div>


    <div class="head">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-sm-offset-1 col-xs-7">
            <span class="hidden-xs">COMPARTE ESTE SITIO</span>
            <a href="javascript: void(0);" class="share" onclick="window.open('http://www.facebook.com/sharer.php?u=http://www.puertocapital.cl/caido-del-cielo/','ventanacompartir', 'toolbar=0, status=0, width=555, height=555');" style="cursor: pointer;"><i class="fa fa-facebook"></i></a>
            <!-- <a class="share fb-share-button" data-href="http://www.puertocapital.cl/caido-del-cielo/"><i class="fa fa-facebook"></i></a> -->
            <a href="#" class="share" data-toggle="modal" data-target=".modal-contacto"><i class="fa fa-envelope"></i></a>
          </div>
          <div class="col-sm-2 col-sm-offset-6 col-xs-5">
            <span><a href="<?php bloginfo('template_url'); ?>/caidos/bases/bases.pdf" target="_blank">Bases Legales</a></span>
          </div>
        </div>
      </div>
    </div>
    <div class="ribbon"><span>Sólo hasta el 31 de Julio</span></div>

    <section class="home-zone">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
              <div class="col-sm-2">
                <div class="logo"></div>
              </div>
              <div class="col-sm-8 text-center">
                <div class="logo-caido"></div>
                <div class="relative">
                  <h1>¡Te regalamos el <span class="hidden visible-xs"></span>10%  de pie!</h1>
                  <p>Porque sabemos que hoy los créditos hipotecarios alcanzan sólo el 80% del valor total, queremos abrirte las puertas de tu nuevo departamento. Solo hasta el 15 de Mayo.</p>
                </div>
              </div>
            </div>
            <div class="clear20"></div>
            <div class="row hidden-xs">

              <div class="col-sm-4 pers-wrap to-target" data-madopentab="proyecto1">
                <div class="box pers-left">
                  <div class="img-flow">
                    <img src="<?php bloginfo('template_url'); ?>/caidos/images/home-exequiel.jpg" alt="Title" class="img-responsive img-center">
                    <span class="location">Ñuñoa</span>
                  </div>
                  <div class="col-xs-12">
                    <h2>Exequiel Fernández</h2>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">Estudio</span>
                    <span class="bull">1 Dormitorio</span>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">2 Dormitorios</span>
                    <span class="bull">3 Dormitorios</span>
                  </div>
                  <div class="clearfix"></div>
                  <a href="#" class="view">Ver oferta <i class="fa fa-caret-right"></i></a>
                </div>
              </div>

              <div class="col-sm-4 pers-wrap to-target" data-madopentab="proyecto2">
                <div class="box">
                  <div class="img-flow">
                    <img src="<?php bloginfo('template_url'); ?>/caidos/images/home-suarez.jpg" alt="Title" class="img-responsive img-center">
                    <span class="location">Ñuñoa</span>
                  </div>
                  <div class="col-xs-12">
                    <h2>Suárez Mujica</h2>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">1 Dormitorio</span>
                    <span class="bull">2 Dormitorios</span>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">3 Dormitorios</span>
                  </div>
                  <div class="clearfix"></div>
                  <a href="#" class="view">Ver oferta <i class="fa fa-caret-right"></i></a>
                </div>
              </div>

              <div class="col-sm-4 pers-wrap to-target" data-madopentab="proyecto3">
                <div class="box pers-right">
                  <div class="img-flow">
                    <img src="<?php bloginfo('template_url'); ?>/caidos/images/home-matta.jpg" alt="Title" class="img-responsive img-center">
                    <span class="location">Stgo. Centro</span>
                  </div>
                  <div class="col-xs-12">
                    <h2>Matta Valdés</h2>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">Estudio</span>
                    <span class="bull">1 Dormitorio</span>
                  </div>
                  <div class="col-xs-6">
                    <span class="bull">2 Dormitorios</span>
                  </div>
                  <div class="clearfix"></div>
                  <a href="#" class="view">Ver oferta <i class="fa fa-caret-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="proyects-zone">
      <div class="container no-padd-xs">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="to-target">
          <li role="presentation" class="active"><a href="#proyecto1" aria-controls="proyecto1" role="tab" data-toggle="tab">Exequiel Fernández</a></li>
          <li role="presentation"><a href="#proyecto2" aria-controls="proyecto2" role="tab" data-toggle="tab">Suárez Mujica</a></li>
          <li role="presentation"><a href="#proyecto3" aria-controls="proyecto3" role="tab" data-toggle="tab">Matta Valdés</a></li>
        </ul>
      </div>

      <div class="container">
        <div class="logo-caido hidden-xs"></div>
        <div class="clear10"></div>

        <!-- Tab panes -->
        <div class="tab-content" id="target-element">
<?php 
  $query = new WP_Query( array( 'post_type' => 'caido', 'posts_per_page' => 3));
    $contador = 1;
    if ($query->have_posts() ) {
        while ( $query->have_posts() ) { 
            $query->the_post();
?>
          <div role="tabpanel" class="tab-pane fade <?php if($contador==1) {?> in active <?php } ?>" id="proyecto<?php echo $contador;?>">
            <?php if($post->post_name === 'exequiel-fernandez'){ ?>
              <div class="text-center"><h3>Exequiel Fernández <div class="clearfix hidden visible-xs"></div><span><span class="circle">1</span>, <span class="circle">2</span> y <span class="circle">3</span> dormitorios</span></h3></div>
            <?php }elseif ($post->post_name === 'suarez-mujica') { ?>
              <div class="text-center"><h3>Suárez Mujica <div class="clearfix hidden visible-xs"></div><span><span class="circle">1</span>, <span class="circle">2</span> y <span class="circle">3</span> dormitorios</span></h3></div>
            <?php }elseif ($post->post_name === 'matta-valdes') { ?>
              <div class="text-center"><h3>Matta Valdés <div class="clearfix hidden visible-xs"></div><span><span class="circle">1</span>y <span class="circle">2</span> dormitorios</span></h3></div>
            <?php } ?>

            <div class="clear60 hidden-xs"></div>
            <div class="row">
              <div class="col-sm-10 col-sm-offset-1">
                <div class="row">

                    <?php 
                    $pisos = get_field('pisos');
                    if(!empty($pisos)){
                        foreach ($pisos as $piso) {?>
                            <!-- BOX PROYECT -->
                            <div class="col-sm-4">
                              <div class="box-proyect">
                                <div class="top">
                                  <span><?php echo $piso['dormitorios'];?></span>
                                  <span><?php echo $piso['banos'];?></span>
                                </div>
                                <div class="middle">
                                  <h6>Valor del departamento</h6>
                                  <h5><?php echo $piso['valor'];?> <span>UF</span></h5>
                                  <hr>
                                  <div class="row text-left clear20">
                                    <div class="col-xs-5">
                                      <span class="pie orange">Pie Normal</span>
                                    </div>
                                    <div class="col-xs-7 text-right">
                                      <span class="uf orange"><i>UF</i><?php echo $piso['pie_normal'];?></span>
                                    </div>
                                  </div>
                                  <hr>
                                  <div class="row text-left clear20">
                                    <div class="col-xs-5">
                                      <span class="pie">10% de PIE</span>
                                    </div>
                                    <div class="col-xs-7 text-right">
                                      <span class="uf"><i>UF</i><?php echo $piso['10_%_de_pie'];?></span>
                                    </div>

                                    <div class="clear10"></div>
                                    <div class="col-xs-3">
                                      <span class="pie">Ahorro</span>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                      <span class="uf"><i>$</i><?php echo $piso['ahorro'];?></span>
                                      <span class="colorete">(*UF $25.792)</span>
                                    </div>
                                  </div>
                                </div>
                                <a href="#" class="bottom" data-toggle="modal" data-target=".modal-reserva<?php echo $contador;?>" data-piso="<?php echo $piso['dormitorios'].' - '.$piso['banos']; ?>">
                                  Reservar cupo <i class="fa fa-caret-right"></i>
                                </a>
                                <a href="#" class="bottom" data-toggle="modal" data-target=".modal-info<?php echo $contador;?>" data-piso="<?php echo $piso['dormitorios'].' - '.$piso['banos']; ?>">
                                  Obtener Información <i class="fa fa-caret-right"></i>
                                </a>
                              </div>
                            </div>
                            <?php //print_r($piso); ?>
                        <?php }?>
                    <?php }?>
                  
                  
                </div>
              </div>
            </div>
          </div>




          <!-- MODAL RESERVA CUPO -->
          <div class="modal fade modal-reserva<?php echo $contador;?>" tabindex="-1" role="dialog" aria-labelledby="myModalReserva<?php echo $contador;?>">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo do_shortcode(get_field('reserva_form')); ?>
              </div>
            </div>
          </div>

          <!-- MODAL OBTENER INFO -->
          <div class="modal fade modal-info<?php echo $contador;?>" tabindex="-1" role="dialog" aria-labelledby="myModalInfo<?php echo $contador;?>">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo do_shortcode(get_field('info_form')); ?>
              </div>
            </div>
          </div>

    <?php
    $contador++;
    }
    wp_reset_postdata();
}
?>
          
          
        </div>
      </div>
      <div class="clear50"></div>
    </section>
    <div class="conecta">
      <div class="text-center">
        <h3>Síguenos en <a href="<?php echo the_field('facebook', $face->ID);?>" target="_blank"><span class="ico-face"></span></a> Puerto Capital</h3>
      </div>
    </div>

    <footer>
      <div class="logo"></div>
      <p>Av. Vitacura 2808, oficina 602, Las Condes, Santiago - Chile. Puerto Capital 2015.</p>
    </footer>

    
    
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-59851062-1');ga('send','pageview');
    </script>

    <script src="<?php bloginfo('template_url'); ?>/caidos/scripts/vendor.js"></script>
    
    <script src="<?php bloginfo('template_url'); ?>/caidos/scripts/plugins.js"></script>
    
    <script src="<?php bloginfo('template_url'); ?>/caidos/scripts/main.js"></script>
    
    <script src="<?php bloginfo('template_url'); ?>/caidos/scripts/extra.js"></script>    
    <?php wp_footer(); ?>    
  </body>
</html>
