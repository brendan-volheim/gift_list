<style>
  .backgrid tr:hover {
     background-color:#C0C0C0 
  }
</style>
<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div id="grid_div" style="margin-left:30px;"></div>


<script type="text/javascript">
  gridObj = new grid_obj();
  gridObj.create_grid("purchases", "/gift_list/index.php/api/purchases?user=<?php echo $uname; ?>");
</script>
