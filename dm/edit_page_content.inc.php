<form name="form1" method="post" action="editor.php?mode=page&amp;sect=<?php echo $_GET['sect']; ?>&amp;opt=edit&amp;oid=<?php echo $_GET['oid']; ?>&amp;pgid=<?php echo $_GET['pgid']; ?>">
			<input type="hidden" name="pgid" value="<?php echo $_GET['pgid']; ?>">
			<input type="hidden" name="pgname" value="<?php echo $row[0]; ?>">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="pad10">
                <span class="txt15">Edit page content</span><br /><br />
                Use the form below to add content to the page title <strong class="redtxt"><?php echo $row[0]; ?></strong><br /><br /></td>
              </tr>
              <tr>
                <td class="pad10"><?php 
                $content = $row[1];
		  include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("content", stripslashes($content));
		  $spaw->show();
		  ?></td>
              </tr>
              <tr>
                <td align="right" class="pad10"><input name="Submit" type="submit" class="butt" value="Submit content"></td>
              </tr>
            </table>
                    </form>