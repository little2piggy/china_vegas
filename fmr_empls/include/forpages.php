<?php 
function time_out()
{
	set_time_limit  ( 60000  );
	ignore_user_abort();
  ini_set('session.cookie_lifetime', 0);
  $inactive = 600;
  // check to see if $_SESSION['timeout'] is set
  if(isset($_SESSION['timeout']) ) {
	  $session_life = date("U") - $_SESSION['timeout'];
	  if($session_life > $inactive)
	 { 
		session_destroy(); 
		header("Location: home.php"); 
	}
  }
  $_SESSION['timeout'] = date("U");
  
}

function defUser()
{
	if($session->logged_in){}
	$ip = $_SERVER['REMOTE_ADDR'];
	include_once("myDB.php");
    $a = new sqlDrv();
	$q = "SELECT ip_address FROM active_users WHERE ip_address = '$ip'";
  	$result = mysql_query($q);
	if(($result) > 0){}
	else
	{
		header('Location: home.php');	
	}
	  defPage();
}

function defPage()
{
	//echo $_SERVER['HTTP_REFERER'];
	//$URLpath = "http://www.china-vegas.com/cvAdmin/";
	$URLpath = "http://localhost/china_vegas/fmr_empls/";
	$preURL = $_SERVER['HTTP_REFERER'];
	$curPage = curPageName();
	$homeURL = $URLpath."home.php";
	$editURL = $URLpath."useredit.php";
	
	if( $curPage == "useredit.php" )
	{
		if ( strcmp($preURL,$homeURL)==0 || strcmp($preURL,$editURL)==0  ){}
		else
		{
			session_destroy();
			header('Location: home.php');
		}
	}
}
function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
function Log_out()
{
	global $_WORDS;
	echo "<a class='home' href=\"logout.php\">".$_WORDS['logout']."</a>";
}
function confirm_change($item)
{
	global $_WORDS;
	$_SESSION['item'] = $item;
	if($_SESSION['level']>1)
	{ 
		//echo "<table align='center' border='0' width='100%'><tr><td align='center'>".$_WORDS['confirm']."</td></tr></table>";
		//include_once ("../../login.php");
		//displayLogin();
	}
	else{
		echo "<table align='center' border='0' width='100%'><tr><td align='center'>".$_WORDS['userConf']."</td></tr></table>";
	}
}
function add_admin($action)
{
	$a = new sqlDrv();
	$ip=$_SERVER['REMOTE_ADDR'];
	$admin="INSERT into admin_act_log_fr (admin_id, page_update,ip_address) values ('".
			$_SESSION['username']."', '".$action."', '".$ip."')";
	mysql_query($admin);
}
?>