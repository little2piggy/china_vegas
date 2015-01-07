<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");	 
	$lang = getLang();
	$page = 20;
	$page=getPage();

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
<link rel="stylesheet" type="text/css" href="css/book.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui.css" />
<meta name="description" content="Your Description Here" />
	<meta name="keywords" content="Your Keywords Here" />
	<title><?php echo $_WDS['company_ttl']; ?></title>
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
    	<div class="bgwhite">
          <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
          	<?php  if(isset($_SESSION['mail_sent']) )
					{
						echo "<div class='check_out' style='height:300px; margin-left: 250px;'>";
						if( $_SESSION['mail_sent'] == 1)
						{
							echo $_WDS['txt_booksuc'].$_SESSION['bID'];
							echo "<br>";
							echo $_WDS['btn_sent_info'];
						}
						else
						{
							echo $_WDS['txt_email_fa'];
						}
						echo "</div>";
					}
					else
					{
						if(headers_sent($file, $line)){
    					// ... where were the mysterious headers sent from?
   				 			//echo "Headers were already sent in $file on line $line...";
						}
						else{
							header("Location: index.php");
						}
					}
					unset($_SESSION['1_name']);
					unset($_SESSION['2_name']);
					unset($_SESSION['e_mail']);
					unset($_SESSION['tel']);
					unset($_SESSION['checkin']);
					unset($_SESSION['checkout']);
					unset($_SESSION['amount']);
					unset($_SESSION['agree']);
					unset($_SESSION['item_name']);
				 ?>
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
          <div id="ttl_b"><span class="ttl_word_b"><img src="pix/reservation.png" border="0" /></span></div><div><img src="pix/head_main_b.png" border="0" /></div>
          	<?php include_once("menu_top_b.php"); ?>
             </div>
</div>
 
</body>
</html>