<div class="menuitem">
	<div class="menu_link"><a class="menu" href="index.php"><?php echo $_WDS['home_ttl']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div class="menuitem">
	<div class="menu_link"><a class="menu" 
    href="intro.php?lang=<?php echo $_SESSION['lang']."&which_page=nbxes1";?>"><?php echo $_WDS['intro_ttl']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div class="menuitem">
	<div class="menu_link"><a class="menu" 
    href="intro.php?lang=<?php echo $_SESSION['lang']."&which_page=nbxes9";?>"><?php echo $_WDS['expertise_ttl']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div class="menuitem">
<div class="menu_link"><a class="menu" 
    href="intro.php?lang=<?php echo $_SESSION['lang']."&which_page=nbxes5";?>"><?php echo $_WDS['portfolio_ttl']; ?></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</div>
<div align="center">
<div class="so_ttl" style="margin-top:60px;">
	<div class="so_ttl_text 
    	<?php 
			if($_SESSION['lang'] == "EN") echo " so_ttl_EN"; 
			else echo " so_ttl_CN";
		?>
        ">
        <a class="so_ttl_l" href="special.php?lang=<?php echo $_SESSION['lang'];?>"><?php echo $_WDS['so_ttl']; ?></a>
    </div>
</div>
	<p>&nbsp;</p>
	<div style="margin-left: 15px"><?php include_once("rest_left.php"); ?></div>
</div>
