<?php /* Template Name: Homepage */ 
get_header();

get_template_part( 'template-parts/menu', 'top' );
$logo = get_field('logo');
$img_central = get_field('imagen_central');
$cv_foto = get_field('cv_foto');
$cv_titulo = get_field('cv_titulo');
$pensamiento = get_field('pensamiento');

?>

<div class= "row homepage">
    <div class="menu-home col-lg-3 col-md-3 col-sm-3 hidden-xs">
        <?php wp_nav_menu( array( 'menu' => 'home-izq' ) ); ?>
        <p>Conectar con SEE</p>
        <ul class="social-media">
            <li class="fb">
                <a href="">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>
            <li class="ld">
                <a href="">
                    <i class="fab fa-linkedin"></i>
                </a>
            </li>
            <li class="tw">
                <a href="">
                    <i class="fab fa-twitter-square"></i>
                </a>
            </li>
            
        </ul>

    </div>
    <div class="centro col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="text-center">
            <img src="<?php echo $logo; ?>" class="logo img-fluid">
            <img src="<?php echo $img_central; ?>" class="desierto img-fluid">
            <a href="/curriculum-vitae">
                <div class="cv-home">
                    <img src="<?php echo $cv_foto; ?>" class="cv_foto img-fluid">
                    <img src="<?php echo $cv_titulo; ?>" class="cv_title img-fluid">
                </div>
            </a>
        </div>
    </div>
    <div class="pensamiento-home col-lg-3 col-md-3 col-sm-3 col-xs-12">
        <?php echo $pensamiento; ?>
    </div>
</div>

<?php get_footer();?>