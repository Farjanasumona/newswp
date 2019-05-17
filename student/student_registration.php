<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Registration Form | LMS </title>

  <!-- <link rel="stylesheet" type="text/css" href="style.css">-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <style>
    body
    {
        width: 1365px;
        height:800px;
        margin-left: 0px;
        background-image: url("images/10.png");
        background-repeat: no-repeat;
    }
    .st_login
    {
    width: 400px;
    margin:60px 472.5px ;
     padding: 27px 15px;
    background-color: #000105;
    opacity:.6;
    filter:alpha(opacity=60);
    color: #ffffff;
    }
    p a
    {
        color:#ffffff;

    }
    .form1
    {

    text-align: center;
    }

    .alert
    {background-color: rgb(34, 139, 34);}
</style>
</head>


<body style="margin-top: -10px;">
  <?php require_once('include1/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>

<br>
    <div class="st_login">
    <div class="ttl text-center ">
        <h1 style="font-family:Lucida Console">Library Management System</h1>
    </div><br><br>



    <div class=" text-center" >

            <section  style="margin-top: -60px;">

                    <h2>User Registration Form</h2><br>

                    <form class="form1" name="form1" action="" method="post">

                        <input type="text" class="form-control"  placeholder="FirstName" name="firstname" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="LastName" name="lastname" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="Username" name="username" required=""/><br><br>

                        <input type="password" class="form-control" placeholder="Password" name="password" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="E-mail" name="email" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="Contact" name="contact" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="Semester" name="sem" required=""/><br><br>

                        <input type="text" class="form-control" placeholder="Roll No" name="roll" required=""/><br><br>

                        <button type="submit" name="submit" style="color:black"> <b>SIGN UP </b></button><br><br>

                </form>
            </section>

			<?php
			if(isset($_POST['submit']))
			{
                $count=0;
                $sql="SELECT username from student";
                $res=mysqli_query($db,$sql);
                while($row=mysqli_fetch_assoc($res))
                {
                    if($row['username']==$_POST['username'])
                    {
                        $count=$count+1;
                    }
                }
                    if($count==0)
                    {
                    mysqli_query($db,"INSERT INTO `lms`.`student` VALUES ('', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]', '$_POST[email]', '$_POST[contact]', '$_POST[sem]', '$_POST[roll]','no','44.png','no');");
                            ?>


                        </div>
                            <br>
                            <div class="alert">
                      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                    <strong>Registration Successfully.</strong> You will get email when your account is approved.
                        </div>
                        <!--    <script type="text/javascript">
                                alert("Registration successful. You will get email when your account is approved.");
                            </script>-->
                            <?php
                    }
                    else
                    {
                        ?> <script type="text/javascript">
                            alert("This username is already exist.");
                        </script><?php
                    }
			}

			 ?>



</div>
</body>
</html>
