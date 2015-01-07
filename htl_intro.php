<script type="text/JavaScript" src="js/gen_js.js"></script>
<?php 
include_once("htlfntion.php");
include_once("bookfntion.php"); 

if ( $page <> 20){
	$hotel_id = $_SESSION['htl_id'];
	$htl = get_hotels($_REQUEST['city_id']);
}
else{
	$htl = get_hotels($_REQUEST['city_id']);
}
?>
<script type="text/javascript">
	$(function() {
		$( ".tabs" ).tabs();
	});
</script>
<div class="special_b" align="center" style="margin-bottom: 10px;"><?php echo $_WDS['rest_filled']; ?></div>

<?php
//print_r($htl);
for($i=0; $i<count($htl); $i++)
{
?> 

<table class="htl_b"><tr><td>
    <div class="htl_ttl_b">
        &nbsp;&nbsp;<b><?php echo $htl[$i]['ht_name']; ?></b>
    </div>
    <div class="htl_info_b" style="margin:15px; height:30px;">
    	<div style="float:left;">
    	<?php
		if($htl[$i]['rating'] <> 0)
			echo $htl[$i]['rating']."&nbsp;".$_WDS['rating'];
		?>
    	</div>
      
        <div style="float:right;">
            <?php
                $sp = room_special($htl[$i]['hotel_id'], 2);
                $speical = $sp['price'];
                $re = room_special($htl[$i]['hotel_id'], 1);
                $regular = $re['price'];
                if ($speical > 0){
                ?>
                    <span style="vertical-align:text-top;" class="gone_b">&#165;<?php echo $regular."/". $_WDS['night']; ?></span><br />
                    <span style="vertical-align:text-top;" class="special_b"><a class="special_b" href="#" onclick="return submit_htl('<?php echo $htl[$i]['hotel_id']; ?>');">&#165;<?php echo $speical."/". $_WDS['night']; ?></a></span>
             <?php
                }
                else if($regular > 0){
            ?>
                    <span style="vertical-align:text-top;"><a class="regular_b" href="#" onclick="return submit_htl('<?php echo $htl[$i]['hotel_id']; ?>');">&#165;<?php echo $regular."/". $_WDS['night']; ?></a></span>
             <?php }?>
         </div>
         
    </div>
    <div class="tabs">
	<ul>
		<li><a href="#tabs-1<?php echo $htl[$i]['hotel_id']?>"><?php echo $_WDS['addr_ttl'];?></a></li>
		<li><a href="#tabs-2<?php echo $htl[$i]['hotel_id']?>"><?php  echo $_WDS['amenity_ttl'];?></a></li>
		<li><a href="#tabs-3<?php echo $htl[$i]['hotel_id']?>"><?php echo $_WDS['pix_ttl'] ?></a></li>
	</ul>
	<div id="tabs-1<?php echo $htl[$i]['hotel_id']?>" class="htl_info_b">
		<?php
		echo $htl[$i]['ht_addr1']."<br>".$htl[$i]['ht_addr2'].$htl[$i]['zip']."<br>";
		echo $_WDS['phone'].":&nbsp;".$htl[$i]['phone']."<br>";
		echo $_WDS['fax'].":&nbsp;".$htl[$i]['fax']."<br>";
		?>
	</div>
	<div id="tabs-2<?php echo $htl[$i]['hotel_id']?>">
		<?php echo $htl[$i]['ht_desc']; ?>
	</div>
	<div id="tabs-3<?php echo $htl[$i]['hotel_id']?>">
		<?php echo $_WDS['come_soon']; ?>
	</div>
</div>

</td></tr></table>
<p>&nbsp;</p>
<?php
}//end for($i=0; $i<count($htls); $i++)
?>