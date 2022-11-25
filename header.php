<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blackbone
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body id="bbb" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blackbone' ); ?></a>

	<header id="masthead" class="site-header">
		
		<span onclick="openNav()" class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/menu-burger.svg" width="80" height="80">
		</span>
	
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->

		<a href="" class="btn"><?php esc_html_e( 'Hacer un pedido', 'blackbone' ); ?></a>

	</header><!-- #masthead -->

	<div id="navigation" class="overlay">

		<span onclick="closeNav()" class="close-toggle" aria-controls="primary-menu" aria-expanded="false">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/close.svg" width="80" height="80">
		</span>
		
		<div class="overlay--content row">
			
			<div class="site-branding col-xs-12 mb-2">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->
				
			<nav class="site-navigation col-xs-12 col-md-6 mt-2">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					);
				?>
			</nav>

			<div class="widgets-navigation col-xs-12 col-md-6">
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Menu')) : ?>
				<?php endif; ?>
			</div>

			<div class="address-navigation col-xs-12 col-md-6">
				<?php
				$post_id = 'menu__primary-menu'; //the number must be the menu ID
				$field = get_field('menu_address', $post_id); ?>
				Aquí la dirección.
			</div>

		</div>

	</div><!-- #site-navigation -->

<script>
function openNav() {
  document.getElementById("navigation").style.width = "100%";
  document.getElementById("bbb").style.overflow = "hidden";
}

function closeNav() {
  document.getElementById("navigation").style.width = "0%";
  document.getElementById("bbb").style.overflow = "auto";
}
</script>
