<?php
    include "connection.php";
     ?>

<?php require_once('include/top.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Login Form | LMS </title>

    <style>
.wrapper
{
    width: 1365px;
    height:650px;
    margin:-39.9px 0px;
    background-image: url("images/3.jpg");
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
a:hover {
    color: #f9f428;
text-decoration: none;}

.alert
{background-color: rgb(241, 7, 7);}
p a
{
    color:#ffffff;

}
  </style>

</head>

<body>
  <?php require_once('include1/navbar.php'); ?>

  <?php require_once('include/jumbotron.php'); ?>

<div class="wrapper">
<br>
<div class="st_login">
<div class="ttl text-center ">
    <h1 style="font-family:Lucida Console">Library Management System</h1>
</div><br>

<div class="login_wrapper text-center" >

    <section class="login_content">
        <form name="form1" action="" method="post">
            <h3>User Login Form</h3>
                <br>

                <input type="text" name="username" class="form-control" placeholder="Username" required=""/><br>

                <input type="password" name="password" class="form-control" placeholder="Password" required=""/><br>


                <button type="submit" name="submit" style="color: black"><b>LOGIN</b></button><br><br>


            <div class="separator">

                <p class="change_link">
                    <a class="reset_pass" href="change-pass.php">Lost your password?&nbsp &nbsp &nbsp &nbsp &nbsp

                    </a>New to site?
                    <a href="student_registration.php"> Create Account </a>
                </p>
                <br/>

            </div>
        </form>

    </section>

</div>
<?php

    if(isset($_POST['submit']))
            {
                $count=0;
                $i=0;
                $res=mysqli_query($db,"select * from student where username='$_POST[username]' && password='$_POST[password]' && status='yes';");
                    $count=mysqli_num_rows($res);
                    if($count==0)
                    {
                    ?>
                        <div class="alert text-center">
                        <strong>Invalid Username or Password</strong>
                        </div>
                    <?php
                    }
                    else
                    {

                        $_SESSION['login_user'] = $_POST['username'];

                        $q=mysqli_query($db,"UPDATE student SET active_status='yes' WHERE username='$_POST[username]';");
                        $i=1;
                        ?>

                            <script type="text/javascript">window.location="books.php"</script>

                        <?php
                    }
            }
 ?>
 </div>
</div>
</body>
</html>
