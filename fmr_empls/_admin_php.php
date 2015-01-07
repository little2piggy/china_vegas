<?php
ini_set('display_errors', false);
include_once("include/forpages.php");	
include_once("include/myDB.php");


//use in cvAdmin, nl2br doesn't work with javascript, because <br> is <br />
function getNewLine($ostr)
{
	$nstr = str_replace("\n","<br>",$ostr);
	$nstr = str_replace("\r","",$nstr);
	return $nstr; 
}
//use in cvAdmin
function rvsNewLine($ostr)
{
	$nstr = str_replace("<br>","\n",$ostr);
	return $nstr; 
}

function getUserLevel($username){
  if(!get_magic_quotes_gpc()) {
	  $username = addslashes($username);
  }   	
     $a = new sqlDrv();	
	  
$q = "SELECT userlevel FROM users WHERE username = '$username'";
  $result = mysql_query($q);
  if(!$result || (mysql_num_rows($result) < 1)){
	 return false; //Indicates username failure
  }

  /* Retrieve password from result, strip slashes */
  $dbarray = mysql_fetch_array($result);
  return $dbarray['userlevel'];
}   

function future_date($dat)
{
	$curdat = date("Y/m/d");
	$curdat = strtotime($curdat);
	$dat = strtotime($dat);
	if ($dat-$curdat >= 0)
	{
		return true;	
	}
	else
	{
		return false;	
	}
}
function getSvcType()
{
	 $con = sql_con();
	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
	$query =mysql_query("SELECT * FROM products_type where flag = 0");
	$i=0;
	while($results = mysql_fetch_array($query))
	{
		$rst[$i]['id'] = $results['type_id'];
		$rst[$i]['name_e'] = $results['name_e'];
		$rst[$i]['name_c'] = $results['name_c'];
		$rst[$i]['name_j'] = $results['name_j'];
		$rst[$i]['desc_e'] = $results['desc_e'];
		$rst[$i]['desc_c'] = $results['desc_c'];
		$rst[$i]['desc_j'] = $results['desc_j'];
		$i++;
	}
	 mysql_close($con);
	 return $rst;
}

function get_products_type1()
{
	$options="";
	$type_id = $_SESSION['type_id'];
    $con = sql_con();	
	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
		
	$result = mysql_query("SELECT type_id, name_c FROM products_type where flag = 0");
    while($row = mysql_fetch_array($result))
    {
		$name_c = $row['name_c'];
		$options.= "<OPTION ID=".$row['type_id'];
		if ($type_id == $row['type_id'])
		{
			$options.= " selected='selected' ";
		}
        $options.= " VALUE=".$row['type_id'].">".$row["name_c"]."</option>";
	}
	mysql_close($con);
	return $options;
}
function checkadmin()
{
	$user = $_SESSION['userid'];
	$pw = $_SESSION['pw'];
	
	
	unset($_SESSION['userid']);
	unset($_SESSION['pw']);
}

