<?php
if(($handle=fopen("LogFileS.txt","r"))!=FALSE) 
{
	$allrow = 0;
	while(fgets($handle)!==FALSE)
	{
		$allrow++;
	}
	echo(allrow);
}
?>