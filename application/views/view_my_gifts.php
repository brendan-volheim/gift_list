<style>
  .backgrid tr:hover {
     background-color:#C0C0C0 
  }
</style>
<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div style="float:right;margin-right:50px;"><br/>
  <form method="GET" action="/gift_list/index.php/add_gift/">
    <button id="add-new-btn" class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add New Gift</button>
  </form>
</div>
<div id="grid_div"></div>


<script type="text/javascript">
  gridObj = new grid_obj();
  gridObj.create_grid("gift_list", "/gift_list/index.php/api/gift_list?user=<?php echo $uname; ?>");
</script>
