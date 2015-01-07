<?php
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

	function get_province()
	{
		$i=1; 
		$q = "SELECT * FROM province";
		  $result = mysql_query($q);
		  if(!$result) {return false;}
		  while($p = mysql_fetch_array($result))
		  {
			$pvc[$i++] = $p['pro_name'];			
		  }
		  return $pvc;
	}
	function get_city()
	{
		$q = "SELECT cd.* FROM city c 
			JOIN city_dtl cd ON c.city_id=cd.city_id where cd.lang_id = 1 and c.active=1 
			order by CONVERT(cd.ct_name USING gbk)";
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
	
	function get_hotel()
	{
		$q = "SELECT cd.* FROM hotel c 
			JOIN hotel_dtl cd ON c.hotel_id=cd.hotel_id where cd.lang_id = 1 and c.active=1 
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
	function pd_hotel_id($hotel_id, $product_id){
		$q="SELECT pd_hotel_id FROM pd_hotel WHERE hotel_id='$hotel_id' and product_id='$product_id' and active=1";
		$result = mysql_query($q);
		if(!$result  || mysql_num_rows($result) == 0) return false;
		while($r = mysql_fetch_array($result))
		{
			return $r['pd_hotel_id'];
		}
	}
   // this will be called automatically at the end of scope
   public function __destruct() {
      mysql_close( $this->_Link );
   }
}
?>