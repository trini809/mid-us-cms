<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Babcock : Admin</title>
<link href="../main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="wrapper">
  <div id="header">ddddfsfsf</div>
  <div id="container">
    <div id="leftcolumn">
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
          <td><strong class="redtxt">Babcock PLC Group</strong></td>
        </tr>
        <tr>
          <td><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Page Navigation</strong></td>
        </tr>
        
        <tr>
          <td>- <a href="../index.php?mode=nav&amp;opt=display">List all site pages</a></td>
        </tr>
        <tr>
          <td>- <a href="../index.php?mode=nav&amp;sect=child&amp;opt=add">Add new 2nd tier element</a></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>Add new 3rd tier element <br>
         <em class="greytxt">Select parent and click &quot;go&quot;</em></td>
        </tr>
        <tr>
          <td>
          <form action="../index.php?mode=nav&amp;sect=sub&amp;opt=add" method="get" name="subnav" id="subnav" onsubmit="return checkform(this);">
                    <input type="hidden" name="mode" value="nav">
                    <input type="hidden" name="sect" value="sub">
                    <input type="hidden" name="opt" value="add">
                    <select name="parent" id="parent">
                    <option value="" selected>--- select ---</option>
                    <?php
                    // get parent list
                    $query = db_query ("select distinct bc_child_menu.pid, bc_parent_menu.pid, bc_parent_menu.name from bc_parent_menu, bc_child_menu where static = '0' and bc_parent_menu.pid != '91256' and bc_parent_menu.pid != '91258' and bc_parent_menu.pid != '91259' and bc_parent_menu.pid = bc_child_menu.pid and bc_parent_menu.menugroup = '1' order by bc_parent_menu.listorder asc") or db_die();
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
          <td>- <a href="../news.php?mode=item&amp;sect=new&amp;opt=form">Add a News item</a></td>
        </tr>
        <tr>
          <td>- <a href="../news.php?mode=viewall">List News items</a></td>
        </tr>
        <tr>
          <td>---</td>
        </tr>
        <tr>
          <td>- <a href="../newsran.php?mode=item&amp;sect=new&amp;opt=form">Add a New RAN</a></td>
        </tr>
        <tr>
          <td>- <a href="../newsran.php?mode=viewall">List RAN items</a></td>
        </tr>
        
        <tr>
          <td><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>The BIG Picture</strong></td>
        </tr>
        <tr>
          <td>- <a href="../fileit.php?mode=new&amp;sect=upload&amp;opt=pdf">Upload new file (PDF only)</a></td>
        </tr>
        <tr>
          <td>- <a href="../fileit.php?mode=view&amp;sect=pdf&amp;opt=list">View BIG Picture Files</a></td>
        </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Operating Companies</strong></td>
        </tr>
       <tr>
          <td>- <a href="../opco_member.php?mode=opco&amp;sect=search&amp;opt=all">List all OP-COs</a></td>
        </tr>
        <tr>
          <td>- <a href="../opco_member.php?mode=new&amp;sect=member&amp;opt=form">Add new OP-CO details</a></td>
        </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Operating Co. Personnel</strong></td>
        </tr>
        <tr>
          <td>- <a href="../opco_employee.php?mode=opco&amp;sect=view&amp;opt=all">List all Personnel</a></td>
        </tr>
        <tr>
          <td>- <a href="../opco_employee.php?mode=add&amp;sect=employee&amp;opt=form">Add a new Person</a></td>
        </tr>
        
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Investor Relations</strong></td>
        </tr>
        <tr>
          <td> - <a href="../investor.php?mode=view&amp;sect=report&amp;opt=list">View Presentation Archive</a></td>
        </tr>
        <tr>
          <td> - <a href="../investor.php?mode=add&amp;sect=upload&amp;opt=form">Add Presentation</a></td>
        </tr>
        <tr>
          <td>- <a href="../investor.php?mode=view&amp;sect=faq&amp;opt=list">List Shareholder FAQs</a></td>
        </tr>
        <tr>
          <td> - <a href="../investor.php?mode=addfaq&amp;sect=new&amp;opt=form">Add Shareholder FAQs</a></td>
        </tr>
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Financial Reports</strong></td>
        </tr>
        <tr>
          <td>- <a href="../financial.php?mode=view&amp;sect=list&amp;opt=all">View Financial Reports</a></td>
        </tr>
        <tr>
          <td>- <a href="../financial.php?mode=add&amp;sect=pdf&amp;opt=form">Upload Financial Report</a></td>
        </tr>
        
        <tr>
          <td height="10"><hr size="1" class="bluetxt" /></td>
        <tr>
          <td><strong>Photo Gallery</strong></td>
        </tr>
        <tr>
          <td>- <a href="../gallery.php?mode=viewall">View All images</a></td>
        </tr>
        <tr>
          <td>- <a href="../gallery.php?mode=add&amp;sect=new&amp;opt=form">Add new gallery Photo</a></td>
        </tr>
        <tr>
          <td><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>News Subscribers</strong></td>
        </tr>
        <tr>
          <td>- <a href="../subscribers.php?mode=view&amp;opt=all">View All Subscribers</a></td>
        </tr>
        <tr>
          <td>- <a href="../subscribers.php?mode=new&amp;opt=subscribe">Add New Subscriber</a></td>
        </tr>
      </table>
      
    <div class="bluespace">&nbsp;</div>
    <br />
    </div>
    <div id="rightcolumn">
      <p>&nbsp;</p>
      <form id="update" name="update" method="post" action="../rank.php">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="40%">'.$res[1].'</td>
            <td width="40%" class="bluetxt">'.$res[2].'</td>
            <td width="20%" align="right"><input name="rank" type="text" id="rank" size="3" maxlength="2" /> &nbsp; <a href="../opco_employee.php?mode=emp&amp;sect=edit&amp;opt=form&amp;oid='.$res[0].'"><img src="../img/edit_1.jpg" border="0" title="Edit" alt="Edit" /></a> &nbsp; <a href="../opco_employee.php?mode=employee&amp;sect=delete&amp;oid='.$res[0].'" onclick="return confirm(\'Are you sure?\');"><img src="../img/delete_1.jpg" border="0" title="Delete" alt="Delete" /></a> &nbsp; <a href="../opco_employee.php?mode=employee&amp;sect=details&amp;opt=view&amp;oid='.$res[0].'"><img src="../img/doc.jpg" border="0" title="View" alt="View" /></a></td>
          </tr>
        </table>
            <input name="butt" type="submit" class="butt" id="butt" value="Update Order" />
      </form>
      <p>&nbsp;</p>
    </div>
    <div id="spacer">&nbsp;</div>
  </div>
  <div id="base">© <?php echo date("Y"); ?> BABCOCK INT. PLC. All rights reserved.</div>
</div>

</body>
</html>
