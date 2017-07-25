<?php
if(is_post_type_archive('kareen-articulo') || is_post_type_archive('kareen-respuesta') || is_post_type_archive('kareen-ganadora') || is_singular('kareen-articulo') || is_page('asesoria-virtual') || is_page('consulta-a-kareen') || is_page('siluetas')){
?>


<div class="col-md-3 sidebar">
  <?php dynamic_sidebar('sidebar-kareen')?>

</div>

<?php } elseif(is_post_type_archive('recetas') || is_singular('recetas')) {?>
<div class="col-md-3 sidebar">
  <?php dynamic_sidebar('sidebar-recetas')?>

</div>


<?php } else {?>

<div class="col-md-3 sidebar">
  <?php dynamic_sidebar('sidebar')?>
</div>

<? } ?>
