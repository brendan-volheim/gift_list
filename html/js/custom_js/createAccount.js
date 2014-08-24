$("#dialog").dialog({ autoOpen: false });
$("#createAccountBtn").click(function(){ create_dialog();});
$("#createAccountBtn1").click(function(){ create_dialog();});
$("#createAccountBtn2").click(function(){ create_dialog();});

create_dialog = function(){
  $("#dialog").css("visibility", "visible");
  $("#dialog").dialog({
    height: 400,
    width: 550,
    modal: true,
    buttons: {
      "Create Account": function(){
        if($("#first_name_input").val() == ""){
	  $("#error_message").text("First Name is Required");
	  return;
	}else if($("#last_name_input").val() == ""){
	  $("#error_message").text("Last Name is Required");
	  return;
	}else if($("#username_input").val() == ""){
	  $("#error_message").text("Username is Required");
	  return;
	}else if($("#password_input1").val() == ""){
	  $("#error_message").text("Password is Required");
	  return;
	}else if($("#password_input2").val() == ""){
	  $("#error_message").text("Duplicate Password is Required");
	  return;
	}

	if($("#password_input1").val() !== $("#password_input2").val()){
          $("#error_message").text("Passwords do not match");
	  return;
	}
	post_data = {
	  "first_name": $("#first_name_input").val(),
	  "last_name": $("#last_name_input").val(),
	  "uname": $("#username_input").val(),
	  "password": $("#password_input1").val()
	};
	$.ajax({
          url: "/gift_list/index.php/api/create_user",
          type: 'POST',
	  contentType: "application/json",
	  dataType: "json",
          data: JSON.stringify(post_data),
          success: function(result) {
            $("#create_account_msg").text("Account has been created.");
            alert("Your account has been created. You can add gifts to your list, but you cannot see others gifts until the admin adds you to a family. This will be done within 24 hours. Thanks");
            $("#dialog").dialog( "close" );	
          }
        });
      },
      Cancel: function() {
        $("#dialog").dialog( "close" );
      }
    }
  });
  $("#dialog").dialog("open");
};
