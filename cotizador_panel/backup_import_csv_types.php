<?php         

if(isset($_GET['pID'])) {
    $post = new WP_Query( array( 'post_type' => 'proyectos', 'post__in' => array($_GET['pID']))); 
} else {
    die('No existe el proyecto');
}

if(!$post->have_posts()) {
    die('No existe el proyecto');
}

if(isset($_POST['submit'])) {
    
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
       
        $fp = fopen($_FILES['file']['tmp_name'], "r");
        
        $grid  = '<table class="wp-list-table widefat fixed custom-list">';
        $grid .= '<thead><tr><th>Nombre Planta</th><th>Dormitorios</th><th>Baños</th><th>Cocina Tipo</th><th>M2 Departamento</th><th>M2 Terraza</th><th></th></tr></thead>';
               
        $i = 0;
        
        while(($datos = fgetcsv($fp, 0, ';')) !== FALSE) {            
            
            if($i != 0) {
                
                $type_name		= isset($datos[0]) ? $datos[0] : '';
                $rooms			= isset($datos[1]) ? $datos[1] : '';
                $bathrooms		= isset($datos[2]) ? $datos[2] : '';
                $kitchen		= isset($datos[3]) ? $datos[3] : '';                    
                $m2_floor		= isset($datos[4]) ? $datos[4] : '';    
                $m2_terrace		= isset($datos[5]) ? $datos[5] : '';
				$attachment		= isset($datos[6]) ? $datos[6] : '';
				$grid .= '<tr><td><input name="type_name['.$i.']" value="'.$type_name.'" type="text" class="normal-text" /></td><td><input name="rooms['.$i.']" value="'.$rooms.'" type="text" class="small-text only-number" /></td><td><input name="bathrooms['.$i.']" value="'.$bathrooms.'" type="text" class="small-text only-number" /></td><td><input name="kitchen['.$i.']" value="'.$kitchen.'" type="text" class="small-text" /></td><td><input name="m2_floor['.$i.']" value="'.$m2_floor.'" type="text" class="small-text only-number" /></td><td><input name="m2_terrace['.$i.']" value="'.$m2_terrace.'" type="text" class="small-text only-number" /></td><td align="right"><input type="button" class="toggle-control delete-imported-row button" value="X" /></td></tr>';
            } 
             $i++;
        }
        
        $grid .= '</table>';        
        fclose($fp);
    
    } else {
        echo 'no upload';
    }

}

if(isset($_POST['import'])) {
    
    global $wpdb;
    
    $wpdb->delete('floor_types',array('project_id' => $_GET['pID']) );
    
    foreach($_POST['type_name'] as $k => $v) {
        $insert = array(                
            'name' =>$_POST['type_name'][$k],
            'rooms' =>$_POST['rooms'][$k],
            'kitchen' => strtoupper($_POST['kitchen'][$k]),
            'bathrooms' =>$_POST['bathrooms'][$k],
            'm2_floor' =>$_POST['m2_floor'][$k],
            'm2_terrace' =>$_POST['m2_terrace'][$k],
            'project_id' => $_GET['pID'],
        );
        $wpdb->insert('floor_types', $insert);
	}
   
   //die();
   
}

$post->the_post();

?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?=get_bloginfo('template_directory').'/js/panel.js'; ?>"></script>

<div id="floor-types" class="wrap">

    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador: Proyecto <? the_title()?><a href="?page=cotizador&action=list_types&pID=<?=$_GET['pID']?>" class="add-new-h2">&larr; Volver al Proyecto</a></h2>       
    
    <?
    if(!isset($grid )) { 
    
        if(isset($_POST['import'])) {
        ?>       
            <h2>Importación exitosa</h2>
                        
            <p><?=count($_POST['type_name'])?> tipos de plantas importados con exito!</p>
            <p><input name="import" type="button" class="button-primary" value="Volver" onclick="location.href='?page=cotizador&&action=list_types&pID=<?=$_GET['pID']?>'" /></p>
            
        <?            
        } else {
        ?>

        <form id="csv-import-types-form" method="post" enctype="multipart/form-data">

            <h2>Importar tipos de plantas</h2>

            <h3>Instrucciones:</h3>
            <p>Las columnas deben estar ordenadas de la siguiente manera: <b>Nombre planta, Dormitorios, Baños, Cocina Tipo (c o k); M2 Departamento, M2 Terraza</b>. Para medidas como M2 El separador de decimales es el punto, la primer fila, que contiene el nombre de las columans, se obviara. <br /><br /><b>Imagen de ejemplo</b><br /> <img src="<?=  get_bloginfo('template_url')?>/images/type_import_csv_sample.png" /></p>
            <p><a href="<?= get_bloginfo('template_url')?>/plantilla_plantas.csv" />Descargar Plantilla CSV</a></p>

            <br />
            <p>Seleccione el archivo .CSV para importar.</p>

            <input type="file" name="file" />

            <p><input name="submit" type="submit" class="button-primary" value="Subir" /></p>

        </form>
        <? }?>
    <?     
    } else { 
    ?>         
            <h2>Importar a Proyecto: <? the_title();?></h2>
            <form method="post" onsubmit="return validateTypesImport()">
                <? echo $grid;?>
                <p><input name="import" type="submit" class="button-primary" value="Importar" /></p>
            </form>
    <?        
    } ?>
    <br class="clear">
</div>