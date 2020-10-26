<?php 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$portada = get_field('imagen');
$titulo = get_field('titulo', false);
$autor = get_field('autor');
$link_autor = (get_field('link_autor')) ? get_permalink(get_field('link_autor')->ID): '';
$presentacion = get_field('presentacion');
$description = get_field('descripcion');
$libros_relacionados = get_field('libros_relacionados');
?>
<div class="single-libro">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 main-container">
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 description">
            <div class='row'>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4 img">
                    <img src='<?php echo $portada;?>'>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-8 titulo">
                    <?php if($link_autor != ''):?>
                        <a href='<?php echo $link_autor; ?>'><?php echo $autor; ?></a>
                    <?php else:?>
                        <?php echo $autor; ?>
                    <?php endif;?>
                    <?php echo $titulo;?>
                </div>
            </div>
            <div class='presentacion'>
                <?php if($presentacion != ''): ?>
                    <h4>Presentación del Material</h4>
                    <p>
                        <?php echo $presentacion; ?>
                    </p>
                <?php endif ;?>
            </div>
            <div class='description'>
                <p>
                    <?php echo $description; ?>
                </p>
            </div>
            <?php if(count($libros_relacionados) > 0): ?>
                <div class='relacionados'>
                    <?php if($libros_relacionados['libro_relacionado_1']): ?>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 relacionado-1">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 portada">
                                <a href='<?php echo get_permalink($libros_relacionados['libro_relacionado_1']->ID); ?>'>
                                    <img src="<?php echo get_field('imagen', $libros_relacionados['libro_relacionado_1']->ID); ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 titulo-relacionado">
                                <p>
                                    <?php 
                                        $link_relacionado_1 = (get_field('link_autor', $libros_relacionados['libro_relacionado_1']->ID)) ? get_permalink(get_field('link_autor'), $libros_relacionados['libro_relacionado_1']->ID): '';
                                    ?>
                                    <?php if($link_relacionado_1 != ''):?>
                                        <a href='<?php echo $link_relacionado_1; ?>'><?php echo get_field('autor', $libros_relacionados['libro_relacionado_1']->ID); ?></a>
                                    <?php else:?>
                                        <?php echo get_field('autor', $libros_relacionados['libro_relacionado_1']->ID); ?>
                                    <?php endif;?>
                                    
                                    <?php echo get_field('titulo', $libros_relacionados['libro_relacionado_1']->ID); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($libros_relacionados['libro_relacionado_2']): ?>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 relacionado-2">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 portada">
                                <a href='<?php echo get_permalink($libros_relacionados['libro_relacionado_2']->ID); ?>'>
                                    <img src="<?php echo get_field('imagen', $libros_relacionados['libro_relacionado_2']->ID); ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 titulo-relacionado">
                                <p>
                                    <?php 
                                        $link_relacionado_1 = (get_field('link_autor', $libros_relacionados['libro_relacionado_2']->ID)) ? get_permalink(get_field('link_autor'), $libros_relacionados['libro_relacionado_2']->ID): '';
                                    ?>
                                    <?php if($link_relacionado_1 != ''):?>
                                        <a href='<?php echo $link_relacionado_1; ?>'><?php echo get_field('autor', $libros_relacionados['libro_relacionado_2']->ID); ?></a>
                                    <?php else:?>
                                        <?php echo get_field('autor', $libros_relacionados['libro_relacionado_2']->ID); ?>
                                    <?php endif;?>
                                    
                                    <?php echo get_field('titulo', $libros_relacionados['libro_relacionado_2']->ID); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif ;?>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12">
            <ul class='menu-libro'>
                <li><a href="/biblioteca">Menú principal</a></li>
                <li><a href="/biblioteca/#nuestras-condiciones">Nuestras condiciones</a></li>
                <li>Búsqueda</li>
                <li class="busquedas"><a href="/biblioteca/busqueda/?search=titulo">Por título</a></li>
                <li class="busquedas"><a href="/biblioteca/busqueda/?search=autor">Por autor</a></li>
                <li class="busquedas"><a href="#">Por ejes de contenido</a></li>
                <li>Categorias de acceso</li>
                <li class="busquedas"><a href="/biblioteca/tesoros-del-baul">Tesoros del baúl</a></li>
                <li class="busquedas"><a href="/biblioteca/biblioteca-virtual">Biblioteca Virtual</a></li>
                <li class="busquedas"><a href="/biblioteca/biblioteca-publica">Biblioteca Pública</a></li>
                <li class="busquedas"><a href="/biblioteca/biblioteca-digital">Biblioteca Digital</a></li>
                <li class="busquedas"><a href="/sala-de-lectura">Sala de Lectura</a></li>
            </ul>
        </div>
    </div>
</div>
<div class='comments'>
    <?php comments_template( '', true ); ?>
</div>

<?php get_footer();?>