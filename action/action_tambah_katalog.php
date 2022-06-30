<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';

$katalog = $_POST['katalog'];



$insert = $koneksi->query("INSERT INTO `h-stock`.`katalog` (`nama_katalog`) VALUES ('$katalog');");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_katalog.php');
    </script>
<?php
}
