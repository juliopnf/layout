<?php
require_once'config.php';
/**
 * Connect to mysql server
 * @param bool
 * @use true to connect false to close
 */
	function connect($close=true)
	{
		if (!$close) {
		mysql_close($connection);
		return true;
		}
		$connection=mysql_connect(HOST,USER,PASS);
		if(mysql_select_db(DB)){
			return $connection;
		}else{
			echo mysql_error();
		}
	}

	function getFoto($id){
		$sql="SELECT * FROM foto WHERE foto_id = $id";
		$query=mysql_query($sql);
		if ($query) {
			return mysql_fetch_assoc($query);
		}else
		{
			return false;
		}
	}

	function getFotos()
	{
		$sql="SELECT * FROM foto";
		$query=mysql_query($sql);
		$res=array();
		
		while ($row=mysql_fetch_assoc($query)) {
			$res[]=$row;
		}
		return $res;
	}

	function getArtikel($id){
		$sql="SELECT * FROM artikel WHERE id_artikel = $id";
		$query=mysql_query($sql);
		if ($query) {
			return mysql_fetch_assoc($query);
		}else
		{
			return false;
		}
	}

	function getArtikels()
	{
		$sql="SELECT * FROM artikel";
		$query=mysql_query($sql);
		$res=array();
		
		while ($row=mysql_fetch_assoc($query)) {
			$res[]=$row;
		}
		return $res;
	}

	function getLikes($id)
	{
		$sql="select * from foto_likes where foto_id=$id";
		$query=mysql_query($sql);
		return mysql_num_rows($query);
	}
	function liked($id,$ip)
	{
		$sql="SELECT * FROM foto_likes WHERE foto_id=$id AND ip='$ip'";
		$query=mysql_query($sql);
		if (mysql_num_rows($query)!=0) {
			return true;
			
		}else{
			return false;
		}
	}

	function like($id)
	{
		$ip=$_SERVER['REMOTE_ADDR'];
		$sql="INSERT INTO foto_likes(id,foto_id,ip)VALUES(null,$id,'$ip')";
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}

	}

	function view($id)
	{
		
		$sql="UPDATE foto SET views=views+1 WHERE foto_id=$id";
		if(mysql_query($sql)){
			return true;
		}else{
			return false;
		}

	}
	
	/**
 * gravatar Image
 * @see http://en.gravatar.com/site/implement/images/
 */
function avatar($mail, $size = 60){
	$url = "http://www.gravatar.com/avatar/";
	$url .= md5( strtolower( trim( $mail ) ) );
	// $url .= "?d=" . urlencode( $default );
	$url .= "&s=" . $size;
	return $url;
}
	?>
