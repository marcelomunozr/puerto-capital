<?php         

if(isset($_GET['pID'])) {
    $post = new WP_Query( array( 'post_type' => 'proyectos', 'post__in' => array($_GET['pID']))); 
} else {
    die('No existe el proyecto');
}

if(!$post->have_posts()) {
    die('No existe el proyecto');
}

if(isset($_GET['deleteID'])) {    
    
    global $wpdb;
    
    $wpdb->delete('floor_types', array( 'id' => $_GET['deleteID'], 'project_id' => $_GET['pID']));
    $wpdb->delete('quotes', array( 'floor_type_id' => $_GET['deleteID']));
    $wpdb->delete('floors', array( 'floor_type_id' => $_GET['deleteID']));
    
    wp_redirect( get_admin_url(). 'admin.php?page=cotizador&action=list_types&pID='.$_GET['pID']);
    
}
	
$post->the_post();

$floor_types    = getFloorTypes($_GET['pID']);

if(isset($_GET['export'])) {           
    
    $datefrom = explode('-', $_GET['dateFrom']);
    $dateto   = explode('-', $_GET['dateTo']);       
    $datefrom = $datefrom[2].'-'. $datefrom[1].'-'. $datefrom[0];
    $dateto   = $dateto[2].'-'. $dateto[1].'-'. $dateto[0];
    
    $project_quotes = getQuotesByProjectId($_GET['pID'], $datefrom, $dateto);
    
    $lines = array(array('Codigo', 'Nombre Completo', 'Email', 'Mobil', 'Telefono', 'Departamento', 'Valor', 'Bodega', 'Estacionamiento', 'Fecha'));
             
    foreach ($project_quotes as $quote) {        
        $lines[] = array($quote->id, $quote->fullname, $quote->email, $quote->mobile, $quote->phone,$quote->number,'UF '.$quote->quote,'UF '.$quote->optional_warehouse,'UF '.$quote->optional_parking, date("d/m/Y",strtotime($quote->date)));    
    }

    header("Content-type: text/csv");
    header("Cache-Control: no-store, no-cache");
    header('Content-Disposition: attachment; filename="filename.csv"');

    $outstream = fopen("php://output",'w');

    foreach ($lines as $line) {
        fputcsv($outstream, $line, ';');
    }

    fclose($outstream);    
    die();
    
} else {
    $project_quotes = getQuotesByProjectId($_GET['pID']);

}

?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
<link rel="stylesheet" type="text/css" media="all" href="//code.jquery.com/ui/1.10.3/themes/flick/jquery-ui.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script src="<?=get_bloginfo('template_directory').'/js/panel.js'; ?>"></script>

