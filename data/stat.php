<?php
	if (file_exists('stat.txt')) 
	{
		$fil = fopen('stat.txt', r);
		$dat = fread($fil, filesize('stat.txt')); 
		echo $dat+1;
		fclose($fil);
		$fil = fopen('stat.txt', w);
		fwrite($fil, $dat+1);
	}

	else
	{
		$fil = fopen('stat.txt', w);
		fwrite($fil, 1);
		echo '1';
		fclose($fil);
	}
?>
