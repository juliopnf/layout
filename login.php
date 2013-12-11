<?php
session_start(); //memulai session
include "koneksi.php";//mengambil isian username dan password dari form
$username = $_POST['username'];
$password = $_POST['password'];
if ($username == "" or $password == "")
{
echo "<div style='background-color:#FF6666; color:black'>Username dan Password tidak diisi</div>";
}
else{
//query untuk mengambil data user dari database sesuai dengan username inputan form
$q = "SELECT * FROM tbl_member1 WHERE username = '$username' ";
$result = mysql_query($q);
$data = mysql_fetch_array($result);
//cek kesesuaian password masukan dengan database
if ($password == $data['password']) {
//menyimpan tipe user dan username dalam session
$_SESSION['username'] = $data['username'];
include "profil.php";
}
//jika password tidak sesuai
else {
$warning = "Username / Password Salah";
echo $warning;
}
}
?> 
