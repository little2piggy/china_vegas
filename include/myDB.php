<?php
ini_set('display_errors', false);
include_once("constants.php");

class sqlDrv {
   private $_Link;

   public function __construct() {
      	$this->_Link = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if (!$this->_Link)
		{
			die('Could not connect: ' . mysql_error());
		}
		mysql_select_db(DB_NAME, $this->_Link);
		mysql_query("SET NAMES 'GBK'");
		mysql_query("SET NAMES 'UTF8'");
		mysql_query("SET CHARACTER SET UTF8");
		mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
   }

	function get_english()
	{
		$q = "select lang_desc, EN from lang_dtl";
		$result = mysql_query($q);
		while($row = mysql_fetch_array($result))
		{
			$i = $row['lang_desc'];
			$wds[$i] = $row['EN'];
		}
		return $wds;
	}
	function get_chinese()
	{
		$q = "select lang_desc, CN from lang_dtl";
		$result = mysql_query($q);
		while($row = mysql_fetch_array($result))
		{
			$i = $row['lang_desc'];
			$wds[$i] = $row['CN'];
		}
		return $wds;
	}
	
	function get_city($lang=NULL)
	{
		if ($lang == NULL) $lang = 1;
		$q = "SELECT cd.*, hotel.city_id FROM city c JOIN city_dtl cd ON c.city_id=cd.city_id
			JOIN hotel ON hotel.city_id = c.city_id where cd.lang_id = $lang and c.active=1 
			order by CONVERT(cd.ct_name USING gbk), cd.city_id";
		  $result = mysql_query($q);
		  if(!$result) {return false;}
		  while($p = mysql_fetch_array($result))
		  {
			$i = $p['city_id'];
			$cty[$i] = $p['ct_name'];			
		  }
		  return $cty;
	}
	
	function get_product()
	{
		$q = "SELECT pd.* FROM product p 
			JOIN product_dtl pd ON p.product_id=pd.product_id where pd.lang_id = 1 and p.active=1 
			order by CONVERT(pd.pd_name USING gbk)";
		  $result = mysql_query($q);
		  if(!$result) {return false;}
		  while($p = mysql_fetch_array($result))
		  {
			$i = $p['product_id'];
			$pdt[$i] = $p['pd_name'];			
		  }
		  return $pdt;
	}
	
	
	function get_hotel($lang_id = NULL, $city_id = NULL)
	{
		$ct = "";
		$ht = "";
		if($lang_id == NULL) $lang_id = 1;
		if($city_id == NULL) {}
		else
		{
			$ct = "and c.city_id=$city_id";	
		}
		
		$q = "SELECT cd.* FROM hotel c JOIN hotel_dtl cd ON c.hotel_id=cd.hotel_id 
			WHERE cd.lang_id = '$lang_id' and c.active=1 ".$ct."
			order by c.priority desc, CONVERT(cd.ht_name USING gbk)";
		
		  $result = mysql_query($q);
		  if(!$result) {return false;}
		  while($p = mysql_fetch_array($result))
		  {
			$i = $p['hotel_id'];
			$htl[$i] = $p['ht_name'];			
		  }
		  return $htl;
	}	
	
   // this will be called automatically at the end of scope
   public function __destruct() {
      mysql_close( $this->_Link );
   }
}
?>