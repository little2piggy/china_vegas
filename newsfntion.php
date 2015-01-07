<?php
function get_news(){
	global $_WDS;
	$numlg = num_lang();
	$a = new sqlDrv();
	$gc = "";	
	$q = "SELECT * FROM news WHERE active=1 AND lang_id = $numlg order by importance desc, news_date desc";
	$result = mysql_query($q);
	if(!$result) {return;}
	$num_rows = mysql_num_rows($result);
	if($num_rows==0) return;
	while($r = mysql_fetch_array($result)){
		if($r['nw_name'] <> "" || $r['nw_name'] <> NULL){
			$gc .= "<div class='links_news' id='link_news".$r['news_id']."' 
				onmouseover=\"document.getElementById(this.id).style.cursor='pointer';\" 
				onclick=\"$('.cnews').hide(1000); $('#cnews".$r['news_id']."').show(); \">&#9733;&nbsp;".$r['nw_name'];
			if($r['news_date'] <> "" || $r['news_date'] <> NULL){
				$gc .= "&nbsp;(&nbsp;".$r['news_date']."&nbsp;)";
			}
			$gc .= "</div>";
			$gc .= "<div class='cnews' id='cnews".$r['news_id']."'><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$r['nw_desc'];
			$gc .= "</div><br>&nbsp;<br>";
		}
	}
	return $gc;
}
?>
