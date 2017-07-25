<?php
    add_theme_support( 'post-thumbnails' );
    add_image_size('slide-homi', 1920, 800, true, array( 'center', 'center' ) );
    add_image_size('nosotros', 800, 800, true, array( 'center', 'center' ) );
    add_image_size('proyectos', 390, 260, true, array( 'center', 'center' ) );
    
    function register_my_menu() {
      register_nav_menu('home-menu', 'Home Menu');
      register_nav_menu('single-menu', 'Single Menu');
    }
    add_action( 'init', 'register_my_menu' );
    
    @ini_set( 'upload_max_size' , '10M' );
    @ini_set( 'post_max_size', '10M');
    @ini_set( 'max_execution_time', '300' );
    

add_action( 'admin_menu', 'register_my_custom_menu_page' );

add_action('init', 'do_output_buffer');
function do_output_buffer() {
        ob_start();
}

function getGeneralReport(){
    $via_plugin = getPluginRegisters();
    $contactos = getAllContactsArray();
    $news = getAllNewsArray();
    $simulaciones = getAllSimulationsArray();
    $ct = 0;
    $unificado = array(
                $ct => array(
                    'formulario' => 'Formulario origen',
                    'fecha' => 'Fecha',
                    'id' => 'ID',
                    'plazo' => 'Plazo',
                    'origen' => 'Origen',
                    'nombre' => 'Nombre',
                    'email' => 'Email',
                    'rut' => 'RUT',
                    'telefono' => 'Telefono',
                    'celular' => 'Celular',
                    'proyecto' => 'Proyecto',
                    'programa' => 'Programa',
                    'mensaje' => 'Mensaje'
                ));
    foreach($via_plugin as $origen=>$registro_plugin){
        foreach($registro_plugin as $iff=>$formulario){
            $ct += 1;
            switch ($origen) {
                case 'caido-cielo':
                    $unificado[$ct]['formulario']   = "caido-cielo/contactame ";
                    $unificado[$ct]['fecha']        = date('d-m-Y \a\ \l\a\s\ H:i:s', $iff);
                    $unificado[$ct]['id']           = $iff;
                    $unificado[$ct]['plazo']        = 'VACIO';
                    $unificado[$ct]['origen']       = $origen;
                    $unificado[$ct]['nombre']       = $formulario['nombre'];
                    $unificado[$ct]['email']        = $formulario['email'];
                    $unificado[$ct]['rut']          = $formulario['rut'];
                    $unificado[$ct]['telefono']     = $formulario['fono'];
                    $unificado[$ct]['celular']      = "VACIO";
                    $unificado[$ct]['proyecto']     = $formulario['proyecto'];
                    $unificado[$ct]['programa']     = ($formulario['depto'] != '') ? $formulario['depto'] : "VACIO";
                    $unificado[$ct]['mensaje']      = "VACIO";
                    break;
                case 'obtener-info':
                    $unificado[$ct]['formulario']   = "caido-cielo/obtener-info";
                    $unificado[$ct]['fecha']        = date('d-m-Y \a\ \l\a\s\ H:i:s', $iff);
                    $unificado[$ct]['id']           = $iff;
                    $unificado[$ct]['plazo']        = 'VACIO';
                    $unificado[$ct]['origen']       = $origen;
                    $unificado[$ct]['nombre']       = $formulario['nombre'];
                    $unificado[$ct]['email']        = $formulario['email'];
                    $unificado[$ct]['rut']          = "VACIO";
                    $unificado[$ct]['telefono']     = $formulario['fono'];
                    $unificado[$ct]['celular']      = "VACIO";
                    $unificado[$ct]['proyecto']     = $formulario['proyecto'];
                    $unificado[$ct]['programa']     = ($formulario['depto'] != '') ? $formulario['depto'] : "VACIO";
                    $unificado[$ct]['mensaje']      = '"'.$formulario['mensaje'].'"';
                    break;
                case 'reserva-cupo':
                    $unificado[$ct]['formulario']   = "caido-cielo/reserva-cupo";
                    $unificado[$ct]['fecha']        = date('d-m-Y \a\ \l\a\s\ H:i:s', $iff);
                    $unificado[$ct]['id']           = $iff;
                    $unificado[$ct]['plazo']        = 'VACIO';
                    $unificado[$ct]['origen']       = $origen;
                    $unificado[$ct]['nombre']       = $formulario['nombre'];
                    $unificado[$ct]['email']        = $formulario['email'];
                    $unificado[$ct]['rut']          = "VACIO";
                    $unificado[$ct]['telefono']     = $formulario['fono'];
                    $unificado[$ct]['celular']      = "VACIO";
                    $unificado[$ct]['proyecto']     = $formulario['proyecto'];
                    $unificado[$ct]['programa']     = ($formulario['depto'] != '') ? $formulario['depto'] : "VACIO";
                    $unificado[$ct]['mensaje']      = "VACIO";
                    break;
                case 'formulario-contacto':
                    $proyectos = array(
                        "p243_puertocapital@TGApps.net" => "Exequiel Fernández",
                        "p244_puertocapital@TGApps.net" => "Suárez Mujica",
                        "p245_puertocapital@TGApps.net" => "Matta Valdés"
                    );
                    $unificado[$ct]['formulario']   = "formulario-contacto";
                    $unificado[$ct]['fecha']        = date('d-m-Y \a\ \l\a\s\ H:i:s', $iff);
                    $unificado[$ct]['id']           = $iff;
                    $unificado[$ct]['plazo']        = 'VACIO';
                    $unificado[$ct]['origen']       = $origen;
                    $unificado[$ct]['nombre']       = $formulario['nombre'];
                    $unificado[$ct]['email']        = $formulario['email'];
                    $unificado[$ct]['rut']          = "VACIO";
                    $unificado[$ct]['telefono']     = $formulario['telefono'];
                    $unificado[$ct]['celular']      = $formulario['celular'];
                    $unificado[$ct]['proyecto']     = $proyectos[$formulario['proyecto']];
                    $unificado[$ct]['programa']     = "VACIO";
                    $unificado[$ct]['mensaje']      = $formulario['mensaje'];
                    break;
                default:
                    break;
            }
        }
    }
    
    foreach($contactos as $indice=>$contacto){
        $ct += 1;
        $label = "";
        switch ($contacto['origin']) {
            case 'web-inversionista':
                $label = "landing-inversionista/te-llamamos";
                break;
            case 'web-personas':
                $label = "landing-conectados/te-llamamos";
                break;
            default:
                $label = "te-llamamos";
                break;
        }
        $unificado[$ct]['formulario']   = $label;
        $unificado[$ct]['fecha']    = date('d-m-Y \a\ \l\a\s\ H:i:s', strtotime($contacto['date_created']));
        $unificado[$ct]['id']       = $contacto['id'];
        $unificado[$ct]['plazo']    = 'VACIO';
        $unificado[$ct]['origen']   = $contacto['origin'];
        $unificado[$ct]['nombre']   = $contacto['name'];
        $unificado[$ct]['email']    = "VACIO";
        $unificado[$ct]['rut']      = "VACIO";
        $unificado[$ct]['telefono'] = $contacto['telephone'];
        $unificado[$ct]['celular']  = "VACIO";
        $unificado[$ct]['proyecto'] = $contacto['project'];
        $unificado[$ct]['programa'] = "VACIO";
        $unificado[$ct]['mensaje']  = "VACIO";
    }
    foreach($news as $indice=>$new){
        $ct += 1;
        $label = "";
        switch ($new['origin']) {
            case 'web-inversionista':
                $label = "landing-inversionista/obtener-informacion";
                break;
            case 'web-personas':
                $label = "landing-conectados/obtener-informacion";
                break;
            default:
                $label = "obtener-informacion";
                break;
        }
        $unificado[$ct]['formulario']   = $label;
        $unificado[$ct]['fecha']    = date('d-m-Y \a\ \l\a\s\ H:i:s', strtotime($new['date_created']));
        $unificado[$ct]['id']       = $new['id'];
        $unificado[$ct]['plazo']    = 'VACIO';
        $unificado[$ct]['origen']   = $new['origin'];
        $unificado[$ct]['nombre']   = ($new['name'] != null) ? $new['name'] : "VACIO";
        $unificado[$ct]['email']    = $new['email'];
        $unificado[$ct]['rut']      = "VACIO";
        $unificado[$ct]['telefono'] = "VACIO";
        $unificado[$ct]['celular']  = "VACIO";
        $unificado[$ct]['proyecto'] = $new['project'];
        $unificado[$ct]['programa'] = "VACIO";
        $unificado[$ct]['mensaje']  = "VACIO";
    }
    foreach($simulaciones as $indice=>$simulacion){
        $ct += 1;
        $label = "";
        switch ($simulacion['origin']) {
            case 'web-inversionista':
                $label = "landing-inversionista/simulaciones";
                break;
            case 'web-personas':
                $label = "landing-conectados/simulaciones";
                break;
            default:
                $label = "simulaciones";
                break;
        }
        $unificado[$ct]['formulario']   = $label;
        $unificado[$ct]['fecha']    = date('d-m-Y \a\ \l\a\s\ H:i:s', strtotime($simulacion['date']));
        $unificado[$ct]['id']       = $simulacion['id'];
        $unificado[$ct]['plazo']    = $simulacion['years'];
        $unificado[$ct]['origen']   = $simulacion['origin'];
        $unificado[$ct]['nombre']   = "VACIO";
        $unificado[$ct]['email']    = $simulacion['email'];
        $unificado[$ct]['rut']      = "VACIO";
        $unificado[$ct]['telefono'] = "VACIO";
        $unificado[$ct]['celular']  = "VACIO";
        $unificado[$ct]['proyecto'] = $simulacion['project'];
        $unificado[$ct]['programa'] = $simulacion['type'];
        $unificado[$ct]['mensaje']  = "VACIO";
    }
    return generateFile($unificado, 'archivo_unificado');
}


