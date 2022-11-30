<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blackbone
 */

get_header();
?>

	<main id="primary" class="site-main container">

		<section class="error-404 not-found mt-10 mb-8">
			<header class="page-header pt-8">
				<h1 class="page-title"><?php esc_html_e( 'Oops! No hemos encontrado la página que buscas.', 'blackbone' ); ?></h1>
			</header><!-- .page-header -->

			<div class="page-content">
				<p><?php esc_html_e( 'Parece que no encontramos lo que buscas. Tal vez puedas probar haciendo una nueva búsqueda.', 'blackbone' ); ?></p>

					<?php get_search_form();?>


			</div><!-- .page-content -->
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
