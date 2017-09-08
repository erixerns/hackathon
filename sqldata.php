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
}

$sqlCommand = "Select state from table 5 where keyword like %$key%;";
$result = $connection->query($sqlCommand);

echo $connection->error;

?>