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
// File : delete_emp_img.php                                            //
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
$oid = $_GET['item'];

// activate a child link
	if ($mode == "item" && $oid != "") {
		// do the query
		$query = db_query ("select image from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
		$res = fetch_row($query);
		$ipic = $peeps."/".$res[0];
		unlink($ipic);
		$sql = db_query ("update ".$dbext."people set image = '', imagefilesize = '' where peepsid = '".$oid."' limit 1") or db_die();
		// now redirect user
		$re = "employee.php?mode=emp&sect=edit&opt=form&oid=".$oid;
		header ("Location: $re");
		exit();
	}

?>