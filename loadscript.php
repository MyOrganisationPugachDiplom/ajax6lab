<?php

session_start();
if (!isset($_SESSION['percent']))
{
	  $_SESSION['percent'] = 0;
	  $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
	  $db = mysql_select_db("logbase", $connection) or die(mysql_error());
	  $allrow = 0;
	  if(($handle=fopen("LogFile.txt","r"))!=FALSE) 
	  {
		$allrow = 0;
		$row=0;
		while(fgets($handle)!==FALSE)
		{
			$allrow++;
		}
		fseek($handle, 0);
		fgets($handle);
		while(($data=fgetcsv($handle,1000,"\t"))!==FALSE)
			{
			//$num=count($data);
			//вставляем в базу
			//$mas = split("\t",$data);
			$row++;
			$_SESSION['percent'] = ($row/$allrow)*100;
			if(count($data) === 5)
				{
				$query = mysql_query("INSERT INTO systemlog(Level,DateTime,Source,Code,Description) VALUES(mas[0],mas[1],mas[2],mas[3],mas[4])", $connection) or die(mysql_error());	
				}
			}
		$_SESSION['percent']=100;
		fclose($handle);
	  }
	  
	  
}
else
{
	  echo($_SESSION['percent']);
}








?>