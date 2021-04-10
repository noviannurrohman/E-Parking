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
$idparkir = $_POST['id_daftar_parkir_biasa'];

session_start();
if (($_SESSION['role'] != "petugas")) {
    echo "<script>alert('Login Dulu Haked');document.location.href='index.php'</script>";
}

$kode = "EP" . rand(100, 999);

$query = mysqli_query($con, "SELECT * FROM tb_daftar_parkir_biasa where status = '1'");
$queryMasihKosong = mysqli_query($con, "SELECT * FROM tb_daftar_parkir_biasa where status = '0'");
$cek_kosong = mysqli_num_rows($queryMasihKosong);
$cek_isi = mysqli_num_rows($query);
$cek_sisa = 100 - $cek_isi;

if (isset($_GET['logout'])) {
    session_destroy();

    echo "<script>document.location.href='index.php'</script>";
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
                    <li class="active"><a style="font-size: 18pt">Home</a></li>
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

    <!-- Daftar Kendaraan Yang Parkir -->
    <div class="col-md-12 col-sm-12 col-x-12" style="margin-top: 90px;">
        <div class="col-md-12 panel">
            <div class="col-md-12 panel-heading bg-teal">
                <h4 style="color: white;font-size: 20pt;">Detail Kendaraan Keluar</h4>
            </div>
            <div class="panel-body">
                <?php
                $queryGetPelanggan = "SELECT * FROM tb_daftar_parkir_biasa WHERE id_daftar_parkir_biasa = $idparkir";
                $executeQuery = mysqli_query($con, $queryGetPelanggan);
                while ($getPL = mysqli_fetch_array($executeQuery)) {
                    $jamMasuk = $getPL['hitung_jam_masuk'];
                    $jamkeluar = date('H:i');
                    $jamMolor = date('H') - $jamkeluar;
                    $jamkeluarr = strtotime($jamkeluar);
                    $jamKeluarFix = date('H', $jamkeluarr);
                    $tarifBayar = $jamKeluarFix - $jamMasuk;
                    $tarifBayarDuit = 3000 * $tarifBayar;
                    if ($jamMolor > 0) {
                        $denda = 1000 * $jamMolor;
                    } else {
                        $denda = 0;
                    }
                    $totalBayar = $tarifBayarDuit + $denda;
                ?>
                    <h3 style="margin-top: 10px">Plat Nomor : <?= $getPL['plat_nomor'] ?></h3>
                    <h3>Jenis : <?= $getPL['jenis'] ?></h3>
                    <h3>Merk : <?= $getPL['merk'] ?></h3>
                    <h3>Jam Masuk : <?= $getPL['jam_masuk'] ?></h3>
                    <h3>Jam Keluar : <?= $jamkeluar ?> </h3>
                    <h3>Tarif <?= $tarifBayarDuit ?></h3>
                    <h3>Denda <?= $denda ?></h3>
                    <h3>Total Pembayaran <?= $totalBayar ?></h3>
                <?php
                    $idparkirnya = $getPL['id_daftar_parkir_biasa'];
                }
                ?>
                <a class="btn btn-success" href="proses_keluar_parkir_biasa.php?id=<?= $idparkirnya ?>">Keluarkan Kendaraan</a>
                <a href="home_biasa.php" class="btn btn-danger">Batalkan Transaksi</a>
            </div>
        </div>
    </div>

    <!-- end:Daftar Kendaraan Yang Parkir -->
    </div>
    <!-- end: Content -->

</body>

</html>