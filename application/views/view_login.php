<!DOCTYPE html>
<html lang="en">
<head>
	<title>XMas Gift List</title>
	<link href="/gift_list/html/css/bootstrap.min.css" rel="stylesheet">
  	<link href="/gift_list/html/css/view_specific/view_login.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
</head>
<body>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="/gift_list/html/images/slide1.jpg" alt="First Slide">
          <div class="container">
            <div class="carousel-caption">
              <h1>Merry Christmas.</h1>
              <p>Manage your family gift list!</p>
              <p><a class="btn btn-lg btn-primary" href="#" id="createAccountBtn" role="button">Create Account</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/gift_list/html/images/slide2.jpg" alt="Second Slide">
          <div class="container">
            <div class="carousel-caption">
              <p><a class="btn btn-lg btn-primary" href="#" id="createAccountBtn1" role="button">Create Account</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="/gift_list/html/images/slide3.jpg" alt="Third Slide">
          <div class="container">
            <div class="carousel-caption">
              <p><a class="btn btn-lg btn-primary" href="#" id="createAccountBtn2" role="button">Create Account</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    
  	<div class="container">
      <form class="form-signin" role="form" method="post" action="/gift_list/">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input class="form-control" placeholder="User Name" required autofocus name="email" style="margin-bottom:10px;">
        <input type="password" class="form-control" placeholder="Password" required name="password">
        <button class="btn btn-lg btn-primary btn-block">Sign in</button>
      </form>
    </div>

<div id="dialog" title="Create An Account" style="visibility:hidden">
  <b> Fill in the following information to create an account: </b><br />
  <table width="100%">
    <tr>
      <td><label>First Name</label>
      </td><td>
        <input class="form-control" placeholder="First Name" required autofocus id="first_name_input" style="margin-bottom:10px;">
      </td>
    </tr><tr>
      <td><label>Last Name</label>
      </td><td>
        <input class="form-control" placeholder="Last Name" required autofocus id="last_name_input" style="margin-bottom:10px;">
      </td>
    </tr><tr>
      <td><label>Username</label>
      </td><td>
        <input class="form-control" placeholder="Username" required autofocus id="username_input" style="margin-bottom:10px;">
      </td>
    </tr><tr>
      <td><label>Password</label>
      </td><td>
        <input type="password" class="form-control" placeholder="Password" required autofocus id="password_input1" style="margin-bottom:10px;">
      </td>
    </tr><tr>
      <td><label>Re-Enter Password</label>
      </td><td>
        <input type="password" class="form-control" placeholder="Password" required autofocus id="password_input2" style="margin-bottom:10px;">
      </td>
    </tr>
  </table>
  <div id="error_message" style="margin-left:20px;color:red"></div>
</div>

<script src="/gift_list/html/js/jquery.min.js"></script>
<script src="/gift_list/html/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<script src="/gift_list/html/js/custom_js/createAccount.js"></script>
</body>
</html>
