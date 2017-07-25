
<!-- proyectos -->
<section class="proyectos" id="proyectos">
  <div class="before"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h4>Proyectos en venta</h4>
      </div>
    </div>
    <div class="clear30"></div>
    <div class="row wow bounceInLeft">
<?php
$query = new WP_Query( array( 'post_type' => 'proyecto-venta', 'posts_per_page' => 3));
$i=0;
if ($query->have_posts() ) {
    while ( $query->have_posts() ) { 
        $query->the_post();
        ?>
        <div class="col-md-4 padd-mod">
          <article class="box">
            <span class="col"><img src="<?php echo the_field('logo_proyecto');?>" alt="<?php the_title(); ?>" class="img-responsive"></span>
              
            <a href="<?php the_permalink(); ?>" class="relative">
              <img src="<?php echo the_field('image');?>" alt="<?php the_title(); ?>" class="img-responsive img-center">
              <span class="ribbon"><?php echo the_field('comuna');?></span>
            </a>
            <div class="cont">
              <h2><?php the_title(); ?></h2>
              <p><?php echo the_field('extracto');?></p>
            </div>
            <div class="cont-down text-center">
              <div class="col-md-6 col-md-offset-3">
                <a href="<?php the_permalink();?>">
                  <span class="ico-ubicacion"></span>
                  <h6>Ubicación del Edificio</h6>
                </a>
              </div>
              <!--  data-toggle="modal" data-target=".modalCalculadora" --><!-- PARA CREAR LA CALCULADORA -->
              <!-- <div class="col-md-4">
                <span class="ico-calculadora"></span>
                <h6>Tu departamento, una inversión</h6>
              </div> -->
            </div>
            <div class="bg-naranjo">
              <span><?php echo the_field('descuento');?></span>
              <span class="pull-right">
                <a href="<?php the_permalink(); ?>">Ver más <i class="fa fa-caret-right"></i></a>
              </span>
            </div>
          </article>
        </div>
    <?php
    $i++;
    }
    wp_reset_postdata();
}
?>

    </div>
  </div>
</section>