function getPluginRegisters(){
    global $wpdb;
    $resultado = $wpdb->get_results("SELECT * FROM wp_cf7dbplugin_submits WHERE form_name like 'Oportunidad Caída del Cielo - %'");
    $resultado2 = $wpdb->get_results("SELECT * FROM wp_cf7dbplugin_submits WHERE form_name like 'Obtener Info %'");
    $resultado3 = $wpdb->get_results("SELECT * FROM wp_cf7dbplugin_submits WHERE form_name like 'Reserva cupo %'");
    $resultado4 = $wpdb->get_results("SELECT * FROM wp_cf7dbplugin_submits WHERE form_name like 'Formulario de contacto'");
    $orden = array();
    $total = 0;
    foreach($resultado as $ix=>$res){
        $orden['caido-cielo'][$res->submit_time]["form_name"] = $res->form_name;
        $orden['caido-cielo'][$res->submit_time][$res->field_name] = $res->field_value;
    }
    foreach($resultado2 as $ix=>$res){
        $orden['obtener-info'][$res->submit_time]["form_name"] = $res->form_name;
        $orden['obtener-info'][$res->submit_time][$res->field_name] = $res->field_value;
    }
    foreach($resultado3 as $ix=>$res){
        $orden['reserva-cupo'][$res->submit_time]["form_name"] = $res->form_name;
        $orden['reserva-cupo'][$res->submit_time][$res->field_name] = $res->field_value;
    }
    foreach($resultado4 as $ix=>$res){
        $orden['formulario-contacto'][$res->submit_time]["form_name"] = $res->form_name;
        $orden['formulario-contacto'][$res->submit_time][$res->field_name] = $res->field_value;
    }
    return $orden;
}

