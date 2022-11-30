<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blackbone
 */

?>

	<footer id="colophon">
		<div class="site-footer center-xs">
			<div class="site-branding col-xs-12 mb-2 mt-4">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->
			<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer')) : ?>
			<?php endif; ?>
		</div>

		<div class="site-info container dflex between-xs middle-xs pt-1 pb-1">
			<div>
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( '2022 %s', 'blackbone' ), 'Black Bone Burger Zaragoza' );
				?>
			</div>
			
			<nav class="footer-menu">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'menu_id'        => 'footer-menu',
						)
					);
				?>
			</nav>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
