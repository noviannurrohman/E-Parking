<?php
include "config/koneksi.php";
$idnya = $_GET['id'];
$queryKosongkanTempat = "DELETE FROM tb_daftar_parkir_biasa WHERE id_daftar_parkir_biasa = $idnya;";
if (mysqli_query($con, $queryKosongkanTempat)) {
?>
    <script>
        alert('Tempat Parkir Berhasil Dikosongkan');
        window.location = 'home_biasa.php';
    </script>
<?php
} else {
?>
    <script>
        alert('Gagal mengosongkan tempat parkir');
    </script>
<?php

}
