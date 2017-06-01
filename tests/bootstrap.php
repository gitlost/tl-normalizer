<?php

$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	if ( ! defined( 'UNFC_DEBUG' ) ) define( 'UNFC_DEBUG', true );
	require dirname( __FILE__ ) . '/../unfc-normalize.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

define( 'SUBDOMAIN_INSTALL', true );
define( 'UNFC_TESTING', true );

/**
 * Migration fixer for PHPUnit 6
 * See https://core.trac.wordpress.org/ticket/39822
 */
if ( class_exists( 'PHPUnit\Runner\Version' ) ) {
	require __DIR__ . '/phpunit6-compat.php';
}

require $_tests_dir . '/includes/bootstrap.php';

if ( ! class_exists( 'PHPUnit_Util_Test' ) ) {
	class PHPUnit_Util_Test extends PHPUnit\Util\Test {

		public static function getTickets( $className, $methodName ) {
			$annotations = self::parseTestMethodAnnotations( $className, $methodName );

			$tickets = array();

			if ( isset( $annotations['class']['ticket'] ) ) {
				$tickets = $annotations['class']['ticket'];
			}

			if ( isset( $annotations['method']['ticket'] ) ) {
				$tickets = array_merge( $tickets, $annotations['method']['ticket'] );
			}

			return array_unique( $tickets );
		}

	}
}

global $wp_version;
if ( version_compare( $wp_version, '4.1', '<' ) ) {
	remove_action('init', 'wp_widgets_init', 1);
}
