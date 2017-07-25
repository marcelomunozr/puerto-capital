<!-- slide homi -->
<section id="home" class="home">
  <div id="carousel-homi" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="true">
    <!-- arrow down -->
    <div class="navflechas hidden-xs">
        <a href="#nosotros" class="bajar page-scroll"> <span class="icon-wrap"></span> <h3> Ver más </h3> </a>
    </div>

    <div class="carousel-inner" role="listbox">
<?php
$query = new WP_Query( array( 'post_type' => 'destacado', 'posts_per_page' => -1));
$i=0;
if ($query->have_posts() ) {
    while ( $query->have_posts() ) { 
        $query->the_post();
        ?>
          
          <div class="item <?php if($i==0){ ?>active<?php }?>">
              <?php if(get_field('link')!==""){ ?>
                <a href="<?php the_field('link');?>" class="slide-url">
              <?php } ?>
              <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id( $query->ID ) ); ?>" alt="<?php the_title();?>" class="img-responsive img-center hidden-xs">
              <img src="<?php the_field('imagen_responsive');?>" alt="<?php the_title();?>" class="img-responsive img-center visible-xs">
              <?php if(get_field('link')!==""){ ?>
                </a>
              <?php } ?>

          </div>
    <?php
    $i++;
    }
    wp_reset_postdata();
}
?>      

    </div>
    <?php if ($i>1) { ?>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-homi" role="button" data-slide="prev">
          <i class="fa fa-angle-left"></i>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-homi" role="button" data-slide="next">
          <i class="fa fa-angle-right"></i>
          <span class="sr-only">Next</span>
        </a>
    <?php } ?>
  </div>
</section>