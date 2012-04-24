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
// File : status.php	                                                //
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
$opt = $_GET['opt'];
$sect = $_GET['sect'];
$oid = $_GET['oid'];

// activate a child link
	if ($mode == "activate" && $sect == "child" && $opt == "active" && $oid != "") {
		// do the query
		$sql = db_query ("update ".$dbext."child_menu set active = '1' where cid = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();
	}

// de-activate a child link
	if ($mode == "activate" && $sect == "child" && $opt == "inactive" && $oid != "") {
		// do the query
		$sql = db_query ("update ".$dbext."child_menu set active = '0' where cid = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();
	}

// activate a sub link
	if ($mode == "activate" && $sect == "sub" && $opt == "active" && $oid != "") {
		// do the query
		$sql = db_query ("update ".$dbext."sub_menu set active = '1' where sid = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();
	}
// de-activate a sub link
	if ($mode == "activate" && $sect == "sub" && $opt == "inactive" && $oid != "") {
		// do the query
		$sql = db_query ("update ".$dbext."sub_menu set active = '0' where sid = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();
	}


// delete child page
	if ($mode == "delete" && $sect == "child" && $opt == "rm" && $oid != "") {
		//do the query
		$sql = db_query ("delete from ".$dbext."child_menu where cid = '".$oid."' limit 1") or db_die();
		$sql2 = db_query ("delete from ".$dbext."content where link = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();	
	}
// delete sub page
	if ($mode == "delete" && $sect == "sub" && $opt == "rm" && $oid != "") {
		//do the query
		$sql = db_query ("delete from ".$dbext."sub_menu where sid = '".$oid."' limit 1") or db_die();
		$sql2 = db_query ("delete from ".$dbext."content where link = '".$oid."' limit 1") or db_die();
		// now redirect user
		header ("Location: index.php?mode=nav&opt=display");
		exit();	
	}

?>