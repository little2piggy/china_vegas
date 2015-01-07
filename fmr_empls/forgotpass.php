<?php 

include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Triumphal View Hotel</title>

<script language="JavaScript" src="common_js.js"></script>
<link href="style1.css" rel="stylesheet" type="text/css" />
<?php include_once("fav_icon.php"); ?>
</head>
<body class="style1">
<table cellpadding="0" cellspacing="0" border="0" align="center">
	<tr>
    	<td class="td_left" align="right" valign="top"><img src="pix/left_bar.jpg" border="0" /></td>
        <td class="td_main" width="849" valign="top" align="center">
        	<table border="0" cellpadding="0" cellspacing="0" width="849">
            	<tr><td width="100%" align="left" colspan="2"><?php include_once("pre_header.php"); ?></td></tr>
            	<tr><td class="td_head" colspan="2"><?php include_once("header.php"); ?></td></tr>
				<tr><td width="211" align="center" valign="top" class="td_m_left">
                <table width="211" cellpadding="0" cellspacing="0"><tr><td height="300" valign="top" colspan="2">
				<?php include_once("reservation_left.php"); ?></td></tr>
                <tr><td width="15px">&nbsp;&nbsp;&nbsp;</td>
                <td class="my_letters" align="left">
                <img src="pix/left_bullet.gif" border="0" />&nbsp;&nbsp;<b><?php echo $_WDS['btn_about']; ?>  </b>   
                 &nbsp;<br />  
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 <a id="myHeader2" class="left" href="javascript:showonlyone('newboxes2');" ><?php echo $_WDS['map']; ?></a>
                <br /> 
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a id="myHeader3" class="left" href="javascript:showonlyone('newboxes3');" ><?php echo $_WDS['info_tourism']; ?> </a></td></tr></table></td>
                	<td align="left" width="638" bgcolor="#FFFFFF"> 
                  

<?php  //start
/**
 * Forgot Password form has been submitted and no errors
 * were found with the form (the username is in the database)
 */
if(isset($_SESSION['forgotpass'])){
   /**
    * New password was generated for user and sent to user's
    * email address.
    */
   if($_SESSION['forgotpass']){
      echo "<h1>New Password Generated</h1>";
      echo "<p>Your new password has been generated "
          ."and sent to the email <br>associated with your account. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
   /**
    * Email could not be sent, therefore password was not
    * edited in the database.
    */
   else{
      echo "<h1>New Password Failure</h1>";
      echo "<p>There was an error sending you the "
          ."email with the new password,<br> so your password has not been changed. "
          ."<a href=\"main.php\">Main</a>.</p>";
   }
       
   unset($_SESSION['forgotpass']);
}
else{

/**
 * Forgot password form is displayed, if error found
 * it is displayed.
 */
?>

<h1>Forgot Password</h1>
A new password will be generated for you and sent to the email address<br>
associated with your account, all you have to do is enter your
username.<br><br>
<?php  echo $form->error("user"); ?>
<form action="process.php" method="POST">
<b>Username:</b> <input type="text" name="user" maxlength="30" value="<?php  echo $form->value("user"); ?>">
<input type="hidden" name="subforgot" value="1">
<input type="submit" value="Get New Password">
</form>

<?php 
}

//end
?>

</td>
                </tr>
           	 </table>
        </td>
    	<td class="td_right" align="left" valign="top"><img src="pix/right_bar.jpg" border="0" /></td>
       </tr>
    	<tr>
        	<td></td>
            <td width="849" class="bg_footer" align="center"><p><?php include_once ("footer.html"); ?>
            &nbsp;</p></td>
            <td></td>
        </tr>
</table>

</body></html>
