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
// File : news.php			                                            //
//                                                                      //
// ---------------------------------------------------------------------//

// start session
session_start();
header("Cache-control: private");	// bug fix for IE

// get library file and include
include_once ("../lib/lib.inc.php");
include_once ("../lib/auth.inc.php");

// load page vars
$mode = $_GET['mode'];
$opt = $_GET['opt'];
$sect = $_GET['sect'];
$page = $_GET['page'];
$oid = $_GET['oid'];

// include header file
include ("./header.php");

// +----------------------------- + ------------------------------------------+ //
// add news item
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "item" && $sect == "new" && $opt == "form") {
	
	// include new form
	include ("news_add_form.inc.php");
	
	}
	
	// action the insert process
	if ($mode == "new" && $sect == "add" && $opt == "article") {
	// convert POST to vars
	foreach ($_POST as $key => $value) {
		$$key = $value;
	  }
	  // clean up data
	  $newsbody = addslashes($newsbody);
	  // if PDF present
	  if (is_uploaded_file ($_FILES['docfile']['tmp_name'])) {
	  $itype = $_FILES['docfile']['type'];
	  $isize = $_FILES['docfile']['size'];
	  if ($itype != "application/pdf") {
	  			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
  				<tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>Unsupported files selected!</strong></span><br>                  
                  It seems like you\'ve uploaded an unsupported file format in the <strong>PDF</strong> field. This area only accepts <strong>PDF</strong> file formats. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
        		</tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        		</tr>
     		 </table>
      			<p>&nbsp;</p>';
	  			include ("footer.php");
	  				exit(); 
	  			}
	  
	  if ($isize > $pdf_max) {
	  					$mfs = ($pdf_max / "1000");
	  			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file size exceeds the limit!</strong></span><br>                  
                  The PDF file size exceeds the max limit of <strong>'.$mfs.'kb</strong>. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        		</tr></table>
    			<p>&nbsp;</p>';
	  			include ("footer.php");
	  				exit(); 
	  			}
	  	
	  	// move to permanent location
		$dfile = $_FILES['docfile']['name'];
		$myname = str_replace(" ", "_", $dfile);
 	  	$uploadFile = $nwdocsdir."/". $myname;
	  	
	  	move_uploaded_file($_FILES['docfile']['tmp_name'], $uploadFile);
	  	// change file permissions
        chmodFile($uploadFile);
	  
	  // add entry to DB with attachment
	  $sql = db_query ("insert into ".$dbext."news (headline, summary, newsbody, dateadded, release_date, attachedfile, attachedfilesize) values 
	  	('$headline', '$summary', '$newsbody', now(), '$release_date', '$myname', '$isize')") or db_die();
	  	
	  } else {
	  // add entry to DB
	  $sql = db_query ("insert into ".$dbext."news (headline, summary, newsbody, dateadded, release_date) values 
	  	('$headline', '$summary', '$newsbody', now(), '$release_date')") or db_die();
	  
	  }
	  	
	 // print out confirmation
	  print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><strong><span class="redtxt">'.stripslashes($headline).'</span> has been successfully added!</strong><br />
          The News article information has been added to the listings.</td></tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
    
     }
	

// +----------------------------- + ------------------------------------------+ //
// edit news item
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "edit" && $sect == "item" && $opt == "form" && $oid != "") {
	
	// query the entry and print out the form
	$sql = db_query ("select * from ".$dbext."news where newsid = '".$oid."' limit 1") or db_die();
		while ($row = fetch_array($sql)) {
		// insert the form
		include ("news_edit_form.inc.php");
		}
	}
	
	// action the edit process
	if ($mode == "modify" && $sect == "article" && $oid != "") {
	// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = $value;
  		 }
  	$newsbody = addslashes($newsbody);
  	// update the record
  	$sql = db_query ("update ".$dbext."news set headline = '$headline', summary = '$summary', newsbody = '$newsbody', release_date = '$release_date', active = '$active' where newsid = '".$oid."' limit 1") or db_die();
  	
  	// print out confirmation
  	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><strong class="redtxt"><span style="color:#000000">'.$headline.'</span> has been successfully modified!</strong><br />
          The News article information has been modified.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
	
	}

// +----------------------------- + ------------------------------------------+ //
// delete a news item
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "item" && $sect == "delete" && $oid != "") {
	
	// query the entry
	$query = db_query ("select * from ".$dbext."news where newsid = '".$oid."' limit 1") or db_die();
	$row = fetch_array($query);
	// remove the entry
	$rm = db_query ("delete from ".$dbext."news where newsid = '".$oid."' limit 1") or db_die();
	// remove the attached file if present
	if ($row['attachedfile'] != "") {
		$dfile = $nwdocsdir."/". $row['attachedfile'];
		unlink ($dfile);
		}
	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><strong><span class="redtxt">'.stripslashes($row['headline']).'</span> has been successfully deleted!</strong><br />
          The News article has been removed from the listings.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
	}


// +----------------------------- + ------------------------------------------+ //
// no action needed, print out listings
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "viewall") {
	// use current page, if not, set one! 
		if (!$page) {
		$page = 1; } else { $page = $page; }
		// set max results
      	$from = (($page * $admin_max_res) - $admin_max_res);
      	
	// the query
	$sql = db_query ("select newsid, headline, summary, release_date, active from ".$dbext."news order by release_date desc limit ".$from.", ".$admin_max_res) or db_die();
		
		// get total results
      		$total_results = mysql_result(db_query("select count(*) as Sum from ".$dbext."news"),0); 
      		$total_pages = ceil($total_results / $admin_max_res);
      		
		// error check
        	if ($total_results) {
        // setup table
		print '<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><span class="txt15">News item Listings</span><br />
            <br />
            There are currently <strong class="redtxt">'.$total_results.'</strong> News items that are stored in the system. Showing Headline and Released Date.<br /><br /></td>
        </tr>';
        
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
          <tr onmouseover="this.style.backgroundColor = \'#fbfbc2\'" onmouseout="this.style.backgroundColor = \'#ffffff\'">
              <td width="75%" class="bluetxt"><strong>'.$row['headline'].'</strong><br />'.wordSplit($row['summary']).'...</td>
              <td width="12%" valign="bottom"><em style="font-size:10px">'.getpostDate($row['release_date']).'</em></td>
              <td width="13%" align="right" valign="bottom">';
              if ($row['active'] == "0") {
              print '<a href="publishnews.php?mode=update&amp;oid='.$row['newsid'].'"><img src="img/publish.jpg" border="0" title="Publish" alt="Publish"></a> &nbsp;';
              }
              print '<a href="news.php?mode=edit&amp;sect=item&amp;opt=form&amp;oid='.$row['newsid'].'"><img src="img/edit_1.jpg" border="0" title="Edit" alt="Edit"></a> &nbsp; 
              <a href="news.php?mode=item&amp;sect=delete&amp;oid='.$row['newsid'].'" onClick="return confirm(\'Are you sure?\');"><img src="img/delete_1.jpg" border="0" title="Delete" alt="Delete"></a></td>
          </tr>
          </table>
          </td>
        </tr>';
		}
	} else {
	print '<table width="100%" border="0" cellspacing="2" cellpadding="2"><tr>
          <td align="left" valign="top"><strong class="redtxt">No files found !</strong></td>
        </tr>';
	}
	print '</table>';
	
  }

// include footer file
include ("./footer.php");
exit();
?>