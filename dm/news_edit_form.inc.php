<script language="JavaScript" type="text/JavaScript">
<!--
function checkmyform ()
{
if (document.news.headline.value == "") {
	alert( "Headline field cannot be blank." );
	document.news.headline.focus();
	return false ;
 }
if (document.news.release_date.value == "") {
	alert( "Release date field cannot be blank." );
	document.news.release_date.focus();
	return false ;
 }
if (document.news.summary.value == "") {
	alert( "Summary field cannot be blank." );
	document.news.summary.focus();
	return false ;
 }
 	return true ;
}
//-->
</script>
<form action="news.php?mode=modify&amp;sect=article&amp;oid=<?php echo $_GET['oid']; ?>" method="post" enctype="multipart/form-data" name="news" class="form" id="news" onsubmit="return checkmyform();">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Edit news article</span><br />
              <br />
            Use the form below to edit a News Article. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission and only <strong>PDF</strong> are allowed.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Headline: *</strong></td>
          <td><input name="headline" type="text" id="headline" value="<?php echo $row['headline']; ?>" size="50" /></td>
        </tr>
        <tr>
          <td><strong>Release Date : *</strong></td>
          <td><input name="release_date" type="text" id="f_date_c" size="20" readonly="1" value="<?php echo $row['release_date']; ?>" /> <img src="img/calbut.gif" id="f_trigger_c" style="cursor: pointer;" title="Date selector" /></td>
        </tr>
        <?php
        if ($row['attachedfile'] != "") {
        ?>
        <tr>
          <td><strong>PDF Document : </strong></td>
          <td><em class="redtxt"><a href="<?php echo $nwdocsurl."/".$row['attachedfile']; ?>" target="_blank"><?php echo $row['attachedfile']; ?></a></em></td>
        </tr>
        <?php
        }
        ?>
        <tr>
          <td><strong>Active :</strong></td>
          <td><input type="radio" name="active" id="active" value="1" <?php if ($row['active'] == "1") { echo "checked=\"checked\""; } ?> />
            Yes &nbsp; 
            <input name="active" type="radio" id="active" value="0" <?php if ($row['active'] == "0") { echo "checked=\"checked\""; } ?> />
            No</td>
        </tr>
        <tr>
          <td><strong>Article Summary : *</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="summary" cols="40" rows="4" wrap="virtual" id="summary" style="width: 99%;"><?php echo $row['summary']; ?></textarea></td>
          </tr>
        <tr>
          <td><strong>Article Content : *</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
          <?php 
          $content = $row['newsbody'];
           include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("newsbody", stripslashes($content));
		  $spaw->addToolbars("format","edit","news");
		  $spaw->hideModeStrip();
		  SpawConfig::setStaticConfigValue('400px','100%');
		  $spaw->show();
		  ?>
          </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><input name="button" type="submit" class="butt" id="button" value="Modify News Article" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
      <script type="text/javascript">
    Calendar.setup({
        inputField     :    "f_date_c",     			// id of the input field
        ifFormat       :    "%Y-%m-%d %H:%M:%S",      	// format of the input field
        button         :    "f_trigger_c",  			// trigger for the calendar (button ID)
        align          :    "Tl",           			// alignment (defaults to "Bl")
        showsTime	   :	true,
        singleClick    :    true
    });
</script>
