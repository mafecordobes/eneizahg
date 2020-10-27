<?php /* Template Name: Foro Abierto */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );
$description = get_field('descripcion');
?>
<div class="row col-md-12 foro-abierto">
  
    <hr class="line-single-protagonistas" />
    <h3 class="title"><?php echo get_the_title(); ?></h3>
    <hr class="line-single-protagonistas-bold" />

    <div class="description-solicitud"><?php echo $description; ?></div>
    <?php comments_template( '', true ); ?>
    </div>
</div>
<?php get_footer();?>