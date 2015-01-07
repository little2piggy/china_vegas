<div style="height:280px;">
<div class="menuitem_2"><div class="menu_link"><a class="menu" href="index.php"><?php echo $_WDS['home_ttl']; ?></a></div></div>
<div class="menuitem_2"><div class="menu_link"><a id='intro' 
    <?php 
	if($page=="nbxes1")   echo "class='menu_v' ";
	else  echo "class='menu' ";
    ?>   
    href="#"><?php echo $_WDS['intro_ttl']; ?></a></div></div>
    <p id="intro_dtl" class="sub_menu"
     <?php 
	 if($page=="nbxes1"){
     	echo "style='display:block;'";
	}
     ?>
     >
        <a class="menu2" href="javascript:showtheone('nbxes1');"><?php echo $_WDS['msg_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes2');"><?php echo $_WDS['team_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes3');"><?php echo $_WDS['culture_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes4');"><?php echo $_WDS['objt_ttl']; ?></a><br />&nbsp;<br />
      </p>
 <div class="menuitem_2"><div class="menu_link"><a id='exper' 
    <?php 
	if($page=="nbxes9")   echo "class='menu_v' ";
	else  echo "class='menu' ";
    ?>     
    href="javascript:showtheone('nbxes9');"><?php echo $_WDS['expertise_ttl']; ?></a></div></div>
<div class="menuitem_2"><div class="menu_link"><a id='portf' 
    <?php 
	if($page=="nbxes5")   echo "class='menu_v' ";
	else  echo "class='menu' ";
    ?> 
     href="#"><?php echo $_WDS['portfolio_ttl']; ?></a></div></div>
    <p id="porft_dtl" class="sub_menu"
    <?php 
	 if($page=="nbxes5"){
     	echo "style='display:block;'";
	}
     ?>
    >
        <a class="menu2" href="javascript:showtheone('nbxes5');"><?php echo $_WDS['triump_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes6');"><?php echo $_WDS['grand_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes7');"><?php echo $_WDS['leisure_ttl']; ?></a><br />&nbsp;<br />
        <a class="menu2" href="javascript:showtheone('nbxes8');"><?php echo $_WDS['jian_ttl']; ?></a><br />&nbsp;<br />
      </p>
</div>
<div class="wedr"><?php include_once("sub/weder.php"); ?></div>
<script type="text/javascript">
    $(".menu2").click(function () {
		$(".menu2").css("color","#3e3e29");
		$(this).css("color","#666");
	});
    $("#intro").click(function () {
	  $(this).css("color","#3e3e29");
	  $("#portf, #exper").css("color","#fff");
      $("#intro_dtl").slideToggle("slow");
	  $("#porft_dtl,#exper_dtl").slideUp("slow");
    });
	$("#portf").click(function () { 
	  $(this).css("color","#3e3e29");
	  $("#intro, #exper").css("color","#fff");
      $("#porft_dtl").slideToggle("slow");
	  $("#intro_dtl,#exper_dtl").slideUp("slow");
    });
	$("#exper").click(function () {
	  $(this).css("color","#3e3e29");
	  $("#intro, #portf").css("color","#fff");
	  $("#porft_dtl,#intro_dtl").slideUp("slow");
    });
</script>