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
// File : photos_menu.inc.php                                           //
//                                                                      //
// ---------------------------------------------------------------------//


// photo ID
	if ($pageID) {
$itemid = $pageID;
} else {
// get file name
$myname1 = strrchr($_SERVER['PHP_SELF'], "/");
$myname = substr($myname1, 1);
// now query the id
$parquery = db_query ("select pid from ".$dbext."parent_menu where url = '".$myname."' limit 1") or db_die();
$r = fetch_row($parquery);
$itemid = $r[0];
}

// get content ID
$cont = db_query ("select pgid from ".$dbext."content where link = '".$itemid."' limit 1") or db_die();
$pg = fetch_row($cont);
	// see if there's results
	$pnum = num_row($cont);
		if ($pnum) {
// query the images for display
$iqueue = db_query ("select * from ".$dbext."content_img where page = '".$pg[0]."' order by imgid desc") or db_die();
	while ($pgimg = fetch_array($iqueue)) {
	
	// display images
	echo "<div align=\"center\" class=\"contentimgborder\" style=\"width: ".$content_img_width."\">";
	echo "<img src=\"".$ctimgurl."/".$pgimg['filename']."\" border=\"0\">";
	echo "</div><br />\n";
		}
	} else {
	print '<div align="right">&nbsp;</div>';
	}

?>