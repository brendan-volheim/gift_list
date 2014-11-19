function grid_obj(){
  this.DeleteCell = Backgrid.Cell.extend({
    template: _.template('<button>Delete Gift</button>'),
    events: {
      "click": "removeGift"
    },
    removeGift: function (e) {
      if(gridObj.grid_type == "purchases"){
        $.ajax({
          url: "/gift_list/index.php/api/delete_user_gift?gift_id="+this.model.attributes['gift_id']+"&user="+this.model.attributes['uname']+"&quantity=-"+this.model.attributes['quantity'],
    	  type: 'GET',
    	  success: function(result) {
	    gridObj.grid.remove();
	    gridObj.create_grid(gridObj.grid_type, gridObj.grid_url);
          }
        });
      }else{
        $.ajax({
          url: '/gift_list/index.php/api/delete_gift?id='+this.model.attributes['id'],
    	  type: 'GET',
    	  success: function(result) {
	    gridObj.grid.remove();
	    gridObj.create_grid(gridObj.grid_type, gridObj.grid_url);
          }
        });
      }
    },
    render: function () {
      this.$el.html(this.template());
      this.delegateEvents();
      return this;
    }
  });

  this.UpdateCell = Backgrid.Cell.extend({
    template: _.template('<button>Update Gift</button>'),
    events: {
      "click": "updateGift"
    },
    updateGift: function (e) {
      document.location.href = "/gift_list/index.php/add_gift/?id="+this.model.attributes['id'];
    },
    render: function () {
      this.$el.html(this.template());
      this.delegateEvents();
      return this;
    }
  });

  this.removeClassCell = Backgrid.Cell.extend({
    template: _.template('<button>Remove From Group</button>'),
    events: {
      "click": "selectFn"
    },
    selectFn: function (e) {
      document.location.href = "/gift_list/index.php/api/admin_modify_class?uid="+this.model.attributes['uid']+"&cid="+this.model.attributes['cid']+"&action=remove";
    },
    render: function () {
      this.$el.html(this.template());
      this.delegateEvents();
      return this;
    }
  });

  this.selectCell = Backgrid.Cell.extend({
    template: _.template('<button>Select</button>'),
    events: {
      "click": "selectFn"
    },
    selectFn: function (e) {
      document.location.href = "/gift_list/index.php/select_user?id="+this.model.attributes['id']+"&name="+this.model.attributes['first_name']+" "+this.model.attributes['last_name']+"&uname="+this.model.attributes['uname'];
    },
    render: function () {
      this.$el.html(this.template());
      this.delegateEvents();
      return this;
    }
  });

  this.purchaseCell = Backgrid.Cell.extend({
    template: _.template('<button>Opt to Purchase</button>'),
    events: {
      "click": "purchaseFn"
    },
    purchaseFn: function (e) {
      gridObj.quantity_greater_than_zero = 0;
      gridObj.selectedQuantity = 1;
      gridObj.selectedGift = this.model.attributes['id'];
      $("#gift_name").html("You have opted to purchase: <b>"+this.model.attributes['gift_name']+"</b>");
      if((this.model.attributes['quantity'] - this.model.attributes['purchased']) > 1){
	quantity_html="";
	for (i = 0; i < (this.model.attributes['quantity'] - this.model.attributes['purchased']); i++) {
	  quantity_html += "<option>"+(i+1)+"</option>";
	}	
	$("#quantity_select").html(quantity_html);
        gridObj.quantity_greater_than_zero = 1;
      }else{
        $("#dialog_quantity").hide();
      }
      gridObj.dialog.dialog({
        height: 300,
        width: 460,
        modal: true,
        buttons: {
          "Opt to Purchase": function(){
            if(gridObj.quantity_greater_than_zero == 1){
	      gridObj.selectedQuantity = $("#quantity_select").val();
            }
            document.location.href = "/gift_list/index.php/purchase_gift?gift_id="+gridObj.selectedGift+"&quantity="+gridObj.selectedQuantity;
          },
          Cancel: function() {
            gridObj.dialog.dialog( "close" );
          }
        }
      });
      gridObj.dialog.dialog("open");
    },
    render: function () {
      this.$el.html(this.template());
      this.delegateEvents();
      return this;
    }
  });

  this.column_map = {
    "gift_list":[
	{name: "gift_name", label: "Gift", cell: "string", editable: false},
	{name: "gift_description", label: "Description", cell: "string", editable: false},
	{name: "size", label: "Size", cell: "string", editable: false},
	{name: "price", label: "Price", cell: "string", editable: false},
	{name: "url", label: "Link", cell: "uri", editable: false},
	{name: "quantity", label: "Quantity", cell: "string", editable: false},
        {name: "updateGift", label: "", cell: this.UpdateCell},
        {name: "deleteGift", label: "", cell: this.DeleteCell}
      ],
    "other_class":[
	{name: "selectUser", label: "", cell: this.selectCell},
        {name: "first_name", label: "First Name", cell: "string", editable: false},
        {name: "last_name", label: "Last Name", cell: "string", editable: false}
     ],
    "other_list":[
	{name: "gift_name", label: "Gift", cell: "string", editable: false},
	{name: "gift_description", label: "Description", cell: "string", editable: false},
	{name: "size", label: "Size", cell: "string", editable: false},
	{name: "price", label: "Price", cell: "string", editable: false},
	{name: "url", label: "Link", cell: "uri", editable: false},
	{name: "purchased", label: "Purchased", cell: "string", editable: false},
	{name: "quantity", label: "Quantity", cell: "string", editable: false},
        {name: "purchaseGift", label: "", cell: this.purchaseCell}
    ],
    "purchases":[
	{name: "gift_name", label: "Gift", cell: "string", editable: false},
	{name: "gift_description", label: "Description", cell: "string", editable: false},
	{name: "size", label: "Size", cell: "string", editable: false},
	{name: "price", label: "Price", cell: "string", editable: false},
	{name: "url", label: "Link", cell: "uri", editable: false},
	{name: "quantity", label: "Quantity", cell: "string", editable: false},
	{name: "gift_owner", label: "Gift For", cell: "string", editable: false},
        {name: "deleteGift", label: "", cell: this.DeleteCell}
    ],
    "admin":[
        {name: "first_name", label: "First Name", cell: "string", editable: false},
        {name: "last_name", label: "Last Name", cell: "string", editable: false},
        {name: "uname", label: "User Name", cell: "string", editable: false},
        {name: "class_name", label: "Groups", cell: "string", editable: false},
        {name: "removeClass", label: "", cell: this.removeClassCell}
     ]
  };

  this.setup_dialog = function(){
    this.dialog = $("#dialog").dialog({ autoOpen: false });
  }

  this.create_grid = function(grid_type, url){
    if(grid_type == "other_list"){
      this.setup_dialog();
    }
    this.grid_type = grid_type;
    this.grid_url = url;
    var Grid = Backbone.Model.extend({});

    var GridCollection = Backbone.Collection.extend({
      model: Grid,
      url: url
    });

    var grids = new GridCollection();
    this.grid = new Backgrid.Grid({
      columns: this.column_map[grid_type],
      collection: grids
    });

    $("#grid_div").append(this.grid.render().el);

    grids.fetch({reset: true});
  }
}
