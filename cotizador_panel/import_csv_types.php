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
        $grid  = '<table class="wp-list-table widefat fixed custom-list" style="table-layout: auto;">';
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
		if(count(fgetcsv($fp, 0, ';'))>=12){
			$i = 1;
			while(($datos = fgetcsv($fp, 0, ';')) !== FALSE) {
                if($i != 0) {
					$project_id		= $_GET['pID'];
					$floor_type 	= isset($datos[0]) ? $datos[0] : '';
					$program		= isset($datos[1]) ? $datos[1] : '';
					$floor			= isset($datos[2]) ? $datos[2] : '';	
					$number 		= isset($datos[3]) ? $datos[3] : '';	
	            	$price			= isset($datos[4]) ? str_replace(',', '.', $datos[4]) : '';
					$status			= isset($datos[5]) ? strtoupper($datos[5]) : '';
					$orientation	= isset($datos[6]) ? $datos[6] : '';
					$rooms			= isset($datos[7]) ? $datos[7] : '';
					$kitchen		= isset($datos[8]) ? $datos[8] : '';
					$bathrooms		= isset($datos[9]) ? $datos[9] : '';
					$m2_floor		= isset($datos[10]) ? str_replace(',', '.', $datos[10]) : '';    
	                $m2_terrace		= isset($datos[11]) ? str_replace(',', '.', $datos[11]) : ''; 
					$attachment		= isset($datos[12]) ? $datos[12] : '';
                    $preffix        = isset($datos[13]) ? $datos[13] : '';
					if($preffix != ''){
					    $attachment = $preffix . "-" . $attachment;
					}
					if(!mb_detect_encoding($attachment, 'UTF-8') == true){
                        $attachment = stripAccents($attachment);
                    }else{
                        $attachment = stripAccents(utf8_encode($attachment));
                    }
                    if(mb_detect_encoding($floor_type) != 'UTF-8'){
                        $floor_type = stripAccents($floor_type);
                    }else{
                        $floor_type = stripAccents(utf8_encode($floor_type));
                    }
					if($attachment != ''){
						if(file_exists($_SERVER['DOCUMENT_ROOT'].'/upload/'.$attachment.'')){
							$filename 	=	$attachment;
							$attachment = '<a href="/upload/'.$attachment.'" target="_blank">Ver archivo</a>';
						}else{
							$attachment = '<p>Archivo '.$attachment.' no encontrado</p>';
							$filename	= $_SERVER['DOCUMENT_ROOT'].'upload/'.$attachment.'';
						}
					}else{
						$attachment = '<p>Sin archivo adjunto</p>';
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
					'.$attachment.'
					<input name="data['.$floor_type.']['.$i.'][attachment]" value="'.$filename.'" type="hidden" />
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
						<option value="DISPONIBLE">Seleccione un estado</option>
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
	$lospisos = getFloorTypes($_GET['pID']);
	foreach($lospisos as $elpiso){	
		$wpdb->delete('floor_types', array('id' => $elpiso->id) );
		$wpdb->delete('floors', array('floor_type_id' => $elpiso->id) );
	}
    $subidos = array();
	$plantas = array();
	$ct = array();
	$i = 0;
	foreach($_POST['data'] as $id=>$planta){
		foreach($planta as $piso){
			$plantas[$id]['name'] = $piso['floor_type'];
			$plantas[$id]['program'] = $piso['program'];
			$plantas[$id]['rooms'] = $piso['rooms'];
			$plantas[$id]['kitchen'] = $piso['kitchen'];
			$plantas[$id]['bathrooms'] = $piso['bathrooms'];
			$plantas[$id]['m2_floor'] = $piso['m2_floor'];
			$plantas[$id]['m2_terrace'] = $piso['m2_terrace'];
			$plantas[$id]['image'] = $piso['attachment'];
			$plantas[$id]['project_id'] = $_GET['pID'];
			break;
		}
		$i += 1;
	}
	foreach($_POST['data'] as $id=>$planta){
		$id = 0;	
		foreach($planta as $piso){
			$plantas[$piso['floor_type']]['Pisos'][$id]['floor']		= $piso['floor'];
			$plantas[$piso['floor_type']]['Pisos'][$id]['number']		= $piso['number'];
			$plantas[$piso['floor_type']]['Pisos'][$id]['price']		= $piso['price'];
			$plantas[$piso['floor_type']]['Pisos'][$id]['avaible']		= $piso['status'];
			$plantas[$piso['floor_type']]['Pisos'][$id]['orientation']	= $piso['orientation'];
			$id += 1;
		}
	}
	$importado = 0;
	foreach($plantas as $planta){
		$insert = array(                
            'name'			=> $planta['name'],
            'program'		=> $planta['program'],
            'rooms'			=> $planta['rooms'],
            'kitchen'		=> $planta['kitchen'],
            'bathrooms'		=> $planta['bathrooms'],
            'm2_floor'		=> $planta['m2_floor'],
            'm2_terrace'	=> $planta['m2_terrace'],
            'project_id'	=> $_GET['pID']         
        );
		$wpdb->insert('floor_types', $insert);
		$laid = $wpdb->insert_id;
		foreach($planta['Pisos'] as $piso){
			$insert = array(                
	            'floor'			=> $piso['floor'],
	            'number'		=> $piso['number'],
	            'price'			=> $piso['price'],
	            'status'		=> $piso['avaible'],
	            'orientation'	=> $piso['orientation'],
            	'floor_type_id'	=> $laid
	        );
			$wpdb->insert('floors', $insert);
		}
		$filename = $planta['image'];
		
		if(!isset($subidos[$filename])){
			$elarchivo = uploadFloorAttachment($laid, $filename);
			if($elarchivo != false){
				$subidos[$filename] = $elarchivo;
			}
			$wpdb->update('floor_types', array('image' => $elarchivo), array('id' => $laid));
		}else{
			$wpdb->update('floor_types', array('image' => $subidos[$filename]), array('id' => $laid));
		}
	}
		
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
            <p>Las columnas deben estar ordenadas de la siguiente manera: <b>Tipo de planta, Programa, Piso, Número, Precio, Estado, Orientación, Dormitorios, Cocina, baños, M2 Dpto, M2 Terraza, Archivo Adjunto</b>. Para medidas como M2 El separador de decimales es el punto, la primer fila, que contiene el nombre de las columans, se obviara. Tambien, considerar que los nombres de archivo en lo posible no tengan espacios ni acentos ya que al subirlos causa errores <br><br><b>Imagen de ejemplo</b><br> <img src="http://puertocapital.multinetlabs.com/wp-content/themes/puertocapital/images/ejemplo_2.png"></p>
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
            <input type="hidden" name="import" value="1" />
            <? echo $grid;?>
            <p><input name="import" type="submit" class="button-primary" value="Importar" /></p>
        </form>
    <?        
    } ?>
    <br class="clear">
</div>