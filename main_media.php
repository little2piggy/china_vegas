<?php include_once("newsfntion.php"); ?>

<div id="news_dtl" class="btm_ttl">
	<b><?php echo $_WDS['news_ttl']; ?></b>
	<div class="my_pages career_margin">
    	<?php
        $gn = get_news();
		if( $gn == ""){
		 echo $_WDS['come_soon'];
		}else{
			echo $gn;
		}
		?>
     </div>
</div>

<div id="publ_dtl" class="btm_ttl">
	<b><?php echo $_WDS['media_pub_ttl']; ?></b>
	<div class="my_pages career_margin">
		<?php echo $_WDS['media_main']; ?><br />
        <?php echo $_WDS['come_soon']; ?>
    </div>
</div>

