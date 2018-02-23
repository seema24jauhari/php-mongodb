<?php
//phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL);


try {	   
	$mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
	    
} catch (MongoDB\Driver\Exception\Exception $e) {

	$filename = basename(__FILE__);

	echo "The $filename script has experienced an error.\n"; 
	echo "It failed with the following exception:\n";

	echo "Exception:", $e->getMessage(), "\n";
	echo "In file:", $e->getFile(), "\n";
	echo "On line:", $e->getLine(), "\n";    
}

