<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div style="clear:both;"></div>
<div id="add_new_div" style="width:800px; margin:0 auto;">
	<form class="form-signin" role="form" method="post" action="/gift_list/index.php/add_user_class">
		<table style="width:100%">
			<tr>
				<td style="padding:10px;" align="middle"> <h4><label> Username: </label></h4></td><td>
					<input class="form-control" name="user_name" />
				</td>
			</tr><tr>
				<td style="padding:10px;" align="middle"> <h4><label> Class Name: </label></h4></td><td>
					<input class="form-control" name="class_name" />
			</tr><tr>
				<td colspan="2" align="middle" style="padding:10px;">
					<button class="btn btn-lg btn-primary btn-block">Add To Class</button>
				</td>
			</tr>
		</table>
	</form>
</div>