function getCampaignSummary(){
    global $wpdb;
    $qy = "SELECT count(DISTINCT contactos.id) as total_contactos, count(DISTINCT news.email) as total_news
    FROM `pcapital_contacts` as contactos, `pcapital_newsletters` as news";
    $results = $wpdb->get_row($qy);
    return $results;
}

function getNewsSummary(){
    global $wpdb;    
    $qy = "SELECT 
    (SELECT count(distinct email) FROM `pcapital_newsletters` WHERE origin = 'web-personas') as total_personas, 
    (SELECT count(distinct email) FROM `pcapital_newsletters` WHERE origin = 'web-inversionista') as total_inversionistas";
    $results = $wpdb->get_row($qy);
    return $results;
}

function getContactSummary(){
    global $wpdb;    
    $qy = "SELECT 
    (SELECT count(DISTINCT ID) FROM `pcapital_contacts` WHERE origin = 'web-personas') as total_personas, 
    (SELECT count(DISTINCT ID) FROM `pcapital_contacts` WHERE origin = 'web-inversionista') as total_inversionistas";
    $results = $wpdb->get_row($qy);
    return $results;
}

function getSimulationsSummary(){
    global $wpdb;
    $orden = array();
    $qy = "SELECT * FROM  ResumenSimulaciones ORDER BY tipo ASC";
    $results = $wpdb->get_results($qy);
    foreach($results as $simulacion){
        $orden[$simulacion->proyecto][] = $simulacion;
    }
    return $orden;
}

