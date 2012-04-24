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
// File : login.php		                                                //
//                                                                      //
// ---------------------------------------------------------------------//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MID.:.CMS : Admin</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="header"></div>
  <div id="container">
    <div id="leftcolumn"></div>
    <div id="rightcolumn">
    <form action="access.php" method="post" name="login" class="form" id="login">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="29%"><strong class="bluetxt">ADMINISTRATION LOGIN</strong></td>
          <td width="71%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">To gain access to the CMS admin panel, please enter your assigned login / password in the form below.</td>
          </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><strong>Login : </strong></td>
          <td><input name="login" type="text" id="login" size="15" /></td>
        </tr>
        <tr>
          <td align="right"><strong>Password :</strong> </td>
          <td><input name="passwd" type="password" id="passwd" size="12" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Submit Login" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
      </table>
      </form>
    </div>
    <div id="spacer">&nbsp;</div>
  </div>
  <div id="base">&copy; <?php echo date("Y"); ?> MidniteHour Internet Development. All rights reserved.</div>
</div>
</body>
</html>
