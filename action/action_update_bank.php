<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';


$bank = $_POST['namabank'];



$insert = $koneksi->query("UPDATE `bank` set `nama_bank` = '$bank' where id_bank = '$iduser';");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_bank.php');
    </script>
<?php
}

// header('location:../views/contributor_portofolio.php');
