<?php /* Template Name: Protagonistas */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );

$menu = get_field('menu');
$descripcion = get_field('descripcion_protagonista');
$principal = get_field('protagonista_principal');

$nombre_principal = $principal->post_title;
$foto_principal = get_field('foto', $principal->ID);
$titulo_principal = get_field('titulo', $principal->ID);
$descripcion_principal = get_field('descripcion_corta', $principal->ID);
$descripcion_nombre_principal = get_field('descripcion_nombre', $principal->ID);
$link_principal = get_permalink($principal->ID);

$query = new WP_Query(array(
    'post_type' => 'protagonista',
    'post_status' => 'publish',
    'posts_per_page' => -1,
));

?>

<div class="row col-md-12 cover-page">
   
    <div class="col-md-5 col-sm-5 col-sm-offset-1 col-md-offset-1 logo-container">
        <div class="text-center">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png';?>" class="logo img-fluid">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/desert-big.jpg';?>" class="desierto img-fluid">
            <div class="row">
                <div class="col-sm-5 col-md-6">
                    <a href="/curriculum-vitae">
                        <div class="cv">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/name.jpg';?>" class="cv_foto img-fluid">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/foto.jpg';?>" class="cv_title img-fluid">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-7 pensamiento">
                <p>“Vivir es un viaje permanente.<br>
                    Es recorrer a cada instante los<br>
                    senderos de la experiencia.</p>
                    <p>Las personas podemos<br>
                    desarrollar destrezas, pautas y<br>
                    alternativas para influir en la<br>
                    calidad de nuestro viaje”</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 menu menu-protagonistas">
        <div class="contain-menu">
            <h3>Protagonistas</h3>
            <?php wp_nav_menu( array( 'menu' => $menu ) ); ?>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 description-protagonista">
        <div class="div-protagonista">
            <?php echo $descripcion; ?> 
        </div>
    </div>
    <div class="row col-md-12 col-sm-12 protagonista-principal">
        <a href="<?php echo $link_principal; ?>">
            <div class="col-md-4 col-sm-4 col-sm-offset-1 col-md-offset-2 photo">
                <img src="<?php echo $foto_principal;?>" class="foto_principal" />
                <p class="name">
                    <?php echo $nombre_principal; ?>
                    <?php echo $descripcion_nombre_principal; ?>
                </p>
            </div>
            <div class="col-md-6 col-sm-7 content">
                <p class="titulo"><?php echo $titulo_principal ?></p>
                <p class="description"><?php echo $descripcion_principal ?></p>
            </div>
        </a>
    </div>

    <div class="all-protagonistas col-md-12 col-sm-12 row">
        <?php 
            while ($query->have_posts()):
                $query->the_post();
                $post_id = get_the_ID();
                if($post_id != $principal->ID):
                    $link = get_permalink($post_id);
                    $name = get_the_title($post_id);
                    $foto = get_field('foto', $post_id);
                    $year_born = get_field('fecha_nacimiento', $post_id);
                    $year_death = get_field('fecha_de_muerte', $post_id);
                    $titulo = get_field('titulo', $post_id);
                    $descripcion = get_field('descripcion_corta', $post_id);
                ?>
                <div class="prot col-md-12 col-sm-12">
                    <div class="col-md-2 col-sm-3 uno">
                        <img src="<?php echo $foto;?>" class="foto" />
                        <p class="name">
                            <?php echo $name;?><br/>
                            (<?php echo $year_born;?>-<?php echo $year_death;?>)
                        </p>
                    </div>
                    <div class="col-md-9 col-sm-8 dos">
                        <p class="titulo"><?php echo $titulo;?></p>
                        <p class="description"><?php echo $descripcion;?></p>
                    </div>
                    <div class="col-md-1 col-sm-1 tres hidden-xs">
                        <a href="<?php echo $link; ?>">
                            <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                <?php endif;
            endwhile; 
        ?>
    </div>

    <div class="paginator col-md-12 col-sm-12">
        <i class="fas fa-angle-left"></i><i class="fas fa-angle-right"></i>
    </div>
    
</div>

<?php get_footer();?>