<?         
if(isset($_GET['pID'])) {
    $post = new WP_Query( array( 'post_type' => 'proyectos', 'post__in' => array($_GET['pID']))); 
} else {
    header('Location: index.php');
}

if(!$post->have_posts()) {
    header('Location: index.php');
}

if(isset($_POST['submit'])) {
    
    global $wpdb;
    
    $data['name']       = $_POST['name'];
    $data['rooms']      = $_POST['rooms'];
    $data['kitchen']    = $_POST['kitchen'];
    $data['bathrooms']  = $_POST['bathrooms'];
    $data['m2_floor']   = $_POST['m2_floor'];
    $data['m2_terrace'] = $_POST['m2_terrace'];
    $data['image']      = $_POST['image-url'];
    
    if(isset($_GET['tID'])) {
        $wpdb->update('floor_types', $data, array('id' => $_GET['tID']));                
    } else {
        
        $data['project_id'] = $_GET['pID'];
        
        $wpdb->insert('floor_types', $data);                
        $tID = $wpdb->insert_id;
                
        wp_redirect( get_admin_url(). 'admin.php?page=cotizador&action=view_type&tID='.$tID.'&pID='.$_GET['pID']);        
        
    }
}

$post->the_post();

$floor_type = getFloorType($_GET['tID']);

if(isset($_GET['tID'])) {
    $floors     = getFloorsByType($_GET['tID']);
	
}
 
add_thickbox();

?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?=get_bloginfo('template_directory').'/js/panel.js'; ?>"></script>
 
