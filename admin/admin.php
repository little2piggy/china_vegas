<?php 
/**
 * Admin.php
 *
 * This is the Admin Center page. Only administrators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 */
//include_once("../include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   global $_WORDS;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   ?>
   <table align="center" border="1" cellspacing="0" cellpadding="3">
   <tr><td><b> <?php echo $_WORDS['username']; ?> </b></td>
   <td><b><?php echo $_WORDS['level']; ?></b></td><td><b>Email</b></td>
   <td><b> <?php echo $_WORDS['last_act']; ?> </b></td></tr>
   <?php
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
	  //begin: update 3/18 userlevel change to chinese
	  if ($ulevel == 9)
	  {$ulevel = $_WORDS['admin']; }
	  if ($ulevel == 1)
	  {$ulevel = $_WORDS['user']; }
	  //end
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");
	  $time  = date("Y-m-d H:i:s", $time); 

      echo "<tr><td>$uname</td><td>$ulevel</td><td>$email</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
    global $_WORDS;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<table align=\"center\" border=\"1\" cellspacing=\"0\" cellpadding=\"3\">\n";
   echo "<tr><td><b>";
   echo $_WORDS['username'];
   echo "</b></td><td><b>";
   echo $_WORDS['time_banned'];
   echo "</b></td></tr>\n";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");
	  $time  = date("Y-m-d H:i:s", $time);
      echo "<tr><td>$uname</td><td>$time</td></tr>\n";
   }
   echo "</table><br>\n";
}
   
/**
 * User not an administrator, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: ./home.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<p align="center">
<font size="5" color="#ff0000">
<b>::::::::::::::::::::::::</font>
<span class="homeTitle"><?php echo $_WORDS['admin_Cen']; ?></span>
<font size="5" color="#ff0000">::::::::::::::::::::::::</b></font>
</p>
<?php 
if($form->num_errors > 0){
   echo "<font color=\"#ff0000\"><b>"
       ."!*** Error with request, please fix</font></b><br><br>";
}
?>
<table align="center" border="0" cellspacing="5" cellpadding="5">
<tr><td align="center">
<?php 
/**
 * Display Users Table
 */
?>
<b><?php echo $_WORDS['Users_Contents'];?></b>
<?php 
displayUsers();
?>
</td></tr>
<tr>
<td align="center">
<br>
<?php 
/**
 * Update User Level
 */
?>
<b><?php echo $_WORDS['update_level']; ?></b>
<?php  echo $form->error("upduser"); ?>
<table>
<form action="adminprocess.php" method="POST">
<tr><td>
<?php echo $_WORDS['username']; ?>:<br>
<input type="text" name="upduser" maxlength="30" value="<?php  echo $form->value("upduser"); ?>">
</td>
<td>
<?php echo $_WORDS['level']; ?>:<br>
<select name="updlevel">
<option value="1"><?php echo $_WORDS['user']; ?>
<option value="9"><?php echo $_WORDS['admin'];?>
</select>
</td>
<td>
<br>
<input type="hidden" name="subupdlevel" value="1">
<input type="submit" value="<?php echo $_WORDS['done']; ?>">
</td></tr>
</form>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td align="center">
<?php 
/**
 * Delete User
 */
 
echo "<b>".$_WORDS['delete']."</b>";
echo $form->error("deluser"); ?>
<form action="adminprocess.php" method="POST">
<?php echo $_WORDS['username']; ?>:<br>
<input type="text" name="deluser" maxlength="30" value="<?php  echo $form->value("deluser"); ?>">
<input type="hidden" name="subdeluser" value="1">
<input type="submit" align="middle" value="<?php echo $_WORDS['done']; ?>">
</form>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td align="center"><b>
<?php 
/**
 * Delete Inactive Users
 */
 echo $_WORDS['delete_inact'];
?>
</b>
<table>
<form action="adminprocess.php" method="POST">
<tr><td><?php echo $_WORDS['days']; ?><br>
<select name="inactdays">
<option value="3">3
<option value="7">7
<option value="14">14
<option value="30">30
<option value="100">100
<option value="365">365
</select>
</td>
<td>
<br>
<input type="hidden" name="subdelinact" value="1">
<input type="submit" value="<?php echo $_WORDS['done']; ?>">
</td>
</form>
</table>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td align="center"><b>
<?php 
/**
 * Ban User
 */
 echo $_WORDS['ban'];
?>
</b>
<?php  echo $form->error("banuser"); ?>
<form action="adminprocess.php" method="POST">
<?php echo $_WORDS['username']; ?>:<br>
<input type="text" name="banuser" maxlength="30" value="<?php  echo $form->value("banuser"); ?>">
<input type="hidden" name="subbanuser" value="1">
<input type="submit" value="<?php echo $_WORDS['done']; ?>">
</form>
</td>
</tr>
<tr>
<td><hr></td>
</tr>
<tr><td align="center"><b>
<?php 
/**
 * Display Banned Users Table
 */
 echo $_WORDS['ban_contents'];
?>
</b>
<?php 
displayBannedUsers();
?>
</td></tr>
<tr>
<td><hr></td>
</tr>
<tr>
<td align="center"><b>
<?php 
/**
 * Delete Banned User
 */
 echo $_WORDS['del_ban'];
?>
</b>
<?php  echo $form->error("delbanuser"); ?>
<form action="adminprocess.php" method="POST"><?php echo $_WORDS['username']; ?>:<br>
<input type="text" name="delbanuser" maxlength="30" value="<?php  echo $form->value("delbanuser"); ?>">
<input type="hidden" name="subdelbanned" value="1">
<input type="submit" value="<?php echo $_WORDS['done'];?>">
</form>
<hr />
</td>
</tr>
<tr><td>
<?php 
//display active admin

?>
</td></tr>
</table>

<?php 
}
?>

