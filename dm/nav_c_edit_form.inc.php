<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.name.value == "") {
	alert( "Please enter a page title." );
	form.name.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
	<form action="editor.php?mode=edit&amp;sect=nav&amp;opt=child&amp;oid=<?php echo $oid; ?>" method="post" enctype="application/x-www-form-urlencoded" name="nav" id="nav" onsubmit="return checkmyform(this);">
                  <input name="id" type="hidden" id="id" value="<?php echo $oid; ?>">
                  
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td height="25" colspan="2" valign="middle">
                      <span class="txt15">Edit 2nd tier Title</span><br /><br />
                      Use the field below to edit the page title. </td>
                      </tr>
                    <tr>
                      <td><strong>Section : </strong></td>
                      <td><strong class="redTxt"><?php echo $row[4]; ?></strong></td>
                    </tr>
                    <tr>
                      <td width="24%"><strong>Page Title :</strong> </td>
                      <td width="76%"><input name="name" type="text" id="name" value="<?php echo $row[2]; ?>" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="butt" value="modify"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  </form>
                  <p>&nbsp;</p>