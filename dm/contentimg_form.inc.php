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
// File : contentimg_form.inc.php                                       //
//                                                                      //
// ---------------------------------------------------------------------//

// check for existing images
$dbimg = db_query ("select filename from ".$dbext."content_img where page = '".$opt."' order by imgid desc") or db_die();
$imgnum = num_row($dbimg);
?>
<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.upload.value == "") {
	alert( "Image field cannot be blank." );
	form.upload.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
<form action="add_image.php?mode=upit&amp;sect=img&amp;opt=<?php echo $opt; ?>" method="post" enctype="multipart/form-data" name="uploadform" class="form" id="uploadform" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Add New Image</span><br />
              <br />
            Fill in the form below to add an image to the <strong><?php echo $row[0]; ?></strong> page. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission. All images will be resized to a width of <strong class="redtxt"><?php echo $content_img_width; ?>px</strong> with a portionate height.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <?php
        // check for image quota
        	if ($imgnum >= $max_images) {
        ?>
        <tr><td colspan="2">
        <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
  <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>Maximum images has been reached for this file!</strong></span><br>                  
                  You have reached your quota for images on this page. Please <a href="javascript:history.go(-1)">go back</a> and choose a different page. </td>
        </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
      </td></tr>
      <?php
      } else {
      ?>
        <tr>
          <td><strong>Select Image *</strong></td>
          <td><input name="upload" type="file" id="upload" size="30" /></td>
        </tr>
        
        
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Upload New Image" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php
        }
        ?>
      </table>
      </form>
   <div style="height:8px" class="dottedline"></div><br />
   <table width="100%" border="0" cellspacing="2" cellpadding="0">
<?php
// display all existing images
	$cols = 3;
	for ($i = 0; $i < $imgnum; $i++) {
        $rowimg = fetch_row($dbimg);
        	if ($i % $cols == 0) {
            echo "<tr>\n";
            	}
	echo "<td align=\"center\" valign=\"bottom\"><img src=\"".$ctimgurl."/".$rowimg[0]."\" border=\"0\" class=\"imgborder\"><br />";
	echo "<a href=\"add_image.php?mode=delete&amp;oid=".$rowimg[0]."&amp;opt=1\"  onClick=\"return confirm('Are you sure?')\">Delete</a>\n";
	echo "</td>\n";
			if (($i % $cols) == ($cols - 1) || ($i + 1) == $imgnum) {
              	echo "</tr>\n";
        		}
        	}
?>
</table>
