<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ( form )
{
if (form.first_name.value == "") {
	alert( "First Name field cannot be blank." );
	form.first_name.focus();
	return false ;
 }
 if (form.last_name.value == "") {
	alert( "Last Name field cannot be blank." );
	form.last_name.focus();
	return false ;
 }
if (form.email.value == "") {
	alert( "Email field cannot be blank." );
	form.email.focus();
	return false ;
 }
if (form.password.value != "" && form.password2.value == "" || form.password.value == "" && form.password2.value != "") {
	alert( "Both Password fields must match" );
	form.password.focus();
	return false ;
}
if (form.password.value != form.password2.value) {
	alert( "Both Password fields must match" );
	form.password.focus();
	return false ;
}
 	return true ;
}
//-->
</script>
<form action="profile.php?mode=profile&amp;opt=update&amp;oid=<?php echo $_GET['oid']; ?>" method="post" enctype="multipart/form-data" name="profile" class="form" id="profile" onsubmit="return checkmyform(this);">
      <input type="hidden" name="login" value="<?php echo $row['login']; ?>">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Administrator Profile</span><br />
              <br />
            Fill in the form below to modify an admin profile. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission. </td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>First Name : *</strong></td>
          <td><input name="first_name" type="text" id="first_name" size="25" value="<?php echo $row['first_name']; ?>" /></td>
        </tr>
        
        
        <tr>
          <td><strong>Last Name : *</strong></td>
          <td><input name="last_name" type="text" id="last_name" size="25" value="<?php echo $row['last_name']; ?>" /></td>
        </tr>
        <tr>
          <td><strong>Email Address : *</strong></td>
          <td><input name="email" type="text" id="email" size="35" value="<?php echo $row['email']; ?>" /></td>
        </tr>
        <tr>
          <td><strong>Telephone :</strong> </td>
          <td><input name="telephone" type="text" id="telephone" size="20" value="<?php echo $row['telephone']; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" class="greytxt">- Leave Password fields blank if you <strong>do not</strong> want to change the value</td>
          </tr>
        <tr>
          <td><strong>Login : </strong></td>
          <td><strong class="redtxt"><?php echo $row['login']; ?></strong></td>
        </tr>
        <tr>
          <td><strong>Password :</strong></td>
          <td><input name="password" type="password" id="password" size="15" disabled="true" /></td>
        </tr>
        <tr>
          <td><strong>Confirm Password :</strong></td>
          <td><input name="password2" type="password" id="password2" size="15" disabled="true" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Modify Admin Profile" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>