function get_products_type()
{
	global $_WORDS;
	$inputs="";
    $con = sql_con();
	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");
	
	$result = mysql_query("SELECT * FROM products_type where flag=0");
    while($row = mysql_fetch_array($result))
    {
		$type_id = $row['type_id'];
		$name_e = $row['name_e'];
		$desc_e = $row['desc_e'];
		$desc_e = rvsNewLine($desc_e);
		$name_c = $row['name_c'];
		$desc_c = $row['desc_c'];
		$desc_c = rvsNewLine($desc_c);
		$name_j = $row['name_j'];
		$desc_j = $row['desc_j'];
		$desc_j = rvsNewLine($desc_j);
   	//<a id='displayText' href='javascript:toggle();'>show</a> <== click Here<div id='toggleText' style='display: none'></div>
		$inputs .="<tr><td valign='top'>".$_WORDS['english']."</td><td valign='top'>".
				"<input type='hidden' id='$type_id' value='$type_id' />".
				"<input type='text' id='$type_id/name_e' size='30' value='$name_e' /></td>".
				"<td><textarea id='$type_id/desc_e' rows='2' cols='45'>$desc_e</TEXTAREA>";
		$inputs .="</td><td align='right'></td></tr>";
		$inputs .="<tr><td valign='top'>".$_WORDS['chinese']."</td><td valign='top'>".
				"<input type='text' id='$type_id/name_c' size='30' value='$name_c' /></td>".
				"<td><textarea id='$type_id/desc_c' rows='2' cols='45'>$desc_c</TEXTAREA>";
		$inputs .="</td><td></td></tr>";		
		$inputs .="<tr><td valign='top'>".$_WORDS['japanese']."</td><td valign='top'>".
				"<input type='text' id='$type_id/name_j' size='30' value='$name_j' /></td>".
				"<td><textarea id='$type_id/desc_j' rows='2' cols='45'>$desc_j</TEXTAREA>";
		$inputs .="</td><td>
				<input type='button' id='$type_id/done' name='$type_id/done' value='".
				$_WORDS['done']."'  onclick=\"sendSvc('$type_id','$type_id/name_e','$type_id/desc_e','$type_id/name_c','$type_id/desc_c','$type_id/name_j','$type_id/desc_j');\"><br>";
		if($type_id>1)
		{
			$inputs .="<input type='button' id='$type_id/del' name='$type_id/del' value='".$_WORDS['del'].
		"'onclick=\"deleteSVC('$type_id');\" />	";	
		}
		$inputs.="</td></tr><tr><td colspan='4' class='svc_div'>&nbsp;</td></tr>";	
	}
	mysql_close($con);
	
	return $inputs;
}
function get_products($type_id)
{
	global $_WORDS;
	$inputs="";
	//echo $type_id."#####";	
	$con = sql_con();
	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");

	$result = mysql_query("SELECT * FROM products where type_id=$type_id and flag=0");
	while($row = mysql_fetch_array($result))
	{
		$products_id=$row['products_id'];
		$name_e = $row['name_e'];
		$beds_e = $row['beds_e'];
		$desc_e = $row['desc_e'];
		$desc_e = rvsNewLine($desc_e);
		$name_c = $row['name_c'];
		$desc_c = $row['desc_c'];
		$desc_c = rvsNewLine($desc_c);
		$beds_c = $row['beds_c'];
		$name_j = $row['name_j'];
		$desc_j = $row['desc_j'];
		$desc_j = rvsNewLine($desc_j);
		$beds_j = $row['beds_j'];
		$inputs .="<tr><td valign='top'>".$_WORDS['english']."</td>
					<td valign='top'>".
					"<input type='hidden' id='$products_id' name='$products_id' value='$products_id' />
					<input type='text' id='$products_id-name_e' size='25' value='$name_e'  /></td>".
				"<td valign='top'>
				<input type='text' id='$products_id-beds_e' size='25' value='$beds_e' /></td>".
				"<td valign='top'>
				<textarea id='$products_id-desc_e' rows='2' cols='45'>$desc_e</textarea></td>".
				"<td></td></tr>".
				"<tr><td colspan='5'></td></tr>";	
		$inputs .="<tr><td valign='top'>".$_WORDS['chinese']."</td>
			<td valign='top'>"."<input type='text' id='$products_id-name_c' size='25' value='$name_c' /></td>".
				"<td valign='top'>
				<input type='text' id='$products_id-beds_c' size='25' value='$beds_c' /></td>".
				"<td valign='top'>
				<textarea id='$products_id-desc_c' rows='2' cols='45' >$desc_c</textarea></td>".
				"<td></td></tr>".
				"<tr><td colspan='5'></td></tr>";	
		$inputs .="<tr><td valign='top'>".$_WORDS['japanese']."</td>
				<td valign='top'>"."<input type='text' id='$products_id-name_j' size='25' value='$name_j' /></td>".
				"<td valign='top'>
				<input type='text' id='$products_id-beds_j' size='25' value='$beds_j' /></td>".
				"<td valign='top'>
				<textarea id='$products_id-desc_j' rows='2' cols='45'>$desc_j</textarea></td>".
				"<td><input type='button' id='$products_id' name='$products_id' value='".$_WORDS['done']."' 
				onclick=\"sendPdt('$products_id','$products_id-name_e','$products_id-name_c','$products_id-name_j','$products_id-beds_e','$products_id-beds_c','$products_id-beds_j','$products_id-desc_e','$products_id-desc_c','$products_id-desc_j');\"
				><br>";
	if($type_id > 1){
		$inputs .= "<input type='button' id='$products_id' name='$products_id' value='".$_WORDS['del']."' onclick=\"deletePDT('$products_id');\" >";
	}		
		$inputs .= "</td></tr><tr><td colspan='5' class='svc_div'>&nbsp;</td></tr>";
	}
	
	mysql_close($con);
	return $inputs;
}
function get_users()
{
	$inputs="";
	$con = sql_con();
	$result=mysql_query("SELECT username, userlevel FROM users order by username");
	while($row = mysql_fetch_array($result))
    {
		$inputs.="<form action='users.php' id='leveledit' name='leveledit'>";
		$inputs.="<tr><td>".$row['username']."</td>";
		$inputs.="<td><input type='text' size='1' id=l".$row['username']."name=l".$row['username'].
		"value=".$row['userlevel']."</td>";
		$inputs.="<td><input type='radio' name='removed' id='removed' value='".$row['username']."' /></td>";
		$inputs.="<td><input type='submit' value='Submit' /></td></tr>";
		$inputs.="</form>";

	}
	mysql_close($con);
	return $inputs;
}

