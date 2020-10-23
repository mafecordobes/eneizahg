<?php /* Template Name: Sala de Lectura */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$publicacion = get_field('publicacion_de_la_semana');
$descripcion = get_field('descripcion');

?>

<div class="row col-md-12 biblioteca sala">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-protagonistas" />
        <h3 class="title">Sala de lectura</h3>
        <hr class="line-single-protagonistas-bold" />
    </div>

    <div class="col-md-12 col-sm-12 description-sala">
        <div class="div-sala">
            <h6>Biblioteca</h6>
            <?php echo $descripcion; ?> 
        </div>
    </div>


</div>



<?php get_footer();?>

