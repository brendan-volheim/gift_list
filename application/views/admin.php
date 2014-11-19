<style>
  .backgrid tr:hover {
     background-color:#C0C0C0 
  }
</style>
<div style="float:left;"><h2><?php echo $title ?> <small><?php echo $subtitle ?></small></h2></div>
<div style="float:right;margin-right:50px;"><br/>
  <form method="GET" action="/gift_list/index.php/add_to_class">
    <button id="add-to-group" class="btn btn-primary" type="submit"><i class="fa fa-plus"></i> Add To Group</button>
  </form>
</div>
<div id="grid_div" style="margin-left:30px;width:400px;"></div>


<script type="text/javascript">
  gridObj = new grid_obj();
  gridObj.create_grid("admin", "/gift_list/index.php/api/admin_list");
</script>
