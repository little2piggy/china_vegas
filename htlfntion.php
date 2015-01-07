<?php
include_once("include/myDB.php");
function special_offer($htl_id, $rat_prrty){
	$i = 0;
	$a = new sqlDrv();
	if( $rat_prrty >=100 ){}
	else{
		$rat_prrty =$rat_prrty." AND special_offer.priority<100 ";
	}
	$q = "SELECT special_offer.*, pd_hotel.* FROM special_offer
			LEFT JOIN pd_hotel ON special_offer.pd_hotel_id = pd_hotel.pd_hotel_id
			WHERE special_offer.active =1 AND special_offer.priority >=$rat_prrty
			AND pd_hotel.hotel_id =$htl_id
			ORDER BY special_offer.priority DESC";
	$result = mysql_query($q);
	if(!$result) {return;}
	while($p = mysql_fetch_array($result)){
		$svcid = $p['pd_hotel_id'];
		$pd_id = $p['product_id'];

		if($pd_id == 1){
			$rs = room_special($p['hotel_id'], 2);
		}
		else { 
			$rs = non_cld_special($svcid);
		}
		
		$p['price'] = $rs['price'];
		$p['everyday'] = $rs['everyday'];
		if($p['everyday'] == "" || $p['everyday'] <> ""){
			$p['so_desc'] = offer_detail($svcid);
			$p['pd_name'] = product_name($pd_id);	
		}
		foreach ($p as $key => $value){
			if($p['price'] == "" || $p['everyday'] == "" || $p['everyday'] == NULL || $p['price'] == NULL)
			{
				break;
			}
			else{
			$r[$i][$key] = $value;
			}
		 }
		 if($p['price'] == "" || $p['everyday'] == "" || $p['everyday'] == NULL || $p['price'] == NULL)
		{
			$i--;
		}
		$i++;	
	}	
	return $r;
}
function product_name($pd_id){
	$lg = num_lang();
	$a = new sqlDrv();
	$q = "SELECT pd_name FROM product_dtl WHERE product_id=$pd_id AND lang_id = $lg";
	//echo $q."<br>";
	$result = mysql_query($q);
	while($p = mysql_fetch_array($result)){
		return $p['pd_name'];
	}
}
function offer_detail($svcid){
	$lg = num_lang();
	$a = new sqlDrv();
	$q = "SELECT so_desc FROM special_offer_dtl WHERE pd_hotel_id=$svcid AND lang_id = $lg";
	//echo $q."<br>";
	$result = mysql_query($q);
	while($p = mysql_fetch_array($result)){
		return $p['so_desc'];
	}
}
function non_cld_special($svcid){
	$i = 0;
	$a = new sqlDrv();
	$q = "select MIN(price.price) as price , MAX(everyday) as everyday  from price
			where price.everyday>=curdate() and price.pc_id = 2 
			AND price.pd_hotel_id=$svcid AND price.active = 1";
	//echo $q;
	$result = mysql_query($q);
	if(!$result) { return;	}
	while($p = mysql_fetch_array($result)){
		return $p;
	}
}

function room_special($htl_id, $pc=NULL)
{
	$c = "";
	if($pc == NULL){}
	else{
		$c = " and price.pc_id = $pc";
	}
	$a = new sqlDrv();
	$q = "select price.price, price.everyday as everyday, pd_hotel.*, product.* FROM `price` 
		Left join pd_hotel on pd_hotel.pd_hotel_id = price.pd_hotel_id 
left JOIN product on product.product_id = pd_hotel.product_id
		where price.everyday > curdate() and pd_hotel.hotel_id = $htl_id and price.active=1 AND product.parent_id = 1
		and pd_hotel.active=1 ".$c." order by price.price";	
	$result = mysql_query($q);
	if(!$result) {return;}
	while($p = mysql_fetch_array($result))
	{
		return $p;
	}
}

function get_hotels($city_id=NULL){
	$lg = num_lang();
	$ht = "";
	$i=0;
	$a = new sqlDrv();
	
	if($city_id == NULL){}
	else{
		$ht = " AND hotel.city_id='$city_id' ";
	}
	$q = "SELECT hotel.*, hotel_dtl.* FROM hotel 
		 JOIN hotel_dtl ON hotel.hotel_id=hotel_dtl.hotel_id AND hotel_dtl.lang_id=$lg ".$ht."
		ORDER BY priority, CONVERT(hotel_dtl.ht_name USING gbk)";
		//echo $q;
	$result = mysql_query($q);
	if(!$result) {return false;}
	 while($row = mysql_fetch_assoc($result)){
		 foreach ($row as $key => $value){
			$r[$i][$key] = $value;
		 }
		$i++;
	 }	return $r;
}
function get_htl($htl_id){
	$lg = num_lang();
	$ht = "";
	$i=0;
	$a = new sqlDrv();
	$q = "SELECT hotel.*, hotel_dtl.* FROM hotel 
		 JOIN hotel_dtl ON hotel.hotel_id=hotel_dtl.hotel_id AND hotel_dtl.lang_id=$lg AND hotel.hotel_id=$htl_id";
	//echo $q;
	$result = mysql_query($q);
	if(!$result) {return false;}
	 while($row = mysql_fetch_assoc($result)){
		 foreach ($row as $key => $value){
			$r[$i][$key] = $value;
		 }
		$i++;
	 }	return $r;
}

function so_price($price){
	global $_WDS;
	$lang = getLang();
	if ($lang == "EN")
	{
		$lg = new sqlDrv();
		$_WDS = $lg->get_english();
	}
	else
	{
		$lg = new sqlDrv();
		$_WDS = $lg->get_chinese();
	}
		
	if ($price>0 && $price<1){
		if ($lang == 'EN'){
			$p = (1-$price)*100;
			return $p."% ".$_WDS['pc_0up'];
		}
		else{
			$p = $price*10;
			return $p.$_WDS['pc_0up'];
		}
	}
	else if($price == -1){
		return $_WDS['free'];
	}
	return $price.$_WDS['pc_1up'];
}

function get_headquater()
{
	$a = new sqlDrv();
	$q = "SELECT hotel.* FROM hotel WHERE hotel_id=1";
		//echo $q;
	$result = mysql_query($q);
	if(!$result) {return false;}
	 while($row = mysql_fetch_assoc($result)){
		 return $row;
	 }
}

?>