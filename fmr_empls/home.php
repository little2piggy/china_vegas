<?php 
session_start(); 
include_once("include/forpages.php");
time_out();
include_once("include/session.php");
   $lang = "CN";
	$_SESSION['lang'] = $lang;
	
	if ($lang == "EN")
	{
	include_once("ENG.php");
	}
	else
	{
	include_once("CNY.php");
	}
	global $_WORDS;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $_WORDS['hm_ttl']; ?></title>
<script language="JavaScript" src="js/admin_js.js"></script>
<script language="JavaScript" src="js/selectuser.js"></script>
<link href="css/adStyle1.css" rel="stylesheet" type="text/css" />
<?php include_once("pre_header.php"); ?>
</head>
<body>
<div class="td_top abs" align="center">
	<div style="width: 850px; margin:0em;" align="center" class="body_m">
    	<div align="left">
    	<a href="home.php"><img src="img/Logo-adminMain.png" border="0"></a>
            <div style="position:absolute; width: 850px; top:50px;" align="center">
           
           <?php
                if($session->logged_in){}
                else{ 
                    echo "<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><h3>".$_WORDS['welcome']."</h3>"; 
                }
            ?>
            </div>
        </div>
        <div></div>
<?php 
/**
 * User has already logged in, so display relavent links, including
 * a link to the admin center if the user is an administrator.
 */
if($session->logged_in){
   echo "&nbsp;<br><table align='center' width='90%' border='0' ><tr><td align='left'>";
   echo $_WORDS['hi']." $session->username! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"
       ."[<a class='home' href=\"useredit.php\">".$_WORDS['edit_acct']."</a>] &nbsp;&nbsp;";
   echo "</td><td align='right'>";
   echo "[<a class='home' href=\"process.php\">".$_WORDS['logout']."</a>]";
   echo "</td></tr></table>";
   ?>
   <div align="center" class="home_main">
   <?php 
   //ADD: LIST of EMP  Ever Design
   echo "<span class=\"homeTitle\">".$_WORDS['hm_ttl']."</span><br>&nbsp;<br>";
   include_once("home_main.php");
   //END:
   ?>
   </div>
   <?php
   if($session->isAdmin()){
	  include_once("admin/admin.php");
	  echo "<p align='center'><b>".$_WORDS['Register_new']."</b>";
	  include_once("register.php");
	  echo "</p>";
   }
   
}
else{
?>
<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<form action="process.php" method="POST" AUTOCOMPLETE="OFF">
<table align="center" border="0" cellspacing="0" cellpadding="3" height="180px">
<tr valign="middle"><td colspan="2" align="center">
<b><?php echo $_WORDS['login']; ?></b></td></tr>
<tr><td align="right"><?php echo $_WORDS['username']; ?>: </td>
<td align="left"><input type="text" name="user" maxlength="30" value="<?php  echo $form->value("user"); ?>"></td>
<td><?php  echo $form->error("user"); ?></td></tr>
<tr><td align="right"><?php echo $_WORDS['pass']; ?>: </td>
<td align="left"><input type="password" name="pass" maxlength="30" value="<?php  echo $form->value("pass"); ?>"></td>
<td><?php  echo $form->error("pass"); ?></td></tr>
<tr><td colspan="2" align="center">
<input type="hidden" name="sublogin" value="1">
<br />
<input type="image"  src="img/cn_btn_login.png" id="getrates" tabindex="6" onMouseOver="mouseOver('getrates','img/cn_btn_clk_login.png');" onMouseOut="mouseOut('getrates','img/cn_btn_login.png');" value="submit">

</td></tr>

</table>
</form>

</td></tr>
<tr><td align="center">
</td></tr>
<tr><td valign="bottom" align="center">

<?php 
}

/**
 * Just a little page footer, tells how many registered members
 * there are, how many users currently logged in and viewing site,
 * and how many guests viewing site. Active users are displayed,
 * with link to their user information.
 */
 if($session->isAdmin()){
	echo "<p><b>".$_WORDS['member_ttl']."</b>: ".$database->getNumMembers()."</p><p>";
	echo $_WORDS['there_are']." $database->num_active_users";	
	include_once("include/view_active.php");
	?>
    </p><p>
    <b><?php echo $_WORDS['amin_act'];?></b><div id="txtHint"></div>
       <form id="admin_act" name="admin_act">
        <?php echo $_WORDS['pick_user']; ?>&nbsp;
        <select name="customers" onchange="showUser(this.value)">
        	<option value=""></option>
        	<?php include_once("pickuser.php");?>
        </select>
        </form>
  
    <?php
 }
 else{
	 ?>
<img src='img/adminEver.png' border='0' align='middle' />
    <?php
 }
?>
</div>
<img src='img/foot_line_b.png' border='0' align='middle' />
</div>
  </p>
</body>
</html>
