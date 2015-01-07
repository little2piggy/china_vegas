<?php session_start(); 
	include_once("lang/figure_lang.php");
	include_once("include/myDB.php");
	include_once("bookfntion.php"); 

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
	if( $_REQUEST["city_id"] )
	{
	   $_SESSION['city_id'] = $_REQUEST['city_id'];
	}
?>
<script type="text/JavaScript" src="js/gen_js.js"></script>
<script type="text/JavaScript" 
		src="<?php 
		if($lang == "EN"){
			echo "js/jquery_cal_EN.js";
		}else{
			echo "js/jquery_cal_CN.js"; 
		}?>" >
</script>
<script language="JavaScript">
$(function() {
		var dates = $( "#checkin, #checkout" ).datepicker({
			defaultDate: "+1d",
			showOn: 'both',
			  buttonImage: 'pix/icn_cal.png',
			  buttonImageOnly: true,
			 minDate: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "checkin" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" );
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});

</script>
<?php include_once("rest_sub.php"); ?>