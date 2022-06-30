<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';


$katalog = $_POST['namakatalog'];



$insert = $koneksi->query("UPDATE `katalog` set `nama_katalog` = '$katalog' where id_katalog = '$iduser';");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_katalog.php');
    </script>
<?php
}

// header('location:../views/contributor_portofolio.php');
