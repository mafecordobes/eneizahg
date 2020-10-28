<?php 

add_action( 'wp_enqueue_scripts', 'custom_enqueue_styles');
add_theme_support( 'post-thumbnails' );

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

    register_post_type( 'libro',
        array(
            'labels' => array(
                'name' => __( 'Libros' ),
                'singular_name' => __( 'Libro' ),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-book-alt',
            'supports' => array(
                'title',
                'thumbnail',
                'comments',
                'editor'
            )
        )
    );

    register_post_type( 'autor',
        array(
            'labels' => array(
                'name' => __( 'Autores' ),
                'singular_name' => __( 'Autor' ),
            ),
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-universal-access',
            'supports' => array(
                'title',
                'thumbnail',
                'comments',
                'editor'
            )
        )
    );
}

/* Taxonomias */
add_action( 'init', 'create_book_taxonomies', 0 );  


function create_book_taxonomies() {
    /* Configuramos las etiquetas que mostraremos en el escritorio de WordPress */
    $labels = array(
        'name'             => _x( 'Géneros', 'taxonomy general name' ),
        'singular_name'    => _x( 'Género', 'taxonomy singular name' ),
        'search_items'     =>  __( 'Buscar por Género' ),
        'all_items'        => __( 'Todos los Géneros' ),
        'parent_item'      => __( 'Género padre' ),
        'parent_item_colon'=> __( 'Género padre:' ),
        'edit_item'        => __( 'Editar Género' ),
        'update_item'      => __( 'Actualizar Género' ),
        'add_new_item'     => __( 'Añadir nuevo Género' ),
        'new_item_name'    => __( 'Nombre del nuevo Género' ),
    );


    register_taxonomy( 'genero', array( 'libro' ), array(
        'hierarchical'       => true,
        'labels'             => $labels,
        'show_ui'            => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'genero' ),
    ));


    $labels = array(
        'name'          => _x( 'Autores', 'taxonomy general name' ),
        'singular_name' => _x( 'Autor', 'taxonomy singular name' ),
        'search_items'  =>  __( 'Buscar Autores' ),
        'popular_items' => __( 'Autores populares' ),
        'all_items'     => __( 'Todos los autores' ),
        'parent_item'   => null,
        'parent_item_colon' => null,
        'edit_item'     => __( 'Editar Autor' ),
        'update_item'   => __( 'Actualizar Autor' ),
        'add_new_item'  => __( 'Añadir nuevo Autor' ),
        'new_item_name' => __( 'Nombre del nuevo Autor' ),
        'separate_items_with_commas' => __( 'Separar Autores por comas' ),
        'add_or_remove_items' => __( 'Añadir o eliminar Autores' ),
        'choose_from_most_used' => __( 'Escoger entre los Autores más utilizados' )
    );

    register_taxonomy( 'autor', 'libro', array(
        'hierarchical'  => false,
        'labels'        => $labels, 
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => array( 'slug' => 'autor' ),
    ));

    $labels = array(
        'name'          => _x( 'Accesos', 'taxonomy general name' ),
        'singular_name' => _x( 'Acceso', 'taxonomy singular name' ),
        'search_items'  =>  __( 'Buscar Accesos' ),
        'popular_items' => __( 'Accesos populares' ),
        'all_items'     => __( 'Todos los accesos' ),
        'parent_item'   => null,
        'parent_item_colon' => null,
        'edit_item'     => __( 'Editar Acceso' ),
        'update_item'   => __( 'Actualizar Acceso' ),
        'add_new_item'  => __( 'Añadir nuevo Acceso' ),
        'new_item_name' => __( 'Nombre del nuevo Acceso' ),
        'separate_items_with_commas' => __( 'Separar Acceso por comas' ),
        'add_or_remove_items' => __( 'Añadir o eliminar Acceso' ),
        'choose_from_most_used' => __( 'Escoger entre los Acceso más utilizados' )
    );

    register_taxonomy( 'accesos', 'libro', array(
        'hierarchical'  => false,
        'labels'        => $labels, 
        'show_ui'       => true,
        'query_var'     => true,
        'rewrite'       => array( 'slug' => 'accesos' ),
    ));
}

add_action('admin_post_nopriv_contact-data', 'register_read_space');
add_action('admin_post_contact-data', 'register_read_space');

function register_read_space(){

	$nombre     = sanitize_text_field( $_POST['contact-data-name'] );
    $correo    = sanitize_text_field( $_POST['contact-data-email'] );

    global $wpdb;
    $wpdb->insert('users_sala_lectura', array(
        'name' => $nombre,
        'mail' => $correo,
    ));

    wp_redirect( get_home_url() . '/biblioteca/sala-de-lectura/?modal=0'); 

    exit;

}

function my_admin_menu() {
    add_menu_page(
        __( 'Sala de Lectura', 'my-textdomain' ),
        __( 'Sala de Lectura', 'my-textdomain' ),
        'manage_options',
        'sample-page',
        'my_admin_page_contents',
        'dashicons-edit-page',
        29
    );
}

add_action( 'admin_menu', 'my_admin_menu' );


function my_admin_page_contents() {
    global $wpdb;

    $usuarios = $wpdb->get_results("SELECT * FROM users_sala_lectura GROUP BY mail");

    ?>
        <style>
            table tr th {
                text-align: left;
                font-size: 15px;
            }  
            table tr td {
                text-align: left;
                font-size: 15px;
            }  
            table tr:nth-child(even) {
               background: #dddddd;
            } 
            table tr:nth-child(odd) {
               background: white;
            } 
            table tr {
                height: 45px;
            }
        </style>
        <h1>
            <?php esc_html_e( 'Usuarios registrados en la sala de lectura', 'my-plugin-textdomain' ); ?>
        </h1>
        <table style="width:95%">
            <tr>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Fecha del registro</th>
            </tr>
        <?php foreach($usuarios as $user): ?>
                <tr>
                    <td><?php echo $user->name; ?></td>
                    <td><?php echo $user->mail; ?></td>
                    <td><?php echo $user->created_at; ?></td>
                </tr>
        <?php endforeach?>
        </table>
    <?php
}
