<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.name.value == "") {
	alert( "Name field cannot be blank." );
	form.name.focus();
	return false ;
 }
if (form.position.value == "") {
	alert( "Position field cannot be blank." );
	form.position.focus();
	return false ;
 }
 if (form.employer.value == "") {
	alert( "Select an Operating Co.." );
	form.employer.focus();
	return false ;
 }
if (form.peopleblurb.value == "") {
	alert( "Enter a brief description." );
	form.peopleblurb.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
<form action="employee.php?mode=update&amp;sect=employee&amp;opt=form&amp;oid=<?php echo $_GET['oid']; ?>" method="post" enctype="multipart/form-data" name="update" class="form" id="login" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="3"><span class="txt15">Edit Company Personnel</span><br />
              <br />
            Fill in the form below to modify the employee listing. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission.</td>
          </tr>
        <tr>
          <td width="19%" align="right">&nbsp;</td>
          <td width="57%">&nbsp;</td>
          <td width="24%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Name : *</strong></td>
          <td><input name="name" type="text" id="name" value="<?php echo $row['name']; ?>" size="35" /></td>
          <td rowspan="4" align="right" valign="top">
          <?php
          	if ($row['image'] != "") {
          print '<img src="'.$peepsurl.'/'.$row['image'].'" border="0" hspace="0" vspace="0" border="0" class="imgborder" />';
          print '<a href="delete_emp_img.php?mode=item&amp;item='.$row['peepsid'].'" onclick="return confirm(\'Are you sure?\');">Delete Image</a>';
          }
          ?>
          </td>
          </tr>
        <tr>
          <td><strong>Position : *</strong></td>
          <td><input name="position" type="text" id="position" value="<?php echo $row['position']; ?>" size="35" /></td>
          </tr>
          <?php
          if ($row['image'] == "") {
          ?>
        <tr>
          <td><strong>Attach an Image : </strong></td>
          <td><input name="upload" type="file" id="upload" size="30" /></td>
          </tr>
        <?php } ?>
        <tr>
          <td><strong>Email Address :</strong></td>
          <td><input name="email" type="text" id="email" value="<?php echo $row['email']; ?>" size="40" /></td>
        </tr>
        
        <tr>
          <td><strong>Telephone : </strong></td>
          <td><input name="tel" type="text" id="tel" value="<?php echo $row['tel']; ?>" size="20" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Fax : </strong></td>
          <td><input name="fax" type="text" id="fax" value="<?php echo $row['fax']; ?>" size="20" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><strong>Description :</strong></td>
          <td colspan="2">
           <?php 
          $content = $row['blurb'];
           include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("blurb", stripslashes($content));
		  $spaw->addToolbars("format","edit");
		  $spaw->hideModeStrip();
		  SpawConfig::setStaticConfigValue('default_height','98%');
		  $spaw->show();
		  ?>           </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Modify Personnel Information" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>