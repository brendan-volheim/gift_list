<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div style="clear:both;"></div>
<div id="add_new_div" style="width:800px; margin:0 auto;">
	<form class="form-signin" role="form" method="post" action="<?php echo $action ?>">
		<table style="width:100%">
			<tr>
				<td style="padding:10px;" align="middle"> <h4><label> Gift Name: </label></h4></td><td>
					<input class="form-control" name="gift_name" <?php if(isset($gift_data['gift_name'])) :?>value='<?php echo $gift_data['gift_name'];?>'<?php endif; ?>/>
				</td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4> <label> Gift Description: </label></h4></td><td>
					<input class="form-control" name="gift_description" <?php if(isset($gift_data['gift_description'])) :?>value='<?php echo $gift_data['gift_description'];?>'<?php endif; ?>/>
				</td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4> <label> Size: </label></h4></td><td>
					<input class="form-control" name="size" <?php if(isset($gift_data['size'])) :?>value='<?php echo $gift_data['size'];?>'<?php endif; ?>/></td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4> <label> URL: </label></h4></td><td>
					<input class="form-control" name="url"<?php if(isset($gift_data['url'])) :?>value='<?php echo $gift_data['url'];?>'<?php endif; ?>/></td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4> <label> Price: </label></h4> </td><td>
					<input class="form-control" name="price"<?php if(isset($gift_data['price'])) :?>value='<?php echo $gift_data['price'];?>'<?php endif; ?>/></td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4> <label> Quantity: </label></h4> </td><td>
					<input class="form-control" name="quantity" <?php if(isset($gift_data['quantity'])) :?>value='<?php echo $gift_data['quantity'];?>'<?php endif; ?>/></td>
			</tr><tr>
				<td colspan="2" align="middle" style="padding:10px;">
					<button class="btn btn-lg btn-primary btn-block"><?php echo $button_title; ?></button>
				</td>
			</tr>
		</table>
	</form>
</div>
