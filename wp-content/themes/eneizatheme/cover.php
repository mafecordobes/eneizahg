<?php /* Template Name: Portada */ 
get_header();

get_template_part( 'template-parts/menu', 'top' );
$titulo = get_field('titulo');
$menu = get_field('menu');
$class = get_field('clase');
$flag_link = false;
if (is_page('terapia-cognitivo-experiencial-tce')) {
    $flag_link = true; 
    $link = 'tce';
}
?>
<div class="row col-md-12 cover-page">
   
    <div class="col-md-5 col-sm-5 col-sm-offset-1 col-md-offset-2 logo-container">
        <div class="text-center">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png';?>" class="logo img-fluid">
            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/desert-big.jpg';?>" class="desierto img-fluid">
            <div class="row">
                <div class="col-sm-5 col-md-6">
                    <a href="/curriculum-vitae">
                        <div class="cv">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/name.jpg';?>" class="cv_foto img-fluid">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/foto.jpg';?>" class="cv_title img-fluid">
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-7 pensamiento">
                <p>“Vivir es un viaje permanente.<br>
                    Es recorrer a cada instante los<br>
                    senderos de la experiencia.</p>
                    <p>Las personas podemos<br>
                    desarrollar destrezas, pautas y<br>
                    alternativas para influir en la<br>
                    calidad de nuestro viaje”</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 col-sm-6 menu <?php echo $class; ?>">
        <div class="contain-menu">
            <?php if ($flag_link): ?>
                <h3><a href="/<?php echo $link; ?>"><?php echo $titulo; ?></a></h3>
            <?php else: ?>
                <h3><?php echo $titulo; ?></h3>
            <?php endif; ?>
            <?php wp_nav_menu( array( 'menu' => $menu ) ); ?>
        </div>
    </div>
</div>

<?php get_footer();?>