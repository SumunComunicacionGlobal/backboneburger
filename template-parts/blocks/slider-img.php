<?php

/**
 * Image Slider Block Template.
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
?>


<?php if( have_rows('slider-img') ): ?>
    <div id="<?php echo esc_attr($id); ?>" class="swiper swiper-container-block slider-image-block">
        <div class="swiper-wrapper">
            <?php while( have_rows('slider-img') ): the_row(); ?>
                <div class="swiper-slide">
                    <?php 
                    $image = get_sub_field('img_block_slider');
                    if( !empty( $image ) ): ?>
                        <figure>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php if( !empty($image['caption']) ) {
                                echo'<figcaption>';
                                echo esc_attr($image['caption']);
                                echo '</figcaption>';
                            }?>

                        </figure>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        </div>
        <!-- Add Pagination --> 
        <div class="swiper-pagination"></div> 
        
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        
    </div>
<?php endif; ?>



<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
	var swiper = new Swiper('#<?php echo esc_attr($id); ?>', {
	slidesPerView: 1,
    autoHeight: true,
	navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
		el: '.swiper-pagination',
		clickable: true,
	},
	});
</script>