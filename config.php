<?php

require 'vendor/autoload.php';

try{

$connection = new MongoDB\Client();
//echo "connection to database created successfully";

$db = $connection->mydiary;

//echo "database ecommerce selected";

//$collection = $db->registration;


//$collecton = $db->createCollection('personnel');
//echo "collection created successfully";

}

catch(Exception $e){
	die("Error.couldnot connect to the server.please check");
}

?>