<?php
session_start(); 
include_once("include/database.php");
include_once("login.php");

/**
 * Delete cookies - the time must be in the past,
 * so just negate what you added when creating the
 * cookie.
 */
if(isset($_COOKIE['cookname']) || isset($_COOKIE['cookpass'])){
   setcookie("cookname", "", time()-60*60*24*100, "/");
  // setcookie("cookpass", "", time()-60*60*24*1, "/");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/adStyle1.css" rel="stylesheet" type="text/css" />

</head>

<body>
<?php

   /* Kill session variables */
   unset($_SESSION['username']);
   unset($_SESSION['password']);
   $_SESSION = array(); // reset session array
   session_destroy();   // destroy session.

   echo "<table align='center' border='0'><tr><td>";
   echo "You have successfully logged out. Back to <a href=\"home.php\">main</a></td></tr></table>";


?>

</body>
</html>
