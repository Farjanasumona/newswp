 <?php 
    session_start(); 

     ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		nav
		{
			float: right;
		}
		li a:hover
		{color:#8aeeff;}
		
		header .h
		{   float:left;
			padding-left: 30px;
			padding-top: 10px;
			width: 550px;
		}
		.h img
		{
			padding-top:15px;
			float: left;}

		.h h3
		{
			float: right;
		}
		.wrapper
{
	
	width: 1365px;
	height: 757px;
	margin: -17px;
}

	</style>
</head>
<body>
	<div class="wrapper">
		<header>
			<div class="navigation" style="background-color: #191616">
				<br>
				<div class="h">
				<img src="images/99.png">
				<br><br><br><br><h3 style="color: white">ONLINE LIBRARY MANAGEMENT SYSTEM</h3></div>
				<nav>

					<ul>
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="admin_login.php">ADMIN-LOGIN</a></li>
						<li><a href="report.php">FEEDBACK</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section>
			<div class="section1"></div>
		</section>
	</div>
</body>
</html>
<?php 
include "footer.php";
 ?>