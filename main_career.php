<?php include_once("carfntion.php");?> 
<div class="btm_ttl">
<a class="links_news" name='talent'>&#9733;&nbsp;<?php echo $_WDS['talent_ttl']; ?>&nbsp;&#9733;</a>
<div class="my_pages">
<?php echo $_WDS['talent']; ?>
</div>
<a class="links_news" name='training'>&#9733;&nbsp;<?php echo $_WDS['training_ttl']; ?>&nbsp;&#9733;</a>
<div class="my_pages">
<?php echo $_WDS['training']; ?>
</div>
<a class="links_news" name='head'>&#9733;&nbsp;<?php echo $_WDS['open_ttl']; ?>&nbsp;&#9733;</a>
<div class="my_pages">
    <div class="career_subttl"><?php echo $_WDS['head_office']; ?></div>
    <?php 
		$ho = get_career(1);
		if($ho == ""){
			echo "<br>".$_WDS['come_soon']; 
		}else{
			echo $ho;
		}
	?>
</div>

<div class="my_pages">
    <div class="career_subttl"><a name='hotel'><?php echo $_WDS['hotel_opening']; ?></a></div>
    <?php $ho = get_career(2);
		if($ho == ""){
			echo "<br>".$_WDS['come_soon']; 
		}else{
			echo $ho;
		}
	?>
</div>

<div class="my_pages">
    <div class="career_subttl"><a name='school'><?php echo $_WDS['school_opening']; ?></a></div>
   <?php $ho = get_career(3);
		if($ho == ""){
			echo "<br>".$_WDS['come_soon']; 
		}
		else{
			echo $ho;
		}
	?>
</div>
</div>