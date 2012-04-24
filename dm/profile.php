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
// File : profile.php	                                                //
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
	
	
	// now the update
	if ($mode == "profile" && $opt == "update" && $oid != "") {
	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim($value);
  		 }
  		 if ($password != "") {
  		 $pass = md5($password);
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

// include footer file
include ("footer.php");
?>