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
            <li> <a href="../admin/admin_login.php"> <i class="fa fa-address-book"></i>Admin Login</a>  </li>
            <li> <a href="../student/student_login.php"> <i class="fa fa-address-book"></i>Student Login</a>  </li>
            <li> <a href="../student/student_registration.php"> <i class="fa fa-address-card"></i>Student Signup</a>  </li>


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
