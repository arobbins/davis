<?php
/*
 * Plugin Name: Lexicata Form
 * Version: 1.0.6
 * Plugin URI:
 * Description: Creates a short code form to allow leads to be submitted directly into a the Admin's Lexicata account.
 * Author: Lexicata
 * Author URI: https://lexicata.com
 * Requires at least: 4.0
 * Tested up to: 4.0
 *
 * Text Domain: lexicata-form
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author One400
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-lexicata-form.php' );
require_once( 'includes/class-lexicata-form-settings.php' );

// Load plugin libraries
require_once( 'includes/lib/class-lexicata-form-admin-api.php' );
require_once( 'includes/lib/class-lexicata-form-post-type.php' );
require_once( 'includes/lib/class-lexicata-form-taxonomy.php' );

/**
 * Returns the main instance of Lexicata_Form to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object Lexicata_Form
 */
function Lexicata_Form () {
	$instance = Lexicata_Form::instance( __FILE__, '1.0.6' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = Lexicata_Form_Settings::instance( $instance );
	}

	return $instance;
}

Lexicata_Form();
