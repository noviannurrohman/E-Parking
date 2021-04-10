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
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/font-awesome.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/animate.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/nouislider.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/select2.min.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/bootstrap-material-datetimepicker.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/simple-line-icons.css" />
  <link rel="stylesheet" type="text/css" href="asset/css/plugins/mediaelementplayer.css" />
  <link href="asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->
  <link rel="shortcut icon" href="asset/img/logo.png">

</head>

<?php
include "config/koneksi.php";
date_default_timezone_set("Asia/Jakarta");
$username = $_GET['nama'];

session_start();
if (($_SESSION['role'] != "petugas")) {
  echo "<script>alert('Login Dulu Haked');document.location.href='index.php'</script>";
}

$kode = "EP" . rand(100, 999);

$query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir where status = 'ada'");
$queryMasihKosong = mysqli_query($con, "SELECT * FROM tb_daftar_parkir where status = 'kosong'");
$cek_kosong = mysqli_num_rows($queryMasihKosong);
$cek_isi = mysqli_num_rows($query1);
$cek_sisa = 100 - $cek_isi;

if (isset($_GET['logout'])) {
  session_destroy();

  echo "<script>document.location.href='index.php'</script>";
}

if (isset($_POST['btn_masuk'])) {
  $tempat_parkir = $_POST['id_daftar_parkir'];
  $plat_nomor = $_POST['plat_nomor'];
  $merk = $_POST['merk'];
  $jam_masuk = date('H:i');
  $jamKeluar = $_POST['jam_keluar'];
  $hitung_jam_masuk = date('H');
  $jenis = $_POST['jenis'];

  $select_isi = mysqli_num_rows($query);
  if ($queryMasihKosong < 1) {
    echo "<script>alert('Parkiran Sudah Penuh')</script>";
  } else {
    $cek_kode = mysqli_num_rows(mysqli_query($con, "SELECT kode FROM tb_daftar_parkir WHERE kode='$kode'"));
    $cek_plat = mysqli_num_rows(mysqli_query($con, "SELECT plat_nomor FROM tb_daftar_parkir WHERE plat_nomor='$plat_nomor'"));

    if ($cek_plat >= 1) {
      echo "<script>alert('Kendaraan Tersebut Sudah Ada di Dalam Parkiran')</script>";
    } else {
      $sql = "UPDATE tb_daftar_parkir set kode = '$kode', plat_nomor = '$plat_nomor', jenis = '$jenis',merk = '$merk', jam_masuk = '$jam_masuk',hitung_jam_masuk = '$hitung_jam_masuk', status = 'ada',jam_keluar = '$jamKeluar' WHERE id_daftar_parkir = '$tempat_parkir'";
      $query = mysqli_query($con, $sql);
      echo "<script>document.location.href='printmember.php?nama=$username&plat_nomor=$plat_nomor'</script>";
    }
  }
}
?>

