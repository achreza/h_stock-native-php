<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];





$sql = "DELETE FROM list_katalog where id_foto = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/katalog_manager.php");
