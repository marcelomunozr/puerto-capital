<!-- slide homi -->
<section id="home" class="home">
  <div id="carousel-homi" class="carousel slide" data-ride="carousel" data-interval="false">
    <!-- arrow down -->
    <div class="navflechas">
        <a href="#nosotros" class="bajar page-scroll"> <span class="icon-wrap"></span> <h3> Ver más </h3> </a>
    </div>

    <div class="carousel-inner" role="listbox">
<?php
$query = new WP_Query( array( 'post_type' => 'destacado', 'posts_per_page' => 4));
$i=0;
if ($query->have_posts() ) {
    while ( $query->have_posts() ) { 
        $query->the_post();
        ?>
          
          <div class="item <?php if($i==0){ ?>active<?php };?>" style="background: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $query->ID ) ); ?>) no-repeat bottom center fixed;-webkit-background-size: cover;-moz-background-size: cover;background-size: cover;-o-background-size: cover">
            <div class="carousel-caption blanco">
              <h3 class="wow bounceInDown" data-wow-offset="0"><?php echo the_field('cabecera');?></h3>
              <h2 class="wow bounceInDown" data-wow-delay="300ms" data-wow-offset="0"><?php echo the_field('titulo_blanco');?> <span class="naranjo"><?php echo the_field('titulo_naranjo');?></span></h2>
              <div class="col-md-6 col-md-offset-3 wow bounceIn" data-wow-delay="1200ms" data-wow-offset="0">
                <?php the_content();?>
              </div>
              <div class="clear40"></div>
              <div class="center-block" style="max-width:400px">
                <a href="<?php echo the_field('link');?>" class="btn btn-naranjo wow bounceIn" data-wow-delay="1200ms" data-wow-offset="10">MÁS INFORMACIÓN</a>
              </div>
            </div>
          </div>
    <?php
    $i++;
    }
    wp_reset_postdata();
}
?>      

    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-homi" role="button" data-slide="prev">
      <i class="fa fa-angle-left"></i>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-homi" role="button" data-slide="next">
      <i class="fa fa-angle-right"></i>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section>