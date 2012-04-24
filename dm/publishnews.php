<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2007 by MidniteHour   //
// and solely developed for DEMONSTRATION.								//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : publishnews.php                                               //
//                                                                      //
// ---------------------------------------------------------------------//

// start session
session_start();
header("Cache-control: private");	// bug fix for IE

// get library file and include
include_once ("../lib/lib.inc.php");
include_once ("../lib/auth.inc.php");

// load page vars
$mode = $_GET['mode'];
$oid = $_GET['oid'];

// activate a child link
	if ($mode == "update" && $oid != "") {
		// do the query
		$sql = db_query ("update ".$dbext."news set active = '1' where newsid = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: news.php?mode=viewall");
		exit();
	}

?>