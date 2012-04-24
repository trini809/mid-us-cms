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
if (form.email.value == "") {
	alert( "Email Address field cannot be blank." );
	form.email.focus();
	return false ;
 } 
if (form.descript.value == "") {
	alert( "Enter a brief description." );
	form.descript.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
<form action="employee.php?mode=member&amp;sect=insert&amp;opt=new" method="post" enctype="multipart/form-data" name="login" class="form" id="login" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Add new Company Personnel</span><br />
              <br />
            Fill in the form below to add a new employee listing to the system. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Name : *</strong></td>
          <td><input name="name" type="text" id="name" size="35" /></td>
        </tr>
        <tr>
          <td><strong>Position : *</strong></td>
          <td><input name="position" type="text" id="position" size="35" /></td>
        </tr>
        <tr>
          <td><strong>Attach an Image : </strong></td>
          <td><input name="upload" type="file" id="upload" size="30" /></td>
        </tr>
        
        <tr>
          <td><strong>Email Address : *</strong></td>
          <td><input name="email" type="text" id="email" size="40" /></td>
        </tr>
        
        <tr>
          <td><strong>Telephone : </strong></td>
          <td><input name="tel" type="text" id="tel" size="20" /></td>
        </tr>
        <tr>
          <td><strong>Fax : </strong></td>
          <td><input name="fax" type="text" id="fax" size="20" /></td>
        </tr>
        <tr>
          <td valign="top"><strong>Description :</strong></td>
          <td><?php 
           include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("blurb", addslashes($blurb));
		  $spaw->addToolbars("format","edit");
		  $spaw->hideModeStrip();
		  SpawConfig::setStaticConfigValue('default_height','100px');
		  $spaw->show();
		  ?>          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Submit New Personnel" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>