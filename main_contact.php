<?php include_once("htlfntion.php"); ?>
    <form action="emailSent.php" id="contact_us" name="contact_us" method="post" autocomplete='off' onsubmit="return validatecu();">
    <table align="left" border="0"><tr><td colspan="2" class="my_pages"><b><?php echo $_WDS['email_us_ttl']; ?></b><br>&nbsp;</td></tr>
    	<tr><td class="my_pages"><?php echo $_WDS['prefix']; ?>:</td>
        <td>
          <select class="contactSelect" id="prefix" name="prefix" onchange="disableDiv('prefixdiv');">
             <option value="" selected="selected"></option>
              <option value="Mr"><?php echo $_WDS['mr'];?></option>
              <option value="Ms"><?php echo $_WDS['ms'];?></option>
              <option value="Miss"><?php echo $_WDS['miss'];?></option>
          </select>
     </td><td> 
     <div align="left" id="prefixdiv" name="prefixdiv" style="display:none" class="errdiv">
    <?php echo $_WDS['contactdiv'];  ?>
    </div>
    
    </td></tr>
    <tr><td class="my_pages"><?php echo $_WDS['name_1']; ?>:</td>
        <td>
          <input type="text" class="box" id="name_1" name="name_1" size="28"
          tabindex="21" onchange="disableDiv('name1div');" />
     </td><td>
     <div align="left" id="name1div" name="name1div" style="display:none" class="errdiv">
    <?php echo $_WDS['contactdiv'];  ?>
    </div>
     </td></tr>
    <tr><td class="my_pages"><?php echo $_WDS['name_2']; ?>:</td>
    <td>
      <input type="text" class="box" id="name_2" name="name_2" size="28"
       value="" tabindex="22" onchange="disableDiv('name2div');"/>
    </td><td>
     <div align="left" id="name2div" name="name2div" style="display:none" class="errdiv">
    <?php echo $_WDS['contactdiv'];  ?>
    </div>
    </td></tr>
    <tr><td class="my_pages"><?php echo $_WDS['email']; ?>*:</td>
    <td>
    <input type="text" class="box" id="email" name="email" tabindex="23" size="28"
     value="" onchange="disableDiv('emaildiv');" />
    </td><td>
      <div align="left" id="emaildiv" name="emaildiv" style="display:none" class="errdiv">
    <?php echo $_WDS['emaildiv'];  ?>
    </div>
    </td></tr>
    <tr><td class="my_pages"><?php echo $_WDS['phone']; ?>*:</td>
    <td><input type="text" class="box" id="phone" name="phone" tabindex="24" size="28"
     value="" onchange="disableDiv('teldiv');" />
    </td><td>
     <div align="left" id="teldiv" name="teldiv" style="display:none" class="errdiv">
    <?php echo $_WDS['teldiv'];  ?>
    </div>
    </td></tr>
    <tr><td></td>
    <td colspan="2"><font size="-4"><?php echo $_WDS['txt_tel']; ?></font>
    </td></tr>
     <tr><td class="my_pages"><?php echo $_WDS['object']; ?>:</td>
    <td>
    <input type="text" class="box" align="left" id="object" name="object" size="28" maxlength="50" tabindex="25"
     value="<?php echo $_SESSION['object']; ?>" />
    </td><td></td></tr>
    
    <tr><td class="my_pages"><?php echo $_WDS['comment']; ?>:</td>
    <td>
      <textarea id="comment" name="comment" rows="5" 
      cols="20" tabindex="26" class="areatext" onchange="disableDiv('comdiv');"></textarea>
     </td><td>
      <div align="center" id="comdiv" name="comdiv" style="display:none" class="errdiv">
    <?php echo $_WDS['contactdiv'];  ?>
    </div>
     </td></tr>
    <tr><td></td>
      <td align="left">
      &nbsp;<br />
      <input type="image" src="<?php echo $_WDS['btn_done']; ?>" id="contact_done" name="contact_done" 
      onMouseOver="mouseOver('contact_done','<?php echo $_WDS['btn_clk_done'];?>');" 
      onMouseOut="mouseOut('contact_done','<?php echo $_WDS['btn_done']; ?>');" value="submit">
    </td><td align="left">
    <?php
    if(isset($_SESSION['mail_sent']))
    {
        if( $_SESSION['mail_sent'] == 1)
        {
            echo $_WDS['txt_email'];
        }
        else
        {
            echo $_WDS['txt_email_fa'];
        }
        unset($_SESSION['mail_sent']);
    }
    ?>
    </td></tr></table>
    </form> 
	<?php $row = get_headquater(); ?>
    <div class='clear_both'><br>&nbsp;<b><?php echo $_WDS['call_us_ttl']; ?></b><br>&nbsp;<br>
   		<?php echo $_WDS['phone'].":&nbsp;". $row['phone'];?> 
    </div>
    <div class='clear_both'><br>&nbsp;<b><?php echo $_WDS['fax_us_ttl']; ?></b><br>&nbsp;<br>
   		<?php echo $_WDS['fax'].":&nbsp;". $row['fax'];?> 
    </div>
    