<div id="floor-types" class="wrap">

    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador <a href="?page=cotizador" class="add-new-h2">&larr; Ver Proyectos</a></h2>    
    
    <div class="project-data">
        <img src="<?=get_custom_field('front_image')?>" width="200" class="thumb">
        <div class="info">
            <h2><? the_title()?></h2>
            <span class="info-line"><?=get_custom_field('address')?></span>
            <span class="info-line">
                <?
                $rooms = get_custom_field('rooms');
                
                echo implode(' | ', $rooms);               
                
                ?> Dormitorios
            </span>            
        </div>
        <br class="clear">
    </div>
    
    <h2 id="project-tabs-options" class="nav-tab-wrapper nav-tabs">
        <a href="#f" class="nav-tab nav-tab-active" data-activate-view="floor-types-view">Plantas</a>
        <a href="#q" class="nav-tab" data-activate-view="quotes-view">Historial de Cotizaciones</a>
    </h2>    
    
    <div class="floor-types-view tab-view">
        
		<p>
			<a href="?page=cotizador&action=view_type&pID=<?=$_GET['pID']?>" class="button-primary">Crear Nueva</a>
			<a href="admin.php?page=cotizador&action=import_csv_types&pID=<?=$_GET['pID']?>" class="button-primary">Importar Plantas desde CSV</a>
		</p>
        
        <table class="wp-list-table widefat fixed custom-list">
            <thead>
                <tr>
					<th>Planta</th>
                    <th>Programa</th>
                    <th>Piezas</th>
                    <th>Baños</th>
                    <th>Tipo Cocina</th>
                    <th>M2 Planta</th>
                    <th>M2 Terraza</th>
                    <th>Imágen adjunta</th>                    
                    <th></th>        
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Planta</th>
                    <th>Programa</th>
                    <th>Piezas</th>
                    <th>Baños</th>
                    <th>Tipo Cocina</th>
                    <th>M2 Planta</th>
                    <th>M2 Terraza</th>
                    <th>Imágen adjunta</th>
                    <th></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach($floor_types as $floor_type){ ?>
                	<tr>
	                	<td><?= $floor_type->name ?></td>
	                	<td><?= $floor_type->program ?></td>
	                	<td><?= $floor_type->rooms ?></td>
	                	<td><?= $floor_type->kitchen ?></td>
	                	<td><?= $floor_type->bathrooms ?></td>
	                	<td><?= $floor_type->m2_floor ?></td>
	                	<td><?= $floor_type->m2_terrace ?></td>
	                	<td><?= ($floor_type->image != '') ? '<a href="'.$floor_type->image.'" target="_blank"">Ver Imágen</a>' : '<p>Sin Imágen</p>'; ?></td>
	                	<td align="right">
	                        <a href="?page=cotizador&action=view_type&tID=<?=$floor_type->id?>&pID=<?=$_GET['pID']?>">
	                            <button data-id="<?=$floor_type->id?>" class="button-primary toggle-control">Editar</button>
	                        </a>
	                        <a href="?page=cotizador&action=list_types&deleteID=<?=$floor_type->id?>&pID=<?=$_GET['pID']?>&noheader=true">
	                            <button data-id="<?=$floor_type->id?>" class="button toggle-control">Eliminar</button>
	                        </a>
	                    </td>
                    </tr>
                <?php } ?>
               
            </tbody>
        </table>
        <br class="clear">
    </div>
    <div class="quotes-view tab-view" style="display: none">
        
        <p><button href="#view-date-range" class="button-primary toggle-quote-date-range">Exportar Cotizaciones</button></p>
        
        <div class="quote-date-range">   
            
            <label>Fecha Desde</label><br />
            <input id="date-from" class="small-text" type="text" readonly  /><br /><br />
            
            <label>Fecha Hasta</label><br />
            <input id="date-to" class="small-text" type="text" readonly />
            <input id="pID" type="hidden" value="<?=$_GET['pID']?>" />
            
            <p>
                <button class="button-primary download-quotes">Descargar</button>
                <button class="button toggle-quote-date-range">Cancelar</button>
            </p>
        </div>
        
        <table class="wp-list-table widefat fixed custom-list">
            <thead>
                <tr>
                    <th style="width: 75px !important; text-align: right;">Codigo</th>
                    <th style="width: 193px !important;">Nombre Completo</th>
                    <th style="width: 210px !important;">Email</th>
                    <th style="width: 105px !important;">Mobil</th>
                    <th style="width: 105px !important;">Telefono</th>
                    <th style="width: 80px !important;">Departamento</th>
                    <th style="width: 80px !important;text-align: right;">Valor</th>
                    <th style="width: 80px !important;text-align: right;">Bodega</th>
                    <th style="width: 140px !important;text-align: right;">Estacionamiento</th>                    
                    <th style="width: 120px !important;">Fecha</th>                       
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th style="text-align: right;">Codigo</th>
                    <th>Nombre Completo</th>
                    <th>Email</th>
                    <th>Mobil</th>
                    <th>Telefono</th>
                    <th>Departamento</th>
                    <th style="text-align: right;">Valor</th>
                    <th style="text-align: right;">Bodega</th>
                    <th style="text-align: right;">Estacionamiento</th>                    
                    <th>Fecha</th>  
                </tr>
            </tfoot>
            <tbody>
                <? foreach($project_quotes as $quote){ ?>
                <tr>
                    <td align="right"><?=$quote->id?></td>
                    <td><?=$quote->fullname?></td>
                    <td><?=$quote->email?></td>
                    <td><?=$quote->mobile?></td>
                    <td><?=$quote->phone?></td>                    
                    <td><?=$quote->number?></td>                    
                    <td style="text-align: right;">UF <?=$quote->quote?></td>                    
                    <td style="text-align: right;">Desde <?=$quote->optional_warehouse?>UF hasta <?=$quote->optional_warehouse_until?>UF</td>                    
                    <td style="text-align: right;">Desde <?=$quote->optional_parking?>UF hasta <?=$quote->optional_parking_until?>UF</td>                                        
                    <td><?=date("d/m/Y",strtotime($quote->date))?></td>
                </tr>
                <? } ?>
            </tbody>
        </table>
        <br class="clear">
    </div>
</div>