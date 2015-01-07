<?php
include_once("bookfntion.php");
unset($_SESSION['amount']);
unset($_SESSION['item_name']);
if(isset($_REQUEST['acct_id']) ){
	$_SESSION['acct_id']=$_REQUEST['acct_id'];
}
if(isset($_REQUEST['book_id']) ){
	$canned = cancel_booking($_REQUEST['book_id']);		
}
$gb = true;
$gb = get_booking($_SESSION['acct_id']);
?>
<div style="float:right; margin-left: 30px; width:550px; margin-top: 30px; height:350px; margin-bottom: 30px;">
	<?php
	if($canned == $_REQUEST['book_id'] && $canned <> ""){
		echo $_WDS['txt_cancel'];	
		unset($_REQUEST['book_id']); 
	}
	else if($gb == false && $_SESSION['acct_id']<>""){
		echo $_WDS['conf_no'].$_WDS['txt_incorrect'];
		unset($_SESSION['acct_id']);
	}
	else if( count($gb) == 3 ){
		echo "<p>".$_WDS['txt_acct']."</p><p><b>";
		echo $gb['products'].":</b><br />";
		echo $_WDS['checkin_ttl'].":&nbsp;&nbsp;".$gb['check_in']."&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;";
		echo $_WDS['checkout_ttl'].":&nbsp;&nbsp;".$gb['check_out'];
		?>
        <form id="cl_booking" name="cl_booking" action="" method="post">
        <input type="hidden" id="book_id" name="book_id" value="<?php echo $_SESSION['acct_id']; ?>" />
        <div class="sub_btn" style="position: relative; margin-right: 10px;">
        	<a href="#" class="menu" onclick="submit_cancel_booking();"><?php echo $_WDS['cancel']; ?></a>
        </div>
        </form>
        <?php
		echo "</p>";
		unset($_SESSION['acct_id']);
	}
	else{
	?>
  	<form action="your_account.php" method="post" name="acct" id="acct">
    	<table><tr valign="top">
    	<td><?php echo $_WDS['conf_no']; ?>:</td><td><input class="box" type="text" value="" name="acct_id" id="acct_id"  />
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="image" src="<?php echo $_WDS['btn_done']; ?>" id="btnsent"
    onMouseOver="mouseOver('btnsent','<?php echo $_WDS['btn_clk_done'];?>');" 
     onMouseOut="mouseOut('btnsent','<?php echo $_WDS['btn_done']; ?>');" value="Submit" />
 	</td></tr></table>
    </form>
   <?php
	} //End Else
	?>
</div>