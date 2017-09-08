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
    $state=($_GET['state']);
	$dis=($_GET['dis']);
}


$str="";
$sqlCommand = "Select distinct state , district, name, scheme from ngotable where state like '$state%' and district like '$dis%';";
$result = $connection->query($sqlCommand);
while($data = $result->fetch_assoc()){
	$str=$str."<tr><td>".$data['state']."</td><td>".$data['district']."</td><td>".$data['name']."</td><td>".$data['scheme']."</td></tr>";
}

echo $str;

?>