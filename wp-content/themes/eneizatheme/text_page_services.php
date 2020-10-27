<?php /* Template Name: Página de texto - Servicios */ 
get_header();
get_template_part( 'template-parts/top', 'cintillo' );
$imagen = get_field('imagen');
$titulo = get_field('titulo');
$subtitulo = get_field('subtitulo');
$contenido = get_field('contenido');
$titulo_seccion = get_field('titulo_seccion');
$class = is_page('curriculum-vitae') ? "cv" : "";
global $post; 
$post_slug = $post->post_name;
?>
<div class="row col-md-12 col-lg-12 col-sm-12 col-xs-12 text-page">
    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content <?php echo $post_slug; ?>">
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
    <div class="col-lg-3 col-md-3 col-sm-3 menu-left-text menu-left-services">
        <h6>Menú Principal</h6>
        <?php get_template_part( 'template-parts/menu', 'left' ); ?> 

        <?php if($post_slug == 'fortalecimiento-de-capacidades'):?>
            <h6>Fortalecimiento de Capacidades</h6>
            <ul class="menu-tce">
                <li><a href="/servicios/foro-abierto-fortalecimiento-de-capacidades/">Foro Abierto</a></li>
            </ul>
        <?php else: ?>
            <h6>Terapia Cognitivo Experiencial (TCE)</h6>
            <ul class="menu-tce">
                <?php if($post_slug == "tce"):?>
                    <li><b><a>Definición</a></b></li>
                <?php else: ?>
                    <li><a href="/servicios/tce/">Definición</a></li>
                <?php endif; ?>

                <?php if($post_slug == "modalidades-atencion"):?>
                    <li><b><a>Modalidades de Atención</a></b></li>
                <?php else: ?>
                    <li><a href="/servicios/modalidades-atencion/">Modalidades de Atención</a></li>
                <?php endif; ?>

                <?php if($post_slug == "procedimientos-tce"):?>
                    <li><b><a>Procedmientos de la TCE</a></b></li>
                <?php else: ?>
                    <li><a href="/servicios/procedimientos-tce/">Procedmientos de la TCE</a></li>
                <?php endif; ?>
            </ul>

            <h6>Servicio Terapéutico</h6>
            <ul class="menu-tce">
                <li><a href="/consultorio/">Consultorio</a></li>
                <li><a href="/servicios/sala-terapeutica/">Opinión de los participantes</a></li>
                <li><a href="/servicios/sala-terapeutica/">Herramientas</a></li>
            </ul>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();?>