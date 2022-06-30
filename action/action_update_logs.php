<?php
session_start();

$iduser = $_GET['id'];
include 'koneksi.php';


$logs = $_POST['logs'];



$insert = $koneksi->query("UPDATE `logs` set `isi` = '$logs' where id_logs = '$iduser';");


if ($insert === true) {
?>
    <script type="text/javascript">
        window.alert("Edit Berhasil!");
        location.replace('../views/admin_logs.php');
    </script>
<?php
}

// header('location:../views/contributor_portofolio.php');
