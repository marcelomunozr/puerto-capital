
<!-- proyectos realizados -->
<section class="realizado" id="proyectos-realizados">
  <div class="top-in">
    <div class="before"></div>
    <div class="container"> 
        <h4>Proyectos Realizados</h4>
    </div>
  </div>
  <div class="bottom-in" style="background: url(<?php bloginfo('template_url'); ?>/dist/images/realizado.jpg) no-repeat bottom center fixed;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover">
    <div class="text-center blanco">
      <div class="lista-realizados wow bounceIn" data-wow-offset="400">
<?php
$query = new WP_Query( array( 'post_type' => 'proyecto-realizado', 'posts_per_page' => 100));
$i=0;
if ($query->have_posts() ) {
    while ( $query->have_posts() ) { 
        $query->the_post();
        ?>
          <div>
            <h3><?php echo the_field('tipo');?></h3>
            <h2><?php echo the_field('titulo_blanco');?> <br><span class="naranjo"><?php echo the_field('titulo_naranjo');?></span></h2>
            <div class="clear30"></div>
            <div class="flow-realizados">
              <img src="<?php echo the_field('imagen');?>" alt="<?php the_title(); ?>" class="img-responsive">
            </div>
            <h5><?php echo the_field('ubicacion');?></h5>
            <h6><?php echo the_field('entrega');?></h6>
          </div>
    <?php
    $i++;
    }
    wp_reset_postdata();
}
?>

      </div>
      <div class="clear50"></div>
    </div>
  </div>
</section>