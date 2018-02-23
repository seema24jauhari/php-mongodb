<?php
include('include/config.php');
$dbname = 'studentMgmt.studentsdff';
try{
	$query = new MongoDB\Driver\Query([]); 
	$rows = $mng->executeQuery($dbname, $query);

	//$students = current($rows->toArray());
}
catch (MongoDB\Driver\Exception\Exception $e) {

	$filename = basename(__FILE__);

	echo "The $filename script has experienced an error.\n"; 
	echo "It failed with the following exception:\n";

	echo "Exception:", $e->getMessage(), "\n";
	echo "In file:", $e->getFile(), "\n";
	echo "On line:", $e->getLine(), "\n";    
}


   
?>
<html>
<head>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script
  src="http://code.jquery.com/jquery-migrate-3.0.1.min.js"
  integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
  crossorigin="anonymous"></script>

	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<h3 class="text-center">User List</h3>
		<table class="table">	
			<tr>
				<td width="100">Sr.No</td>
				<td width="300">Name</td>
				<td>Info</td>
			</tr>
			<?php if(!empty($rows)){
				$i=0;
				foreach ($rows as $key => $student) {
				$i++;
			?>
			<tr>
				<td width="100"><?=$i;?></td>
				<td width="300"><?=trim($student->fname.' '.$student->lname);?></td>
				<td><?=implode(", ",$student->emails);?></td>
			</tr>
			<?php 
				}
			}  else{?>
			<tr>
				<td colspan="3" class="text-center text-danger">No data found.</td>
			</tr>
			<?php }?>
		</table>
	</div>
</body>
<html>
