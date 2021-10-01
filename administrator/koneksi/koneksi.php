<?php

$hostname	= "localhost";
$username	= "root";
$password	= "";
$database	= "pri_seminar";

mysql_connect($hostname, $username, $password) or die("cannot connect to db");
mysql_select_db($database);

?>
