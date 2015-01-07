<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");	 
	$lang = getLang();
	$page=getPage();
	if($page <> 20 || $page <> 21)	$page = 20;
	global $_WDS;
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
	unset($_SESSION['price']);
	unset($_SESSION['amount']);
	unset($_SESSION['item_name']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/book.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui.css" />
<meta name="description" content="Your Description Here" />
	<meta name="keywords" content="Your Keywords Here" />
	<title><?php echo $_WDS['company_ttl']." | ".$_WDS['rest_ttl']; ?></title>
</head>
<body class="bgbody">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/JavaScript" src="js/jquery-ui.js"></script>
<script type="text/JavaScript" src="js/gen_js.js"></script>

<div id="header_b" class="bgwhite">
	<div class="wraper_b">
        <?php 
            include_once ("header_b.php"); 
        ?>
 	</div> 
 </div>
 
<div class="wraper_b">	
    <div id="container_b" class="bgwhite">
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          	<div class="menu_b">
	          <?php include_once("menu_b.php"); ?>
              
            </div> 
              <div id="div_b"><img src="pix/div_b.png" border="0" />
              	<?php include_once("main_book.php"); ?>
              </div>
    </div>
</div>
<div id="foot_line_b" align="center"><img src="pix/foot_line_b.png" border="0"></div>
<div class="wraper_b">	
    <div id="footer_b">
        <?php include_once ("footer_b.php"); ?>
    </div>
</div>
<div class="wrap_main_b">
	<div id="head_main_b">
          <div id="ttl_b"><span class="ttl_word_b"><img src="pix/reservation.png" border="0" /></span></div><div style="background-image:url(pix/head_main_b.png); background-repeat:no-repeat;"><img src="pix/head_main_b.png" border="0" /></div>
          	<?php include_once("menu_top_b.php"); ?>
             </div>
</div>
 
</body>
</html>