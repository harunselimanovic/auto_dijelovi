<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$db = "auto_dijelovi";
$konekcija = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $konekcija -> error);

?>