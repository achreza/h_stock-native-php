<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';

$bank = $_POST['bank'];



$insert = $koneksi->query("INSERT INTO `h-stock`.`bank` (`nama_bank`) VALUES ('$bank');");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_bank.php');
    </script>
<?php
}
