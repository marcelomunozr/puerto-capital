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
    echo 'send';
}

$post->the_post();


?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
<div id="view-type" class="wrap">

    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador Proyecto: <? the_title()?> <a href="?page=cotizador&action=list_types&pID=<?=$_GET['pID']?>" class="add-new-h2">&larr; Volver al Proyecto</a></h2>    
    
    <div class="type-global-data">     
        <h2>Planta: D2-B1-C</h2>
        <form method="post">
            <table class="form-table">
                <tbody>
                    <tr>
                        <th scope="row"><label for="">Dormitorios</label></th>
                        <td>
                            <select>
                                <option>1 Dormitorio</option>
                                <option>2 Dormitorios</option>
                                <option>3 Dormitorios</option>
                                <option>4 Dormitorios</option>
                                <option>5 Dormitorios</option>
                            </select>                             
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">Baños</label></th>
                        <td>
                            <select>
                                <option>1 Baño</option>
                                <option>2 Baños</option>
                                <option>3 Baños</option>
                            </select>                            
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">Cocina Tipo</label></th>
                        <td>
                            <select>
                                <option>Cocina</option>
                                <option>Kitchenette</option>                    
                            </select>                           
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">Plano</label></th>
                        <td>
                            <img src="http://www.casamanni.com/cms/assets/images/floor-plan.jpg" width="235" class="thumb">                        
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">M2 Departamento</label></th>
                        <td>
                            <input type="text" value="" class="small-text">                      
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="">M2 Terraza</label></th>
                        <td>
                            <input type="text" value="" class="small-text">                      
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
    
    <h2>Pisos <a href="#" class="add-new-h2">Crear Nuevo</a> <a href="#" class="add-new-h2">Importar desde CSV</a></h2>
    <table class="wp-list-table widefat fixed custom-list">
        <thead>
            <tr>
                <th>Piso</th>
                <th>Departamento</th>
                <th>Valor UF</th>
                <th>Disponible</th>                
                <th></th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Piso</th>
                <th>Departamento</th>
                <th>Valor UF</th>
                <th>Disponible</th>    
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td><a class="row-title thickbox" href="http://puertocapital.multinetlabs.com/wp-admin/admin.php?page=cotizador&action=view_floow&tID=1&pID=13" title="Piso 1">Piso 1</a></td>
                <td>105</td>
                <td>1999</td>
                <td>&#10004;</td>
                <td></td>
            </tr>  
        </tbody>
    </table>    
</div>