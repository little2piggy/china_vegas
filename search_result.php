<?php
	$days = get_days();
	$days = count($days)-1;
	$_SESSION['days'] = $days;
	$row = get_htl($htl_id);
	$_SESSION['ht_name'] = $row[0]['ht_name'];
	$_SESSION['rule'] = $row[0]['rule'];
?>
<div style="float:left; margin-left: 20px; margin-top: 20px;"><h3><?php  echo $_SESSION['ht_name'];	?></h3></div>
<div style="float:right; margin-right:20px;">
	<table><tr><td><b><?php echo $_WDS['checkin_ttl']; ?>:</b></td><td><?php echo $_SESSION['checkin']; ?></td></tr>
    	   <tr><td><b><?php echo $_WDS['checkout_ttl']; ?>:</b></td>
           <td><?php echo $_SESSION['checkout']; ?>&nbsp;(&nbsp;<?php echo $_SESSION['days']."&nbsp;".$_WDS['night']; ?>&nbsp;)</td></tr>
           <tr><td><b><?php echo $_WDS['room_ttl']; ?>:</b></td><td><?php echo $_SESSION['rooms']; ?></td></tr>
           <?php
		   if ($_SESSION['item_name'] <> "" || $_SESSION['item_name'] <> NULL)
		   {
		   ?>
           <tr><td><b><?php echo $_WDS['room_type']; ?>:</b></td><td><?php echo $_SESSION['item_name']; ?></td></tr>
           <?php
		   }
		   ?>
           <?php
		   if ($_SESSION['price'] <> "" || $_SESSION['price'] <> NULL)
		   {
			   $amount = $_SESSION['price']*$days*$_SESSION['rooms'];
		   ?>
           <tr><td><b><?php echo $_WDS['amount']; ?>:</b></td><td><?php echo $amount; ?></td></tr>
           <?php
		   }
		   ?>
    </table>
</div>
