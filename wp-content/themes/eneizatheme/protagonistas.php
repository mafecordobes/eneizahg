<?php /* Template Name: Protagonistas */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$menu = get_field('menu');
$descripcion = get_field('descripcion_protagonista');
$principal = get_field('protagonista_principal');

$nombre_principal = $principal->post_title;
$foto_principal = get_field('foto', $principal->ID);
$titulo_principal = get_field('titulo', $principal->ID);
$descripcion_principal = get_field('descripcion_corta', $principal->ID);
$descripcion_nombre_principal = get_field('descripcion_nombre', $principal->ID);
$link_principal = get_permalink($principal->ID);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$query = new WP_Query(array(
    'post_type' => 'protagonista',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'paged' => $paged
));

?>

<div class="row col-md-12 cover-page">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-protagonistas" />
        <h3 class="title">Protagonistas</h3>
        <hr class="line-single-protagonistas-bold" />
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
            <div class="col-md-5 col-sm-7 content">
                <p class="titulo"><?php echo $titulo_principal ?></p>
                <p class="description"><?php echo $descripcion_principal ?></p>
            </div>
        </a>
    </div>

    <div class="all-protagonistas col-md-9 col-sm-12 row">
        <?php 
            while($query->have_posts()):
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
                    $descripcion_nombre = get_field('descripcion_nombre', $post_id);
                ?>
                <div class="prot col-md-12 col-sm-12">
                    <a href="<?php echo $link; ?>">
                        <div class="col-md-4 col-sm-3 uno">
                            <img src="<?php echo $foto;?>" class="foto" />
                            <p class="name">
                                <?php echo $name;?>
                                (<?php echo $year_born;?>-<?php echo $year_death;?>)<br/>
                                <?php echo $descripcion_nombre;?>
                            </p>
                        </div>
                        <div class="col-md-8 col-sm-8 dos">
                            <p class="titulo"><?php echo $titulo;?></p>
                            <p class="description"><?php echo $descripcion;?></p>
                        </div>
                        <!--<div class="col-md-1 col-sm-1 tres hidden-xs">
                            <a href="<?php echo $link; ?>">
                                <i class="fas fa-angle-right"></i>
                            </a>
                        </div>-->
                    </a>
                </div>
                <?php endif;
            endwhile; ?>
            <div class="paginator col-md-12 col-sm-12">
                <?php
                $big = 999999999;
                echo paginate_links( array(
                    'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $query->max_num_pages,
                    'prev_text' => '<i class="fas fa-angle-left"></i>',
                    'next_text' => '<i class="fas fa-angle-right"></i>',
                    'before_page_number' => '',
                    'after_page_number'  => '',
                    'show_all'           => false,
                ) );
                ?>
            </div>
            <?php wp_reset_postdata(); ?>
              
    
    </div>
    
</div>

<?php get_footer();?>