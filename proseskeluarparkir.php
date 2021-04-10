<?php
include "config/koneksi.php";
$idnya = $_GET['id'];
$queryKosongkanTempat = "UPDATE tb_daftar_parkir SET plat_nomor = '', jenis = '', merk = '', jam_masuk = '', hitung_jam_masuk = '', hitung_jam_keluar = '', status = 'kosong', jam_keluar = '' WHERE id_daftar_parkir = $idnya";
if (mysqli_query($con, $queryKosongkanTempat)) {
?>
    <script>
        alert('Tempat Parkir Berhasil Dikosongkan');
        window.location = 'home.php?nama=admin';
    </script>
<?php
} else {
?>
    <script>
        alert('Gagal mengosongkan tempat parkir');
    </script>
<?php

}
