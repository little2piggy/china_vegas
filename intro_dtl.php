<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
<script type="text/javascript">
	$('.round_edge').corner("round 15px");
</script>
<div name='nbxes' id='nbxes1' style='
<?php if($page == "nbxes1") echo "display: block;";
		else echo "display: none;";?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['msg_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['msg']; ?></p>
</div>
<div name='nbxes' id='nbxes2' style='
<?php if($page == "nbxes2") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['team_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo get_team(); ?></p>
</div>
<div name='nbxes' id='nbxes3' style='
<?php if($page == "nbxes3") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['culture_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['culture']; ?></p>
</div>

<div name='nbxes' id='nbxes4' style='
<?php if($page == "nbxes4") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['objt_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['objt']; ?></p>
</div>

<div name='nbxes' id='nbxes5' style='
<?php if($page == "nbxes5") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['triump_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['triump']; ?></p>
     <p><b><?php echo $_WDS['room_info_ttl']; ?></b></p>
     <p><?php echo $_WDS['triump_room']; ?></p>
    		<div class="hotel_site"><a class="hotelsite" target="_blank" href="http://www.triumphal-view-hotel.com?lang=<?php echo $lang; ?>"><?php echo $_WDS['hotel_site']; ?></a>
      </div>
</div>

<div name='nbxes' id='nbxes6' style='
<?php if($page == "nbxes6") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['grand_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['grand']; ?></p>
     <p><b><?php echo $_WDS['room_info_ttl']; ?></b></p>
     <p><?php echo $_WDS['grand_room']; ?></p>
    <div class="hotel_site"><a class="hotelsite" target="_blank" href="http://www.grand-view-hotel.com?lang=<?php echo $lang; ?>"><?php echo $_WDS['hotel_site']; ?></a>
      </div>
</div>

<div name='nbxes' id='nbxes7' style='
<?php if($page == "nbxes7") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['leisure_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['leisure']; ?></p>
     <p><b><?php echo $_WDS['room_info_ttl']; ?></b></p>
     <p><?php echo $_WDS['leisure_room']; ?></p>
    <div class="hotel_site"><a class="hotelsite" target="_blank" href="http://www.leisurehotel.cn?lang=<?php echo $lang; ?>"><?php echo $_WDS['hotel_site']; ?></a>
      </div>
</div>

<div name='nbxes' id='nbxes8' style='
<?php if($page == "nbxes8") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['jian_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['jian']; ?></p>
</div>

<div name='nbxes' id='nbxes9' style='
<?php if($page == "nbxes9") echo "display: block;";
		else echo "display: none;"; ?>' class="msg">
	<h3><p align="center"><?php echo $_WDS['brand_ttl']; ?></p></h3><p>&nbsp;</p>
     <p><?php echo $_WDS['brand']; ?></p>
</div>
<?php
function get_team(){
	$i = 0;
	$numlg = num_lang();
	$q = "SELECT * FROM mgt WHERE lang_id = $numlg order by mgt_id";
	$result = mysql_query($q);
	if(!$result) {return;}
	$num_rows = mysql_num_rows($result);
	if($num_rows==0) return;
	while($r = mysql_fetch_array($result)){
		$gc .= "<div class='round_edge'><table><tr><td>";
		if($r['img']=="" || $r['img'] == NULL){}
		else{
			$gc .= "<img src='".$r['img']."' border='0' />";
		}
		$gc .="</td><td>";
		$gc .= $r['mg_name']."&nbsp;-&nbsp;".$r['mg_ttl'];
		$gc .= "</td></tr></table></div>";
		$gc .= "<br><div class='room_div'>&nbsp;</div><br>";
	}//END while
	return $gc;
}
?>

