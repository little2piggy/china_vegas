<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");
	$page = "nbxes1";
	$page=getPage();
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
	<meta name="keywords" content="" />
	<title><?php echo $_WDS['company_ttl']." | ".$_WDS['group_home_ttl']; ?></title>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/JavaScript" src="js/jquery-ui.js"></script>
<script type="text/JavaScript" src="js/jquery-round.js"></script>
<script type="text/JavaScript" src="js/gen_js.js"></script>
<script src="js/jquery-fancy.js" type="text/javascript"></script>

	</head>
<body>
<div id="wraper">
	
    <div id="header" class="bgwhite">
        <?php include_once ("header.php"); 	?>
    </div>
    <table border="0" cellpadding="0" cellspacing="0"><tr>
                <td style="background-color:#c6cd7e;" width="188px" valign="top">
                    <!-- Column one start -->
                         <?php include_once ("menu_dtl.php"); ?>
                    <!-- Column one end -->
                </td>
                <td style="background-color:#fff;" valign="top" width="462px">
                    <!-- Column two start -->
                    <?php include_once ("intro_dtl.php"); ?>
                    <!-- Column two end -->
                </td>
                <td style="background-color:#e6e9c5;" valign="top" width="200px">
                    <!-- Column three start -->
                    <?php include_once ("right_menu.php"); ?>
                    <!-- Column three end -->
                </td>
     </tr></table>
     <?php include_once("intro_head_main.php"); ?> 
	<div id="head_line_2"><img src="pix/2head_line.png" border="0" /></div>

    <div id="footer">
         <?php include_once ("footer.php"); ?>
    </div>
</div>
<!---------------------------------------------------  -->



</body>
</html>