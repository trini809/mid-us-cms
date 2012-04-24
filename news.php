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
      <!-- <?php include ("inc/news_menu.inc.php"); ?> -->
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
			$distitle = db_query("select name from ".$dbext."parent_menu where pid = '91112' limit 1") or db_die();
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
        	
        	// use current page, if not, set one! 
		if (!$page) {
		$page = 1; } else { $page = $page; }
		// set max results
      	$from = (($page * $admin_max_res) - $admin_max_res);
      	
	// the query
	$sql = db_query ("select newsid, headline, summary, release_date from ".$dbext."news where active = '1' order by release_date desc limit ".$from.", ".$admin_max_res) or db_die();
		
		// get total results
      		$total_results = mysql_result(db_query("select count(*) as Sum from ".$dbext."news where active = '1'"),0); 
      		$total_pages = ceil($total_results / $admin_max_res);
      		
		// error check
        	if ($total_results) {
        // setup table
		print '<table width="100%" border="0" cellspacing="2" cellpadding="2">';
        
        // insert page nav if needed
    			if ($total_pages > 1) {
      			echo "<tr><td class=\"dottedline\">";
      			if ($page > 1) {
						$last = $page-1;
						echo "&laquo <a href=\"".$_SERVER['PHP_SELF']."?mode=viewall&amp;page=".$last."\">back</a> &nbsp;";
						}
				
				for($i = 1; $i <= $total_pages; $i++) {  
						if ($page == $i) {
							echo "|&nbsp;<strong>".$i."</strong>&nbsp;"; } else {
					echo "| &nbsp;<a href=\"".$_SERVER['PHP_SELF']."?mode=viewall&amp;page=".$i."\">".$i."</a>&nbsp; "; 
					}
				}	
      			echo " | ";
      			if ($page < $total_pages) {
						$next = $page+1;
						echo "&nbsp; <a href=\"".$_SERVER['PHP_SELF']."?mode=viewall&amp;page=".$next."\">next</a> &raquo;";
						}
				echo "</td></tr>";		
					}
        	
        // the results
        print '<tr><td>&nbsp;</td></tr>';
        while ($row = fetch_assoc($sql)) {
		// print out listings
		print '<tr>
          <td width="100%" align="left" valign="top" class="dottedline"><table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
              <td width="75%" class="bluetxt"><strong>'.$row['headline'].'</strong><br />
              <em style="font-size:10px">'.getpostDate($row['release_date']).'</em>
              '.wordSplit($row['summary']).'...<a href="article.php?pageID='.$row['newsid'].'">more</a></td>
              </tr>
          </table>
          </td>
        </tr>';
        	}
        print '</table>';
         }
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
