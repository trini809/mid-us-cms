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
// File : employee.php		                                            //
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
// add a new OPCO EMPLOYEE
// +----------------------------- + ------------------------------------------+ //

	if ($mode == "add" && $sect == "employee" && $opt == "form") {
		// insert the add form
		include ("employee_add_form.inc.php");
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}

	// insert into db
		if ($mode == "member" && $sect == "insert" && $opt == "new") {
		// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 
  		 // upload image
  		 //check that a file exists and meets allowed crtieria
	  if (is_uploaded_file ($_FILES['upload']['tmp_name'])) {
	 		
	 		// check file extension
       		$myimagename = $_FILES['upload']['name'];
       		$myimage = strrchr($_FILES['upload']['name'],'.');
       		$myimage = strtolower($myimage);
       		if (($extlimit == "yes") && (!in_array($myimage,$limitedext))) {
          	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file was rejected !</strong></span><br>                  
                  Wrong file extension. The system only accepts <strong>PDF, JPEG, PNG, GIF</strong> files. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        	</tr>
      		</table>
      			<p>&nbsp;</p>';
      		include ("footer.php");
          	exit();
      		 }
      		 
      		// check image file size
      		$imgsize = $_FILES['upload']['size'];
      		if ($imgsize > $max_img_size) {
	  					$mimg = ($max_img_size / "1000");
	  			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file size exceeds the limit!</strong></span><br>                  
                  The PDF file size exceeds the max limit of <strong>'.$mimg.'kb</strong>. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        		</tr></table>
    			<p>&nbsp;</p>';
	  			include ("footer.php");
	  				exit(); 
	  					}
	  			
	  			// get the new width variable.
       $ThumbWidth = $img_thumb_width;
       $mycoverimg = $_FILES['upload']['type'];
       $mycovertmp = $_FILES['upload']['tmp_name'];
       
       // get the new width variable.
       $ThumbWidth = $img_thumb_width;

       // keep image type
       if ($imgsize) {
          if ($mycoverimg == "image/pjpeg" || $mycoverimg == "image/jpeg") {
               $new_img = imagecreatefromjpeg($mycovertmp);
           }elseif($mycoverimg == "image/x-png" || $mycoverimg == "image/png") {
               $new_img = imagecreatefrompng($mycovertmp);
           }elseif($mycoverimg == "image/gif") {
               $new_img = imagecreatefromgif($mycovertmp);
           }
           // list width and height and keep height ratio.
           list($width, $height) = getimagesize($mycovertmp);
           $imgratio=$width/$height;
           if ($imgratio > 1) {
              $newwidth = $ThumbWidth;
              $newheight = $ThumbWidth/$imgratio;
           } else {
                 $newheight = $ThumbWidth;
                 $newwidth = $ThumbWidth*$imgratio;
           }
           // function for resize image.
           if (function_exists(imagecreatetruecolor)) {
           $resized_img = imagecreatetruecolor($newwidth,$newheight);
           } else {
                 die("Error: Please make sure you have GD library ver 2+");
           }
           imagecopyresampled($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
           
           // save resized image and trash tmp
           $mycoverimage = str_replace(" ", "_", $myimagename);
           Imagejpeg ($resized_img,"$peeps/$mycoverimage");
           Imagedestroy ($resized_img);
           Imagedestroy ($new_img);
        }
	  			
	 	// setup the query
		$sql = db_query ("insert into ".$dbext."people (name, position, image, imagefilesize, blurb, email, tel, fax) values 
		('$name', '$position', '$mycoverimage', '$imgsize', '$blurb', '$email', '$tel', '$fax')") or db_die();
			
		} else {
		// insert without image
		$sql = db_query ("insert into ".$dbext."people (name, position, blurb, email, tel, fax) values 
		('$name', '$position', '$blurb', '$email', '$tel', '$fax')") or db_die();
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
        <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>'.stripslashes($name).' has been successfully added!</strong></span><br />
          The personnel information is now available.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
	}


// +----------------------------- + ------------------------------------------+ //
// list all people
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "opco" && $sect == "view" && $opt == "all") {
	
	print '<table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td colspan="2"><span class="txt15">Company Personnel Listings</span><br />
            <br />
            These are the current Companies People that are stored in the system.<strong class="redtxt"><br />
          </strong><br /><br /></td>
        </tr>';
        
        // query the opco listings
			$query = db_query ("select * from ".$dbext."people order by displayorder asc") or db_die();
			$num = num_row($query);
				while ($row = fetch_array($query)) {
				print '<tr>
          <td width="140" align="left" valign="top">';
          	if ($row['image'] != "") {
          print '<img src="'.$peepsurl.'/'.$row['image'].'" border="0" class="imgborder">';
          }
          print '</td>
          <td valign="top">';
          // result
		  echo "<strong>".$row['name']."</strong><br />".$row['position']."<br />\n";
		  echo $res[0]."<br /><a href=\"mailto:".$row['email']."\">".$row['email']."</a><br />\n";
		  if($row['tel']){
		  echo "Tel: ".$row['tel']."<br />\n";
		  }
		  if($row['fax']){
		  echo "Fax: ".$row['fax']."<br />\n";
		  }
		  echo "<br />";
		  echo stripslashes($row['blurb'])."<br />\n";
		  print '<div class="divframe"<a href="employee.php?mode=emp&amp;sect=edit&amp;opt=form&amp;oid='.$row['peepsid'].'"><img src="img/edit_1.jpg" border="0" title="Edit" alt="Edit" /></a> &nbsp; 
		  <a href="employee.php?mode=employee&amp;sect=delete&amp;oid='.$row['peepsid'].'" onclick="return confirm(\'Are you sure?\');"><img src="img/delete_1.jpg" border="0" title="Delete" alt="Delete" /></a>
		</div></td></tr>';
          }
			print '</table><br />';
		}
	
// +----------------------------- + ------------------------------------------+ //
// edit an individual
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "emp" && $sect == "edit" && $opt == "form" && $oid != "") {
	
		// do the query
		$sql = db_query ("select * from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
			while ($row = fetch_array($sql)) {
		// insert edit form
		include ("employee_edit_form.inc.php");
		}
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}
	
	// update the individual info
	if ($mode == "update" && $sect == "employee" && $opt == "form" && $oid != "") {
	
		// convert POST to vars
		foreach ($_POST as $key => $value) {
       		$$key = trim(addslashes($value));
  		 }
  		 
  		
  		// upload image
  		 //check that a file exists and meets allowed crtieria
	  if (is_uploaded_file ($_FILES['upload']['tmp_name'])) {
	 		
	 		// check file extension
       		$myimagename = $_FILES['upload']['name'];
       		$myimage = strrchr($_FILES['upload']['name'],'.');
       		$myimage = strtolower($myimage);
       		if (($extlimit == "yes") && (!in_array($myimage,$limitedext))) {
          	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file was rejected !</strong></span><br>                  
                  Wrong file extension. The system only accepts <strong>PDF, JPEG, PNG, GIF</strong> files. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        	</tr>
      		</table>
      			<p>&nbsp;</p>';
      		include ("footer.php");
          	exit();
      		 }
      		 
      		// check image file size
      		$imgsize = $_FILES['upload']['size'];
      		if ($imgsize > $max_img_size) {
	  					$mimg = ($max_img_size / "1000");
	  			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file size exceeds the limit!</strong></span><br>                  
                  The PDF file size exceeds the max limit of <strong>'.$mimg.'kb</strong>. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        		</tr></table>
    			<p>&nbsp;</p>';
	  			include ("footer.php");
	  				exit(); 
	  					}
	  			
	  			// get the new width variable.
       $ThumbWidth = $img_thumb_width;
       $mycoverimg = $_FILES['upload']['type'];
       $mycovertmp = $_FILES['upload']['tmp_name'];
       
       // get the new width variable.
       $ThumbWidth = $img_thumb_width;

       // keep image type
       if ($imgsize) {
          if ($mycoverimg == "image/pjpeg" || $mycoverimg == "image/jpeg") {
               $new_img = imagecreatefromjpeg($mycovertmp);
           }elseif($mycoverimg == "image/x-png" || $mycoverimg == "image/png") {
               $new_img = imagecreatefrompng($mycovertmp);
           }elseif($mycoverimg == "image/gif") {
               $new_img = imagecreatefromgif($mycovertmp);
           }
           // list width and height and keep height ratio.
           list($width, $height) = getimagesize($mycovertmp);
           $imgratio=$width/$height;
           if ($imgratio > 1) {
              $newwidth = $ThumbWidth;
              $newheight = $ThumbWidth/$imgratio;
           } else {
                 $newheight = $ThumbWidth;
                 $newwidth = $ThumbWidth*$imgratio;
           }
           // function for resize image.
           if (function_exists(imagecreatetruecolor)) {
           $resized_img = imagecreatetruecolor($newwidth,$newheight);
           } else {
                 die("Error: Please make sure you have GD library ver 2+");
           }
           imagecopyresampled($resized_img, $new_img, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
           
           // save resized image and trash tmp
           $mycoverimage = str_replace(" ", "_", $myimagename);
           Imagejpeg ($resized_img,"$peeps/$mycoverimage");
           Imagedestroy ($resized_img);
           Imagedestroy ($new_img);
        	}
        
        // update the information
  		$sql = db_query ("update ".$dbext."people set name = '$name', position = '$position', image = '$mycoverimage', imagefilesize = '$imgsize', email = '$email', tel = '$tel', 
  							fax = '$fax', blurb = '$blurb' where peepsid = '".$oid."' limit 1") or db_die();	
        } else {
  		
  		// update the information
  		$sql = db_query ("update ".$dbext."people set name = '$name', position = '$position', email = '$email', tel = '$tel', 
  							fax = '$fax', blurb = '$blurb' where peepsid = '".$oid."' limit 1") or db_die();
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
        <td align="left" valign="middle" class="messagepad"> <strong>Personnel updated successfully!</strong><br />
          The member : <strong><span class="redtxt">'.$name.'\'s</span></strong> details has been successfully modified, 
          <a href="employee.php?mode=employee&amp;sect=details&amp;opt=view&amp;oid='.$oid.'">click here to view</a>.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
    // include footer file
		include ("./footer.php");
		// close
		exit();
	}


// +----------------------------- + ------------------------------------------+ //
// delete a person
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "employee" && $sect == "delete" && $oid != "") {
	
	// get image info
	$query = db_query ("select image from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
	$num = num_row($query);
	$res = fetch_row($query);
		if ($num) {
		// remove image from file system
		$pic = $peeps."/".$res[0];
		unlink($pic);
		}
	// remove from db
	$query2 = db_query ("select name from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
	$res2 = fetch_row($query2);
	$sql = db_query ("delete from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
		
			// print out confirmation
			print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>'.stripslashes($res2[0]).' has been successfully removed!</strong></span><br />
          The personnel information has been removed from the system.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
		// include footer file
		include ("./footer.php");
		// close
		exit();
	}

// +----------------------------- + ------------------------------------------+ //
// view a person's details
// +----------------------------- + ------------------------------------------+ //
	if ($mode == "employee" && $sect == "details" && $opt == "view" && $oid != "") {
	
	// query the individual details
	$sql = db_query ("select * from ".$dbext."people where peepsid = '".$oid."' limit 1") or db_die();
		while ($row = fetch_array($sql)) {
		
		print '<table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td width="20%" align="left" valign="top">';
          	if ($row['image'] != "") {
          print '<img src="'.$peepsurl.'/'.$row['image'].'" border ="0" class="imgborder">';
          }
          print '</td>
          <td width="80%" valign="top">';
          // result
		  echo "<strong>".$row['name']."</strong><br />".$row['position']."<br />\n";
		  echo $res[0]."<br /><a href=\"mailto:".$row['email']."\">".$row['email']."</a><br />\n";
		  if($row['tel']){
		  echo "Tel: ".$row['tel']."<br />\n";
		  }
		  if($row['fax']){
		  echo "Fax: ".$row['fax']."<br />\n";
		  }
		  echo "<br />";
		  echo stripslashes($row['blurb']);
		          
        print '</td></tr>
        <tr><td>&nbsp;</td>
        <td class="dottedline">&nbsp;</td</tr>
        <tr>
          <td>&nbsp;</td>
          <td><a href="employee.php?mode=opco&amp;sect=view&amp;opt=all">Back to listings</a></td>
         </tr>
      </table>';
		
		}
		
	// include footer file
		include ("./footer.php");
		// close
		exit();
	
	}


// +----------------------------- + ------------------------------------------+ //
// no action needed, print out welcome note
// +----------------------------- + ------------------------------------------+ //
	

// include footer file
include ("./footer.php");

?>