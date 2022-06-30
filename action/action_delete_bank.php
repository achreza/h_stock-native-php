<?php
session_start();
include "koneksi.php";
$id = $_GET['id'];
$username = $_SESSION['username'];


$sql = "DELETE FROM bank where id_bank = '$id'";

$a = $koneksi->query($sql);



header("location: ../views/admin_bank.php");
