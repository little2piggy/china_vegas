<div align="left" style="margin-left: 20px;">
<p>
<a href="#talent" class="career" id="menu_talent"><b><?php echo $_WDS['talent_ttl'];?></b></a>
</p>
<p>
<a href="#training" class="career"><b><?php echo $_WDS['training_ttl'];?></b></a>
</p>
<p>
<a id="open" href="#" class="career"><b><?php echo $_WDS['open_ttl'];?></b></a><br>
<div id="open_dtl">
&nbsp;&nbsp;<a href="#head" class="career"><?php echo $_WDS['head_office']; ?></a><br>
&nbsp;&nbsp;<a href="#hotel" class="career"><?php echo $_WDS['hotel_opening']; ?></a><br>
&nbsp;&nbsp;<a href="#school" class="career"><?php echo $_WDS['school_opening']; ?></a>
</div>
</p>
</div>
<script type="text/javascript">
$(document).ready(function() {
	 $("#open_dtl").hide();
	 $('#menu_talent').css("color","#cc9900");
	 $(".career").click(function () {
		 $('.career').css("color","#223320");
		 $(this).css("color","#cc9900");	
		});
	$("a#open").click(function () {
      $("#open_dtl").slideToggle("slow");
    });
});
</script>