<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];


$sql = "DELETE FROM role where id_role = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/admin_role.php");
