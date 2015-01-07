<?php 
include_once("htlfntion.php");
include_once("include/common.php");
include_once("process.php");
//echo "&&".$pc_rate."@@".$_SESSION['user']."**".$_SESSION['pc_rate'];
$in = true;
if( $_SESSION['user'] <> "" && $_SESSION['pass']<> "" ){
	global $process; 
	$process = new Process();
	$in=$process->procLogin($_SESSION['user'], $_SESSION['pass']);
	if( $in == true){
		//check what membership you belong to 
		$pc_rate = confirm_card_holders( $_SESSION['user'],$_SESSION['pc_rate'] );
		if($pc_rate == false){
			$in = false;
		}
		else{
			$_SESSION['price_category']=$pc_rate;
		}
	}
}
$room = array_sort($room, 'discount', SORT_ASC);
$htl_id = $_SESSION['htl_id'];	 
?>
    
<table width="100%" cellpadding="0" cellspacing="0" class="htl_b">
<tr height="50px">
<td colspan="3" style="font-size:90%;">
	<?php
	//check log in
	if ( $in == false && $_SESSION['user'] <> "" && $_SESSION['pass']<> "" ){
	?>
		<div class="special_b check_out" style="font-size: 95%"><?php echo $_WDS['err_login']; ?></div>
	<?php
	}
	else{
		//login is correct
	}
	include_once("search_result.php"); 
	include_once("hto_intro_bk.php");
	?>
</td>
</tr>
<form action='check_out.php' method='post' name="checkout" id="checkout">
<?php
for($i=0; $i<count($room); $i++)
{
	if ($room[$i]['regular']<>99999999){
		$item_name = $room[$i]['name']
?> 
    <tr height="70px" valign="bottom"><td>
        &nbsp;&nbsp;<?php echo $item_name; ?> 
    </td>
    <td>
    <?php
	
    if($room[$i]['discount']>0 && $room[$i]['discount']<> 99999999){
		$price = $room[$i]['discount'];
			echo "<span class='gone_b'>&#165;".$room[$i]['regular']."/".$_WDS['night']."</span><br>";
			echo "<span class='special_b'>&#165;".$price."/".$_WDS['night']."</span>&nbsp;&nbsp;";
		}
		else {
			$price = $room[$i]['regular'];
			echo "<span>&#165;".$price."/".$_WDS['night']."</span>"; 
		}
       ?> 
    </td>
    <td align="right">
       <input type='image' src='<?php echo $_WDS['btn_book']; ?>' id='$htl_id' name='$htl_id' width='39' height='17' 
        onclick="sendValue('<?php echo $price; ?>', '<?php echo $item_name; ?>','price','item_name');" value='submit'>&nbsp;&nbsp;
    </td>
    </tr>
 
<?php
	}
} //end for($i=0; $i<count($room); $i++)
?> 
       <input type="hidden" id="chkin" name="chkin" value="<?php echo $_SESSION['checkin'];?>" />
       <input type="hidden" id="chkout" name="chkout" value="<?php echo  $_SESSION['checkout'];?>" />
       <input type="hidden" id="adult" name="adult" value="<?php echo $_SESSION['adults'];?>" />
       <input type="hidden" id="children" name="children" value="<?php echo $_SESSION['children'];?>" />
       <input type="hidden" id="night" name="night" value="<?php echo  $days;?>" />
       <input type="hidden" id="rooms" name="rooms" value="<?php echo $_SESSION['rooms'];?>" />
       <input type="hidden" id="price" name="price" value="" />
       <input type="hidden" id="item_name" name="item_name" value="" />
       <input type="hidden" id="ht_name" name="ht_name" value="<?php echo $r; ?>" />
   
	</form>
</table> 
  
<p>&nbsp;</p>
<script type="text/JavaScript">
	function sendValue(ne,rp,aid,bid)
	{
		document.getElementById(aid).value =ne;
		document.getElementById(bid).value =rp;
	}
</script>