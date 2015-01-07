<?php 
include_once("include/forpages.php");
time_out();
defUser();
include_once("careerFntion.php");
$lang = "";
	
if ($lang == "EN")
{
include_once("ENG.php");
}
else
{
include_once("CNY.php");
}
	
global $_WORDS;


/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 */

include_once("include/session.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script language="JavaScript" src="js/admin_js.js"></script>
<link href="css/menu.css" rel="stylesheet" type="text/css" />
<link href="css/adStyle1.css" rel="stylesheet" type="text/css" />

<body>
<div class="td_top abs" align="center">
	<div style="width: 850px; margin:0em;" align="center" class="body_m">
    	<div align="left">
    	<a href="home.php"><img src="img/Logo-adminMain.png" border="0"></a>
        <div style="position:absolute; left: 850px; top:30px;">
        <?php echo $_WORDS['hi'].$_SESSION['username']; ?>&nbsp;&nbsp;
       <a class='home' href='home.php'> <?php echo $_WORDS['back_home']; ?></a>&nbsp;&nbsp;
        <?php		
		Log_out(); 
		echo "<br>";
		?>
		  </div>
        </div>   
       
		<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
     <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
	<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<?php 
/**
 * User has submitted form without errors and user's
 * account has been edited successfully.
 */
if(isset($_SESSION['useredit'])){
   unset($_SESSION['useredit']);
   echo "<p><b>$session->username</b>, your account has been successfully updated. </p>";
}
else{
?>

<?php 
/**
 * If user is not logged in, then do not display anything.
 * If user is logged in, then display the form to edit
 * account information, with the current email address
 * already in the field.
 */
if($session->logged_in){
?>

<b> <?php  
echo $_WORDS['acct_edit'];
echo $session->username; ?></b>

<form action="process.php" method="POST">
<table align="center" border="0" cellspacing="0" cellpadding="3">
<tr>
<td><?php echo $_WORDS['cur_pass']; ?></td>
<td><input type="password" name="curpass" maxlength="30" value="
<?php echo $form->value("curpass"); ?>"></td>
<td><?php  echo $form->error("curpass"); ?></td>
</tr>
<tr>
<td><?php echo $_WORDS['new_pass']; ?></td>
<td><input type="password" name="newpass" maxlength="30" value="
<?php  echo $form->value("newpass"); ?>"></td>
<td><?php  echo $form->error("newpass"); ?></td>
</tr>
<tr>
<td>Email:</td>
<td><input type="text" name="email" maxlength="50" value="
<?php 
if($form->value("email") == ""){
   echo $session->userinfo['email'];
}else{
   echo $form->value("email");
}
?>">
</td>
<td><?php  echo $form->error("email"); ?></td>
</tr>
<tr><td colspan="2" align="right">
<input type="hidden" name="subedit" value="1">
<input class="btn" type="submit" value="<?php echo $_WORDS['done']; ?>"></td></tr>
<tr><td colspan="2" align="left"></td></tr>
</table>
</form>

<?php 
}
}

?>
<img src='img/adminEver.png' border='0' align='middle' />
  <!-- Footer -->
    </div>
    <img src='img/foot_line_b.png' border='0' align='middle' />
    </div>

</body>
</html>
