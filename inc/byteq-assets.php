<?php

/**
 * Theme Css and Js
 */
function byteq_scripts() {
	// all css files
//	wp_enqueue_style( 'byteq-fonts', byteq_fonts_url(), array(), '1.0.1' );
	wp_enqueue_style( 'animate', BYTEQ_THEME_CSS_DIR . 'animate.css', array() );
	wp_enqueue_style( 'fontawesome', BYTEQ_THEME_CSS_DIR . 'fontawesome.min.css', array() );
	wp_enqueue_style( 'bootstrap', BYTEQ_THEME_CSS_DIR . 'bootstrap.min.css', array() );
	wp_enqueue_style( 'byteq-spacing', BYTEQ_THEME_CSS_DIR . 'spacing.css', array() );
	wp_enqueue_style( 'swiper', BYTEQ_THEME_CSS_DIR . 'swiper.min.css', array() );
//	wp_enqueue_style( 'aos', BYTEQ_THEME_CSS_DIR . 'aos.css', array() );
	wp_enqueue_style( 'meanmenu', BYTEQ_THEME_CSS_DIR . 'meanmenu.css', array() );
	wp_enqueue_style( 'byteq-main', BYTEQ_THEME_CSS_DIR . 'main.css', array() );
	wp_enqueue_style( 'byteq-style', get_stylesheet_uri() );

	// all js files
	wp_enqueue_script( 'popper', BYTEQ_THEME_JS_DIR . 'popper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'bootstrap', BYTEQ_THEME_JS_DIR . 'bootstrap.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'swiper', BYTEQ_THEME_JS_DIR . 'swiper.min.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'meanmenu', BYTEQ_THEME_JS_DIR . 'jquery.meanmenu.min.js', array( 'jquery' ), '', true );
//	wp_enqueue_script( 'aos', BYTEQ_THEME_JS_DIR . 'aos.js', array( 'jquery' ), '', true );
	wp_enqueue_script( 'byteq-main', BYTEQ_THEME_JS_DIR . 'script.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'byteq_scripts' );


/**
 * Register Google Fonts
 * @return string
 */
function byteq_fonts_url() {
	$font_url = '';

	/*
	Translators: If there are characters in your language that are not supported
	by chosen font(s), translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Google font: on or off', 'byteq' ) ) {
		$font_url = '//fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Roboto+Mono:wght@300;400;500;600;700&display=swap';
	}

	return $font_url;
}