function getGuestroom()
{
	$rooms = $_SESSION['roomtype'];
	$type_id = $_SESSION['type_id'];
	 $opts="";
    $con = sql_con();
   	mysql_query("SET NAMES 'GBK'");
	mysql_query("SET NAMES 'UTF8'");
	mysql_query("SET CHARACTER SET UTF8");
	mysql_query("SET CHARACTER_SET_RESULTS=UTF8'");

   $ist = "SELECT products_id, beds_c, name_c FROM products where type_id = $type_id and flag = 0";
   echo $ist;
	$result = mysql_query($ist);
    while($row = mysql_fetch_array($result))
    {
		$opts.= "<OPTION ID=".$row['products_id'];
		if ($rooms == $row['products_id'])
		{
			$opts.= " selected='selected' ";
		}
        $opts.= " VALUE=".$row['products_id'].">"
					.$row["name_c"]."-".$row["beds_c"]."</option>";
    }
	
	mysql_close($con);
	return $opts;
}
/*
function regular_p($rooms=NULL)
{
	$rr="";
	if(is_null($rooms))
	{	
		$rooms = $_SESSION['roomtype'];
	}
	$con = sql_con();
	$result = mysql_query("SELECT price FROM temp_price where products_id=".$rooms." and flag=0 and black_out_date='2008-12-01'");
	
	if (mysql_num_rows($result) < 1)
	{
	 return "";
	}
	while($row = mysql_fetch_array($result))
    {
		$rr = $row['price'];
	}
	mysql_close($con);
	return $rr;
}

function roomrate($thepc)
{
	$rooms = $_SESSION['roomtype'];
	if ($rooms <= 0 || $rooms == "" || $rooms == NULL)
		return false;
	
	if ($rooms > 0)
	{
		$con = sql_con();
		$price = "";
		if ($thepc == "price")
		{
			$result = mysql_query("SELECT price_id, price, black_out_date FROM temp_price where products_id=".$rooms.
								" and flag=0 and price<>0 ");
		}
		if ($thepc == "sprice")
		{
			$result = mysql_query("SELECT price_id, sprice, black_out_date FROM temp_price where products_id=".$rooms.
								" and flag=0 and sprice<>0");
		}		
		if ($thepc == "mprice")
		{
			$result = mysql_query("SELECT price_id, mprice, black_out_date FROM temp_price where products_id=".$rooms.
								" and flag=0 and mprice<>0");
		}	
		if ($thepc == "dprice")
		{
			$result = mysql_query("SELECT price_id, dprice, black_out_date FROM temp_price where products_id=".$rooms.
								" and flag=0 and dprice<>0");
		}		
		$num_rows = mysql_num_rows($result);
		if ($num_rows < 1 || $num_rows == false || $num_rows=="")
		{	return false;	}
		for ($i=0; $i<$num_rows; $i++)
		{
			$price[$i]= mysql_fetch_array($result);
		}
	mysql_close($con);
	}
	return $price;
}

*/
?>