<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2007 by MidniteHour   //
// and solely developed for BABCOCK INT. PLC.							//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : logout.php	                                                //
//                                                                      //
// ---------------------------------------------------------------------//


// initialize the session.
session_start();

// unset all of the session variables.
$_SESSION = array();

// if it's desired to kill the session, also delete the session cookie.
// note: this will destroy the session, and not just the session data!
if (isset($_COOKIE[session_name()])) {
   setcookie(session_name(), '', time()-42000, '/');
}

// finally, destroy the session.
session_destroy();	
	
	// now redirect the user
	header ('Location: index.php');

?>