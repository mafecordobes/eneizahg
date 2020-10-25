<?php /* Template Name: Biblioteca */ 
get_header();
get_template_part( 'template-parts/menu', 'top' );

$menu = get_field('menu');
$imagen = get_field('material_de_la_semana_imagen');
$file = get_field('material_de_la_semana_documento');
$descripcion = get_field('descripcion');
$actividades = get_field('actividades_especiales');
$interesar = get_field('te_puede_interesar');

?>

<div class="row col-md-12 biblioteca cover-page">
   
   <div class="col-md-6 col-sm-6 col-sm-offset-1 col-md-offset-1 logo-container">
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
   <div class="col-md-5 col-sm-5 menu menu-biblioteca">
       <div class="contain-menu">
           <h4><a data-toggle="modal" data-target="#materialDelDia">Material de la semana</a></h4>
           <a data-toggle="modal" data-target="#materialDelDia"><img src="<?php echo $imagen; ?>"></h4></a>
           <h4>Actividades especiales</h4>
           <p><?php echo $actividades; ?></p>
           <h4>Te puede interesar</h4>
           <p><?php echo $interesar; ?></p>
           <h4><a href="/sala-de-lectura">Sala de Lectura</a></h4>
           <h4><a id="button-to-conditions">Nuestras condiciones</a></h4>
           
       </div>
   </div>

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <hr class="line-single-biblioteca" />
        <h3 class="title">Biblioteca</h3>
        <hr class="line-single-biblioteca-bold" />
    </div>
    <div class="col-md-12 col-sm-12 description-biblioteca">
        <div class="div-biblioteca">
            <?php echo $descripcion; ?> 
            <a href="/sala-de-lectura" class="lectura">Sala de Lectura</a>
        </div>
    </div>
    
</div>


<!-- Modal -->
<div class="modal fade" id="materialDelDia" tabindex="-1" role="dialog" aria-labelledby="materialDelDiaLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
      <div id="showpdf"> </div>
      </div>
      <script>PDFObject.embed("<?php echo $file; ?>", "#showpdf");</script>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



<?php get_footer();?>

