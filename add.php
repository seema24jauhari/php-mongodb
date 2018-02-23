<?php
//phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$dbname = 'studentMgmt.students';

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

if(empty($_REQUEST)){
	
}
else if($_SERVER['REQUEST_METHOD']=="POST" && !empty($_REQUEST['action']) && $_REQUEST['action']=='add_user'){
	$datetime= new DateTime('now');
	$date = $datetime['date'];
	$bulk = new MongoDB\Driver\BulkWrite;
	$doc = ['_id' => new MongoDB\BSON\ObjectID, 
			'fname' => 'sonam',
			'lname' => 'jauhari', 
			'dob'   => $date,
			'emails' => array('jauhariseema.24@gmail.com','jauharitest.24@gmail.com')];
	try {	
		$bulk->insert($doc);
	} catch (MongoDB\Driver\Exception\Exception $e) {
		echo "It failed with the following exception:\n";
		echo "Exception:", $e->getMessage(), "\n";
		echo "In file:", $e->getFile(), "\n";
		echo "On line:", $e->getLine(), "\n";    
	}
	//$bulk->update(['name' => 'test3'], ['$set' => ['name' => 'test5']]);
	//$bulk->delete(['name' => 'test2']);
	//$mng->executeBulkWrite($dbname, $bulk);
}
else if(!empty($_REQUEST['action']) && $_REQUEST['action']=='edit'){

}
else if(!empty($_REQUEST['action']) && $_REQUEST['action']=='delete'){

}
?>
<html>
<head></head>
<body>
<?php if($_REQUEST['action']=='add_user'){?>
	<form method="POST">
 		<div> FName	<input type="fname" name="fname"/> </div>
 		<div> LName	<input type="fname" name="lname"/> </div>
 		<div> Email	<input type="fname" name="email"/> </div>
 		<input type="Submit" name="submit"/>
	</form>
<?php }?>
</body>
<html>
