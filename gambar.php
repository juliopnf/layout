<?php
$namafolder="gambar/"; //tempat menyimpan file
$con=mysql_connect("localhost","root","") or die("Gagal");
mysql_select_db("db_gambar")  or die("Gagal");
if (!empty($_FILES["nama_file"]["tmp_name"]))
{
	$jenis_gambar=$_FILES['nama_file']['type'];
	$judul_gambar=$_POST['judul_gambar'];
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="insert into tb_gambar(nama_file) values ('$gambar')";
			$res=mysql_query($sql) or die (mysql_error());
			echo "Gambar berhasil dikirim ".$gambar;
			echo "<p>Judul Gambar : $judul_gambar</p>";		   
			echo "<p><img src=\"$gambar\" width=\"200\"/></p>";		   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
?>
