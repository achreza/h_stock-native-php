<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];


$sql = "DELETE FROM logs where id_logs = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/admin_logs.php");
