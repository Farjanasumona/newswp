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
		body .wrap
		{
			
			width: 1365px;
			height: 800px;
			margin: -17px;
		}
		.section1
		{
			margin-top: 0px;
			width: 100%;
			height: 550px;
			background-image: url("images/1.jpg");
		}
		.box1
		{
			width: 600px;
			height: 300px;
			margin:55px auto;
			background-color: #000000;
			opacity:.7;
    		filter:alpha(opacity=60);
    		color :#fff;
		}
		
	
	</style>
</head>
<body>
	<div class="wrap">
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
						<li><a href="student_login.php">STUDENT-LOGIN</a></li>
						
						<li><a href="report.php">FEEDBACK</a></li>
					</ul>
				</nav>
			</div>
		</header>

		<section>
			<div class="section1">
				<br><br><br><br>
				<div class="box1">
					<br>
					<h1 style="text-align: center;font-size: 35px;padding: 15px">Welcome to Library!</h1>
					<br>
					<h2 style="text-align: center;">Opening time: 09:00 am</h2><br>
					<h2 style="text-align: center;">Closing time: 03:00 pm</h2><br>
					<h2 style="text-align: center;">Sat-Wed</h2>
				</div>
				
			</div>
		</section>

		<?php 
		include "footer.php"; 
		?>
	</div>
</body>
</html>