<?php

function getNGO($website,$name) {
    $input=file_get_contents("$website");

    $links=array();
    $regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
    if (preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $match) {
            if(strlen($match[2])>5){
                if (preg_match("/^[a-zA-Z-]*\.html$/", $match[2])) {
                    echo $match[2]."<br/>";
                }
                else if(preg_match("/^(((?!www).)*)\..*\..*\/$/",$match[2])){
                    echo $match[2]."<br/>";
                }
        }
        }
    }
}

$connection=mysqli_connect("localhost","root","","hackathon");
$query="Select state,website from statewebsite;";
$result=$connection->query($query);
$i=1;
while($data=$result->fetch_assoc()){
    echo $data['state']."<br/>";
    
    getNGO($data['website'],$data['state']);
    $i++;
    if($i>73){
        break;
    }
    
}


?>