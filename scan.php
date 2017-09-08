

<!--?php
/*
$url="http://www.andaman-nicobar.ngosindia.com/";
$html = file_get_contents($url);
libxml_use_internal_errors(true);

$doc = new DOMDocument;
$doc->loadHTML($html);
$xpath= new DOMXPath($doc);

$dom_node_list=$xpath->query("//div[@id='text-2']");
$temp_dom= new DOMDocument();

foreach($dom_node_list as $n) $temp_dom->appendChild($temp_dom->importNode($n,true));
print_r($temp_dom->saveHTML());

*/?-->

<?php
$error="";
function insertData($name,$link){
    $connection = mysqli_connect("localhost","root","","hackathon");
    
    if($connection->connect_error){
        echo ("Connection to database Failed!" . $connection->error);
        exit;
    }
    $sqlCommand = "insert into statewebsite(state,website) values('$name','$link');";
   $connection->query($sqlCommand);
   $GLOBALS["error"]=$connection->error;

};
$input=file_get_contents("http://www.ngosindia.com/");

//echo ($input);
$links=array();
$regexp = "<a\s[^>]*href=(\"??)([^\" >]*?)\\1[^>]*>(.*)<\/a>";
//$regexp = "href=\"http:\/\/www\..*\.nsogindia.com\"";
if(preg_match_all("/$regexp/siU", $input, $matches, PREG_SET_ORDER)) {
    foreach($matches as $match){
        if(preg_match("/^http:\/\/www\..*\.ngosindia.com\/?$/",$match[2])){
            insertData($match[3],$match[2]);
    }
}
}

if($error!="")
    echo $error;
else{
    $connection=mysqli_connect("localhost","root","","hackathon");
    $out=$connection->query("select count(*) as total from statewebsite;");
    echo "Query updates Successfully!<br/>";
    $data=$out->fetch_assoc();
    echo ("Total:" . $data['total'] . " rows.");
}
?>