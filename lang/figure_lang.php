<?php 
function getLang()
{
   $lang = "CN";
    if( isset($_SESSION['lang']))
	{
		$lang = $_SESSION['lang'];
	}
	if (isset($_REQUEST['lang']))
	{
		$lang = $_REQUEST['lang'];
	}
	$_SESSION['lang'] = $lang;
	if($lang == "EN"){ $_SESSION['loc'] = "en-US";}
	else{ $_SESSION['loc'] = "zh-CN";}
	return $lang;
}

function num_lang(){
	$lang = getLang();
	if($lang == "EN")	return 2;
	else				return 1;
}
function getPage()
{
   $page = "nbxes1";
    if( isset($_SESSION['which_page']))
	{
		$page = $_SESSION['which_page'];
	}
	if (isset($_REQUEST['which_page']))
	{
		$page = $_REQUEST['which_page'];
	}
	$_SESSION['which_page'] = $page;
	
	return $page;
}
?>