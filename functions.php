<?php
function divi__child_theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'divi__child_theme_enqueue_styles' );

add_action( 'wp_enqueue_scripts', function () {
	$template_dir = get_stylesheet_directory_uri();

	wp_enqueue_script('jquery');

	wp_enqueue_script(
		'jquery_functions',
		$template_dir . '/js/functions.js',
		array( 'jquery' ),
		null,
		true
	);
} );

//you can add custom functions below this line:
