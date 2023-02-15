<div class="dflex mb-2 mt-2 position-relative">
    <div class="col-xs-12 col-sm-6">
        <?php blackbone_post_thumbnail(); ?> 
    </div>
    <div class="col-xs-12 col-sm-6">
        <?php
        the_title('<h2 class="text-h5">', '</h2>');
        the_content();
        ?>

        <?php bbb_btn_carta(); ?>
    </div>  
</div>