<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");	 
	$lang = getLang();
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
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/col3.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui.css" />
<meta name="description" content="Your Description Here" />
	<meta name="keywords" content="Your Keywords Here" />
	<title>Your Page Title</title>
</head>
<body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/JavaScript" src="js/jquery-ui.js"></script>
<script type="text/JavaScript" src="js/jquery-form.js"></script>

<div id="wraper">

<div id="header" class="bgwhite">
	<?php include_once ("header.php"); 	?>
</div>
<div id="container3">
	<div id="container2">
		<div id="container1">
			<div id="col1">
				<!-- Column one start -->
                	 <?php include_once ("menu_dtl.php"); ?>
				<!-- Column one end -->
			</div>
			<div id="col2">
				<!-- Column two start -->
					<?php include_once ("homebody_2.php"); ?>
				<!-- Column two end -->
			</div>
			<div id="col3">
				<!-- Column three start -->
				<?php include_once ("right_menu.php"); ?>
				<!-- Column three end -->
			</div>
		</div>
	</div>
</div>
<div id="footer">
	 <?php include_once ("footer.php"); ?>
</div>
	<div id="head_main_2"><img src="pix/2head_main.png" border="0" /></div>
    <div id="head_line_2"><img src="pix/2head_line.png" border="0" /></div>
</div>


<!---------------------------------------------------  -->



</body>
</html>