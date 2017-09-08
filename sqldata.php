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
    $key=($_GET);
}

$sqlCommand = "Select * from ngoData where keyword like %$key%;";
$result = mysqli_query($sqlCommand);

echo $result;

