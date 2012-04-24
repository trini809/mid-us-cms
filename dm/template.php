<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Babcock : Admin</title>
<link href="main.css" rel="stylesheet" type="text/css" />
<script src="../assets/SpryAccordion.js" type="text/javascript"></script>
<link href="../assets/SpryAccordion.css" rel="stylesheet" type="text/css" />
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
          <td>- <a href="<?php echo $adminurl; ?>index.php?mode=nav&amp;sect=child&amp;opt=add">Add new 2nd tier element</a></td>
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
      
    <div class="bluespace">&nbsp;</div>
    <br />
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
          <td><strong class="redtxt">ALSTEC Limited</strong></td>
        </tr>
        <tr>
          <td><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td><strong>Page Navigation</strong></td>
        </tr>
        
        <tr>
          <td>- <a href="alstec_index.php?mode=nav&amp;opt=display">List all site pages</a></td>
        </tr>
        <tr>
          <td>- <a href="alstec_index.php?mode=nav&amp;sect=child&amp;opt=add">Add new 2nd tier element</a></td>
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
          <form action="alstec_index.php?mode=nav&amp;sect=sub&amp;opt=add" method="get" name="subnav" id="subnav" onsubmit="return checkform(this);">
                    <input type="hidden" name="mode" value="nav">
                    <input type="hidden" name="sect" value="sub">
                    <input type="hidden" name="opt" value="add">
                    <select name="parent" id="parent">
                    <option value="" selected>--- select ---</option>
                    <?php
                    // get parent list
                    $query = db_query ("select distinct ".$dbext."at_child_menu.pid, ".$dbext."at_parent_menu.pid, ".$dbext."at_parent_menu.name from ".$dbext."at_parent_menu, ".$dbext."at_child_menu where static = '0' and ".$dbext."at_parent_menu.pid = ".$dbext."at_child_menu.pid and ".$dbext."at_parent_menu.menugroup = '1' order by ".$dbext."at_parent_menu.listorder asc") or db_die();
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
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
       </table>
    
    <div class="bluespace">&nbsp;</div>
    </div>
    <div id="rightcolumn">
    <form action="access.php" method="post" name="login" class="form" id="login">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td colspan="2"><table width="602" border="0" cellpadding="2" cellspacing="2">
            <tr>
              <td colspan="14"><strong class="greyTxt">Legends</strong></td>
            </tr>
            <tr>
              <td width="12"><img src="img/sort.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="38" class="greyTxt">Sort</td>
              <td width="12"><img src="img/edit_1.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="57" class="greyTxt">Edit Title </td>
              <td width="10" class="greyTxt"><img src="img/edit_page.jpg" width="10" height="13" hspace="0" vspace="0" border="0" /></td>
              <td width="82" class="greyTxt">Edit Content </td>
              <td width="24" class="greyTxt"><img src="img/add_img.jpg" alt="Add an image" width="24" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="76" class="greyTxt">Add Image</td>
              <td width="12" class="greyTxt"><img src="img/deactivate_1.jpg" width="12" height="11" hspace="0" vspace="0" border="0" /></td>
              <td width="68" class="greyTxt">Deactivate </td>
              <td width="12" class="greyTxt"><img src="img/activate_1.jpg" width="12" height="12" hspace="0" vspace="0" border="0" /></td>
              <td width="55" class="greyTxt">Activate</td>
              <td width="12" class="greyTxt"><img src="img/delete_1.jpg" width="12" height="11" hspace="0" vspace="0" border="0" /></td>
              <td width="46" class="greyTxt">Delete</td>
            </tr>
            <tr>
              <td colspan="14" class="dottedline" style="height:3px"><img src="img/pixel.gif" width="1" height="4" hspace="0" vspace="0" border="0" /></td>
              </tr>

          </table></td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="29%"><strong>ADMINISTRATION LOGIN</strong></td>
          <td width="71%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">To gain access to the admin panel, please enter your assigned login / password in the form below.</td>
          </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><strong>Login : </strong></td>
          <td><input name="login" type="text" id="login" size="15" /></td>
        </tr>
        <tr>
          <td align="right"><strong>Password :</strong> </td>
          <td><input name="passwd" type="password" id="passwd" size="12" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Submit Login" /></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><p>&nbsp;</p>
            <div id="Accordion1" class="Accordion" tabindex="0">
              <div class="AccordionPanel">
                <div class="AccordionPanelTab">Label 1</div>
                <div class="AccordionPanelContent">Content 1
                some content here<br />
                some content here<br />
                some content here<br />
                </div>
              </div>
              <div class="AccordionPanel">
                <div class="AccordionPanelTab">Label 2</div>
                <div class="AccordionPanelContent">Content 2 some content here<br />
                some content here<br />
                some content here<br />
                some content here<br />
                some content here<br />
                some content here<br />
                some content here<br />
                some content here                </div>
              </div>
            </div>            </td>
        </tr>
      </table>
      </form>
    <p>&nbsp;</p>
    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tr>
                  <td width="49%" height="25" valign="middle"><strong>Page Title</strong> </td>
                  <td width="31%" height="25" valign="middle"><strong>URL</strong></td>
                  <td width="20%" valign="middle"><strong>Action</strong></td>
                </tr>
                </table>
    <p>&nbsp;</p>
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
  <tr>
                <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">ERROR : </strong></td>
              </tr>
              
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong>Cannot validate email address!</strong></span><br>                  
                  Sorry but the email address you entered <strong class="redtxt">email</strong> cannot be validated. Please <a href="javascript:history.go(-1)">go back</a> and check that the email you entered confirms to a valid email format. </td>
        </tr>
              <tr>
                <td height="45" align="left" valign="middle">&nbsp;</td>
        </tr>
      </table>
    <p>&nbsp;</p>
    <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2" class="messagebox">
      <tr>
        <td height="35" align="left" valign="middle" bgcolor="#CC0033" class="txt15">&nbsp;<strong class="whitetxt">SUCCESS : </strong></td>
      </tr>
      <tr>
        <td align="left" valign="middle">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" valign="middle" class="messagepad"><span class="redtxt"><strong><?php echo stripslashes($headline); ?> has been successfully removed!</strong></span><br />
          The news subscriber has been removed from the listings and will no longer receive email notifications.</td>
      </tr>
      <tr>
        <td height="45" align="left" valign="middle">&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
    
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Operating Company Personnel</span><br />
            <br /></td>
        </tr>
        <tr>
          <td width="26%" align="left" valign="top">--- image ---</td>
          <td width="74%">
          <?php
          // result
		  echo "<strong>".$row['name']."</strong><br />".$row['position']."<br />\n";
		  echo $res[0]."<br /><a href=\"mailto:".$row['email']."\">".$row['email']."</a><br />\n";
		  if($row['tel']){
		  echo "Tel: ".$row['tel']."<br />\n";
		  }
		  if($row['fax']){
		  echo "Fax: ".$row['fax']."<br />\n";
		  }
		  echo "<br />";
		  echo stripslashes($row['peopleblurb']);
		  ?>          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <form action="subscribers.php?mode=subscribe&amp;sect=add&amp;opt=new" method="post" enctype="application/x-www-form-urlencoded" name="edit" class="form" id="edit" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Add news subscriber</span><br />
              <br />
            Use the form below to edit a News Subscriber. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Name: *</strong></td>
          <td><input name="name" type="text" id="name" value="<?php echo $row['name']; ?>" size="40" /></td>
        </tr>
        
        
        <tr>
          <td><strong>Company : </strong></td>
          <td><input name="company" type="text" id="company" value="<?php echo $row['company']; ?>" size="30" /></td>
        </tr>
        
        <tr>
          <td><strong>Email Address : *</strong></td>
          <td><input name="email" type="text" id="email" value="<?php echo $row['email']; ?>" size="40" /></td>
        </tr>
        <tr>
          <td><strong>Confirmed :</strong></td>
          <td><input name="confirmed" type="radio" id="radio" value="y" checked="checked" />
            Yes 
            <input type="radio" name="confirmed" id="radio2" value="n" />
            No</td>
        </tr>
        <tr>
          <td><strong>Summary : *</strong></td>
          <td><textarea name="summary" cols="40" rows="4" wrap="virtual" id="summary" style="width: 99%;"><?php echo $row['summary']; ?></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Add New Subscriber" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td><span class="txt15">Subscribers Listings</span><br />
            <br />
            These are the current news subscribers that are stored in the system.<strong class="redtxt"><br />
          </strong><br /></td>
        </tr>
        <tr>
          <td width="100%" align="left" valign="top" class="dottedline"><table width="100%" border="0" cellspacing="2" cellpadding="2"><tr>
              <td width="40%">'.$row[1].'</td>
              <td width="47%" class="bluetxt">'.$row[2].'</td>
              <td width="13%" align="right"><a href="opco_employee.php?mode=emp&amp;sect=edit&amp;opt=form&amp;oid='.$res[0].'"><img src="img/edit_1.jpg" border="0" title="Edit" alt="Edit"></a> &nbsp; 
              <a href="opco_employee.php?mode=emp&amp;sect=delete&amp;oid='.$res[0].'" onClick="return confirm(\'Are you sure?\');"><img src="img/delete_1.jpg" border="0" title="Delete" alt="Delete"></a> &nbsp; 
              <a href="opco_employee.php?mode=employee&amp;sect=details&amp;opt=view&amp;oid='.$res[0].'"><img src="img/doc.jpg" border="0" title="View" alt="View"></a></td>
          </tr>
          </table>
          </td>
        </tr>
        <tr>
          <td align="left" valign="top"><hr size="1" class="bluetxt" /></td>
        </tr>
        <tr>
          <td align="left" valign="top"><strong class="redtxt">No files found !</strong></td>
        </tr>

        <tr>
          <td align="left" valign="top">&nbsp;</td>
        </tr>
            </table>
      <p>&nbsp;</p>
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td align="left" valign="top"><strong class="redtxt">Sorry , No file found !</strong></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
      <table width="100%" border="0" align="center" cellpadding="2" cellspacing="2">
        <tr>
          <td height="35" align="left" valign="middle" class="txt15">&nbsp;Welcome <?php echo $_SESSION["first_name"]; ?></td>
        </tr>
              <tr>
                <td align="left" valign="middle">&nbsp;</td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="messagepad"><p>Your last login was on <span class="redtxt"><?php echo $_SESSION["mylogin"];?></span><br>
                    </p>
                    
                  <table width="100%" border="0" cellspacing="2" cellpadding="2">
                    <tr>
                      <td colspan="2">Use the navigation below to access the CMS for the OPCOs, from there you can control all editable areas of an OPCO. You are currently in the PLC zone and have access to all PLC functions and site content.</td>
                    </tr>
                    <tr>
                      <td width="50%" class="imgborder"> - <a href="alstec_index.php">ALSTEC CMS</a></td>
                      <td width="50%" class="imgborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="imgborder">&nbsp;</td>
                      <td class="imgborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="imgborder">&nbsp;</td>
                      <td class="imgborder">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="imgborder">&nbsp;</td>
                      <td class="imgborder">&nbsp;</td>
                    </tr>
                  </table>
                  <p>You are currently logged into the Babcock Group plc CMS system, within this area you have access to manage the content of the website(s). </p>
                  <strong>HOME - Welcome screen</strong>
                  <p>This is the welcome screen and will take you back to this page. If the admin area is inactive for 60 minutes, you will need to log back into the system, this is a security feature to protect the admin area.</p>
                  <strong>PROFILE - Change or update your details</strong>
                  <p>Here you can modify your personal/contact information stored in the database. It is important to keep this information up to date this is used to contact you about any application changes made to the system. You will also be able to change your username and password information - if you forget your username or password you will have to use the "forgot password" option on the login page.</p>
                  <strong>LOGOUT - End your session</strong>
                  <p>This button will end your session in the CMS. From a security perspective, t is important that you use the logout button end each session.</p>
                  <strong>NEED HELP USING THIS SYSTEM?</strong>
                  <p>If you require help in using any part of the system, please refer to the "HELP" link on the top right of the page or <a href="#">click here</a>.</p>
                  <p>If you need any assistance, feel free to contact the <a href="mailto:<?php echo $admail;?>">system admin</a>. </p></td>
              </tr>
              <tr>
                <td height="25" align="left" valign="middle">&nbsp;</td>
              </tr>
            </table>
      <div class="div_blue_border">
        <p>Content for  class "div_blue_border" Goes Here</p>
        <div>Content for New Div Tag Goes Here</div>
        <p>&nbsp;</p>
      </div>
      <p>&nbsp;</p>
      <form id="update" name="update" method="post" action="rank.php">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tr>
            <td width="40%">'.$res[1].'</td>
            <td width="40%" class="bluetxt">'.$res[2].'</td>
            <td width="20%" align="right"><input name="rank" type="text" id="rank" size="3" maxlength="2" /> &nbsp; <a href="opco_employee.php?mode=emp&amp;sect=edit&amp;opt=form&amp;oid='.$res[0].'"><img src="img/edit_1.jpg" border="0" title="Edit" alt="Edit" /></a> &nbsp; <a href="opco_employee.php?mode=employee&amp;sect=delete&amp;oid='.$res[0].'" onclick="return confirm(\'Are you sure?\');"><img src="img/delete_1.jpg" border="0" title="Delete" alt="Delete" /></a> &nbsp; <a href="opco_employee.php?mode=employee&amp;sect=details&amp;opt=view&amp;oid='.$res[0].'"><img src="img/doc.jpg" border="0" title="View" alt="View" /></a></td>
          </tr>
        </table>
            <input name="butt" type="submit" class="butt" id="butt" value="Update Order" />
      </form>
      <p>&nbsp;</p>
      <ul id="sortableList">
        <li>Systems</li>
        <li>Administrators</li>
      </ul>
      <p>&nbsp;</p>
      <form action="employee.php?mode=member&amp;sect=insert&amp;opt=new" method="post" enctype="multipart/form-data" name="login" class="form" id="login" onsubmit="return checkmyform(this);">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="3"><span class="txt15">Edit Company Personnel</span><br />
              <br />
            Fill in the form below to modify the employee listing. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission.</td>
          </tr>
        <tr>
          <td width="21%" align="right">&nbsp;</td>
          <td width="55%">&nbsp;</td>
          <td width="24%" rowspan="4" align="right" valign="top">&nbsp;</td>
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
          <td><strong>Email Address :</strong></td>
          <td><input name="email" type="text" id="email" size="40" /></td>
          <td>&nbsp;</td>
        </tr>
        
        <tr>
          <td><strong>Telephone : </strong></td>
          <td><input name="tel" type="text" id="tel" size="20" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Fax : </strong></td>
          <td><input name="fax" type="text" id="fax" size="20" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td valign="top"><strong>Description :</strong></td>
          <td colspan="2"><?php 
           include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("peopleblurb", addslashes($peopleblurb));
		  $spaw->addToolbars("format","edit");
		  $spaw->hideModeStrip();
		  SpawConfig::setStaticConfigValue('default_height','100px');
		  $spaw->show();
		  ?>          </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Submit New Personnel" /></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
      <p>&nbsp;</p>
    </div>
    <div id="spacer">&nbsp;</div>
  </div>
  <div id="base">© <?php echo date("Y"); ?> BABCOCK INT. PLC. All rights reserved.</div>
</div>
<script type="text/javascript">
<!--
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
//-->
</script>
</body>
</html>
