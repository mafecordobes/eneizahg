<?php /* Template Name: Contacto */ 
get_header();
get_template_part( 'template-parts/top', 'cintillo' );
$telefono = get_field('telefono');
$direccion = get_field('direccion');
$correo = get_field('correo');
$maps = get_field('enlace_google_maps');
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
                <a href="tel:<?php echo trim(str_replace(' ', '', str_replace('-', '', $telefono))); ?>">
                    <i class="fas fa-mobile-alt"></i> <?php echo $telefono; ?>
                </a>
            </li>
            <li>
                <a href="mailto:<?php echo $correo; ?>">
                    <i class="fas fa-envelope"></i> <?php echo $correo; ?>
                </a>
            </li>
            <li>
                <a href="<?php echo $maps; ?>">
                    <i class="fas fa-map-marker-alt"></i> <?php echo $direccion; ?>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php get_footer();?>