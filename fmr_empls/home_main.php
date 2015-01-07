<link rel="stylesheet" type="text/css" href="css/green/style.css" />
<link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui.css" />
<?php include_once("hmfntion.php"); ?>
<script language="JavaScript" src="../js/jquery.js"></script>
<script language="javascript" src="../js/jquery-ui.js"></script>
<script language="javascript" src="../js/jquery_cal_CN.js"></script>
<script type="text/JavaScript" src="js/jquery-tablesorter.js"></script>
<script type="text/JavaScript" src="js/jquery_tablesorter_extra.js"></script>


<script type="text/JavaScript">
$(document).ready(function() 
    { 
        $("#myTable").tablesorter({sortList: [[0,0], [1,0]],widgets: ['zebra'] });
		$("#myTable").bind("sortStart",function() { 
        $("#overlay").show(); 
		}).bind("sortEnd",function() { 
			$("#overlay").hide(); 
    }); 
    } 
); 
</script>
<?php
	if( $_SESSION['reguname'] <> "" && $_SESSION['ch_reason'] <> "" && $_SESSION['lang_id'] <> "" 
		&& $_SESSION['reguname'] <> NULL && $_SESSION['ch_reason'] <> NULL && $_SESSION['lang_id'] <> NULL
		&& ($_SESSION['ch_name'] <> "" ||$_SESSION['ch_loc']<>"" ))													
	{
		add_new_code($_SESSION['reguname'],$_SESSION['ch_loc'], $_SESSION['ch_name'], 
					$_SESSION['ch_begin'], $_SESSION['ch_reason'], $_SESSION['lang_id']);
	}
	if( $_REQUEST['del'] <> "")
	{
		del_code($_REQUEST['del']);
		unset($_REQUEST['del']); 
	}
?>
<table id="myTable" class="tablesorter"> 
<thead> 
<tr> 
    <th><?php echo $_WORDS['code']; ?></th> 
    <th><?php echo $_WORDS['pre_loc'];?></th> 
    <th><?php echo $_WORDS['emp_name'];?></th> 
    <th><?php echo $_WORDS['birth_year'];?></th>
    <th><?php echo $_WORDS['reason'];?></th> 
    <th><?php echo $_WORDS['lang'];?></th>
    <th></th>
</tr> 
</thead> 
<tbody> 
<?php  
echo show_empl();
?> 
</tbody> 
</table>
<?php
	 $pc = price_cat();
?>
<div align="left" style="clear:both; margin:30px" id="add">
<?php include_once("home_add.php"); ?>
 <p>&nbsp;</p>
</div>
