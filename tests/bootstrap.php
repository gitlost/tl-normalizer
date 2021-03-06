<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	if ( ! defined( 'UNFC_DEBUG' ) ) define( 'UNFC_DEBUG', true );
	if ( getenv( 'TRAVIS' ) ) {
		ini_set( 'error_log', '/var/log/php_errors.log' ); // Lessen noise on travis.
	}
	require dirname( __FILE__ ) . '/../unfc-normalize.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

define( 'SUBDOMAIN_INSTALL', true );
define( 'UNFC_TESTING', true );

/**
 * Migration fixer for PHPUnit 6
 * See https://core.trac.wordpress.org/ticket/39822
 */
if ( class_exists( 'PHPUnit\Runner\Version' ) && ! file_exists( $_tests_dir . '/includes/phpunit6-compat.php' ) && ! file_exists( $_tests_dir . '/includes/phpunit6/compat.php' ) ) {
	require __DIR__ . '/phpunit6-compat.php';
}

require $_tests_dir . '/includes/bootstrap.php';

if ( ! class_exists( 'PHPUnit_Util_Test' ) ) {
	require __DIR__ . '/phpunit6-compat2.php';
}

global $wp_version;
if ( version_compare( $wp_version, '4.1', '<' ) ) {
	remove_action('init', 'wp_widgets_init', 1);
}
