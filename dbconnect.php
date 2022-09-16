<?php
	$conn = new mysqli('localhost', 'root', '','automate');
	if(!$conn) 
		die( '<h4><center>Unable to connect to server.<br>'.$conn->connect_error().'</center></h4>');
?>