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

<?php
include "config/koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$username = $_GET['nama'];

session_start();
if(($_SESSION['role'] != "petugas")){
  echo "<script>alert('Login Dulu Haked');document.location.href='index.php'</script>";
}

  $kode = "EP" . rand(100,999);

  $query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir");
  $cek_isi = mysqli_num_rows($query);
  $cek_sisa = 100-$cek_isi;

  if (isset($_GET['logout'])){
    session_destroy();

    echo "<script>document.location.href='index.php'</script>";
  }

  if (isset($_POST['btn_masuk'])) {
    
    $plat_nomor = $_POST['plat_nomor'];
    $merk = $_POST['merk'];
    $jam_masuk = date('H:i');
    $hitung_jam_masuk = date('H');
    $jenis = $_POST['jenis'];

    $select_isi = mysqli_num_rows($query);
    if ($select_isi >= 200) {
      echo "<script>alert('Parkiran Sudah Penuh')</script>";
    }
    else{
      $sisa = 200 - $seleksi_isi;
      $cek_kode = mysqli_num_rows(mysqli_query($con, "SELECT kode FROM tb_daftar_parkir WHERE kode='$kode'"));
      $cek_plat = mysqli_num_rows(mysqli_query($con, "SELECT plat_nomor FROM tb_daftar_parkir WHERE plat_nomor='$plat_nomor'"));

      if($cek_kode>=1) {
        $kode = "EP" . rand(100,999);
      }elseif ($cek_plat>=1) {
        echo "<script>alert('Kendaraan Tersebut Sudah Ada di Dalam Parkiran')</script>";
      }else{
        $sql = "INSERT INTO tb_daftar_parkir(kode, plat_nomor, jenis, merk, jam_masuk, hitung_jam_masuk, status) VALUES('$kode', '$plat_nomor', '$jenis', '$merk', '$jam_masuk', '$hitung_jam_masuk', '1')";
        $query = mysqli_query($con, $sql);        
        echo "<script>document.location.href='print.php?nama=$username&plat_nomor=$plat_nomor'</script>";
      }
    }
  }

 ?>

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
                        <a href="index.html" class="nav-brand"><h2 style="color: white; font-family: Arial Black";>Halaman Daftar Kendaraan</h2></a>

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
                                    <li><a href="member.php" style="font-family: Elephant";>Daftar</a></li>
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
                 <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-teal">
                      <h4 style="color: white;font-size: 20pt;">Daftar Kendaraan <span class="right" style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi : <?= $cek_isi ?></span></h4>
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
                    <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0">
                    <thead>
                      <tr style="font-size: 13pt">
                        <th style="max-width: 120px;">Kode</th>
                        <th style="max-width: 250px;">Plat Nomor</th>
                        <th>Jenis</th>
                        <th>Merk</th>
                        <th style="max-width: 200px;">Jam Masuk</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $sql = "SELECT * FROM tb_daftar_parkir WHERE status = '1'";
                        $query = mysqli_query($con, $sql);

                        while ($data = mysqli_fetch_array($query)) {?>
                      <tr style="font-size: 11pt">
                        <td><?php echo $data['kode'] ?></td>
                        <td><?php echo $data['plat_nomor'] ?></td>
                        <td><?php echo $data['jenis'] ?></td>
                        <td><?php echo $data['merk'] ?></td>
                        <td><?php echo $data['jam_masuk'] . " WIB" ?></td>
                      </tr>
                      <?php } ?>
                    </tbody>
                  </table>
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