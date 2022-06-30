<?php
session_start();
$id = $_SESSION['id'];
include 'koneksi.php';

$nama = $_POST['nama'];
$country = $_POST['country'];




$targetDir = "../img/profil/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);


if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'webp');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $insert = $koneksi->query("UPDATE `profil` SET `nama`='$nama', `country`='$country', `foto`='$fileName' WHERE  `id_user`='$id';");
        }
    }
}

if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        history.back();
    </script>
<?php
}

// header('location:../views/contributor_landing.php');
