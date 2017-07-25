<?php get_header(); ?>
      <div class="clear30"></div>
      <div class="clear30"></div>
      <section class="contacto preventa" id="contacto">
        <div class="before"></div>
        <div class="container">
          <h4><?php the_title();?></h4>
          <div class="contetx">
            <div class="row">
              <div class="col-md-6 col-xs-12"> <!-- col-md-offset-3 wow bounceInRight  data-wow-delay="200ms"-->
                  <?php echo do_shortcode('[contact-form-7 id="2987" title="Inscripciones Preventa"]');?>
              </div>
              <div class="clear30"></div>
              <div class="clear30"></div>
            </div>
          </div>
        </div>
      </section>
      <section class="interior-foot">
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="logo-footer"></div>
                <?php $query = get_page_by_path('contacto'); ?>
                <p><?php echo the_field('footer_text', $query->ID);?></p>
              </div>
              <div class="col-sm-6 text-right">
                <h6>SOMOS PARTE DE</h6>
                <div class="logo-best"></div>
              </div>
            </div>
          </div>
        </footer>
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

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?php bloginfo('template_url'); ?>/dist/scripts/vendor.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/dist/scripts/plugins.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/dist/scripts/main.js"></script>
    <script>
      var zoom= $('#map_canvas').gmap('option', 'zoom');
      $('#map_canvas').gmap().bind('init', function(ev, map) {
        
        $('#map_canvas').gmap('addMarker', {icon: '<?php bloginfo('template_url'); ?>/dist/images/mapicon.png', 'position': '<?php echo the_field('latitud', $query->ID);?>,<?php echo the_field('longitud', $query->ID);?>', 'bounds': true});
        $('#map_canvas').gmap('option', 'zoom', 15);
        
      });
      jQuery(document).ready(function($) {

        $('.pestana').click(function(event) {
          $(this).toggleClass('active');
        });

        $('.open-gal, .close-modal-pc').click(function(event) {
          $('.modal-pc').fadeToggle();
        });        
      });
    </script>
    <?php if (is_page('post-venta')): ?>
      <script src="<?php bloginfo('template_url'); ?>/dist/scripts/height.js"></script>
      <script>
        jQuery(document).ready(function($) {
          $('.iguala-altura').matchHeight();

          $('.faq-content .panel-default>.panel-heading').click(function(event) {
            $('.faq-content .panel-default>.panel-heading').removeClass("activao");
            $(this).addClass('activao');
          });
        });
      </script>
    <?php endif ?>
    <?php wp_footer(); ?>
  </body>
</html>