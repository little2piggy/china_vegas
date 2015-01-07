<?php
include_once("include/myDB.php");
include_once("include/common.php");

function select_hotel($hotel_id = NULL, $city_id = NULL){
	$lg = num_lang();
	$a = new sqlDrv();
	$htl = $a->get_hotel($lg,$city_id);
	$s = "";
	$k =  array_keys($htl);
	
	for($i=0; $i<count($htl); $i++)
	{
		$s .= "<option value='".$k[$i]."' ";
		if($hotel_id == $k[$i])
		{
			$s.="selected='selected'";	
		}
		$s .=">".$htl[$k[$i]]."</option>";
	}
	return $s;
}
function confirm_card_holders( $user,$pc_rate ){
	$today = date("Y-m-d");
	$a = new sqlDrv();
	$q = "SELECT ch_reason FROM card_holder where ch_reason='$pc_rate' AND username = '$user' AND ch_begin <= '$today'";
	//echo $q."<br>";
	$result = mysql_query($q);
	if(!$result) {return false;}
	while($p = mysql_fetch_array($result)){
		return $p['ch_reason'];
	}
}
function display_room()
{
	$lg = num_lang();
	$htl_id = $_SESSION['htl_id'];
	$in = $_SESSION['checkin'];
	$in = new DateTime($in);
	$in = $in->format("Y/m/d");
	$out = $_SESSION['checkout'];
	$out = new DateTime($out);
	$out = $out->format("Y/m/d");
	$pc_rate = 2;
	echo  $_SESSION['price_category'];
	if( $_SESSION['price_category'] > 1 && $_SESSION['price_category'] < 9 ){
		$pc_rate = $_SESSION['price_category'];
	}
	$cld = select_childSVC(1, $lg, $htl_id);
	$k =  array_keys($cld);
	$discount = 0;
	if ($cld == "" || $cld == false) return $room="";
	
	for($i=0; $i<count($k); $i++)
	{
		$regular = avg_price($k[$i], $in, $out, 1);
		$discount = avg_price($k[$i], $in, $out, $pc_rate);
		
		if($regular > 0 || $discount > 0){
			$room[$i]['id']= $k[$i];
			$room[$i]['name']=$cld[$k[$i]];
			$room[$i]['regular'] = $regular;
			$room[$i]['discount'] = $discount;
		}
	}
	return $room;
}

function avg_price($pd_hotel_id, $in, $out, $pc_id){
	$i = 0;
	$price = 0;
	$a = new sqlDrv();
	$q = "SELECT price FROM price where everyday>='$in' and everyday<'$out' and active = 1 and pd_hotel_id=$pd_hotel_id and pc_id=$pc_id";
	//echo $q."<br>";
	$result = mysql_query($q);
	if(!$result) {return 99999999; }
	if( mysql_num_rows($result) == 0) return 99999999;
	while($p = mysql_fetch_array($result))
	{
		$price = $price + $p['price'];
		$i=$i+1;			
	 }
	  if($i==0) return 99999999;
	  else return $price/$i;
}

function select_childSVC($parent_id, $lang, $htl_id)
{
	$cld = "";
	
	$a = new sqlDrv();
	$q = "SELECT product_dtl.*, pd_hotel.pd_hotel_id FROM product_dtl 
			RIGHT JOIN product ON product.product_id = product_dtl.product_id
			RIGHT JOIN pd_hotel ON product_dtl.product_id = pd_hotel.product_id
			WHERE product.parent_id =$parent_id AND product_dtl.lang_id =$lang AND pd_hotel.hotel_id = $htl_id
			ORDER BY CONVERT(product_dtl.pd_name USING gbk)";
	//echo $q."**child**";
	$result = mysql_query($q);
	if(!$result) {return false;}
	while($p = mysql_fetch_array($result))
	  {
		$i = $p['pd_hotel_id'];
		$cld[$i] = $p['pd_name'];			
	  }
	  return $cld;
}
function list_city( $cty_id ){
	$lg = num_lang();
	$a = new sqlDrv();
	$cty = $a->get_city($lg);
	$s = "";
	$k =  array_keys($cty);
	for($i=0; $i<count($cty); $i++)
	{
		$s .= "<option value='".$k[$i]."' ";
		if($cty_id == $k[$i])
		{
			$s.="selected='selected'";	
		}
		$s .=">".$cty[$k[$i]]."</option>";
	}
	return $s;
}
function price_cat()
{
	$lg = num_lang();
	$a = new sqlDrv();
	$cld = "";
	$q = "SELECT * from price_cat_dtl WHERE lang_id = $lg";
	$result = mysql_query($q);
	if(!$result) {return false;}
	while($p = mysql_fetch_array($result))
	  {
		$i = $p['price_cat_id'];
		$cld[$i] = $p['pc_name'];			
	  }
	  return $cld;
}
//book_sent_info.php  main_account.php
function get_booking( $booking ){
	$today = date("Y-m-d");
	$a = new sqlDrv();
	$q = "SELECT * from booking WHERE booking_id = '$booking' AND check_in > '$today'";
	$result = mysql_query($q);
	if(!$result) {return false;}
	while($p = mysql_fetch_array($result))
	{
		$rs['check_in'] = $p['check_in'];
		$rs['check_out'] = $p['check_out'];
		$rs['products'] = $p['products'];
		return $rs;
	}
}
function cancel_booking($book_id){
	$a = new sqlDrv();
	$q ="DELETE FROM booking WHERE booking_id='$book_id'";
	//echo $q;
	$result = mysql_query($q);
	if(!$result) {return false;}
	return $book_id;
}
?>