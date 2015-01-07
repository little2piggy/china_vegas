<script type="text/javascript">
$(document).ready(function() {
	$('#publ_dtl').hide();
	$('#new_ttl').css("color","#cc9900");
	$(".career").click(function () {
		 $('.career').css("color","#223320");
		 $(this).css("color","#cc9900");	
		});
	$('#new_ttl').click(function() {
		$('#publ_dtl').hide();
		$('#news_dtl').show();
		return false;
	  });
	$('#pub_ttl').click(function() {
		$('#publ_dtl').show();
		$('#news_dtl').hide();
		return false;
	  });
});
</script>
<div align="left" style="margin-left: 20px;">
<p>
<a href="#" id="new_ttl" class="career"><b><?php echo $_WDS['news_ttl'];?></b></a>
</p>
<p>
<a href="#" id="pub_ttl" class="career"><b><?php echo $_WDS['media_pub_ttl'];?></b></a>
</p>
</div>
