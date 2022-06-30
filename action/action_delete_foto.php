<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];





$sql = "DELETE FROM foto where id_foto = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/contributor_portofolio.php");
