<?php /* Template Name: Biblioteca Virtual */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$descripcion = get_field('descripcion');
$destacados = get_field('materiales_destacados');

$autor = $_GET['a'];

if($autor != NULL){
    $autor_taxonomy = get_term_by('id', $autor, 'autor');
    $name_autor = $autor_taxonomy->name;
    $args = array(
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
                'terms' => $autor,
            )
        )
    );
}else{
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'slug',
                'terms' => 'biblioteca-virtual',
            )
        )
    );
}

$books = get_posts($args);

?>

<div class="row col-md-12 biblioteca sala">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-protagonistas" />
        <h3 class="title">Biblioteca Virtual <?php if($autor != NULL) { echo ' - '.$name_autor; };?></h3>
        <hr class="line-single-protagonistas-bold" />
    </div>

    <div class="col-md-12 col-sm-12">
        <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content">
            <div class="description">
                <?php echo $descripcion; ?> 
            </div>
            <div class="libros-tesoro">
                <div class="temas">
                    <?php foreach($books as $book): ?>
                        <?php 
                            $link = get_permalink($book->ID);
                            $autor = get_field('autor', $book->ID);
                            $link_autor = get_field('link_autor', $book->ID);
                            $titulo = trim(get_field('titulo', $book->ID));
                            $imagen = get_field('imagen', $book->ID);
                            if($link_autor){
                                $autor_link = get_permalink($link_autor->ID);
                            }else{
                                $autor_link = '';
                            }
                            ?>
                            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 book-tesoro">
                                    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-3 portada">
                                        <a href='<?php echo $link; ?>'>
                                            <img src="<?php echo $imagen; ?>">
                                        </a>
                                    </div>
                                    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-9 titulo">
                                        <p><?php if($autor_link != ''):?>
                                                <a href='<?php echo $autor_link; ?>'><?php echo $autor; ?></a>
                                            <?php else:?>
                                                <?php echo $autor; ?>
                                            <?php endif;?>
                                            <?php echo $titulo; ?>
                                        </p>
                                    </div>
                                
                            </div>
                    <?php endforeach; ?>
                </div>
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
                <li class="busquedas"><a href="/biblioteca/tesoros-del-baul">Tesoros del Baúl</a></li>
                <li class="busquedas"><a href="/biblioteca/biblioteca-publica">Biblioteca Pública</a></li>
                <li class="busquedas"><a href="/biblioteca/biblioteca-digital">Biblioteca Digital</a></li>
                <li class="busquedas"><a href="/sala-de-lectura">Sala de Lectura</a></li>
            </ul>
        </div>
    </div>



</div>


<?php get_footer();?>

