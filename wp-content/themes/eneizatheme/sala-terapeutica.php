<?php /* Template Name: Sala Terapeutica */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );
$description = get_field('descripcion');
$content = get_field('content');
?>
<div class="row col-md-12 foro-abierto">
  
    <hr class="line-single-protagonistas" />
    <h3 class="title"><?php echo get_the_title(); ?></h3>
    <hr class="line-single-protagonistas-bold" />

    <div class="description-solicitud">
        <?php echo $description; ?>
        <?php echo do_shortcode( '[contact-form-7 id="518" title="Sala terapeutica"]' ); ?>
        <?php echo $content; ?>
    </div>
    
</div>

<div class='comments'>
    <?php comments_template( '', true ); ?>
</div>

<?php get_footer();?>