<?php 
function show_empl(){
	$lang = "CN";
	$_SESSION['lang'] = $lang;
	
	if ($lang == "EN")
	{
	include_once("ENG.php");
	}
	else
	{
	include_once("CNY.php");
	}
	global $_WORDS;

	$se = "";
	global $database;
	$q = "SELECT c.*, u.email FROM card_holder c LEFT JOIN users_fe u ON c.username = u.username
		  order by CONVERT(c.ch_name USING gbk), c.username";
	$result = $database->query($q);
	
	while($h = mysql_fetch_array($result))
	{
		$pc_cat = price_cat($h['ch_reason']);
		$se .= "<tr>";
		$se .= "<td>".$h['username']."</td>";
		$se .= "<td>".$h['ch_loc']."</td>";
		$se .= "<td>".$h['ch_name']."&nbsp;/&nbsp;".$h['email']."</td>";
		$se .= "<td>".$h['ch_begin']."</td>";
		$se .= "<td>".$pc_cat[$h['ch_reason']]."</td>";
		if($h['lang_id']==2)
			$se .= "<td>".$_WORDS['english']."</td>";
		else 
			$se .= "<td>".$_WORDS['chinese']."</td>";
		$se .= "<td><form id='del".$h['card_holder_id']." name='del".$h['card_holder_id']." action='home.php' method='post'>
				<input type='hidden' id='del' name='del' value='".$h['username']."' />
				<input type='submit' class='btn' id='d".$h['card_holder_id'].
				"' name='".$h['card_holder_id']."' value='".$_WORDS['del']."' /></form></td>";
		$se .= "</tr>";
	}
	return $se;
}
function price_cat($cat_id=NULL)
{
	$cld = "";
	if($cat_id <> NULL)
	{
		$cat_id = " AND price_cat_id=$cat_id";
	}
	else{
		$cat_id = "";
	}
	global $database;
	$q = "SELECT * from price_cat_dtl WHERE lang_id = 1 ".$cat_id;
	$result = $database->query($q);	
	if(!$result) {return false;}
	while($p = mysql_fetch_array($result))
	  {
		$i = $p['price_cat_id'];
		$cld[$i] = $p['pc_name'];			
	  }
	  return $cld;
}
function del_code($user){
	global $database;
	$q = "DELETE FROM card_holder WHERE username='$user'";
	$result = $database->query($q);	
	$q = "DELETE FROM users_fe WHERE username='$user'";
	$result = $database->query($q);	
}
/*addNewCode - Add New card holders*/
function add_new_code( $username, $ch_loc, $ch_name, $ch_begin, $ch_reason, $lang_id )
{
	global $database;
	$q = "INSERT INTO card_holder (username,ch_loc, ch_name,ch_begin,ch_reason,lang_id)
			VALUES ('$username','$ch_loc', '$ch_name','$ch_begin','$ch_reason','$lang_id')";
	$result = $database->query($q);	
	update_user_level(  $username,$ch_reason );
}

function update_user_level(  $username,$ch_reason ){
	global $database;
	$q = "UPDATE users_fe SET userlevel = $ch_reason WHERE username = '$username'";
	$result = $database->query($q);	
}
?>
