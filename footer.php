    <?php $query = get_page_by_path('contacto'); ?>
    <?php if(is_home()){ ?>
      <section class="contacto" id="contacto">
        <div class="before"></div>
        <div class="container">
          <h4><?php echo $query->post_title;?></h4>
          <div class="contetx">
            <div class="row">
              <div class="col-md-5 wow bounceInLeft" data-wow-delay="200ms">
                <h5><strong>EXEQUIEL FERNÁNDEZ / SUÁREZ MUJICA</strong></h5>
                <p>Exequiel Fernandez 703, Ñuñoa <br>Teléfonos +569-61697417 – +562-27165696 <br>Marca fácil *8020</p>

                <h5><strong>MATTA VALDÉS</strong></h5>
                <p>Nueva de Valdés 1056, Santiago <br>Teléfonos: +569-77597733 o +562-22221891 <br>Marca fácil *8020</p>
                <div id="map_canvas"></div>
                <div class="clear30"></div>
              </div>
              <div class="col-md-7 wow bounceInRight col-xs-12" data-wow-delay="200ms">
                  <?php $content = apply_filters('the_content', $query->post_content);  ?>
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
    <?php }else{ ?>
      <section class="interior-foot">
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
    <?php }; ?>

    <!-- MODAL CALCULADORA -->
    <div class="modal fade modalCalculadora" tabindex="-1" role="dialog" aria-labelledby="modalCalculadora">
        <div class="contain-mod relative">
            <div class="logo-modal"></div>
            <div class="close" data-dismiss="modal" aria-label="Close"></div>
        </div>
        <section class="calculadora">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="text-center SimuladorPaso1">
                        <form class="FormCapturaMail" method="POST">
                          <div class="hidden">
                            <form action="#" method="POST" id="FormSimulacion">
                              <input type="hidden" name="data[PCSimulation][token]" value="A#MEI!xW(J6Pt)Ob6)VNPm0uyjJx)vvsur8xE2%s#3_dwWjyU5wjwIJP%$zH8L0l" />
                              <input type="hidden" name="data[PCSimulation][project]" value="" />
                              <input type="hidden" name="data[PCSimulation][email]" value="" />
                              <input type="hidden" name="data[PCSimulation][type]" value="" />
                              <input type="hidden" name="data[PCSimulation][years]" value="" />
                              <input type="hidden" name="data[PCSimulation][origin]" value="web-personas" />
                            </form>
                          </div>
                        <h2>DÉJANOS TU MAIL</h2>
                        <h6>Te enviaremos más información sobre este y más proyectos.</h6>
                          <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                              <div class="form-select">
                                <input type="email" name="form_simulador_email" class="form-control" placeholder="Dirección de E-mail" value="" required>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit" class="btn btn-primary btn-lg">Continuar</button>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="text-center SimuladorPaso2">
                            <h5>Tu departamento, una inversión</h5>
                            <h2>Se pagan casi solos</h2>
                            <h6>haz una simulación</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-select">
                                        <input type="hidden" value="" class="SimuladorEmail" id="SimuladorEmail" />
                                        <select name="tipo" id="SimuladorTipo" class="form-control">
                                            <option value="">Tipo de Departamento</option>
                                            <option value="1">1D-1B-K</option>
                                            <option value="2">2D-2B</option>
                                            <option value="3">3D-3B-C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-select">
                                        <select name="plazo" id="SimuladorPlazo" class="form-control">
                                            <option>Años plazo</option>
                                            <option value="1">20 años</option>
                                            <option value="2">25 años</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 form-text">
                                    <h5>valor depto promedio :
                                    <br class="hidden-md visible-xs">
                                    <span id="SimuladorValDpto">UF</span></h5>
                                    <h5>PIE 20% :
                                    <br class="hidden-md visible-xs">
                                    <span id="SimuladorValPie">UF</span></h5>
                                    <h5>Dividendo a pagar:
                                    <br class="hidden-md visible-xs">
                                    <span id="SimuladorValDiv">$0</span></h5>
                                    <!--   <h5>arriendo aproximado: <br class="hidden-md visible-xs"><span id="SimuladorValArriendo">$0</span></h5>
                                    <h5>saldo a pagar mes: <br class="hidden-md visible-xs"><span id="SimuladorValTotal">$0</span></h5> -->
                                </div>
                                <button id="SimulameEsta"  type="submit" class="btn btn-primary btn-lg">
                                    Ver Simulación
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-md-offset-2">
                        <div class="la-legal">
                            <p>* El dividendo &#10140; Calculado con una tasa de 4.5% y un valor de la UF es estimada en $ 26.000.</p>
                            <p> El valor del dividendo indicado es meramente referencia, por cuanto el monto del dividendo definitivo dependerá de las condiciones obtenidas con la entidad bancaria que financie la operación.  Asimismo, el valor del arriendo es estimativo, y para ello se han considerando los valores de arriendo de propiedades de similares características publicadas en portales del rubro durante el mes de Diciembre del 2015, por tanto, son valores meramente referenciales que pueden sufrir modificación en el tiempo. </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.MODAL CALCULADORA -->


    
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
    <script src="<?php bloginfo('template_url'); ?>/dist/scripts/jquery.rut.min.js"></script>
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

      // ESTO ES EL RUT EN FORMULARIO
      $i=0;
      jQuery('select[name="infoproyecto"]').change(function(){
        var infoProyecto = "";
        jQuery('select[name="infoproyecto"]').each(function(index, value){
          var infoProyecto = jQuery(this).val();
          if(infoProyecto != 'Información del proyecto' && infoProyecto != 'Otras consultas de Post venta'){
            if ($i==0) {
              jQuery('select[name="infoproyecto"]').parents('.form-group').after().append('<input type="text" id="rutValida" name="rut" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Rut" style="margin-top:15px;">');
              $("input#rutValida").rut();
              $i=1;
            }
          }else{
            jQuery('input[name="rut"]').remove();
            $i=0;
          }
        })
      });
      //FINALLY
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