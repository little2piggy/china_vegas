<table><tr><td>
<form id="admin_act" name="admin_act" method="post">
Select a Customer:
<select name="customers" onchange="showUser(this.value)">
<?php include_once("../pickuser.php"); ?>
</select>
</form>

<div id="txtHint"></div>
</td></tr></table>