function generateFile($csv = array(), $file = 'exportxls'){
    $upload_dir = wp_upload_dir();
    $fecha = date('dmYHis');
    $filename = $upload_dir['path'] . DIRECTORY_SEPARATOR . $file.'_'. $fecha .'.csv';
    $filename_url = $upload_dir['url']  . '/'.$file.'_'. $fecha .'.csv';
    $content = '';
    foreach($csv as $row) {
        $content .= implode(';', $row)."\r";
    }
    file_put_contents($filename, $content);
    return wp_safe_redirect($filename_url);
}

function getAllContactsArray(){
    global $wpdb;
    $qy = "SELECT id, name, telephone, origin, project, date_created  FROM `pcapital_contacts`";
    $results = $wpdb->get_results($qy, ARRAY_A);
    return $results;
}

function getAllNewsArray(){
    global $wpdb;
    $qy = "SELECT id, email, origin, project, date_created  FROM `pcapital_newsletters`";
    $results = $wpdb->get_results($qy, ARRAY_A);
    return $results;
}

function getAllSimulationsArray(){
    global $wpdb;
    $qy = "SELECT * FROM SimulacionesCorreo ORDER BY DATE DESC ";
    $results = $wpdb->get_results($qy, ARRAY_A);
    return $results;
}

function getAllContacts(){
    global $wpdb;
    $qy = "SELECT name, telephone, origin, project, date_created  FROM `pcapital_contacts`";
    $results = $wpdb->get_results($qy);
    $i = 0;
    $ex = array();
    $ex[$i]['nombre'] = 'Nombre';
    $ex[$i]['telefono'] = 'Teléfono';
    $ex[$i]['origen'] = 'Origen';
    $ex[$i]['proyecto'] = 'Proyecto';
    $ex[$i]['fecha'] = 'Fecha de Registro';
    foreach($results as $resultado){
        $i += 1;
        $ex[$i]['nombre']   = $resultado->name;
        $ex[$i]['telefono'] = $resultado->telephone;
        $ex[$i]['origen']   = $resultado->origin;
        $ex[$i]['proyecto'] = $resultado->project;
        $ex[$i]['fecha']    = date('d-m-Y \a\ \l\a\s\ H:i:s', strtotime($resultado->date_created));
    }
    return generateFile($ex, 'registros_contactos');
}

function getAllNews(){
    global $wpdb;
    $qy = "SELECT email, origin, project, date_created  FROM `pcapital_newsletters`";
    $results = $wpdb->get_results($qy);
    $i = 0;
    $ex = array();
    $ex[$i]['email'] = 'Email';
    $ex[$i]['origen'] = 'Origen';
    $ex[$i]['proyecto'] = 'Proyecto';
    $ex[$i]['fecha'] = 'Fecha de Registro';
    foreach($results as $resultado){
        $i += 1;
        $ex[$i]['email'] = $resultado->email;
        $ex[$i]['origen']   = $resultado->origin;
        $ex[$i]['proyecto'] = $resultado->project;
        $ex[$i]['fecha']    = date('d-m-Y \a\ \l\a\s\ H:i:s', strtotime($resultado->date_created));
    }
    return generateFile($ex, 'registros_news');
}

function getAllSimulations(){
    global $wpdb;
    $qy = "SELECT * FROM SimulacionesCorreo ORDER BY DATE DESC ";
    $results = $wpdb->get_results($qy);
    $ex = array();
    $ex[0]['id']        = "ID";
    $ex[0]['project']   = "Proyecto";
    $ex[0]['email']     = "Email";
    $ex[0]['type']      = "Tipo Planta";
    $ex[0]['years']     = "Plazo";
    $ex[0]['origin']    = "Origen";
    $ex[0]['date']      = "Fecha";
    $ct = 1;
    foreach($results as $resultado){
        $ex[$ct]['id']        = $resultado->id;
        $ex[$ct]['project']   = ucwords(str_replace('-', ' ', $resultado->project));
        $ex[$ct]['email']     = $resultado->email;
        $ex[$ct]['type']      = $resultado->type;
        $ex[$ct]['years']     = $resultado->years;
        $ex[$ct]['origin']    = $resultado->origin;
        $ex[$ct]['date']      = date('d-m-Y \a \l\a\s\ H:i:s', strtotime($resultado->date));
        $ct += 1;
    }
    return generateFile($ex, 'email_simulaciones');
}


