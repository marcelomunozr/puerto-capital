<?php 
	//Template name: Gracias Obtener Información - campaña Caídos del Cielo
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
    
    

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800" rel="stylesheet" type="text/css"><!-- font-family: 'Open Sans', sans-serif; -->
    <?php wp_head(); ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '948204808562393');
    fbq('track', "PageView");</script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=948204808562393&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->

  </head>
  <body>
    <!--[if lt IE 10]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    

    <!-- Google Code for Ca&iacute;do del cielo solo info Conversion Page -->
    <script type="text/javascript">
    /* <![CDATA[ */
    var google_conversion_id = 932514483;
    var google_conversion_language = "en";
    var google_conversion_format = "3";
    var google_conversion_color = "ffffff";
    var google_conversion_label = "jKm8CIWahWUQs5XUvAM";

    var google_remarketing_only = false;
    /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
    <div style="display:inline;">
    <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/932514483/?label=jKm8CIWahWUQs5XUvAM&amp;guid=ON&amp;script=0"/>
    </div>
    </noscript>
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
            <a href="<?php echo the_field('facebook', $face->ID);?>" class="share"><i class="fa fa-facebook"></i></a>
            <a href="#" class="share" data-toggle="modal" data-target=".modal-contacto"><i class="fa fa-envelope"></i></a>
          </div>
          <div class="col-sm-2 col-sm-offset-6 col-xs-5">
            <span><a href="<?php bloginfo('template_url'); ?>/caidos/bases/bases.pdf" target="_blank">Bases Legales</a></span>
          </div>
        </div>
      </div>
    </div>
    <div class="ribbon"><span>Sólo hasta el 15 de mayo - Cupos limitados</span></div>

    <section class="home-zone thanks">
      <div class="container">
        <div class="row">
          <div class="col-sm-10 col-sm-offset-1">
            <div class="row">
              <div class="col-sm-2">
                <div class="logo"></div>
              </div>
              <div class="col-sm-8 text-center">
              </div>
            </div>
            <div class="clear60"></div>
            <div class="row  text-center">
            <div class="clear30"></div>
              <div class="col-sm-7">
                <div class="logo-caido"></div>
              </div>
              <div class="col-sm-5">
                <h1>Gracias</h1>
                <h6>Si eres uno de los beneficiados <br>con el 10% de pie, te contactaremos.</h6>
                <div class="clear30"></div>
                <a href="/caido-del-cielo/" class="btn btn-naranjo">VOLVER</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    
    
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
