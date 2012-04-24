<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.summary.value == "") {
	alert( "Description field cannot be blank." );
	form.summary.focus();
	return false ;
 }
if (form.upload.value == "") {
	alert( "Image field cannot be blank." );
	form.upload.focus();
	return false ;
 } 
 	return true ;
}
//-->
</script>
<form action="gallery.php?mode=doit&amp;sect=up&amp;opt=photo" method="post" enctype="multipart/form-data" name="upload" class="form" id="upload" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Add New Gallery Image</span><br />
              <br />
            Fill in the form below to add an image to the Gallery. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission. A thumbnail will be created from the original file for display purposes.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Description *</strong></td>
          <td><input type="text" name="summary" id="summary" size="45"></td>
        </tr>
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
      </table>
      </form>