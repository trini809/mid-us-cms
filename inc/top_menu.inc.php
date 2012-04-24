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
// File : top_menu.inc.php	                                            //
//                                                                      //
// ---------------------------------------------------------------------//


// the query
$topnav = db_query ("select pid, name, url from ".$dbext."parent_menu where static = '0' and menugroup = '1' order by listorder asc") or db_die();

	// table header
	print '<table width="70%" border="0" cellspacing="0" cellpadding="0" align="right">';
      
      // loop menu items
      while ($topitem = fetch_row($topnav)) {
      	$path = strrchr($_SERVER['PHP_SELF'], "/");
      	$ipath = substr($path, 1);
      	if ($ipath == $topitem[2]) { $txtclass = "on"; } else { $txtclass = "off"; }
      echo "<td align=\"center\" valign=\"middle\" class=\"".$txtclass."\" onmouseover=\"this.className='on'\" onmouseout=\"this.className='".$txtclass."'\"><a href=\"".$topitem[2]."\">".$topitem[1]."</a></td>\n";
      }
   // close table
   print '</tr></table>';

?>

