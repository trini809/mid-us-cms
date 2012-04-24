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
      <!-- <?php include ("inc/side_menu.inc.php"); ?> -->
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
			$distitle = db_query("select name from ".$dbext."parent_menu where pid = '91116' limit 1") or db_die();
			$pgtitle = fetch_row($distitle);
			echo $pgtitle[0];
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
        	// create dynamic site map
	    $sql = db_query ("select * from ".$dbext."parent_menu order by listorder asc") or db_die();
		$numpar = num_row($sql);
		echo "<ul>";
		for ($i = 0; $i<$numpar; $i++) {
		$row = fetch_array($sql);
		$pname = $row['name'];
		$plink = $row['url'];
		$dlink = $row['url'];
		
		// the parent
		echo "<li><a href=\"".$plink.$ext."\" target=\"_self\">".$pname."</a></li>";
		
				// the child query
				$sql1 = db_query ("select * from ".$dbext."child_menu where pid = '".$row['pid']."' and active = '1' order by cid asc") or db_die();
				$childnum = num_row($sql1);
				echo "<ul>";
				for ($c = 0; $c<$childnum; $c++) {
				$res = fetch_array($sql1);
				$cname = $res['name'];
				$clink = $res['cid'];
				if ($res['url'] != "") {
				$plink = $res['url'];
				} else { $plink = $row['url'].$ext."?pageID=".$clink; }
				
				// the child values
				echo "<li><a href=\"".$plink."\" target=\"_self\">".$cname."</a></li>";
				
				// the sub query
				$sql2 = db_query ("select * from ".$dbext."sub_menu where cid = '".$res['cid']."' and active = '1' order by sid asc") or db_die();
				$subnum = num_row($sql2);
				echo "<ul>";
				for ($s = 0; $s<$subnum; $s++) {
				$chd = fetch_array($sql2);
				$sname = $chd['name'];
				$slink = $chd['sid'];
				
				// the sub values
				echo "<li><a href=\"".$dlink."?pageID=".$slink."\" target=\"_self\">".$sname."</a></li>";
				
		// now close it
		}
		echo "</ul>\n";
		}
		echo "</ul>\n";
		}
		echo "</ul>\n";
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
