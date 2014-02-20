<?php
/**
 * @package    SpringSong
 * @version    1.0.0
 * @author     Jenny Ragan <jenny@jennyragan.com>
 * @copyright  Copyright (c) 2014, Jenny Ragan
 * @link       http://themehybrid.com/themes/spring-song
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'spring_song_theme_setup' );

/**
 * Setup function. 
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function spring_song_theme_setup() {

	/*
	 * Add a custom background to overwrite the defaults.
	 *
	 * @link http://codex.wordpress.org/Custom_Backgrounds
	 */
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'ffe6f9', 
			'default-image' => '',
		)
	);

	/*
	 * Add a custom header to overwrite the defaults.  
	 *
	 * @link http://codex.wordpress.org/Custom_Headers
	 */
	add_theme_support( 
		'custom-header', 
		array(
			'default-text-color' => 'f684de',
			'default-image'      => '%2$s/images/headers/spring.png',
			'random-default'     => false,
		)
	);

	/* Registers default headers for the theme. */
	register_default_headers(
		array(
			'spring' => array(
				'url'           => '%2$s/images/headers/spring.jpg',
				'thumbnail_url' => '%2$s/images/headers/spring-thumb.jpg',
				/* Translators: Header image description. */
				'description'   => __( 'Christmas Joy default header', 'spring-song' )
			)
		)
	);


	/* Add a custom default color for the "primary" color option. */
	add_filter( 'theme_mod_color_primary', 'spring_song_color_primary' );

	/* register custom fonts */
	add_action( 'wp_enqueue_scripts', 'spring_song_styles' );
}

/**
 * Add a default custom color for the theme's "primary" color option.
 *
 * @since  0.1.0
 * @access public
 * @param  string  $hex
 * @return string
 */
function spring_song_color_primary( $hex ) {
	return $hex ? $hex : 'f684de';
}

/**
 * Registers google fonts for the front end.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function spring_song_styles() {
	wp_enqueue_style( 
		'spring-song-fonts',
		'//fonts.googleapis.com/css?family=Alegreya+Sans+SC:400,400italic,700'
	);
}