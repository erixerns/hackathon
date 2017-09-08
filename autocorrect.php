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
	if(isset($_GET['state'])){
		$state=$_GET['state'];
	}
}


if($column == "district"){
	#get the autocorrected state
	$sqlCommand = "Select distinct state from ngotable where state like '$state%';";
	$stateResult = $connection->query($sqlCommand);
	$stateData = $stateResult->fetch_assoc();
	$state=$stateData["state"];
	#get the district
	$sqlCommand = "Select distinct state,district from ngotable where state like '%$state%' and $column like '$key%';";
	$result = $connection->query($sqlCommand);
	$data = $result->fetch_assoc();

	echo ucwords(strtolower($data[$column]));
}
else{
	$sqlCommand = "Select distinct state from ngotable where $column like '$key%';";
	$result = $connection->query($sqlCommand);
	$data = $result->fetch_assoc();
	echo ucwords(strtolower($data[$column]));
}

?>