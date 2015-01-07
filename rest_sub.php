<?php 
	$pc =  price_cat();
	//include_once("login.php"); 
?>
<script language="JavaScript">
	$(function() {
	$( ".rate_cat" )
			.click(function() {
				$("#rt_code").show("slow");
			});
	});
</script>
<form name="rest_left" id="rest_left" action="book.php" method="POST" AUTOCOMPLETE="OFF">
	<div><?php echo $_WDS['htl'];?>:</div>
    <div><select name="htl_id" id="htl_id" class="boxselect" tabindex='1'>
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </option> 
					<?php
                    if($_SESSION['htl_id'] == NULL)	$_SESSION['htl_id'] = NULL;
                    echo select_hotel($_SESSION['htl_id'], $_SESSION['city_id']);
                    ?>
       </select></div>
<div><?php echo $_WDS['checkin_ttl'];?>:</div>
    	<div><!-- First popup calendar-->
        <INPUT NAME='checkin' TYPE='text' class='box' ID='checkin' size="10" tabindex='2' value='<?php echo $_SESSION['checkin']; ?>' readonly='readonly'>
        </div>
    <div align="left"><!-- Second popup calculater-->
	<?php echo $_WDS['checkout_ttl'];?>:</div>
        <div>
        <INPUT NAME='checkout' TYPE='text' class='box' ID='checkout' size="10" tabindex='3' value='<?php echo $_SESSION['checkout']; ?>' readonly='readonly'>
        </div>
<div align="left"><?php echo $_WDS['room_ttl'];?>:</div>
<div>
     <INPUT TYPE='text' NAME='rooms' id='rooms' class='box' tabindex=4 maxlength=2 size=3 value='<?php echo $_SESSION['rooms']; ?>'
        onKeyup="isInteger(this.value, 'rooms', 'numdiv');">
</div>
<div><?php echo $_WDS['adult_ttl']; ?>:</div>
<div> 
	<select name='adults' id ='adults' class='boxselect' tabindex=5>
      <?php 
 	    for($i = 1 ; $i < 4 ; $i++)
       {
    	echo "<option value='$i' ";
        if($i == $_SESSION['adults'])
        {
        	echo "selected='selected'";
        }
        echo ">$i</option>";
       }
       ?></select></div>

	<div align="left"><?php echo $_WDS['child_ttl']; ?>:</div>
	<div>   
     <select name='children' id ='children' class='boxselect' tabindex="6">
      <?php 
 	    for($i = 0 ; $i < 4 ; $i++)
       {
    	echo "<option value='$i' ";
        if($i == $_SESSION['children'])
        {
        	echo "selected='selected'";
        }
        echo ">$i</option>";
       }
       ?>
       </select> 
       </div>
       	<div align="left"><?php echo $_WDS['pick_rate']; ?></div>		
        <div align="left" style="margin-bottom: 15px;">
			<input type="radio" value="3" name="pc_rate" class="rate_cat" /><?php echo $pc[3]; ?>&nbsp;&nbsp;&nbsp;
			<input type="radio" value="4" name="pc_rate" class="rate_cat" /><?php echo $pc[4]; ?>
        </div>
        <div id="rt_code" align="left" style="display:none;">
        	<table><tr><td><?php echo $_WDS['corp_code'];  ?>:</td>
            <td><input type="text" class="box" name="user" id="user" size="10" value="" /></td></tr>
            <tr><td><?php echo $_WDS['password'];?>:</td>
			<td><input type="password" name="pass" class="box" id="pass" value="" size="10" /></td></tr></table>
        </div>
    <div class="rest_btn" align="left">
		<a href="#" class="rest_clr" onclick="return validFields();"><?php echo $_WDS['get_rate']; ?></a>
     </div>
    </form>
    <div class="rest_btn" align="left">
		<a href="your_account.php" class="rest_clr"><?php echo $_WDS['change']."/".$_WDS['cancel']; ?></a>
     </div>
    <div style="height:40px;" align="left">
      <div align="center" id="numdiv" style="display:none" class="errdiv">&nbsp;<br><?php echo $_WDS['numdiv'];  ?></div>
      <div align="center" id="datediv" style="display:none" class="errdiv"><?php echo $_WDS['datediv']; ?></div>
      <div align="center" id="roomdiv" style="display:none" class="errdiv"><?php echo $_WDS['roomdiv']; ?></div>
	</div>
