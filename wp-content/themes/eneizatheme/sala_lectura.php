<?php /* Template Name: Sala de Lectura */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );
get_template_part( 'template-parts/top', 'cintillo' );
$modal = $_GET['modal'];

$publicacion = get_field('publicacion_de_la_semana');
$descripcion = get_field('descripcion');

$publicacion_imagen = get_field('imagen', $publicacion->ID);
$publicacion_titulo = get_field('titulo', $publicacion->ID);
$publicacion_autor = get_field('autor', $publicacion->ID);
$publicacion_link_autor = get_field('link_autor', $publicacion->ID);
$link_publicacion = get_permalink($publicacion->ID);

if ($publicacion_link_autor){
    $link_autor_publicacion = get_permalink($publicacion_link_autor->ID);
}else {
    $link_autor_publicacion = '';
}

$count = 0;

$books = get_posts(
    array(
        'posts_per_page' => -1,
        'post_type' => 'libro',
        'tax_query' => array(
            array(
                'taxonomy' => 'accesos',
                'field' => 'term_id',
                'terms' => 'sala-de-lectura',
            )
        )
    )
);

?>

<div class="row col-md-12 biblioteca sala">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-protagonistas" />
        <h3 class="title">Sala de lectura</h3>
        <hr class="line-single-protagonistas-bold" />
    </div>

    <div class="col-md-12 col-sm-12 description-sala">
        <div class="div-sala">
            <h6>Biblioteca</h6>
            <?php echo $descripcion; ?> 
            <hr class="line-single-protagonistas" />
        </div>
    </div>

    <div class="col-md-12 col-sm-12 publicacion_semana">
        <div class="col-md-5 col-sm-6 col-md-offset-1 publicacion">
            <h4>Publicación de la semana</h4>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 img">
                        <a href="<?php echo $link_publicacion; ?>">
                            <img src="<?php echo $publicacion_imagen; ?>" />
                        </a>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 content">
                        <p>
                            <a href="<?php echo $link_autor_publicacion ; ?>">
                                <?php echo $publicacion_autor; ?>
                            </a>   
                            <?php echo $publicacion_titulo; ?>
                        </p>
                    </div>
                
            </div>

        </div>
        <div class="col-md-5 col-sm-5 col-sm-offset-1 col-md-offset-1 menu-sala">
            <li><a href="/biblioteca">Menú principal</a></li>
            <li><a href="/biblioteca/#nuestras-condiciones">Nuestras condiciones</a></li>
            <li>Búsqueda</li>
            <li class="busquedas"><a href="#">Por título</a></li>
            <li class="busquedas"><a href="#">Por tema</a></li>
            <li class="busquedas"><a href="#">Por autor</a></li>
            <li class="busquedas"><a href="#">Por ejes de contenido</a></li>
            <li class="busquedas"><a href="#">Por categoría de acceso</a></li>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 div-temas">
        <h4>Nuestros temas</h4>
        <div class="temas">
            <?php foreach($books as $book): ?>
                <?php if($book->ID != $publicacion->ID):
                    $link = get_permalink($book->ID);
                    $autor = get_field('autor', $book->ID);
                    $link_autor = get_field('link_autor', $book->ID);
                    $titulo = get_field('titulo', $book->ID);
                    $imagen = get_field('imagen', $book->ID);
                    if($link_autor){
                        $autor_link = get_permalink($link_autor->ID);
                    }else{
                        $autor_link = '';
                    }
                    $count++;
                   
                    ?>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12 col-<?php echo $count;?> book-lectura">
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 portada">
                                <a href='<?php echo $link; ?>'>
                                    <img src="<?php echo $imagen; ?>">
                                </a>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6 titulo">
                                <p>
                                    <?php if($autor_link != ''):?>
                                        <a href='<?php echo $autor_link; ?>'><?php echo $autor; ?></a>
                                    <?php else:?>
                                        <?php echo $autor; ?>
                                    <?php endif;?>
                                    
                                    <?php echo $titulo; ?>
                                </p>
                            </div>
                        
                    </div>
                    <?php if($count == 3){ $count = 0;} ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="datosContacto" tabindex="-1" role="dialog" aria-labelledby="datosDeContactoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
        <div class="modal-body">
            
                <p>Gracias por ingresar a la Sala de Lectura, para continuar por favor introduce tu nombre y correo electrónico</p>
                
                    <div class="form-group">
                        <label for="contact-data-name" class="col-form-label">Nombre:</label>
                        <input required type="text" class="form-control" id="contact-data-name" name="contact-data-name">
                    </div>
                    <div class="form-group">
                        <label for="contact-data-email" class="col-form-label">Correo electrónico:</label>
                        <input required type="email" class="form-control" id="rcontact-data-email" name="contact-data-email">
                    </div>
                
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="hidden" name="action" value="contact-data">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php if($modal==NULL): ?>
    <script>
        $('#datosContacto').modal('show');
    </script>
<?php endif; ?>


<?php get_footer();?>

