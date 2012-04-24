<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
 if (form.parent.value == "") {
	alert( "Please select a parent nav." );
	form.parent.focus();
	return false ;
 }
 if (form.name.value == "") {
	alert( "Please enter a page title." );
	form.name.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
     <form action="editor.php?mode=add&amp;sect=nav&amp;opt=child" method="post" name="nav" id="nav" onsubmit="return checkmyform(this);">
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td height="25" colspan="2" valign="middle">
                      <span class="txt15">Add a new 2nd tier element</span><br /><br />
                      Use the field below to add a new navigation. </td>
                      </tr>
                    <tr>
                      <td><strong>Section : </strong></td>
                      <td><select name="parent">
                        <option value="" selected>--- select ---</option>
                        <?php
                        // run the loop
                        	while ($row = fetch_row($sql)) {
                        	echo "<option value=\"".$row[0]."\">".$row[1]."</option>\n";
                        }
                        ?>
                      </select>
                      </td>
                    </tr>
                    <tr>
                      <td width="24%"><strong>Page Title :</strong> </td>
                      <td width="76%"><input name="name" type="text" id="name" size="40"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input name="Submit" type="submit" class="butt" value="create"></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                  </form>
                  <p>&nbsp;</p>