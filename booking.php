<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Parking</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.min.css">
  <script type="text/javascript" src="asset/js/jquery.min.js"></script>
  <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>


  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css"/>
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/mediaelementplayer.css"/>
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->
  <link rel="shortcut icon" href="asset/img/logo.png">

    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Halam Booking User</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/logo.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-circle"></div>
        <div class="preloader-img">
            <img src="img/core-img/logo.png" alt="">
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">

        <!-- ***** Top Header Area ***** -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                            <!-- Top Header Content -->
                            <div class="top-header-meta d-flex">
                                <!-- Login -->
                                <div class="login">
                                    <a href="loginmember.php" style="color: white; font-family: Arial Black";><i class="fa fa-user" aria-hidden="true"></i> <span>Log Out</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- ***** Navbar Area ***** -->
        <div class="alazea-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="alazeaNav">

                        <!-- Nav Brand -->
                        <a href="index.html" class="nav-brand"><h2 style="color: white; font-family: Arial Black";>Halaman Booking User</h2></a>

                        <!-- Navbar Toggler -->
                       
                        <!-- Menu -->
                        
                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Navbar Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="member.php" style="font-family: Elephant";>Home</a></li>
                                    <li><a href="booking.php" style="font-family: Elephant";>Booking</a></li>
                                    <li><a href="data.php" style="font-family: Elephant";>Data</a></li>
                                </ul>
                            </div>
                            <!-- Navbar End -->
                        </div>
                    </nav>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Hero Area Start ##### -->
    <section class="hero-area">
        <div class="hero-post-slides owl-carousel">

            <!-- Single Hero Post -->
            <div class="single-hero-post bg-overlay">
                <!-- Post Image -->
                <div class="slide-img bg-img" style="background-image: url(img/bg-img/p.jpg);"></div>
                <div class="container h-100">
                   
                          <div id="content">
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>

            <!-- Masuk Parkir -->
                <div class="col-md-12" style="margin-right: 100px;">
                  <div class="col-md-10 panel">
                    <div class="col-md-12 panel-heading bg-teal">
                      <h4 style="color: white;font-size: 20pt;">Masuk Parkir <span class="right" style="color : #ffffff; font-weight: bold; text-align: right; padding-right: 10px;"></span></h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:25px;">
                      <div class="col-md-12">
                        <form class="cmxform" method="POST">
                          <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:15px !important;">
                              <input type="text" class="form-text" name="plat_nomor" id="plat_nomor" required>
                              <span class="bar"></span>
                              <label>Plat Nomor</label>
                            </div>

                            <div class="form-group form-animate-text" style="margin-top:10px !important;">
                              <input type="text" class="form-text" name="merk" id="merk" required>
                              <span class="bar"></span>
                              <label>Merk Kendaraan</label>
                            </div>
                          </div>

                          <div class="col-md-6" style="padding-top: 10px">
                            <label><h4>Jenis Kendaraan</h4></label>
                          </div>

                          <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">
                

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio2" type="radio" name="jenis" value="Mobil" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Mobil
                              </label>
                            </div>

                        <form class="cmxform" method="POST">
                          <div class="col-md-12">
                            <div class="form-group form-animate-text" style="margin-top:9px !important;">
                              <input type="time" class="form-text" name="kode" id="kode_keluar" required>
                              <span class="bar"></span>
                              <label>Jam Keluar</label>
                            </div>
                          </div>
                          </div>
                          <input class="submit btn btn-primary col-md-12" type="submit" value="Submit" style="height: 40px" name="btn_masuk">
                      </form>
                    </div>
                  </div>
                </div>
              </div>

                </div>
            </div>

           
                          

            <!-- Single Hero Post -->
            
    </section>
    
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDiUgfO_EMGmXgf8UtttT-CcnnOlMwEjgw&callback=initMap"></script>
            <!-- <hr> -->
    </section>
    <!-- ##### Blog Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area bg-img" style="background-color: rgb(173, 216, 230);">
        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row">

                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="footer-logo mb-30">
                                <a href="#"><h2 style="color: white;">WEB APLIKASI PARKIR</h2></a>
                            </div>
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>


                    <!-- Single Footer Widget -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="single-footer-widget">
                            <div class="widget-title">
                                <h5>CONTACT</h5>
                            </div>

                            <div class="contact-information">
                                <p><span>Address:</span> Jl. Soekarno Hatta No. 9 Lowokwaru, Malang, Jaawa Timur</p>
                                <p><span>Phone:</span> 083876918770</p>
                                <p><span>Email:</span> WebAplikasiParkir990@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="border-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Files ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>