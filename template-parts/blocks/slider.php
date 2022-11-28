<?php

/**
 * Slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'swiper-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
$slides_per_view = get_field('slides_view_block_slider');

?>

<?php if( have_rows('slider') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="swiper swiper-container-block">
        <div class="swiper-wrapper">
            <?php while( have_rows('slider') ): the_row(); ?>
                <div class="swiper-slide"><?php the_sub_field('content_block_slider'); ?></div>
            <?php endwhile; ?>
        </div>
        <!-- Add Pagination --> 
        <div class="swiper-pagination"></div> 
        
    </div>
<?php endif; ?>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('#<?php echo esc_attr($id); ?>', {
	slidesPerView: '<?php echo esc_attr ($slides_per_view) ;?>',
    pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	});
</script>