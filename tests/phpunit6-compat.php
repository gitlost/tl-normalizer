<?php
// Based on https://core.trac.wordpress.org/attachment/ticket/39822

if ( class_exists( 'PHPUnit\Runner\Version' ) && version_compare( PHPUnit\Runner\Version::id(), '6.0', '>=' ) && version_compare( PHPUnit\Runner\Version::id(), '7.0', '<' ) ) {
	class_alias( 'PHPUnit\Framework\AssertionFailedError', 'PHPUnit_Framework_AssertionFailedError' );
	class_alias( 'PHPUnit\Framework\BaseTestListener', 'PHPUnit_Framework_BaseTestListener' );
	class_alias( 'PHPUnit\Framework\Error\Notice', 'PHPUnit_Framework_Error_Notice' );
	class_alias( 'PHPUnit\Framework\Error\Warning', 'PHPUnit_Framework_Error_Warning' );
	class_alias( 'PHPUnit\Framework\Exception', 'PHPUnit_Framework_Exception' );
	class_alias( 'PHPUnit\Framework\ExpectationFailedException', 'PHPUnit_Framework_ExpectationFailedException' );
	class_alias( 'PHPUnit\Framework\Test', 'PHPUnit_Framework_Test' );
	class_alias( 'PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase' );
	class_alias( 'PHPUnit\Framework\TestListener', 'PHPUnit_Framework_TestListener' );
	class_alias( 'PHPUnit\Framework\TestResult', 'PHPUnit_Framework_TestResult' );
	class_alias( 'PHPUnit\Framework\TestSuite', 'PHPUnit_Framework_TestSuite' );
	class_alias( 'PHPUnit\Framework\Warning', 'PHPUnit_Framework_Warning' );
	class_alias( 'PHPUnit\Util\Getopt', 'PHPUnit_Util_Getopt' );
	class_alias( 'PHPUnit\Util\GlobalState', 'PHPUnit_Util_GlobalState' );
	class_alias( 'PHPUnit\Util\InvalidArgumentHelper', 'PHPUnit_Util_InvalidArgumentHelper' );
}
