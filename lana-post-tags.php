<?php
/**
 * Plugin Name: Lana Post Tags
 * Plugin URI: http://lana.codes/lana-product/lana-post-tags/
 * Description: Shows all post tags on edit sidebox.
 * Version: 1.0.2
 * Author: Lana Codes
 * Author URI: http://lana.codes/
 */

defined( 'ABSPATH' ) or die();
define( 'LANA_POST_TAGS_VERSION', '1.0.2' );

/**
 * Lana Post Tags
 * load admin styles
 *
 * @param $hook
 */
function lana_post_tags_admin_styles( $hook ) {

	if ( 'post.php' != $hook && 'post-new.php' != $hook ) {
		return;
	}

	wp_register_style( 'lana-post-tags', plugin_dir_url( __FILE__ ) . '/assets/css/lana-post-tags-admin.css', array(), LANA_POST_TAGS_VERSION );
	wp_enqueue_style( 'lana-post-tags' );
}

add_action( 'admin_enqueue_scripts', 'lana_post_tags_admin_styles', 100 );

/**
 * Lana Post Tags
 * Load admin scripts
 *
 * @param $hook
 */
function lana_post_tags_admin_scripts( $hook ) {

	if ( 'post.php' != $hook && 'post-new.php' != $hook ) {
		return;
	}

	/** admin js */
	wp_register_script( 'lana-post-tags', plugin_dir_url( __FILE__ ) . '/assets/js/lana-post-tags-admin.js', array( 'jquery' ), LANA_POST_TAGS_VERSION );
	wp_enqueue_script( 'lana-post-tags' );
}

add_action( 'admin_enqueue_scripts', 'lana_post_tags_admin_scripts', 100 );


/**
 * Show all tags
 *
 * @param $args
 *
 * @return mixed
 */
function lana_post_tags_show_all_tags( $args ) {

	if ( defined( 'DOING_AJAX' ) && DOING_AJAX && isset( $_POST['action'] ) && $_POST['action'] === 'get-tagcloud' ) {
		unset( $args['number'] );
		$args['hide_empty'] = 0;
	}

	return $args;
}

add_filter( 'get_terms_args', 'lana_post_tags_show_all_tags' );