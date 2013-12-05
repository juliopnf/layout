<?php

include"koneksi.php";

$user=$_POST['user'];
$pass=$_POST['pass'];
$course=$_POST['course'];
$f_name=$_POST['first_name'];
$l_name=$_POST['last_name'];
$name=$f_name."".$l_name;

$tgl=$_POST['tgl'];
$bln=$_POST['bln'];
$year=$_POST['year'];
$fulldate=$tgl."-".$bln."-".$year;
$jenis_kelamin=$_POST['jk'];

$email=$_POST['email'];
$no_hp=$_POST['no_hp'];
$alamat=$_POST['alamat'];
 $emailPattern = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
   $phonePaterrns = '/^\d{4}([\-]\d{8})?$/';

echo"<br>";
$cek_username=mysql_num_rows(mysql_query ("SELECT * from tbl_member where username='$_POST[user]'"));
// Kalau username sudah ada yang pakai

if(empty($user)  || empty($pass)|| empty($course)||empty($name)||empty($fulldate)||empty($jenis_kelamin)||empty($email)||empty($no_hp)||empty($alamat))

{

echo "<div style='background-color:#FF6666; color:black'>Data masih belum lengkap</div>";
echo"<a href='index.php'>back to home</a>";

}else if($cek_username > 0)
{
 echo "<div style='background-color:#FF6666; color:black'>Username sudah ada yang pakai Ulangi lagi</div>";
 echo"<a href='index.php'>back to home</a>";

}else if(!preg_match($emailPattern, $email))
{
echo  "<div style='background-color:#FF6666; color:black'> Invalid email</div>";
}else if (!preg_match($phonePaterrns, $no_hp)){
echo "<div style='background-color:#FF6666; color:black'>format nomor phone salah</div>";
echo"<a href='index.php'>back to home</a>";
}else{

$sql = "INSERT INTO tbl_member (username,password,course,nama,tgl_lahir,jenis_kelamin,email,no_hp,alamat) VALUES ('$user', '$pass','$course','$name','$fulldate','$jenis_kelamin','$email','$no_hp','$alamat')";

$run=mysql_query($sql);
echo "
<link rel='stylesheet' type='text/css' href='main.css' />
<script type='text/javascript' src='jquery-1.2.3.pack.js'></script>
<script type='text/javascript' src='jquery.validate.pack.js'></script>
<style type='text/css'>
* { font: 11px/20px Verdana, sans-serif; }
h4 { font-size: 18px; }
input { padding: 3px; border: 1px solid #999; }
input.error, select.error { border: 1px solid red; background-color: #FFCCCC; }
label.error { color:red; margin-left: 10px; }
td { padding: 5px; }
</style>
";
echo"<table width='600px'  cellspacing='0' border='1' border-color:black; style='-moz-border-radius-topright: 10px;background:#FFFF80;
	-moz-border-radius-bottomright: 10px;
	-moz-border-radius-bottomleft: 10px;
	-moz-border-radius-topleft: 10px;
	-webkit-border-top-right-radius: 10px;
	-webkit-border-bottom-right-radius: 10px;
	-webkit-border-bottom-left-radius: 10px;
	-webkit-border-top-left-radius: 10px;
	border-top-right-radius: 10px;
	border-bottom-right-radius: 10px;
	border-bottom-left-radius:10px;
	border-top-left-radius: 10px; padding=5px '>
	<tr>
	<td colspan='2'  valign='bottom'  style='font: 30px/40px Verdana, sans-serif;'>
 		<div id='hd'></div> Kartu Verivikasi Pendaftaran</td>
	</tr>
	<tr>
		<td width='296'>User Name</td>
		<td width='258'>$user</td>
	</tr>
	<tr>
		<td bgcolor='#FF6600' >Nama Lengkap</td><td bgcolor='#FF6600'>$name</td>
	</tr>
	<tr>
		<td >Jenis Kelamin</td><td>$jenis_kelamin</td>
	</tr>
	<tr>
		<td bgcolor='#FF6600'>Tgl lahir</td><td bgcolor='#FF6600'>$fulldate</td>
	</tr>
	<tr>
		<td >Kelas yang akan diikuti</td><td>$course</td>
	</tr>
	<tr><td colspan='2' bgcolor='#FF6600'></td>
	</tr>
	<tr>
	<td colspan='2'>Kartu ini harus anda bawa jika ingin mendaftar untuk menigikuti kelas kami</td>
	<tr>
	
</table>"
;
echo"<a href='index.php'>back to home</a>";
}


?>

