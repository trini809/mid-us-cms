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
// File : page_sort.php                                                 //
//                                                                      //
// ---------------------------------------------------------------------//

// start session
session_start();

// get library file and include
include_once ("../../lib/lib.inc.php");
include_once ("../../lib/auth.inc.php");

require('SLLists.class.php');
$sortableLists = new SLLists('scriptaculous');

// information about the database fields and table
$dbTable = $dbext.'people';			// the database table
$idField = 'peepsid';				// the numeric primary key
$displayField = 'name';				// the field whose text will be shown
$orderField = 'displayorder';		// the field that will hold the sort order for the row


// formatting for the list - using a ul as a container and li tags for list items
$sortableTag = 'li';									// the type of tag that should be sortable
$listFormat = '<ul id="sortableList">%s</ul>';			// argument is the contents of the list
$listItemFormat = '<li id="item_%s">%s</li>';  			// two arguments are the idField and the displayField

$sortableLists->addList('sortableList','sortableListOrder',$sortableTag);
$sortableLists->debug = false;

// update the table
if (isset($_POST['sortableListsSubmitted'])) {
	$orderArray = SLLists::getOrderArray($_POST['sortableListOrder'],'sortableList');
	foreach($orderArray as $item) {
		$sql = "UPDATE $dbTable set $orderField=".$item['order']." WHERE $idField=".$item['element'];
		mysql_query($sql);
	}
}

// list all entries
$sql = "SELECT $idField, $displayField, $orderField from $dbTable order by $orderField";
$recordSet = mysql_query($sql);
$listArray = array();
while ($record = mysql_fetch_assoc($recordSet)) {
	$listArray[] = sprintf($listItemFormat,$record[$idField],$record[$displayField]);
}
mysql_free_result($recordSet);
$listHTML = implode("\n",$listArray);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>MID.:.CMS : Admin</title>
<link href="../main.css" rel="stylesheet" type="text/css" />
<?
	$sortableLists->printTopJS();
	?>
</head>

<body>
<div id="wrapper">
  <div id="header">
  <?php
  if (!isset($_SESSION['bcuser']) && (!isset($_SESSION['blevel']) || isset($_SESSION['blevel']) == "") && (!isset($_SESSION['active']) || isset($_SESSION['active']) == 0)) {
  	echo ""; } else {
  ?>
  <a href="<?php echo $adminurl; ?>index.php">HOME</a> | <a href="<?php echo $adminurl; ?>profile.php?mode=profile&amp;opt=view&amp;oid=<?php echo $_SESSION['uid']; ?>">PROFILE</a> | <a href="<?php echo $adminurl; ?>logout.php">LOGOUT</a>
  <?php } ?>
  </div>
  <div id="container">
    <div id="leftcolumn">
    
    <?php
    
    if ($_SESSION['blevel'] == 1) {
    		include ("../master_nav.inc.php");
    	} else {
    	echo "&nbsp;";
    	}
    ?>
    <br />
    <div class="bluespace"> </div>
    </div>
    <div id="rightcolumn">
  <!-- header block ends -->

<?
// get parent name
print '<p><span class="txt15">People Sort</span></p>
<p>Drag and drop to change the order of the following items then click \'Update Order\' to save the new order in this group<br /><br />
</p>';
$URL = $_SERVER['PHP_SELF']."?mode=".$mode."&ipid=".$ipid;
printf($listFormat, $listHTML);
$sortableLists->printForm($URL, 'POST', 'Update Order', 'button');
$sortableLists->printBottomJS();
?>
<br /><br />
<!-- base block begins -->
 </div>
    <div id="spacer">&nbsp;</div>
  </div>
  <div id="base">&copy; <?php echo date("Y"); ?> MidniteHour Internet Development. All rights reserved.</div>
</div>
</body>
</html>