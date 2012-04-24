<script language="JavaScript" type="text/JavaScript">
<!--
function checkform ( form )
{
 if (form.parent.value == "") {
	alert( "Please select a parent nav." );
	form.parent.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
<table width="180" border="0" cellpadding="2" cellspacing="1">
        <tr>
          <td width="174"><strong class="redtxt"><?php echo $_SESSION['bcuser']; ?></strong></td>
        </tr>
        <tr>
          <td>is logged in!<br />          </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong class="redtxt">Company Name</strong></td>
        </tr>
        <tr>
          <td><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Page Navigation</strong></td>
        </tr>
        
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>index.php?mode=nav&amp;opt=display">List all site pages</a></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>index.php?mode=nav&amp;sect=child&amp;opt=add">Add new 2nd level page</a></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Add a 3rd level page <br>
         <em class="greytxt">Select parent and click &quot;go&quot;</em></td>
        </tr>
        <tr>
          <td>
          <form action="<?php echo $adminurl; ?>index.php?mode=nav&amp;sect=sub&amp;opt=add" method="get" name="subnav" id="subnav" onsubmit="return checkform(this);">
                    <input type="hidden" name="mode" value="nav">
                    <input type="hidden" name="sect" value="sub">
                    <input type="hidden" name="opt" value="add">
                    <select name="parent" id="parent">
                    <option value="" selected>--- select ---</option>
                    <?php
                    // get parent list
                    $query = db_query ("select distinct ".$dbext."child_menu.pid, ".$dbext."parent_menu.pid, ".$dbext."parent_menu.name from ".$dbext."parent_menu, ".$dbext."child_menu where static = '0' and ".$dbext."parent_menu.pid != '91256' and ".$dbext."parent_menu.pid != '91258' and ".$dbext."parent_menu.pid != '91259' and ".$dbext."parent_menu.pid = ".$dbext."child_menu.pid and ".$dbext."parent_menu.menugroup = '1' order by ".$dbext."parent_menu.listorder asc") or db_die();
                    	while ($pmenu = fetch_row($query)) {
                    			echo "<option value=\"".$pmenu[1]."\">".$pmenu[2]."</option>\n";
                    		}
                    ?>
                    </select> <input type="submit" value="go" class="butt" style="margin-top:3px">
            </form>          </td>
        </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Newsroom</strong></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>news.php?mode=item&amp;sect=new&amp;opt=form">Add a News item</a></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>news.php?mode=viewall">List News items</a></td>
        </tr>
        
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Personnel</strong></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>employee.php?mode=add&amp;sect=employee&amp;opt=form">Add a new Person</a></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>employee.php?mode=opco&amp;sect=view&amp;opt=all">List all Personnel</a></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>sortlist/peeps_sort.php">Sort Display Order</a></td>
        </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr><tr>
          <td><strong>Photo Gallery</strong></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>gallery.php?mode=add&amp;sect=new&amp;opt=form">Add new gallery Photo</a></td>
        </tr>
        <tr>
          <td>- <a href="<?php echo $adminurl; ?>gallery.php?mode=viewall">View All images</a></td>
        </tr>
       </table>