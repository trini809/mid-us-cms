<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2012 by MidniteHour   //
// and solely developed for MIDNITEHOUR INTERNET DEVELOPEMENT.			//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : config.php	                                                //
//                                                                      //
// ---------------------------------------------------------------------//


ini_set( "display_errors", true );
date_default_timezone_set( "America/Chicago" );  // set to local timezone - http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=mycms" );
define( "DB_USERNAME", "myweb" );
define( "DB_PASSWORD", "cms1web2pass" );
define( "CLASS_PATH", "lib" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/article.php" );
 
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}
 
set_exception_handler( 'handleException' );
?>