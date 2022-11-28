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

if( get_field('slider_or_grid') == 'false' ) :
    $slider = 'slider';
    else : $slider = 'grid-columns-2'; 
endif;

$count = 0;

$terms = get_field('taxonomies_ids');

if( $terms ): ?>

<div id="<?php echo esc_attr($id); ?>" class="tabs-products">
    
    <div class="tabs-buttons mb-4">
        <?php foreach( $terms as $term ):  $count++; ?>
            <button class="tablinks text-h6 <?php if($count == 1){echo ' active';};?>" onclick="openTab(event, '<?php echo $term->name; ?>')"><?php echo $term->name; ?></button>
        <?php endforeach; ?>
    </div>
    
    <?php foreach( $terms as $term ): ?>
        <div id="<?php echo esc_html( $term->name ); ?>" class="tabcontent <?php echo esc_attr($slider); ?>">
            <?php
            $the_query = new WP_Query( array(
                'post_type' => 'carta',
                'tax_query' => array(
                    array (
                        'taxonomy' => 'category-carta',
                        'field' => 'term_id',
                        'terms' => $term->term_id,
                    )
                ),
            ) );
            

            while ( $the_query->have_posts() ) :
                $the_query->the_post();
                // Show Posts ...

                if( get_field('slider_or_grid') == 'false' ) :
                    
                    get_template_part( 'template-parts/product' );
                    
                    else :
                    
                    get_template_part( 'template-parts/product', 'slider' );
                
                endif;

                
            endwhile;

            /* Restore original Post Data 
            * NB: Because we are using new WP_Query we aren't stomping on the 
            * original $wp_query and it does not need to be reset.
            */
            wp_reset_postdata();
            ?>
        </div>
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