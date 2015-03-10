<?php

session_start();
//if (!isset($_SESSION['percent']))
//{
	  var_dump($_SESSION['percent']);
	  $_SESSION['percent'] = 0;
	  $connection = mysql_connect("localhost", "root", "") or die(mysql_error());
	  var_dump($connection);
	  $db = mysql_select_db("logbase", $connection) or die(mysql_error());
	  var_dump($db);
	  $allrow = 0;
	  if(($handle=fopen("LogFile.txt","r"))!=FALSE) 
	  {
	  var_dump($handle);
		$allrow = 0;
		$row=0;
		while(fgets($handle)!==FALSE)
		{
			$allrow++;
		}
		var_dump($allrow);
		fseek($handle, 0);
		fgets($handle);
		while(($data=fgetcsv($handle,1000,"\t"))!==FALSE)
			{
			var_dump($data);
			//$num=count($data);
			//вставляем в базу
			//$mas = split("\t",$data);
			$row++;
			var_dump($row);
			$_SESSION['percent'] = ($row/$allrow)*100;
			var_dump($_SESSION['percent']);
			var_dump(count($data));
			if(count($data) === 6)
				{
				$query = "INSERT INTO systemlog(Level,DateTime,Source,Code,Description) VALUES('$data[0]','$data[1]','$data[2]','$data[3]','$data[5]')";
				var_dump($query);
				$result = mysql_query($query, $connection) or die(mysql_error());	
				
				var_dump($result);
				}
			}
		$_SESSION['percent']=100;
		mysql_close($connection);
		fclose($handle);
		unset($_SESSION['percent']);
		session_destroy();
	  }
	  
	  
// }
// else
// {
	  // echo($_SESSION['percent']);
// }








?>