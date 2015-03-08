<?php

$row=1;

$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
$db = mysql_select_db("logbase", $connection) or die(mysql_error());



if(($handle=fopen("LogFile.txt","r"))!=FALSE) 
{
	fgets($handle);
	while(($data=fgetcsv($handle,1000,"	"))!==FALSE)
		{
		$num=count($data);
		//вставляем в базу
		$query = mysql_query("INSERT INTO systemlog(name,email) VALUES($sname,$semail)", $connection) or die(mysql_error());
		$row++;
		}
	fclose($handle);
}

?>