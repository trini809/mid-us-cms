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
// File : index.php		                                                //
//                                                                      //
// ---------------------------------------------------------------------//

// start session
session_start();

// get library file and include
include_once ("../lib/auth.inc.php");
include_once ("../lib/lib.inc.php");


// bug fix for IE
header("Cache-control: private");

// load page vars
$mode = $_GET['mode'];
$opt = $_GET['opt'];
$sect = $_GET['sect'];
$page = $_GET['page'];
$oid = $_GET['oid'];

// include header file
include ("header.php");

// +----------------------------- + ------------------------------------------+ //
// navigation manager
// +----------------------------- + ------------------------------------------+ //
	// no action taken
	if ($mode == "nav" && $opt == "display") {
		include ("nav_display.inc.php");
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}
	
	// edit parent nav
	if ($mode == "nav" && $sect == "url" && $opt == "edit" && $oid != "") {
	// do the query
	$sql = db_query ("select * from ".$dbext."parent_menu where pid = '".$oid."' limit 1") or db_die();
		while ($row = fetch_array($sql)) {
	// insert edit form
	include ("nav_p_edit_form.inc.php");
	}
	// include footer file
	include ("./footer.php");
	// close
	exit();
	}
	
	// add new child nav
	if ($mode == "nav" && $sect == "child" && $opt == "add") {
	// get the parent values
	$sql = db_query ("select pid, name from ".$dbext."parent_menu where static = '0' order by listorder asc") or db_die();
	// insert the add form
	include ("nav_c_add_form.inc.php");
	// include footer file
	include ("./footer.php");
	// close
	exit();
	}
	
	// edit child nav
	if ($mode == "nav" && $sect == "child" && $opt == "edit" && $oid != "") {
	// get the parent values
	$sql = db_query ("select ".$dbext."child_menu.cid, ".$dbext."child_menu.pid, ".$dbext."child_menu.name, ".$dbext."parent_menu.pid, ".$dbext."parent_menu.name from ".$dbext."child_menu, ".$dbext."parent_menu where ".$dbext."child_menu.cid = '".$oid."' and ".$dbext."child_menu.pid = ".$dbext."parent_menu.pid limit 1") or db_die();
	$row = fetch_row($sql);
	// insert the add form
	include ("nav_c_edit_form.inc.php");
	// include footer file
	include ("./footer.php");
	// close
	exit();
	}
	
	// add sub nav
	if ($mode == "nav" && $sect == "sub" && $opt == "add" && $_GET['parent'] != "") {
	// get parent & child values
	$sql = db_query ("select name from ".$dbext."parent_menu where pid = '".$_GET['parent']."' limit 1") or db_die();
	$row = fetch_row($sql);
	$sql2 = db_query ("select cid, name from ".$dbext."child_menu where pid = '".$_GET['parent']."' order by listorder asc") or db_die();
	// insert add form
	include ("nav_s_add_form.inc.php");
	// include footer file
	include ("./footer.php");
	// close
	exit();
	}
	
	// edit sub nav
	if ($mode == "nav" && $sect == "submenu" && $opt == "edit" && $oid != "") {
	// get the parent values
	$sql = db_query ("select ".$dbext."sub_menu.sid, ".$dbext."sub_menu.cid, ".$dbext."sub_menu.name, ".$dbext."child_menu.name, ".$dbext."parent_menu.name from ".$dbext."sub_menu, ".$dbext."child_menu, ".$dbext."parent_menu where ".$dbext."sub_menu.sid = '".$oid."' and ".$dbext."sub_menu.cid = ".$dbext."child_menu.cid and ".$dbext."child_menu.pid = ".$dbext."parent_menu.pid limit 1") or db_die();
	$row = fetch_row($sql);
	// insert the add form
	include ("nav_s_edit_form.inc.php");
	// include footer file
	include ("./footer.php");
	// close
	exit();
	}

