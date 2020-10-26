<?php /* Template Name: Busqueda */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$tipo = $_GET['search'];

if ($tipo == "titulo"){
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'orderby' => 'post_title',
        'order' => 'ASC'
    );
}

if ($tipo == "autor"){
    $args = array(
        'posts_per_page' => -1,
        'post_type' => 'autor',
        'orderby' => 'post_title',
        'order' => 'ASC'
    );
}

$books = get_posts($args);

switch ($tipo) {
    case "titulo": 
        $titulo = "Título";
    break;
    case "autor": 
        $titulo = "Autor";
    break;
    case "categorias": 
        $titulo = "Categorías de Acceso";
    break;
    default:
        $titulo = "";
}

?>

<div class="row col-md-12 biblioteca sala">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-protagonistas" />
        <h3 class="title">Búsqueda por <?php echo $titulo; ?></h3>
        <hr class="line-single-protagonistas-bold" />
    </div>

    <div class="col-md-12 col-sm-12">
        <?php if($tipo == "titulo"):?>
            <p class="description">Libros por título ordenados alfabeticamente</p>
            <?php foreach($books as $book): ?>
                <?php 
                    $link = get_permalink($book->ID);
                    $autor = get_field('autor', $book->ID);
                    $link_autor = get_field('link_autor', $book->ID);
                    $titulo = trim(get_field('titulo', $book->ID));
                    $imagen = get_field('imagen', $book->ID);
                    ?>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 book-busqueda">
                        <a href='<?php echo $link; ?>'>
                            <div class="col-md-2 col-lg-2 col-sm-2 col-xs-2 portada">
                                <img src="<?php echo $imagen; ?>">
                            </div>
                            <div class="col-md-10 col-lg-10 col-sm-10 col-xs-10 titulo"><?php echo $autor; ?><br/><?php echo $titulo; ?></div> 
                        </a>
                    </div>

                    
            <?php endforeach; ?>
        <?php endif;?>
        <?php if($tipo == "autor"):?>
            <p class="description">Autores ordenados alfabeticamente</p>
            <?php foreach($books as $book): ?>
                <?php 
                    $link = get_permalink($book->ID);
                    ?>
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 book-busqueda autor">
                        <a href='<?php echo $link; ?>'>
                           <?php echo get_the_title($book->ID); ?>
                        </a>
                    </div>

                    
            <?php endforeach; ?>
        <?php endif;?>
        <?php if($tipo == "categorias"):?>
            <p class="description">Nuestras categorias de acceso son las siguientes:</p>
            <ul class="categorias">
                <li><a href="/biblioteca/tesoros-del-baul">Tesoros del Baúl</a></li>
                <li><a href="/biblioteca/biblioteca-virtual">Biblioteca Virtual</a></li>
                <li><a href="/biblioteca/biblioteca-publica">Biblioteca Pública</a></li>
                <li><a href="/biblioteca/biblioteca-digital">Biblioteca Digital</a></li>
                <li><a href="/sala-de-lectura">Sala de Lectura</a></li>
            </ul>
        <?php endif;?>
    </div>


</div>



<?php get_footer();?>

