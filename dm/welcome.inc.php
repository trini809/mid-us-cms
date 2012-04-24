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
                    
                  <p>You are currently logged into the MID CMS system, within this area you have access to manage the content of the website(s). </p>
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
            <p>&nbsp;</p>
            <?php
            //echo "<pre class=\"redtxt\">";
            //print_r ($_SESSION);
            //echo "</pre>";
            ?>