<?php

function get_career($position_cat){
	global $_WDS;
	$i=0;
	$numlg = num_lang();
	$a = new sqlDrv();
	if ($numlg == 2)
	{
		$_WDS = $a->get_english();
	}
	else
	{
		$_WDS = $a->get_chinese();
	}
	$gc = "";
	
	$q = "SELECT * FROM career WHERE position_cat=$position_cat AND lang_id = $numlg AND active=1 order by CONVERT(position USING gbk), career_id";
	//echo $q."<br>";
	$result = mysql_query($q);
	if(!$result) {return;}
	$num_rows = mysql_num_rows($result);
	if($num_rows==0) return;
	while($r = mysql_fetch_array($result)){
		$i = $i+1;
		$gc .= "<br>&nbsp;<br>";
		$gc .= "<b>".$r['position']."</b><br>";
		$gc .= "<span>".$_WDS['loc_ttl'].":&nbsp;</span><span class='career_info'>";
		if($r['location']==""){
			$gc .= $_WDS['none'];
		}else{
			$gc .= $r['location'];
		}
		$gc .= "</span><br><span>".$_WDS['edu_ttl'].":&nbsp;</span><span class='career_info'>".$r['education']."</span>";
		$gc .= "<br><span>".$_WDS['req_ttl'].":&nbsp;</span><div class='career_info'>".$r['requirement']."</div>";
		$gc .= "<br><span>".$_WDS['note'].":&nbsp;</span><br><div class='career_info'>".$r['note'];
		$gc .= "</div><br><span>".$_WDS['emp_ttl'].":&nbsp;</span><span class='career_info'>".$r['emps']."</span>";
		if($i>0 && $i<$num_rows){
			$gc .= "<div class='room_div'>&nbsp;</div>";
		}
		
	}
	return $gc;
}
?>