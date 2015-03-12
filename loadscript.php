<?php

session_start();
$_SESSION['percent'] = 0;
//if (!isset($_SESSION['percent']))
//{
	 ini_set("max_execution_time", "600");
	  $_SESSION['percent'] = 0;
	  $connection = mysql_connect("localhost", "root", "") or die(mysql_error());

	  $db = mysql_select_db("logbase", $connection) or die(mysql_error());

	  $allrow = 0;
	  if(($handle=fopen("LogFileSmall.txt","r"))!=FALSE) 
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
		
			
			if(count($data) === 6)
				{
				$query = "INSERT INTO systemlog(Level,DateTime,Source,Code,Description) VALUES('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[5]')";
				
				$result = mysql_query($query, $connection) or die(mysql_error());	
				
				
				}
			}
		$_SESSION['percent']=100;
		mysql_close($connection);
		fclose($handle);
		unset($_SESSION['percent']);
		//session_destroy();
	  }
	  
	  
//}

?>