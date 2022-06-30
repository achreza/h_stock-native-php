<?php
session_start();
include 'koneksi.php';
$id = $_SESSION['id'];
$username = $_SESSION['username'];
$idfoto = $_GET['id'];
$harga = $_POST['harga'];
$bank = $_POST['bank'];
$keyword = $_POST['keyword'];


$isi = $username . " Membeli Foto dengan ID = " . $idfoto . " sebesar $" . $harga;

$insert = $koneksi->query("INSERT INTO `h-stock`.`pembayaran` (`id_buyer`, `id_foto`, `id_bank`, `detail_pembayaran`) VALUES ('$id', '$idfoto', '$bank', 'Total bayar : $harga');");

$logs = $koneksi->query("INSERT INTO `h-stock`.`logs` (`isi`, `tanggal`, `id_user`) VALUES ('$isi', NOW(), '$id');");

$conpayment = $koneksi->query("UPDATE `h-stock`.`conpayment` SET `download`=download+1, `pendapatan`=pendapatan + $harga WHERE  `id_foto`=$idfoto;");

if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Input Berhasil!");
        history.back();
    </script>
<?php
}

header('location:../views/buyer_landing.php');
