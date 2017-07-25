<?php


function cotizador_controller() {
    
    if(!isset($_GET['action'])){
        require_once('list_projects.php');
    } else {
        require_once($_GET['action'].'.php');
    }
    
}

?>
