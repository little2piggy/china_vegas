<?php
include_once("include/myDB.php");

$a = new sqlDrv();
$sql="SELECT username FROM users_fe order by timestamp desc";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result))
{
	echo "<option value='".$row['username']."'>".$row['username']."</option>";

}
mysql_close($con);

?>