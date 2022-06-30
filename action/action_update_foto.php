<?php
session_start();

$idfoto = $_GET['id'];
include 'koneksi.php';
// $namafoto = $_POST['namafoto'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$keyword = $_POST['keyword'];



$insert = $koneksi->query("UPDATE `h-stock`.`foto` SET  `tanggal_upload`=NOW(), `harga_foto`='$harga', `keyword`='$keyword', `deskripsi`='$deskripsi' WHERE  `id_foto`='$idfoto';");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
    </script>
<?php
}

header('location:../views/contributor_portofolio.php');
