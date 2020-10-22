<?php /* Template Name: Biblioteca */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );

$menu = get_field('menu');
$imagen = get_field('material_de_la_semana_imagen');
$file = get_field('material_de_la_semana_documento');
$descripcion = get_field('descripcion');

?>

<div class="row col-md-12 biblioteca">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-biblioteca" />
        <h3 class="title">Biblioteca</h3>
        <hr class="line-single-biblioteca-bold" />
    </div>
    <div class="col-md-12 col-sm-12 description-biblioteca">
        <div class="div-biblioteca">
            <?php echo $descripcion; ?> 
            <a class="lectura">Sala de Lectura</a>
        </div>
    </div>
    
</div>

<?php get_footer();?>