<script>
	$(function() {
		$( "#ch_begin" ).datepicker();
	});
	</script>

<form action="process.php" method="POST">
    <table align="left" cellspacing="0" cellpadding="3" width="100%" border="0">
    <tr><td colspan="2" align="center"><b>
	<?php //insert card holder info
        echo $_WORDS['add'].$_WORDS['card_dtl'];
    ?>
    </b></td><td></td></tr>
    <tr> 
    <td><?php echo $_WORDS['code']; ?>*:</td>
     <td><input type="text" name="user" value="<?php  echo $form->value("user"); ?>"> <?php  echo $form->error("user"); ?>
    </td></tr><tr>
    <td><?php echo $_WORDS['pass']; ?>*:</td>
    <td><input type="password" name="pass" value="<?php  echo $form->value("pass"); ?>"><?php  echo $form->error("pass"); ?>
     </td></tr> <tr>
     <td>Email*:</td>
     <td><input type="text" name="email" maxlength="50" value="<?php  echo $form->value("email"); ?>"><?php  echo $form->error("email"); ?>
     </td></tr>
     <tr>
    <td><?php echo $_WORDS['pre_loc'];?>*:</td> <td><input type="text" name="ch_loc" value="" /></td> </tr>
    <tr>
    <td><?php echo $_WORDS['name'];?>*:</td>  <td><input type="text" name="ch_name" value="" /></td></tr>
    <tr>
    <td><?php echo $_WORDS['birth_year'];?>*:</td><td><input type="text" name="ch_begin" id="ch_begin" value="" /></td></tr>
    <tr>
    <td><?php echo $_WORDS['reason'];?>*:</td> 
    <td>
        <select name="ch_reason" id="ch_reason">
        	<option value=""></option>
            <option value="3"><?php echo $pc[3]; ?></option>
            <option value="4"><?php echo $pc[4]; ?></option>
        </select>
    </td></tr>
    <tr>
    <td><?php echo $_WORDS['lang'];?>*:</td> 
    <td>
    <select name="lang_id" id="lang_id">
    	<option value=""></option>
    	<option value="1"><?php echo $_WORDS['chinese']; ?></option>
        <option value="2"><?php echo $_WORDS['english']; ?></option>
    </select>
    </td>
	</tr>
    <tr><td colspan="2">
    <input type="hidden" name="subjoin" value="1">
    <input type="submit" class="btn" value="<?php echo $_WORDS['done']; ?>"></td></tr>
    </table>
</form>