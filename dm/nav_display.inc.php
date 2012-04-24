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
// File : nav_display.inc.php                                           //
//                                                                      //
// ---------------------------------------------------------------------//
?>
<p>The page titles colored in <strong class="redtxt">RED</strong> are parent pages and cannot be deleted or deactivated, you do however have the option to re-name the page and edit the content of a parent page.</p>
<table width="602" border="0" cellpadding="2" cellspacing="2">
            <tr>
              <td colspan="14"><strong class="greyTxt">Legends</strong></td>
            </tr>
            <tr>
              <td width="12"><img src="img/sort.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="38" class="greyTxt">Sort</td>
              <td width="12"><img src="img/edit_1.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="57" class="greyTxt">Edit Title </td>
              <td width="10" class="greyTxt"><img src="img/edit_page.jpg" width="10" height="13" hspace="0" vspace="0" border="0" /></td>
              <td width="82" class="greyTxt">Edit Content </td>
              <td width="24" class="greyTxt"><img src="img/add_img.jpg" alt="Add an image" width="24" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="76" class="greyTxt">Add Image</td>
              <td width="12" class="greyTxt"><img src="img/deactivate_1.jpg" width="12" height="11" hspace="0" vspace="0" border="0" /></td>
              <td width="68" class="greyTxt">Deactivate </td>
              <td width="12" class="greyTxt"><img src="img/activate_1.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="55" class="greyTxt">Activate</td>
              <td width="12" class="greyTxt"><img src="img/delete_1.jpg" width="12" height="11" hspace="0" vspace="0" border="0" /></td>
              <td width="46" class="greyTxt">Delete</td>
            </tr>
            <tr>
              <td colspan="14" class="dottedline" style="height:3px"><img src="img/pixel.gif" width="1" height="4" hspace="0" vspace="0" border="0" /></td>
              </tr>

          </table>
