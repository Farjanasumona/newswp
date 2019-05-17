<?php 
include "connection.php";
include "top-nav.php"
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Change password | LMS </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    body
    {
        width: 1300px;
        height: 650px;
        background-image: url("images/7.jpg");
         background-repeat: no-repeat;
    }
    .ttl
    {
        width: 400px;
        height: 400px;
        margin:60px 450px ;
        padding: 27px 15px;
        background-color: #10100f;
        opacity:.6;
        filter:alpha(opacity=60);
        color: #ffffff;
    }
</style>
    </head>



    <body >
        <div class="ttl">
        <div class=" text-center ">
            <h1 style="font-family:Lucida Console">Library Management System</h1>
        </div>

        <br>

        <div class="login_wrapper text-center" >

            <section class="login_content">
                <form name="form1" action="" method="post">
                    <h1>Change Your Password</h1><br>

                    
                        <input type="text" name="username" class="form-control" placeholder="Username" required=""/><br><br>
                    
                        <input type="password" name="password" class="form-control" placeholder="New Password" required=""/><br><br>
                    

                       <input class="btn btn-default submit " style="width: 60px" type="submit" name="submit" value="SAVE"><br><br>
            
                        
                </form>
            </section>
            </div> </div>
                <?php 
                if(isset($_POST['submit']))
                {
                     $username = $_POST['username'];
                     $password = $_POST['password'];
                     $sql = "UPDATE admin SET password='$password' WHERE username='$username';";
                     if (mysqli_query($db, $sql)) {
                        
                        ?>
                            <div class="alert text-center">
                            <strong>Record updated successfully</strong>
                            </div>
                        <?php
                       
                    }
                     else {
                        ?>
                            <div class="alert text-center" style="background-color: red">
                            <strong>Error updating record </strong>
                            </div>
                        <?php
                    }

}
                ?>

       
    </body>
</html>
