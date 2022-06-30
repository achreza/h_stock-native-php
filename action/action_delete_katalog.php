<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];


$sql = "DELETE FROM katalog where id_katalog = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/admin_katalog.php");
