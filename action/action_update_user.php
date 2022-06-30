<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$role = $_POST['role'];



$insert = $koneksi->query("UPDATE `h-stock`.`user` SET `username`='$username', `password`='$password', `email`='$email', `id_role`='$role' WHERE  `id_user`=$iduser;");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_landing.php');
    </script>
<?php
}

// header('location:../views/contributor_portofolio.php');
