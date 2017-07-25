<?         

if(isset($_GET['pID'])) {
    $post = new WP_Query( array( 'post_type' => 'proyectos', 'post__in' => array($_GET['pID']))); 
} else {
    die('No existe el proyecto');
}

if(!$post->have_posts()) {
    die('No existe el proyecto');
}

if(isset($_POST['submit'])) {
   // $plantas = getTypeList($_GET['pID']);
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
       
        $fp = fopen($_FILES['file']['tmp_name'], "r");
        
        $grid  = '<table class="wp-list-table widefat fixed custom-list">';
        $grid .= '
        <thead>
        	<tr>
        		<th>ID planta relacionada</th>
        		<th>Piso</th>
        		<th>Departamento</th>
        		<th>Precio UF</th>
        		<th>Orientacion</th>
        		<th style="text-align:center">Disponible</th>
        		<th></th>
        	</tr>
        </thead>';
               
        $i = 0;
        
        while(($datos = fgetcsv($fp, 0, ';')) !== FALSE) {            
            
            if($i != 0) {
                	
                $floor_type_id	= isset($datos[0]) ? $datos[0] : '';
                $floor			= isset($datos[1]) ? $datos[1] : '';
                $number			= isset($datos[2]) ? $datos[2] : '';
                $price			= isset($datos[3]) ? $datos[3] : '';
                $orientation	= isset($datos[4]) ? $datos[4] : '';    

                if(!isset($datos[5])) {
                    $available =  '';
                } else {
                    $available = '';
                    if(strtolower($datos[5]) == 'si') {  $available = 'checked="checked"'; }                 
                }

                $grid .= '
                	<tr>
	                	<td>
	                		<input name="floor_type_id['.$i.']" value="'.$floor_type_id.'" type="text" class="small-text only-number" />
	                	</td>
	                	<td>
	                		<input name="floor['.$i.']" value="'.$floor.'" type="text" class="small-text only-number" />
	                	</td>
	                	<td>
	                		<input name="number['.$i.']" value="'.$number.'" type="text" class="small-text" />
	                	</td>
	                	<td>
	                		<input name="price['.$i.']" value="'.$price.'" type="text" class="small-text only-number" />
	                	</td>
	                	<td>
	                		<input name="orientation['.$i.']" value="'.$orientation.'" type="text" class="normal-text" />
	                	</td>
	                	<td align="center">
	                		<input name="available['.$i.']" value="1" '.$available.' type="checkbox" />
	                	</td>
	                	<td align="right">
	                		<input type="button" class="toggle-control delete-imported-row button" value="X" />
	                	</td>
                	</tr>
                ';
               
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
    foreach($_POST['floor'] as $l => $x){
    	$elid = getFloorTypeByUnique($_POST['floor_type_id'][$x]);
		$wpdb->delete('floors',array('floor_type_id' => $elid['id']) );
    }
    foreach($_POST['floor'] as $k => $v) {
		$elid = getFloorTypeByUnique($_POST['floor_type_id'][$k]);
		if($elid != false){
			$insert = array(                
	            'floor' =>$_POST['floor'][$k],
	            'number' =>$_POST['number'][$k],
	            'price' =>$_POST['price'][$k],
	            'available' => isset($_POST['available'][$k]) ? $_POST['available'][$k] : 0,
	            'orientation' =>$_POST['orientation'][$k],
	            'floor_type_id' => $elid['id'],
	        );
	        $wpdb->insert('floors', $insert);

		}else{
			echo '<p>No se importo el departamento '.$_POST['number'][$k] .'/ piso'.$_POST['floor'][$k] .' debido a que el id de planta es incorrecto o no existe</p>';
		}
    }
}

$post->the_post();

//$floor_type = getFloorType($_GET['tID']);
?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="<?=get_bloginfo('template_directory').'/js/panel.js'; ?>"></script>
<div id="floor-types" class="wrap">
    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador: Proyecto <? the_title()?><a href="?page=cotizador&action=list_types&pID=<?=$_GET['pID']?>" class="add-new-h2">&larr; Volver al proyecto</a></h2>       
    <?
    if(!isset($grid )) { 
        if(isset($_POST['import'])) {
        ?>
			<h2>Importacion exitosa</h2>
			<p><?=count($_POST['floor'])?> departamentos importados con exito!</p>
            <p><input name="import" type="button" class="button-primary" value="Volver" onclick="location.href='?page=cotizador&&action=list_types&pID=<?=$_GET['pID']?>'" /></p>
        <?            
        } else {
        ?>
		<!-- <h2>Planta: <?=$floor_type->rooms?>D-<?=$floor_type->bathrooms?>B-<?=$floor_type->kitchen?></h2>-->
        <form id="csv-import-form" method="post" enctype="multipart/form-data">
            <h2>Importar pisos</h2>
            <h3>Instrucciones:</h3>
            <p>Las columnas deben estar ordenadas de la siguiente manera: <b>Piso, Departamento, Precio, Disponible, Orientacion</b>. La primer fila, que contiene el nombre de las columans, se obviara. <br /><br /><b>Imagen de ejemplo</b><br /> <img src="<?=  get_bloginfo('template_url')?>/images/ejemplo_1.png" /></p>
            <p><a href="<?= get_bloginfo('template_url')?>/plantilla_pisos.csv" />Descargar Plantilla CSV</a></p>
            <br />
            <p>Seleccione el archivo .CSV para importar.</p>
            <input type="file" name="file" />
            <p><input name="submit" type="submit" class="button-primary" value="Subir" /></p>

        </form>
        <? }?>
    <?     
    } else { 
    ?>         
        <form method="post" onsubmit="return validateFloorImport()">
            <? echo $grid;?>
            <p><input name="import" type="submit" class="button-primary" value="Importar" /></p>
        </form>
    <?        
    } ?>
    <br class="clear">
</div>