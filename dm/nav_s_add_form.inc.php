<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.child.value == "") {
	alert( "Please select a Top tier." );
	form.child.focus();
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
<form action="editor.php?mode=add&amp;sect=nav&amp;opt=sub&amp;oid=<?php echo $_GET['parent']; ?>" method="post" enctype="application/x-www-form-urlencoded" name="nav" id="nav" onsubmit="return checkmyform(this);">
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td height="25" colspan="2" valign="middle">
                      <span class="txt15">Add a new 3rd tier element</span><br /><br />
                      Use the form below to create a new sub page. </td>
                      </tr>
                    <tr>
                      <td><strong>Parent Navigation :</strong> </td>
                      <td class="redTxt"><?php echo $row[0]; ?></td>
                    </tr>
                    <tr>
                      <td><strong>Top Navigation  : </strong></td>
                      <td><select name="child">
                        <option value="" selected>--- select ---</option>
                        <?php
                        // run the loop
                        	while ($res = fetch_row($sql2)) {
                        	echo "<option value=\"".$res[0]."\">".$res[1]."</option>\n";
                        }
                        ?>
                      </select>                      </td>
                    </tr>
                    <tr>
                      <td width="27%"><strong>Page Title :</strong> </td>
                      <td width="73%"><input name="name" type="text" id="name" size="40"></td>
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