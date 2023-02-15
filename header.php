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
	<link rel="icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">
    <link rel="shortcut icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png">


	<?php wp_head(); ?>
</head>

<body id="bbb" <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'blackbone' ); ?></a>

	<header id="masthead" class="site-header">
		
		<span onclick="openNav()" class="menu-toggle" aria-controls="primary-menu" type="button" role="button">
			<span class="screen-reader-text"><?php esc_html_e( 'Abrir menú', 'blackbone' ); ?></span>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/menu-burger.svg" width="80" height="80" alt="Abrir menú">
		</span>
	
		<div class="site-branding">
			<?php the_custom_logo(); ?>
		</div><!-- .site-branding -->

		<div class="wp-block-button" id="boton-marchando-header">
			<a class="wp-block-button__link has-body-main-color has-secondary-background-color" href="<?php the_permalink( PAGE_ID_PEDIDOS ); ?>">
				<span><?php esc_html_e( 'Hacer un pedido', 'blackbone' ); ?></span>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/shopping-bag.svg" width="40" height="40" alt="Hacer un pedido">
			</a>
		</div>

	</header><!-- #masthead -->

	<div id="navigation" class="overlay">

		<span onclick="closeNav()" class="close-toggle" type="button" role="button" aria-expanded="false">
			<span class="screen-reader-text"><?php esc_html_e( 'Cerrar menu', 'blackbone' ); ?></span>
			<img src="<?php echo get_template_directory_uri(); ?>/assets/icons/close.svg" width="80" height="80" alt="Cerrar menu">
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
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Address Menu')) : ?>
				<?php endif; ?>
			</div>
		</div>

	</div><!-- #site-navigation -->

<script>
function openNav() {
	var d = document.getElementById("navigation");
  	// d.style.width = "100%";
	d.classList.add("navigation-open");
	document.getElementById("bbb").style.overflow = "hidden";
}

function closeNav() {
//   document.getElementById("navigation").style.width = "0%";
	document.getElementById("navigation").classList.remove("navigation-open");
  	document.getElementById("bbb").style.overflow = "auto";
}

function ligthMode() {
  var element = document.body;
  element.classList.toggle("light-mode");
}

</script>
