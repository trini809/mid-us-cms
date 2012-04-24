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
<form action="editor.php?mode=update&amp;sect=nav&amp;opt=parent&amp;oid=<?php echo $_GET['oid']; ?>" method="post" enctype="application/x-www-form-urlencoded" name="nav" id="nav" onsubmit="return checkmyform(this);">
                  <input name="id" type="hidden" id="id" value="<?php echo $_GET['oid']; ?>">
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td height="25" colspan="2" valign="middle" class="greyTxt">Use the field below to edit the page Title. </td>
                      </tr>
                    <tr>
                      <td width="24%"><strong>Page Title :</strong> </td>
                      <td width="76%"><input name="name" type="text" id="name" value="<?php echo $row['name']; ?>" size="40"></td>
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