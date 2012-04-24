<?php

// get library file and include
include_once ("lib/lib.inc.php");
// setup page vars
$pageID = $_GET['pageID'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>ALSTEC Limited</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<link href="assets/sdmenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="assets/babcockmenu.js"></script>
</head>
<body>
<div id="wrapper">
  <div id="header">
  <form action="sitesearch.php" method="get" enctype="application/x-www-form-urlencoded" name="search" id="search">
      Sitewide Search<br />
      <input name="key" type="text" id="key" size="15" />
      <input type="submit" name="keybutt" id="keybutt" value="GO" />
  </form>
  </div>
  <div id="navigation">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="center" valign="middle" class="off">&nbsp;</td>
        <td align="center" valign="middle" class="off">&nbsp;</td>
        <td align="center" valign="middle" class="off">&nbsp;</td>
        <td align="center" valign="middle" class="off">&nbsp;</td>
        <td align="center" valign="middle" class="on">Activities</td>
        <td align="center" valign="middle" class="off">&nbsp;</td>
        <td align="center" valign="middle" class="off"><a href="#">Contact</a></td>
        <td align="center" valign="middle" class="off">Babock PLC</td>
      </tr>
    </table>
  </div>
  <div id="date"><?php echo date("D jS M Y"); ?></div>
  <div id="container">
    <div id="leftcolumn">
      <div id="leftblockmenu">
        <div id="leftnavhead">"leftnavhead" Goes Here</div>
        <div class="navdiv">Item 1</div>
        <div class="navdiv">Item 2</div>
        <div class="navdiv">Item 3</div>
        <div class="navdiv">Item 4</div>
      </div>
      <div class="leftblock">Content for  class "leftblock" Goes Here</div>
    Content for  id "leftcolumn" Goes Here</div>
    <div id="content">
      <div id="title">
        <h2 class="bluetxt">Content for  id "title" Goes Here</h2>
      </div>
    Content for  id "content" Goes Here</div>
    <div id="rightcolumn">Content for  id "rightcolumn" Goes Here</div>
    <div id="divider"></div>
    <div id="base"><?php include("inc/base.inc.php"); ?></div>
  </div>
</div>
</body>
</html>
