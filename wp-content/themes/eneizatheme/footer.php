<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage ToddPublicidad
 * @since ToddPublicidad
 */

?>
		<footer>
			<div class="copyright ">
				<div class="container logo-todd">
					<?php echo '&copy; '. esc_html(date('Y')) .' Eneiza Hernández Grohmann. Todos los Derechos Reservados.';?>
					<?php if ( is_front_page() || is_page_template('cover.php')) : ?>
						<p>Made with <i class="fas fa-heart"></i>  by <img src="/wp-content/themes/eneizatheme/assets/Todd.jpg"> Todd Publicidad</p>
					<?php endif;?>
					<a id="back_to_top" class="button button_js" href=""><i class="fas fa-chevron-up"></i></a>
				</div>
			</div>
		</footer>

	</div><!-- .container -->
</div><!-- #page -->
<div id="body_overlay"></div>
<?php wp_footer(); ?>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
		
</body>
</html>
