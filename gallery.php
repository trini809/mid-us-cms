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
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<script type="text/javascript" language="JavaScript1.2" src="menu/stmenu.js"></script>
<script type="text/javascript" src="assets/prototype.js"></script>
<script type="text/javascript" src="assets/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="assets/lightbox.js"></script>
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
      <!-- <?php include ("inc/gallery_menu.inc.php"); ?> -->
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
			$distitle = db_query("select name from ".$dbext."parent_menu where pid = '91115' limit 1") or db_die();
			$pgtitle = fetch_row($distitle);
			echo $pgtitle[0];
			}
		?>
        </h2>
    </div>
    
    <!-- body copy  -->  
     <?php
        // table setup
        print '<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td>Click on an image below for a larger view, once you\'re in Gallery mode simply use your Left/Right arrow keys to browse through the images.<br /></td>
        </tr>
        <tr><td>
	<div style="height:8px" class="dottedline"></div><br />
   <table width="100%" border="0" cellspacing="3" cellpadding="2">';
        
        // content begins - the query
        $sql = db_query ("select * from ".$dbext."gallery where active = '1' order by photoid desc") or db_die();
        $num = num_row($sql);
        	if ($num) {
	// display all existing images
	$cols = 3;
	for ($i = 0; $i < $num; $i++) {
        $rowimg = fetch_row($sql);
        	if ($i % $cols == 0) {
            echo "<tr>\n";
            	}
	echo "<td align=\"center\" valign=\"bottom\" class=\"txt10 bluetxt\"><a href=\"".$gallerydirurl."/".$rowimg[1]."\" rel=\"lightbox[midcms]\" title=\"".$rowimg[3]."\">";
	echo "<img src=\"".$gallerydirurl."/".$rowimg[2]."\" border=\"0\" class=\"imgborder\"></a>";
	echo "<br />".$rowimg[3]."</td>\n";
			if (($i % $cols) == ($cols - 1) || ($i + 1) == $num) {
              	echo "</tr>\n";
        		}
        	}
    // close table
    } else {
    print '<tr><td align="center"><strong class="redtxt">SORRY:</strong> No images found, please try back later.<br /></td></tr>';
    }
    print '</table></td></tr></table>';
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
