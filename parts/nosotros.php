
<?php $query = get_page_by_path('nosotros'); ?>

<!-- nosotros -->
<section class="nosotros" id="nosotros">
  <div class="before wow bounceInLeft"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 no-padding wow bounceInLeft" data-wow-duration="1200ms">
        <h4><?php echo $query->post_title;?></h4>
        <div class="context">
          <?php $content = apply_filters('the_content', $query->post_content);  ?>
          <?php echo $content;?>
          <div class="clear30"></div>
          <a href="#proyectos" class="btn btn-naranjo page-scroll">Conoce Nuestros Proyectos</a>
        </div>
      </div>
      <div class="col-md-6 no-padding wow bounceInRight hidden-xs" data-wow-duration="800ms">
        <?php //print_r($query) ;?>
        <?php echo get_the_post_thumbnail( $query->ID, 'nosotros', array(
              'class' => "img-responsive img-center",
        ) ); ?>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="conecta">
    <div class="text-center wow bounceIn" data-wow-duration="1000ms">
      <h3>Síguenos en <a href="<?php echo the_field('facebook', $query->ID);?>" target="_blank"><span class="ico-face"></span></a> Puerto Capital</h3>
    </div>
  </div>
    </section>