<body style="overflow-x: hidden;" class="dashboard topnav">
  <!-- start: Header -->
  <nav class="navbar navbar-default header navbar-fixed-top bg-teal">
    <div class="col-md-12 nav-wrapper">
      <div class="navbar-header" style="width:100%;">
        <div class="navbar-brand" style="margin-left: -10px;" name="home_logo">
          <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px" />
          <b style="float: left;margin-left: 4px;">E-Parking</b>
        </div>

        <ul class="nav navbar-nav search-nav" style="margin-left: 7%">
          <li class="active"><a style="font-size: 18pt">Parkir VIP</a></li>
          <!-- <li><a href="home_biasa.php" style="font-size: 18pt">Parkir Biasa</a></li>
          <li><a href="daftar_kendaraan.php?nama=<?= $username ?>"><span style="font-size: 18pt">Daftar Kendaraan</a></span></li> -->
        </ul>

        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="user-name"><span><?php echo $username ?></span></li>
          <li class="dropdown avatar-dropdown">
            <img src="asset/img/petugas.png" class="img-circle avatar" alt="username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="cursor: pointer;" />
            <ul class="dropdown-menu user-dropdown">
              <li>
                <ul>
                  <a href="?nama=<?= $username ?>&logout">
                    <li style="float: left;"><span class="fa fa-power-off "></span></li>
                    <li style="color: black; float: left;margin-left: 10px">Log Out</li>
                  </a>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end: Header -->

  <!-- Content -->
  <div id="content">
    <!-- Masuk Parkir -->
    <div class="col-md-7" style="margin-top: 30px;">
      <div class="col-md-10 panel">
        <div class="col-md-12 panel-heading bg-teal">
          <h4 style="color: white;font-size: 20pt;">Booking Parkir Member<span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : <?= $cek_kosong ?></span></h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:25px;">
          <div class="col-md-12">
            <form class="cmxform" method="POST">
              <?php
              $queryCekParkiran = "SELECT * FROM tb_daftar_parkir WHERE status = 'kosong'";
              $executeCekParkiran = mysqli_query($con, $queryCekParkiran);

              ?>
              <div class="col-md-6">
                <div class="form-group form-animate-text" style="margin-top:15px !important;">
                  <select name="id_daftar_parkir" id="id_daftar_parkir">
                    <?php
                    while ($parkir = mysqli_fetch_array($executeCekParkiran)) {
                    ?>
                      <option value="<?= $parkir['id_daftar_parkir'] ?>">Parkiran Nomor <?= $parkir['id_daftar_parkir'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <span class="bar"></span>
                </div>

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

                <div class="form-group form-animate-text" style="margin-top:10px !important;">
                  <h4>Jam Keluar</h4>
                  <input type="time" class="form-text" name="jam_keluar" id="jam_keluar" required>
                  <span class="bar"></span>
                </div>
              </div>

              <div class="col-md-6" style="padding-top: 10px">
                <label>
                  <h4>Jenis Kendaraan</h4>
                </label>
              </div>

              <div class="col-md-6" style="padding:5px 20px 0 25px" name="jenis_kendaraan">

                <div class="form-animate-radio">
                  <label class="radio">
                    <input id="radio1" type="radio" name="jenis" value="Motor" required />
                    <span class="outer">
                      <span class="inner"></span>
                    </span> Motor
                  </label>
                </div>

                <div class="form-animate-radio">
                  <label class="radio">
                    <input id="radio2" type="radio" name="jenis" value="Mobil" required />
                    <span class="outer">
                      <span class="inner"></span>
                    </span> Mobil
                  </label>
                </div>
              </div>
              <input class="submit btn btn-primary col-md-12" type="submit" value="Submit" style="height: 40px" name="btn_masuk">
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- end:Masuk Parkir -->
    
    <!-- Keluar Parkir -->
    
  </div>
  </div>
  </div>
  <!-- end:Keluar Parkir -->

  <!-- Daftar Kendaraan Yang Parkir -->
  <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
    <div class="col-md-12 panel">
      <div class="col-md-12 panel-heading bg-teal">
        <h4 style="color: white;font-size: 20pt;">Daftar Kendaraan VIP<span class="right" style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi : <?= $cek_isi ?> | Tersedia : <?= $cek_kosong ?></span> </h4>
      </div>
      <div class="panel-body">
        <div class="table-responsive col-md-12 col-sm-12 col-xs-12">
          <table class="table table-hover col-md-12 col-sm-12 col-xs-12" width="100%" cellspacing="0">
            <thead>
              <tr style="font-size: 13pt">
                <th style="max-width: 100px;">Tempat Parkir Nomor</th>
                 <th>Kode</th>
                <th style="max-width: 250px;">Plat Nomor</th>
                <th>Jenis</th>
                <th>Merk</th>
                <th>Durasi Parkir</th>
                <th style="max-width: 200px;">Jam Masuk</th>
                <th style="max-width: 200px;">Jam Keluar</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql = "SELECT * FROM tb_daftar_parkir WHERE status = 'ada'";
              $query = mysqli_query($con, $sql);
              $durasi = $data['jam_keluar'] - $data['jam_masuk'];
              while ($data = mysqli_fetch_array($query)) { ?>
                <tr style="font-size: 11pt">
                  <td><?php echo $data['id_daftar_parkir'] ?></td>
                  <td><?php echo $data['kode'] ?></td>
                  <td><?php echo $data['plat_nomor'] ?></td>
                  <td><?php echo $data['jenis'] ?></td>
                  <td><?php echo $data['merk'] ?></td>
                  <td><?php echo $durasi ?></td>
                  <td><?php echo $data['jam_masuk'] . " WIB" ?></td>
                  <td><?php echo $data['jam_keluar'] . " WIB" ?></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


  <!-- end:Daftar Kendaraan Yang Parkir -->


  </div>
  <!-- end: Content -->



</body>

</html>