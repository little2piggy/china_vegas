<?php
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
$q=$_REQUEST["q"];

include_once("sql_con.php");

$con = sql_con();

$sql="SELECT * FROM admin_activity_log WHERE admin_id = '".$q."' order by access_day desc";

$result = mysql_query($sql);

echo "<table border='1'>
<tr>
<th>".$_WORDS['user_date']."</th>
<th>".$_WORDS['username']."</th>
<th>".$_WORDS['amin_act']."</th>
<th>IP</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['access_day'] . "</td>";
  echo "<td>" . $row['admin_id'] . "</td>";
  echo "<td>" . $row['page_update'] . "</td>";
  echo "<td>" . $row['ip_address'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

mysql_close($con);
?>