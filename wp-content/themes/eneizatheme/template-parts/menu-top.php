<div class="menu-top">
    <?php wp_nav_menu( array( 'menu' => 'Main' ) ); ?>
    <a class="burger-menu" href="#"><i class="fas fa-bars"></i><p>Menú</p></a>
</div>
<a class="menu-responsive"><i class="fas fa-bars"></i></a>
<div id="responsive-menu">
    <div class="close-menu"><i class="fas fa-times"></i></div>
    <?php wp_nav_menu( array( 'menu' => 'Main' ) ); ?>
</div>