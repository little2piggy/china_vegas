<?php
include_once("htlfntion.php");
	
$htl_id = $_SESSION['htl_id'];
$rule = $_SESSION['rule'];
?>
<div style="width: 60%;">
<?php include_once("search_result.php"); ?>
</div>
<div class="room_div check_out"><p>&nbsp;</p></div>
<div class="check_out">
<b><?php echo $_WDS['special_request'];  ?>
    </b>
    <form action="bookSent.php" id="book_sent" name="book_sent" method="post" autocomplete='off'>

	<table width="100%"><tr><td>
        <input type="checkbox" id="nonsmoking" name="nonsmoking" value="nonsmoking" 
        <?php if($_SESSION['nonsmoking']=="nonsmoking"){echo " checked='checked'";} ?> />
        <?php echo $_WDS['non_smoking']; ?></td>
        <td valign="top">
        <input type="checkbox" id="handcap" name="handcap" value="handcap"
        <?php if($_SESSION['handcap']=="handcap"){echo " checked='checked'";} ?> />
        <?php echo $_WDS['disable']; ?></td>
        <td valign="top">
        <input type="checkbox" id="late_checkin" name="late_checkin" value="late_checkin"
        <?php if($_SESSION['late_checkin']=="late_checkin"){echo " checked='checked'";} ?> />
        <?php echo $_WDS['late_checkin']; ?></td></tr></table>
</div>
<div class="room_div check_out"><p>&nbsp;</p></div>
<div class="check_out">
<b><?php echo $_WDS['personal_info']; ?></b>
	<table>
		<tr><td width="110px" align="right"><?php echo $_WDS['prefix']; ?>: </td>
   		 <td width="150px" align="left">
      <select id="pre_fix" name="pre_fix"  onChange="disableDiv('prefixdiv');"  />
      	 <option value="" selected="selected"></option>
          <option value="Mr"><?php echo $_WDS['mr'];?></option>
          <option value="Ms"><?php echo $_WDS['ms'];?></option>
          <option value="Miss"><?php echo $_WDS['miss'];?></option>
      </select>
 		</td>
 		<td>
  <div align="left" id="prefixdiv" name="prefixdiv" style="display:none" class="errdiv">
					<?php echo $_WDS['contactdiv'];  ?>
                    </div>
 </td></tr>
<tr><td class="my_table" align="right"><?php echo $_WDS['name_1']; ?>: </td>
    <td>
      <input type="text" class="box" id="1_name" name="1_name" value="<?php echo $_SESSION['1_name']; ?>"
      tabindex="21" onchange="disableDiv('1namediv');" />
 </td><td>
 <div align="left" id="1namediv" name="1namediv" style="display:none" class="errdiv">
<?php echo $_WDS['contactdiv'];  ?>
</div>
 </td></tr>
<tr><td class="my_table" align="right"><?php echo $_WDS['name_2']; ?>: </td>
<td>
  <input type="text" class="box" id="2_name" name="2_name" value="<?php echo $_SESSION['2_name']; ?>"
   tabindex="22" onchange="disableDiv('2namediv');"/>
</td><td>
 <div align="left" id="2namediv" name="2namediv" style="display:none" class="errdiv">
<?php echo $_WDS['contactdiv'];  ?>
</div>
</td></tr>
<tr><td class="my_table" align="right"><?php echo $_WDS['email']; ?>: </td>
<td>

<input type="text" class="box" id="e_mail" name="e_mail" tabindex="24"
value="<?php echo $_SESSION['e_mail']; ?>" onchange="disableDiv('e_maildiv');" onblur="disableDiv('emptye_maildiv');" />
</td><td>
  <div align="left" id="e_maildiv" style="display:none" class="errdiv">
<?php echo $_WDS['emaildiv'];  ?>
</div>
<div align="left" id="emptye_maildiv" style="display:none" class="errdiv">
<?php echo $_WDS['contactdiv'];  ?>
</div>
</td></tr>

<tr><td class="my_table" align="right"><?php echo $_WDS['phone']; ?>: </td>
<td><input type="text" class="box" id="tel" name="tel" tabindex="25"
value="<?php echo $_SESSION['tel']; ?>" onchange="disableDiv('tel_div');" />
</td><td>
 <div align="left" id="tel_div" style="display:none" class="errdiv">
<?php echo $_WDS['contactdiv'];  ?>
</div>
</td></tr>
<tr><td></td>   <td colspan="2"><font size="-2"><?php echo $_WDS['txt_tel']; ?></font>  </td></tr>

<tr height="30"><td colspan="2" align="left" class="my_pages" valign="top">
	<input type="checkbox" id="agree" name="agree" value="agree" onclick="disableDiv('agree_div');" />
	<?php 
	echo $_WDS['hit']."<a class='rule'>";
	echo $_WDS['bookagree']; ?> </a></td>
    <td valign="top" align="left">
    <div align="left" id="agree_div" style="display:none" class="errdiv">
		<?php echo $_WDS['hit'].$_WDS['bookagree']."?";  ?>
	</div>
</td></tr>
</table>
<tr><td>
<input type="image" src="<?php echo $_WDS['btn_sent']; ?>" id="btnsent" tabindex="27" 
onMouseOver="mouseOver('btnsent','<?php echo $_WDS['btn_clk_sent'];?>');" 
 onMouseOut="mouseOut('btnsent','<?php echo $_WDS['btn_sent']; ?>');" value="Submit" onclick="return custInfoValid();" >
</td></tr>
</table>
   <input type="hidden" id="chkin" name="chkin" value="<?php echo $_SESSION['checkin'];?>" />
   <input type="hidden" id="chkout" name="chkout" value="<?php echo  $_SESSION['checkout'];?>" />
   <input type="hidden" id="adults" name="adults" value="<?php echo $_SESSION['adults'];?>" />
   <input type="hidden" id="children" name="children" value="<?php echo $_SESSION['children'];?>" />
   <input type="hidden" id="rooms" name="rooms" value="<?php echo $_SESSION['rooms'];?>" />
   <input type="hidden" id="amount" name="amount" value="<?php echo $amount; ?>" />
   <input type="hidden" id="item_name" name="item_name" value="<?php echo $_SESSION['item_name'];?>" />
   <input type="hidden" id="ht_name" name="ht_name" value="<?php echo $_SESSION['ht_name']; ?>" />
</form>
<div align="left" style="display:none;" id='bookrule'>
  <textarea cols="80" rows="3" readonly="readonly"><?php echo $rule; ?></textarea> 
  </div>
</div>
<script type="text/javascript">
$('.rule').click(function() {
  $('#bookrule').show('slow', function() {
  });
});
 </script>
