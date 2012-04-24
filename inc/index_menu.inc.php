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
// File : index_menu.inc.php                                            //
//                                                                      //
// ---------------------------------------------------------------------//

	print '<div id="leftblockmenu">
			<div id="leftnavhead">Company Name</div>
			<div id="my_menu" class="sdmenu">';
			
	// the query
	$sidenav = db_query ("select * from ".$dbext."child_menu where pid = '91109' and active = '1' order by listorder asc") or db_die();
		while ($childitem = fetch_array($sidenav)) {
		// 2nd tier
		print '<div class="collapsed"><span>'.$childitem['name'].'</span>';
		// query 3rd level
			$subnav = db_query ("select sid, cid, name from ".$dbext."sub_menu where cid = '".$childitem['cid']."' and active = '1' order by listorder asc") or db_die();
				while ($subitem = fetch_row($subnav)) {
				// sub items
				print '<a href="index.php?pageID='.$subitem[0].'">'.$subitem[2].'</a>';
				}
			print '</div>';
			}
	
	print '</div></div>';
?>