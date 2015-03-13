<?php
if(($handle=fopen("LogFileSmall.txt","r"))!=FALSE) 
{
	$allrow = 0;
	while(fgets($handle)!==FALSE)
	{
		$allrow++;
	}
	echo($allrow);
}
?>