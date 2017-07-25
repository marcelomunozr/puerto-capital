<?php 
  //Template name: Inscripción Preventa
?>
      <?php $query = get_page_by_path('contacto'); ?>
      <section class="contacto" id="contacto">
        <div class="before"></div>
        <div class="container">
          <h4><?php the_title();?></h4>
          <div class="contetx">
            <div class="row">
              <div class="col-md-6 col-md-offset-3 wow bounceInRight col-xs-12" data-wow-delay="200ms">
                  <?php $content = apply_filters('the_content', the_content());  ?>
                  <?php echo $content;?>
              </div>
              <div class="clear30"></div>
              <div class="clear30"></div>
            </div>
          </div>
        </div>
        <footer>
          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <div class="logo-footer"></div>
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