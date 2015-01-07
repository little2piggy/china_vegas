<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<div>
	<?php include_once("rest_left.php"); ?>
</div>
<div class="so_ttl2">
	<div class="so_ttl_text 
    	<?php 
			if($_SESSION['lang'] == "EN") echo " so_ttl_EN2"; 
			else echo " so_ttl_CN2";
		?>
        ">
        <a class="so_ttl_l" href="special.php?lang=<?php echo $_SESSION['lang'];?>"><?php echo $_WDS['so_ttl']; ?></a>
    </div>
</div>