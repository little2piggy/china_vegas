<?php 
if(isset($_SESSION['regsuccess'])){
   /* Registration was successful */
   if($_SESSION['regsuccess']){
      echo "<b>Registered ".$_SESSION['reguname']."!";
   }
   /* Registration failed */
   else{
      echo "<h1>Registration Failed</h1>";
      echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
          ."could not be completed.<br>Please try again at a later time.</p>";
   }
   unset($_SESSION['regsuccess']);
   unset($_SESSION['reguname']);
}
/**
 * The user has not filled out the registration form yet.
 * Below is the page with the sign-up form, the names
 * of the input fields are important and should not
 * be changed.
 */
else{
?>

<form action="process.php" method="POST">
<table align="center" border="0" cellspacing="0" cellpadding="3">
<tr><td><?php echo $_WORDS['username']; ?>:</td><td>
	<input type="text" name="user" maxlength="30" value="<?php  echo $form->value("user"); ?>"></td>
    <td width="80" align="right"><?php  echo $form->error("user"); ?></td></tr>
<tr><td><?php echo $_WORDS['pass']; ?>:</td><td><input type="password" name="pass" maxlength="30" value="<?php  echo $form->value("pass"); ?>"></td><td><?php  echo $form->error("pass"); ?></td></tr>
<tr><td>Email:</td><td><input type="text" name="email" maxlength="50" value="<?php  echo $form->value("email"); ?>">
<?php  echo $form->error("email"); ?></td>
</td></tr>
<tr><td colspan="2" align="center">
<input type="hidden" name="subjoin" value="1">
<input type="submit" value="<?php echo $_WORDS['done']; ?>"></td></tr>
<tr><td colspan="3"><br /><hr /></td></tr>
</table>
</form>

<?php 
}
?>


