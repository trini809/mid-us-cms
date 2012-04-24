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
<form action="editor.php?mode=edit&amp;sect=nav&amp;opt=sub&amp;oid=<?php echo $row[0]; ?>" method="post" enctype="application/x-www-form-urlencoded" name="nav" id="nav" onsubmit="return checkmyform(this);">
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td height="25" colspan="2" valign="middle">
                      <span class="txt15">Edit 3rd tier Title</span><br /><br />
                      Use the form below to edit a sub page title. </td>
                      </tr>
                    <tr>
                      <td><strong>Parent Navigation :</strong> </td>
                      <td><strong class="redTxt"><?php echo $row[4]; ?></strong></td>
                    </tr>
                    <tr>
                      <td><strong>Top Navigation  : </strong></td>
                      <td><?php echo $row[3]; ?></td>
                    </tr>
                    <tr>
                      <td width="27%"><strong>Page Title :</strong> </td>
                      <td width="73%"><input name="name" type="text" id="name" size="40" value="<?php echo $row[2]; ?>"></td>
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