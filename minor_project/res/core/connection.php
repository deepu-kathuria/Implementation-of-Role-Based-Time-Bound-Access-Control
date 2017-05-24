<?php

try{
	$dbcon = new PDO("pgsql:dbname=db;port=5432;host=localhost", "postgres","123456");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "<br>".$e->getMessage();
}

?>