function register_my_custom_menu_page(){   
    add_menu_page( 'Cotizador', 'Cotizador', 'manage_options', 'cotizador', 'cotizador_panel',  get_bloginfo('template_directory').'/images/money16x16.png', 8); 
    add_menu_page( 'Campaña', 'Campaña', 'manage_options', 'campana', 'resumen_cmp',  '', 9); 
}

function cotizador_panel() {
    require_once('cotizador_panel/index.php');
    cotizador_controller();
}

function resumen_cmp() {
    require_once('resumen_cmp/index.php');
    resumen_controller();
}

function getFloorTypes($pID) {
        
    global $wpdb;
    
    $query   = 'SELECT * FROM floor_types WHERE project_id = '.$pID. ' ORDER BY rooms ASC';    
    $results = $wpdb->get_results($query);
    
    return $results;
    
}

function getTypeList($pID){
	$lasplantas = getFloorTypes($pID);
	$ordenadas = array();
	foreach($lasplantas as $planta){
		$ordenadas[$planta->id] = $planta->name;
	}
	return $ordenadas;
}

function getFloorTypeByUnique($id){
	global $wpdb;
    $query   = 'SELECT * FROM floor_types WHERE floor_type_id = '.$id. '';    
    $results = $wpdb->get_results($query);
	if(!empty($results)){
		$ordenados = array();
		foreach($results as $k=>$resultado):
			$ordenados['id'] = $resultado->id;
			$ordenados['id_planta'] = $resultado->floor_type_id;
		endforeach;
	}else{
		$ordenados = false;
	}
    return $ordenados;
}

function getFloorTypesByRooms($pID, $rooms) {
        
    global $wpdb;
    
    $query   = 'SELECT * FROM floor_types WHERE project_id = '.$pID. ' AND  rooms = ' . $rooms .' ORDER BY rooms ASC';    
    $results = $wpdb->get_results($query);        
    
    //echo $query;
    return $results;
    
}

function getQuotesByProjectId($pID, $datefrom = false, $dateto = false) {
        
    global $wpdb;
    
    if(!$datefrom) {
        $query   = 'SELECT * FROM quotes WHERE project_id = '.$pID. ' ORDER BY id ASC';        
    } else {
        $query   = 'SELECT * FROM quotes WHERE project_id = '.$pID. ' AND (DATE(date) BETWEEN "'.$datefrom.'" AND "'.$dateto.'") ORDER BY id ASC';            
    }       
    
    $results = $wpdb->get_results($query);        
    
    return $results;
    
}

function getFloorType($tID) {
        
    global $wpdb;
    
    $query   = 'SELECT * FROM floor_types WHERE id = '.$tID;    
    $results = $wpdb->get_row($query);
    
    return $results;
    
}

function getProjectInfo($pID) {
    global $wpdb;
    $query   = 'SELECT * FROM wp_posts WHERE ID = '.$pID;    
    $results = $wpdb->get_row($query);
    return $results;
}

function getFloorsByType($tID) {
    global $wpdb;
    $query   = 'SELECT * FROM floors WHERE floor_type_id = '.$tID. ' ORDER BY floor ASC';    
    $results = $wpdb->get_results($query);
    return $results;
}

function getAvailablesFloorsByType($tID) {
    global $wpdb;
    $query   = 'SELECT * FROM floors WHERE floor_type_id = '.$tID. ' AND status = "DISPONIBLE"';    
    $wpdb->get_results($query);
    return $wpdb->num_rows;
}
function getMostLowFloorPrice($tIDs) {
    global $wpdb;
    $tIDs = implode(',', $tIDs);
    $query   = 'SELECT price FROM floors WHERE floor_type_id IN ('.$tIDs. ') ORDER BY price ASC LIMIT 1';    
    $results = $wpdb->get_row($query);        
    return $results ? ($results->price) : 0 ;
}

function saveQuote($data) {
    global $wpdb;
    $wpdb->insert('quotes', $data);
    return $wpdb->insert_id;
}

