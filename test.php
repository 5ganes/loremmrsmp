<?php
	ini_set('display_errors', 1);
	$host = "103.21.59.7";
    $uname = "aiccgov_ictan"; 		
    $psw = "K0G9wM3Shz,a";					
	$dbname = "aiccgov_ictan";
	
	$links = mysql_connect($host, $uname, $psw) or die("Sorry, couldnot connect to MySQL Server");
	$db = mysql_select_db($dbname,$links) or die("Sorry, couldnot find database");	
	echo 'Hello World';
?>