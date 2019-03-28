<?php
	
$database = "foxycare";  
$server = "166.62.28.88";  
$db_user = "priyanshriv50";  
$db_pass = "P9009039993p";  
  
$link = mysql_connect($server, $db_user, $db_pass) || die(mysql_error());;
mysql_select_db($database);


?>