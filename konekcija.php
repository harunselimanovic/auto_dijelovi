<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "auto_dijelovi";
$konekcija = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $konekcija -> error);

?>