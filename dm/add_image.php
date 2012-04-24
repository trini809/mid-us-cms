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
// File : add_image.php	                                                //
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
include ("header.php");	
		
// +----------------------------- + ------------------------------------------+ //
// upload file to library
// +----------------------------- + ------------------------------------------+ //

// validate the action
		if ($mode == "upload" && $sect == "form" && $opt != "") {
		// get link id
		$query = db_query ("select link from ".$dbext."content where pgid = '".$opt."' limit 1") or db_die();
		$res = fetch_row($query);
		// set vars
		$dispg = $res[0];
			if ($dispg{0} == "7") { 
			$distbl = $dbext."sub_menu";
			$disid = "sid";
			}
			if ($dispg{0} == "8") { 
			$distbl = $dbext."child_menu";
			$disid = "cid";
			}
			if ($dispg{0} == "9") { 
			$distbl = $dbext."parent_menu"; 
			$disid = "pid";
			}
		// query the page title
		$sql = db_query ("select name from ".$distbl." where ".$disid." = '".$dispg."' limit 1") or db_die();
			while ($row = fetch_row($sql)) {
		// include the form
		include ("contentimg_form.inc.php");
		}
		include ("footer.php");
		exit;
		}


// upon form submit
	if ($mode == "upit" && $sect == "img" && $opt != "") {
	
	$file_type = $_FILES['upload']['type'];
       	$file_name = $_FILES['upload']['name'];
       	$file_size = $_FILES['upload']['size'];
       	$file_tmp = $_FILES['upload']['tmp_name'];
       	
       	// check if you have selected a file.
       if (!is_uploaded_file($_FILES['upload']['tmp_name'])) {
          // no files selected
		print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>No files were selected!</strong></span><br>                  
                  It seems that no files were selected for upload, you must select an <strong>Image</strong>. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
    <p>&nbsp;</p>';
	  			include ("footer.php");
	  			exit();
       }
       
       // check file size.
       if ($file_size > $max_img_size) {
       $mfs = ($max_img_size / "1000");
       print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file size exceeds the limit!</strong></span><br>                  
                  The image file size exceeds the max limit of <strong>'.$mfs.'kb</strong>. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        		</tr></table>
    			<p>&nbsp;</p>';
	  			include ("footer.php");
	  				exit(); 
	  					}
       
       // check file extension
       $ext = strrchr($file_name,'.');
       $ext = strtolower($ext);
       if (($extlimit == "yes") && (!in_array($ext,$limitedext))) {
          print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
              <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>The file was rejected !</strong></span><br>                  
                  Wrong file extension. The system only accepts <strong>JPEG, PNG, GIF</strong> files. Please <a href="javascript:history.go(-1)">go back</a> and try again. </td>
              </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        	</tr>
      		</table>
      			<p>&nbsp;</p>';
      		include ("footer.php");
          	exit();
      		 }
      		 
      	// get the file extension.
       $getExt = explode ('.', $file_name);
       $file_ext = $getExt[count($getExt)-1];

       // create a random file name
       $rand_name = md5(time());
       $rand_name= rand(0,999999999);
      	
      	// get the new width variable.
       $ThumbWidth = $content_img_width;

       // keep image type
          if ($file_type == "image/pjpeg" || $file_type == "image/jpeg") {
               $new_img = imagecreatefromjpeg($file_tmp);
           } elseif ($file_type == "image/x-png" || $file_type == "image/png") {
               $new_img = imagecreatefrompng($file_tmp);
           } elseif ($file_type == "image/gif") {
               $new_img = imagecreatefromgif($file_tmp);
           }
           // list width and height and keep height ratio.
           list($width, $height) = getimagesize($file_tmp);
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
           // save image
           $uploadImg = $rand_name.".".strtolower($file_ext);
           if (Imagejpeg ($resized_img, "$ctimg/$uploadImg")) {
           Imagedestroy ($resized_img);
           Imagedestroy ($new_img);
           
           // print message
          //  echo "<br>Image Thumb: <a href=\"".$ctimg."/".$uploadImg."\">".$ctimg."/".$uploadImg."</a>";
           
           // input data in database
      	$query = db_query ("insert into ".$dbext."content_img (page, filename, filesize, active) values ('$opt', '$uploadImg', '$file_size', '1')") or db_die();
      	
      	// change file permissions
        chmodFile($uploadImg);
         
		// print "Here's some more debugging info: <br> File Location :" .$uploadFile."<br>";
		print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>Files uploaded successfully!</strong></span><br />
          The file <strong>'.$file_name.'</strong> have been successfully uploaded to the file system. <br /><br />
          <a href="add_image.php?mode=upload&amp;sect=form&amp;opt='.$opt.'">Go Back</a></td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';     
	
			} else	{
		 // possible hack	
		 print "<pre><strong class=\"redtxt\">Possible file upload attack!</strong>  Here's some debugging info:<br>\n";
			print_r($_FILES);
		 print "</pre>";
		 print "</td></tr></table>\n";
				include  ("footer.php");
	  			exit();
			}	
		
	}


// +----------------------------- + ------------------------------------------+ //
// delete an image
// +----------------------------- + ------------------------------------------+ //
		if ($mode == "delete" && $opt == "1" && $oid != "") {
	
	// remove from db
	$query = db_query ("select page from ".$dbext."content_img where filename = '".$oid."' limit 1") or db_die();
	$row = fetch_row($query);
	$sql = db_query ("delete from ".$dbext."content_img where filename = '".$oid."' limit 1") or db_die();
	
	// remove the actual file
	$aimg = $ctimg."/".$oid;
	unlink($aimg);
	
	// print out confirmation
	print '<table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>Image removed successfully!</strong></span><br />
          The image<strong><span class="redtxt"></span></strong> has been successfully removed.<br /><br />
          <a href="add_image.php?mode=upload&amp;sect=form&amp;opt='.$row[0].'">Go Back</a></td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>';
	}


// +----------------------------- + ------------------------------------------+ //
// insert footer file if needed
// +----------------------------- + ------------------------------------------+ //
 include ("footer.php");
 ?>
 
 