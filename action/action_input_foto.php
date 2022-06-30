<?php
session_start();
$id = $_SESSION['id'];
include 'koneksi.php';
// $namafoto = $_POST['namafoto'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];
$keyword = $_POST['keyword'];



$targetDir = "../img/foto/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("INSERT INTO `h-stock`.`foto` (`nama_foto`, `tanggal_upload`, `harga_foto`, `keyword`, `deskripsi`, `id_user`) VALUES ('$fileName', NOW(), '$harga', '$keyword', '$deskripsi','$id');");
        }
    }
}



if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Input Berhasil!");
        history.back();
    </script>
<?php
}

// header('location:../views/contributor_landing.php');
