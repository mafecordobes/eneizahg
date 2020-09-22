<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage ToddPublicidad
 * @since ToddPublicidad
 */

get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );

$caption = get_field('caption', 35);
?>

	<div class="row blog">
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
			<div class="caption"><?php echo $caption; ?></div>
			<hr class="line-single-blog" />
		</div>
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 list-post">
			<?php
			if ( have_posts() ) {

				// Load posts loop.
				while ( have_posts() ) {
					the_post();
					get_template_part( 'template-parts/content', 'posts' );
					
				}
				echo '<div class="navigation">';
					posts_nav_link('  ','&#10094; ','&#10095;');
				echo '</div>';

			} else {

				// If no content, include the "No posts found" template.
				get_template_part( 'template-parts/content', 'none' );

			}
			?>
		</div>
	</div>

<?php
get_footer();
