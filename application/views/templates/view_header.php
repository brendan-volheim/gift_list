<!DOCTYPE html>
<html lang="en">
<head>
	<title>XMas Gift List</title>
	<link href="/gift_list/html/css/bootstrap.min.css" rel="stylesheet">
	<link href="/gift_list/html/css/sb-admin.css" rel="stylesheet">
	<link href="/gift_list/html/css/FontAwesome/css/font-awesome.min.css" rel="stylesheet">
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
					<li class="dropdown">
                    				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $uname; ?><b class="caret"></b></a>
                    					<ul class="dropdown-menu">
                       					 	<li>
                            						<a href="/gift_list/index.php/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        					</li>
                    					</ul>
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
                        			<a href="/gift_list/index.php/other_gifts"><i class="fa fa-search"></i> See Other's Gifts</a>
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
<div id="page-wrapper" style="height:1000px;">	
