<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';


$role = $_POST['namarole'];



$insert = $koneksi->query("UPDATE `role` set `nama_role` = '$role' where id_role = '$iduser';");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_role.php');
    </script>
<?php
}

// header('location:../views/contributor_portofolio.php');
