<?         

$loop = new WP_Query(array('post_status' => 'publish', 'post_type' => 'proyectos', 'posts_per_page' => -1));                

?>
<link rel="stylesheet" type="text/css" media="all" href="<?=get_bloginfo('template_directory').'/panel.css'; ?>" />
 
<div class="wrap">

    <div class="icon32 icon32-cotizador"><br></div><h2>Cotizador: Proyectos</h2>
    <br />
    <table class="wp-list-table widefat fixed custom-list">
        <thead>
            <tr>
                <th>Proyecto</th>
                <th style="text-align: center">En Venta</th>                
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Proyecto</th>
                <th style="text-align: center">En Venta</th>     
            </tr>
        </tfoot>
        <tbody>
            <?
            if($loop->have_posts()) {
                while ($loop->have_posts()) {
                    $loop->the_post();
            ?>
            <tr>
                <td><a class="row-title" href="?page=cotizador&action=list_types&pID=<? the_ID()?>"><? the_title()?></a></td>
                <td style="font-size: 14px; text-align: center">
                    <? if(get_custom_field('in_sale') == 1) {?>
                    &#10004;
                    <? } else {?>
                    &#65794;
                    <? }?>
                    
                </td>
            </tr>
            <?
                }
            } else {    
            ?>
            <tr>
                <td colspan="2">Sin proyectos en venta</td>
                <td></td>
            </tr>
            <?
            }?>
        </tbody>
    </table>
    <br class="clear">
</div>