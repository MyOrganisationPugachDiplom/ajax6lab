<?php
ini_set("max_execution_time", "600");
$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("logbase", $connection) or die(mysql_error());
if(($handle=fopen("LogFileSmall.txt","r"))!=FALSE) 
{
	$row=$_GET['string'];
	var_dump($_GET['string']);
	fgets($handle);
	while($row !== 0)
	{
		if($str = fgets($handle)===FALSE)
		{
			var_dump('why?');
			echo('EOF');
		}
		var_dump($row);
		$row--;	
	}
	$row = $_GET['string'];
	$tmp = 100;
	while(($data=fgetcsv($handle,1000,"\t"))!==FALSE && $tmp !== 0)
	{
		$row++;	
		var_dump($row);
		$tmp--;
		var_dump($tmp);
		if(count($data) === 6)
		{
		$query = "INSERT INTO systemlog(Level,DateTime,Source,Code,Description) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[5]')";				
		$result = mysql_query($query, $connection) or die(mysql_error());	
		}
	}
	var_dump($data);
	if($data === FALSE)
	{
		var_dump('why2?');
		echo('EOF');
	}
	else
	{
		var_dump('why3?');
		echo($row);
	}
}
mysql_close($connection);
fclose($handle);

?>