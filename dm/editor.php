<?php
// ---------------------------------------------------------------------//
// Please leave this message in place, no one will see this. It is      //
// meant for developers. This script is copyright 2007 by MidniteHour   //
// and solely developed for DEMONSTRATION.	 							//
//																		//
// You are not allowed to change this script in any way nor distribute	// 
// this script without the	written permission from MidniteHour. 		//
//                                                                      //
//                                                                      //
// Author :  trini809 ; contact: trini809@midnitehour.com               //
// Web address : www.midnitehour.com                                    //
// File : editor.php	                                                //
//                                                                      //
// ---------------------------------------------------------------------//

// start session
session_start();
header("Cache-control: private");	// bug fix for IE

// get library file and include
include_once ("../lib/auth.inc.php");
include_once ("../lib/lib.inc.php");

// load page vars
$mode = $_GET['mode'];
$opt = $_GET['opt'];
$sect = $_GET['sect'];
$page = $_GET['page'];
$oid = $_GET['oid'];

// include header file
include ("./header.php");

// +----------------------------- + ------------------------------------------+ //
// navigation manager
// +----------------------------- + ------------------------------------------+ //
	// edit parent nav
	if ($mode == "update" && $sect == "nav" && $opt == "parent" && $oid != "") {
		// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 // do the query
		$sql = db_query ("update ".$dbext."parent_menu set name = '".$name."' where pid = '".$id."' limit 1") or db_die();
		// print result
		print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt"><strong>&nbsp;Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($name).'</span></strong> has been modified. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
	}
	
	//* -------------------- add a new child nav ----------------------- *//
	if ($mode == "add" && $sect == "nav" && $opt == "child") {
	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 // do the query
  		 $query = db_query ("select listorder from ".$dbext."child_menu order by listorder desc limit 1") or db_die();
  		 	$row = fetch_row($query);
  		 	$inext = $row[0] + 1;
  		 $sql = db_query ("insert into ".$dbext."child_menu (pid, name, template, listorder, active) values ('$parent', '$name', '0', '$inext', '0')") or db_die();
  		 $np = mysql_insert_id();
  		 $sql2 = db_query ("insert into ".$dbext."content (template, link, lastupdated) values ('2', '$np', now())") or db_die();
  		 // print result
  		 print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt"><strong>&nbsp;Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($name).'</span></strong> has been created. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  	}
  	
  	// edit child nav
  	if ($mode == "edit" && $sect == "nav" && $opt == "child" && $oid != "") {
  	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 
  		 // do some error checking
  		 if ($name == "") {
  		 	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The name field is blank!</strong></span><br>
                        <span class="pad4">The name field cannot be blank , please <a href="javascript:history.go(-1)">go back</a> and try again. You are not able to continue !                        </span></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  		 	// include footer file
			include ("./footer.php");
			// close
			exit();
  		 }
  		 
  		 // do the query
  		 $sql = db_query ("update ".$dbext."child_menu set name = '".$name."' where cid = '".$oid."' limit 1") or db_die();
  		 //print results
  		 print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt"><strong>&nbsp;Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($name).'</span></strong> has been modified. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  	
  	}

	//* -------------------- add a new sub nav ----------------------- *//
	if ($mode == "add" && $sect == "nav" && $opt == "sub" && $oid != "") {
	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 // do the query
  		 $query = db_query ("select listorder from ".$dbext."sub_menu order by listorder desc limit 1") or db_die();
  		 	$row = fetch_row($query);
  		 	$inext = $row[0] + 1;
  		 $sql = db_query ("insert into ".$dbext."sub_menu (cid, name, template, listorder, active) values ('$child', '$name', '2', '$inext', '0')") or db_die();
  		 // create page link
  		 $np = mysql_insert_id();
  		 $sql2 = db_query ("insert into ".$dbext."content (template, link, lastupdated) values ('2', '$np', now())") or db_die();
  		 // print result
  		 print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt">&nbsp;<strong>Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($name).'</span></strong> has been created. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  	}
  	
  	// edit sub nav
  	if ($mode == "edit" && $sect == "nav" && $opt == "sub" && $oid != "") {
  	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 
  		 // do some error checking
  		 if ($name == "") {
  		 	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The name field is blank!</strong></span><br>
                        <span class="pad4">The name field cannot be blank , please <a href="javascript:history.go(-1)">go back</a> and try again. You are not able to continue !                        </span></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  		 	// include footer file
			include ("./footer.php");
			// close
			exit();
  		 }
  		 
  		 // do the query
  		 $sql = db_query ("update ".$dbext."sub_menu set name = '".$name."' where sid = '".$oid."' limit 1") or db_die();
  		 //print results
  		 print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt">&nbsp;<strong>Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($name).'</span></strong> has been modified. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
  	
  	}
	

// +----------------------------- + ------------------------------------------+ //
// page editor - site content
// +----------------------------- + ------------------------------------------+ //
	// get page ID value
	if ($mode == "page" && $sect != "" && $opt == "edit" && $oid != "" && $_GET['pgid'] != "") {
		// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = addslashes($value);
  		 }
  		 // clean up data
  		 $icontent = $content;
  		 // the query
		$sql = db_query ("update ".$dbext."content set content = '".$icontent."' where pgid = '".$pgid."'") or db_die();
			//$row = fetch_array($sql);
			// print confirmation
			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15 whitetxt">&nbsp;<strong>Success !</strong> </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The page title : <strong><span class="redtxt">'.stripslashes($pgname).'</span></strong> has been modified. </p></td>
                  </tr>
                  <tr>
                    <td height="45" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <p>&nbsp;</p>';
			// include footer file
			include ("./footer.php");
			// close
			exit();
	
	}
	

// +----------------------------- + ------------------------------------------+ //
// no action needed, turn off the lights
// +----------------------------- + ------------------------------------------+ //
		mysql_close();

// include footer file
include ("./footer.php");
?>