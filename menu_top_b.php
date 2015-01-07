<?php include_once("include/common.php"); ?>
<script type="text/javascript">
$(".menu").click(function () {
	  $(this).css("color","#3e3e29");
});
</script>
<div style="width:100%">
<div class="menubg_b" style="margin-left: 0.5px;"><a  
<?php if(curPageName() == "special.php" || curPageName() == "contact_us.php") {
	$page = 0;
	}
if($page==20)
 {
	echo " class='menu_v' ";
 }
 else
 {
 	echo " class='menu' ";
 }
 ?>
	 href="book.php?lang=<?php echo $_SESSION['lang']."&which_page=20";?>"><?php echo $_WDS['htl_intro_ttl']; ?></a>
 </div>
<div class="menubg_b" style="margin-left: 4.5px;"><a 
<?php
if(curPageName() == "special.php")
{
	echo " class='menu_v' ";
 }
 else
 {
 	echo " class='menu' ";
 }
?>
 href="special.php"><?php echo $_WDS['so_ttl']; ?></a></div>
<div class="menubg_b" style="margin-left: 4.5px;"><a 
<?php
if(curPageName() == "contact_us.php")
{
	echo " class='menu_v' ";
 }
 else
 {
 	echo " class='menu' ";
 }
?>
href="contact_us.php"><?php echo $_WDS['contact_ttl']; ?></a></div>
<div class="menubg_b" style="margin-left: 4.5px;"><a class="menu" href="index.php"><?php echo $_WDS['group_home_ttl']; ?></a></div>
</div>
