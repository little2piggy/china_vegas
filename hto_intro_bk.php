<?php 
include_once("htlfntion.php");
	$hotel_id = $_SESSION['htl_id'];
	$htl = get_htl($hotel_id);
?> 
    <div class="tabs" style="width:550px; clear:both">
	<ul>
		<li><a href="#tabs-1"><?php echo $_WDS['addr_ttl'];?></a></li>
		<li><a href="#tabs-2"><?php  echo $_WDS['amenity_ttl'];?></a></li>
		<li><a href="#tabs-3"><?php echo $_WDS['pix_ttl'] ?></a></li>
	</ul>
	<div id="tabs-1" class="htl_info_b">
		<?php
		echo $htl[0]['ht_addr1']."<br>".$htl[0]['ht_addr2'].$htl[0]['zip']."<br>";
		echo $_WDS['phone'].":&nbsp;".$htl[0]['phone']."<br>";
		echo $_WDS['fax'].":&nbsp;".$htl[0]['fax']."<br>";
		?>
	</div>
	<div id="tabs-2" class="htl_info_b">
		<?php echo $htl[0]['ht_desc']; ?>
	</div>
	<div id="tabs-3">
		Coming Soon...
	</div>
</div>

<script type="text/javascript">
	$(function() {
		$( ".tabs" ).tabs();
	});
	</script>

