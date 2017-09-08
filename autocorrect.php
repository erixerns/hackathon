<?php
/*
The following sql accepts keyword as ?key= as GET
and returns the respective NGO that handles those keywords
*/

$connection = mysqli_connect("localhost","root","","hackathon");

if($connection->connect_error){
    echo "Connection to database Failed!";
    exit;
}

if(count($_GET)>0){
    $key=($_GET['key']);
	$column=($_GET['col']);
}

$str="";

$sqlCommand = "Select distinct $column from ngotable where $column like '$key%';";
$result = $connection->query($sqlCommand);
$data = $result->fetch_assoc();



echo ucwords(strtolower($data[$column]));



?>