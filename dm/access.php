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
// File : access.php	                                                //
//                                                                      //
// ---------------------------------------------------------------------//

// lets start the session
session_start();

// insert the Library file
include ("../lib/lib.inc.php");

// convert to simply variables
		$username = $_POST['login'];
		$passwd = $_POST['passwd'];

// do some error checking
	
	if ((!$username) || (!$passwd) ) {
	
		include ("header.php");
		print '<table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The login was rejected !</strong></span><br>
                The login &amp; password fields cannot be blank, please <a href="javascript:history.go(-1)">go back</a> and try your login again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
              </tr>
            </table>';
		include ("footer.php");
			  // if the error checking fails, then lets exit the script
			  	exit();
		}
		
// check the user against the database
		$upass = md5($passwd);
		$sql = db_query("select * from admin where login = '".$username."' and passwd = '".$upass."' and active = '1' limit 1") or db_die();
		
		$res = num_row($sql);
		if ($res > 0) {
			while ($row = fetch_array($sql)) {
				foreach ($row as $key => $val) {
					$$key = stripslashes($val);
					}
		// last login
			$mylogin = getloginDate($last_login);
		// session time
			$sess_begin = time();
		// register a few session values
			session_register('uid');
			$_SESSION['uid'] = $id;
			session_register('active');
			$_SESSION['active'] = $active;
			session_register('bcuser');
			$_SESSION['bcuser'] = $login;
			session_register('first_name');
			$_SESSION['first_name'] = $first_name;
			session_register('last_name');
			$_SESSION['last_name'] = $last_name;
			session_register('email');
			$_SESSION['email'] = $email;
			session_register('blevel');
			$_SESSION['blevel'] = $level;
			session_register('mylogin');
			$_SESSION['mylogin'] = $mylogin;
			session_register('sess_begin');
			$_SESSION['sess_begin'] = $sess_begin;
			
			// update last login
			$query = db_query ("update admin set last_login = now() where email = '".$_SESSION['email']."' and login = '".$_SESSION['bcuser']."' limit 1") or db_die();
			
			// redirect the admin once access is verified
			header ("Location: index.php");
			}
		
		} else {
		include ("header.php");
		print '<table width="95%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="pad10"><span class="redtxt"><strong>The login was rejected !</strong></span><br>
                    Either you have entered your login and password incorrectly or your account is not active, please <a href="javascript:history.go(-1)">go back</a> and try again. You are not able to continue ! <br>
                  <br>
If you feel you got this message in error, feel free to contact the <a href="mailto:'.$admail.'">system admin</a></td>
              </tr>
              <tr>
                <td height="20" align="left" valign="middle">&nbsp;</td>
              </tr>
            </table>';
		include ("footer.php");
			  // if the error checking fails, then lets exit the script
			  	exit();
			}		
	
	// turn off the lights
	mysql_close();
		
?>