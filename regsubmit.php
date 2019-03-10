<?php
	
	$name = $_POST["wname"];
	$pass = $_POST["wpassword"];
        $nn = 123456;
        $pp =   qwerty;

	
	
	$connection = mysql_connect("newsql.ascend2k9.com","ascend2k9","passis250")
		or die ("Couldn't connect to DB");
	$db = mysql_select_db("ascend2k9",$connection)
		or die("Couldn't select DB");
	$query = "INSERT INTO jubtho (name,password) VALUES  ('$name','$pass')";
	
	$result  = mysql_query($query)
		or die("Query failed:".mysql_error());
	mysql_close($connection);
	$redirect = "Location: thanks.html";
	echo header($redirect);
?>