// +----------------------------- + ------------------------------------------+ //
// edit page content
// +----------------------------- + ------------------------------------------+ //
	// get page ID info
	if ($mode == "page" && $sect != "" && $opt == "edit" && $oid != "" && $_GET['pgid'] != "") {
		// get section info
		if ($sect == "p") {
		$tbl = $dbext."parent_menu";
		$myid = "pid";
		} elseif ($sect == "c") {
		$tbl = $dbext."child_menu";
		$myid = "cid";
		} else {
		$tbl = $dbext."sub_menu";
		$myid = "sid";
		}
		// the query
		$sql = db_query ("select ".$tbl.".name, ".$dbext."content.content from ".$tbl.", ".$dbext."content where ".$tbl.".".$myid." = '".$oid."' and ".$dbext."content.pgid = '".$_GET['pgid']."' limit 1") or db_die();
			while ($row = fetch_row($sql)) {
			// insert the edit form
			include ("edit_page_content.inc.php");	
		}
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}

// +----------------------------- + ------------------------------------------+ //
// edit admin profile
// +----------------------------- + ------------------------------------------+ //
	// view user details
	if ($mode == "profile" && $opt == "view" && $oid != "") {
	// the query
	$sql = db_query ("select * from admin where id = '".$oid."' limit 1") or db_die();
		while ($row = fetch_array($sql)) {
		// include the form
		include ("profile_view.inc.php");
		}
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}
	
	
	if ($mode == "profile" && $opt == "update" && $oid != "") {
	// the query
	$sql = db_query ("select * from admin where id = '".$oid."' limit 1") or db_die();
		while ($row = fetch_array($sql)) {
		// include the form
		include ("profile_update.inc.php");
		}
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}
	
	// now the update
	if ($mode == "updater" && $opt == "member" && $oid != "") {
	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim($value);
  		 }
  		 if ($passwd != "") {
  		 $pass = md5($passwd);
  		 } else {
  		 $mps = db_query ("select passwd from admin where id = '".$oid."' limit 1") or db_die();
  		 $rp = fetch_row($mps);
  		 $pass = $rp[0];
  		 }
  		// the query
  		$sql = db_query ("update admin set login = '$login', passwd = '$pass', first_name = '$first_name', last_name = '$last_name', email = '$email', telephone = '$telephone' where id = '".$oid."' limit 1") or db_die();
  		
  		// print out confirmation
  		print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
                  <tr>
                    <td height="35" align="left" valign="middle" bgcolor="#2E2E2E" class="txt15 whitetxt">&nbsp;Success ! </td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td align="left" valign="middle" class="messagepad"><p>The admin profile for <strong><span class="redtxt">'.$first_fname.' '.$last_name.'</span></strong> has been modified. <br>
                        </p>
                    
                    </td>
                  </tr>
                  <tr>
                    <td height="25" align="left" valign="middle">&nbsp;</td>
                  </tr>
                </table>
                <br /><br />
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td width="20%" align="left" valign="middle"><em>&nbsp;Login : </em></td>
                      <td width="80%" align="left" valign="middle">'.$login.'</td>
                    </tr>
                    
                    <tr>
                      <td align="left" valign="middle"><em>&nbsp;First Name :</em></td>
                      <td align="left" valign="middle">'.$first_name.'</td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><em>&nbsp;Last Name :</em></td>
                      <td align="left" valign="middle">'.$last_name.'</td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><em>&nbsp;Email :</em></td>
                      <td align="left" valign="middle">'.$email.'</td>
                    </tr>
                    <tr>
                      <td align="left" valign="middle"><em>&nbsp;Phone :</em></td>
                      <td align="left" valign="middle">'.$telephone.'</td>
                    </tr>
                    
                    <tr>
                      <td align="left" valign="middle">&nbsp;</td>
                      <td align="left" valign="middle">&nbsp;</td>
                    </tr></table>';
  		// include footer file
		include ("./footer.php");
		// close
		exit();
	}

// +----------------------------- + ------------------------------------------+ //
// no action needed, print out welcome note
// +----------------------------- + ------------------------------------------+ //
	
	include ("welcome.inc.php");
		

// include footer file
include ("footer.php");
?>