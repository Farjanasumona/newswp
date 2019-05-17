<?php
session_start();
include "connection2.php";
 ?>


<?php require_once('include/top.php'); ?>

<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
    width: 100%;
    height: 300px;
  }
  </style>


</head>
  <body>

   <div class="fullbody">
        <?php require_once('include/navbar.php'); ?>

        <?php require_once('include/jumbotron.php'); ?>

        <section>
            <div class="container">
                <div class="row">
                  <div class="col-md-3">


                    <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Librarian of RUET Library</h3>
                          </div>
                          <div class="panel-body">
                            <div class="thumbnail">
                              <img src="images/unknown.png" alt="Librarian">
                              <div class="caption">
                                <h4>Md. Rafiqul Islam</h4>
                                <p><a href="#" class="btn btn-success" role="button">Details</a></p>
                              </div>
                            </div>
                          </div>
                        </div>

                           <!--<div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">Librarian of  RUET Library</h3>
                          </div>
                          <div class="panel-body">
                            <div class="thumbnail">
                              <?php

                                if(isset($_SESSION['login_user']))
                                  {$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]'");
                                    $row=mysqli_fetch_assoc($q);
                                    $_SESSION['pic']=$row['image'];
                                  }

                                      if(isset($_SESSION['login_user']))
                                        {

                                          echo "<div class='pic text-center'><img class='img-circle profile_img' height=250 width=250 src='admin/images/".$_SESSION['pic']."'></div> ";
                                          ?>
                                          <div class="caption">
                                            <h4 style="text-align:center;"><?php echo $_SESSION['login_user'];?></h4>
                                          </div>
                                          <?php
                                        }
                                      else
                                      {
                                          echo "<div class='pic'><img class='img-circle profile_img' height=250 width=250 src=images1/unknown.png> </div><br>";
                                          ?>

                                            <div class="caption">
                                              <h4 style="text-align:center;">Librarian</h4>
                                            </div>
                                            <?php

                                          } ?>






                            </div>
                          </div>
                        </div>-->



                        <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-road"></i> Contact</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <li class="list-group-item list-group-item-active"><i class="fa fa-address-book" aria-hidden="true"></i>
<span> Email Address:</span> Librarian, Rajshahi University of Engineering & Technology, Kazla, Rajshahi-6204, Bangladesh.</li>
                              <li class="list-group-item list-group-item-success"><i class="fa fa-fax" aria-hidden="true"></i>
<span> Fax:</span> +88 (0721) 750105</li>
                              <li class="list-group-item list-group-item-warning"><i class="fa fa-phone" aria-hidden="true"></i>
<span> (Ph) PABX:</span> +88 (721) 750742-3, 751320-1</li>
                              <li class="list-group-item list-group-item-danger"><i class="fa fa-at" aria-hidden="true"></i>
<span> Website:</span> www.ruet.ac.bd/Library</li>
                              <li class="list-group-item list-group-item-info"><i class="fa fa-envelope" aria-hidden="true"></i>
<span> E-mail:</span> ruetlibrary@ruet.ac.bd</li>
                            </ul>
                          </div>
                        </div>
                       </div>




                    <div class="col-md-9">

                      <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title">RUET Library Management System</h3>
                          </div>
                          <div class="panel-body">
                            The ruet central library is established in 2003 and situated at the middle of the RUET campus. It has own two separate two-storied modern building approximately 16000 square feet in space. the library hosts a vast and diverse collection of books and journals with a lot of reference collection. there are various sections in this library. it also includes Internet browsing facilities with WIFI technology to facilitate research and academic activities of students, faculty members and researchers.
                          </div>
                          <!--<a href="#" class="btn btn-success">See All News</a>-->
                        </div>




                      <div class="row">
                          <div class="col-md-12">
                           <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                              <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                              </ol>
                              <div class="carousel-inner" role="listbox">
                                <div class="item active">
                                  <img src="images1/pic1.jpg" alt="picture 1">
                                  <div class="carousel-caption">
                                    picture 1
                                  </div>
                                </div>
                                <div class="item">
                                  <img src="images1/img1.jpg" alt="picture 2">
                                  <div class="carousel-caption">
                                    picture 2
                                  </div>
                                </div>
                                <div class="item">
                                  <img src="images1/img2.jpg" alt="picture 3">
                                  <div class="carousel-caption">
                                    picture 3
                                  </div>
                                </div>
                              </div>
                              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                              </a>
                              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                              </a>
                            </div>
                       </div>

                      </div>


                       <div class="row">
                           <div class="col-md-6">
                               <div class="panel panel-success">
                          <div class="panel-heading">
                              <h3 class="panel-title"><i class="fa fa-book" aria-hidden="true"></i>For Students</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <a href="student/guide.php" class="text-active"><li class="list-group-item list-group-item-active">Guide For New Users</li></a>

                              <a href="student/message.php" class="text-success"><li class="list-group-item list-group-item-success">Ask a Librarian</li></a>

                              <a href="student/report.php" class="text-warning"><li class="list-group-item list-group-item-warning">Give Feedback</li></a>

                              <a href="student/books.php" class="text-danger"><li class="list-group-item list-group-item-danger">Books</li></a>

                              <a href="download/index.php" class="text-info"><li class="list-group-item list-group-item-info">Learning Support & Important Notes</li></a>
                            </ul>
                          </div>
                        </div>
                           </div>
                           <div class="col-md-6">
                               <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-address-book" aria-hidden="true"></i>
 For Teachers</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                                <a href="upload/upload.php" class="text-active"><li class="list-group-item list-group-item-active">Upload Important Notes For Students</li></a>

                              <a href="download/index.php" class="text-success"><li class="list-group-item list-group-item-success">Download Important Notes</li></a>

                              <a href="#" class="text-warning"><li class="list-group-item list-group-item-warning">Books</li></a>

                              <a href="#" class="text-danger"><li class="list-group-item list-group-item-danger"></li></a>

                              <a href="#" class="text-info"><li class="list-group-item list-group-item-info"></li></a>
                            </ul>
                          </div>
                        </div>
                           </div>
                       </div>

                       <div class="row">
                           <div class="col-md-6">
                               <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-flask" aria-hidden="true"></i>For Reasearcher</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                                <a href="#" class="text-active"><li class="list-group-item list-group-item-active"></li></a>

                              <a href="#" class="text-success"><li class="list-group-item list-group-item-success"></li></a>

                              <a href="#" class="text-warning"><li class="list-group-item list-group-item-warning"></li></a>

                              <a href="#" class="text-danger"><li class="list-group-item list-group-item-danger"></li></a>

                              <a href="#" class="text-info"><li class="list-group-item list-group-item-info"></li></a>
                            </ul>
                          </div>
                        </div>
                           </div>
                           <div class="col-md-6">
                               <div class="panel panel-success">
                          <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-reorder" aria-hidden="true"></i> About Us</h3>
                          </div>
                          <div class="panel-body">
                            <ul class="list-group">
                                <a href="#" class="text-active"><li class="list-group-item list-group-item-active"></li></a>

                              <a href="#" class="text-success"><li class="list-group-item list-group-item-success"></li></a>

                              <a href="#" class="text-warning"><li class="list-group-item list-group-item-warning"></li></a>

                              <a href="#" class="text-danger"><li class="list-group-item list-group-item-danger"></li></a>

                              <a href="#" class="text-info"><li class="list-group-item list-group-item-info"></li></a>
                            </ul>
                          </div>
                        </div>
                           </div>
                       </div>

                        <div class="nothing">
                            <hr>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <?php require_once('include/footer.php'); ?>
        </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
  </body>
</html>
