<?php 
    ini_set('display_errors', 1);
    $resumen            = getCampaignSummary();
    $resumen_contactos  = getContactSummary();
    $resumen_newsletter = getNewsSummary();
    $resumen_simulaciones = getSimulationsSummary();
    if(isset($_GET['action'])){
        if($_GET['action'] == 'exportcontacts'){
            getAllContacts();
        }elseif($_GET['action'] == 'exportnews'){
            getAllNews();
        }elseif($_GET['action'] == 'exportSimulations'){
            getAllSimulations();
        }elseif($_GET['action'] == 'exportAllRegisters'){
            getGeneralReport();
        }
    }
?>
<style>
    .lvl2{
        margin: 10px 20px;
    }
    li.lvl1{
        margin-bottom: 20px;
    }
    ul.lvl3{
        display: inline-block;
        padding: 0px 15px;
    }
</style>
<div class="wrap">
    <h1>Campaña Conectados</h1>
    <h3>Resumen</h3>
    <a href="admin.php?page=campana&action=exportAllRegisters" class="button-primary">Exportar Archivo unico</a>
    <ul>
        <li class="lvl1">
            <strong>Registrados en formulario "Dejanos tu número":</strong>&nbsp;<?= $resumen->total_contactos ?>
            <ul class="lvl2">
                <li>Landing Personas: &nbsp;<?= $resumen_contactos->total_personas?></li>
                <li>Landing Inversionistas: &nbsp;<?= $resumen_contactos->total_inversionistas?></li>
            </ul>
            <a href="admin.php?page=campana&action=exportcontacts" class="button-primary">Exportar registros de "Dejanos tu número"</a>
        </li>
        <li class="lvl1">
            <strong>Registrados en formulario "Recibe Información":</strong>&nbsp;<?= $resumen->total_news ?>
            <ul class="lvl2">
                <li>Landing Personas: &nbsp;<?= $resumen_newsletter->total_personas?></li>
                <li>Landing Inversionistas: &nbsp;<?= $resumen_newsletter->total_inversionistas?></li>
            </ul>
            <a href="admin.php?page=campana&action=exportnews" class="button-primary">Exportar registros de "Recibe Información"</a>
        </li>
        <li class="lvl1">
            <strong>Resumen de simulaciones (incluyendos simulaciones antes de solicitar el email)</strong>&nbsp;
            <?php foreach($resumen_simulaciones as $proyecto=>$simulacion){ ?>
                <li class="lvl1"><strong>Proyecto: <?=ucwords(str_replace('-', ' ', $proyecto))?></strong></li>
                <?php foreach($simulacion as $resumen){?>
                <ul class="lvl3">
                    <li><strong>Tipo:</strong> <?=$resumen->tipo?></li>
                    <li><strong>Plazo:</strong> <?=$resumen->plazo?> años</li>
                    <li><strong>Total:</strong> <?=$resumen->total?></li>
                </ul>
                <?php } ?>
            <?php } ?>
            <br/>
            <br/>
            <a href="admin.php?page=campana&action=exportSimulations" class="button-primary">Exportar emails de simulaciones</a>
            <small>* excluye simulaciones que no dejaron email</small>
        </li>
    </ul>
</div>