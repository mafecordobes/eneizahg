<?php 

get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );
$contenido = get_field('contenido');

$query = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'post__not_in' => array( get_the_ID() ),
));

?>

<div class="row blog">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="line-blog col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <span>Blog</span>
            <hr class="line-bold-blog" />
        </div>
        <h3 class="title"><?php echo get_the_title(); ?></h3>
        <hr class="line-single-blog" />
    </div>
    <div class="col-md-9 col-lg-9 col-sm-9 col-xs-12 content">
        <div class="content-scroll">
            <?php echo $contenido; ?>
        </div>
        <div class="view-more-content">
            Ver m&aacute;s
        </div>
    </div>
    <div class="col-md-3 col-lg-3 col-sm-3 col-xs-12 other-post">
    <?php 
        while($query->have_posts()):
            $query->the_post();
            $post_id = get_the_ID();

            ?>
            
            <div class="detail-others">
                <p class="titulo"><?php echo get_the_title($post_id);?></p>
                <p class="date"><?php echo get_the_date( '  d/m/yy' , $post_id);?></p>
                <p class="excerpt"><?php echo get_the_excerpt($post_id); ?> </p>
                <a class="view-more" href="<?php echo get_permalink($post_id);?>">Ver más</a>
                
            </div>

        <?php endwhile; ?>
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