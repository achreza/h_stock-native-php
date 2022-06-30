<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';

$foto = $_POST['foto'];
$katalog = $_POST['katalog'];




$insert = $koneksi->query("INSERT INTO `h-stock`.`list_katalog` (`id_foto`, `id_katalog`) VALUES ('$foto', '$katalog');");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/katalog_manager.php');
    </script>
<?php
}
