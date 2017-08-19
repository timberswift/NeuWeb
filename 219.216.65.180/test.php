<?php
	$link_id = mysql_connect('localhost','root','123456')or mysql_error();
	if ($link_id){echo "mysql test successfully by Hero !";
	}
	else { echo mysql_error();
	}
?>
