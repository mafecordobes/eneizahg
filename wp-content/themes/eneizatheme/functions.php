<?php 

add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');

function custom_enqueue_styles() {
	wp_enqueue_style( 'custom-style', 
        get_stylesheet_directory_uri() . '/css/style.css', 
        array(), 
        wp_get_theme()->get('Version')
    );
}

register_nav_menus(
    array(
        'top'    => __( 'Top Menu', 'eneizahg' ),
        'social' => __( 'Social Links Menu', 'eneizahg' ),
    )
);

add_action("wp_enqueue_scripts", "dcms_insertar_js");

function dcms_insertar_js(){
    
    wp_register_script('miscript', get_stylesheet_directory_uri(). '/js/main.js', array('jquery'), '1', true );
    wp_enqueue_script('miscript');
    
}

add_action( 'init', 'create_post_type' );

function create_post_type() {
    register_post_type( 'protagonista',
        array(
            'labels' => array(
                'name' => __( 'Protagonistas' ),
                'singular_name' => __( 'Protagonista' ),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-universal-access-alt',
            'supports' => array(
                'title',
                'thumbnail',
                'comments',
                'editor'
            )
        )
    );
}