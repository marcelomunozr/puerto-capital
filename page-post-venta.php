<?php get_header(); ?>
<?php 
	$procedimientos = get_field('procedimientos');
	$preguntas = get_field('preguntas');
?>
<span id="home"></span>
	<section class="single post-venta">
		<?php the_post_thumbnail('full', array('class' => 'img-center', 'title' => get_the_title()));?>
	</section>
  <div class="clearfix"></div>

  <div class="body-zone in-post-venta">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h4><?php the_title(); ?></h4>
        </div>
        <div class="clearfix"></div>
		<?php 
			if(!empty($procedimientos)){
				$i=0;
				foreach ($procedimientos as $procedimiento) {
					$i++;?>
			        <div class="col-sm-6">
			        	<div class="procedures iguala-altura">
			        		<h3><?php echo $procedimiento['titulo']; ?></h3>
			        		<?php echo $procedimiento['texto']; ?>
			        	</div>
			        </div>
			        <?php if ($i==2): ?>
    					<div class="clear20 hidden-xs"></div>
			        <?php endif ?>
				<?php }
			wp_reset_postdata();?>
		<?php }?>

        <div class="col-sm-6 faq-content">
            <h4>Preguntas Frecuentes</h4>
				<div class="panel-group" id="faq" role="tablist" aria-multiselectable="true">

					<?php 
						if(!empty($preguntas)){
							$i=0;
							foreach ($preguntas as $pregunta) {
								$i++;?>
								  <div class="panel panel-default">
								    <div class="panel-heading <?php if ($i==1): ?>activao<?php endif ?>" role="tab" id="head<?php echo $i;?>">
								      <h5 class="panel-title">
								        <a role="button" data-toggle="collapse" data-parent="#faq" href="#colapsa<?php echo $i;?>" aria-expanded="true" aria-controls="colapsa<?php echo $i;?>">
								          <?php echo $pregunta['pregunta']; ?>
								        </a>
								      </h5>
								    </div>
								    <div id="colapsa<?php echo $i;?>" class="panel-collapse collapse <?php if ($i==1): ?>in<?php endif ?>" role="tabpanel" aria-labelledby="head<?php echo $i;?>">
								      <div class="panel-body">
								      	<?php echo $pregunta['respuesta']; ?>
								      </div>
								    </div>
								  </div>
						        
							<?php }
						wp_reset_postdata();?>
					<?php }?>

				</div>
        </div>

        <div class="col-sm-6">
        <!--
          <h4>Acceso Propietarios</h4>
          <div class="zona-propietario">
          	<form action="#">
	          	<div class="row">
	          		<div class="col-sm-6">
	          			<p>Usuario</p>
	          			<input type="text" class="form-control">
	          		</div>
	          		<div class="col-sm-6">
	          			<p>Contraseña</p>
	          			<input type="text" class="form-control">
		        			<div class="text-right">
  								<button type="submit" class="btn btn-default">entrar</button>
							</div>
	        			</div>
	          	</div>
          	</form>
          </div>
          -->
          <iframe width="100%" height="315" src="https://www.youtube.com/embed/k7Cz4H7UMzU" frameborder="0" allowfullscreen></iframe>
          <div class="clear30"></div>
          <div class="text-center">
          	<a href="http://portalcasos.iconcreta.com/casos/login/pcapital" class="btn-arrowson" target="_blank"><span class="arrow-son"></span>ir a Post Venta</a>
          	<a href="http://www.puertocapital.cl/#contacto" class="btn-arrowson" target="_blank"><span class="arrow-son"></span>otras consultas</a>
          </div>
        </div>

      </div>
    </div>
  </div>
	<!-- /.psot-venta -->

<?php get_footer(); ?>