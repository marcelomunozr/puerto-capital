<?php get_header(); ?>
<?php the_post();?>
<?php $logo = get_field('logo_interior'); ?>
<?php $tipos = get_field('dormitorios'); ?>
<?php $disponibles = get_field('disponibles'); ?>
<?php $iframe = get_field('iframe'); ?>
<?php $ficha = get_field('ficha'); ?>
<?php $cotizador = get_field('url_cotizador'); ?>
<?php $salaventas = get_field('sala_de_ventas'); ?>
<?php $comuna = get_field('comuna'); ?>
<?php $gallery = get_field('galeria-proyecto'); ?>
          
<!-- PRINCIPAL -->
    <section class="single">
    <?php the_post_thumbnail('full', array('class' => 'img-single img-center', 'title' => get_the_title()));?>
      <div class="container relative">
        <div class="icons-single">
          <?php if(!empty($comuna)){ ?>
            <div class="comu"><?php echo $comuna;?></div>
          <?php }?>
          <?php if(!empty($logo)){ ?>
            <img src="<?php echo $logo;?>" class="img-responsive" alt="<?php the_title(); ?>">
          <?php }?>
        </div>
      </div>
    </section>

    <div class="clearfix"></div>

    <section class="tab-single">
      <div class="container">
        <!-- Nav tabs -->
        <ul class="tab-list" role="tablist">

          <?php 
          if(!empty($tipos)){
              $i=0;
              foreach ($tipos as $dormitorio) { 
                $i++;
                ?>
                  <li role="presentation" class="<?php if($i==1){ echo 'active';} ?>"><a href="#dormi<?php echo $i;?>" aria-controls="dormi<?php echo $i;?>" role="tab" data-toggle="tab"><?php echo $dormitorio['dormitorios'];?></a></li>
              <?php }
            wp_reset_postdata();?>
          <?php }?>

        </ul>
      </div>
      <div class="the-single">
        <!-- Tab panes -->
        <div class="tab-content">


          <?php 
          if(!empty($tipos)){
              $x=0;
              $y=0;
              foreach ($tipos as $dormitorio) { 
                $x++;
                ?>
          <div role="tabpanel" class="tab-pane <?php if($x==1){ echo 'active in';} ?> fade" id="dormi<?php echo $x;?>">
            <!-- head -->
            <div class="container">
              <div class="head">
                <div class="row">
                  <div class="shows">
                    <a href="#ubicacion" class="page-scroll"><h6><span class="ico-geo-orange"></span> UBICACIÓN DEL <br>EDIFICIO </h6></a>
                  </div>
                  <div class="shows hide">
                    <h6><span class="ico-cal-orange"></span> TU DEPARTAMENTO <br>UNA INVERSIÓN </h6>
                  </div>
                  <div class="shows default hide">
                    <h6><span class="number"><?php echo $disponibles;?></span> DEPARTAMENTOS <br>DISPONIBLES </h6>
                  </div>
                  <div class="shows">
                    <a href="<?php echo $ficha;?>" target="_blank"><h6><span class="ico-pdf-orange"></span>DESCARGAR <br>FICHA</h6></a>
                  </div>
                  <?php if(!empty($gallery)){?>
                    <div class="shows">
                      <a href="#" class="open-gal"><h6><span class="ico-cam"></span> GALERÍA DE <br>IMÁGENES</h6></a>
                    </div>
                  <?php }?>
                  <div class="pull-right text-right">
                    <a href="<?php echo $cotizador; ?>" target="_blank" class="btn btn-naranjo">COTIZA AQUÍ</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.head -->


            <?php if(!empty($gallery)){?>
                <div class="modal-pc">
                  <div class="close-modal-pc"></div>
                  <div class="container">
                    <div id="carousel-gallery" class="carousel slide" data-ride="carousel">
                      <!-- Indicators -->
                      <ol class="carousel-indicators">                  
                        <?php 
                        $z = 0;
                        foreach($gallery as $photo){
                          ?>
                          <li data-target="#carousel-gallery" data-slide-to="<?php echo $z;?>" class="<?php if($z === 0) echo 'active'; ?>"></li>           
                          <?php                           
                          $z++;
                        }   
                        ?>
                      </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">               
                        <?php 
                        $z = 0;
                        foreach($gallery as $photo){
                          ?>
                          <div class="item <?php if($z === 0) echo 'active'; ?>">
                              <?php
                                $photourl = $photo['sizes']['full'] ? $photo['sizes']['full'] : $photo['url'];
                              ?>

                              <img src="<?php echo $photourl; ?>" alt="<?php echo $photo['title']; ?>" class="img-center img-responsive">
                          </div>       
                          <?php                           
                          $z++;
                        }   
                        ?>
                      </div>

                    </div>
                  </div>
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-gallery" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-gallery" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
            <?php }?>

            <!-- body -->
            <div class="body-zone">
              <div class="container">
                <div class="row">
                  <div class="col-md-7">
                    <h4><?php the_title(); ?></h4>
                    <div class="context">
                      <?php echo $dormitorio['descripcion'];?>
                      <!-- <div class="sello-best"></div> -->
                      <?php if ($salaventas != "") { ?>
                        <div class="salaventas">
                          <?php echo $salaventas ?>
                        </div>
                      <?php }  ?>
                      <div class="know">
                        <h3>Conoce otros proyectos en venta</h3>
                        <div class="row">

                          <?php
                          $query = new WP_Query( array( 'post_type' => 'proyecto-venta', 'posts_per_page' => 3));
                          if ($query->have_posts() ) {
                              while ( $query->have_posts() ) { 
                                  $query->the_post();
                                  ?>
                            <div class="col-xs-4">
                              <a href="<?php the_permalink(); ?>" class="pro">
                                <img src="<?php echo the_field('logo_interior');?>" class="img-responsive" alt="<?php the_title(); ?>">
                              </a>
                            </div>
                              <?php
                              }
                              wp_reset_postdata();
                          }
                          ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
	                  <?php
										$galeria = $dormitorio['galeria'];
										if(!empty($galeria) && is_array($galeria)){											
											?>
											<div id="carousel-single<?php echo $x; ?>" class="carousel slide" data-ride="carousel">											
	                      <ol class="carousel-indicators">												
												<?php 
												$counter = 0;
												foreach($galeria as $imagen){
													?>
	                        <li data-target="#carousel-single<?php echo $x; ?>" data-slide-to="<?php echo $counter;?>" class="<?php if($counter === 0) echo 'active'; ?>"></li>						
													<?php 													
													$counter++;
												}		
												?>
	                      </ol>
	                      <div class="carousel-inner" role="listbox">	                      
		                      <?php 
			                    $counter = 0;
			                    foreach($galeria as $imagen){
														?>
		                        <div class="item<?php if($counter === 0) echo ' active'; ?>">
			                        <?php
				                        $imgurl = $imagen['sizes']['nosotros'] ? $imagen['sizes']['nosotros'] : $imagen['url'];
			                        ?>

		                          <img src="<?php echo $imgurl; ?>" alt="<?php echo $imagen['title']; ?>" class="img-center">
		                        </div>													
														<?php 
														$counter++;															
			                    }
		                      ?>
	                      </div>
	                    </div>		<!-- carousel -->									
											<?php 
										} else {
											?>
	                    <div id="carousel-single<?php echo $x; ?>" class="carousel slide" data-ride="carousel">
	                      <ol class="carousel-indicators">
	                        <li data-target="#carousel-single<?php echo $x; ?>" data-slide-to="0" class="active"></li>
	                        <li data-target="#carousel-single<?php echo $x; ?>" data-slide-to="1"></li>
	                      </ol>
	                      <div class="carousel-inner" role="listbox">
	                        <div class="item active">
	                          <img src="<?php bloginfo('template_url'); ?>/dist/images/interior-slide.jpg" alt="Title" class="img-center">
	                        </div>
	                        <div class="item">
	                          <img src="<?php bloginfo('template_url'); ?>/dist/images/interior-slide.jpg" alt="Title" class="img-center">
	                        </div>
	                      </div>
	                    </div> <!-- carousel -->
											<?php 
										}
	                  ?>



                  </div>
                </div>
              </div>
            </div>
          </div>
              <?php $i++; }
            wp_reset_postdata();?>
          <?php }?>

            <div class="location-zone" id="ubicacion">
              <div class="container">
                <div class="row">
                  <h4>Ubicación del edificio</h4>
                </div>
              </div>
              <iframe src="<?php  echo $iframe; ?>" width="100%" class="mapin"></iframe>
            </div>

        </div>
        </div>
      </div>
    </section>



<?php get_footer(); ?>