<table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td width="49%" height="25" valign="middle"><strong>Page Title</strong> </td>
                  <td width="25%" height="25" valign="middle"><strong>URL</strong></td>
                  <td width="26%" height="25" valign="middle"><strong>Action</strong></td>
                </tr>
                <?php
			  // query parent navigation
			  $sql = db_query ("select * from ".$dbext."parent_menu where active ='1' order by menugroup, listorder asc") or db_die();
			  $num = num_row($sql);
			  	if (!$num) {
			  ?>
                <tr>
                  <td colspan="3">No pages found !</td>
                  </tr>
                  <?php
						} else {
						while ($row = fetch_array($sql)) {
						// retrieve content ID
						$query = db_query ("select pgid from ".$dbext."content where link = '".$row['pid']."' limit 1") or db_die();
						$con = fetch_row($query);
						// print output
						?>
						<tr onmouseover="this.style.backgroundColor = '#fbfbc2'" onmouseout="this.style.backgroundColor = '#ffffff'">
						<td><img src="img/r_arrow.jpg" width="9" height="9" hspace="0" vspace="0" border="0" align="absmiddle">&nbsp;<strong class="redtxt"><?php echo $row['name']; ?></strong></td>
						<td><em class="greytxt">./<?php echo $row['url']; ?></em></td>
						<td align="right"><a href="sortlist/page_sort.php?mode=1&amp;ipid=<?php echo $row['pid']; ?>"><img src="img/sort.jpg" alt="Sort Pages" title="Sort Pages" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp;
						<a href="index.php?mode=nav&amp;sect=url&amp;opt=edit&amp;oid=<?php echo $row['pid']; ?>"><img src="img/edit_1.jpg" alt="Edit Title" title="Edit Title" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp; 
						<a href="index.php?mode=page&amp;sect=p&amp;opt=edit&amp;oid=<?php echo $row['pid']; ?>&amp;pgid=<?php echo $con[0]; ?>"><img src="img/edit_page.jpg" alt="Edit Page" title="Edit Page" width="10" height="13" hspace="0" vspace="0" border="0"></a> &nbsp; 
						<a href="add_image.php?mode=upload&amp;sect=form&amp;opt=<?php echo $con[0]; ?>"><img src="img/add_img.jpg" alt="Add Image" title="Add Image" width="20" height="10" hspace="0" vspace="0" border="0"></a> &nbsp; 
						<a href="javascript:void(0)" onClick="return confirm('You are not allowed to\ndeactivate this page.')"><img src="img/deactivate_1.jpg" alt="Deactivate" title="Deactivate" width="12" height="11" hspace="0" vspace="0" border="0"></a> &nbsp; 
						<a href="javascript:void(0)" onClick="return confirm('You are not allowed to delete\na parent page.')"><img src="img/delete_1.jpg" alt="Delete" title="Delete" width="12" height="11" hspace="0" vspace="0" border="0"></a></td>
						</tr>
						<?php 
								// check for the child
								$chd = db_query ("select * from ".$dbext."child_menu where pid = '".$row['pid']."' order by listorder asc") or db_die();
									while ($res = fetch_row($chd)) {
										// retrieve content ID
										$query1 = db_query ("select pgid from ".$dbext."content where link = '".$res[0]."' limit 1") or db_die();
										$con1 = fetch_row($query1);
										// if present, print row
										$mr = num_row($chd);
											if ($mr) {
						?>
						<tr onmouseover="this.style.backgroundColor = '#fbfbc2'" onmouseout="this.style.backgroundColor = '#ffffff'">
						  <td style="padding-left:25px" class="bluetxt"><?php echo $res[2]; ?></td>
						  <td style="padding-left:15px"><em class="greytxt">./<?php echo $res[0]; ?></em></td>
						  <td align="right"><a href="sortlist/page_sort.php?mode=2&amp;ipid=<?php echo $res[0]; ?>"><img src="img/sort.jpg" alt="Sort Pages" title="Sort Pages" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp; 
						  <a href="index.php?mode=nav&amp;sect=child&amp;opt=edit&amp;oid=<?php echo $res[0]; ?>"><img src="img/edit_1.jpg" alt="Edit Title" title="Edit Title" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp;
						  <a href="index.php?mode=page&amp;sect=c&amp;opt=edit&amp;oid=<?php echo $res[0]; ?>&amp;pgid=<?php echo $con1[0]; ?>"><img src="img/edit_page.jpg" alt="Edit Page" title="Edit Page" width="10" height="13" hspace="0" vspace="0" border="0"></a> &nbsp;
						 <!--  <a href="javascript:void(0)" onclick="return confirm('This is a category page and holds no content')"><img src="img/edit_page.jpg" alt="Edit Page" title="Edit Page" width="10" height="13" hspace="0" vspace="0" border="0"></a> &nbsp; --> 
						  
						  <a href="add_image.php?mode=upload&amp;sect=form&amp;opt=<?php echo $con1[0]; ?>"><img src="img/add_img.jpg" alt="Add Image" title="Add Image" width="20" height="10" hspace="0" vspace="0" border="0"></a> &nbsp;
						 <!--  <a href="javascript:void(0)" onclick="return confirm('This is a category page and holds no content')"><img src="img/add_img.jpg" alt="Add Image" title="Add Image" width="20" height="10" hspace="0" vspace="0" border="0"></a> &nbsp; -->
						  	<?php
						  	// if page is active
						  		if ($res[6] == "1") { 
						  		// keep selected pages safe
						  			if ($res[3] == "1") {
						  		?>
						  	<a href="javascript:void(0)" onClick="return confirm('You are not allowed to\ndeactivate this page.')"><img src="img/deactivate_1.jpg" alt="Deactivate" title="Deactivate" width="12" height="11" hspace="0" vspace="0" border="0"></a> &nbsp;  
						  	<?php } else { ?>
						  <a href="status.php?mode=activate&amp;sect=child&amp;opt=inactive&amp;oid=<?php echo $res[0]; ?>"><img src="img/deactivate_1.jpg" alt="Deactivate" title="Deactivate" width="12" height="11" hspace="0" vspace="0" border="0"></a> &nbsp; 
						  <?php } } else { ?>
						  <a href="status.php?mode=activate&amp;sect=child&amp;opt=active&amp;oid=<?php echo $res[0]; ?>"><img src="img/activate_1.jpg" alt="Activate" title="Activate" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp; 
						  <?php } 
						  // keep news page safe
						  	if ($res[3] == "1") {
						  ?>
						  <a href="javascript:void(0)" onclick="return confirm('This page is a site template\nand cannot be deleted')"><img src="img/delete_1.jpg" alt="Delete" title="Delete" width="12" height="11" hspace="0" vspace="0" border="0"></a>
						  <?php
						  } else {
						  ?>
						  <a href="status.php?mode=delete&amp;sect=child&amp;opt=rm&amp;oid=<?php echo $res[0]; ?>" onClick="return confirm('Are you sure?\nDeleting this page will also delete any sub-page\nassociated with it.')"><img src="img/delete_1.jpg" alt="Delete" title="Delete" width="12" height="11" hspace="0" vspace="0" border="0"></a>
						  <?php } ?>						  </td>
				    </tr>
				    <?php
				    		// check for sub nav
				    		$snav = db_query ("select * from ".$dbext."sub_menu where cid = '".$res[0]."' order by listorder asc") or db_die();
				    			$nsub = num_row($snav);
				    				if ($nsub) {
				    					while ($sub = fetch_row($snav)) {
				    					// retrieve content ID
										$query2 = db_query ("select pgid from ".$dbext."content where link = '".$sub[0]."' limit 1") or db_die();
										$con2 = fetch_row($query2);
				    			?>
						<tr onmouseover="this.style.backgroundColor = '#fbfbc2'" onmouseout="this.style.backgroundColor = '#ffffff'">
						  <td style="padding-left:40px">- <?php echo $sub[2]; ?></td>
						  <td style="padding-left:30px"><em class="greytxt">./<?php echo $sub[0]; ?></em></td>
						  <td align="right"><a href="index.php?mode=nav&amp;sect=submenu&amp;opt=edit&amp;oid=<?php echo $sub[0]; ?>"><img src="img/edit_1.jpg" alt="Edit Title" title="Edit Title" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp; 
						  <a href="index.php?mode=page&amp;sect=s&amp;opt=edit&amp;oid=<?php echo $sub[0]; ?>&amp;pgid=<?php echo $con2[0]; ?>"><img src="img/edit_page.jpg" alt="Edit Page" title="Edit Page" width="10" height="13" hspace="0" vspace="0" border="0"></a> &nbsp; 
						  <a href="add_image.php?mode=upload&amp;sect=form&amp;opt=<?php echo $con2[0]; ?>"><img src="img/add_img.jpg" alt="Add Image" title="Add Image" width="20" height="10" hspace="0" vspace="0" border="0"></a> &nbsp;
                              <?php
						  	// if page is active
						  		if ($sub[5] == "1") { ?>
                              <a href="status.php?mode=activate&amp;sect=sub&amp;opt=inactive&amp;oid=<?php echo $sub[0]; ?>"><img src="img/deactivate_1.jpg" alt="Deactivate" title="Deactivate" width="12" height="11" hspace="0" vspace="0" border="0"></a> &nbsp;
                              <?php } else { ?>
                              <a href="status.php?mode=activate&amp;sect=sub&amp;opt=active&amp;oid=<?php echo $sub[0]; ?>"><img src="img/activate_1.jpg" alt="Activate" title="Activate" width="12" height="12" hspace="0" vspace="0" border="0"></a> &nbsp;
                              <?php } ?>
                            <a href="status.php?mode=delete&amp;sect=sub&amp;opt=rm&amp;oid=<?php echo $sub[0]; ?>" onClick="return confirm('Are you sure?')"><img src="img/delete_1.jpg" alt="Delete" title="Delete" width="12" height="11" hspace="0" vspace="0" border="0"></a></td>
					</tr>
						<?php 
										}
									}
								} 
							} 
						
						} ?>
				  </table>
					<?php } ?>	