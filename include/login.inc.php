<?php
session_start();
require_once "autoload.inc.php";

if (!isset($_POST["submit"])) {
    header("location:../index.php");
    exit;
}
$nama = $_POST ["input ke 1"];
$email = $_POST ["input ke 2"];
$pwd = $_POST ["input ke 3"];

try {
    $user = new Userctrl($nama,$email,$pwd);
} catch (Exception $e) {
    echo "Exception caught: " . $e->getMessage();
    header("location:../index.php");
    echo "<script>alert('input tidak valid')</script>";
    exit;
}

if (!$user->cekValidObjData()) {
    echo "User data is not valid.";
    header("location:../index.php");
    echo "<script>alert('Belum Terdaftar')</script>";
    exit;
}

$_SESSION["akun user"]= $user->getAkun();
$_SESSION["nama user"]= $user->getNama();
echo "Session variables set. Akun user: " . $_SESSION["akun user"] . ", Nama user: " . $_SESSION["nama user"];

header("location:../index.php");
echo "<script>alert('login berhasil')</script>";
exit;

