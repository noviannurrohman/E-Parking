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

  $query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir_biasa");
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
      $cek_kode = mysqli_num_rows(mysqli_query($con, "SELECT kode FROM tb_daftar_parkir_biasa WHERE kode='$kode'"));
      $cek_plat = mysqli_num_rows(mysqli_query($con, "SELECT plat_nomor FROM tb_daftar_parkir_biasa WHERE plat_nomor='$plat_nomor'"));

      if($cek_kode>=1) {
        $kode = "EP" . rand(100,999);
      }elseif ($cek_plat>=1) {
        echo "<script>alert('Kendaraan Tersebut Sudah Ada di Dalam Parkiran')</script>";
      }else{
        $sql = "INSERT INTO tb_daftar_parkir_biasa(kode, plat_nomor, jenis, merk, jam_masuk, hitung_jam_masuk, status) VALUES('$kode', '$plat_nomor', '$jenis', '$merk', '$jam_masuk', '$hitung_jam_masuk', '1')";
        $query = mysqli_query($con, $sql);        
        echo "<script>document.location.href='print_biasa.php?nama=$username&plat_nomor=$plat_nomor'</script>";
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
                <img src="asset/img/logo.png" class="img-circle" alt="logo" style="float: left;margin-top: -10px;" width="45px"/>
                 <b style="float: left;margin-left: 4px;">E-Parking</b>
                </div>

              <ul class="nav navbar-nav search-nav" style="margin-left: 7%">
          <li><a href="home.php?nama=<?= $username ?>"><span  style="font-size: 18pt">Parkir VIP</a></span></li>
          <li class="active"><a href="home_biasa.php?nama=<?= $username ?>" style="font-size: 18pt">Parkir Biasa</a></li>
          <li><a href="daftar_kendaraan.php?nama=<?= $username ?>"><span style="font-size: 18pt">Daftar Kendaraan</a></span></li>
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
                      <h4 style="color: white;font-size: 20pt;">Masuk Parkir <span class="right" style="color : #f6c700; font-weight: bold; text-align: right; padding-right: 10px;">Empty : <?= $cek_sisa ?></span></h4>
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
                                <input id="radio1" type="radio" name="jenis" value="Motor" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Motor
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio2" type="radio" name="jenis" value="Mobil" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Mobil
                              </label>
                            </div>

                            <div class="form-animate-radio">
                              <label class="radio">
                                <input id="radio3" type="radio" name="jenis" value="Truk/Bus/Lainnya" required/>
                                <span class="outer">
                                  <span class="inner"></span>
                                </span> Truk / Bus / Lainnya
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
    <div class="col-md-5" style="margin-top: 30px">
      <div class="col-md-10 panel">
        <div class="col-md-12 panel-heading bg-teal">
          <h4 style="color: white;font-size: 20pt;">Keluar Parkir</h4>
        </div>
        <div class="col-md-12 panel-body" style="padding-bottom:25px;">
          <div class="col-md-12">
            <form class="cmxform" action="keluar_parkir_biasa.php" method="POST">
              <div class="col-md-12">
                <div class="form-group form-animate-text" style="margin-top:25px !important;">
                  <span class="bar"></span>
                  <?php
                  $queryGetAllParkir = "SELECT * FROM tb_daftar_parkir_biasa WHERE status = '1'";
                  $executeGetAllParkir = mysqli_query($con, $queryGetAllParkir);
                  ?>
                  <select name="id_daftar_parkir_biasa">
                    <?php
                    while ($keluarr = mysqli_fetch_array($executeGetAllParkir)) {
                    ?>
                      <option value="<?= $keluarr['id_daftar_parkir_biasa'] ?>">Tempat Parkir <?= $keluarr['id_daftar_parkir_biasa'] ?> - <?= $keluarr['plat_nomor'] ?> - <?= $keluarr['jenis'] ?> <?= $keluarr['merk'] ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
              <button class="btn btn-primary col-md-12" type="submit" value="Submit" style="height: 40px" name="submit" id="btnKeluar" style="height: 40px">Submit</button>
            </form>
            <div class="modal-footer">
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
      </div>
      <!-- end:Modal -->
    </div>
  </div>
  </div>
  </div>
  <!-- end:Keluar Parkir -->

              <!-- Daftar Kendaraan Yang Parkir -->          
                <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 20px;">
                  <div class="col-md-12 panel">
                    <div class="col-md-12 panel-heading bg-teal">
                      <h4 style="color: white;font-size: 20pt;">Daftar Kendaraan Biasa <span class="right" style="color : #9B2335; font-weight: bold; text-align: right; padding-right: 10px;">Terisi : <?= $cek_isi ?></span></h4>
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
                        $sql = "SELECT * FROM tb_daftar_parkir_biasa WHERE status = '1'";
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


              <!-- end:Daftar Kendaraan Yang Parkir -->              
      </div>
      <!-- end: Content -->

<script>
  // var kodeKeluar = document.getElementById('kode_keluar');

  $("#btnKeluar").click(function(){
    var kode = document.getElementById("kode")
    if($(kode).val() == "") $(kode).focus();
    else{
    $("#myModal").modal('show');
    }
  })

  $("#btnKeluar").click(function(){
    $.ajax({
    url : 'config/showdata.php',
    type : 'POST',
    data : "kode=" + $("#kode_keluar").val(),
    dataType : 'html',
    success:function(hasil){
      if(hasil != 0){
        $("#total").val(hasil);
      }else{
        alert('hasil');
      }
    }
    });
  });
</script>


</body>
</html>