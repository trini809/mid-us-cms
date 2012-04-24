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
<form action="news.php?mode=new&amp;sect=add&amp;opt=article" method="post" enctype="multipart/form-data" name="news" class="form" id="news" onsubmit="return checkmyform();">
      <table width="100%" border="0" cellspacing="2" cellpadding="2">
        
        <tr>
          <td colspan="2"><span class="txt15">Add news article</span><br />
              <br />
            Use the form below to add a News Article. <strong class="redtxt">Note:</strong> Fields marked <strong>*</strong> are required for successful submission and only <strong>PDF</strong> are allowed.</td>
          </tr>
        <tr>
          <td width="23%" align="right">&nbsp;</td>
          <td width="77%">&nbsp;</td>
        </tr>
        <tr>
          <td><strong>Headline: *</strong></td>
          <td><input name="headline" type="text" id="headline" size="50" /></td>
        </tr>
        <tr>
          <td><strong>Release Date : *</strong></td>
          <td><input name="release_date" type="text" id="f_date_c" size="20" readonly="1" /> <img src="img/calbut.gif" id="f_trigger_c" style="cursor: pointer;" title="Date selector" /></td>
        </tr>
        <tr>
          <td><strong>Article Summary : *</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><textarea name="summary" cols="40" rows="4" wrap="virtual" id="summary" style="width: 99%;"></textarea></td>
          </tr>
        <tr>
          <td><strong>Article Content : *</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2">
          <?php 
           include("spaw2/spaw.inc.php"); 
		  $spaw = new SpawEditor("newsbody", $content);
		  $spaw->addToolbars("format","edit","news");
		  $spaw->hideModeStrip();
		  SpawConfig::setStaticConfigValue('400px','100%');
		  $spaw->show();
		  ?>
          </td>
          </tr>
        <tr>
          <td><strong>PDF Document : </strong></td>
          <td><input name="docfile" type="file" id="docfile" size="25" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input name="button" type="submit" class="butt" id="button" value="Add News Article" /></td>
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
