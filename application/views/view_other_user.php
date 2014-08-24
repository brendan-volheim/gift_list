<style>
  .backgrid tr:hover {
     background-color:#C0C0C0 
  }
</style>
<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div id="grid_div"></div>

<div id="dialog" title="Opt To Purchase">
  <div id="gift_name"></div>
  <div id="dialog_quantity">
  	<br />How many would you like to purchase: 
	<div class="form-group" id="quantity">
        	<select class="form-control" id="quantity_select">
                	<option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                </select>
  	</div>
  </div>
</div>

<script type="text/javascript">
  gridObj = new grid_obj();
  gridObj.create_grid("other_list", "/gift_list/index.php/api/other_gift_list?user=<?php echo $other_user; ?>");
</script>
