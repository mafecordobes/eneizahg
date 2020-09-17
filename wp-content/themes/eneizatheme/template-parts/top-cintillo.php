<a class="menu-responsive"><i class="fas fa-bars"></i></a>
<div id="responsive-menu">
    <div class="close-menu"><i class="fas fa-times"></i></div>
    <?php wp_nav_menu( array( 'menu' => 'Main' ) ); ?>
</div>
<div class="col-md-12 col-sm-12 row cintillo">
    <div class="col-md-2 col-sm-2 col-sm-offset-2 col-md-offset-2 col-xs-12 logo">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/logo.png';?>" class="img-responsive">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/desert.jpg';?>" class="img-responsive desert-cintillo">
    </div>
    <div class="col-md-4 col-sm-4 hidden-xs pensamiento">
        <div class="texto">
            <p>“Vivir es un viaje permanente.<br/>
                Es recorrer a cada instante<br/>
                los senderos de la experiencia.
            </p>

            <p>Las personas podemos desarrollar<br/>
                destrezas, pautas y alternativas<br/>
                para influir en lacalidad de nuestro viaje”
            </p>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 hidden-xs foto">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/foto.jpg';?>" class="img-responsive">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/name.jpg';?>" class="img-responsive">
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 lines">
        <hr class="line" />
        <hr class="bold-line" />
    </div>
</div>