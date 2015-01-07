<?php
include_once("bookfntion.php");
unset($_SESSION['amount']);
unset($_SESSION['item_name']);
$room = display_room();
if($room == NULL || $room == "")
{
	$page = 20;
}
else if($_REQUEST['htl_id']){
	$page = 21;
}
?>

<div style="float:right; margin-left: 30px; width:550px;">
  <div id='intro_htl' style=" <?php if($page == 20){ echo "display: block;";} else{ echo "display: none;";} ?>"><br />
  	<?php
    	//echo "page: ".$page;
		include_once("htl_intro.php");
	?>
  </div>
   <div id='reserve' style=" <?php if($page == 21){ echo "display: block;";} else{ echo "display: none;";} ?> ">
   <?php
   		//print_r(array_sort($room, 'regular', SORT_DESC));
		include_once("room_book.php");
		?>
   </div>
</div>