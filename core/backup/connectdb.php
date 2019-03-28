<?php
	
$database = "schmooze";  
$server = "50.62.209.16";  
$db_user = "pshrivastava50";  
$db_pass = "Ps9009039993";  
  
$link = mysql_connect($server, $db_user, $db_pass) || die(mysql_error());;
mysql_select_db($database);


?>