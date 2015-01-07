<?php 
	include_once("include/forpages.php");
	time_out();
	include_once("include/session.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
<link href="css/adStyle1.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table border="1" align="center" width="850">
<tr>
<td align="center"><b>Register a New User</b>
<?php
//add - use register.php
include_once("register.php");

?>
</td>
</tr>
<tr>
<td>

<?php
//edit user level - delete user
//include_once("admin_php.php");
//echo get_users();
include_once("admin/admin.php");
?>


</td>
</tr>
</table>
</body>
</html>