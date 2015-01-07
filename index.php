<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");	 
	$lang = getLang();
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
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui.css" />
<meta name="description" content="" />
	<meta name="keywords" content="" />
	<title><?php echo $_WDS['company_ttl'].$_WDS['official_ttl']; ?></title>
</head>
<body onLoad='setTimeout("pop()", 15000);'>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/JavaScript" src="js/jquery-ui.js"></script>
<script src="js/jquery-fancy.js" type="text/javascript"></script>
<div id="wraper">
    <div id="header" class="bgwhite">
        <?php 
			include_once ("header.php"); 
		?>
    </div>    
    <div id="container">
    	<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0"><tr valign="top"><td>
        <div id="menu">
            <?php include_once ("menu.php"); ?>
        </div>
        </td><td class="bgwhite">
        <div id="mainbody" class="bgwhite">
             <?php include_once ("homebody.php"); ?>
         </div></td></tr></table>
    </div>
    <div id="footer">
        <?php include_once ("footer.php"); ?>
    </div>
    <div id="head_main">
        
		<div style="position:relative;">
            <div id="animated" style="visibility: hidden; position:absolute; top:0px; left:0px;">
            <div id='slideshowHolder'>
            <img src='pix/head_1.png' />
            <img src='pix/head_2.png' />
             <img src='pix/head_3.png'  / >
             <img src='pix/head_4.png' />
             <img src='pix/head_5.png' />
             <img src='pix/head_6.png' />
             <img src='pix/head_7.png' />
             <img src='pix/head_8.png' />
             <img src='pix/head_9.png' />
            </div>
            </div>
            <div id="flashScreen" style="visibility: visible; position:absolute; top:0px; left:0px;">
            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
            codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0"
            width="648" height="290" id="keep" align="middle">
                   <param name="allowScriptAccess" value="sameDomain" />
                   <param name="allowFullScreen" value="false" />
                   <param name="movie" value="keep.swf" /><param name="quality"
            value="high" /><param name="wmode" value="transparent" /><param
            name="bgcolor" value="#ffffff" />       <embed src="keep.swf" quality="high"
            wmode="transparent" bgcolor="#ffffff" width="648" height="290"
            name="keep" align="middle" allowScriptAccess="sameDomain"
            allowFullScreen="false" type="application/x-shockwave-flash"
            pluginspage="http://www.adobe.com/go/getflashplayer" /></object>
            </div>
        </div>
    </div>
   
    <div id="head_line"><img src="pix/head_line.png" border="0" /></div>

</div>
<script language="JavaScript" type="text/javascript">
	function pop()
	{
		elem = document.getElementById('flashScreen');
		elem.innerHTML="";
		elem.style.visibility = 'hidden';
	
		elem = document.getElementById('animated');
		elem.style.visibility = 'visible';
	}
	$('#slideshowHolder').jqFancyTransitions({ width: 650, height: 290,strips: 18 });
</script>

</body>
</html>