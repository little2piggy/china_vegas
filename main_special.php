<?php
include_once("bookfntion.php");
include_once("htlfntion.php");
?>
  <div id='intro_htl'><p>&nbsp;</p>
	<?php 
$htl = get_hotels();
for($i=0; $i<count($htl); $i++)
{
?> 
<div class="htl_name_b">
<?php echo $htl[$i]['ht_name']; ?>
</div>
<div class="htl_dtl_b htl_b">
	<div id="open<?php echo $htl[$i]['hotel_id']; ?>"
     <?php 
        if($i == 0) { echo "style='display:block;'";}
		else{ echo "style='display:none;'";}
		?>
    >
        <div onclick="$('#open<?php echo $htl[$i]['hotel_id']; ?>').hide(); $('#close<?php echo $htl[$i]['hotel_id']; ?>').show();">
        	<input type="image" src="pix/bar_s.png" value="+" border="0"  />
        </div>
        <div align="center">
            	<?php $so = special_offer($htl[$i]['hotel_id'], 100);  ?>
                <?php
				if( count($so)>0 ){
					?>
                <div class="ttl_hot_deal color_hot_deal"><b><?php echo $_WDS['deal_ttl']; ?></b></div>
                    <?php
					for ($k=0; $k < count($so); $k++){
					?>
						<div class="color_hot_deal" align="left">
				   <?php
						echo "<b>".$so[$k]['pd_name']."</b>";
						if($so[$k]['so_desc'] <> "" || $so[$k]['so_desc'] <> NULL)
						{
							?>
                            <div id="desc<?php echo $so[$k]['pd_hotel_id']; ?>" style="display:none;">
                            	<?php  echo $so[$k]['so_desc'];  ?>
                            </div>
                            <div id="max<?php echo $so[$k]['product_id']; ?>" class="btn_desc" style="display:block;" 
                            	 onmouseover="document.getElementById(this.id).style.cursor='pointer';"
                            	onclick=" $('#max<?php echo $so[$k]['product_id']; ?>').hide(); $('#min<?php echo $so[$k]['product_id']; ?>').show(); $('#desc<?php echo $so[$k]['pd_hotel_id']; ?>').show();">
                            <?php echo $_WDS['btn_detail']."&nbsp;[+]"; ?>
                            </div>
                            <div id="min<?php echo $so[$k]['product_id']; ?>" class="btn_desc" style="display:none;"
                            	onmouseover="document.getElementById(this.id).style.cursor='pointer';"
                            	onclick="$('#min<?php echo $so[$k]['product_id']; ?>').hide(); $('#max<?php echo $so[$k]['product_id']; ?>').show(); $('#desc<?php echo $so[$k]['pd_hotel_id']; ?>').hide(); ">
                         <?php echo $_WDS['btn_close']."&nbsp;[-]"; ?>
                            </div>
                            <?php
						}
						?>
                        <div style="clear:both; margin-left: 150px;"> 
                        	<?php echo $_WDS['so_price']; ?>: <?php echo so_price($so[$k]['price']); ?><br />
                            <?php echo $_WDS['expire_date']; ?>: <?php echo $so[$k]['everyday']; ?>
                        </div>
                        
                       <div class="btn_sent"><a class="menu" href="#" id="sent<?php echo $so[$k]['pd_hotel_id']; ?>" name="sent<?php echo $so[$k]['pd_hotel_id']; ?>" onclick="sendDoc('<?php echo $htl[$i]['hotel_id'];?>','<?php echo $htl[$i]['ht_name']; ?>','<?php echo $so[$k]['product_id']; ?>','<?php echo $so[$k]['pd_name']; ?>');"><?php echo $_WDS['btn_next']; ?></a></div>
			<?php 
					echo "</div>"; //close <div class="color_hot_deal" align="left">
					}
				}
				?>
            <div class="ttl_offer"><b><?php echo $_WDS['promote_ttl']; ?></b></div>
            <div align="left" class="offer_dtl">
            <?php
				$so = "";
				$so = special_offer($htl[$i]['hotel_id'], 0);
				if(count($so) < 1){
					echo $_WDS['come_soon'];
				}
				else if( count($so)>0  ){
					for ($k=0; $k < count($so); $k++){
					?>
						<div align="left">
				   <?php
						echo "<b>".$so[$k]['pd_name']."</b>";
						if($so[$k]['so_desc'] <> "" || $so[$k]['so_desc'] <> NULL)
						{
							?>
                            
                            <div id="desc<?php echo $so[$k]['pd_hotel_id']; ?>" style="display:none;">
                            	<?php  echo $so[$k]['so_desc'];  ?>
                            </div>
                            <div id="max<?php echo $so[$k]['product_id']; ?>" class="btn_desc" style="display:block;" 
                            	onmouseover="document.getElementById(this.id).style.cursor='pointer';"
                            	onclick=" $('#max<?php echo $so[$k]['product_id']; ?>').hide(); $('#min<?php echo $so[$k]['product_id']; ?>').show(); $('#desc<?php echo $so[$k]['pd_hotel_id']; ?>').show();">
                            <?php echo $_WDS['btn_detail']."&nbsp;[+]"; ?>
                            </div>
                            <div id="min<?php echo $so[$k]['product_id']; ?>" class="btn_desc" style="display:none;"
                            	onmouseover="document.getElementById(this.id).style.cursor='pointer';"
                            	onclick="$('#min<?php echo $so[$k]['product_id']; ?>').hide(); $('#max<?php echo $so[$k]['product_id']; ?>').show(); $('#desc<?php echo $so[$k]['pd_hotel_id']; ?>').hide(); ">
                         <?php echo $_WDS['btn_close']."&nbsp;[-]"; ?>
                            </div>
                            <?php
						} //End if
						if ($so[$k]['everyday'] <>"" && ($so[$k]['price'] <> 0 || $so[$k]['price'] <>"")){
						?>
                        <div style="clear:both; margin-left: 150px;"> 
                        	<?php echo $_WDS['so_price']; ?>: <?php echo so_price($so[$k]['price']); ?><br />
                            <?php echo $_WDS['expire_date']; ?>: <?php echo $so[$k]['everyday']; ?>
                        </div>
                        
                       <div class="btn_sent"><a class="menu" href="#" id="sent<?php echo $so[$k]['pd_hotel_id']; ?>" name="sent<?php echo $so[$k]['pd_hotel_id']; ?>" onclick="sendDoc('<?php echo $htl[$i]['hotel_id'];?>','<?php echo $htl[$i]['ht_name']; ?>','<?php echo $so[$k]['product_id']; ?>','<?php echo $so[$k]['pd_name']; ?>');"><?php echo $_WDS['btn_next']; ?></a></div>
			<?php 
						} //End if $so[$k]['price'] <> 0 || $so[$k]['price'] <>"")
						
					echo "</div>"; //close <div class="color_hot_deal" align="left">
					}	
				}	
				?>
            </div>
        </div>
    </div>
        <div id="close<?php echo $htl[$i]['hotel_id']; ?>" 
         <?php 
        if($i == 0) { echo "style='display:none;'";}
        else{ echo "style='display:block;'";}
		?>
        ><input type="image" src="pix/bar_h.png" value="-" border="0" onclick="$('#open<?php echo $htl[$i]['hotel_id']; ?>').show(); $('#close<?php echo $htl[$i]['hotel_id']; ?>').hide();" /></div>
</div>

<?php
}//end for($i=0; $i<count($htls); $i++)
?>
</div>

<form action="contact_us.php" id="so" name="so" method="post">
	<input type="hidden" id="htl_id" name="htl_id" value="" />
	<input type="hidden" id="pd_id" name="pd_id" value="" />
	<input type="hidden" id="pd_name" name="pd_name" value="" />
    <input type="hidden" id="ht_name" name="ht_name" value="" />
</form>
