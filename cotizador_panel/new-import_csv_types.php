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
        $grid .= '
        <thead>
        	<tr>
        		<th>Tipo de Planta</th>
        		<th>Programa</th>
        		<th>Piso</th>
        		<th>Numero</th>
        		<th>Precio</th>
        		<th>Orientacion</th>
        		<th>Habitaciones</th>
        		<th>Tipo de cocina</th>
        		<th>Baños</th>
        		<th>M2 Depto.</th>
        		<th>M2 Terraza</th>
        		<th>Imágen Adjunta</th>
        		<th>Estado</th>
        		<th>&nbsp;</th>
        	</tr>
        </thead>';
		if(count(fgetcsv($fp, 0, ';'))>=11){
			$i = 1;
			echo '<tbody>';
	        while(($datos = fgetcsv($fp, 0, ';')) !== FALSE) {            
	            if($i != 0) {
					$project_id		= $_GET['pID'];
					$floor_type 	= isset($datos[0]) ? $datos[0] : '';
					$program		= isset($datos[1]) ? $datos[1] : '';
					$floor			= isset($datos[2]) ? $datos[2] : '';	
					$number 		= isset($datos[3]) ? $datos[3] : '';	
	            	$price			= isset($datos[4]) ? $datos[4] : '';
					$status			= isset($datos[5]) ? strtoupper($datos[5]) : '';
					$orientation	= isset($datos[6]) ? $datos[6] : '';
					$rooms			= isset($datos[7]) ? $datos[7] : '';
					$kitchen		= isset($datos[8]) ? $datos[8] : '';
					$bathrooms		= isset($datos[9]) ? $datos[9] : '';
					$m2_floor		= isset($datos[10]) ? $datos[10] : '';    
	                $m2_terrace		= isset($datos[11]) ? $datos[11] : '';
					$attachment		= isset($datos[12]) ? $datos[12] : '';
					if($attachment != ''){
						$filename 	=	$attachment;
						$attachment = 'href="/upload/'.$attachment.'" target="_blank"';
					}else{
						$attachment = 'href="#"';
					}
					$grid .= '
					<tr>
					<td><input name="data['.$floor_type.']['.$i.'][floor_type]" value="'.$floor_type.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][program]" value="'.$program.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][floor]" value="'.$floor.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][number]" value="'.$number.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][price]" value="'.$price.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][orientation]" value="'.$orientation.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][rooms]" value="'.$rooms.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][kitchen]" value="'.$kitchen.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][bathrooms]" value="'.$bathrooms.'" type="text" class="normal-text" /></td>	
					<td><input name="data['.$floor_type.']['.$i.'][m2_floor]" value="'.$m2_floor.'" type="text" class="normal-text" /></td>
					<td><input name="data['.$floor_type.']['.$i.'][m2_terrace]" value="'.$m2_terrace.'" type="text" class="normal-text" /></td>
					<td>
					<a '.$attachment.'>Ver archivo</a>
					<input name="data['.$floor_type.']['.$i.'][attachment['.$i.']" value="'.$filename.'" type="hidden" />
					</td>
					<td><select name="data['.$floor_type.']['.$i.'][status]">';
					if($status == 'DISPONIBLE'){
						$grid .= '
						<option value="DISPONIBLE" selected>Disponible</option>
						<option value="VENDIDO">Vendido</option>';
					}elseif($status == 'VENDIDO'){
						$grid .= '
						<option value="DISPONIBLE">Disponible</option>
						<option value="VENDIDO" selected>Vendido</option>';
					}else{
						$grid .= '
						<option value="">Seleccione un estado</option>
						<option value="DISPONIBLE">Disponible</option>
						<option value="VENDIDO">Vendido</option>';
					}
					$grid .= '</select></td><td align="right"><input type="button" class="toggle-control delete-imported-row button" value="X" /></td></tr>';
				}
				$i++;
	        }
			echo '</tbody>';

		}else{
			echo '
				<tbody>
					<tr><td colspan="13">El archivo no venia en el formato correcto, por favor subirlo de nuevo</td></tr>
				</tbody>
			';
		}
        $grid .= '</table>';
        fclose($fp);
    
    } else {
        echo 'no upload';
    }
}
if(isset($_POST['import'])) {
    global $wpdb;
    $wpdb->delete('departments', array('project_id' => $_GET['pID']) );
    $subidos = array();
	echo '<pre>';
	print_r($_POST['data']);
	echo '</pre>';
	$planta = array();
	foreach($_POST['data'] as $id=>$planta){
	}
	
	die();
    /*foreach($_POST['data'] as $k => $datos) {
		$insert = array(                
            'type_name'	=> $datos['floor_type'],
            'project_id'	=> $_GET['pID'],
            'program_name'	=> $datos['program'],
            'floor'			=> $datos['floor'],
            'number'		=> $datos['number'],
            'price'			=> $datos['price'],
            'status'		=> $datos['status'],
            'orientation'	=> $datos['orientation'],
            'rooms'			=> $datos['rooms'],
            'kitchen_type'	=> $datos['kitchen'],
            'bathrooms'		=> $datos['bathrooms'],
            'm2_floor'		=> $datos['m2_floor'],
            'm2_terrace'	=> $datos['m2_terrace'],            
        );
        $wpdb->insert('departments', $insert);
		if( !class_exists( 'WP_Http' ) )
			include_once( ABSPATH . WPINC. '/class-http.php' );
		$laid = $wpdb->insert_id;
		$filename = $_POST['attachment'][$k];
		if(!isset($subidos[$filename])){
			$elarchivo = uploadFloorAttachment($laid, $filename);
			$subidos[$filename] = $elarchivo;
		}else{
			$wpdb->update('departments', array('image' => $subidos[$filename]), array('id' => $laid));
		}
	}*/
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
                        
            <p><?=count($_POST['data'])?> tipos de plantas importados con exito!</p>
            <p><input name="import" type="button" class="button-primary" value="Volver" onclick="location.href='?page=cotizador&&action=list_types&pID=<?=$_GET['pID']?>'" /></p>
            
        <?            
        } else {
        ?>

        <form id="csv-import-types-form" method="post" enctype="multipart/form-data">

            <h2>Importar tipos de plantas</h2>

            <h3>Instrucciones:</h3>
            <p>Las columnas deben estar ordenadas de la siguiente manera: <b>Nombre planta, Dormitorios, Baños, Cocina Tipo (c o k); M2 Departamento, M2 Terraza, Imágen, Estado</b>. Para medidas como M2 El separador de decimales es el punto, la primer fila, que contiene el nombre de las columans, se obviara. <br /><br /><b>Imagen de ejemplo</b><br /> <img src="<?=  get_bloginfo('template_url')?>/images/ejemplo_2.png" /></p>
            <p><a href="<?= get_bloginfo('template_url')?>/ejemplo_plantilla.csv" />Descargar Plantilla CSV</a></p>

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