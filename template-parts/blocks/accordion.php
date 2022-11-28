<?php

/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'accordion--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
?>


<?php if( have_rows('accordion') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="accordion-block mb-6">
        <?php while( have_rows('accordion') ): the_row(); 
            $image = get_sub_field('accordion_image');
            ?>
            <button class="accordion-btn">
                <?php the_sub_field('accordion_title'); ?>
                <span><div class="screen-reader-text"><?php esc_html_e( 'Open', 'colegio-aleman' ); ?></div></span>
            </button>
            
            <div class="accordion-content row">
                <?php if( get_sub_field('accordion_image') ): ?>
                    <div class="col-xs-12 col-md mb-4 mt-4">
                        <?php echo wp_get_attachment_image( $image, 'full' ); ?>
                    </div>
                <?php endif; ?>    
                <div class="col-xs-12 col-md mb-4 mt-4">
                    <?php the_sub_field('accordion_content'); ?>
                </div> 
            </div>       
            
        <?php endwhile; ?>
    </div>
<?php endif; ?>

<script>
var acc = document.getElementsByClassName("accordion-btn");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>