<div id="view-type" class="wrap">
    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador Proyecto: <? the_title()?> <a href="?page=cotizador&action=list_types&pID=<?=$_GET['pID']?>" class="add-new-h2">&larr; Volver al Proyecto</a></h2>    
    <div class="type-global-data">    
        <? if(isset($_GET['tID'])) {?>
       	<h2>Planta: <?=$floor_type->name ?></h2>
        <form method="post" enctype="multipart/form-data" onsubmit="return validateFloorType()">
        <? } else {?>
        <h2>Nueva Planta</h2>
        <form method="post" enctype="multipart/form-data" action="<?='admin.php?page=cotizador&action=view_type&pID='.$_GET['pID']?>&noheader=true" onsubmit="return validateFloorType()">
        <? }?>                
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="">Nombre</label></th>
                        <td>
                            <input name="name" id="name" type="text" maxlength="80" value="<?=$floor_type->name?>" class="normal-text">                      
                        </td>
                    </tr>

                    <tr>
                        <th scope="row"><label for="">Dormitorios</label></th>
                        <td>
                            <select name="rooms">
                                <option <? if($floor_type->rooms == 1) {?>selected="selected"<?}?> value="1">1 Dormitorio</option>
                                <option <? if($floor_type->rooms == 2) {?>selected="selected"<?}?> value="2">2 Dormitorios</option>
                                <option <? if($floor_type->rooms == 3) {?>selected="selected"<?}?> value="3">3 Dormitorios</option>
                                <option <? if($floor_type->rooms == 4) {?>selected="selected"<?}?> value="4">4 Dormitorios</option>
                                <option <? if($floor_type->rooms == 5) {?>selected="selected"<?}?> value="5">5 Dormitorios</option>
                            </select>                             
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">Baños</label></th>
                        <td>
                            <select name="bathrooms">
                                <option <? if($floor_type->bathrooms == 1) {?>selected="selected"<?}?> value="1">1 Baño</option>
                                <option <? if($floor_type->bathrooms == 2) {?>selected="selected"<?}?> value="2">2 Baños</option>
                                <option <? if($floor_type->bathrooms == 3) {?>selected="selected"<?}?> value="3">3 Baños</option>
                            </select>                            
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">Cocina Tipo</label></th>
                        <td>
                            <select name="kitchen">
                                <option <? if($floor_type->kitchen == 'C') {?>selected="selected"<?}?> value="C">Cocina</option>
                                <option <? if($floor_type->kitchen == 'K') {?>selected="selected"<?}?> value="K">Kitchenette</option>                    
                            </select>                           
                        </td>
                    </tr>
                    
                    <!--<tr>
                        <th scope="row"><label for="">Estado</label></th>
                        <td>
                            <select name="estado">
                                <option <? if($floor_type->status == 'DISPONIBLE') {?>selected="selected"<?}?> value="DISPONIBLE">Disponible</option>
                                <option <? if($floor_type->status == 'VENDIDO') {?>selected="selected"<?}?> value="VENDIDO">Vendido</option>                    
                            </select>                      
                        </td>
                    </tr>-->
                    
                    <tr>
                        <th scope="row"><label for="">Plano</label></th>                        
                        <?
                        	$image = !empty($floor_type->image) ? $floor_type->image : get_bloginfo('template_url').'/images/no_image.jpg';
                        ?>
                        <td>
                        	<?php if(CheckIfIsImage($image)){ ?>
                            	<img data-noimage="<?=get_bloginfo('template_url').'/images/no_image.jpg'?>" src="<?=$image?>" width="235" class="thumb">                        
                            <?php }else{ ?>
								<a href="<?=$image?>" target="_blank" class="document-holder" ><span id="eltexto">Ver Adjunto</span><img src="/wp-includes/images/crystal/document.png" class="thumb" /></a>
							<?php } ?>                            
                            <br>
                            <input type="button" class="upload-image button" value="Subir imagen" />
                            <input type="button" class="remove-image button" value="Quitar imagen" />
                            <input type="hidden" id="image-url" name="image-url" value="<?=$image?>"/>
                            <br><br>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">M2 Departamento</label></th>
                        <td>
                            <input name="m2_floor" id="m2_floor" type="text" value="<?=$floor_type->m2_floor?>" class="small-text">                      
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">M2 Terraza</label></th>
                        <td>
                            <input name="m2_terrace" id="m2_terrace" type="text" value="<?=$floor_type->m2_terrace?>" class="small-text">                      
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <td>                            
                            <input type="submit" name="submit" id="submit" class="button button-primary" value="Guardar cambios" />                            
                        </td>
                    </tr>
                </tbody>                    
            </table>            
        </form>                
    </div>
    
    <? if(isset($_GET['tID'])) {?>
    <h2>Pisos <a href="javascript: newFloor()" class="add-new-h2">Crear Nuevo</a> </h2>
    <table class="wp-list-table widefat fixed custom-list">
        <thead>
            <tr>
                <th style="width: 50px !important; text-align: right;">Piso</th>
                <th style="width: 110px !important; text-align: right;">Departamento</th>
                <th style="width: 110px !important;">Orientacion</th>
                <th style="width: 85px !important; text-align: right;">Valor UF</th>
                <th style="width: 205px !important; text-align: center;">Disponible</th>                
                <th></th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th style="text-align: right;">Piso</th>
                <th style="text-align: right;">Departamento</th>
                <th>Orientacion</th>
                <th style="text-align: right;">Valor UF</th>
                <th style="text-align: center;">Disponible</th>  
                <th></th>
            </tr>
        </tfoot>
        <tbody id="floors-list">
            <tr id="new-floor" data-floor-type-id="<?=$_GET['tID']?>" data-id="NEW" class="is-new" style="display: none">
                <td valign="middle" align="right" class="floor"></td>
                <td valign="middle" align="right" class="number"></td>
                <td valign="middle" class="orientation"></td>
                <td valign="middle" align="right" class="price"></td>
                <td valign="middle" align="center" class="is-check checked available">&#10004;</td>
                <td valign="middle" align="right" class="actions">                    
                    <button data-id="NEW" class="button-primary save-edit-floor">Guardar</button>
                    <button data-id="NEW" class="button cancel-edit-floor">Cancelar</button>
                    <span class="spinner"></span>
                    &nbsp;&nbsp;
                </td>
            </tr>             
            <? foreach($floors as $floor) { ?>
            <tr data-id="<?=$floor->id?>" data-floor-type-id="<?=$_GET['tID']?>">
                <td valign="middle" align="right" class="floor"><?=$floor->floor?></td>
                <td valign="middle" align="right" class="number"><?=$floor->number?></td>
                <td valign="middle" class="orientation"><?=$floor->orientation?></td>
                <td valign="middle" align="right" class="price"><?=$floor->price?></td>
                <td valign="middle" align="center" class="is-check <?=$floor->status == 'DISPONIBLE' ? 'checked' : 'unchecked'; ?> available">
                    <?=$floor->status == 'DISPONIBLE' ? '&#10004;' : '&#10007;'; ?>                     
                </td>
                <td valign="middle" align="right">
                    <button data-id="<?=$floor->id?>" class="button-primary toggle-control edit-floor">Editar</button>
                    <button data-id="<?=$floor->id?>" class="button toggle-control delete-floor">Eliminar</button>
                    <button data-id="<?=$floor->id?>" class="button-primary hide save-edit-floor">Guardar</button>
                    <button data-id="<?=$floor->id?>" class="button hide cancel-edit-floor">Cancelar</button>
                    <span class="spinner"></span>
                    &nbsp;&nbsp;
                </td>
            </tr>  
            <? }?>
        </tbody>
    </table>    
    <? } ?>
</div>