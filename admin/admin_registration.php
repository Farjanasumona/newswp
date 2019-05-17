<?php 
include "connection.php";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Registration Form | LMS </title>
    <link rel="stylesheet" type="text/css" href="style.css">
   

<style>
    body
    {
        width: 1365px;
        height:680px;
        margin-left: 0px;
        background-image: url("images/4.png");
        background-repeat: no-repeat;
    }
    .st_login
    {
        width: 400px;
        height: 500px;
        margin:60px 472.5px ;
        background-color: #000105;
        /*border:1px solid black;*/
        opacity:.6;
        filter:alpha(opacity=60);
        color: #ffffff;
    }
    p a
    {
        color:#ffffff;
        
    }
</style>
</head>


<body style="margin-top: -20px;">
<br>
    <div class="st_login">
    <div class="ttl text-center ">
        <h1 style="font-family:Lucida Console">Library Management System</h1>
    </div><br><br>


    <div class=" text-center" >

            <section  style="margin-top: -40px;">
                
                    <h2>Admin Registration Form</h2><br>

                    <form name="form" action="" method="post">

                        <input type="text" class="form-control" placeholder="FirstName" name="firstname" required=""/><br>  <br>

                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/><br><br>
                    
                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/><br><br>
                    
                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/><br><br>
                    
                        <input type="text" class="form-control" placeholder="E-mail" name="email" required=""/><br><br>
                    
                        <input type="text" class="form-control" placeholder="Contact" name="contact" required=""/><br><br>
                    
                        <button type="submit" name="submit" style="color:black"> <b>SIGN UP </b></button><br>
                    

                </form>
            </section>

			<?php 
			if(isset($_POST['submit']))
			{
				mysqli_query($db,"INSERT INTO `lms`.`admin` VALUES ('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]','44.png');");
				?>

                <script type="text/javascript">
                    alert("Registration successful");
                </script>
				
				<?php
			}	
			
			 ?>

    </div>
</div>
</body>
</html>
