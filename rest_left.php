<?php foreach($_REQUEST as $query_string_variable => $value) {
  //$_SESSION[$query_string_variable] = $value;
}
if(isset($_REQUEST['city_id']) ){
	$_SESSION['city_id']=$_REQUEST['city_id'];
}
if(isset($_REQUEST['checkin']) || $_REQUEST['checkout']){
	$_SESSION['checkin']=$_REQUEST['checkin'];
	$_SESSION['checkout']=$_REQUEST['checkout'];
	$_SESSION['htl_id']=$_REQUEST['htl_id'];
	$_SESSION['rooms']=$_REQUEST['rooms'];
	$_SESSION['adults']=$_REQUEST['adults'];
	$_SESSION['children']=$_REQUEST['children'];
}
 if(isset($_REQUEST['pc_rate']) ){
	$pc_rate = $_REQUEST['pc_rate'];
	$_SESSION['pc_rate']=trim($pc_rate);
	$user = $_REQUEST['user'];
	$_SESSION['user']=trim($user);
	$pass = $_REQUEST['pass'];
	$_SESSION['pass']=trim($pass);
}
include_once("bookfntion.php"); 
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
				var option = this.id == "checkin" ? "minDate" : "maxDate+1",
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
   <script type="text/javascript" language="javascript">
   $(document).ready(function() {
      $("#city_id").change(function(event){
          var name = $("#city_id").val();
          $("#stage").load('rest_rslt.php', {"city_id":name} );
      });
   });
   </script>

<div align='center'><b><?php echo $_WDS['rest_ttl']; ?></b></div><p></p>
   <div align="left" class="rest_left">
   		<div><?php echo $_WDS['city_ttl'];?>:</div>
       <select name="city_id" id="city_id" class="boxselect">
            <option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </option>
            <?php echo list_city( $_SESSION['city_id'] );        ?>
        </select>
    </div>
    <div id="stage" class="rest_left" align="left">
	<?php include_once("rest_sub.php"); ?>
</div> <!-- align left Id Stage-->

