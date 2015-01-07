<?php 
	include_once("include/common.php");
	$urlname = curPageName(); 
?>
<div id="logo">
    <a href='index.php'><img src='pix/logo.png' border='0' /></a>
</div>
<div class="head" align="right">
	<a href="<?php echo $urlname;?>?lang=CN" class="topnav" style="font-size:10px;">简体中文</a>
            &nbsp;&nbsp; | &nbsp;&nbsp;
	<a href="<?php echo $urlname;?>?lang=EN" class="topnav">English</a>&nbsp;&nbsp;
</div>


