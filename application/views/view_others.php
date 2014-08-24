<style>
  .backgrid tr:hover {
     background-color:#C0C0C0 
  }
</style>
<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div id="grid_div" style="margin-left:30px;width:400px;"></div>


<script type="text/javascript">
  gridObj = new grid_obj();
  gridObj.create_grid("other_class", "/gift_list/index.php/api/class_users?user=<?php echo $uname; ?>");
</script>
