<?php
    session_start();
    include "connection.php";
     ?>


<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
              <div class="col-xs-2"><img src="images1/ruet-monogram-5846x7000.png" alt="ruet-monogram"></div>
              <div class="col-xs-10">Heaven's Light is Our Guide</div>
          </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav navbar-right">
            <li><a href="../home.php"><i class="fa fa-home"></i> Home</a></li>
            <li> <a href="books.php"> <i class="fa fa-address-book"></i>Books</a>  </li>
            <li> <a href="profile.php"> <i class="fa fa-address-book"></i>Myprofile</a>  </li>
            <li> <a href="report.php"> <i class="fa fa-address-card"></i>Feedback</a>  </li>



          <?php
                                if(isset($_SESSION['login_user']))
                                {

                                  $sql="SELECT COUNT(status) as total FROM messages where status='no' and who='admin'";
                                    $res=mysqli_query($db,$sql);
                                    $row=mysqli_fetch_assoc($res);

                                  ?>


                                    <li><a href="message.php"><span  class="glyphicon glyphicon-envelope"></span><span class="badge bg-green"><?php echo $row["total"]; ?></span></a></li>
                                      <li><a href="display_student_info.php">Student-Info</a></li>

                                      <li><a href="admin_logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>


                                  <?php

                                }
                                else
                                {
                                  ?>


                                    <li><a href="admin_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

                                  <?php
                                }
                              ?>

                              <li>
                                   <p id="clock"></p>
                                   <p id="date"></p>

                                   <script type="text/javascript">

                                   function clock()
                                   {
                                     var date=new Date();
                                     var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
                                     var months = ["Jan","Feb","March","April","May","June","July","August","September","October","November","December"];
                                     var hhour=date.getHours();
                                     var hour=hhour;
                                     hour=date.getHours()%12;
                                     var minute=date.getMinutes();
                                     var second=date.getSeconds();

                                     minute = checkTime(minute);
                                     second = checkTime(second);
                                      var t = check(hhour);

                                     document.getElementById('clock').innerHTML=hour+":"+minute+":"+second+" "+t;
                                     document.getElementById('date').innerHTML=days[date.getDay()]+", "+date.getUTCDate()+"-"+months[date.getUTCMonth()]+"-"+date.getUTCFullYear();
                                  }

                                  function checkTime(i)
                                  {
                                      if(i<10)
                                      {
                                         i="0"+i;
                                      }


                                      return i;
                                  }
                                       function check(i)
                                       {
                                           if(i>=12)
                                               i="PM";
                                           else
                                               i="AM";
                                           return i;
                                       }

                                   setInterval(clock,1000);

                                   </script>

                              </li>

                                </ul>




        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
