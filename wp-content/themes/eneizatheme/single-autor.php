<?php 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$imagen = get_field('imagen');
$description = get_field('descripcion');
$primera_seccion = get_field('primera_seccion');
$destacados = get_field('materiales_destacados');
$taxonomia = get_field('taxonomia');

$tesoros_baul = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'slug',
                'terms' => 'tesoro-del-baul',
            ),
            array(
                'taxonomy' => 'autor',
                'field' => 'term_id',
                'terms' => $taxonomia,
            )
        )
    )
);

$biblioteca_virtual = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'slug',
                'terms' => 'biblioteca-virtual',
            ),
            array(
                'taxonomy' => 'autor',
                'field' => 'term_id',
                'terms' => $taxonomia,
            )
        )
    )
);

$biblioteca_publica = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'slug',
                'terms' => 'biblioteca-publica',
            ),
            array(
                'taxonomy' => 'autor',
                'field' => 'term_id',
                'terms' => $taxonomia,
            )
        )
    )
);

$biblioteca_digital = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'slug',
                'terms' => 'biblioteca-digital',
            ),
            array(
                'taxonomy' => 'autor',
                'field' => 'term_id',
                'terms' => $taxonomia,
            )
        )
    )
);

?>
<div class="single-autor">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 main-container">
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 description">
            <div class='row'>
                <div class="col-md-3 col-lg-3 col-sm-3 col-xs-4 img">
                    <img src='<?php echo $imagen;?>'>
                </div>
                <div class="col-md-9 col-lg-9 col-sm-9 col-xs-8 name">
                    <span class="nombre"><?php echo get_the_title(); ?></span>
                    <?php echo $description;?>
                </div>
            </div>
            <div class='presentacion'>
                <p>
                    <?php echo $primera_seccion; ?>
                </p>
            </div>
            <div class='bibliografia'>
                <h4>Bibliografía</h4>
                <?php if(count($tesoros_baul)>0):?>
                    <p class="title">
                        <a href="/biblioteca/tesoros-del-baul/?a=<?php echo $taxonomia; ?>">
                            Tesoros del Baúl
                        </a>
                    </p>
                    <ul>
                        <?php foreach($tesoros_baul as $baul): 
                            $link = get_permalink($baul->ID);
                            $autor = get_field('autor', $baul->ID);
                            $titulo = trim(get_field('titulo', $baul->ID));
                        ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $autor.' '.$titulo; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(count($biblioteca_virtual)>0):?>
                    <p class="title">
                        <a href="/biblioteca/biblioteca-virtual?a=<?php echo $taxonomia; ?>">
                            Biblioteca Virtual
                        </a>
                    </p>
                    <ul>
                        <?php foreach($biblioteca_virtual as $virtual): 
                            $link = get_permalink($virtual->ID);
                            $autor = get_field('autor', $virtual->ID);
                            $titulo = trim(get_field('titulo', $virtual->ID));
                        ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $autor.' '.$titulo; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(count($biblioteca_digital)>0):?>
                    <p class="title">
                        <a href="/biblioteca/biblioteca-digital?a=<?php echo $taxonomia; ?>">
                            Biblioteca Digital
                        </a>
                    </p>
                    <ul>
                        <?php foreach($biblioteca_digital as $digital): 
                            $link = get_permalink($digital->ID);
                            $autor = get_field('autor', $digital->ID);
                            $titulo = trim(get_field('titulo', $digital->ID));
                        ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $autor.' '.$titulo; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if(count($biblioteca_publica)>0):?>
                    <p class="title">
                        <a href="/biblioteca/biblioteca-publica?a=<?php echo $taxonomia; ?>">
                            Biblioteca Pública
                        </a>
                    </p>
                    <ul>
                        <?php foreach($biblioteca_publica as $publica): 
                            $link = get_permalink($publica->ID);
                            $autor = get_field('autor', $publica->ID);
                            $titulo = trim(get_field('titulo', $publica->ID));
                        ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $autor.' '.$titulo; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php if(count($destacados) > 0): ?>
                <h4>Materiales destacados</h4>
                <div class='relacionados'>
                    <?php if($destacados['destacado_1']): ?>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 relacionado-1">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 portada">
                                <a href='<?php echo get_permalink($destacados['destacado_1']->ID); ?>'>
                                    <img src="<?php echo get_field('imagen', $destacados['destacado_1']->ID); ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 titulo-relacionado">
                                <p>
                                    <?php 
                                        $destacados_1 = (get_field('link_autor', $destacados['destacado_1']->ID)) ? get_permalink(get_field('link_autor'), $destacados['destacado_1']->ID): '';
                                    ?>
                                    <?php if($destacados_1 != ''):?>
                                        <a href='<?php echo $destacados_1; ?>'><?php echo get_field('autor', $destacados['destacado_1']->ID); ?></a>
                                    <?php else:?>
                                        <?php echo get_field('autor', $destacados['destacado_1']->ID); ?>
                                    <?php endif;?>
                                    
                                    <?php echo get_field('titulo', $destacados['destacado_1']->ID); ?>
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if($destacados['destacado_2']): ?>
                        <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12 relacionado-2">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 portada">
                                <a href='<?php echo get_permalink($destacados['destacado_2']->ID); ?>'>
                                    <img src="<?php echo get_field('imagen', $destacados['destacado_2']->ID); ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 titulo-relacionado">
                                <p>
                                    <?php 
                                        $destacados_2 = (get_field('link_autor', $destacados['destacado_2']->ID)) ? get_permalink(get_field('link_autor'), $destacados['destacado_2']->ID): '';
                                    ?>
                                    <?php if($destacados_2 != ''):?>
                                        <a href='<?php echo $destacados; ?>'><?php echo get_field('autor', $destacados['destacado_2']->ID); ?></a>
                                    <?php else:?>
                                        <?php echo get_field('autor', $destacados['destacado_2']->ID); ?>
                                    <?php endif;?>
                                    
                                    <?php echo get_field('titulo', $destacados['destacado_2']->ID); ?>
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