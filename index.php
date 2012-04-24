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
<title>COMPANY NAME</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="JavaScript1.2" src="menu/stmenu.js"></script>
</head>
<body>
<div id="wrapper">
  <div id="header">
  <?php include ("inc/search.inc.php"); ?>
  </div>
  <div id="navigation"><?php include ("inc/menu.inc.php"); ?></div>
  <div id="date"><?php echo date("D jS M Y"); ?></div>
  <div id="container">
    <div id="leftcolumn">&nbsp;
      <!-- <?php include ("inc/index_menu.inc.php"); ?> -->
    </div>
    <!-- start main content  -->
    <div id="content">
    <!-- page title  -->
    <div id="title">
        <h2 class="bluetxt">
        <?php 
	  		// get page name
			if ($pageID && $pageID >= "81150") {
			$distitle = db_query("select name from ".$dbext."child_menu where cid = '".$pageID."' and active = '1' limit 1") or db_die();
			$pgtitle = fetch_row($distitle);
			echo $pgtitle[0]; 
			} elseif ($pageID && $pageID <= "81150") {
			$distitle = db_query("select name from ".$dbext."sub_menu where sid = '".$pageID."' and active = '1' limit 1") or db_die();
			$pgtitle = fetch_row($distitle);
			echo $pgtitle[0];
			} else {
			//$distitle = db_query("select name from ".$dbext."at_parent_menu where pid = '91109' limit 1") or db_die();
			//$pgtitle = fetch_row($distitle);
			//echo $pgtitle[0];
			echo "Company Name";
			}
		?>
        </h2>
    </div>
    
    <!-- body copy  -->  
     <?php
        // content begins - the query
        if ($pageID) {
        $sql = db_query ("select content from ".$dbext."content where link = '".$pageID."' limit 1") or db_die();
        	$row = fetch_row($sql);
        		echo stripslashes($row[0]);
        		} else {
        $sql = db_query ("select content from ".$dbext."content where pgid = '65129' limit 1") or db_die();
        	$row = fetch_row($sql);
        	echo stripslashes($row[0]);
        	}
        ?>
     
     </div>
    <!-- end main content  -->
    <div id="rightcolumn">
    <?php include ("inc/photos.inc.php"); ?>
    </div>
    <div id="divider"></div>
    <div id="base"><?php include("inc/base.inc.php"); ?></div>
  </div>
</div>
</body>
</html>
