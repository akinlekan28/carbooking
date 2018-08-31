<?php

$dbinfo = "mysql:host=localhost;dbname=carbooking";
$dbuser = "root";
$dbpassword = "";

try {
      $db = new PDO( $dbinfo, $dbuser, $dbpassword);
      $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );	
} catch(PDOEXCEPTION $e) {
	$errorMessage = "Connection Failed!" . $e->getMessage();
	trigger_error($errorMessage);
}

?>