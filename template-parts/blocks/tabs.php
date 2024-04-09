<?php

/**
 * Products TABS Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'tabs--' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$terms = get_field('taxonomies_ids');
$count = 0;

if( get_field('slider_or_grid') == 'false' ) :
    $slider = 'swiper swiper-container-block';
    $slider_wrapper = 'swiper-wrapper';
    else :
        $slider = ''; 
        $slider_wrapper = 'grid-columns-2';
endif;

if( $terms ): ?>

<div id="<?php echo esc_attr($id); ?>" class="tabs-products">
    
    <div class="tabs-buttons mb-4">
        <?php foreach( $terms as $term ):  $count++; ?>
            <?php if ( $term->count > 0 ) : ?>
                <button class="tablinks text-h6 <?php if($count == 1){echo ' active';};?>" onclick="openTab(event, '<?php echo $term->name; ?>')"><?php echo $term->name; ?></button>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    
    <?php foreach( $terms as $term ): ?>
    
        <?php if ( $term->count > 0 ) : ?>
    
            <div id="<?php echo esc_html( $term->name ); ?>" class="tabcontent <?php echo esc_attr($slider); ?>">
            
                <?php    
                echo '<div class="'.$slider_wrapper.'">'; 

                    $the_query = new WP_Query( array(
                        'post_type' => 'carta',
                        'tax_query' => array(
                            array (
                                'taxonomy' => 'category-carta',
                                'field' => 'term_id',
                                'terms' => $term->term_id,
                            )
                        ),
                        'orderby' => 'menu_order',
                        'order' => 'ASC',
                    ) );
                    
                    while ( $the_query->have_posts() ) :
                        $the_query->the_post();
                        
                        // Show grid template or slider

                        if( get_field('slider_or_grid') == 'false' ) :
                            
                            get_template_part( 'template-parts/product-slider' );

                            else : get_template_part( 'template-parts/product' );
                        
                        endif;

                    endwhile;
                    
                    wp_reset_postdata();

                echo '</div>'; // $slider_wrapper
                ?>
                
    
                <?php if( get_field('slider_or_grid') == 'false' ) : ?>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>

                    <!-- Initialize Swiper -->
                    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
                    <script>
                        var swiper = new Swiper('#<?php echo esc_html( $term->name ); ?>', {
                            slidesPerView: 1,
                            // Navigation arrows
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                            breakpoints: {
                                600: {
                                    slidesPerView: 2,
                                },
                                1280: {
                                    slidesPerView: 3,
                                },
                            },
                        });
                    </script>  
                <?php endif; ?>

            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</div> <!-- end #<?php echo esc_attr($id); ?> -->  
<?php endif; ?>

<script>
function openTab(evt, taxName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(taxName).style.display = "grid";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("Hamburguesas").click();
</script>

<?php if( get_field('slider_or_grid') == 'false' ) : ?>
    

    
<?php endif; ?>

