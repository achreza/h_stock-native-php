<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';

$role = $_POST['role'];



$insert = $koneksi->query("INSERT INTO `h-stock`.`role` (`nama_role`) VALUES ('$role');");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_role.php');
    </script>
<?php
}
