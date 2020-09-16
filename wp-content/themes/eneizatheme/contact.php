<?php /* Template Name: Contacto */ 
get_header();
get_template_part( 'template-parts/top', 'cintillo' );
?>
<div class="row col-md-12 text-page">
    <div class="col-md-2">
        <?php get_template_part( 'template-parts/menu', 'left' ); ?> 
    </div>
    <div class="col-md-10 content contact">
        <h5 class="subtitle">Contacto</h5>
        <?php echo do_shortcode( '[contact-form-7 id="8" title="Contact form 1"]' ); ?>
        <ul class="social-contact">
            <li>
                <a href="tel:+584242923066">
                    <i class="fas fa-mobile-alt"></i> +58 424-2923066
                </a>
            </li>
            <li>
                <a href="mailto:eneiza.hernandez@gmail.com">
                    <i class="fas fa-envelope"></i> eneiza.hernandez@gmail.com
                </a>
            </li>
            <li>
                <a href="tel:+584242923066">
                    <i class="fas fa-map-marker-alt"></i> La campiña - Caracas
                </a>
            </li>
        </ul>
    </div>
</div>
<?php get_footer();?>