<?php

	$beginrecord = $_POST['stringbegin'];
	$endrecord = $_POST['stringend'];
	$sortparam = $_POST['sort'];
	
	//$beginrecord = 5;
	//$endrecord = 30;
	//$sortparam = 'sort';
	$interval=$endrecord-$beginrecord;
		
	$connection = mysql_connect("localhost", "root", "") or die(mysql_error());	
	$db = mysql_select_db("logbase", $connection) or die(mysql_error());
	 
	$query = "SELECT Level,DateTime,Source,Code,Description FROM systemlog LIMIT $beginrecord, $interval"; 

	$result = mysql_query($query ,$connection) or die(mysql_error());	
	echo("{ [");
	while ($row = mysql_fetch_array($result, MYSQL_NUM)) 
	{
		echo('{'.$row[0].','.$row[1].','.$row[2].','.$row[3].','.$row[4].'}');
	}
	echo("] }");


?>
