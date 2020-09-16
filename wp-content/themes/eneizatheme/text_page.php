<?php /* Template Name: Página de texto */ 
get_header();
get_template_part( 'template-parts/top', 'cintillo' );
$imagen = get_field('imagen');
$titulo = get_field('titulo');
$subtitulo = get_field('subtitulo');
$contenido = get_field('contenido');
$titulo_seccion = get_field('titulo_seccion');
$class = is_page('curriculum-vitae') ? "cv" : "";
?>
<div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 text-page">
    <div class="col-lg-2 col-md-2 col-sm-2 menu-left-text">
        <?php get_template_part( 'template-parts/menu', 'left' ); ?> 
    </div>
    <div class="col-md-10 col-lg-10 col-sm-10 col-xs-12 content">
        <img src="<?php echo $imagen;?>" class="img-responsive imagen <?php echo $class; ?> ">
        <h4 class="title"><?php echo $titulo; ?></h4>
        <h5 class="subtitle"><?php echo $subtitulo; ?></h5>
        <?php if($titulo_seccion != ""): ?>
            <h3 class="section_title"><?php echo $titulo_seccion; ?></h3>
        <?php endif; ?>
        <div class="content-wysiwyg">
            <?php echo $contenido; ?>
        </div>
    </div>
</div>
<?php get_footer();?>