function uploadFloorAttachment($laid, $filename){
	if( !class_exists( 'WP_Http' ) )
		include_once( ABSPATH . WPINC. '/class-http.php' );	
	$file = new WP_Http();
	$url = str_replace(" ", "%20", $filename);
	$url = 'http://www.puertocapital.cl/upload/'.$url;
	$file = $file->request($url);
	if(!is_wp_error($file)){
		if($file['response']['code'] == 200){
			$attachment = wp_upload_bits( $filename, null, $file['body'], date("Y-m") );
			$file_url = $attachment['url'];
			$filetype = wp_check_filetype( basename( $attachment['file'] ), null );
			$postinfo = array(
				'post_mime_type'	=> $filetype['type'],
				'post_title'		=>  'Adjunto de planta '. $laid,
				'post_content'		=> '',
				'post_status'		=> 'inherit',
			);
			$filename = $attachment['file'];
			$attach_id = wp_insert_attachment( $postinfo, $filename, 0);
			if( !function_exists( 'wp_generate_attachment_data' ) )
				require_once(ABSPATH . "wp-admin" . '/includes/image.php');
			$attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
			wp_update_attachment_metadata( $attach_id,  $attach_data );
			return $file_url;
		}else{
			return false;
		}
	}else{
		return false;
	}
	
}

function CheckIfIsImage($path){
    $a = getimagesize($path);
    $image_type = $a[2];
    if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP))){
        return true;
    }
    return false;
}

function linkifyYouTubeURLs($text) {
    $text = preg_replace('~
        # Match non-linked youtube URL in the wild. (Rev:20130823)
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube         # or youtube.com or
          (?:-nocookie)?  # youtube-nocookie.com
          \.com           # followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\s-]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w.-]*    # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w.-]*        # Consume any URL (query) remainder.
        ~ix',
        '$1',
            $text);
    $text = str_replace('/', '', $text);
    $text = str_replace('http:', '', $text);
    $text = str_replace('https:', '', $text);
    $text = 'http://www.youtube.com/embed/'.$text;
    return $text;
}

function stripAccents($string){
	$string = str_replace('Á', 'A', $string);
	$string = str_replace('á', 'a', $string);
	$string = str_replace('é', 'e', $string);
	$string = str_replace('É', 'E', $string);
	$string = str_replace('Í', 'I', $string);
	$string = str_replace('í', 'i', $string);
	$string = str_replace('ó', 'o', $string);
	$string = str_replace('Ó', 'O', $string);
	$string = str_replace('ú', 'u', $string);
	$string = str_replace('Ú', 'U', $string);
	$string = str_replace('Ñ', 'N', $string);
	$string = str_replace('ñ', 'n', $string);
	return $string;
}
//add_action( 'admin_menu', 'remove_links_menu' );

function remove_links_menu() {
   /* remove_menu_page('upload.php'); // Media
     remove_menu_page('link-manager.php'); // Links
     remove_menu_page('admin.php'); // Pages
     remove_menu_page('edit-comments.php'); // Comments
     remove_menu_page('themes.php'); // Appearance
     remove_menu_page('plugins.php'); // Plugins
     remove_menu_page('users.php'); // Users
     remove_menu_page('tools.php'); // Tools
     remove_menu_page('options-general.php'); // Settings */    
}


function ajax_save_floor() {
    
    global $wpdb;
    
    $out['floor_type_id'] = $_GET['floor_type_id'];
    $out['floor']         = $_GET['floor'];
    $out['number']        = $_GET['number'];
    $out['orientation']   = $_GET['orientation'];
    $out['price']         = $_GET['price'];
    $out['status']		  = $_GET['status'];
    
     if($_GET['oldid'] == 0) {         
         $wpdb->update('floors', $out, array('id' => $_GET['id']));
         $out['id']    = $_GET['id'];
         $out['oldid'] = 0;
     } else {
         $wpdb->insert('floors', $out);
         $out['id']    = $wpdb->insert_id;
         $out['oldid'] = $_GET['oldid'];
     }    
    
    echo json_encode($out);
    
    exit();    
}
function ajax_delete_floor() {
    
    global $wpdb;
    
    if(isset($_GET['id'])) {         
        $out['id'] = $_GET['id'];    
        $wpdb->delete('floors', array('id' => $out['id']));        
    } else {
        $out['id'] = 0; 
    }
    
    echo json_encode($out);    
    exit();    
}

add_action('wp_ajax_save_floor', 'ajax_save_floor');
add_action('wp_ajax_delete_floor', 'ajax_delete_floor');