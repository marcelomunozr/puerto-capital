
jQuery(document).ready(function($) {
    var clicktrack = function(options){
      var eventLabelDefault = 'Puerto Capital';
      var defaults = {
        eventCategory : 'Boton',
        eventAction : 'click',
        eventLabel : eventLabelDefault,
        eventValue : undefined
      }
      var actual = $.extend({}, defaults, options || {});
      /*console.log('clicktrack!');*/
      try{
        ga('send', 'event', actual.eventCategory, actual.eventAction, actual.eventLabel, actual.eventValue);
      } catch(err){
        console.log(err);
      }
    }


    $('.box').mouseenter(function(e){
      $(this).stop(true).addClass('encima');
      e.preventDefault();
    });
    $('.box').mouseleave(function(e){
      $(this).stop(true).removeClass('encima');
      e.preventDefault();
    });
    /*MODAL OPEN CONTROL*/
    $('.open-modalsito').click(function(e) {
      var cual = $(this).data('modalsito');
      var modal = $('.modalsito-'+cual);
      var piso = $(this).data('piso');
      var ahorro = $(this).data('ahorro');
      var seleccion = $(this).data('seleccion');
      var proyecto = $(this).data('proyecto');

      $(modal).fadeIn(300);
      $(modal).find('.select-piso').val(seleccion);
      $(modal).find('.el-piso').text(piso);
      $(modal).find('.el-ahorro').text(ahorro);

      $(modal).find('.tab-pane').removeClass('active in');
      $(modal).find('.tab-pane:first-child').addClass('active in');

      $(modal).find('.nav-tabs li').removeClass('active');
      $(modal).find('.nav-tabs li:first-child').addClass('active');

      $(modal).find('.que-proyecto').val(proyecto);

      var track = 'Apertura Modal '+proyecto;

      /*TRACKEO*/
      clicktrack({
        eventCategory : track,
        eventAction : 'click'
      });

      e.preventDefault();
    });
    $('.closed').click(function(e) {
      $('.el-modal').fadeOut(300);
      var tab = $(this).parents('.el-modal').find('.nav-tabs>li.active>a');
      var track = $(tab).data('cual');
      /*TRACKEO*/
      clicktrack({
        eventCategory : 'Cierre modal: '+track,
        eventAction : 'click'
      });

      e.preventDefault();
    });
    $('.nav-tabs>li>a').click(function(e){
      var piso = $(this).data('piso');
      var ahorro = $(this).data('ahorro');
      var seleccion = $(this).data('seleccion');
      var cual = $(this).data('cual');

      $('.select-piso').val(seleccion);
      $('.el-piso').text(piso);
      $('.el-ahorro').text(ahorro);

      /*TRACKEO*/
      clicktrack({
        eventCategory : 'Cambio de piso en el edificio '+cual+': '+piso,
        eventAction : 'click'
      });
    });

    $('body').on('change', '.select-piso', function(e){
      var texto = $(this).find('option:selected').text();
      var price = $(this).find('option:selected').data('price');

      $(this).parents('.el-modal').find('.el-piso').text(texto);
      $(this).parents('.el-modal').find('.el-ahorro').text(price);


      var seleccion = $(this).val();
      $(this).parents('.el-modal').find('.nav-tabs li').removeClass('active');
      $(this).parents('.el-modal').find('.nav-tabs li a[data-seleccion="'+seleccion+'"]').parent().addClass('active');

      $(this).parents('.el-modal').find('.tab-pane').removeClass('active in');
      $(this).parents('.el-modal').find('.tab-pane[data-seleccion="'+seleccion+'"]').addClass('active in');

      var depto = $(this).find('option:selected').text();
      $(this).parents('.el-modal').find('.depto-val').val(depto);

      var cual = $(this).parents('.el-modal').find('.que-proyecto').val();
      clicktrack({
        eventCategory : 'Cambio de piso en el edificio desde formulario '+cual+': '+texto,
        eventAction : 'click'
      });
    });


});
