<!DOCTYPE html>
<html lang="en">
<head>
	<title>Christmas Gift List</title>
	<link href="/gift_list/html/css/bootstrap.min.css" rel="stylesheet">
	<link href="/gift_list/html/css/sb-admin.css" rel="stylesheet">
	<link href="/gift_list/html/css/FontAwesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="/gift_list/html/js/backgrid-0.3.5/lib/backgrid.min.css" rel="stylesheet">
	<link href="/gift_list/html/js/backgrid-select-all/backgrid-select-all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">

	<script src="/gift_list/html/js/jquery.min.js"></script>
	<script src="/gift_list/html/js/underscore.js"></script>
	<script src="/gift_list/html/js/backbone-min.js"></script>
	<script src="/gift_list/html/js/bootstrap.min.js"></script>
	<script src="/gift_list/html/js/custom_js/grid.js"></script>
	<script src="/gift_list/html/js/backgrid-0.3.5/lib/backgrid.min.js"></script>
	<script src="/gift_list/html/js/backgrid-select-all/backgrid-select-all.min.js"></script>
	<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
	<style>
	html {
		position: relative;
		min-height: 100%;
	}
	body {
		/* Margin bottom by footer height */
		min-height:100%;
		margin-bottom: 60px;
	}
       .footer {
               position: absolute;
               bottom: 0;
               width: 100%;
               /* Set the fixed height of the footer here */
               height: 60px;
               background-color: #f5f5f5;
       }
       .footer .container {
               width: auto;
               padding: 0 15px;
       }
       .footer .container .row .text-muted {
               margin: 20px 0;
        }
	</style>
</head>
<body>
    <div id="wrapper">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                        <div class="navbar-header">
                                <a class="navbar-brand" href="/gift_list/index.php/home"><i class="fa fa-gift"></i> Gift List</a>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                                <ul class="nav navbar-nav navbar-right navbar-user">
					<li>
                    				<a href="#" class="dropdown-toggle" ><i class="fa fa-user"></i> <?php echo $uname; ?></a>
                			</li>
					<li>
                            			<a href="/gift_list/index.php/logout" id="logoutBtn"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
					</li>
            			</ul>
			</div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
                		<ul class="nav navbar-nav side-nav" style="margin-top:10px;">
                    			<?php if($active == "home") :?>
					<li class="active">
					<?php else : ?>
					<li>
					<?php endif; ?>
                        			<a href="/gift_list/index.php/home"><i class="fa fa-list-ol"></i> My Gift List</a>
                    			</li>
                    			<?php if($active == "other") :?>
					<li class="active">
					<?php else : ?>
					<li>
					<?php endif; ?>
                        			<a href="/gift_list/index.php/select_others"><i class="fa fa-search"></i> See Other's Gifts</a>
                    			</li>
                    			<?php if($active == "purchase") :?>
					<li class="active">
					<?php else : ?>
					<li>
					<?php endif; ?>
                        			<a href="/gift_list/index.php/my_purchases"><i class="fa fa-usd"></i> See Gifts I'm Purchasing</a>
                    			</li>
                		</ul>
            		</div>
		</nav>
<div id="page-wrapper" style="height:820px;padding:15px;">
