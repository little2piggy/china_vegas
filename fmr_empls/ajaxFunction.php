<?php
include_once("sql_con.php");
//echo $_REQUEST['name_e']."###########<br>";
//chack to see if a name and id are in the FROM POST
if($_REQUEST['name_e'] != '' && $_REQUEST['id']){
	
	//assign the POST data to variables
	$name_e = $_POST['name_e'];
	echo $name_e. "@@@";
	$id = $_POST['id'];
	$mod_date=date();
   //open a DB connection
	$con = sql_con();
	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");   //prepare the SQL UPDATE
	$query="update products_type set name_e='$name_e', mod_date='$mod_date' where type_id = $id";
	mysql_query($query);
  
	echo $name_e;
}
?>