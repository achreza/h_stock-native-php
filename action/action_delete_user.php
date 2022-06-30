<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];


$sql = "DELETE FROM user where id_user = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/admin_landing.php");
