<?php 

/**
 * Enqueue scripts and styles.
 */
function blackbone_scripts() {
	wp_enqueue_style( 'blackbone-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_enqueue_script( 'jquery' );
	//wp_enqueue_script( 'blackbone-js', get_template_directory_uri() . '/assets/js/blackbone.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'blackbone_scripts' );


/** 
* Gutenberg scripts and styles
 */
function sumun_gutenberg_scripts() {

	wp_enqueue_script(
		'be-editor', 
		get_stylesheet_directory_uri() . '/assets/js/editor.js', 
		array( 'wp-blocks', 'wp-dom' ), 
		filemtime( get_stylesheet_directory() . '/assets/js/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'sumun_gutenberg_scripts' );