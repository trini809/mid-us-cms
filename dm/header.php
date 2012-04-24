<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MID.:.CMS : Admin</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<style type="text/css">@import url(jscal/calendar-win2k-1.css);</style>
<script type="text/javascript" src="jscal/calendar.js"></script>
<script type="text/javascript" src="jscal/lang/calendar-en.js"></script>
<script type="text/javascript" src="jscal/calendar-setup.js"></script>
</head>

<body>
<div id="wrapper">
  <div id="header">
  <?php
  if (!isset($_SESSION['bcuser']) && (!isset($_SESSION['blevel']) || isset($_SESSION['blevel']) == "") && (!isset($_SESSION['active']) || isset($_SESSION['active']) == 0)) {
  	echo ""; } else {
  ?>
  <a href="index.php">HOME</a> | <a href="profile.php?mode=profile&amp;opt=view&amp;oid=<?php echo $_SESSION['uid']; ?>">PROFILE</a> | <a href="../index.php" target="_blank">LIVE WEBSITE</a> | <a href="logout.php">LOGOUT</a>
  <?php } ?>
  </div>
  <div id="container">
    <div id="leftcolumn">
    
    <?php
    
    if ($_SESSION['blevel'] == 1) {
    	include ("master_nav.inc.php");
    	} else {
    	echo "&nbsp;";
    	}
    ?>
    <br />
    <div class="bluespace"> </div>
    </div>
    <div id="rightcolumn">
  <!-- header block ends -->