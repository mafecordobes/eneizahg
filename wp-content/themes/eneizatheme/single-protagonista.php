<?php 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$nacimiento = get_field('fecha_nacimiento');
$muerte = get_field('fecha_de_muerte');
$foto = get_field('foto');

$tipo_actividad = get_field('tipo_de_actividad');
$titulo_actividad = get_field('titulo_de_actividad');
$descripcion_actividad = get_field('descripcion_actividad');
$fecha_definir = get_field('fecha_a_definir');
$fecha_actividad = get_field('fecha');

$introduccion = get_field('introduccion');
$contenido = get_field('contenido');

$introduccion_biblioteca = get_field('introduccion_biblioteca');
$bio = get_field('bio');

$trabajos = get_field('trabajos_realizados');


?>
<div class="row single-protagonista">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h3 class="title"><?php echo get_the_title(); ?></h3>
        <hr class="line-single-protagonista" />
    </div>
    <div class="principal">
        <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 foto-content">
            <img src="<?php echo $foto; ?>" class="foto"/>
        </div>
        <div class="col-md-9 col-lg-9 col-sm-8 col-xs-12">
            <div class="actividades">
                <?php if($titulo_actividad != ""): ?>
                    <p class="titulo">Actividades</p>
                    <p class="tipo"><?php echo $tipo_actividad; ?></p>
                    <p class="titulo-act"><?php echo $titulo_actividad; ?></p>
                    <p class="titulo-desc"><?php echo $descripcion_actividad; ?></p>
                    <?php if($fecha_definir):?>
                        <p class="fecha">Fecha a definir</p>
                    <?php else: ?>
                        <p class="fecha"><?php echo $fecha_actividad; ?></p>
                    <?php endif; ?>
                <?php else: ?>
                    <p class="titulo"> No hay actividades agendadas </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 intro content">
            <?php echo $introduccion; ?>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 contenido content">
            <?php echo $contenido; ?>
        </div>

        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 biblioteca content">
            <?php echo $introduccion_biblioteca; ?>
        </div>
    </div>
</div>
<hr class="line-light-comment" />
<hr class="line-heavy-comment" />

<?php comments_template( '', true ); ?>
<?php get_footer();?>