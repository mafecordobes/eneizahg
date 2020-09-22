<?php   
    $image = get_the_post_thumbnail_url(); 

    
?>

<div class="row post">
    <div class="col-md-5 col-lg-5 col-sm-5 col-xs-12 img">
        
        <img src="<?php echo $image;?>" class="img-post"/>
        
    </div>

    <div class="col-md-7 col-lg-7 col-sm-7 col-xs-12 img">
        <h3><?php echo the_title(); ?></h3>
        <p><?php echo get_the_excerpt(); ?> </p>
        <a class="view-more" href="<?php echo get_permalink();?>">Ver más</a>
    </div>
</div>