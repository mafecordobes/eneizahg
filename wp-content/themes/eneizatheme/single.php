<?php 

get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );
$contenido = get_field('contenido');
?>

<div class="row blog">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <h3 class="title"><?php echo get_the_title(); ?></h3>
        <hr class="line-single-blog" />
    </div>
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 content">
        <?php echo $contenido; ?>
    </div>

</div>
<div class="navigate-post">
    <div class="left">
        <?php previous_post_link('%link', '&#10094; %title'); ?>
    </div>
    <div class="right">
        <?php next_post_link('%link', '%title &#10095;'); ?>
    </div>
</div>
<hr class="line-light-comment" />
<hr class="line-heavy-comment" />

<?php comments_template( '', true ); ?>
<?php get_footer();?>